@extends('layouts.admin')
@section('title', 'Nasabah')

@section('content')
    <a href="{{ route('nasabah.create') }}" class="btn btn-primary">Tambah Nasabah</a>
    @if ($users->isEmpty())
        <div class="alert alert-warning mt-3 mb-0" role="alert">
            <p class="card-text mb-0">Belum ada data nasabah yang ditambahkan.</p>
        </div>
    @else
        <div class="table-responsive mt-3">
            <table class="table">
                <thead class="table-dark border-0">
                    <tr>
                        <th class="rounded-start">Nama</th>
                        <th>Email</th>
                        <th>Saldo</th>
                        <th class="rounded-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $n)
                        <tr>
                            <td>{{ $n->name }}</td>
                            <td>{{ $n->email }}</td>
                            <td>Rp. {{ $n->saldo->saldo ?? '0' }}</td>
                            <td>
                                <a href="/dashboard" class="btn btn-sm btn-info">Detail</a>
                                <a href="{{ route('nasabah.edit', $n) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('nasabah.destroy', $n) }}" method="POST" style="display:inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
