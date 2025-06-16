<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriSampah;

class AdminKategoriController extends Controller
{
    public function index()
    {
        $title = 'Kategori Sampah';
        $kategori = KategoriSampah::all();
        return view('dashboard.admin.kategori.index', compact('kategori', 'title'));
    }

    public function create()
    {
        $title = 'Tambah Kategori Sampah';
        return view('dashboard.admin.kategori.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        KategoriSampah::create($request->all());
        return redirect()->route('kategori-sampah.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(KategoriSampah $kategori_sampah)
    {
        $title = 'Edit Kategori Sampah';
        return view('dashboard.admin.kategori.edit', compact('kategori_sampah', 'title'));
    }

    public function update(Request $request, KategoriSampah $kategori_sampah)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        $kategori_sampah->update($request->all());
        return redirect()->route('kategori-sampah.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(KategoriSampah $kategori_sampah)
    {
        $kategori_sampah->delete();
        return redirect()->route('kategori-sampah.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
