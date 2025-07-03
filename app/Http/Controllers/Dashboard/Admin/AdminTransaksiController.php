<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransaksiSetor;
use App\Models\TransaksiSetorDetail;
use Illuminate\Support\Facades\Auth;
use App\Models\JenisSampah;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AdminTransaksiController extends Controller
{
    public function transaksiIndex()
    {
        $title = 'Transaksi';
        $jenisSampah = JenisSampah::all();
        $nasabah = User::where('role', 'nasabah')->get();

        return view('dashboard.admin.transaksi.index', compact('title', 'nasabah', 'jenisSampah'));
    }

    public function transaksiHistori()
    {
        $title = 'Riwayat Transaksi';
        $transaksis = TransaksiSetor::with('details.jenisSampah', 'nasabah')->latest()->get();
        return view('dashboard.admin.transaksi.history', compact('title', 'transaksis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nasabah_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'jenis_sampah_id.*' => 'required|exists:jenis_sampah,id',
            'berat.*' => 'required|numeric|min:0.1',
        ]);

        DB::beginTransaction();
        try {
            $totalBerat = 0;
            $totalHarga = 0;
            $details = [];

            foreach ($request->jenis_sampah_id as $index => $sampahId) {
                $berat = $request->berat[$index];
                $sampah = JenisSampah::findOrFail($sampahId);
                $subtotal = $sampah->harga_per_kg * $berat;

                $totalBerat += $berat;
                $totalHarga += $subtotal;

                $details[] = [
                    'jenis_sampah_id' => $sampahId,
                    'berat' => $berat,
                    'subtotal' => $subtotal
                ];
            }

            $transaksi = TransaksiSetor::create([
                'nasabah_id' => $request->nasabah_id,
                'tanggal' => $request->tanggal,
                'total_berat' => $totalBerat,
                'total_harga' => $totalHarga,
            ]);

            foreach ($details as $detail) {
                $transaksi->details()->create($detail);
            }

            DB::commit();
            return redirect()->route('transaksi.index')->with('success', 'Setoran berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors('Gagal menyimpan setoran: ' . $e->getMessage());
        }
    }
}
