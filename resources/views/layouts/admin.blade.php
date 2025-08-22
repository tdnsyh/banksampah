<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Default') - Banksampah</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    @stack('style')
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <aside class="left-sidebar">
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="text-nowrap logo-img">
                        <img src="{{ asset('assets/images/logos/dark-logo.svg') }}" width="180" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <!-- Menu Utama -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin" aria-expanded="false">
                                <span><i class="ti ti-layout-dashboard"></i></span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>

                        <!-- Data Master -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Transaksi</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/transaksi/baru" aria-expanded="false">
                                <span><i class="ti ti-transfer-in"></i></span>
                                <span class="hide-menu">Transaksi baru</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/transaksi/riwayat" aria-expanded="false">
                                <span><i class="ti ti-history"></i></span>
                                <span class="hide-menu">Riwayat Transaksi</span>
                            </a>
                        </li>

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Penukaran</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/penukaran/baru" aria-expanded="false">
                                <span><i class="ti ti-transfer-in"></i></span>
                                <span class="hide-menu">Penukaran Baru</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/penukaran/riwayat" aria-expanded="false">
                                <span><i class="ti ti-history"></i></span>
                                <span class="hide-menu">Riwayat Penukaran</span>
                            </a>
                        </li>

                        <!-- Data Master -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Data Master</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/data/nasabah" aria-expanded="false">
                                <span><i class="ti ti-users"></i></span>
                                <span class="hide-menu">Nasabah</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/data/kategori-sampah" aria-expanded="false">
                                <span><i class="ti ti-category"></i></span>
                                <span class="hide-menu">Kategori Sampah</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/data/jenis-sampah" aria-expanded="false">
                                <span><i class="ti ti-trash"></i></span>
                                <span class="hide-menu">Jenis Sampah</span>
                            </a>
                        </li>

                        <!-- Laporan -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Laporan</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/laporan" aria-expanded="false">
                                <span><i class="ti ti-file-text"></i></span>
                                <span class="hide-menu">Laporan</span>
                            </a>
                        </li>

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Informasi</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/artikel" aria-expanded="false">
                                <span><i class="ti ti-news"></i></span>
                                <span class="hide-menu">Artikel</span>
                            </a>
                        </li>

                        <!-- Akun -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Akun</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/profil" aria-expanded="false">
                                <span><i class="ti ti-user"></i></span>
                                <span class="hide-menu">Profil</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="body-wrapper">
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                                <i class="ti ti-bell-ringing"></i>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="../assets/images/profile/user-1.jpg" alt="" width="35"
                                        height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-mail fs-6"></i>
                                            <p class="mb-0 fs-3">My Account</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-list-check fs-6"></i>
                                            <p class="mb-0 fs-3">My Task</p>
                                        </a>
                                        <a href="./authentication-login.html"
                                            class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            {{-- isi --}}
            <div class="container-fluid">

                {{-- isi konten --}}
                <div class="isi">
                    <div class="card">
                        <div class="card-body">
                            <div class="page-titles">
                                <h2 class="mb-0 fw-bolder fs-8">@yield('title', 'Default')</h2>
                            </div>
                            <div class="mt-3 mt-md-4">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>


                {{-- footer --}}
                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2025 &copy; Desa Sariwangi</p>
                        </div>
                        <div class="float-end">
                            <p>Crafted with <span class="text-danger">
                                    <i class="bi bi-heart-fill icon-mid"></i></span>
                                by <a href="https://codemalaya.vercel.app" class="text-decoration-none">Rsf</a>
                            </p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
    @stack('script')
</body>

</html>
