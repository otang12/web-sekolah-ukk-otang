

<?php $__env->startSection('title', 'Data Guru'); ?>

<?php $__env->startSection('content'); ?>

<?php
    $kepsek = $gurus->firstWhere('jabatan', 'Kepala Sekolah');
    $guruLain = $gurus->reject(fn($g) => $g->jabatan === 'Kepala Sekolah');

    // Peta warna & label per jurusan/bidang. Setiap jurusan punya beberapa kata
    // kunci alternatif (singkatan maupun nama lengkap) agar tetap terdeteksi
    // meski jabatan ditulis dengan cara berbeda-beda (tidak case sensitive).
    $accentMap = [
        'RPL'  => [
            'keywords' => ['RPL', 'Rekayasa Perangkat Lunak'],
            'color' => '#6D28D9', 'label' => 'RPL',
        ],
        'BDP'  => [
            'keywords' => ['BDP', 'Bisnis Daring', 'Pemasaran'],
            'color' => '#FF6B4A', 'label' => 'Pemasaran',
        ],
        'TKR'  => [
            'keywords' => ['TKR', 'Kendaraan', 'Otomotif'],
            'color' => '#0F5C46', 'label' => 'TKR',
        ],
        'APHP' => [
            'keywords' => ['APHP', 'Pengolahan Hasil Pertanian', 'Agribisnis'],
            'color' => '#16A34A', 'label' => 'APHP',
        ],
        'Staff' => [
            'keywords' => ['Staf', 'Staff', 'Tata Usaha', 'Administrasi', 'Kependidikan', 'TU'],
            'color' => '#2563EB', 'label' => 'Staff',
        ],
    ];

    $getAccent = function (string $jabatan) use ($accentMap) {
        foreach ($accentMap as $val) {
            foreach ($val['keywords'] as $keyword) {
                if (stripos($jabatan, $keyword) !== false) {
                    return $val;
                }
            }
        }
        return ['color' => '#0F5C46', 'label' => 'Umum'];
    };

    // Daftar label unik untuk tombol filter, urut sesuai kemunculan pertama.
    $filterLabels = collect($guruLain)
        ->map(fn($g) => $getAccent($g->jabatan)['label'])
        ->unique()
        ->values();
?>

<style>
    /* Pusatkan teks hero khusus di halaman ini saja (tidak mengubah style.css global) —
       samakan dengan Profil Sekolah, Program Keahlian, Berita, dan Ekstrakurikuler. */
    .hero-full__overlay { justify-content: center; }
    .hero-full__inner { text-align: center; margin: 0 auto; }
    .hero-full__inner .hero__actions { justify-content: center; }
</style>

<section class="hero-full-wrap container">
    <div class="hero-full" data-hero-bg="<?php echo e(asset('img/hero/guru-hero.jpeg')); ?>">
        <div class="hero-full__overlay">
            <div class="container">
                <div class="hero-full__inner">
                    <span class="eyebrow">Tenaga Pendidik &amp; Kependidikan</span>
                    <h1>Guru &amp; Staf <span style="color: var(--amber);">SMK Negeri 1 Cijati</span></h1>
                    <p class="hero__desc"><?php echo e($gurus->count()); ?> tenaga pendidik &amp; kependidikan</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container gped-section">

    <?php if($kepsek): ?>
        <div class="gped-kepsek gped-animate" id="kepala-sekolah">
            <div class="gped-kepsek__photo">
                <?php if($kepsek->foto): ?>
                    <img src="<?php echo e(asset('storage/' . $kepsek->foto)); ?>" alt="<?php echo e($kepsek->nama); ?>">
                <?php endif; ?>
            </div>
            <span class="gped-kepsek__eyebrow">Pimpinan Sekolah</span>
            <h2><?php echo e($kepsek->nama); ?></h2>
            <span class="gped-kepsek__rule"></span>
            <span class="gped-kepsek__jabatan"><?php echo e($kepsek->jabatan); ?></span>
        </div>
    <?php endif; ?>

    <div class="gped-heading gped-animate">
        <span class="eyebrow">Tenaga Pendidik</span>
        <h2>Dewan Guru</h2>
    </div>

    <?php if($filterLabels->count() > 1): ?>
        <div class="gped-filter gped-animate" role="tablist">
            <button type="button" class="gped-filter__btn is-active" data-filter="semua">Semua</button>
            <?php $__currentLoopData = $filterLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button type="button" class="gped-filter__btn" data-filter="<?php echo e($label); ?>"><?php echo e($label); ?></button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    <div class="gped-grid" id="gpedGrid">
        <?php $__currentLoopData = $guruLain; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $accent = $getAccent($g->jabatan); ?>
            <div class="gped-card gped-animate" data-jurusan="<?php echo e($accent['label']); ?>" style="--i: <?php echo e($loop->index); ?>; --accent: <?php echo e($accent['color']); ?>;">
                <div class="gped-card__photo">
                    <?php if($g->foto): ?>
                        <img src="<?php echo e(asset('storage/' . $g->foto)); ?>" alt="<?php echo e($g->nama); ?>" loading="lazy">
                    <?php endif; ?>
                </div>
                <div class="gped-card__body">
                    <h3><?php echo e($g->nama); ?></h3>
                    <span class="gped-card__jabatan"><?php echo e($g->jabatan); ?></span>
                    <span class="gped-card__tag"><?php echo e($accent['label']); ?></span>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <p class="gped-empty" id="gpedEmpty" hidden>Belum ada guru untuk jurusan ini.</p>

