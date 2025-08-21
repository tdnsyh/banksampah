@extends('layouts.public')

@section('content')
    <div class="d-flex min-vh-100 justify-content-center align-items-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-none border">
                <div class="card-body px-md-5 px-3 text-center">
                    <a href="/login" class="d-block mb-3">
                        <img src="https://i.pinimg.com/736x/0d/cf/b5/0dcfb548989afdf22afff75e2a46a508.jpg"
                            class="border-0 rounded object-fit-cover" width="150" alt="Logo">
                    </a>
                    <h3 class="fw-semibold mb-2">Selamat datang kembali!</h3>
                    <p class="mb-4">Masuk untuk mengelola dan melakukan pemesanan berbasis QR dengan mudah dan cepat.
                    </p>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3 text-start">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>
                    </form>
                    <p>
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="text-decoration-none">Daftar disini!</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
