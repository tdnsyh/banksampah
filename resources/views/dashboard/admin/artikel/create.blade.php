@extends('layouts.admin')
@section('title', 'Tambah Artikel')

@section('content')
    <form action="{{ route('admin.artikel.simpan') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" id="judul" required value="{{ old('judul') }}">
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" name="kategori" class="form-control" id="kategori" required
                value="{{ old('kategori') }}">
        </div>

        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <input type="text" name="penulis" class="form-control" id="penulis" required value="{{ old('penulis') }}">
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <input type="text" name="isi" class="form-control" id="isi" required value="{{ old('isi') }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/informasi/artikel" class="btn btn-secondary">Batal</a>
    </form>
@endsection
