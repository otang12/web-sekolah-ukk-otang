<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\Jurusan;
use App\Models\News;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Halaman beranda: hero, tag populer, jurusan, ekstrakurikuler, dan berita terbaru.
     */
    public function index(): View
    {
        $latestNews = News::published()->take(6)->get();
        $featured = $latestNews->first();
        $tags = ['FLS3N', 'O2SN', 'PKL', 'marchingband', 'UKK', 'RPL', '17 Agustus', 'paskibra', 'smkn1cjati.official', 'test toeic', 'TKA', 'upacara bendera'];

        // Ganti angka di bawah ini sesuai data sekolah yang sebenarnya
        $stats = [
            'guru' => 52,
            'siswa' => 720,
            'jurusan' => 4,
            'ekstrakurikuler' => 10,
        ];

        // Foto slider hero, ditaruh di public/img/hero/. Tambah/kurangi sesuai foto yang ada.
        $heroImages = ['hero-1.jpeg', 'hero-2.jpeg', 'hero-3.jpeg'];

        // Daftar jurusan untuk carousel di beranda
        $jurusanList = Jurusan::all();

        // Daftar ekstrakurikuler untuk carousel di beranda
        $ekstrakurikulerList = Ekstrakurikuler::all();

        return view('home', compact('latestNews', 'featured', 'tags', 'stats', 'heroImages', 'jurusanList', 'ekstrakurikulerList'));
    }
}