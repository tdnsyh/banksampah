@extends('layouts.admin')
@section('title', 'Profil')

@section('content')
    <form action="{{ route('nasabah.profil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col col-md-5">
                <div class="ratio ratio-1x1">
                    @if ($user->avatar)
                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar"
                            class="rounded object-fit-cover w-100 h-100">
                    @endif
                </div>

                <div class="row mt-3 mt-md-4 d-flex align-items-center">
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <span class="p-3 bg-primary rounded">
                            <i class="ti ti-clock-hour-1 h4 text-white"></i>
                        </span>
                    </div>
                    <div class="col-10">
                        <p class="mb-1 fw-semibold">Bergabung pada</p>
                        <h6 class="mb-0">{{ $user->created_at->translatedFormat('d F Y') }}</h6>
                    </div>
                </div>
                <div class="row mt-2 mt-md-3 d-flex align-items-center">
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <span class="p-3 bg-warning rounded">
                            <i class="ti ti-history h4 text-white"></i>
                        </span>
                    </div>
                    <div class="col-10">
                        <p class="mb-1 fw-semibold">Terakhir diperbarui</p>
                        <h6 class="mb-0">{{ $user->updated_at->translatedFormat('d F Y') }}</h6>
                    </div>
                </div>
            </div>
            <div class="col col-md-7">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Password Baru (kosongkan jika tidak diubah)</label>
                    <input type="password" name="password" class="form-control">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Avatar (opsional)</label><br>
                    <input type="file" name="avatar" class="form-control">
                    @error('avatar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </div>
    </form>
@endsection
