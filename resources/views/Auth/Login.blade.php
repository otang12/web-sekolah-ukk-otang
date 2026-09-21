<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - SMK Negeri 1 Cijati</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Sora:ital,wght@0,600;0,700;1,500&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="login-split">

    <div class="login-split__panel">
        <div class="login-split__pattern" aria-hidden="true"></div>
        <div class="login-split__content">
            <img src="{{ asset('img/logo-sekolah.png') }}" alt="Logo SMK Negeri 1 Cijati" class="login-split__logo">
            <h1>SMK Negeri 1 Cijati</h1>
            <p>Portal administrasi internal untuk mengelola konten dan data sekolah.</p>
            <span class="login-split__motto">KEREND &mdash; Kompeten, Religius, Energik, Nasionalis, Dinamis</span>
        </div>
    </div>

    <div class="login-split__form-side">
        <div class="login-form-box">
            <span class="login-form-box__eyebrow">Panel Admin</span>
            <h2>Masuk ke Akun</h2>
            <p class="login-form-box__subtitle">Silakan masuk menggunakan akun admin Anda.</p>

            @if ($errors->any())
                <div class="login-alert">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.attempt') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-wrap">
                        <svg class="input-icon" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 6-10 7L2 6"/></svg>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus placeholder="nama@email.com">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrap">
                        <svg class="input-icon" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="10" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        <input type="password" name="password" id="password" required placeholder="••••••••">
                    </div>
                </div>

                <div class="form-group form-group--checkbox">
                    <label>
                        <input type="checkbox" name="remember"> Ingat saya
                    </label>
                </div>

                <button type="submit" class="login-btn">
                    Masuk
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                </button>
            </form>

            <a href="{{ route('home') }}" class="login-back">&larr; Kembali ke Beranda</a>
        </div>
    </div>

</div>

<style>
    :root {
        --navy: #0F5C46;
        --navy-deep: #0A3D30;
        --teal: #6D28D9;
        --amber: #FF6B4A;
        --coral: #FFB020;
        --cream: #FAF7F1;
        --font-display: "Sora", Georgia, serif;
        --font-body: "Plus Jakarta Sans", system-ui, -apple-system, sans-serif;
    }

    * {
        box-sizing: border-box;
    }

    html, body {
        margin: 0;
        height: 100%;
        font-family: var(--font-body);
    }

    .login-split {
        min-height: 100vh;
        display: grid;
        grid-template-columns: 1.05fr 1fr;
    }

    /* ===================== LEFT PANEL ===================== */
    .login-split__panel {
        position: relative;
        background: linear-gradient(160deg, var(--navy-deep) 0%, var(--navy) 70%);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 60px 56px;
        overflow: hidden;
    }

    .login-split__pattern {
        position: absolute;
        inset: 0;
        background-image:
            radial-gradient(circle at 15% 20%, rgba(255, 107, 74, 0.18) 0%, transparent 45%),
            radial-gradient(circle at 85% 80%, rgba(109, 40, 217, 0.22) 0%, transparent 45%),
            radial-gradient(circle at 80% 15%, rgba(255, 176, 32, 0.14) 0%, transparent 40%);
    }

    .login-split__content {
        position: relative;
        z-index: 1;
        max-width: 380px;
        text-align: left;
    }

    .login-split__logo {
        width: 72px;
        height: 72px;
        object-fit: cover;
        border-radius: 50%;
        background: #fff;
        padding: 6px;
        margin-bottom: 28px;
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
    }

    .login-split__content h1 {
        font-family: var(--font-display);
        font-size: 28px;
        font-weight: 700;
        color: #fff;
        margin: 0 0 14px;
        line-height: 1.25;
    }

    .login-split__content p {
        font-size: 14.5px;
        line-height: 1.7;
        color: rgba(255, 255, 255, 0.72);
        margin: 0 0 30px;
    }

    .login-split__motto {
        display: inline-block;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.04em;
        color: var(--coral);
        border-top: 1px solid rgba(255, 255, 255, 0.2);
        padding-top: 18px;
    }

    /* ===================== RIGHT SIDE (FORM) ===================== */
    .login-split__form-side {
        background: var(--cream);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 32px;
    }

    .login-form-box {
        width: 100%;
        max-width: 360px;
    }

    .login-form-box__eyebrow {
        display: block;
        font-size: 11px;
        letter-spacing: .14em;
        text-transform: uppercase;
        color: var(--amber);
        font-weight: 700;
        margin-bottom: 8px;
    }

    .login-form-box h2 {
        font-family: var(--font-display);
        font-size: 26px;
        font-weight: 700;
        color: var(--navy-deep);
        margin: 0 0 8px;
    }

    .login-form-box__subtitle {
        font-size: 13.5px;
        color: #6b7a72;
        margin: 0 0 28px;
    }

    .login-alert {
        background: rgba(255, 107, 74, 0.1);
        border: 1px solid rgba(255, 107, 74, 0.35);
        color: #b6412a;
        padding: 10px 14px;
        border-radius: 8px;
        font-size: 13px;
        margin-bottom: 18px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        display: block;
        font-size: 12px;
        font-weight: 700;
        color: var(--navy-deep);
        margin-bottom: 6px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .input-wrap {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-icon {
        position: absolute;
        left: 12px;
        color: #9aa8a1;
        pointer-events: none;
    }

    .form-group input[type="email"],
    .form-group input[type="password"] {
        width: 100%;
        padding: 12px 12px 12px 40px;
        background: #fff;
        border: 1.5px solid #E7E1D6;
        border-radius: 10px;
        font-size: 14px;
        font-family: var(--font-body);
        color: var(--navy-deep);
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .form-group input::placeholder {
        color: #b3bdb7;
    }

    .form-group input:focus {
        outline: none;
        border-color: var(--amber);
        box-shadow: 0 0 0 3px rgba(255, 107, 74, 0.15);
    }

    .form-group--checkbox label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 400;
        font-size: 13px;
        color: #6b7a72;
        text-transform: none;
        letter-spacing: normal;
    }

    .login-btn {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: var(--amber);
        color: #fff;
        border: none;
        padding: 13px;
        border-radius: 999px;
        font-size: 15px;
        font-weight: 700;
        font-family: var(--font-body);
        cursor: pointer;
        transition: transform 0.15s ease, box-shadow 0.2s ease, background 0.2s ease;
        box-shadow: 0 10px 22px rgba(255, 107, 74, 0.3);
    }

    .login-btn:hover {
        transform: translateY(-2px);
        background: #FF7B5A;
        box-shadow: 0 14px 26px rgba(255, 107, 74, 0.4);
    }

    .login-btn:active {
        transform: translateY(0);
    }

    .login-btn svg {
        transition: transform 0.2s ease;
    }

    .login-btn:hover svg {
        transform: translateX(3px);
    }

    .login-back {
        display: block;
        text-align: center;
        margin-top: 22px;
        color: #6b7a72;
        font-size: 13px;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .login-back:hover {
        color: var(--amber);
    }

    /* ===================== RESPONSIVE ===================== */
    @media (max-width: 860px) {
        .login-split {
            grid-template-columns: 1fr;
        }
        .login-split__panel {
            padding: 40px 28px;
        }
        .login-split__content {
            max-width: 100%;
            text-align: center;
        }
        .login-split__logo {
            margin: 0 auto 20px;
        }
        .login-split__motto {
            display: none;
        }
        .login-split__form-side {
            padding: 36px 24px 48px;
        }
    }
</style>

</body>
</html>