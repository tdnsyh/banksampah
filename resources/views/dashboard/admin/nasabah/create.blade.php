<x-layout-admin>
    <x-slot:title>{{ $title ?? 'Belum ada title' }}</x-slot:title>
    <div class="card">
        <div class="card-body">
            <div class="page-titles">
                <h2 class="mb-0 fw-bolder fs-8">{{ $title ?? 'Belum ada title' }}</h2>
            </div>
            <div class="mt-3 mt-md-4">
                <form action="{{ route('nasabah.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" id="name" required
                            value="{{ old('name') }}">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" name="email" class="form-control" id="email" required
                            value="{{ old('email') }}">
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Peran / Role</label>
                        <select name="role" class="form-select" required>
                            <option value="" disabled selected>-- Pilih Role --</option>
                            <option value="nasabah" {{ old('role') == 'nasabah' ? 'selected' : '' }}>Nasabah</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Pengguna</button>
                    <a href="{{ route('nasabah.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>
