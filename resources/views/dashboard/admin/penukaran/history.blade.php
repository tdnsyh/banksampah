@extends('layouts.admin')
@section('title', 'Riwayat Penukaran')

@section('content')
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nasabah</th>
                <th>Tanggal</th>
                <th>Jumlah Penarikan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transaksis as $index => $transaksi)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $transaksi->nasabah->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d-m-Y') }}</td>
                    <td>Rp {{ number_format($transaksi->jumlah, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada transaksi penarikan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
