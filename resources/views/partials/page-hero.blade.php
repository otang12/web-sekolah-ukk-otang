@php
    $heroImg = asset('img/hero/' . ($img ?? 'hero-1.jpeg'));
@endphp

<section class="page-hero" style="background-image: url('{{ $heroImg }}');">
    <div class="page-hero__overlay"></div>
    <div class="page-hero__shape"></div>

    <div class="page-hero__badge">
        <h1 class="page-hero__title">{{ $title }}</h1>
        @isset($subtitle)
            <p class="page-hero__subtitle">{{ $subtitle }}</p>
        @endisset
    </div>
</section>

<style>
.page-hero {
    position: relative;
    min-height: 400px;
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}
.page-hero__overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(10, 61, 48, 0.88) 0%, rgba(10, 61, 48, 0.55) 60%, rgba(10, 61, 48, 0.35) 100%);
}
.page-hero__shape {
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 100%;
    height: 60px;
    background: #f8fafc;
    clip-path: polygon(0 100%, 100% 100%, 100% 40%, 0 100%);
}
.page-hero__badge {
    position: relative;
    z-index: 2;
    background: rgba(10, 61, 48, 0.72);
    padding: 28px 56px;
    border-radius: 14px;
    text-align: center;
    max-width: 90%;
}
.page-hero__title {
    display: block;
    color: #fff;
    font-size: 32px;
    font-weight: 800;
    margin-bottom: 10px;
    letter-spacing: -0.5px;
}
.page-hero__subtitle {
    display: block;
    color: #e5e7eb;
    font-size: 15px;
    font-weight: 400;
}
@media (max-width: 640px) {
    .page-hero { min-height: 320px; }
    .page-hero__badge { padding: 20px 28px; }
    .page-hero__title { font-size: 24px; }
}
</style>