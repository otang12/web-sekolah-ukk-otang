<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - SMK Negeri 1 Cijati</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<div class="login-wrapper">
    <div class="login-glow login-glow--1"></div>
    <div class="login-glow login-glow--2"></div>

    <div class="login-card">
        <div class="login-card__brand">
            <div class="login-card__logo">🏫</div>
            <span class="login-card__school">SMK Negeri 1 Cijati</span>
        </div>

        <h1 class="login-card__title">Selamat Datang Kembali</h1>
        <p class="login-card__subtitle">Masuk untuk mengelola konten website sekolah</p>

        @if ($errors->any())
            <div class="login-alert">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.attempt') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="admin@sekolah.sch.id" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" required>
            </div>

            <div class="form-group form-group--checkbox">
                <label>
                    <input type="checkbox" name="remember"> Ingat saya
                </label>
            </div>

            <button type="submit" class="login-btn">
                Masuk <span class="login-btn__arrow">&rarr;</span>
            </button>
        </form>
    </div>
</div>

<style>
    * { box-sizing: border-box; }

    body {
        margin: 0;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background: #f4f5fb;
    }

    .login-wrapper {
        position: relative;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        overflow: hidden;
        background: radial-gradient(ellipse at top, #eef2ff 0%, #f4f5fb 55%, #f4f5fb 100%);
    }

    .login-glow {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        pointer-events: none;
    }
    .login-glow--1 {
        width: 380px; height: 380px;
        background: #818cf8;
        opacity: 0.35;
        top: -100px; left: -80px;
    }
    .login-glow--2 {
        width: 340px; height: 340px;
        background: #fb923c;
        opacity: 0.22;
        bottom: -90px; right: -60px;
    }

    .login-card {
        position: relative;
        z-index: 1;
        background: #fff;
        width: 100%;
        max-width: 400px;
        border-radius: 20px;
        box-shadow: 0 24px 60px rgba(30, 41, 59, 0.14), 0 0 0 1px rgba(255,255,255,0.6);
        padding: 40px 36px;
    }

    .login-card__brand {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 26px;
    }

    .login-card__logo {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        background: linear-gradient(135deg, #4f46e5, #6366f1);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        box-shadow: 0 8px 18px rgba(79, 70, 229, 0.35);
    }

    .login-card__school {
        font-size: 13.5px;
        font-weight: 700;
        color: #4338ca;
        letter-spacing: 0.2px;
    }

    .login-card__title {
        font-size: 24px;
        font-weight: 800;
        color: #111827;
        margin: 0 0 6px;
    }

    .login-card__subtitle {
        color: #6b7280;
        font-size: 13.5px;
        margin: 0 0 26px;
        line-height: 1.5;
    }

    .login-alert {
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #b91c1c;
        padding: 11px 14px;
        border-radius: 10px;
        font-size: 13px;
        margin-bottom: 18px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        display: block;
        font-size: 13px;
        font-weight: 700;
        color: #374151;
        margin-bottom: 7px;
    }

    .form-group input[type="email"],
    .form-group input[type="password"] {
        width: 100%;
        padding: 12px 14px;
        border: 1.5px solid #e5e7eb;
        border-radius: 10px;
        font-size: 14px;
        background: #f9fafb;
        transition: border-color 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
    }

    .form-group input[type="email"]:focus,
    .form-group input[type="password"]:focus {
        outline: none;
        border-color: #6366f1;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.12);
    }

    .form-group--checkbox {
        margin-bottom: 24px;
    }

    .form-group--checkbox label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 400;
        font-size: 13px;
        color: #6b7280;
        cursor: pointer;
    }

    .login-btn {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: linear-gradient(135deg, #4f46e5, #6366f1);
        color: #fff;
        border: none;
        padding: 13px;
        border-radius: 10px;
        font-size: 15px;
        font-weight: 700;
        cursor: pointer;
        box-shadow: 0 12px 24px rgba(79, 70, 229, 0.32);
        transition: transform 0.15s ease, box-shadow 0.15s ease;
    }

    .login-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 16px 30px rgba(79, 70, 229, 0.4);
    }

    .login-btn__arrow {
        transition: transform 0.2s ease;
    }
    .login-btn:hover .login-btn__arrow {
        transform: translateX(3px);
    }
</style>

</body>
</html>