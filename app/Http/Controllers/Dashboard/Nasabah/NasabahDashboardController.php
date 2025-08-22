<?php

namespace App\Http\Controllers\Dashboard\Nasabah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransaksiSetor;
use App\Models\TransaksiTarik;
use App\Models\SaldoNasabah;
use Illuminate\Support\Facades\Auth;

class NasabahDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Saldo terakhir
        $saldo = SaldoNasabah::where('nasabah_id', $user->id)->first();
        $saldo_terakhir = $saldo ? $saldo->saldo : 0;

        // Total setoran
        $totalSetor = TransaksiSetor::where('nasabah_id', $user->id)
            ->selectRaw('SUM(total_berat) as total_berat, SUM(total_harga) as total_harga')
            ->first();

        // Total penarikan
        $totalTarik = TransaksiTarik::where('nasabah_id', $user->id)
            ->sum('jumlah');

        // 5 transaksi terakhir (setor + tarik)
        $riwayatSetor = TransaksiSetor::where('nasabah_id', $user->id)
            ->latest()->take(5)->get();
        $riwayatTarik = TransaksiTarik::where('nasabah_id', $user->id)
            ->latest()->take(5)->get();

        return view('dashboard.nasabah.index', compact(
            'saldo_terakhir',
            'totalSetor',
            'totalTarik',
            'riwayatSetor',
            'riwayatTarik'
        ));
    }
}
