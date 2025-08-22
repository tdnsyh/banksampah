<?php

namespace App\Http\Controllers\Dashboard\Nasabah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransaksiSetor;
use App\Models\TransaksiTarik;
use App\Models\SaldoNasabah;
use Illuminate\Support\Facades\Auth;

class NasabahTransaksiController extends Controller
{

    public function riwayatIndex()
    {
        $user = Auth::user();
        $saldo = SaldoNasabah::where('nasabah_id', $user->id)->first();
        $saldo_terakhir = $saldo ? $saldo->saldo : 0;

        $transaksiSetor = TransaksiSetor::where('nasabah_id', $user->id)
            ->with('details.jenisSampah')
            ->latest()
            ->get();

        $transaksiTarik = TransaksiTarik::where('nasabah_id', $user->id)
            ->latest()
            ->get();

        return view('dashboard.nasabah.transaksi.riwayat', compact(
            'saldo_terakhir',
            'transaksiSetor',
            'transaksiTarik'
        ));
    }
}
