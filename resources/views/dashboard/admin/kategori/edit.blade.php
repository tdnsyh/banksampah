@extends('layouts.admin')
@section('title', 'Edit Kategori Sampah')

@section('content')
    <form action="{{ route('kategori-sampah.update', $kategori_sampah) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Kategori</label>
            <input type="text" name="nama" class="form-control" id="nama"
                value="{{ old('nama', $kategori_sampah->nama) }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3">{{ old('deskripsi', $kategori_sampah->deskripsi) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('kategori-sampah.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
