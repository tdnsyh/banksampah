<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminInformasiController extends Controller
{
    public function index()
    {
        $artikels = Artikel::latest()->paginate(10);
        return view('dashboard.admin.artikel.index', compact('artikels'));
    }

    public function create()
    {
        return view('dashboard.admin.artikel.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'penulis' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['judul']);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('artikel', 'public');
        }

        Artikel::create($validated);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dibuat!');
    }

    public function show(Artikel $artikel)
    {
        return view('dashboard.admin.artikel.show', compact('artikel'));
    }

    public function edit(Artikel $artikel)
    {
        return view('dashboard.admin.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, Artikel $artikel)
    {
        $validated = $request->validate([
            'kategori' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'penulis' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['judul']);

        if ($request->hasFile('gambar')) {
            if ($artikel->gambar) {
                \Storage::disk('public')->delete($artikel->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('artikel', 'public');
        }

        $artikel->update($validated);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy(Artikel $artikel)
    {
        if ($artikel->gambar) {
            \Storage::disk('public')->delete($artikel->gambar);
        }

        $artikel->delete();

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus!');
    }
}
