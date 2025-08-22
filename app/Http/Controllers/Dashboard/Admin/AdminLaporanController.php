<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TransaksiSetor;
use App\Models\TransaksiTarik;
use App\Models\SaldoNasabah;
use App\Models\JenisSampah;

class AdminLaporanController extends Controller
{
    public function laporanIndex(Request $request)
    {
        $title = 'Laporan';

        // Filter tanggal
        $startDate = $request->start_date ?? now()->startOfMonth()->format('Y-m-d');
        $endDate = $request->end_date ?? now()->endOfMonth()->format('Y-m-d');

        // Statistik ringkas
        $totalNasabah = User::count();
        $totalSetor = TransaksiSetor::whereBetween('tanggal', [$startDate, $endDate])
            ->selectRaw('SUM(total_berat) as total_berat, SUM(total_harga) as total_harga')
            ->first();
        $totalTarik = TransaksiTarik::whereBetween('tanggal', [$startDate, $endDate])
            ->sum('jumlah');
        $totalSaldo = SaldoNasabah::sum('saldo');

        // Riwayat transaksi
        $riwayatSetor = TransaksiSetor::with('nasabah', 'details.jenisSampah')
            ->whereBetween('tanggal', [$startDate, $endDate])
            ->latest()
            ->get();

        $riwayatTarik = TransaksiTarik::with('nasabah')
            ->whereBetween('tanggal', [$startDate, $endDate])
            ->latest()
            ->get();

        // Statistik per jenis sampah
        $perJenisSampah = JenisSampah::with(['transaksiDetails' => function($q) use($startDate, $endDate){
            $q->whereHas('transaksiSetor', function($q2) use($startDate, $endDate){
                $q2->whereBetween('tanggal', [$startDate, $endDate]);
            });
        }])->get();

        $dataSetor = $riwayatSetor->map(function($setor, $index){
            return [
                $index + 1,
                $setor->nasabah->name,
                \Carbon\Carbon::parse($setor->tanggal)->format('d-m-Y'),
                $setor->total_berat,
                $setor->total_harga
            ];
        })->toArray();

        $dataTarik = $riwayatTarik->map(function($tarik, $index){
            return [
                $index + 1,
                $tarik->nasabah->name,
                \Carbon\Carbon::parse($tarik->tanggal)->format('d-m-Y'),
                $tarik->jumlah
            ];
        })->toArray();


        return view('dashboard.admin.laporan.index', compact(
            'title', 'totalNasabah', 'totalSetor', 'totalTarik', 'totalSaldo',
            'riwayatSetor', 'riwayatTarik', 'startDate', 'endDate', 'perJenisSampah', 'dataSetor', 'dataTarik'
        ));
    }
}
