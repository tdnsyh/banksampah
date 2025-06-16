<x-layout-admin>
    <x-slot:title>{{ $title ?? 'Belum ada title' }}</x-slot:title>
    <div class="card">
        <div class="card-body">
            <div class="page-titles">
                <h2 class="mb-0 fw-bolder fs-8">{{ $title ?? 'Belum ada title' }}</h2>
            </div>
            <div class="mt-3 mt-md-4">
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
            </div>
        </div>
    </div>
</x-layout-admin>
