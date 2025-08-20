@extends('layouts.admin')
@section('title', 'Tambah Pengumuman')

@section('content')
    <form action="{{ route('admin.pengumuman.simpan') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" id="judul" required value="{{ old('judul') }}">
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <input type="text" name="isi" class="form-control" id="isi" required value="{{ old('isi') }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/informasi/pengumuman/index" class="btn btn-secondary">Batal</a>
    </form>
@endsection
