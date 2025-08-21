<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminNasabahController extends Controller
{
    public function index()
    {
        $title = 'Data Nasabah';
        $users = User::with('nasabah')->where('id', '!=', Auth::id())->get();
        return view('dashboard.admin.nasabah.index', compact('users', 'title'));
    }

    public function create()
    {
        $title = 'Tambah Nasabah';
        return view('dashboard.admin.nasabah.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required|in:admin,nasabah',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('nasabah.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function edit(User $nasabah)
    {
        $title = 'Edit Nasabah';
        return view('dashboard.admin.nasabah.edit', ['nasabah' => $nasabah], compact('title'));
    }

    public function update(Request $request, User $nasabah)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$nasabah->id,
            'role' => 'required|in:nasabah,admin',
        ]);

        $nasabah->update($request->only('name', 'email', 'role'));

        return redirect()->route('nasabah.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function destroy(User $nasabah)
    {
        $nasabah->delete();
        return redirect()->route('nasabah.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
