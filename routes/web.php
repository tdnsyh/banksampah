<?php

use App\Http\Controllers\Dashboard\Admin\AdminDashboardController;
use App\Http\Controllers\Dashboard\Nasabah\NasabahDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\Admin\AdminJenisController;
use App\Http\Controllers\Dashboard\Admin\AdminKategoriController;
use App\Http\Controllers\Dashboard\Admin\AdminNasabahController;
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
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard.index');
    Route::resource('/nasabah', AdminNasabahController::class);
    Route::resource('/kategori-sampah', AdminKategoriController::class);
    Route::resource('/jenis-sampah', AdminJenisController::class);

});

Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/nasabah/dashboard', [NasabahDashboardController::class, 'index'])->name('nasabah.dashboard.index');

});