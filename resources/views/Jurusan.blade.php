@extends('layouts.app')

@section('title', 'Program Keahlian')

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600&display=swap" rel="stylesheet">
@endpush

@section('content')

<section class="hero-full-wrap container">
    <div class="hero-full" data-hero-bg="{{ asset('img/hero/hero-1.jpeg') }}">
        <div class="hero-full__overlay">
            <div class="container">
                <div class="hero-full__inner">
                    <span class="eyebrow">Program Keahlian</span>
                    <h1>Program <span style="color: var(--amber);">Keahlian</span></h1>
                    <p class="hero__desc">Kompeten, Kreatif, Berkarya &mdash; empat jalur kompetensi menuju dunia kerja di SMK Negeri 1 Cijati.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="jk2">

    {{-- ================= PROGRAM KEAHLIAN ================= --}}
    <section class="container jk2-section">
        <div class="jk2-head">
            <p class="jk2-tag">Program keahlian</p>
            <h2 class="jk2-title">Pilih jurusan impianmu</h2>
            <p class="jk2-desc">Program keahlian unggulan yang mendukung kompetensi dan kesiapan kerja.</p>
        </div>

        @php
            $jk2Colors = ['#D8DDE3', '#BFD7F5', '#F3CFA0', '#BFE3CE'];
        @endphp

        <div class="jk2-grid">
            @foreach($jurusan as $j)
                @php $jk2Border = $jk2Colors[$loop->index % count($jk2Colors)]; @endphp
                <a href="{{ route('jurusan.show', $j->slug) }}" class="jk2-card" style="--jk2-accent: {{ $jk2Border }};">
                    <div class="jk2-card__emblem">
                        @if($j->logo)
                            <img src="{{ asset('storage/' . $j->logo) }}" alt="Logo {{ $j->nama }}">
                        @else
                            <span>{{ substr($j->singkatan, 0, 1) }}</span>
                        @endif
                    </div>
                    <h3 class="jk2-card__title">{{ $j->nama }}</h3>
                    <p class="jk2-card__desc">{{ $j->deskripsi }}</p>
                    <span class="jk2-card__link">Lihat Detail &rarr;</span>
                </a>
            @endforeach
        </div>
    </section>

    {{-- ================= FASILITAS ================= --}}
    <section class="container jk2-section jk2-section--cork" id="fasilitas">
        <div class="jk2-head jk2-head--onboard">
            <p class="jk2-tag jk2-tag--onboard">Sarana &amp; prasarana</p>
            <h2 class="jk2-title jk2-title--onboard">Fasilitas praktik</h2>
            <p class="jk2-desc jk2-desc--onboard">Fasilitas penunjang belajar dan praktik yang tersedia di sekolah kami.</p>
        </div>

        <div class="jk2-pinboard" id="jk2Pinboard">
            @php $jk2Angles = [-3, 2, -2, 3, -1, 1]; @endphp
            @foreach($fasilitas as $f)
                <figure class="jk2-pin" style="--r: {{ $jk2Angles[$loop->index % count($jk2Angles)] }}deg;">
                    <span class="jk2-pin__tape"></span>
                    <div class="jk2-pin__photo">
                        <img src="{{ asset('img/fasilitas/' . \Illuminate\Support\Str::slug($f) . '.jpeg') }}" alt="{{ $f }}" loading="lazy">
                    </div>
                    <figcaption class="jk2-pin__caption">
                        <span class="jk2-pin__no">No. {{ sprintf('%02d', $loop->iteration) }}</span>
                        {{ $f }}
                    </figcaption>
                </figure>
            @endforeach
        </div>
    </section>

</div>

