@extends('layouts.admin')
@section('title', 'Transaksi')

@section('content')
    <form action="{{ route('admin.transaksi.store') }}" method="POST" id="form-transaksi">
        @csrf
        <div class="row row-cols-1 row-cols-md-2">
            <!-- Form kiri -->
            <div class="col-md-8 col">
                <div class="mb-3">
                    <label for="nasabah_id" class="form-label">Pilih Nasabah</label>
                    <select name="nasabah_id" id="nasabah_id" class="form-select" required>
                        <option value="">-- Pilih Nasabah --</option>
                        @foreach ($nasabah as $n)
                            <option value="{{ $n->id }}" data-nama="{{ $n->name }}">
                                {{ $n->name }} - {{ $n->email }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal Setor</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <div id="sampah-wrapper">
                    <div class="row row-cols-3 mb-2">
                        <div class="col-md-6">
                            <select name="jenis_sampah_id[]" class="form-select" required>
                                <option value="">Pilih Jenis Sampah</option>
                                @foreach ($jenisSampah as $sampah)
                                    <option value="{{ $sampah->id }}" data-harga="{{ $sampah->harga_per_kg }}">
                                        {{ $sampah->nama }} (Rp
                                        {{ number_format($sampah->harga_per_kg, 2, ',', '.') }}/kg)
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input type="number" name="berat[]" class="form-control" placeholder="Berat (kg)"
                                min="0.1" step="0.1" required>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger btn-remove">Hapus</button>
                        </div>
                    </div>
                </div>
                <button type="button" id="btn-tambah" class="btn btn-secondary">Tambah
                    Sampah</button>
            </div>

            <!-- Sidebar kanan -->
            <div class="col-md-4 col">
                <p><strong>Nama Nasabah:</strong> <span id="info-nama">-</span></p>
                <p><strong>Total Berat:</strong> <span id="total-berat">0.00</span> kg</p>
                <p><strong>Total Harga:</strong> <span id="total-harga">Rp 0,00</span></p>
                <hr>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Simpan Transaksi</button>
                </div>
            </div>
        </div>
    </form>
@endsection


@push('script')
    <script>
        // Fungsi format angka ke rupiah
        function formatRupiah(angka) {
            return 'Rp ' + angka.toLocaleString('id-ID', {
                minimumFractionDigits: 2
            });
        }

        function hitungTotal() {
            let totalBerat = 0;
            let totalHarga = 0;

            document.querySelectorAll('#sampah-wrapper .row').forEach(function(row) {
                const select = row.querySelector('select[name="jenis_sampah_id[]"]');
                const beratInput = row.querySelector('input[name="berat[]"]');

                const berat = parseFloat(beratInput.value) || 0;
                const hargaPerKg = parseFloat(select.selectedOptions[0]?.getAttribute('data-harga') || 0);

                totalBerat += berat;
                totalHarga += berat * hargaPerKg;
            });

            document.getElementById('total-berat').textContent = totalBerat.toFixed(2);
            document.getElementById('total-harga').textContent = formatRupiah(totalHarga);
        }

        // Tambah baris input
        document.getElementById('btn-tambah').addEventListener('click', function() {
            const wrapper = document.getElementById('sampah-wrapper');
            const row = wrapper.firstElementChild.cloneNode(true);
            row.querySelectorAll('input, select').forEach(el => el.value = '');
            wrapper.appendChild(row);
            hitungTotal();
        });

        // Hapus baris
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('btn-remove')) {
                const rows = document.querySelectorAll('#sampah-wrapper .row');
                if (rows.length > 1) {
                    e.target.closest('.row').remove();
                    hitungTotal();
                }
            }
        });

        // Update info nasabah
        document.getElementById('nasabah_id').addEventListener('change', function() {
            const nama = this.selectedOptions[0]?.getAttribute('data-nama') || '-';
            document.getElementById('info-nama').textContent = nama;
        });

        // Perbarui total saat berat atau jenis sampah diubah
        document.addEventListener('input', function(e) {
            if (e.target.name === 'berat[]' || e.target.name === 'jenis_sampah_id[]') {
                hitungTotal();
            }
        });

        document.addEventListener('change', function(e) {
            if (e.target.name === 'berat[]' || e.target.name === 'jenis_sampah_id[]') {
                hitungTotal();
            }
        });
    </script>
@endpush
