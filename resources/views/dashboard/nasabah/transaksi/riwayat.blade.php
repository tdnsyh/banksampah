@extends('layouts.nasabah')
@section('title', 'Riwayat Transaksi')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="mb-3">Saldo dan Riwayat</h1>
            <div class="alert alert-info mt-3">
                <strong>Saldo saya:</strong>
                <h1 class="fw-semibold">Rp {{ number_format($saldo_terakhir, 0, ',', '.') }}</h1>
            </div>

            <h4>Riwayat Setor</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Total Berat (kg)</th>
                        <th>Total Harga (Rp)</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transaksiSetor as $index => $setor)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ \Carbon\Carbon::parse($setor->tanggal)->format('d-m-Y') }}</td>
                            <td>{{ $setor->total_berat }}</td>
                            <td>Rp {{ number_format($setor->total_harga, 0, ',', '.') }}</td>
                            <td>
                                <ul>
                                    @foreach ($setor->details as $detail)
                                        <li>{{ $detail->jenisSampah->nama }}: {{ $detail->berat }} kg = Rp
                                            {{ number_format($detail->subtotal, 0, ',', '.') }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada transaksi setor.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <h4>Riwayat Penarikan</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Jumlah Penarikan (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transaksiTarik as $index => $tarik)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ \Carbon\Carbon::parse($tarik->tanggal)->format('d-m-Y') }}</td>
                            <td>Rp {{ number_format($tarik->jumlah, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Belum ada transaksi penarikan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
