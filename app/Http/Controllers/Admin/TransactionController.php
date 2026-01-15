<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Menu;
use App\Models\StockLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    // 1️⃣ List transaksi
    public function index()
    {
        $transactions = Transaction::with('user')->latest()->get();
        return view('admin.transactions.index', compact('transactions'));
    }

    // 2️⃣ Form transaksi baru
    public function create()
    {
        $menus = Menu::all();
        return view('admin.transactions.create', compact('menus'));
    }

    // 3️⃣ Simpan transaksi
    public function store(Request $request)
    {
        $request->validate([
            'menus.*.id'  => 'required|exists:menus,id',
            'menus.*.qty' => 'required|integer|min:0',
        ]);

        DB::beginTransaction();

        try {
            // Buat kode transaksi unik
            $kodeTransaksi = 'TRX-' . Str::upper(Str::random(6));

            // Buat header transaksi
            $transaction = Transaction::create([
                'kode_transaksi' => $kodeTransaksi,
                'tanggal'        => now(),
                'user_id'        => Auth::id(),
                'total_harga'    => 0, // sementara, nanti di-update
            ]);

            $total = 0;

            // Loop tiap menu
            foreach ($request->menus as $item) {
                $menu = Menu::findOrFail($item['id']);
                $qty = $item['qty']; // <--- ini penting, ambil dari form

                if ($qty <= 0) {
                    continue; // skip kalau qty 0
                }

                if ($menu->stok < $qty) {
                    throw new \Exception("Stok {$menu->nama} tidak cukup");
                }

                $subtotal = $menu->harga * $qty;

                // Buat detail transaksi
                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'menu_id'        => $menu->id,
                    'qty'            => $qty,
                    'harga'          => $menu->harga,
                    'subtotal'       => $subtotal,
                ]);

                // Kurangi stok menu
                $menu->decrement('stok', $qty);

                // Log stok OUT
                StockLog::create([
                    'menu_id'    => $menu->id,
                    'tipe'       => 'OUT',
                    'jumlah'     => $qty,
                    'keterangan' => 'Penjualan - ' . $transaction->kode_transaksi,
                    'user_id'    => Auth::id(),
                ]);

                $total += $subtotal;
            }

            // Update total transaksi
            $transaction->update([
                'total_harga' => $total,
            ]);

            DB::commit();

            return redirect('/admin/transactions')
                ->with('success', 'Transaksi berhasil disimpan');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
