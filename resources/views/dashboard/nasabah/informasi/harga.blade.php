@extends('layouts.nasabah')
@section('title', 'Harga')

@section('content')
    <h1>Harga</h1>
    @if ($jenis->isEmpty())
        <div class="alert alert-warning mb-0" role="alert">
            <p class="card-text mb-0">Belum ada informasi harga.</p>
        </div>
    @else
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr class="table-dark border-0">
                        <th class="rounded-start">Kategori</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Harga/Kg</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jenis as $item)
                        <tr>
                            <td>{{ $item->kategori->nama }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>Rp {{ number_format($item->harga_per_kg, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
