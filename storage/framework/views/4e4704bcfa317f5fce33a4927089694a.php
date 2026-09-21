

<?php $__env->startSection('title', 'Profil & Jurusan'); ?>

<?php $__env->startSection('content'); ?>


<div class="hero-full-wrap container">
    <section class="hero-full" id="about-hero" data-bg="<?php echo e(asset('img/hero/hero-1.jpeg')); ?>">
        <div class="hero-full__overlay">
            <div class="container">
                <div class="hero-full__inner">
                    <span class="eyebrow">Profil Sekolah</span>
                    <h1>SMK Negeri 1 <span class="ap-accent">Cijati</span></h1>
                    <p class="hero__desc">Kompeten, Kreatif, Berkarya — mengenal lebih dekat sejarah, visi misi, dan struktur organisasi sekolah kami.</p>
                </div>
            </div>
        </div>
    </section>

    
    <nav class="ap-tabs">
        <div class="ap-tabs__inner">
            <a href="#profil-sekolah" class="ap-tabs__link">Profil Sekolah</a>
            <a href="#prakata" class="ap-tabs__link">Sambutan Kepsek</a>
            <a href="#sejarah" class="ap-tabs__link">Sejarah Singkat</a>
            <a href="#visi-misi" class="ap-tabs__link">Visi &amp; Misi</a>
            <a href="#struktur-organisasi" class="ap-tabs__link">Struktur Organisasi</a>
        </div>
    </nav>
</div>


<section class="container ap-section" id="prakata">
    <div class="ap-sambutan">
        <div class="ap-sambutan__foto-wrap">
            <div class="ap-sambutan__ring">
                <img src="<?php echo e(asset('img/' . $sambutan['foto'])); ?>" alt="<?php echo e($sambutan['nama']); ?>" class="ap-sambutan__foto">
            </div>
            <h3 class="ap-sambutan__nama"><?php echo e($sambutan['nama']); ?></h3>
            <span class="ap-sambutan__jabatan"><?php echo e($sambutan['jabatan']); ?></span>
        </div>
        <div class="ap-sambutan__body">
            <span class="ap-sambutan__quote-mark">&ldquo;</span>
            <span class="eyebrow ap-eyebrow--teal">Kata Sambutan</span>
            <h2 class="ap-sambutan__judul">Sambutan Kepala Sekolah</h2>
            <p>Assalamu'alaikum Warahmatullahi Wabarakatuh,</p>
            <p>Puji syukur kita panjatkan ke hadirat Allah SWT atas limpahan rahmat dan karunia-Nya, sehingga SMK Negeri 1 Cijati terus berkembang sebagai lembaga pendidikan vokasi yang unggul, berdaya saing, dan berorientasi pada kemajuan teknologi serta kebutuhan dunia kerja.</p>
            <p>Website ini kami hadirkan sebagai sarana informasi dan komunikasi bagi seluruh warga sekolah, orang tua, dunia usaha/industri, serta masyarakat luas, guna memberikan akses yang lebih mudah terhadap informasi akademik, kegiatan sekolah, prestasi siswa, serta program unggulan yang kami jalankan.</p>
            <p>SMK Negeri 1 Cijati bertekad mencetak lulusan yang tidak hanya kompeten, tetapi juga berkarakter, kreatif, dan berdaya saing global, dengan dukungan seluruh tenaga pendidik, peserta didik, orang tua, dan mitra industri.</p>
            <p>Semoga website ini dapat memberikan manfaat bagi kita semua.</p>
            <p>Wassalamu'alaikum Warahmatullahi Wabarakatuh.</p>
        </div>
    </div>
</section>


<section class="ap-section ap-section--tint" id="profil-sekolah">
    <div class="container">
        <div class="ap-section__head">
            <span class="eyebrow ap-eyebrow--teal">Keunggulan Kami</span>
            <h2 class="ap-heading">Kenapa Memilih Kami?</h2>
            <span class="ap-heading__underline"></span>
        </div>
        <div class="ap-keunggulan-grid">
            <?php $paletteIcon = ['coral','teal','navy']; ?>
            <?php $__currentLoopData = $keunggulan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $warna = $paletteIcon[$i % count($paletteIcon)]; ?>
                <div class="ap-keunggulan-card">
                    <span class="ap-keunggulan-card__num">0<?php echo e($i + 1); ?></span>
                    <span class="ap-keunggulan-card__icon ap-keunggulan-card__icon--<?php echo e($warna); ?>"><?php echo $k['icon']; ?></span>
                    <h3><?php echo e($k['judul']); ?></h3>
                    <p><?php echo e($k['teks']); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<section class="container ap-section" id="sejarah">
    <div class="ap-sejarah">
        <span class="ap-sejarah__quote-mark">&ldquo;</span>
        <span class="eyebrow ap-eyebrow--amber">Perjalanan Kami</span>
        <h2 class="ap-heading">Sejarah Singkat</h2>
        <span class="ap-heading__underline ap-heading__underline--amber"></span>
        <p class="ap-sejarah__text"><?php echo e($sejarah); ?></p>
    </div>
