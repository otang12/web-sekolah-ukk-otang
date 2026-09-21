@extends('layouts.app')

@section('title', 'Berita & Informasi')

@section('content')

<style>
    /* Pusatkan teks hero khusus di halaman ini saja (tidak mengubah style.css global). */
    .hero-full__overlay { justify-content: center; }
    .hero-full__inner { text-align: center; margin: 0 auto; }
    .hero-full__inner .hero__actions { justify-content: center; }
</style>

<section class="hero-full-wrap container">
    <div class="hero-full" data-hero-bg="{{ asset('img/hero/berita-hero.jpeg') }}">
        <div class="hero-full__overlay">
            <div class="container">
                <div class="hero-full__inner">
                    <span class="eyebrow">Info Sekolah</span>
                    <h1>Berita &amp; <span style="color: var(--amber);">Informasi</span></h1>
                    <p class="hero__desc">Kumpulan kabar, kegiatan, dan pengumuman terbaru seputar SMK Negeri 1 Cijati.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container news-section">
    <div class="news-grid">
        @forelse($newsList as $item)
            @include('partials.news-card', ['item' => $item])
        @empty
            <p>Belum ada berita untuk kategori ini.</p>
        @endforelse
    </div>

    <div class="pagination">
        {{ $newsList->links() }}
    </div>
</section>

@endsection