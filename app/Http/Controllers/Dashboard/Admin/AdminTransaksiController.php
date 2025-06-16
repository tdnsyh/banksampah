<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminTransaksiController extends Controller
{
    public function transaksiIndex()
    {
        $title = 'Transaksi';

        return view('dashboard.admin.transaksi.index', compact('title'));
    }

    public function transaksiHistori()
    {
        $title = 'Histori Transaksi';

        return view('dashboard.admin.transaksi.history', compact('title'));
    }
}
