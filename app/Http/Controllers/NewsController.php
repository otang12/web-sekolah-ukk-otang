<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * Daftar semua berita, terbaru lebih dulu.
     */
    public function index(): View
    {
        $newsList = News::published()->paginate(9);

        return view('news.index', compact('newsList'));
    }

    /**
     * Daftar berita berdasarkan kategori (mis. prestasi, info-pendidikan).
     */
    public function kategori(string $kategori): View
    {
        $newsList = News::published()->category($kategori)->paginate(9);

        return view('news.index', compact('newsList', 'kategori'));
    }

    /**
     * Detail satu berita berdasarkan slug.
     */
    public function show(News $news): View
    {
        $related = News::published()
            ->where('id', '!=', $news->id)
            ->take(3)
            ->get();

        return view('news.show', ['news' => $news, 'related' => $related]);
    }
}
