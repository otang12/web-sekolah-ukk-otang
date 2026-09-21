

<?php $__env->startSection('title', 'Berita & Informasi'); ?>

<?php $__env->startSection('content'); ?>

<style>
    /* Pusatkan teks hero khusus di halaman ini saja (tidak mengubah style.css global). */
    .hero-full__overlay { justify-content: center; }
    .hero-full__inner { text-align: center; margin: 0 auto; }
    .hero-full__inner .hero__actions { justify-content: center; }
</style>

<section class="hero-full-wrap container">
    <div class="hero-full" data-hero-bg="<?php echo e(asset('img/hero/berita-hero.jpeg')); ?>">
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
        <?php $__empty_1 = true; $__currentLoopData = $newsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php echo $__env->make('partials.news-card', ['item' => $item], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>Belum ada berita untuk kategori ini.</p>
        <?php endif; ?>
    </div>

    <div class="pagination">
        <?php echo e($newsList->links()); ?>

    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\profile-sekolah-dhani-12rpl1\resources\views/news/index.blade.php ENDPATH**/ ?>