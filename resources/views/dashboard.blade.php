<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - SMK Negeri 1 Cijati</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<nav class="admin-nav">
    <div class="admin-nav__brand">SMK Negeri 1 Cijati &mdash; Admin</div>
    <div class="admin-nav__user">
        <span>{{ auth()->user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="admin-nav__logout">Logout</button>
        </form>
    </div>
</nav>

<div class="admin-wrapper">
    <h1>Dashboard Pengelola</h1>
    <p class="admin-desc">Pilih menu di bawah untuk mengelola konten website.</p>

    <div class="admin-grid">
        {{-- Ganti route() di bawah sesuai nama route controller CRUD yang sudah kamu buat --}}
        <a href="#" class="admin-menu-card">
            <span class="admin-menu-card__icon">🏫</span>
            <h3>Jurusan</h3>
            <p>Kelola daftar program keahlian</p>
        </a>

        <a href="#" class="admin-menu-card">
            <span class="admin-menu-card__icon">📰</span>
            <h3>Berita</h3>
            <p>Kelola berita &amp; kegiatan sekolah</p>
        </a>

        <a href="#" class="admin-menu-card">
            <span class="admin-menu-card__icon">👩‍🏫</span>
            <h3>Guru &amp; Staf</h3>
            <p>Kelola data guru dan staf</p>
        </a>

        <a href="#" class="admin-menu-card">
            <span class="admin-menu-card__icon">🖼️</span>
            <h3>Galeri</h3>
            <p>Kelola foto kegiatan sekolah</p>
        </a>

        <a href="#" class="admin-menu-card">
            <span class="admin-menu-card__icon">🏆</span>
            <h3>Ekstrakurikuler</h3>
            <p>Kelola daftar ekstrakurikuler</p>
        </a>
    </div>
</div>

<style>
    body {
        margin: 0;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background: #f1f5f9;
        color: #1f2937;
    }

    .admin-nav {
        background: #0F5C46;
        color: #fff;
        padding: 16px 32px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .admin-nav__brand {
        font-weight: 700;
    }

    .admin-nav__user {
        display: flex;
        align-items: center;
        gap: 16px;
        font-size: 14px;
    }

    .admin-nav__logout {
        background: #ef4444;
        color: #fff;
        border: none;
        padding: 6px 14px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 13px;
    }

    .admin-nav__logout:hover {
        background: #dc2626;
    }

    .admin-wrapper {
        max-width: 1100px;
        margin: 0 auto;
        padding: 40px 24px;
    }

    .admin-desc {
        color: #6b7280;
        margin-bottom: 32px;
    }

    .admin-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
    }

    .admin-menu-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 16px rgba(10, 61, 48, 0.08);
        padding: 24px;
        text-align: center;
        text-decoration: none;
        color: inherit;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .admin-menu-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 24px rgba(10, 61, 48, 0.14);
    }

    .admin-menu-card__icon {
        font-size: 32px;
        display: block;
        margin-bottom: 12px;
    }

    .admin-menu-card h3 {
        margin: 0 0 6px;
        font-size: 16px;
    }

    .admin-menu-card p {
        margin: 0;
        font-size: 13px;
        color: #6b7280;
    }
</style>

</body>
</html>