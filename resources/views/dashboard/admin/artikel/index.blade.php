@extends('layouts.admin')
@section('title', 'Artikel')

@section('content')
    <a href="{{ route('admin.artikel.create') }}" class="btn btn-primary mb-3">Buat Artikel Baru</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Penulis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($artikels as $artikel)
                <tr>
                    <td>{{ $artikel->judul }}</td>
                    <td>{{ $artikel->kategori }}</td>
                    <td>{{ $artikel->penulis }}</td>
                    <td>
                        <a href="{{ route('admin.artikel.show', $artikel->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('admin.artikel.edit', $artikel->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.artikel.destroy', $artikel->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Hapus artikel ini?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada artikel</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $artikels->links() }}
@endsection