</section>

<style>
    /* ===================== SECTION WRAP ===================== */
    .gped-section {
        padding: 48px 24px 90px;
    }

    /* ===================== KEPALA SEKOLAH SPOTLIGHT ===================== */
    .gped-kepsek {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        max-width: 360px;
        margin: 0 auto 72px;
        scroll-margin-top: 90px;
    }
    .gped-kepsek__photo {
        width: 168px;
        height: 168px;
        border-radius: 50%;
        overflow: hidden;
        background: linear-gradient(160deg, #eef1ee, #dfe6ea);
        border: 4px solid #fff;
        box-shadow: 0 18px 40px -16px rgba(10, 61, 48, 0.35);
        margin-bottom: 22px;
    }
    .gped-kepsek__photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top center;
        display: block;
    }
    .gped-kepsek__eyebrow {
        display: inline-block;
        font-size: 11.5px;
        font-weight: 800;
        letter-spacing: .1em;
        text-transform: uppercase;
        color: var(--amber, #FF6B4A);
        margin-bottom: 10px;
    }
    .gped-kepsek h2 {
        font-family: var(--font-display, serif);
        font-size: clamp(24px, 3.4vw, 32px);
        color: var(--navy, #0F5C46);
        margin: 0 0 14px;
        line-height: 1.25;
    }
    .gped-kepsek__rule {
        display: block;
        width: 44px;
        height: 3px;
        border-radius: 999px;
        background: linear-gradient(90deg, var(--amber, #FF6B4A), var(--coral, #FFB020));
        margin-bottom: 14px;
    }
    .gped-kepsek__jabatan {
        font-size: 13.5px;
        font-weight: 700;
        color: var(--teal, #6D28D9);
        text-transform: uppercase;
        letter-spacing: .05em;
    }

    /* ===================== SECTION HEADING ===================== */
    .gped-heading {
        text-align: center;
        max-width: 520px;
        margin: 0 auto 8px;
    }
    .gped-heading .eyebrow {
        color: var(--amber, #FF6B4A);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .12em;
        text-transform: uppercase;
    }
    .gped-heading h2 {
        font-family: var(--font-display, serif);
        color: var(--navy, #0F5C46);
        font-size: clamp(22px, 3vw, 28px);
        margin: 8px 0 0;
    }

    /* ===================== FILTER (underline tabs) ===================== */
    .gped-filter {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 28px;
        margin: 28px 0 44px;
        border-bottom: 1px solid var(--line, #E7E1D6);
        padding-bottom: 0;
    }
    .gped-filter__btn {
        appearance: none;
        cursor: pointer;
        background: transparent;
        border: none;
        color: var(--ink-soft, #5C6A62);
        font-size: 13.5px;
        font-weight: 700;
        letter-spacing: .03em;
        text-transform: uppercase;
        padding: 0 0 14px;
        position: relative;
        transition: color 0.2s ease;
    }
    .gped-filter__btn::after {
        content: '';
        position: absolute;
        left: 0; right: 0; bottom: -1px;
        height: 2px;
        background: var(--amber, #FF6B4A);
        transform: scaleX(0);
        transition: transform 0.2s ease;
    }
    .gped-filter__btn:hover {
        color: var(--navy, #0F5C46);
    }
    .gped-filter__btn.is-active {
        color: var(--navy, #0F5C46);
    }
    .gped-filter__btn.is-active::after {
        transform: scaleX(1);
    }

    /* ===================== GRID + CARD (editorial, terang) ===================== */
    .gped-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 34px 26px;
    }

    .gped-card.is-hidden { display: none; }

    .gped-card__photo {
        width: 100%;
        aspect-ratio: 4 / 5;
        border-radius: 16px;
        overflow: hidden;
        background: linear-gradient(160deg, #eef1ee, #dfe6ea);
        margin-bottom: 16px;
    }
    .gped-card__photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top center;
        display: block;
        transition: transform 0.5s ease;
    }
    .gped-card:hover .gped-card__photo img {
        transform: scale(1.06);
    }

    .gped-card__body {
        text-align: left;
    }
    .gped-card__body h3 {
        font-family: var(--font-display, serif);
        font-size: 16.5px;
        font-weight: 700;
        color: var(--navy, #0F5C46);
        margin: 0 0 4px;
        line-height: 1.35;
    }
    .gped-card__jabatan {
        display: block;
        font-size: 12.5px;
        color: var(--ink-soft, #5C6A62);
        margin-bottom: 8px;
    }
    .gped-card__tag {
        display: inline-block;
        font-size: 10.5px;
        font-weight: 800;
        letter-spacing: .05em;
        text-transform: uppercase;
        color: var(--accent, #0F5C46);
        border: 1.3px solid var(--accent, #0F5C46);
        padding: 3px 10px;
        border-radius: 999px;
    }

    /* ===================== SCROLL-IN ANIMATION ===================== */
    .gped-animate {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.55s ease, transform 0.55s ease;
        transition-delay: calc(var(--i, 0) * 40ms);
    }
    .gped-animate.is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    .gped-empty {
        text-align: center;
        color: var(--ink-soft, #5C6A62);
        font-size: 14px;
        padding: 40px 0;
    }

    @media (prefers-reduced-motion: reduce) {
        .gped-animate {
            opacity: 1;
            transform: none;
            transition: none;
        }
    }

    /* ===================== RESPONSIVE ===================== */
    @media (max-width: 640px) {
        .gped-section { padding: 36px 16px 64px; }
        .gped-kepsek { margin-bottom: 56px; }
        .gped-filter { gap: 18px; }
        .gped-grid {
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 26px 16px;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var animatedEls = document.querySelectorAll('.gped-animate');

    if (!('IntersectionObserver' in window) || animatedEls.length === 0) {
        animatedEls.forEach(function (el) { el.classList.add('is-visible'); });
    } else {
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });

        animatedEls.forEach(function (el) { observer.observe(el); });
    }

    // Filter jurusan
    var filterBtns = document.querySelectorAll('.gped-filter__btn');
    var cards = document.querySelectorAll('#gpedGrid .gped-card');
    var emptyMsg = document.getElementById('gpedEmpty');

    filterBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            filterBtns.forEach(function (b) { b.classList.remove('is-active'); });
            btn.classList.add('is-active');

            var target = btn.getAttribute('data-filter');
            var visibleCount = 0;

            cards.forEach(function (card) {
                var match = target === 'semua' || card.getAttribute('data-jurusan') === target;
                card.classList.toggle('is-hidden', !match);
                if (match) visibleCount++;
            });

            if (emptyMsg) emptyMsg.hidden = visibleCount !== 0;
        });
    });
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\web-sekolah-ukk-otang\resources\views/guru.blade.php ENDPATH**/ ?>