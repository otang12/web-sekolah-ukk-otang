<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - SMK Negeri 1 Cijati</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/jpeg" href="<?php echo e(asset('img/logo-sekolah.jpeg')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@600;700;800&display=swap" rel="stylesheet">
</head>
<body>

<div class="dash2">

    <!-- ===================== NAVBAR ATAS ===================== -->
    <header class="dash2-nav">
        <div class="dash2-nav__brand">
            <img src="<?php echo e(asset('img/logo-sekolah.png')); ?>" alt="Logo SMK Negeri 1 Cijati">
            <span>SMK Negeri 1 Cijati</span>
        </div>

        <nav class="dash2-nav__menu">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="<?php echo e(request()->routeIs('admin.dashboard') ? 'is-active' : ''); ?>">Ringkasan</a>
            <a href="<?php echo e(route('admin.jurusan.index')); ?>" class="<?php echo e(request()->routeIs('admin.jurusan.*') ? 'is-active' : ''); ?>">Jurusan</a>
            <a href="<?php echo e(route('admin.news.index')); ?>" class="<?php echo e(request()->routeIs('admin.news.*') ? 'is-active' : ''); ?>">Berita</a>
            <a href="<?php echo e(route('admin.guru.index')); ?>" class="<?php echo e(request()->routeIs('admin.guru.*') ? 'is-active' : ''); ?>">Guru &amp; Staf</a>
            <a href="<?php echo e(route('admin.galeri.index')); ?>" class="<?php echo e(request()->routeIs('admin.galeri.*') ? 'is-active' : ''); ?>">Galeri</a>
            <a href="<?php echo e(route('admin.ekstrakurikuler.index')); ?>" class="<?php echo e(request()->routeIs('admin.ekstrakurikuler.*') ? 'is-active' : ''); ?>">Ekstrakurikuler</a>
        </nav>

        <div class="dash2-nav__account">
            <div class="dash2-nav__account-text">
                <strong><?php echo e(auth()->user()->name); ?></strong>
                <span>Administrator</span>
            </div>
            <img src="<?php echo e(asset('img/logo-sekolah.png')); ?>" alt="" class="dash2-nav__avatar">
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" title="Logout">
                    <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                </button>
            </form>
        </div>
    </header>

    <!-- ===================== ISI DASHBOARD ===================== -->
    <main class="dash2-body">

        
        <?php
            $statCards = [
                ['label' => 'Total Siswa', 'value' => '720', 'note' => '+12 bulan ini'],
                ['label' => 'Total Guru', 'value' => '51', 'note' => '+2 bulan ini'],
                ['label' => 'Ekstrakurikuler', 'value' => '10', 'note' => 'Stabil'],
                ['label' => 'Program Keahlian', 'value' => '4', 'note' => 'Program aktif'],
            ];

            $aktivitasContoh = [
                ['judul' => 'Maulid Nabi Muhammad SAW', 'waktu' => '10 menit lalu'],
                ['judul' => 'Hari Jadi Provinsi Jabar ke-81', 'waktu' => '2 jam lalu'],
                ['judul' => 'Dokumentasi Kegiatan Lomba 17 Agustus', 'waktu' => 'Kemarin'],
                ['judul' => 'Dirgahayu RI Ke-81', 'waktu' => '2 hari lalu'],
            ];

            $quickLinks = [
                ['route' => 'admin.jurusan.index', 'label' => 'Jurusan', 'icon' => '<path d="M3 21h18"></path><path d="M5 21V9l7-5 7 5v12"></path><path d="M9 21v-6h6v6"></path>'],
                ['route' => 'admin.news.index', 'label' => 'Berita', 'icon' => '<path d="M4 4h13a2 2 0 0 1 2 2v13a1 1 0 0 1-1 1H6a2 2 0 0 1-2-2V4Z"></path><line x1="8" y1="9" x2="14" y2="9"></line><line x1="8" y1="13" x2="14" y2="13"></line>'],
                ['route' => 'admin.guru.index', 'label' => 'Guru & Staf', 'icon' => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle>'],
                ['route' => 'admin.galeri.index', 'label' => 'Galeri', 'icon' => '<rect x="3" y="3" width="18" height="18" rx="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><path d="m21 15-5-5L5 21"></path>'],
                ['route' => 'admin.ekstrakurikuler.index', 'label' => 'Ekstrakurikuler', 'icon' => '<path d="M8 21h8"></path><path d="M12 17v4"></path><path d="M7 4h10v5a5 5 0 0 1-10 0V4Z"></path>'],
            ];
        ?>

        <!-- Hero greeting -->
        <section class="dash2-hero">
            <div>
                <span class="dash2-hero__date"><?php echo e(now()->translatedFormat('l, j F Y')); ?></span>
                <h1>Selamat datang, <?php echo e(auth()->user()->name); ?> 👋</h1>
                <p>Berikut ringkasan aktivitas sekolah hari ini.</p>
            </div>
            <div class="dash2-hero__photo">
                <img src="<?php echo e(asset('img/hero/hero-1.jpeg')); ?>" alt="Gerbang SMK Negeri 1 Cijati">
            </div>
        </section>

        <!-- Grid utama: stats + timeline berdampingan -->
        <div class="dash2-columns">

            <div class="dash2-stats-col">
                <div class="dash2-stats">
                    <?php $__currentLoopData = $statCards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="dash2-stat">
                            <span class="dash2-stat__value"><?php echo e($card['value']); ?></span>
                            <span class="dash2-stat__label"><?php echo e($card['label']); ?></span>
                            <span class="dash2-stat__note"><?php echo e($card['note']); ?></span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <h2 class="dash2-subtitle">Kelola Konten</h2>
                <div class="dash2-quicklinks">
                    <?php $__currentLoopData = $quickLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route($link['route'])); ?>" class="dash2-quicklink">
                            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo $link['icon']; ?></svg>
                            <span><?php echo e($link['label']); ?></span>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <aside class="dash2-timeline-col">
                <h2 class="dash2-subtitle">Aktivitas Terbaru</h2>
                <ol class="dash2-timeline">
                    <?php $__currentLoopData = $aktivitasContoh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <span class="dash2-timeline__dot"></span>
                            <div>
                                <p><?php echo e($item['judul']); ?></p>
                                <time><?php echo e($item['waktu']); ?></time>
                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
            </aside>

        </div>
    </main>
</div>

<style>
    :root {
        --navy: #0F5C46;
        --navy-deep: #0A3D30;
        --bg-page: #0E1512;
        --teal: #6D28D9;
        --amber: #FF6B4A;
        --coral: #FFB020;
        --ink-soft: #9FB0A8;
        --line: rgba(255,255,255,0.08);
    }

    * { box-sizing: border-box; }

    body {
        margin: 0;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background: var(--bg-page);
        color: #fff;
    }

    .dash2 { min-height: 100vh; }

    /* ===================== NAVBAR ===================== */
    .dash2-nav {
        display: flex;
        align-items: center;
        gap: 28px;
        padding: 14px 32px;
        background: rgba(255,255,255,0.03);
        border-bottom: 1px solid var(--line);
        position: sticky;
        top: 0;
        z-index: 10;
        backdrop-filter: blur(10px);
    }

    .dash2-nav__brand {
        display: flex;
        align-items: center;
        gap: 10px;
        font-family: 'Sora', sans-serif;
        font-weight: 700;
        font-size: 14.5px;
        flex-shrink: 0;
    }
    .dash2-nav__brand img {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #fff;
        object-fit: cover;
    }

    .dash2-nav__menu {
        display: flex;
        gap: 4px;
        flex: 1;
        overflow-x: auto;
    }
    .dash2-nav__menu a {
        white-space: nowrap;
        color: var(--ink-soft);
        text-decoration: none;
        font-size: 13.5px;
        font-weight: 600;
        padding: 8px 14px;
        border-radius: 999px;
        transition: background 0.15s ease, color 0.15s ease;
    }
    .dash2-nav__menu a:hover {
        color: #fff;
        background: rgba(255,255,255,0.06);
    }
    .dash2-nav__menu a.is-active {
        color: var(--navy-deep);
        background: var(--amber);
    }

    .dash2-nav__account {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-shrink: 0;
    }
    .dash2-nav__account-text {
        text-align: right;
        line-height: 1.3;
    }
    .dash2-nav__account-text strong {
        display: block;
        font-size: 12.5px;
    }
    .dash2-nav__account-text span {
        display: block;
        font-size: 11px;
        color: var(--ink-soft);
    }
    .dash2-nav__avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #fff;
        object-fit: cover;
    }
    .dash2-nav__account form { margin: 0; }
    .dash2-nav__account button {
        width: 30px;
        height: 30px;
        border-radius: 8px;
        background: rgba(255,255,255,0.06);
        border: none;
        color: var(--ink-soft);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.15s ease, color 0.15s ease;
    }
    .dash2-nav__account button:hover {
        background: rgba(255, 107, 74, 0.2);
        color: var(--amber);
    }

    /* ===================== BODY ===================== */
    .dash2-body {
        max-width: 1240px;
        margin: 0 auto;
        padding: 32px 28px 70px;
    }

    /* ---- Hero ---- */
    .dash2-hero {
        display: grid;
        grid-template-columns: 1.3fr 1fr;
        gap: 24px;
        align-items: stretch;
        background: linear-gradient(135deg, var(--navy-deep), var(--navy));
        border-radius: 22px;
        padding: 30px 34px;
        margin-bottom: 26px;
        overflow: hidden;
    }
    .dash2-hero__date {
        display: inline-block;
        font-size: 11.5px;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        color: var(--coral);
        margin-bottom: 10px;
    }
    .dash2-hero h1 {
        font-family: 'Sora', sans-serif;
        font-size: clamp(20px, 2.6vw, 27px);
        margin: 0 0 8px;
    }
    .dash2-hero p {
        margin: 0;
        color: var(--ink-soft);
        font-size: 14px;
    }
    .dash2-hero__photo {
        border-radius: 16px;
        overflow: hidden;
        min-height: 100px;
    }
    .dash2-hero__photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    /* ---- Columns ---- */
    .dash2-columns {
        display: grid;
        grid-template-columns: 1.4fr 1fr;
        gap: 24px;
        align-items: start;
    }

    .dash2-subtitle {
        font-family: 'Sora', sans-serif;
        font-size: 14.5px;
        font-weight: 700;
        color: #fff;
        margin: 0 0 14px;
    }

    /* ---- Stat cards (kolom kiri, atas) ---- */
    .dash2-stats {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 14px;
        margin-bottom: 30px;
    }
    .dash2-stat {
        background: rgba(255,255,255,0.04);
        border: 1px solid var(--line);
        border-radius: 16px;
        padding: 18px 20px;
    }
    .dash2-stat__value {
        display: block;
        font-family: 'Sora', sans-serif;
        font-weight: 800;
        font-size: 28px;
        color: #fff;
    }
    .dash2-stat__label {
        display: block;
        font-size: 12.5px;
        color: var(--ink-soft);
        margin-top: 4px;
    }
    .dash2-stat__note {
        display: block;
        font-size: 11px;
        color: var(--amber);
        margin-top: 6px;
        font-weight: 700;
    }

    /* ---- Quick links (icon row/grid) ---- */
    .dash2-quicklinks {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        gap: 12px;
    }
    .dash2-quicklink {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
        text-align: center;
        background: rgba(255,255,255,0.04);
        border: 1px solid var(--line);
        border-radius: 14px;
        padding: 18px 10px;
        color: var(--ink-soft);
        text-decoration: none;
        transition: background 0.2s ease, color 0.2s ease, transform 0.2s ease;
    }
    .dash2-quicklink svg {
        color: var(--amber);
    }
    .dash2-quicklink span {
        font-size: 12px;
        font-weight: 600;
    }
    .dash2-quicklink:hover {
        background: rgba(255, 107, 74, 0.12);
        color: #fff;
        transform: translateY(-3px);
    }

    /* ---- Timeline (kolom kanan) ---- */
    .dash2-timeline-col {
        background: rgba(255,255,255,0.04);
        border: 1px solid var(--line);
        border-radius: 18px;
        padding: 22px 22px 8px;
    }
    .dash2-timeline {
        list-style: none;
        margin: 0;
        padding: 0 0 0 4px;
        position: relative;
    }
    .dash2-timeline::before {
        content: '';
        position: absolute;
        left: 4.5px;
        top: 6px;
        bottom: 20px;
        width: 1.5px;
        background: var(--line);
    }
    .dash2-timeline li {
        position: relative;
        display: flex;
        gap: 16px;
        padding-bottom: 22px;
    }
    .dash2-timeline__dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: var(--amber);
        flex-shrink: 0;
        margin-top: 4px;
        box-shadow: 0 0 0 4px rgba(255,107,74,0.15);
    }
    .dash2-timeline li p {
        margin: 0 0 2px;
        font-size: 13px;
        color: #fff;
        font-weight: 500;
    }
    .dash2-timeline li time {
        font-size: 11.5px;
        color: var(--ink-soft);
    }

    @media (max-width: 900px) {
        .dash2-nav__menu { display: none; }
        .dash2-hero { grid-template-columns: 1fr; }
        .dash2-hero__photo { min-height: 140px; }
        .dash2-columns { grid-template-columns: 1fr; }
    }
</style>

</body>
</html><?php /**PATH C:\laragon\www\profile-sekolah-dhani-12rpl1\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>