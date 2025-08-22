<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransaksiTarik;
use App\Models\SaldoNasabah;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminPenukaranController extends Controller
{
    public function penukaranIndex()
    {
        $title = 'Penukaran';
        $nasabahs = User::all(); // untuk dropdown nasabah di form
        return view('dashboard.admin.penukaran.index', compact('title', 'nasabahs'));
    }

    public function penukaranHistori()
    {
        $title = 'Riwayat Penukaran';
        $transaksis = TransaksiTarik::with('nasabah')->latest()->get();
        return view('dashboard.admin.penukaran.history', compact('title', 'transaksis'));
    }

    public function storePenukaran(Request $request)
    {
        $request->validate([
            'nasabah_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|numeric|min:1',
        ]);

        DB::beginTransaction();
        try {
            // Ambil saldo nasabah
            $saldo = SaldoNasabah::firstOrCreate(
                ['nasabah_id' => $request->nasabah_id],
                ['saldo' => 0]
            );

            if ($request->jumlah > $saldo->saldo) {
                return back()->withErrors('Saldo tidak cukup untuk penarikan.');
            }

            // Kurangi saldo
            $saldo->kurangiSaldo($request->jumlah);

            // Simpan transaksi penarikan
            TransaksiTarik::create([
                'nasabah_id' => $request->nasabah_id,
                'tanggal' => $request->tanggal,
                'jumlah' => $request->jumlah,
            ]);

            DB::commit();
            return redirect()->route('penukaran.index')->with('success', 'Penarikan berhasil dilakukan.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors('Gagal melakukan penarikan: ' . $e->getMessage());
        }
    }
}
