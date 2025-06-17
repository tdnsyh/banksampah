<?php

namespace App\Http\Controllers\Dashboard\Nasabah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NasabahTransaksiController extends Controller
{
    public function  riwayatIndex()
    {
        return view('dashboard.nasabah.transaksi.riwayat');
    }
}
