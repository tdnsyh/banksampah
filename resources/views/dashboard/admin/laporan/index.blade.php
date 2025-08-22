@extends('layouts.admin')
@section('title', 'Laporan')

@section('content')
    <form method="GET" class="row g-3 mt-3 mb-4">
        <div class="col-md-3">
            <input type="date" name="start_date" class="form-control" value="{{ $startDate }}">
        </div>
        <div class="col-md-3">
            <input type="date" name="end_date" class="form-control" value="{{ $endDate }}">
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary">Filter</button>
            <button id="btnCetakPDF" class="btn btn-success">Cetak PDF</button>
        </div>
    </form>

    <!-- Statistik Ringkas -->
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Nasabah</h5>
                    <p class="card-text display-6">{{ $totalNasabah }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Setoran</h5>
                    <p class="card-text">{{ $totalSetor->total_berat ?? 0 }} kg</p>
                    <p class="card-text">Rp {{ number_format($totalSetor->total_harga ?? 0, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Total Penarikan</h5>
                    <p class="card-text">Rp {{ number_format($totalTarik ?? 0, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Saldo Total Nasabah</h5>
                    <p class="card-text">Rp {{ number_format($totalSaldo ?? 0, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistik per Jenis Sampah -->
    <div class="h3">Statistik per Jenis Sampah</div>
    <canvas id="chartJenisSampah"></canvas>

    <!-- Riwayat Setor -->
    <div class="h3">Riwayat Setor</div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nasabah</th>
                <th>Tanggal</th>
                <th>Total Berat</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @forelse($riwayatSetor as $index => $setor)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $setor->nasabah->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($setor->tanggal)->format('d-m-Y') }}</td>
                    <td>{{ $setor->total_berat }}</td>
                    <td>Rp {{ number_format($setor->total_harga, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada transaksi setoran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <!-- Riwayat Tarik -->
    <div class="h3">Riwayat Penarikan</div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nasabah</th>
                <th>Tanggal</th>
                <th>Jumlah Penarikan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($riwayatTarik as $index => $tarik)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $tarik->nasabah->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($tarik->tanggal)->format('d-m-Y') }}</td>
                    <td>Rp {{ number_format($tarik->jumlah, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada transaksi penarikan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- jsPDF UMD bundle -->
    <script src="https://cdn.jsdelivr.net/npm/jspdf@2.5.1/dist/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jspdf-autotable@3.5.28/dist/jspdf.plugin.autotable.min.js"></script>

    <script>
        document.getElementById('btnCetakPDF').addEventListener('click', function() {
            // Gunakan jsPDF dari window.jspdf.jsPDF
            var doc = new window.jspdf.jsPDF();

            doc.setFontSize(18);
            doc.text("Laporan Bank Sampah", 14, 22);

            var tanggalCetak = new Date().toLocaleDateString();
            doc.setFontSize(11);
            doc.text("Tanggal: " + tanggalCetak, 14, 30);

            var dataSetor = @json($dataSetor);
            var dataTarik = @json($dataTarik);

            // Tabel Setor
            var headersSetor = [
                ["No", "Nasabah", "Tanggal", "Total Berat (kg)", "Total Harga"]
            ];
            doc.autoTable({
                startY: 40,
                head: headersSetor,
                body: dataSetor,
                theme: 'grid',
                headStyles: {
                    fillColor: [54, 162, 235]
                }
            });

            // Ruang sebelum tabel tarik
            var finalY = doc.lastAutoTable.finalY + 10;

            // Tabel Tarik
            var headersTarik = [
                ["No", "Nasabah", "Tanggal", "Jumlah Penarikan"]
            ];
            doc.autoTable({
                startY: finalY,
                head: headersTarik,
                body: dataTarik,
                theme: 'grid',
                headStyles: {
                    fillColor: [75, 192, 192]
                }
            });

            doc.save('laporan_bank_sampah.pdf');
        });
    </script>
    <script>
        document.getElementById('btnCetakPDF').addEventListener('click', function() {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF();

            // Judul PDF
            doc.setFontSize(18);
            doc.text("Laporan Bank Sampah", 14, 22);

            // Tanggal cetak
            const tanggalCetak = new Date().toLocaleDateString();
            doc.setFontSize(11);
            doc.text("Tanggal: " + tanggalCetak, 14, 30);

            // Ambil data dari controller
            const dataSetor = @json($dataSetor);
            const dataTarik = @json($dataTarik);

            // Tabel Setor
            const headersSetor = [
                ["No", "Nasabah", "Tanggal", "Total Berat (kg)", "Total Harga"]
            ];
            doc.autoTable({
                startY: 40,
                head: headersSetor,
                body: dataSetor,
                theme: 'grid',
                headStyles: {
                    fillColor: [54, 162, 235]
                }
            });

            // Ruang sebelum tabel tarik
            let finalY = doc.lastAutoTable.finalY + 10;

            // Tabel Tarik
            const headersTarik = [
                ["No", "Nasabah", "Tanggal", "Jumlah Penarikan"]
            ];
            doc.autoTable({
                startY: finalY,
                head: headersTarik,
                body: dataTarik,
                theme: 'grid',
                headStyles: {
                    fillColor: [75, 192, 192]
                }
            });

            // Download PDF
            doc.save('laporan_bank_sampah.pdf');
        });
    </script>
@endpush
