<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMK Negeri 1 Cijati') | KEREND, Kompeten, Religius, Energik, Nasionalis, Dinamis</title>
    <meta name="description" content="Website resmi SMK Negeri 1 Cijati - KEREND, Kompeten, Religius, Energik, Nasionalis, Dinamis">
    <link rel="icon" type="image/jpeg" href="{{ asset('img/logo-sekolah.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles')
</head>
<body class="@yield('body-class')">

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="{{ asset('js/script.js') }}" defer></script>
    @stack('scripts')
</body>
</html>