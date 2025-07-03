<x-layout-admin>
    <x-slot:title>{{ $title ?? 'Belum ada title' }}</x-slot:title>
    <div class="card">
        <div class="card-body">
            <div class="page-titles">
                <h2 class="mb-0 fw-bolder fs-8">{{ $title ?? 'Belum ada title' }}</h2>
            </div>
            <div class="mt-3 mt-md-4">
                <a href="/transaksi/baru" class="btn btn-primary">Transaksi Baru</a>
                <div class="table-responsive mt-3">
                    <table class="table table-stripped">
                        <thead class="table-primary border-0">
                            <tr>
                                <th>Nasabah</th>
                                <th>Tanggal</th>
                                <th>Total Berat</th>
                                <th>Total Harga</th>
                                <th>Rincian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksis as $trx)
                                <tr>
                                    <td>{{ $trx->nasabah->name }}</td>
                                    <td>{{ $trx->tanggal }}</td>
                                    <td>{{ $trx->total_berat }} kg</td>
                                    <td>Rp {{ number_format($trx->total_harga, 2, ',', '.') }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($trx->details as $detail)
                                                <li>{{ $detail->jenisSampah->nama }} - {{ $detail->berat }} kg (Rp
                                                    {{ number_format($detail->subtotal, 2, ',', '.') }})</li>
                                            @endforeach
                                        </ul>
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
