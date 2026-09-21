@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
<section class="photo-hero-wrap container">
    <div class="photo-hero" data-hero-bg="{{ asset('img/hero/galeri-hero.jpeg') }}">
        <div class="photo-hero__overlay">
            <div class="photo-hero__box">
                <span class="eyebrow">Dokumentasi</span>
                <h1>Galeri Kegiatan</h1>
                <p>SMK Negeri 1 Cijati</p>
            </div>
        </div>
    </div>
</section>

<section class="container gallery-section">
    <div class="gallery-grid">
        @foreach($photos as $photo)
            <figure class="gallery-item">
                <img src="{{ asset('storage/' . $photo->file) }}" alt="{{ $photo->caption }}" loading="lazy">
                <figcaption>{{ $photo->caption }}</figcaption>
            </figure>
        @endforeach
    </div>
</section>
@endsection