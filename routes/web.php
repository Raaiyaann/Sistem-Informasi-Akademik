<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KRSController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\UserController;

// Halaman login utama
Route::get('/', [AuthController::class, 'login'])->name('auth.login');
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// ========================== DOSEN ==========================
Route::middleware(['auth', 'role:dosen'])->prefix('dosen')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dosen.dashboard');
    Route::get('/profile', [ProfileController::class, 'dosen'])->name('profile.dosen.index');
});

// ========================== MAHASISWA ==========================
Route::middleware(['auth', 'role:mahasiswa'])->prefix('mahasiswa')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('mahasiswa.dashboard');
    Route::get('/krs', [KRSController::class, 'krsMahasiswa'])->name('krs.mahasiswa.index');
    Route::get('/krs/create', [KRSController::class, 'create'])->name('krs.create');
    Route::post('/krs', [KRSController::class, 'store'])->name('krs.store');
    Route::delete('/krs/{id}', [KRSController::class, 'destroy'])->name('krs.mahasiswa.destroy');
    Route::get('/profile', [ProfileController::class, 'index'])->name('mahasiswa.profile');
});

// Tambahkan route destroy untuk KRS
Route::delete('/mahasiswa/krs/{krs}', [App\Http\Controllers\KRSController::class, 'destroy'])
    ->name('krs.destroy')
    ->middleware(['auth', 'role:mahasiswa']);

// ========================== ADMIN ==========================
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/profile', [ProfileController::class, 'admin'])->name('profile.admin.index');

    // Mahasiswa
    Route::resource('mahasiswa', MahasiswaController::class);

    // Dosen
    Route::resource('dosen', DosenController::class);

    // Mata Kuliah
    Route::resource('matakuliah', MataKuliahController::class);

    // Jadwal
    Route::resource('jadwal', JadwalController::class);

    // Kelas
    Route::resource('kelas', KelasController::class);

    // Prodi
    Route::resource('prodi', ProdiController::class);

    // User
    Route::resource('user', UserController::class);

    // KRS
    Route::get('/listKrs', [KRSController::class, 'index'])->name('krs.index');
    Route::delete('/krs/{id}', [KRSController::class, 'destroy'])->name('krs.admin.destroy');
});
