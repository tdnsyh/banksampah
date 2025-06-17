<x-layout-admin>
    <x-slot:title>{{ $title ?? 'Belum ada title' }}</x-slot:title>
    <div class="card">
        <div class="card-body">
            <div class="page-titles">
                <h2 class="mb-0 fw-bolder fs-8">{{ $title ?? 'Belum ada title' }}</h2>
            </div>
            <div class="mt-3 mt-md-4">
                <a href="{{ route('kategori-sampah.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>
                @if ($kategori->isEmpty())
                    <div class="alert alert-warning mb-0" role="alert">
                        <p class="card-text mb-0">Belum ada data kategori sampah yang ditambahkan.</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="table-dark border-0">
                                    <th class="rounded-start">Nama</th>
                                    <th>Deskripsi</th>
                                    <th class="rounded-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $item)
                                    <tr>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->deskripsi }}</td>
                                        <td>
                                            <a href="{{ route('kategori-sampah.edit', $item) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('kategori-sampah.destroy', $item) }}" method="POST"
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
                @endif
            </div>
        </div>
    </div>
</x-layout-admin>
