<header class="site-header" id="site-header">
    <nav class="navbar container">
        <a href="<?php echo e(route('home')); ?>" class="navbar__brand">
           <img src="<?php echo e(asset('img/logo-sekolah.jpeg')); ?>" alt="Logo SMK Negeri 1 Cijati" class="navbar__badge">
            <span class="navbar__name">
                SMK Negeri 1 Cijati
                <small>Jl. Raya Cijati, Kabupaten Cianjur</small>
            </span>
        </a>

        <button class="navbar__toggle" id="nav-toggle" aria-label="Buka menu" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>

        <ul class="navbar__menu" id="nav-menu">
            <li><a href="<?php echo e(route('home')); ?>" class="<?php echo e(request()->routeIs('home') ? 'is-active' : ''); ?>">Beranda</a></li>
            <li><a href="<?php echo e(route('about')); ?>" class="<?php echo e(request()->routeIs('about') ? 'is-active' : ''); ?>">Profil Sekolah</a></li>
            <li><a href="<?php echo e(route('jurusan.index')); ?>" class="<?php echo e(request()->routeIs('jurusan.index') ? 'is-active' : ''); ?>">Program Keahlian</a></li>
            <li class="has-dropdown">
    <a href="<?php echo e(route('news.index')); ?>" class="<?php echo e(request()->routeIs('news.*') || request()->routeIs('galeri') ? 'is-active' : ''); ?>">
        Berita &amp; Galeri <span class="dropdown-arrow">&#9662;</span>
    </a>
    <ul class="dropdown-menu">
        <li><a href="<?php echo e(route('news.index')); ?>">Berita</a></li>
        <li><a href="<?php echo e(route('galeri')); ?>">Galeri</a></li>
    </ul>
</li>
            <li><a href="<?php echo e(route('ekstrakurikuler')); ?>" class="<?php echo e(request()->routeIs('ekstrakurikuler') ? 'is-active' : ''); ?>">Ekstrakurikuler</a></li>
            <li><a href="<?php echo e(route('guru')); ?>" class="<?php echo e(request()->routeIs('guru') ? 'is-active' : ''); ?>">Data Guru</a></li>

            <li class="navbar__login-item">
                <a href="<?php echo e(route('login')); ?>" class="navbar__login-btn">Login</a>
            </li>
        </ul>
    </nav>
</header>

<style>
    .navbar__login-item {
        margin-left: 12px;
        display: flex;
        align-items: center;
    }

    .navbar__login-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: var(--amber);
        color: var(--navy-deep) !important;
        padding: 8px 20px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 14px;
        line-height: 1.2;
        text-decoration: none;
        transition: background 0.2s ease, transform 0.15s ease;
    }

    .navbar__login-btn:hover {
        background: #FF8B70;
        transform: translateY(-1px);
    }

    @media (max-width: 900px) {
        .navbar__login-item {
            margin-left: 0;
            margin-top: 8px;
        }

        .navbar__login-btn {
            display: flex;
            width: 100%;
            text-align: center;
        }
    }
</style><?php /**PATH C:\laragon\www\web-sekolah-ukk-otang\resources\views/partials/navbar.blade.php ENDPATH**/ ?>