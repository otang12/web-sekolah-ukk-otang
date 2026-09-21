<?php

use App\Http\Controllers\Admin\GuruController as AdminGuruController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\EkstrakurikulerController as AdminEkstrakurikulerController;
use App\Http\Controllers\Admin\JurusanController as AdminJurusanController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use Illuminate\Support\Facades\Route;

// ====== GANTI blok Route::middleware('auth')->group(...) yang lama di web.php dengan ini ======

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('guru', AdminGuruController::class)->except(['show']);
    Route::resource('galeri', AdminGaleriController::class)->except(['show']);
    Route::resource('ekstrakurikuler', AdminEkstrakurikulerController::class)->except(['show']);
    Route::resource('jurusan', AdminJurusanController::class)->except(['show']);
    Route::resource('news', AdminNewsController::class)->except(['show']);
});
