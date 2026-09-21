

<?php $__env->startSection('title', $ekskul->nama); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&display=swap" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<?php
    $mainPhoto = $ekskul->fotos->first();
?>

<div class="ekm3">

    <div class="container ekm3-topbar">
        <a href="<?php echo e(route('ekstrakurikuler')); ?>" class="ekm3-back">&larr; Semua Ekstrakurikuler</a>
    </div>

    <header class="container ekm3-banner">
        <div class="ekm3-banner__media" id="ekm3BannerMedia" <?php if($mainPhoto): ?> data-bg="<?php echo e(asset('storage/' . $mainPhoto->file)); ?>" <?php endif; ?>>
            <span class="ekm3-banner__shade"></span>
            <?php if($ekskul->logo): ?>
                <span class="ekm3-banner__logo">
                    <img src="<?php echo e(asset('storage/' . $ekskul->logo)); ?>" alt="Logo <?php echo e($ekskul->nama); ?>">
                </span>
            <?php endif; ?>
            <h1><?php echo e($ekskul->nama); ?></h1>
        </div>
    </header>

    <nav class="container ekm3-tabs" role="tablist">
        <button type="button" class="ekm3-tab is-active" data-tab="tentang">Tentang</button>
        <button type="button" class="ekm3-tab" data-tab="jadwal">Jadwal &amp; Info</button>
        <?php if($ekskul->fotos->count() > 1): ?>
            <button type="button" class="ekm3-tab" data-tab="galeri">Galeri</button>
        <?php endif; ?>
        <button type="button" class="ekm3-tab" data-tab="pembina">Pembina</button>
    </nav>

    <div class="container ekm3-panels">

        <section class="ekm3-panel is-active" data-panel="tentang">
            <p class="ekm3-lead"><?php echo e($ekskul->deskripsi); ?></p>
            <div class="ekm3-cta">
                <div>
                    <h3>Tertarik ikut <?php echo e($ekskul->nama); ?>?</h3>
                    <p>Kembangkan minat dan bakatmu bersama teman-teman lainnya.</p>
                </div>
                <a href="<?php echo e(route('ekstrakurikuler')); ?>" class="ekm3-cta__btn">Lihat Lainnya &rarr;</a>
            </div>
        </section>

        <section class="ekm3-panel" data-panel="jadwal">
            <div class="ekm3-facts">
                <div class="ekm3-fact">
                    <span class="ekm3-fact__label">Hari Latihan</span>
                    <strong><?php echo e($ekskul->jadwal_hari ?? 'Setiap Sabtu'); ?></strong>
                </div>
                <div class="ekm3-fact">
                    <span class="ekm3-fact__label">Waktu</span>
                    <strong><?php echo e($ekskul->jadwal_waktu ?? 'Pukul 14.00 - 16.30 WIB'); ?></strong>
                </div>
                <div class="ekm3-fact">
                    <span class="ekm3-fact__label">Lokasi</span>
                    <strong><?php echo e($ekskul->jadwal_lokasi ?? 'Lapangan SMK N 1 Cijati'); ?></strong>
                </div>
            </div>
            <div class="ekm3-tags">
                <span>Siswa Aktif</span>
                <span>Non-Akademik</span>
            </div>
        </section>

        <?php if($ekskul->fotos->count() > 1): ?>
            <section class="ekm3-panel" data-panel="galeri">
                <div class="ekm3-gallery">
                    <?php $__currentLoopData = $ekskul->fotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="ekm3-gallery__item">
                            <img src="<?php echo e(asset('storage/' . $foto->file)); ?>" alt="Kegiatan <?php echo e($ekskul->nama); ?>" loading="lazy">
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </section>
        <?php endif; ?>

        <section class="ekm3-panel" data-panel="pembina">
            <div class="ekm3-pembina">
                <div class="ekm3-pembina__photo">
                    <?php if(!empty($ekskul->pembina_foto)): ?>
                        <img src="<?php echo e(asset('storage/' . $ekskul->pembina_foto)); ?>" alt="Foto Pembina <?php echo e($ekskul->nama); ?>">
                    <?php else: ?>
                        <span>&#128100;</span>
                    <?php endif; ?>
                </div>
                <strong><?php echo e($ekskul->pembina_nama ?? 'Nama pembina belum diisi'); ?></strong>
                <span class="ekm3-pembina__role"><?php echo e($ekskul->pembina_jabatan ?? 'Guru Pembina Ekstrakurikuler'); ?></span>
                <blockquote class="ekm3-quote">
                    &ldquo;<?php echo e($ekskul->pembina_sambutan ?? 'Selamat bergabung di ' . $ekskul->nama . '. Mari kita kembangkan semangat, kekompakan, dan prestasi bersama-sama.'); ?>&rdquo;
                </blockquote>
            </div>
        </section>

    </div>
