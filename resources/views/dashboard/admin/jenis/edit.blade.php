@extends('layouts.admin')
@section('title', 'Edit Jenis Sampah')

@section('content')
    <form action="{{ route('jenis-sampah.update', $jenis_sampah) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="kategori_sampah_id">Kategori</label>
            <select name="kategori_sampah_id" class="form-control" required>
                @foreach ($kategori as $k)
                    <option value="{{ $k->id }}" {{ $jenis_sampah->kategori_sampah_id == $k->id ? 'selected' : '' }}>
                        {{ $k->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nama">Nama Jenis Sampah</label>
            <input type="text" name="nama" class="form-control" value="{{ $jenis_sampah->nama }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $jenis_sampah->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label for="harga_per_kg">Harga per Kg</label>
            <input type="number" name="harga_per_kg" step="0.01" class="form-control"
                value="{{ $jenis_sampah->harga_per_kg }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('jenis-sampah.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
