<x-layout-admin>
    <x-slot:title>{{ $title ?? 'Belum ada title' }}</x-slot:title>
    <div class="card">
        <div class="card-body">
            <div class="page-titles">
                <h2 class="mb-0 fw-bolder fs-8">{{ $title ?? 'Belum ada title' }}</h2>
            </div>
            <div class="mt-3 mt-md-4">
                <a href="/informasi/artikel/tambah" class="btn btn-primary mb-3">Tambah Artikel</a>

                <div class="art">
                    <div class="row row-cols-1 row-cols-md-3">
                        @foreach ($artikel as $a)
                        <div class="col">
                            <div class="card border shadow-none">
                                <div class="card-body">
                                    <p class="card-title">{{ $a->judul }}</p>
                                    <p class="card-text">{{ $a->isi }}</p>
                                    <p class="text-muted mb-0">{{ $a->penulis }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout-admin>
