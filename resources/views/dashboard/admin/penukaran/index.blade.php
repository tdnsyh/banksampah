@extends('layouts.admin')
@section('title', 'Penukaran')

@section('content')
    <form action="{{ route('admin.penukaran.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nasabah_id" class="form-label">Pilih Nasabah</label>
            <select name="nasabah_id" id="nasabah_id" class="form-select" required>
                <option value="">-- Pilih Nasabah --</option>
                @foreach ($nasabahs as $nasabah)
                    <option value="{{ $nasabah->id }}">{{ $nasabah->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Penarikan</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah Uang</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" min="1" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Tarik Uang</button>
    </form>
@endsection
