@extends('layouts.public')

@section('content')
    <div class="d-flex min-vh-100 justify-content-center align-items-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-none border">
                <div class="card-body px-md-5 px-3">
                    <div class="text-center">
                        <a href="/register" class="d-block mb-3">
                            <img src="https://i.pinimg.com/736x/0d/cf/b5/0dcfb548989afdf22afff75e2a46a508.jpg"
                                class="border-0 rounded object-fit-cover" width="150" alt="Logo">
                        </a>
                        <h3 class="fw-semibold">Belum punya akun?</h3>
                        <p>Daftar sekarang dan mulai nikmati kemudahan pemesanan berbasis QR yang cepat dan praktis.</p>
                    </div>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="row row-cols-1 row-cols-md-2">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Kata sandi</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Konfirmasi
                                        kata sandi</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success w-100 shadow-none">Register</button>
                        <div class="mt-2">
                            <p>
                                Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none">Masuk
                                    disini!</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
