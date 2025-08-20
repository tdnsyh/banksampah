@extends('layouts.admin')
@section('title', 'Artikel')

@section('content')
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
@endsection