<style>
    /* Pusatkan teks hero khusus di halaman ini (tidak mengubah style.css global,
       jadi halaman lain yang juga memakai .hero-full tidak ikut berubah). */
    .hero-full__overlay { justify-content: center; }
    .hero-full__inner {
        text-align: center;
        margin: 0 auto;
    }
    .hero-full__inner .hero__actions { justify-content: center; }


    /* Semua aturan di bawah ini di-scope di dalam .jk2 supaya tidak pernah
       bentrok dengan class lain di style.css global. */
    .jk2 {
        --jk2-ink: #1F2A24;
        --jk2-forest: #0A3D30;
        --jk2-forest-2: #0F5C46;
        --jk2-paper: #FAF7F1;
        --jk2-line: #E7E1D6;
        --jk2-brass: #A9782F;
        --jk2-brass-soft: rgba(169, 120, 47, 0.10);
        --jk2-muted: #6b7280;
        font-family: 'Inter', system-ui, sans-serif;
        isolation: isolate;
        padding: 0 clamp(16px, 4vw, 56px);
    }

    .jk2-section { padding: 56px 0; position: relative; }
    .jk2-section--muted {
        background: var(--jk2-paper);
        border-radius: 24px;
        padding: 52px 32px;
    }

    .jk2-head { max-width: 620px; margin: 0 auto 40px; text-align: center; }

    .jk2-tag {
        display: inline-block;
        font-size: 13px;
        font-weight: 600;
        color: var(--jk2-brass);
        background: var(--jk2-brass-soft);
        border: 1px solid rgba(169, 120, 47, 0.28);
        padding: 5px 14px;
        border-radius: 999px;
        margin: 0 0 16px;
    }

    .jk2-title {
        font-family: 'Fraunces', serif;
        font-weight: 600;
        font-size: clamp(26px, 3.2vw, 36px);
        line-height: 1.18;
        color: var(--jk2-ink);
        margin: 0 0 12px;
    }

    .jk2-desc {
        font-size: 15px;
        color: var(--jk2-muted);
        line-height: 1.6;
        margin: 0 auto;
        max-width: 52ch;
    }

    /* ---------- Kartu jurusan (gaya referensi) ---------- */
    .jk2-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 22px;
    }

    .jk2-card {
        display: block;
        background: #fff;
        border: 1.5px solid var(--jk2-accent, var(--jk2-line));
        border-radius: 18px;
        padding: 34px 24px 30px;
        text-align: center;
        text-decoration: none;
        color: inherit;
        box-shadow: 0 10px 24px -18px rgba(10, 61, 48, 0.3);
        transition: transform .2s ease, box-shadow .2s ease;
    }
    .jk2-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 16px 30px -14px rgba(10, 61, 48, 0.22);
    }

    .jk2-card__emblem {
        width: 66px;
        height: 66px;
        margin: 0 auto 18px;
        border-radius: 50%;
        background: #fff;
        border: 1px solid var(--jk2-line);
        box-shadow: 0 4px 10px rgba(10, 61, 48, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }
    .jk2-card__emblem img { width: 100%; height: 100%; object-fit: contain; padding: 12px; }
    .jk2-card__emblem span {
        font-family: 'Fraunces', serif;
        font-weight: 600;
        font-size: 22px;
        color: var(--jk2-forest);
    }

    .jk2-card__title {
        font-family: 'Inter', sans-serif;
        font-weight: 700;
        font-size: 17px;
        color: var(--jk2-forest);
        margin: 0 0 10px;
        line-height: 1.35;
    }

    .jk2-card__desc {
        font-size: 13.5px;
        color: var(--jk2-muted);
        line-height: 1.65;
        margin: 0 0 18px;
    }

    .jk2-card__link {
        display: inline-block;
        font-size: 13.5px;
        font-weight: 700;
        color: var(--jk2-forest);
        transition: color .15s ease;
    }
    .jk2-card:hover .jk2-card__link { color: var(--jk2-brass); }

    /* ---------- Fasilitas: papan + foto polaroid (senada hijau brand) ---------- */
    .jk2-section--cork {
        background:
            radial-gradient(rgba(169,120,47,.35) 1px, transparent 1.5px) 0 0/18px 18px,
            linear-gradient(160deg, var(--jk2-forest-2), var(--jk2-forest));
        border-radius: 24px;
        padding: 50px 26px 44px;
        margin-bottom: 40px;
        box-shadow: inset 0 0 0 1px rgba(255,255,255,.06), inset 0 12px 30px -18px rgba(0,0,0,.5);
    }

    .jk2-head--onboard { text-align: center; }
    .jk2-tag--onboard {
        background: rgba(255,255,255,.1);
        border-color: rgba(255,255,255,.22);
        color: #F0D9AE;
    }
    .jk2-title--onboard { color: #fff; }
    .jk2-desc--onboard { color: #CFE0D6; margin: 0 auto; }

    .jk2-pinboard {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 34px 22px;
        padding: 30px 10px 10px;
        opacity: 0;
        transform: translateY(18px);
        transition: opacity .7s ease, transform .7s ease;
    }
    .jk2-pinboard.is-visible { opacity: 1; transform: translateY(0); }

    .jk2-pin {
        position: relative;
        width: 208px;
        background: #FFFDF9;
        padding: 10px 10px 16px;
        border-radius: 3px;
        box-shadow: 0 12px 22px -10px rgba(30, 18, 3, 0.5);
        transform: rotate(var(--r, 0deg));
        transition: transform .25s ease, box-shadow .25s ease;
        margin: 0;
    }
    .jk2-pin:hover {
        transform: rotate(0deg) translateY(-8px) scale(1.045);
        box-shadow: 0 22px 34px -12px rgba(30, 18, 3, 0.55);
        z-index: 3;
    }

    .jk2-pin__tape {
        position: absolute;
        top: -13px;
        left: 50%;
        width: 62px;
        height: 22px;
        background: rgba(250, 247, 241, .82);
        border: 1px solid rgba(0,0,0,.05);
        box-shadow: 0 3px 6px rgba(0,0,0,.18);
        transform: translateX(-50%) rotate(-3deg);
    }

    .jk2-pin__photo {
        width: 100%;
        aspect-ratio: 4 / 3;
        overflow: hidden;
        background: var(--jk2-line);
        border-radius: 2px;
    }
    .jk2-pin__photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .jk2-pin__caption {
        display: block;
        text-align: center;
        margin-top: 12px;
        font-family: 'Fraunces', serif;
        font-weight: 600;
        font-size: 13.5px;
        color: var(--jk2-ink);
        line-height: 1.3;
    }
    .jk2-pin__no {
        display: block;
        font-family: 'Inter', sans-serif;
        font-size: 10.5px;
        font-weight: 700;
        letter-spacing: .04em;
        color: var(--jk2-brass);
        margin-bottom: 3px;
    }

    /* ---------- Responsive ---------- */
    @media (max-width: 1100px) {
        .jk2-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }

    @media (max-width: 620px) {
        .jk2-grid { grid-template-columns: 1fr; }
        .jk2-section--cork { padding: 40px 16px 34px; }
        .jk2-pin { width: 44%; }
    }

    @media (prefers-reduced-motion: reduce) {
        .jk2-card, .jk2-pin { transition: none !important; }
        .jk2-pinboard { opacity: 1; transform: none; }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var pinboard = document.getElementById('jk2Pinboard');
    if (!pinboard) return;

    if ('IntersectionObserver' in window && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        var jk2Observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    jk2Observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        jk2Observer.observe(pinboard);
    } else {
        pinboard.classList.add('is-visible');
    }
});
</script>

@endsection