</section>


<section class="ap-section ap-section--tint" id="visi-misi">
    <div class="container">
        <div class="ap-section__head">
            <span class="eyebrow ap-eyebrow--teal">Arah Kami</span>
            <h2 class="ap-heading">Visi &amp; Misi</h2>
            <span class="ap-heading__underline"></span>
        </div>
        <div class="ap-vismis">
            <div class="ap-vismis__col ap-vismis__col--light">
                <span class="ap-vismis__icon">🎯</span>
                <h3>Visi</h3>
                <p>
                    Menjadi sekolah menengah kejuruan unggul yang menghasilkan lulusan
                    kompeten, berkarakter, dan berdaya saing di dunia kerja maupun
                    dunia usaha dan industri.
                </p>
                <hr class="ap-vismis__divider">
                <h3>Moto</h3>
                <p class="ap-vismis__moto"><?php echo e($moto); ?></p>
            </div>
            <div class="ap-vismis__col ap-vismis__col--dark">
                <span class="ap-vismis__icon">🚀</span>
                <h3>Misi</h3>
                <ol class="ap-vismis__list">
                    <?php $__currentLoopData = $misi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($item); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
            </div>
        </div>
    </div>
</section>


<section class="container ap-section" id="struktur-organisasi">
    <div class="ap-section__head">
        <span class="eyebrow ap-eyebrow--amber">Susunan Pengelola</span>
        <h2 class="ap-heading">Struktur Organisasi</h2>
        <span class="ap-heading__underline ap-heading__underline--amber"></span>
    </div>
    <div class="ap-struktur-grid">
        <?php $__currentLoopData = $strukturOrganisasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="ap-struktur-item">
                <?php if(!empty($s['foto'])): ?>
                    <img src="<?php echo e(asset('storage/' . $s['foto'])); ?>" alt="<?php echo e($s['nama']); ?>" class="ap-struktur-item__foto">
                <?php else: ?>
                    <span class="ap-struktur-item__avatar"><?php echo e(mb_substr($s['nama'], 0, 1)); ?></span>
                <?php endif; ?>
                <span class="ap-struktur-item__jabatan"><?php echo e($s['jabatan']); ?></span>
                <span class="ap-struktur-item__nama"><?php echo e($s['nama']); ?></span>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>