</div>

<style>
    .ekm3 {
        --ekm3-ink: #1F2A24;
        --ekm3-forest: #0A3D30;
        --ekm3-forest-2: #0F5C46;
        --ekm3-paper: #FAF7F1;
        --ekm3-line: #E7E1D6;
        --ekm3-brass: #A9782F;
        --ekm3-brass-soft: rgba(169, 120, 47, 0.1);
        --ekm3-muted: #5C6A62;
        font-family: 'Inter', system-ui, sans-serif;
        isolation: isolate;
        padding-bottom: 70px;
    }

    /* ---------- Topbar ---------- */
    .ekm3-topbar { padding: 26px clamp(16px, 4vw, 56px) 0; }
    .ekm3-back {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 13.5px;
        font-weight: 600;
        color: var(--ekm3-forest);
        text-decoration: none;
        border: 1.5px solid var(--ekm3-line);
        padding: 8px 16px;
        border-radius: 999px;
        transition: border-color .15s ease, color .15s ease, background .15s ease;
    }
    .ekm3-back:hover {
        border-color: var(--ekm3-brass);
        color: var(--ekm3-brass);
        background: var(--ekm3-brass-soft);
    }

    /* ---------- Banner ringkas (bukan hero layar penuh) ---------- */
    .ekm3-banner { padding: 20px clamp(16px, 4vw, 56px) 0; }
    .ekm3-banner__media {
        position: relative;
        height: 440px;
        border-radius: 22px;
        overflow: hidden;
        background-color: var(--ekm3-forest);
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: flex-end;
        gap: 16px;
        padding: 32px 32px;
    }
    .ekm3-banner__shade {
        position: absolute;
        inset: 0;
        background: linear-gradient(0deg, rgba(10,61,48,.85) 0%, rgba(10,61,48,.2) 60%, rgba(10,61,48,.35) 100%);
    }
    .ekm3-banner__logo {
        position: relative;
        z-index: 2;
        width: 52px;
        height: 52px;
        border-radius: 14px;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        flex-shrink: 0;
        box-shadow: 0 8px 18px rgba(0,0,0,.25);
    }
    .ekm3-banner__logo img { width: 100%; height: 100%; object-fit: contain; padding: 8px; }
    .ekm3-banner__media h1 {
        position: relative;
        z-index: 2;
        font-family: 'Fraunces', serif;
        font-weight: 700;
        font-size: clamp(24px, 3.6vw, 36px);
        color: #fff;
        margin: 0;
        text-shadow: 0 2px 10px rgba(0,0,0,.3);
    }

    /* ---------- Tabs ---------- */
    .ekm3-tabs {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        padding: 24px clamp(16px, 4vw, 56px) 0;
        border-bottom: 1px solid var(--ekm3-line);
    }
    .ekm3-tab {
        appearance: none;
        background: transparent;
        border: none;
        font-family: 'Inter', sans-serif;
        font-size: 14px;
        font-weight: 600;
        color: var(--ekm3-muted);
        padding: 10px 4px 14px;
        margin-bottom: -1px;
        border-bottom: 2.5px solid transparent;
        cursor: pointer;
        transition: color .15s ease, border-color .15s ease;
    }
    .ekm3-tab:hover { color: var(--ekm3-forest); }
    .ekm3-tab.is-active {
        color: var(--ekm3-forest);
        border-bottom-color: var(--ekm3-brass);
    }

    /* ---------- Panels ---------- */
    .ekm3-panels { padding: 36px clamp(16px, 4vw, 56px) 0; }
    .ekm3-panel { display: none; }
    .ekm3-panel.is-active { display: block; animation: ekm3Fade .35s ease; }

    @keyframes ekm3Fade {
        from { opacity: 0; transform: translateY(8px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .ekm3-lead {
        font-family: 'Fraunces', serif;
        font-weight: 500;
        font-size: 19px;
        line-height: 1.7;
        color: var(--ekm3-ink);
        max-width: 66ch;
        margin: 0 0 36px;
    }

    .ekm3-cta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        flex-wrap: wrap;
        background: var(--ekm3-paper);
        border: 1px solid var(--ekm3-line);
        border-radius: 18px;
        padding: 26px 28px;
    }
    .ekm3-cta h3 {
        font-family: 'Fraunces', serif;
        font-weight: 600;
        font-size: 18px;
        color: var(--ekm3-forest);
        margin: 0 0 6px;
    }
    .ekm3-cta p { font-size: 13.5px; color: var(--ekm3-muted); margin: 0; }
    .ekm3-cta__btn {
        flex-shrink: 0;
        display: inline-block;
        background: var(--ekm3-brass);
        color: #fff;
        font-weight: 700;
        font-size: 13.5px;
        text-decoration: none;
        padding: 12px 22px;
        border-radius: 999px;
        transition: transform .2s ease, background .2s ease;
    }
    .ekm3-cta__btn:hover { transform: translateY(-2px); background: #8F6427; }

    /* ---------- Jadwal ---------- */
    .ekm3-facts {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 16px;
        margin-bottom: 20px;
    }
    .ekm3-fact {
        background: var(--ekm3-paper);
        border: 1px solid var(--ekm3-line);
        border-radius: 16px;
        padding: 20px 20px;
        display: flex;
        flex-direction: column;
        gap: 6px;
    }
    .ekm3-fact__label {
        font-size: 11.5px;
        font-weight: 700;
        letter-spacing: .04em;
        text-transform: uppercase;
        color: var(--ekm3-brass);
    }
    .ekm3-fact strong { font-size: 15px; font-weight: 700; color: var(--ekm3-forest); }

    .ekm3-tags { display: flex; gap: 8px; flex-wrap: wrap; }
    .ekm3-tags span {
        font-size: 12px;
        font-weight: 700;
        color: var(--ekm3-brass);
        background: var(--ekm3-brass-soft);
        border: 1px solid rgba(169,120,47,.28);
        padding: 6px 14px;
        border-radius: 999px;
    }

    /* ---------- Galeri ---------- */
    .ekm3-gallery {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 14px;
    }
    .ekm3-gallery__item {
        aspect-ratio: 4 / 3;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 10px 22px -16px rgba(10, 61, 48, 0.4);
    }
    .ekm3-gallery__item img { width: 100%; height: 100%; object-fit: cover; display: block; }

    /* ---------- Pembina ---------- */
    .ekm3-pembina {
        max-width: 480px;
        text-align: center;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 4px;
    }
    .ekm3-pembina__photo {
        width: 78px;
        height: 78px;
        border-radius: 50%;
        overflow: hidden;
        background: var(--ekm3-paper);
        border: 1px solid var(--ekm3-line);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 14px;
    }
    .ekm3-pembina__photo img { width: 100%; height: 100%; object-fit: cover; }
    .ekm3-pembina__photo span { font-size: 30px; opacity: .5; }
    .ekm3-pembina strong { font-size: 16px; color: var(--ekm3-forest); }
    .ekm3-pembina__role { font-size: 13px; color: var(--ekm3-brass); font-weight: 600; margin-bottom: 20px; }

    .ekm3-quote {
        margin: 0;
        font-family: 'Fraunces', serif;
        font-style: italic;
        font-weight: 500;
        font-size: 18px;
        line-height: 1.6;
        color: var(--ekm3-ink);
        border-left: 3px solid var(--ekm3-brass);
        padding-left: 18px;
        text-align: left;
    }

    /* ---------- Responsive ---------- */
    @media (max-width: 720px) {
        .ekm3-banner__media { height: 300px; }
        .ekm3-facts { grid-template-columns: 1fr; }
        .ekm3-gallery { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var banner = document.getElementById('ekm3BannerMedia');
    if (banner && banner.dataset.bg) {
        banner.style.backgroundImage = "url('" + banner.dataset.bg + "')";
    }

    var tabs = document.querySelectorAll('.ekm3-tab');
    var panels = document.querySelectorAll('.ekm3-panel');

    tabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            var target = tab.getAttribute('data-tab');

            tabs.forEach(function (t) { t.classList.remove('is-active'); });
            tab.classList.add('is-active');

            panels.forEach(function (panel) {
                panel.classList.toggle('is-active', panel.getAttribute('data-panel') === target);
            });
        });
    });
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\profile-sekolah-dhani-12rpl1\resources\views/ekstrakurikuler/show.blade.php ENDPATH**/ ?>