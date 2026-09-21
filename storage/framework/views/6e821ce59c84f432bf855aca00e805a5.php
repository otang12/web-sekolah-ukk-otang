

<?php $__env->startSection('title', 'Galeri'); ?>

<?php $__env->startSection('content'); ?>
<section class="photo-hero-wrap container">
    <div class="photo-hero" data-hero-bg="<?php echo e(asset('img/hero/galeri-hero.jpeg')); ?>">
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
        <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <figure class="gallery-item">
                <img src="<?php echo e(asset('storage/' . $photo->file)); ?>" alt="<?php echo e($photo->caption); ?>" loading="lazy">
                <figcaption><?php echo e($photo->caption); ?></figcaption>
            </figure>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\profile-sekolah-dhani-12rpl1\resources\views/galeri.blade.php ENDPATH**/ ?>