

<?php $__env->startSection('title', $nama); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&display=swap" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<section class="photo-hero-wrap container">
    <div class="photo-hero" data-hero-bg="<?php echo e(asset('img/hero/hero-1.jpeg')); ?>">
        <div class="photo-hero__overlay">
            <div class="photo-hero__box">
                <span class="eyebrow">Program Keahlian</span>
                <h1><?php echo e($nama); ?></h1>
                <?php if(!empty($singkatan)): ?>
                    <p><?php echo e($singkatan); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php
    // $foto_kegiatan dikirim langsung dari AboutController@show (relasi
    // 'fotos' pada jurusan yang sedang dibuka), jadi tidak perlu dicari lagi.
    $jd2Fotos = collect($foto_kegiatan ?? [])->take(5);
?>

<div class="jd2">

    <?php if(isset($semua_jurusan) && $semua_jurusan->count()): ?>
        <section class="container jd2-switcher-wrap">
            <div class="jd2-switcher">
                <?php $__currentLoopData = $semua_jurusan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $jd2Active = request()->segment(2) === $j->slug; ?>
                    <a href="<?php echo e(route('jurusan.show', $j->slug)); ?>" class="jd2-chip <?php echo e($jd2Active ? 'jd2-chip--active' : ''); ?>">
                        <?php echo e($j->nama); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
    <?php endif; ?>

    <section class="container jd2-layout">
        <div class="jd2-main">
            <article class="jd2-panel">
                <p class="jd2-tag">Tentang program</p>
                <h2 class="jd2-title">Program Keahlian <?php echo e($singkatan ?? $nama); ?></h2>
                <p class="jd2-text"><?php echo e($deskripsi); ?></p>
            </article>

            <?php if(!empty($mata_pelajaran)): ?>
                <article class="jd2-panel" id="mata-pelajaran">
                    <p class="jd2-tag">Kurikulum</p>
                    <h2 class="jd2-title">Mata Pelajaran Keahlian <?php echo e($singkatan ?? $nama); ?></h2>

                    <ol class="jd2-mapel">
                        <?php $__currentLoopData = $mata_pelajaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mapel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="jd2-mapel__item">
                                <span class="jd2-mapel__index"><?php echo e(sprintf('%02d', $loop->iteration)); ?></span>
                                <div class="jd2-mapel__body">
                                    <h3><?php echo e($mapel['nama']); ?></h3>
                                    <?php if(!empty($mapel['deskripsi'])): ?>
                                        <p><?php echo e($mapel['deskripsi']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ol>
                </article>
            <?php endif; ?>

            <a href="<?php echo e(route('about')); ?>" class="jd2-back">&larr; Kembali ke Profil &amp; Jurusan</a>
        </div>

        <?php if($jd2Fotos->count()): ?>
            <aside class="jd2-gallery">
                <p class="jd2-gallery__label">Kegiatan <?php echo e($singkatan ?? $nama); ?></p>
                <div class="jd2-gallery__list">
                    <?php $__currentLoopData = $jd2Fotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="jd2-gallery__item <?php echo e($loop->first ? 'jd2-gallery__item--tall' : ''); ?>">
                            <img src="<?php echo e(asset('storage/' . $foto->file)); ?>" alt="Kegiatan <?php echo e($nama); ?>" loading="lazy">
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </aside>
        <?php endif; ?>
    </section>

</div>

<style>
    .jd2 {
        --jd2-ink: #1F2A24;
        --jd2-forest: #0A3D30;
        --jd2-forest-2: #0F5C46;
        --jd2-paper: #FAF7F1;
        --jd2-line: #E7E1D6;
        --jd2-brass: #A9782F;
        --jd2-brass-soft: rgba(169, 120, 47, 0.1);
        --jd2-muted: #5C6A62;
        font-family: 'Inter', system-ui, sans-serif;
        isolation: isolate;
        padding: 0 clamp(16px, 4vw, 56px);
    }

    /* ---------- Switcher pill horizontal ---------- */
    .jd2-switcher-wrap { margin: 40px auto 0; }

    .jd2-switcher {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        padding-bottom: 20px;
        border-bottom: 1px solid var(--jd2-line);
    }

    .jd2-chip {
        display: inline-flex;
        align-items: center;
        font-size: 13.5px;
        font-weight: 600;
        color: var(--jd2-forest);
        background: var(--jd2-paper);
        border: 1px solid var(--jd2-line);
        padding: 9px 18px;
        border-radius: 999px;
        text-decoration: none;
        transition: background .15s ease, border-color .15s ease, color .15s ease, transform .15s ease;
    }
    .jd2-chip:hover {
        border-color: var(--jd2-brass);
        color: var(--jd2-brass);
        transform: translateY(-2px);
    }
    .jd2-chip--active {
        background: var(--jd2-forest);
        border-color: var(--jd2-forest);
        color: #fff;
    }
    .jd2-chip--active:hover { color: #fff; transform: none; }

    /* ---------- Layout dua kolom: konten + galeri foto ---------- */
    .jd2-layout {
        display: grid;
        grid-template-columns: 1fr 300px;
        gap: 32px;
        align-items: start;
        margin: 32px auto 72px;
    }

    .jd2-main { display: flex; flex-direction: column; gap: 28px; min-width: 0; }

    .jd2-panel {
        background: var(--jd2-paper);
        border: 1px solid var(--jd2-line);
        border-radius: 20px;
        padding: 34px 36px;
    }

    .jd2-tag {
        display: inline-block;
        font-size: 12.5px;
        font-weight: 600;
        color: var(--jd2-brass);
        background: var(--jd2-brass-soft);
        border: 1px solid rgba(169, 120, 47, 0.28);
        padding: 4px 13px;
        border-radius: 999px;
        margin: 0 0 14px;
    }

    .jd2-title {
        font-family: 'Fraunces', serif;
        font-weight: 600;
        font-size: clamp(21px, 2.4vw, 26px);
        color: var(--jd2-forest);
        line-height: 1.3;
        margin: 0 0 16px;
    }

    .jd2-text {
        color: var(--jd2-muted);
        line-height: 1.8;
        font-size: 15px;
        margin: 0;
        max-width: 68ch;
    }

    /* ---------- Daftar mata pelajaran ---------- */
    .jd2-mapel {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .jd2-mapel__item {
        display: flex;
        align-items: flex-start;
        gap: 16px;
        background: #fff;
        border: 1px solid var(--jd2-line);
        border-radius: 14px;
        padding: 16px 18px;
    }

    .jd2-mapel__index {
        flex: 0 0 auto;
        font-family: 'Fraunces', serif;
        font-weight: 600;
        font-size: 15px;
        color: var(--jd2-brass);
        background: var(--jd2-brass-soft);
        border-radius: 8px;
        width: 34px;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .jd2-mapel__body h3 {
        font-size: 15px;
        font-weight: 700;
        color: var(--jd2-forest);
        margin: 0 0 4px;
    }

    .jd2-mapel__body p {
        font-size: 13.5px;
        color: var(--jd2-muted);
        line-height: 1.65;
        margin: 0;
    }

    /* ---------- Tombol kembali ---------- */
    .jd2-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        align-self: flex-start;
        font-size: 14px;
        font-weight: 600;
        color: var(--jd2-forest);
        text-decoration: none;
        border: 1.5px solid var(--jd2-line);
        padding: 11px 20px;
        border-radius: 999px;
        transition: border-color .15s ease, color .15s ease, background .15s ease;
    }
    .jd2-back:hover {
        border-color: var(--jd2-brass);
        color: var(--jd2-brass);
        background: var(--jd2-brass-soft);
    }

    /* ---------- Galeri foto (bekas posisi Menu Navigasi) ---------- */
    .jd2-gallery { position: sticky; top: 24px; }

    .jd2-gallery__label {
        font-size: 12.5px;
        font-weight: 600;
        color: var(--jd2-muted);
        text-transform: none;
        margin: 0 0 12px;
    }

    .jd2-gallery__list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .jd2-gallery__item {
        border-radius: 16px;
        overflow: hidden;
        height: 130px;
        box-shadow: 0 8px 20px -16px rgba(10, 61, 48, 0.4);
    }

    .jd2-gallery__item--tall { height: 220px; }

    .jd2-gallery__item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform .4s ease;
    }
    .jd2-gallery__item:hover img { transform: scale(1.06); }

    /* ---------- Responsive ---------- */
    @media (max-width: 900px) {
        .jd2-layout { grid-template-columns: 1fr; }
        .jd2-gallery { position: static; }
        .jd2-gallery__list { flex-direction: row; overflow-x: auto; padding-bottom: 4px; }
        .jd2-gallery__item { flex: 0 0 auto; width: 200px; height: 150px; }
        .jd2-gallery__item--tall { height: 150px; }
    }

    @media (max-width: 640px) {
        .jd2-panel { padding: 26px 22px; }
        .jd2-switcher { gap: 8px; }
        .jd2-chip { font-size: 13px; padding: 8px 14px; }
    }
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\web-sekolah-ukk-otang\resources\views/jurusan-detail.blade.php ENDPATH**/ ?>