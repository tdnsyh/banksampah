@extends('layouts.admin')
@section('title', 'Edit Nasabah')

@section('content')
    <form action="{{ route('nasabah.update', $nasabah->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" name="name" class="form-control" id="name" required
                value="{{ old('name', $nasabah->name) }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Alamat Email</label>
            <input type="email" name="email" class="form-control" id="email" required
                value="{{ old('email', $nasabah->email) }}">
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Peran / Role</label>
            <select name="role" class="form-select" required>
                <option value="nasabah" {{ $nasabah->role == 'nasabah' ? 'selected' : '' }}>Nasabah</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Pengguna</button>
        <a href="{{ route('nasabah.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
