<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\GuruController as AdminGuruController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\EkstrakurikulerController as AdminEkstrakurikulerController;
use App\Http\Controllers\Admin\JurusanController as AdminJurusanController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;


/*
|--------------------------------------------------------------------------
| Web Routes - SMK Negeri 1 Cijati
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/tentang', [AboutController::class, 'index'])->name('about');
Route::get('/jurusan', [AboutController::class, 'jurusan'])->name('jurusan.index');
Route::get('/jurusan/{slug}', [AboutController::class, 'show'])->name('jurusan.show');

Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'index'])->name('ekstrakurikuler');
Route::get('/ekstrakurikuler/{slug}', [EkstrakurikulerController::class, 'show'])->name('ekstrakurikuler.show');
Route::get('/guru', [GuruController::class, 'index'])->name('guru');
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');

Route::prefix('berita')->name('news.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/kategori/{kategori}', [NewsController::class, 'kategori'])->name('kategori');
    Route::get('/{slug}', [NewsController::class, 'show'])->name('show');
});
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

   Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');

    Route::resource('guru', AdminGuruController::class)->except(['show']);
    Route::resource('galeri', AdminGaleriController::class)->except(['show']);
    Route::resource('ekstrakurikuler', AdminEkstrakurikulerController::class)->except(['show']);
    Route::resource('jurusan', AdminJurusanController::class)->except(['show']);
    Route::resource('news', AdminNewsController::class)->except(['show']);

    // Hapus satu foto kegiatan (kolase) milik jurusan
    Route::post('/jurusan-foto/{foto}/hapus', [AdminJurusanController::class, 'destroyFoto'])
        ->name('jurusan.foto.destroy');

    // Hapus satu foto kegiatan milik ekstrakurikuler
    Route::post('/ekstrakurikuler-foto/{foto}/hapus', [AdminEkstrakurikulerController::class, 'destroyFoto'])
        ->name('ekstrakurikuler.foto.destroy');
});