<style>
    /* -------- Aksen tambahan -------- */
    .ap-accent { color: var(--amber); }
    .eyebrow { display: inline-block; font-size: 12px; letter-spacing: .12em; text-transform: uppercase; font-weight: 800; margin-bottom: 8px; }
    .ap-eyebrow--teal { color: var(--teal); }
    .ap-eyebrow--amber { color: var(--amber); }

    .ap-heading { font-family: var(--font-display); font-size: 30px; color: var(--navy-deep); margin: 4px 0 12px; }
    .ap-heading__underline {
        display: block;
        width: 56px;
        height: 4px;
        border-radius: 999px;
        background: var(--teal);
        margin-bottom: 8px;
    }
    .ap-heading__underline--amber { background: var(--amber); }
    .ap-section { padding: 60px 24px; scroll-margin-top: 90px; }
    .ap-section--tint { background: #F3F0E6; }
    .ap-section__head { margin-bottom: 34px; }

    /* -------- Tab navigasi mengambang -------- */
    .ap-tabs {
        position: relative;
        margin-top: -34px;
        z-index: 20;
        display: flex;
        justify-content: center;
        padding: 0 12px;
    }
    .ap-tabs__inner {
        display: flex;
        gap: 4px;
        background: #fff;
        border-radius: 999px;
        box-shadow: 0 18px 36px -14px rgba(10,61,48,0.35);
        padding: 8px;
        overflow-x: auto;
        max-width: 100%;
        scrollbar-width: none;
    }
    .ap-tabs__inner::-webkit-scrollbar { display: none; }
    .ap-tabs__link {
        flex: 0 0 auto;
        padding: 10px 20px;
        border-radius: 999px;
        font-size: 13.5px;
        font-weight: 700;
        color: var(--ink-soft);
        white-space: nowrap;
        transition: background .2s, color .2s;
    }
    .ap-tabs__link:hover { background: var(--cream); color: var(--navy-deep); }
    .ap-tabs__link.is-active { background: var(--navy); color: #fff; }

    /* -------- Sambutan Kepala Sekolah -------- */
    .ap-sambutan {
        position: relative;
        display: grid;
        grid-template-columns: 260px 1fr;
        gap: 0;
        margin-top: 34px;
    }
    .ap-sambutan__foto-wrap {
        background: #fff;
        border-radius: var(--radius) 0 0 var(--radius);
        box-shadow: var(--shadow);
        padding: 26px 20px;
        text-align: center;
        z-index: 2;
    }
    .ap-sambutan__ring {
        padding: 6px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--amber), var(--coral));
        width: 160px; height: 160px;
        margin: 0 auto 16px;
    }
    .ap-sambutan__foto {
        width: 100%; height: 100%;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid #fff;
    }
    .ap-sambutan__nama { font-family: var(--font-display); font-size: 16px; color: var(--navy-deep); margin: 0 0 4px; }
    .ap-sambutan__jabatan { font-size: 13px; color: var(--ink-soft); }

    .ap-sambutan__body {
        position: relative;
        background: var(--navy);
        background-image: radial-gradient(circle at 100% 0%, rgba(255,255,255,.06), transparent 55%);
        color: #fff;
        border-radius: 0 var(--radius) var(--radius) 0;
        box-shadow: var(--shadow);
        padding: 40px 44px 40px 52px;
        margin-left: -18px;
        overflow: hidden;
    }
    .ap-sambutan__quote-mark {
        position: absolute;
        top: -18px; right: 24px;
        font-family: Georgia, serif;
        font-size: 130px;
        line-height: 1;
        color: rgba(255,255,255,.06);
        pointer-events: none;
    }
    .ap-sambutan__judul { font-family: var(--font-display); font-size: 24px; margin: 0 0 18px; }
    .ap-sambutan__body p { color: #E5EAEC; line-height: 1.8; font-size: 15px; margin-bottom: 14px; position: relative; }
    .ap-sambutan__body p:last-child { margin-bottom: 0; }

    /* -------- Kenapa Memilih Kami -------- */
    .ap-keunggulan-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 26px;
    }
    .ap-keunggulan-card {
        position: relative;
        background: #fff;
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        padding: 34px 26px 28px;
        text-align: center;
        transition: transform .25s ease, box-shadow .25s ease;
        overflow: hidden;
    }
    .ap-keunggulan-card:hover { transform: translateY(-8px); box-shadow: 0 20px 40px -16px rgba(10,61,48,0.4); }
    .ap-keunggulan-card__num {
        position: absolute;
        top: 12px; right: 18px;
        font-family: var(--font-display);
        font-size: 34px;
        font-weight: 800;
        color: var(--line);
    }
    .ap-keunggulan-card__icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 60px; height: 60px;
        margin: 0 auto 18px;
        border-radius: 18px;
        font-size: 26px;
        color: #fff;
    }
    .ap-keunggulan-card__icon--coral { background: linear-gradient(135deg, var(--amber), var(--coral)); }
    .ap-keunggulan-card__icon--teal { background: linear-gradient(135deg, var(--teal), #4C9C86); }
    .ap-keunggulan-card__icon--navy { background: linear-gradient(135deg, var(--navy), var(--navy-deep)); }
    .ap-keunggulan-card h3 { font-family: var(--font-display); font-size: 17px; color: var(--navy-deep); margin: 0 0 10px; }
    .ap-keunggulan-card p { font-size: 13.5px; color: var(--ink-soft); line-height: 1.6; margin: 0; }

    /* -------- Sejarah Singkat -------- */
    .ap-sejarah {
        position: relative;
        background: #fff;
        border-left: 5px solid var(--amber);
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        padding: 40px 46px;
        overflow: hidden;
    }
    .ap-sejarah__quote-mark {
        position: absolute;
        top: -20px; right: 30px;
        font-family: Georgia, serif;
        font-size: 130px;
        color: var(--cream);
        z-index: 0;
    }
    .ap-sejarah__text { position: relative; z-index: 1; font-size: 15.5px; color: var(--ink-soft); line-height: 1.85; margin: 0; }

    /* -------- Visi & Misi -------- */
    .ap-vismis { display: grid; grid-template-columns: 1fr 1.5fr; gap: 24px; }
    .ap-vismis__col { border-radius: var(--radius); padding: 34px 32px; box-shadow: var(--shadow); }
    .ap-vismis__col--light { background: #fff; text-align: center; }
    .ap-vismis__col--dark { background: var(--navy-deep); color: #fff; }
    .ap-vismis__icon { font-size: 30px; display: block; margin-bottom: 10px; }
    .ap-vismis__col h3 { font-family: var(--font-display); font-size: 19px; margin: 0 0 10px; }
    .ap-vismis__col--light h3 { color: var(--navy-deep); }
    .ap-vismis__col--light p { color: var(--ink-soft); font-size: 14.5px; line-height: 1.7; }
    .ap-vismis__moto { font-weight: 700; color: var(--teal) !important; }
    .ap-vismis__divider { border: none; border-top: 1px solid var(--line); margin: 22px 0; }

    .ap-vismis__list { margin: 0; padding-left: 0; list-style: none; display: flex; flex-direction: column; gap: 14px; }
    .ap-vismis__list li {
        position: relative;
        padding-left: 38px;
        font-size: 14.5px;
        color: #D7E0E5;
        line-height: 1.6;
    }
    .ap-vismis__list { counter-reset: misi; }
    .ap-vismis__list li { counter-increment: misi; }
    .ap-vismis__list li::before {
        content: counter(misi);
        position: absolute;
        left: 0; top: -2px;
        width: 26px; height: 26px;
        border-radius: 50%;
        background: var(--amber);
        color: var(--navy-deep);
        font-weight: 800;
        font-size: 13px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* -------- Struktur Organisasi -------- */
    .ap-struktur-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 22px;
    }
    .ap-struktur-item {
        background: #fff;
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        padding: 28px 20px;
        text-align: center;
        transition: transform .2s ease;
    }
    .ap-struktur-item:hover { transform: translateY(-6px); }
    .ap-struktur-item__avatar {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 56px; height: 56px;
        margin: 0 auto 14px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--teal), var(--navy));
        color: #fff;
        font-family: var(--font-display);
        font-size: 20px;
        font-weight: 700;
    }
    .ap-struktur-item__foto {
        display: block;
        width: 72px; height: 72px;
        margin: 0 auto 14px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid var(--cream);
        box-shadow: 0 6px 14px rgba(10,61,48,0.18);
    }
    .ap-struktur-item__jabatan {
        display: block;
        font-size: 11.5px;
        font-weight: 800;
        letter-spacing: .05em;
        text-transform: uppercase;
        color: var(--amber);
        margin-bottom: 6px;
    }
    .ap-struktur-item__nama { display: block; font-size: 15px; font-weight: 700; color: var(--navy-deep); }

    /* -------- Responsive -------- */
    @media (max-width: 900px) {
        .ap-sambutan { grid-template-columns: 1fr; }
        .ap-sambutan__foto-wrap { border-radius: var(--radius); }
        .ap-sambutan__body { margin-left: 0; margin-top: -18px; border-radius: var(--radius); padding-top: 30px; }
        .ap-vismis { grid-template-columns: 1fr; }
    }
    @media (max-width: 640px) {
        .ap-tabs { margin-top: -24px; }
        .ap-tabs__inner { border-radius: 16px; width: 100%; justify-content: flex-start; }
        .ap-sejarah { padding: 30px 26px; }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var hero = document.getElementById('about-hero');
    if (hero) {
        hero.style.backgroundImage = "url('" + hero.dataset.bg + "')";
    }

    var links = document.querySelectorAll('.ap-tabs__link');
    var sections = [];
    links.forEach(function (link) {
        var id = link.getAttribute('href').slice(1);
        var section = document.getElementById(id);
        if (section) sections.push({ link: link, section: section });
    });

    function setActive() {
        var scrollPos = window.scrollY + 140;
        var current = sections[0];
        sections.forEach(function (item) {
            if (item.section.offsetTop <= scrollPos) current = item;
        });
        links.forEach(function (link) { link.classList.remove('is-active'); });
        if (current) current.link.classList.add('is-active');
    }

    window.addEventListener('scroll', setActive);
    setActive();
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\profile-sekolah-dhani-12rpl1\resources\views/about.blade.php ENDPATH**/ ?>