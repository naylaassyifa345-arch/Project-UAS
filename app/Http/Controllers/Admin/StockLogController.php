<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StockLog;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StockLogController extends Controller
{
    public function index()
    {
        $logs = StockLog::with(['menu', 'user'])
            ->latest()
            ->get();

        return view('admin.stock_logs.index', compact('logs'));
    }

    public function create()
    {
        $menus = Menu::all();
        return view('admin.stock_logs.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'tipe'    => 'required|in:IN,OUT',
            'jumlah'  => 'required|integer|min:1',
        ]);

        DB::beginTransaction();

        try {
            $menu = Menu::findOrFail($request->menu_id);

            if ($request->tipe === 'OUT' && $menu->stok < $request->jumlah) {
                throw new \Exception('Stok tidak mencukupi');
            }

            // update stok
            if ($request->tipe === 'IN') {
                $menu->increment('stok', $request->jumlah);
            } else {
                $menu->decrement('stok', $request->jumlah);
            }

            // simpan log
            StockLog::create([
                'menu_id'    => $menu->id,
                'tipe'       => $request->tipe,
                'jumlah'     => $request->jumlah,
                'keterangan' => $request->keterangan,
                'user_id'    => Auth::id(),
            ]);

            DB::commit();

            return redirect('/admin/stock-logs')
                ->with('success', 'Log stok berhasil disimpan');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
