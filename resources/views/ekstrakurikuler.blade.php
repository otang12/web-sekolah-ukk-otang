@extends('layouts.app')

@section('title', 'Ekstrakurikuler')

@section('content')

<style>
    /* Pusatkan teks hero khusus di halaman ini saja (tidak mengubah style.css global) —
       samakan dengan Profil Sekolah, Program Keahlian, dan Berita. */
    .hero-full__overlay { justify-content: center; }
    .hero-full__inner { text-align: center; margin: 0 auto; }
    .hero-full__inner .hero__actions { justify-content: center; }
</style>

<section class="hero-full-wrap container">
    <div class="hero-full" data-hero-bg="{{ asset('img/hero/ekstrakurikuler-hero.jpeg') }}">
        <div class="hero-full__overlay">
            <div class="container">
                <div class="hero-full__inner">
                    <span class="eyebrow">Kegiatan Siswa</span>
                    <h1>Ekstra<span style="color: var(--amber);">kurikuler</span></h1>
                    <p class="hero__desc">Beragam kegiatan untuk mengembangkan minat dan bakat siswa di luar jam akademik.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ekskul-intro">
    <span class="ekskul-intro__rule"></span>
    <p>
        SMK Negeri 1 Cijati memiliki beragam ekstrakurikuler untuk mengembangkan
        minat dan bakat siswa di luar kegiatan akademik.
    </p>
</section>

<section class="container ekskul-bento">
    @foreach($ekskuls as $i => $ekskul)
        <a href="{{ route('ekstrakurikuler.show', $ekskul->slug) }}"
           class="ekskul-tile {{ $i === 0 ? 'ekskul-tile--feature' : '' }}">

            <span class="ekskul-tile__index">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>

            <div class="ekskul-tile__media">
                @if($ekskul->fotos->first())
                    <img src="{{ asset('storage/' . $ekskul->fotos->first()->file) }}" alt="Kegiatan {{ $ekskul->nama }}" loading="lazy">
                @else
                    <div class="ekskul-tile__media-placeholder"></div>
                @endif
            </div>

            <div class="ekskul-tile__scrim"></div>

            <div class="ekskul-tile__badge">
                @if($ekskul->logo)
                    <img src="{{ asset('storage/' . $ekskul->logo) }}" alt="Logo {{ $ekskul->nama }}">
                @else
                    <span>{{ substr($ekskul->nama, 0, 1) }}</span>
                @endif
            </div>

            <div class="ekskul-tile__content">
                <h3>{{ $ekskul->nama }}</h3>
                <p>{{ \Illuminate\Support\Str::limit($ekskul->deskripsi, $i === 0 ? 140 : 90) }}</p>
                <span class="ekskul-tile__cta">
                    Selengkapnya
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </span>
            </div>
        </a>
    @endforeach
</section>

