<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

// ====== TAMBAHKAN INI DI routes/web.php ======

// Halaman login (untuk yang belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
});

// Logout (untuk yang sudah login)
Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Semua halaman admin/pengelola wajib login dulu
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Contoh: hubungkan ke controller CRUD yang SUDAH ADA di project kamu.
    // Ganti nama controller & method di bawah sesuai controller kamu yang sebenarnya.
    //
    // Route::resource('jurusan', \App\Http\Controllers\Admin\JurusanController::class);
    // Route::resource('berita', \App\Http\Controllers\Admin\NewsController::class);
    // Route::resource('guru', \App\Http\Controllers\Admin\GuruController::class);
    // Route::resource('galeri', \App\Http\Controllers\Admin\GaleriController::class);
    // Route::resource('ekstrakurikuler', \App\Http\Controllers\Admin\EkstrakurikulerController::class);
});