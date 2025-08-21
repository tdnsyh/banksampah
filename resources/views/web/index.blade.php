@extends('layouts.public')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-dark bg-success sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">Bank Sampah Sariwangi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#profil">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#lokasi">Lokasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#artikel">Artikel</a>
                    </li>
                </ul>
                <a href="/login" class="btn btn-light ms-lg-3">Daftar Sekarang</a>
            </div>
        </div>
    </nav>

    <section class="bg-success text-white d-flex align-items-center"
        style="background: url('https://images.unsplash.com/photo-1562077981-4d7eafd44932?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') center/cover no-repeat; min-height: 100vh;">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Selamat Datang di Bank Sampah Sariwangi</h1>
            <p class="lead mb-4">Mari bersama-sama menjaga lingkungan dengan mengelola sampah secara bertanggung jawab dan
                mendapatkan manfaatnya.</p>

            <div class="row justify-content-center mb-4">
                <div class="col-md-3">
                    <h2 class="fw-bold">500+</h2>
                    <p>Warga Bergabung</p>
                </div>
                <div class="col-md-3">
                    <h2 class="fw-bold">10 Ton</h2>
                    <p>Sampah Terkelola</p>
                </div>
                <div class="col-md-3">
                    <h2 class="fw-bold">Rp 50jt</h2>
                    <p>Tabungan Warga</p>
                </div>
            </div>
            <a href="#daftar" class="btn btn-light btn-lg fw-bold me-2">Daftar Sekarang</a>
            <a href="#tentang" class="btn btn-outline-light btn-lg fw-bold">Pelajari Lebih Lanjut</a>
        </div>
    </section>

    <section id="profil" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Profil Bank Sampah</h2>
            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="card border">
                        <div class="card-body">
                            <h4 class="card-title fw-bold">Sejarah</h4>
                            <p class="card-text">
                                Bank Sampah Sariwangi didirikan pada tahun 2015 oleh sekelompok warga peduli lingkungan.
                                Berawal dari inisiatif sederhana mengumpulkan sampah plastik di lingkungan sekitar, kini
                                telah berkembang menjadi lembaga pengelolaan sampah yang terpercaya, dengan ratusan anggota
                                dan program edukasi lingkungan yang aktif.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border mb-3">
                        <div class="card-body">
                            <h4 class="card-title fw-bold">Visi</h4>
                            <p class="card-text">Menjadi pusat pengelolaan sampah yang berkelanjutan, meningkatkan kesadaran
                                masyarakat, dan memberikan manfaat ekonomi bagi warga Sariwangi.</p>
                        </div>
                    </div>
                    <div class="card border mb-3">
                        <div class="card-body">
                            <h4 class="card-title fw-bold">Misi</h4>
                            <ul class="card-text">
                                <li>Mengelola sampah rumah tangga dengan sistem bank sampah yang efisien.</li>
                                <li>Meningkatkan kesadaran lingkungan masyarakat Sariwangi.</li>
                                <li>Memberikan insentif ekonomi melalui penukaran sampah menjadi tabungan.</li>
                                <li>Mendorong partisipasi aktif komunitas dan sekolah.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="lokasi" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Lokasi Kami</h2>

            <div class="row justify-content-center">
                <div class="col-md-5">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31633.123456789!2d107.123456!3d-6.123456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x123456789abcdef!2sBank%20Sampah%20Sariwangi!5e0!3m2!1sen!2sid!4v1234567890"
                        width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" class="rounded">
                    </iframe>
                </div>
                <div class="col-md-7">
                    <h4 class="card-title fw-bold">Kontak</h4>
                    <p class="card-text">
                        <strong>Alamat:</strong> Jl. Sariwangi No. 12, Kecamatan Sariwangi, Kota Bandung, Jawa
                        Barat, Indonesia<br>
                        <strong>Telepon:</strong> +62 812-3456-7890<br>
                        <strong>Email:</strong> info@banksampahsariwangi.id
                    </p>
                    <div class="mt-3">
                        <a href="https://wa.me/6281234567890" class="btn btn-success me-2" target="_blank">Chat
                            WhatsApp</a>
                        <a href="mailto:info@banksampahsariwangi.id" class="btn btn-primary">Kirim Email</a>
                    </div>

                    <div class="mt-3">
                        <h4 class="card-title fw-bold">Jadwal Operasional</h4>
                        <table class="table table-borderless mb-0 p-3 rounded">
                            <tbody>
                                <tr>
                                    <td>Senin - Jumat</td>
                                    <td>08:00 - 16:00</td>
                                </tr>
                                <tr>
                                    <td>Sabtu</td>
                                    <td>08:00 - 12:00</td>
                                </tr>
                                <tr>
                                    <td>Minggu & Hari Libur</td>
                                    <td>Tutup</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Artikel -->
    <section id="artikel" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Artikel Terbaru</h2>
            <div class="row g-4">
                @foreach ($artikels as $artikel)
                    <div class="col-md-3">
                        <div class="card h-100 shadow-sm">
                            @if ($artikel->gambar)
                                <img src="{{ asset('storage/' . $artikel->gambar) }}" class="card-img-top"
                                    alt="{{ $artikel->judul }}">
                            @else
                                <img src="https://via.placeholder.com/300x200" class="card-img-top"
                                    alt="{{ $artikel->judul }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $artikel->judul }}</h5>
                                <p class="card-text">{{ Str::limit($artikel->isi, 80) }}</p>
                                <a href="{{ route('artikel.show', $artikel->slug) }}" class="btn btn-success btn-sm">Baca
                                    Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="container">
        <footer class="py-3 my-4">
            <!-- Footer Navigation -->
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item">
                    <a href="/" class="nav-link px-3 text-success fw-bold">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#profil" class="nav-link px-3 text-success fw-bold">Profil</a>
                </li>
                <li class="nav-item">
                    <a href="#lokasi" class="nav-link px-3 text-success fw-bold">Lokasi</a>
                </li>
                <li class="nav-item">
                    <a href="#artikel" class="nav-link px-3 text-success fw-bold">Artikel</a>
                </li>
            </ul>
            <p class="text-center text-body-secondary">© 2025 Company, Inc</p>
        </footer>
    </div>
@endsection
