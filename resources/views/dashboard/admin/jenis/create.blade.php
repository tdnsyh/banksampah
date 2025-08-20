@extends('layouts.admin')
@section('title', 'Jenis Sampah')

@section('content')
    <form action="{{ route('jenis-sampah.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kategori_sampah_id">Kategori</label>
            <select name="kategori_sampah_id" class="form-control" required>
                <option value="">Pilih Kategori</option>
                @foreach ($kategori as $k)
                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nama">Nama Jenis Sampah</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="harga_per_kg">Harga per Kg</label>
            <input type="number" name="harga_per_kg" step="0.01" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('jenis-sampah.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
