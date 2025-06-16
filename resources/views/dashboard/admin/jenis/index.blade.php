<x-layout-admin>
    <x-slot:title>{{ $title ?? 'Belum ada title' }}</x-slot:title>
    <div class="card">
        <div class="card-body">
            <div class="page-titles">
                <h2 class="mb-0 fw-bolder fs-8">{{ $title ?? 'Belum ada title' }}</h2>
            </div>
            <div class="mt-3 mt-md-4">
                <a href="{{ route('jenis-sampah.create') }}" class="btn btn-primary mb-3">Tambah Jenis</a>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Kategori</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Harga/Kg</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jenis as $item)
                                <tr>
                                    <td>{{ $item->kategori->nama }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td>Rp {{ number_format($item->harga_per_kg, 0, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('jenis-sampah.edit', $item) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('jenis-sampah.destroy', $item) }}" method="POST"
                                            style="display:inline;">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout-admin>
