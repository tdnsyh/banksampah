<x-layout-admin>
    <x-slot:title>{{ $title ?? 'Belum ada title' }}</x-slot:title>
    <div class="card">
        <div class="card-body">
            <div class="page-titles">
                <h2 class="mb-0 fw-bolder fs-8">{{ $title ?? 'Belum ada title' }}</h2>
            </div>
            <div class="mt-3 mt-md-4">
                <form action="{{ route('kategori-sampah.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kategori</label>
                        <input type="text" name="nama" class="form-control" id="nama"
                            value="{{ old('nama') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('kategori-sampah.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>
