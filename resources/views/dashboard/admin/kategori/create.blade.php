@extends('layouts.admin')
@section('title', 'Tambah Artikel')

@section('content')
    <form action="{{ route('kategori-sampah.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Kategori</label>
            <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('kategori-sampah.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
