<?php

namespace App\Http\Controllers\Dashboard\Nasabah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NasabahInformasiController extends Controller
{
    public function hargaIndex()
    {
        return view('dashboard.nasabah.informasi.harga');
    }

    public function pengumumanIndex()
    {
        return view('dashboard.nasabah.informasi.pengumuman');
    }
}
