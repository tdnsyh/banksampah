<x-layout-admin>
    <x-slot:title>{{ $title ?? 'Belum ada title' }}</x-slot:title>
    <div class="card">
        <div class="card-body">
            <div class="page-titles">
                <h2 class="mb-0 fw-bolder fs-8">{{ $title ?? 'Belum ada title' }}</h2>
            </div>
            <div class="mt-3 mt-md-4">
                <a href="/informasi/pengumuman/tambah" class="btn btn-primary mb-3">Tambah Pengumuman</a>
            </div>
        </div>
    </div>
</x-layout-admin>