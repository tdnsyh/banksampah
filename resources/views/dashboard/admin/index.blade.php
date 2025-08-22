@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
    <div class="row mt-3">
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

    <!-- Riwayat Terakhir -->
    <div class="row mt-4">
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-header bg-primary text-white">5 Transaksi Setor Terakhir</div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($riwayatSetor as $setor)
                            <li class="list-group-item">
                                {{ $setor->nasabah->name }} - {{ \Carbon\Carbon::parse($setor->tanggal)->format('d-m-Y') }}
                                - Rp {{ number_format($setor->total_harga, 0, ',', '.') }} ({{ $setor->total_berat }} kg)
                            </li>
                        @empty
                            <li class="list-group-item">Belum ada transaksi setoran.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-header bg-success text-white">5 Penarikan Terakhir</div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($riwayatTarik as $tarik)
                            <li class="list-group-item">
                                {{ $tarik->nasabah->name }} -
                                {{ \Carbon\Carbon::parse($tarik->tanggal)->format('d-m-Y') }} - Rp
                                {{ number_format($tarik->jumlah, 0, ',', '.') }}
                            </li>
                        @empty
                            <li class="list-group-item">Belum ada transaksi penarikan.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
