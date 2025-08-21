<?php

namespace App\Http\Controllers\Dashboard\Nasabah;

use App\Http\Controllers\Controller;
use App\Models\JenisSampah;
use Illuminate\Http\Request;

class NasabahInformasiController extends Controller
{
    public function hargaIndex()
    {
        $jenis = JenisSampah::with('kategori')->get();
        return view('dashboard.nasabah.informasi.harga', compact('jenis'));
    }
}
