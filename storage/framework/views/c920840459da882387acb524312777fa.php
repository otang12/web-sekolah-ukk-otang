<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?php echo $__env->yieldContent('title'); ?> - Admin SMK Negeri 1 Cijati</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/jpeg" href="<?php echo e(asset('img/logo-sekolah.jpeg')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@700;800&display=swap" rel="stylesheet">
</head>
<body>

<div class="admin-layout">

    <aside class="admin-sidebar">
        <div class="admin-sidebar__brand">
            <img src="<?php echo e(asset('img/logo-sekolah.png')); ?>" alt="Logo SMK Negeri 1 Cijati" class="admin-sidebar__brand-icon">
            <div>
                <strong>Admin Panel</strong>
                <span>SMK Negeri 1 Cijati</span>
            </div>
        </div>

        <div class="admin-sidebar__label">MENU</div>

        <nav class="admin-sidebar__nav">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="admin-sidebar__link <?php echo e(request()->routeIs('admin.dashboard') ? 'admin-sidebar__link--active' : ''); ?>">
                <span class="admin-sidebar__link-icon">📊</span> Ringkasan
            </a>
            <a href="<?php echo e(route('admin.jurusan.index')); ?>" class="admin-sidebar__link <?php echo e(request()->routeIs('admin.jurusan.*') ? 'admin-sidebar__link--active' : ''); ?>">
                <span class="admin-sidebar__link-icon">🏫</span> Jurusan
            </a>
            <a href="<?php echo e(route('admin.news.index')); ?>" class="admin-sidebar__link <?php echo e(request()->routeIs('admin.news.*') ? 'admin-sidebar__link--active' : ''); ?>">
                <span class="admin-sidebar__link-icon">📰</span> Berita
            </a>
            <a href="<?php echo e(route('admin.guru.index')); ?>" class="admin-sidebar__link <?php echo e(request()->routeIs('admin.guru.*') ? 'admin-sidebar__link--active' : ''); ?>">
                <span class="admin-sidebar__link-icon">👩‍🏫</span> Guru &amp; Staf
            </a>
            <a href="<?php echo e(route('admin.galeri.index')); ?>" class="admin-sidebar__link <?php echo e(request()->routeIs('admin.galeri.*') ? 'admin-sidebar__link--active' : ''); ?>">
                <span class="admin-sidebar__link-icon">🖼️</span> Galeri
            </a>
            <a href="<?php echo e(route('admin.ekstrakurikuler.index')); ?>" class="admin-sidebar__link <?php echo e(request()->routeIs('admin.ekstrakurikuler.*') ? 'admin-sidebar__link--active' : ''); ?>">
                <span class="admin-sidebar__link-icon">🏆</span> Ekstrakurikuler
            </a>
        </nav>

        <div class="admin-sidebar__account">
            <img src="<?php echo e(asset('img/logo-sekolah.png')); ?>" alt="Logo SMK Negeri 1 Cijati" class="admin-sidebar__avatar">
            <div class="admin-sidebar__account-info">
                <strong><?php echo e(auth()->user()->name); ?></strong>
                <span>Administrator</span>
            </div>
            <form method="POST" action="<?php echo e(route('logout')); ?>" class="admin-sidebar__logout-form">
                <?php echo csrf_field(); ?>
                <button type="submit" class="admin-sidebar__logout" title="Logout">&larr;</button>
            </form>
        </div>
    </aside>

    <main class="admin-main">
        <div class="admin-wrapper">
            <?php if (! (request()->routeIs('admin.dashboard'))): ?>
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="admin-back">&larr; Kembali ke Dashboard</a>
            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>

</div>

<style>
    :root {
        --navy: #0F5C46;
        --navy-deep: #0A3D30;
        --teal: #6D28D9;
        --amber: #FF6B4A;
        --coral: #FFB020;
        --cream: #FAF7F1;
        --ink: #22303C;
        --ink-soft: #5C6A62;
        --line: #E7E1D6;
    }

    * { box-sizing: border-box; }

    body {
        margin: 0;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background: var(--cream);
        color: var(--ink);
    }

    .admin-layout {
        display: flex;
        min-height: 100vh;
    }

    /* ---------- Sidebar: kaca navy dengan glow (disamakan dengan dashboard) ---------- */
    .admin-sidebar {
        width: 260px;
        flex-shrink: 0;
        background: linear-gradient(180deg, var(--navy-deep), var(--navy) 60%, var(--navy-deep));
        color: #fff;
        padding: 28px 20px;
        display: flex;
        flex-direction: column;
        position: sticky;
        top: 0;
        height: 100vh;
        overflow: hidden;
        box-shadow: 6px 0 30px rgba(10, 61, 48, 0.25);
    }

    .admin-sidebar::before {
        content: "";
        position: absolute;
        width: 260px;
        height: 260px;
        border-radius: 50%;
        background: radial-gradient(circle, var(--amber), transparent 70%);
        opacity: 0.16;
        filter: blur(50px);
        top: -80px;
        left: -80px;
        pointer-events: none;
    }
    .admin-sidebar::after {
        content: "";
        position: absolute;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        background: radial-gradient(circle, var(--teal), transparent 70%);
        opacity: 0.18;
        filter: blur(50px);
        bottom: -60px;
        right: -80px;
        pointer-events: none;
    }

    .admin-sidebar > * {
        position: relative;
        z-index: 1;
    }

    .admin-sidebar__brand {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 28px;
    }

    .admin-sidebar__brand-icon {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: #fff;
        object-fit: cover;
        flex-shrink: 0;
        box-shadow: inset 0 1px 1px rgba(255,255,255,0.6), 0 8px 18px rgba(0,0,0,0.35);
    }

    .admin-sidebar__brand strong {
        display: block;
        font-family: 'Sora', sans-serif;
        font-size: 15px;
    }

    .admin-sidebar__brand span {
        display: block;
        font-size: 12px;
        color: #9FB2BF;
    }

    .admin-sidebar__label {
        font-size: 11px;
        letter-spacing: 1.5px;
        color: #7E93A0;
        font-weight: 700;
        margin: 8px 4px 12px;
    }

    .admin-sidebar__nav {
        display: flex;
        flex-direction: column;
        gap: 5px;
        flex: 1;
    }

    .admin-sidebar__link {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 11px 14px;
        border-radius: 12px;
        color: #C4CFD5;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        transition: background 0.2s ease, color 0.2s ease, transform 0.2s ease;
    }

    .admin-sidebar__link:hover {
        background: rgba(255, 255, 255, 0.08);
        color: #fff;
        transform: translateX(3px);
    }

    .admin-sidebar__link--active {
        background: linear-gradient(135deg, var(--amber), var(--coral));
        color: #fff;
        font-weight: 700;
        box-shadow: inset 0 1px 1px rgba(255,255,255,0.4), inset 0 -3px 6px rgba(0,0,0,0.15), 0 10px 22px rgba(255, 107, 74, 0.32);
    }

    .admin-sidebar__link--active:hover {
        background: linear-gradient(135deg, #FF8B70, var(--coral));
        color: #fff;
        transform: none;
    }

    .admin-sidebar__link-icon {
        font-size: 16px;
    }

    .admin-sidebar__account {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 20px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        padding-top: 18px;
    }

    .admin-sidebar__avatar {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: #fff;
        object-fit: cover;
        flex-shrink: 0;
    }

    .admin-sidebar__account-info {
        flex: 1;
        min-width: 0;
    }

    .admin-sidebar__account-info strong {
        display: block;
        font-size: 13.5px;
        color: #fff;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .admin-sidebar__account-info span {
        display: block;
        font-size: 11.5px;
        color: #9FB2BF;
    }

    .admin-sidebar__logout-form {
        flex-shrink: 0;
    }

    .admin-sidebar__logout {
        width: 32px;
        height: 32px;
        border-radius: 9px;
        background: rgba(255, 176, 32, 0.18);
        border: none;
        color: #f0a58a;
        font-size: 15px;
        cursor: pointer;
        transition: background 0.2s ease, transform 0.2s ease;
    }

    .admin-sidebar__logout:hover {
        background: rgba(255, 176, 32, 0.32);
        transform: scale(1.08);
    }

    /* ===== MAIN AREA ===== */
    .admin-main {
        flex: 1;
        min-width: 0;
    }

    .admin-wrapper {
        max-width: 1100px;
        margin: 0 auto;
        padding: 32px 24px 60px;
        animation: fadeSlideUp 0.5s ease-out both;
    }

    .admin-back {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 24px;
        color: var(--coral);
        text-decoration: none;
        font-size: 13.5px;
        font-weight: 700;
        background: #fff;
        padding: 8px 16px;
        border-radius: 999px;
        box-shadow: 0 2px 8px rgba(10, 61, 48, 0.06);
        transition: box-shadow 0.2s ease, transform 0.2s ease;
    }
    .admin-back:hover {
        box-shadow: 0 6px 16px rgba(255, 107, 74, 0.18);
        transform: translateX(-3px);
    }

    .admin-desc {
        color: var(--ink-soft);
        margin-bottom: 32px;
        font-size: 14.5px;
    }

    h1 {
        font-family: 'Sora', sans-serif;
        font-size: 26px;
        font-weight: 800;
        color: var(--navy);
        letter-spacing: -0.3px;
    }

    .admin-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
    }

    .admin-menu-card {
        position: relative;
        background-image: linear-gradient(#fff, #fff), linear-gradient(135deg, var(--amber), var(--teal));
        background-origin: border-box;
        background-clip: padding-box, border-box;
        border: 2px solid transparent;
        border-radius: 16px;
        box-shadow: 0 4px 14px rgba(10, 61, 48, 0.06), 0 18px 34px rgba(15, 92, 70, 0.08);
        padding: 26px 22px;
        text-align: left;
        text-decoration: none;
        color: inherit;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .admin-menu-card:hover {
        transform: translateY(-8px) scale(1.015);
        box-shadow: 0 6px 16px rgba(10, 61, 48, 0.08), 0 30px 54px rgba(255, 107, 74, 0.2);
    }

    .admin-menu-card__icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        border-radius: 14px;
        background: linear-gradient(160deg, #fff4e6, #ffe3c2);
        font-size: 24px;
        margin-bottom: 16px;
        box-shadow: inset 0 1px 1px rgba(255,255,255,0.8), inset 0 -3px 6px rgba(0,0,0,0.06), 0 10px 20px rgba(255, 107, 74, 0.18);
        transition: transform 0.22s ease;
    }

    .admin-menu-card:hover .admin-menu-card__icon {
        transform: translateY(-2px) scale(1.08) rotate(-4deg);
    }

    .admin-menu-card h3 {
        margin: 0 0 6px;
        font-size: 16px;
        font-weight: 700;
        color: var(--navy);
    }

    .admin-menu-card p {
        margin: 0;
        font-size: 13px;
        color: var(--ink-soft);
        line-height: 1.5;
    }

    .admin-page-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 22px;
        flex-wrap: wrap;
        gap: 12px;
    }

    .admin-page-head h1 {
        font-size: 22px;
        margin: 0;
    }

    .btn-add {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, var(--amber), var(--coral));
        color: #fff;
        text-decoration: none;
        padding: 11px 22px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 14px;
        box-shadow: 0 12px 24px rgba(255, 107, 74, 0.3);
        transition: transform 0.15s ease, box-shadow 0.15s ease;
    }

    .btn-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 16px 30px rgba(255, 107, 74, 0.4);
    }

    .alert-success {
        background: #ecfdf5;
        border: 1px solid #a7f3d0;
        color: #047857;
        padding: 13px 16px;
        border-radius: 10px;
        margin-bottom: 20px;
        font-size: 14px;
        font-weight: 600;
    }

    .admin-table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(10, 61, 48, 0.06), 0 20px 40px rgba(15, 92, 70, 0.05);
        border: 1px solid var(--line);
    }

    .admin-table th, .admin-table td {
        padding: 13px 16px;
        text-align: left;
        border-bottom: 1px solid #f1f2f8;
        font-size: 14px;
        vertical-align: middle;
    }

    .admin-table tr:last-child td {
        border-bottom: none;
    }

    .admin-table th {
        background: #FAF8F3;
        font-weight: 700;
        color: var(--navy);
        font-size: 12.5px;
        text-transform: uppercase;
        letter-spacing: 0.4px;
    }

    .admin-table tr:hover td {
        background: #FAF8F3;
    }

    .admin-table__thumb {
        width: 48px;
        height: 48px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(10, 61, 48, 0.12);
    }

    .admin-table__no-photo {
        color: #9ca3af;
    }

    .admin-table__actions {
        display: flex;
        gap: 8px;
    }

    .admin-table__actions form {
        margin: 0;
    }

    .btn-edit, .btn-delete {
        border: none;
        padding: 7px 15px;
        border-radius: 8px;
        font-size: 12.5px;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        transition: transform 0.15s ease, background 0.15s ease;
    }

    .btn-edit {
        background: #FDF1DA;
        color: var(--coral);
    }

    .btn-edit:hover {
        background: #FCE6C0;
        transform: translateY(-1px);
    }

    .btn-delete {
        background: #fee2e2;
        color: #b91c1c;
    }

    .btn-delete:hover {
        background: #fecaca;
        transform: translateY(-1px);
    }

    .admin-form {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 4px 16px rgba(10, 61, 48, 0.06), 0 24px 48px rgba(15, 92, 70, 0.06);
        border: 1px solid var(--line);
        padding: 30px;
        max-width: 640px;
    }

    .admin-form .form-group {
        margin-bottom: 20px;
    }

    .admin-form label {
        display: block;
        font-size: 13px;
        font-weight: 700;
        color: var(--ink);
        margin-bottom: 7px;
    }

    .admin-form input[type="text"],
    .admin-form input[type="number"],
    .admin-form input[type="datetime-local"],
    .admin-form textarea,
    .admin-form select {
        width: 100%;
        padding: 11px 13px;
        border: 1.5px solid var(--line);
        border-radius: 10px;
        font-size: 14px;
        box-sizing: border-box;
        font-family: inherit;
        background: #FAF8F3;
        transition: border-color 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
    }

    .admin-form input:focus,
    .admin-form textarea:focus,
    .admin-form select:focus {
        outline: none;
        border-color: var(--amber);
        background: #fff;
        box-shadow: 0 0 0 4px rgba(255, 107, 74, 0.15);
    }

    .admin-form textarea {
        resize: vertical;
        min-height: 100px;
    }

    .admin-form .current-photo {
        margin-bottom: 10px;
    }

    .admin-form .current-photo img {
        width: 90px;
        height: 90px;
        object-fit: cover;
        border-radius: 10px;
        display: block;
        box-shadow: 0 6px 14px rgba(10, 61, 48, 0.14);
    }

    .admin-form .error-text {
        color: #dc2626;
        font-size: 12px;
        margin-top: 5px;
    }

    .form-actions {
        display: flex;
        gap: 12px;
        margin-top: 26px;
    }

    .btn-save {
        position: relative;
        overflow: hidden;
        background: var(--navy);
        color: #fff;
        border: none;
        padding: 11px 28px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 14px;
        cursor: pointer;
        box-shadow: inset 0 1px 1px rgba(255,255,255,0.15), 0 14px 26px rgba(10, 61, 48, 0.3);
        transition: transform 0.15s ease, box-shadow 0.15s ease, background 0.15s ease;
    }

    .btn-save:hover {
        transform: translateY(-2px);
        background: #0F5C46;
        box-shadow: inset 0 1px 1px rgba(255,255,255,0.2), 0 18px 34px rgba(10, 61, 48, 0.4);
    }

    .btn-cancel {
        background: #EDEBE3;
        color: var(--ink);
        text-decoration: none;
        padding: 11px 28px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 14px;
        transition: background 0.15s ease;
    }

    .btn-cancel:hover {
        background: #E3DFD3;
    }

    @keyframes fadeSlideUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 900px) {
        .admin-layout { flex-direction: column; }
        .admin-sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }
        .admin-wrapper { padding: 24px 16px 40px; }
    }

    @media (prefers-reduced-motion: reduce) {
        .admin-wrapper, .admin-menu-card, .admin-sidebar__link,
        .btn-add, .btn-save, .admin-back {
            animation: none !important;
            transition: none !important;
        }
    }
</style>

</body>
</html><?php /**PATH C:\laragon\www\web-sekolah-ukk-otang\resources\views/layouts/admin.blade.php ENDPATH**/ ?>