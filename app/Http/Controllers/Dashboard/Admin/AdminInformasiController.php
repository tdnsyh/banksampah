<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminInformasiController extends Controller
{
    public function artikelIndex()
    {
        return view('dashboard.admin.artikel.index');
    }

    public function artikelTambah()
    {
        $title = 'Tambah Artikel';

        return view('dashboard.admin.artikel.create', compact('title'));
    }

    public function pengumumanIndex()
    {
        return view('dashboard.admin.pengumuman.index');
    }
}