<style>
    /* -------- Intro text -------- */
    .ekskul-intro {
        max-width: 720px;
        margin: 0 auto;
        padding: 40px 24px 8px;
        text-align: center;
    }

    .ekskul-intro__rule {
        display: inline-block;
        width: 56px;
        height: 3px;
        border-radius: 999px;
        background: linear-gradient(90deg, var(--amber, #FF6B4A), var(--coral, #FFB020));
        margin-bottom: 18px;
    }

    .ekskul-intro p {
        margin: 0;
        font-size: 15.5px;
        line-height: 1.75;
        color: var(--ink-soft, #5C6A62);
    }

    /* -------- Bento grid -------- */
    .ekskul-bento {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-auto-rows: 260px;
        gap: 22px;
        padding: 32px 24px 80px;
    }

    .ekskul-tile--feature {
        grid-column: span 2;
        grid-row: span 2;
    }

    @media (max-width: 980px) {
        .ekskul-bento { grid-template-columns: repeat(2, 1fr); }
        .ekskul-tile--feature { grid-column: span 2; grid-row: span 1; aspect-ratio: 16/10; height: auto; }
    }

    @media (max-width: 600px) {
        .ekskul-bento {
            grid-template-columns: 1fr;
            grid-auto-rows: 260px;
            padding: 24px 16px 56px;
            gap: 18px;
        }
        .ekskul-tile--feature { grid-column: span 1; height: 320px; aspect-ratio: auto; }
    }

    /* -------- Tile -------- */
    .ekskul-tile {
        position: relative;
        display: block;
        border-radius: 22px;
        overflow: hidden;
        text-decoration: none;
        color: #fff;
        background: var(--navy-deep, #0A3D30);
        box-shadow: 0 18px 40px -16px rgba(10, 61, 48, 0.4);
        isolation: isolate;
    }

    .ekskul-tile__media {
        position: absolute;
        inset: 0;
        z-index: 1;
    }

    .ekskul-tile__media img,
    .ekskul-tile__media-placeholder {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        filter: saturate(1.12) contrast(1.06) brightness(0.98);
        transition: transform 0.6s cubic-bezier(.2,.8,.2,1), filter 0.4s ease;
    }

    .ekskul-tile:hover .ekskul-tile__media img {
        transform: scale(1.09);
    }

    .ekskul-tile__scrim {
        position: absolute;
        inset: 0;
        z-index: 2;
        background: linear-gradient(180deg, rgba(10, 61, 48, 0.05) 0%, rgba(10, 61, 48, 0.15) 40%, rgba(12,20,26,0.92) 100%);
        transition: background 0.35s ease;
    }

    .ekskul-tile:hover .ekskul-tile__scrim {
        background: linear-gradient(180deg, rgba(10, 61, 48, 0.1) 0%, rgba(10, 61, 48, 0.25) 35%, rgba(12,20,26,0.96) 100%);
    }

    /* -------- Index number -------- */
    .ekskul-tile__index {
        position: absolute;
        top: 14px;
        right: 18px;
        z-index: 3;
        font-family: var(--font-display, serif);
        font-size: 15px;
        font-weight: 600;
        letter-spacing: 0.06em;
        color: rgba(255,255,255,0.65);
        background: rgba(255,255,255,0.12);
        border: 1px solid rgba(255,255,255,0.25);
        backdrop-filter: blur(6px);
        -webkit-backdrop-filter: blur(6px);
        padding: 4px 11px;
        border-radius: 999px;
    }

    /* -------- Badge -------- */
    .ekskul-tile__badge {
        position: absolute;
        top: 16px;
        left: 16px;
        z-index: 3;
        width: 46px;
        height: 46px;
        border-radius: 50%;
        background: rgba(255,255,255,0.95);
        box-shadow: 0 6px 16px rgba(0,0,0,0.28);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        transition: transform 0.35s ease;
    }

    .ekskul-tile:hover .ekskul-tile__badge {
        transform: scale(1.1) rotate(-4deg);
    }

    .ekskul-tile--feature .ekskul-tile__badge {
        width: 58px;
        height: 58px;
    }

    .ekskul-tile__badge img {
        width: 66%;
        height: 66%;
        object-fit: contain;
    }

    .ekskul-tile__badge span {
        font-family: var(--font-display, serif);
        font-weight: 700;
        color: var(--navy, #0F5C46);
        font-size: 18px;
    }

    /* -------- Content -------- */
    .ekskul-tile__content {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 3;
        padding: 20px 22px 22px;
    }

    .ekskul-tile__content h3 {
        font-family: var(--font-display, serif);
        font-size: 21px;
        font-weight: 700;
        letter-spacing: -0.01em;
        margin: 0 0 8px;
        text-shadow: 0 2px 12px rgba(0,0,0,0.35);
    }

    .ekskul-tile--feature .ekskul-tile__content h3 {
        font-size: 27px;
    }

    .ekskul-tile__content p {
        font-size: 13px;
        line-height: 1.6;
        color: rgba(255,255,255,0.8);
        margin: 0 0 12px;
        max-width: 46ch;
    }

    .ekskul-tile__cta {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 12.5px;
        font-weight: 700;
        letter-spacing: 0.03em;
        text-transform: uppercase;
        color: var(--amber, #FF6B4A);
    }

    .ekskul-tile__cta svg {
        transition: transform 0.25s ease;
    }

    .ekskul-tile:hover .ekskul-tile__cta svg {
        transform: translateX(4px);
    }
</style>

@endsection