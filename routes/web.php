<?php

use App\Http\Controllers\Dashboard\Admin\AdminDashboardController;
use App\Http\Controllers\Dashboard\Nasabah\NasabahDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\Admin\AdminInformasiController;
use App\Http\Controllers\Dashboard\Admin\AdminJenisController;
use App\Http\Controllers\Dashboard\Admin\AdminKategoriController;
use App\Http\Controllers\Dashboard\Admin\AdminLaporanController;
use App\Http\Controllers\Dashboard\Admin\AdminNasabahController;
use App\Http\Controllers\Dashboard\Admin\AdminPenukaranController;
use App\Http\Controllers\Dashboard\Admin\AdminProfilController;
use App\Http\Controllers\Dashboard\Admin\AdminTransaksiController;
use App\Http\Controllers\Dashboard\Nasabah\NasabahInformasiController;
use App\Http\Controllers\Dashboard\Nasabah\NasabahProfilController;
use App\Http\Controllers\Dashboard\Nasabah\NasabahTransaksiController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
});

// auth route
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard.index');

    Route::resource('/data/nasabah', AdminNasabahController::class);
    Route::resource('/data/kategori-sampah', AdminKategoriController::class);
    Route::resource('/data/jenis-sampah', AdminJenisController::class);

    Route::prefix('/admin/profil')->name('admin.profil.')->group(function () {
        Route::post('/update', [AdminProfilController::class, 'profilUpdate'])->name('update');
        Route::get('/', [AdminProfilController::class, 'profilIndex'])->name('index');
    });


    Route::prefix('/transaksi')->name('admin.transaksi.')->group(function () {
        Route::get('/baru', [AdminTransaksiController::class, 'transaksiIndex'])->name('index');
        Route::get('/riwayat', [AdminTransaksiController::class, 'transaksiHistori'])->name('histori');
        Route::post('/simpan', [AdminTransaksiController::class, 'store'])->name('store');
    });

    Route::prefix('/penukaran')->name('admin.penukaran.')->group(function () {
        Route::get('/baru', [AdminPenukaranController::class, 'penukaranIndex'])->name('index');
        Route::get('/riwayat', [AdminPenukaranController::class, 'penukaranHistori'])->name('histori');
    });

    Route::get('/laporan', [AdminLaporanController::class, 'laporanIndex'])->name('admin.laporan.index');
    Route::get('/informasi/artikel', [AdminInformasiController::class, 'artikelIndex'])->name('admin.artikel.index');
    Route::get('/informasi/artikel/tambah', [AdminInformasiController::class, 'artikelTambah'])->name('admin.artikel.tambah');
    Route::post('/informasi/artikel/simpan', [AdminInformasiController::class, 'store'])->name('admin.artikel.simpan');
    Route::get('/informasi/pengumuman/tambah', [AdminInformasiController::class, 'pengumumanTambah'])->name('admin.pengumuman.tambah');
    Route::post('/informasi/pengumuman/simpan', [AdminInformasiController::class, 'pengumumanStore'])->name('admin.pengumuman.simpan');
    Route::get('/informasi/pengumuman-data', [AdminInformasiController::class, 'pengumumanIndex'])->name('admin.pengumuman.index');

});

Route::middleware(['auth', RoleMiddleware::class . ':nasabah'])->group(function () {
    Route::get('/nasabah/dashboard', [NasabahDashboardController::class, 'index'])->name('nasabah.dashboard.index');
    Route::get('/transaksi/riwayat-dan-saldo', [NasabahTransaksiController::class, 'riwayatIndex'])->name('nasabah.riwayat.index');
    Route::get('/informasi/harga', [NasabahInformasiController::class, 'hargaIndex'])->name('nasabah.harga.index');
    Route::get('/informasi/pengumuman', [NasabahInformasiController::class, 'pengumumanIndex'])->name('nasabah.pengumuman.index');

    Route::prefix('/nasabah/profil')->name('nasabah.profil.')->group(function () {
        Route::post('/update', [NasabahProfilController::class, 'profilUpdate'])->name('update');
        Route::get('/', [NasabahProfilController::class, 'profilIndex'])->name('index');
    });
});