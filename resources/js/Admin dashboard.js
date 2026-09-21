
document.addEventListener('DOMContentLoaded', function () {
 
    /* -------- Sidebar mobile toggle -------- */
    var sidebar = document.getElementById('sidebar');
    var overlay = document.getElementById('sidebar-overlay');
    var openBtn = document.getElementById('sidebar-open');
    var closeBtn = document.getElementById('sidebar-close');
 
    function openSidebar() {
        sidebar.classList.add('is-open');
        overlay.classList.add('is-open');
    }
    function closeSidebar() {
        sidebar.classList.remove('is-open');
        overlay.classList.remove('is-open');
    }
 
    if (openBtn) openBtn.addEventListener('click', openSidebar);
    if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
    if (overlay) overlay.addEventListener('click', closeSidebar);
 
    /* -------- Menu active state -------- */
    var menuItems = document.querySelectorAll('.menu-item');
    menuItems.forEach(function (item) {
        item.addEventListener('click', function () {
            menuItems.forEach(function (i) { i.classList.remove('is-active'); });
            item.classList.add('is-active');
            closeSidebar();
        });
    });
 
    /* -------- Weather / clock in sidebar footer -------- */
    var dayTimeEl = document.getElementById('weather-day-time');
    var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtu'];
 
    function updateClock() {
        if (!dayTimeEl) return;
        var now = new Date();
        var hh = String(now.getHours()).padStart(2, '0');
        var mm = String(now.getMinutes()).padStart(2, '0');
        dayTimeEl.textContent = days[now.getDay()] + ', ' + hh + ':' + mm + ' WIB';
    }
    updateClock();
    setInterval(updateClock, 30000);
 
    /* -------- Count-up numbers + progress bar fill on load -------- */
    var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var cards = document.querySelectorAll('.stat-card');
 
    cards.forEach(function (card) {
        var delay = parseInt(card.getAttribute('data-delay'), 10) || 0;
 
        setTimeout(function () {
            card.classList.add('is-mounted');
 
            var valueEl = card.querySelector('.stat-card__value');
            var target = parseInt(valueEl.getAttribute('data-target'), 10) || 0;
 
            var fillEl = card.querySelector('.stat-card__progress-fill');
            var progress = fillEl ? parseInt(fillEl.getAttribute('data-progress'), 10) || 0 : 0;
 
            if (prefersReduced) {
                valueEl.textContent = target;
                if (fillEl) {
                    fillEl.style.setProperty('--fill-width', progress + '%');
                    fillEl.classList.add('is-filled');
                }
                return;
            }
 
            var duration = 900;
            var start = null;
 
            function step(ts) {
                if (start === null) start = ts;
                var elapsed = ts - start;
                var t = Math.min(elapsed / duration, 1);
                var eased = 1 - Math.pow(1 - t, 3);
                valueEl.textContent = Math.round(eased * target);
                if (t < 1) {
                    requestAnimationFrame(step);
                } else {
                    valueEl.textContent = target;
                }
            }
            requestAnimationFrame(step);
 
            if (fillEl) {
                fillEl.style.setProperty('--fill-width', progress + '%');
                requestAnimationFrame(function () {
                    fillEl.classList.add('is-filled');
                });
            }
        }, delay);
    });
 
});
 
