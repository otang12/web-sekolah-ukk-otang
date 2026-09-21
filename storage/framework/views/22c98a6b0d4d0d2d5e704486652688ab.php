

<?php $__env->startSection('title', $news->title ?: 'Berita SMK Negeri 1 Cijati'); ?>

<?php
    $categoryLabels = [
        'prestasi' => 'Prestasi',
        'ekstrakurikuler' => 'Ekstrakurikuler',
        'info-pendidikan' => 'Info Pendidikan',
    ];
    $na2Label  = $categoryLabels[$news->category] ?? 'Info Pendidikan';
    $na2Image  = $news->image ? asset('storage/' . $news->image) : asset('img/hero/berita-hero.jpeg');

    // Teks cadangan supaya halaman tidak pernah tampil kosong,
    // dipakai hanya kalau field aslinya belum diisi di database.
    $na2Title  = $news->title ?: 'Judul berita belum diisi';
    $na2Author = $news->author ?: 'Admin Sekolah';
    $na2Date   = optional($news->published_at ?? $news->created_at)->translatedFormat('d F Y') ?? '-';
    $na2Body   = $news->body ?: 'Konten berita ini belum ditambahkan. Silakan lengkapi isinya lewat dashboard admin.';
?>

<?php $__env->startPush('styles'); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&display=swap" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<style>
    /* Pusatkan teks hero khusus di halaman ini saja (tidak mengubah style.css global) —
       samakan dengan halaman Berita, Program Keahlian, dll. */
    .hero-full__overlay { justify-content: center; }
    .hero-full__inner { text-align: center; margin: 0 auto; }
    .hero-full__inner .hero__actions { justify-content: center; }
</style>

<section class="hero-full-wrap container">
    <div class="hero-full" data-hero-bg="<?php echo e($na2Image); ?>">
        <div class="hero-full__overlay">
            <div class="container">
                <div class="hero-full__inner">
                    <span class="eyebrow"><?php echo e($na2Label); ?></span>
                    <h1><?php echo e($na2Title); ?></h1>
                    <p class="hero__desc"><?php echo e($na2Date); ?> &middot; <?php echo e($na2Author); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="na2">
    <article class="container na2-article">
        <div class="na2-meta">
            <span class="na2-meta__badge"><?php echo e($na2Label); ?></span>
            <span class="na2-meta__date"><?php echo e($na2Date); ?></span>
            <span class="na2-meta__dot">&middot;</span>
            <span class="na2-meta__author"><?php echo e($na2Author); ?></span>
        </div>

        <div class="na2-body">
            <p><?php echo e($na2Body); ?></p>
        </div>

        <a href="<?php echo e(route('news.index')); ?>" class="na2-back">&larr; Kembali ke Berita</a>
    </article>

    <?php if($related->count()): ?>
        <section class="container na2-related">
            <div class="jk2-head" style="max-width: none; text-align: left;">
                <p class="jk2-tag">Baca juga</p>
                <h2 class="jk2-title" style="font-size: clamp(22px, 2.6vw, 30px);">Berita Lainnya</h2>
            </div>
            <div class="news-grid">
                <?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('partials.news-card', ['item' => $item], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
    <?php endif; ?>
</div>

<style>
    .na2 {
        --na2-ink: #1F2A24;
        --na2-forest: #0A3D30;
        --na2-paper: #FAF7F1;
        --na2-line: #E7E1D6;
        --na2-brass: #A9782F;
        --na2-brass-soft: rgba(169, 120, 47, 0.1);
        --na2-muted: #5C6A62;
        font-family: 'Inter', system-ui, sans-serif;
        isolation: isolate;
        padding: 0 clamp(16px, 4vw, 56px);
    }

    .na2-article {
        max-width: 780px;
        margin: 40px auto 60px;
        background: var(--na2-paper);
        border: 1px solid var(--na2-line);
        border-radius: 20px;
        padding: 36px 40px;
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    .na2-meta {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
        font-size: 13.5px;
        color: var(--na2-muted);
    }
    .na2-meta__badge {
        font-size: 12px;
        font-weight: 700;
        color: var(--na2-brass);
        background: var(--na2-brass-soft);
        border: 1px solid rgba(169, 120, 47, 0.28);
        padding: 4px 13px;
        border-radius: 999px;
    }
    .na2-meta__dot { color: var(--na2-line); }

    .na2-body p {
        font-size: 15.5px;
        line-height: 1.9;
        color: var(--na2-ink);
        margin: 0;
        max-width: 68ch;
        white-space: pre-line;
    }

    .na2-back {
        align-self: flex-start;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        font-weight: 600;
        color: var(--na2-forest);
        text-decoration: none;
        border: 1.5px solid var(--na2-line);
        padding: 11px 20px;
        border-radius: 999px;
        transition: border-color .15s ease, color .15s ease, background .15s ease;
    }
    .na2-back:hover {
        border-color: var(--na2-brass);
        color: var(--na2-brass);
        background: var(--na2-brass-soft);
    }

    .na2-related { margin: 0 auto 64px; }

    @media (max-width: 640px) {
        .na2-article { padding: 26px 22px; }
    }
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\profile-sekolah-dhani-12rpl1\resources\views/news/show.blade.php ENDPATH**/ ?>