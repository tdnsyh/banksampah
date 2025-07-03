<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\pengumuman;
use Illuminate\Http\Request;

class AdminInformasiController extends Controller
{
    public function artikelIndex()
    {
        $artikel = Artikel::all();
        return view('dashboard.admin.artikel.index', compact('artikel'));
    }

    public function artikelTambah()
    {
        $title = 'Tambah Artikel';

        return view('dashboard.admin.artikel.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'penulis' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
        ]);

        $artikel = new Artikel();
        $artikel->judul = $request->judul;
        $artikel->isi = $request->isi;
        $artikel->penulis = $request->penulis;
        $artikel->kategori = $request->kategori;

        $artikel->save();
        return redirect()->route('admin.artikel.index')->with('success', 'Berita berhasil dibuat!');
    }

    public function pengumumanIndex()
    {
        $pengumuman = 'Tambah Pengumuman';
        return view('dashboard.admin.pengumuman.index', compact('pengumuman'));
    }

    public function pengumumanTambah()
    {
        $title = 'Tambah Artikel';

        return view('dashboard.admin.pengumuman.create', compact('title'));
    }

    public function pengumumanStore(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
        ]);

        $pengumuman = new pengumuman();
        $pengumuman->judul = $request->judul;
        $pengumuman->isi = $request->isi;;

        $pengumuman->save();
        return redirect()->route('admin.pengumuman.index')->with('success', 'Berita berhasil dibuat!');
    }
}
