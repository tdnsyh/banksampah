<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisSampah;
use App\Models\KategoriSampah;

class AdminJenisController extends Controller
{
    public function index()
    {
        $title = 'Jenis Sampah';
        $jenis = JenisSampah::with('kategori')->get();
        return view('dashboard.admin.jenis.index', compact('jenis', 'title'));
    }

    public function create()
    {
        $title = 'Tambah Jenis Sampah';
        $kategori = KategoriSampah::all();
        return view('dashboard.admin.jenis.create', compact('kategori','title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_sampah_id' => 'required|exists:kategori_sampah,id',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga_per_kg' => 'required|numeric|min:0',
        ]);

        JenisSampah::create($request->all());
        return redirect()->route('jenis-sampah.index')->with('success', 'Jenis sampah berhasil ditambahkan.');
    }

    public function edit(JenisSampah $jenis_sampah)
    {
        $title = 'Edit Jenis Sampah';
        $kategori = KategoriSampah::all();
        return view('dashboard.admin.jenis.edit', compact('jenis_sampah', 'kategori', 'title'));
    }

    public function update(Request $request, JenisSampah $jenis_sampah)
    {
        $request->validate([
            'kategori_sampah_id' => 'required|exists:kategori_sampah,id',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga_per_kg' => 'required|numeric|min:0',
        ]);

        $jenis_sampah->update($request->all());
        return redirect()->route('jenis-sampah.index')->with('success', 'Jenis sampah berhasil diperbarui.');
    }

    public function destroy(JenisSampah $jenis_sampah)
    {
        $jenis_sampah->delete();
        return redirect()->route('jenis-sampah.index')->with('success', 'Jenis sampah berhasil dihapus.');
    }
}
