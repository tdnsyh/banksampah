<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TransaksiSetor;
use App\Models\TransaksiTarik;
use App\Models\SaldoNasabah;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';

        // Total nasabah
        $totalNasabah = User::count();

        // Total setoran
        $totalSetor = TransaksiSetor::selectRaw('SUM(total_berat) as total_berat, SUM(total_harga) as total_harga')->first();

        // Total penarikan
        $totalTarik = TransaksiTarik::sum('jumlah');

        // Saldo total semua nasabah
        $totalSaldo = SaldoNasabah::sum('saldo');

        // 5 transaksi setor terakhir
        $riwayatSetor = TransaksiSetor::latest()->take(5)->get();

        // 5 transaksi tarik terakhir
        $riwayatTarik = TransaksiTarik::latest()->take(5)->get();

        return view('dashboard.admin.index', compact(
            'title',
            'totalNasabah',
            'totalSetor',
            'totalTarik',
            'totalSaldo',
            'riwayatSetor',
            'riwayatTarik'
        ));
    }
}
