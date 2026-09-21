document.addEventListener('DOMContentLoaded', function () {
    /* Toggle menu mobile */
    var toggle = document.getElementById('nav-toggle');
    var menu = document.getElementById('nav-menu');

    if (toggle && menu) {
        toggle.addEventListener('click', function () {
            var isOpen = menu.classList.toggle('is-open');
            toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });
    }

    /* Jam realtime di topbar, mengikuti waktu perangkat pengguna */
    var clockEl = document.getElementById('live-clock');
    if (clockEl) {
        var updateClock = function () {
            var now = new Date();
            var hh = String(now.getHours()).padStart(2, '0');
            var mm = String(now.getMinutes()).padStart(2, '0');
            var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtu'];
            clockEl.textContent = days[now.getDay()] + ', ' + hh + ':' + mm + ' WIB';
        };
        updateClock();
        setInterval(updateClock, 1000 * 30);
    }

    /* Tutup menu mobile saat memilih salah satu tautan */
    document.querySelectorAll('.navbar__menu a').forEach(function (link) {
        link.addEventListener('click', function () {
            if (menu.classList.contains('is-open')) {
                menu.classList.remove('is-open');
                toggle.setAttribute('aria-expanded', 'false');
            }
        });
    });

    /* Hero slider (panah kiri-kanan) */
    var slider = document.getElementById('hero-slider');
    var prevBtn = document.getElementById('hero-prev');
    var nextBtn = document.getElementById('hero-next');
    var dataEl = document.getElementById('hero-images-data');

    if (slider && dataEl) {
        var firstSrc = slider.getAttribute('data-hero-src');
        if (firstSrc) {
            slider.style.backgroundImage = "url('" + firstSrc + "')";
        }

        var images = JSON.parse(dataEl.textContent);

        if (prevBtn && nextBtn && images.length > 1) {
            var current = 0;

            function showImage(index) {
                current = (index + images.length) % images.length;
                slider.style.backgroundImage = "url('" + images[current] + "')";
            }

            prevBtn.addEventListener('click', function () { showImage(current - 1); });
            nextBtn.addEventListener('click', function () { showImage(current + 1); });
        }
    }
});
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('[data-hero-bg]').forEach(function (el) {
         el.style.backgroundImage = "url('" + el.getAttribute('data-hero-bg') + "')";
    });
});