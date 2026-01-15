<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Transaction;
use App\Models\StockLog;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMenu = Menu::count();
        $totalTransaksi = Transaction::count();
        $totalStok = Menu::sum('stok');
        $totalPenjualan = Transaction::sum('total_harga');

        return view('admin.dashboard.index', compact(
            'totalMenu',
            'totalTransaksi',
            'totalStok',
            'totalPenjualan'
        ));
    }
}
