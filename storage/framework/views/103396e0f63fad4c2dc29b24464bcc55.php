

<?php $__env->startSection('title', 'Beranda'); ?>
<?php $__env->startSection('body-class', 'page-home page-home--playful'); ?>

<?php $__env->startSection('content'); ?>


<section class="rhero" id="hero-slider"
    data-bg="<?php echo e(asset('img/hero/' . $heroImages[0])); ?>"
    data-images='<?php echo e(json_encode(array_map(function ($img) { return asset('img/hero/' . $img); }, $heroImages))); ?>'>

    <div class="rhero__overlay">
        <div class="container">
            <span class="rhero__badge">👋 Selamat Datang di</span>
            <h1>SMK Negeri 1 <span class="rhero__accent">Cijati</span></h1>
            <p class="rhero__desc">Kompeten, Kreatif, Berkarya — sekolah kejuruan yang siap mengantar kamu jadi lulusan yang percaya diri &amp; siap kerja.</p>
            <div class="rhero__actions">
                <a href="<?php echo e(route('news.index')); ?>" class="pbtn pbtn--sunny">Lihat Berita &amp; Kegiatan &rarr;</a>
                <a href="<?php echo e(route('about')); ?>" class="pbtn pbtn--ghost">Kenali Sekolah Kami</a>
            </div>
        </div>
    </div>
</section>


<section class="container pquick">
    <div class="pquick__grid">
        <a href="<?php echo e(route('about')); ?>" class="pquick-card pquick-card--purple">
            <span class="pquick-card__icon">🏫</span>
            <h3>Profil &amp; Jurusan</h3>
            <p>Kenali profil sekolah dan program keahlian yang tersedia.</p>
            <span class="pquick-card__arrow">&rarr;</span>
        </a>
        <a href="<?php echo e(route('guru')); ?>" class="pquick-card pquick-card--coral">
            <span class="pquick-card__icon">🧑‍🎓</span>
            <h3>Guru &amp; Staf</h3>
            <p>Tenaga pengajar kompeten di bidangnya masing-masing.</p>
            <span class="pquick-card__arrow">&rarr;</span>
        </a>
        <a href="<?php echo e(route('ekstrakurikuler')); ?>" class="pquick-card pquick-card--teal">
            <span class="pquick-card__icon">🎉</span>
            <h3>Ekstrakurikuler</h3>
            <p>Beragam kegiatan untuk mengembangkan minat dan bakat siswa.</p>
            <span class="pquick-card__arrow">&rarr;</span>
        </a>
    </div>
</section>


<section class="container ptags">
    <span class="ptags__label"># Top Tags</span>
    <div class="ptags__list">
        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $colors = ['coral','sky','sunny','mint','purple','teal']; $c = $colors[$i % count($colors)]; ?>
            <span class="ptag-pill ptag-pill--<?php echo e($c); ?>"><?php echo e($tag); ?></span>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>


<section class="container psection">
    <div class="psection__head">
        <span class="psection__eyebrow">🎯 Program Keahlian</span>
        <h2>Pilih Jurusan Impianmu</h2>
    </div>

    <div class="pjurusan-grid">
        <?php
            $warnaJurusanHome = [
                'RPL'  => 'coral',
                'BDP'  => 'sky',
                'TKR'  => 'sunny',
                'APHP' => 'mint',
            ];

            $kartuHome = [
                ['singkatan' => 'RPL',  'judul' => 'Rekayasa Perangkat Lunak', 'teks' => 'Merancang & membangun aplikasi web, desktop, dan mobile.'],
                ['singkatan' => 'BDP',  'judul' => 'Bisnis Daring dan Pemasaran', 'teks' => 'Menguasai pemasaran digital dan bisnis online.'],
                ['singkatan' => 'TKR',  'judul' => 'Teknik Kendaraan Ringan', 'teks' => 'Perawatan dan perbaikan kendaraan bermotor roda empat.'],
                ['singkatan' => 'APHP', 'judul' => 'Agribisnis Pengolahan Hasil Pertanian', 'teks' => 'Mengolah hasil pertanian jadi produk bernilai jual.'],
            ];
        ?>

        <?php $__currentLoopData = $kartuHome; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $j = $jurusanList->firstWhere('singkatan', $k['singkatan']);
                $warna = $warnaJurusanHome[$k['singkatan']];
                $tujuan = $j ? route('jurusan.show', $j->slug) : route('jurusan.index');
            ?>

            <a href="<?php echo e($tujuan); ?>" class="pjurusan-card pjurusan-card--<?php echo e($warna); ?>">
                <span class="pjurusan-card__badge">
                    <?php if($j && $j->logo): ?>
                        <img src="<?php echo e(asset('storage/' . $j->logo)); ?>" alt="<?php echo e($k['judul']); ?>">
                    <?php else: ?>
                        <span><?php echo e($k['singkatan']); ?></span>
                    <?php endif; ?>
                </span>
                <h3><?php echo e($j->nama ?? $k['judul']); ?></h3>
                <p><?php echo e($j->deskripsi ?? $k['teks']); ?></p>
                <span class="pjurusan-card__link">Lihat Detail &rarr;</span>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="psection__more">
        <a href="<?php echo e(route('jurusan.index')); ?>" class="pbtn pbtn--outline-purple">Lihat Semua Program Keahlian</a>
    </div>
</section>


<section class="container psection psection--tint">
    <div class="psection__head">
        <span class="psection__eyebrow">🎈 Kegiatan Siswa</span>
        <h2>Ekstrakurikuler Seru</h2>
    </div>

    <div class="pekskul-scroll" id="ekskulScroll">
        <?php $colors = ['coral','sky','sunny','mint','purple','teal']; ?>
        <?php $__empty_1 = true; $__currentLoopData = $ekstrakurikulerList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php $c = $colors[$i % count($colors)]; ?>
            <a href="<?php echo e(route('ekstrakurikuler.show', $e->slug)); ?>" class="pekskul-card pekskul-card--<?php echo e($c); ?>">
                <span class="pekskul-card__icon">
                    <?php if($e->logo): ?>
                        <img src="<?php echo e(asset('storage/' . $e->logo)); ?>" alt="<?php echo e($e->nama); ?>">
                    <?php else: ?>
                        <span><?php echo e(substr($e->nama, 0, 1)); ?></span>
                    <?php endif; ?>
                </span>
                <h4><?php echo e($e->nama); ?></h4>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>Belum ada data ekstrakurikuler.</p>
        <?php endif; ?>
    </div>

    <div class="psection__more">
        <a href="<?php echo e(route('ekstrakurikuler')); ?>" class="pbtn pbtn--outline-teal">Lihat Semua Ekstrakurikuler</a>
    </div>
</section>


<section class="container pabout">
    <div class="pabout__grid">
        <div class="pabout__photo">
            <img src="<?php echo e(asset('img/hero/' . $heroImages[0])); ?>" alt="Gerbang SMK Negeri 1 Cijati">
            <span class="pabout__sticker">🏫 Gerbang Sekolah</span>
        </div>
        <div class="pabout__text">
            <span class="psection__eyebrow">💬 Tentang Kami</span>
            <h2>SMK Negeri 1 Cijati</h2>
            <p>
                Sekolah menengah kejuruan yang berkomitmen menyediakan pendidikan berkualitas
                tinggi di bidang teknik dan kejuruan. Dengan fasilitas modern dan tenaga pengajar
                berpengalaman, kami siapkan kamu jadi profesional yang percaya diri menghadapi
                dunia kerja.
            </p>
            <a href="<?php echo e(route('about')); ?>" class="pbtn pbtn--sunny">Selengkapnya &rarr;</a>
        </div>
    </div>
</section>


<section class="container psection">
    <div class="psection__head psection__head--split">
        <div>
            <span class="psection__eyebrow">📰 Info Terbaru</span>
            <h2>Berita &amp; Kegiatan</h2>
        </div>
        <a href="<?php echo e(route('news.index')); ?>" class="pbtn pbtn--outline-coral">Lihat Semua &rarr;</a>
    </div>

    <div class="pnews-grid">
        <?php
            $categoryLabels = [
                'prestasi' => 'Prestasi',
                'ekstrakurikuler' => 'Ekstrakurikuler',
                'info-pendidikan' => 'Info Pendidikan',
            ];
            $colors = ['coral','sky','sunny','mint','purple','teal'];
        ?>

        <?php $__empty_1 = true; $__currentLoopData = $latestNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
                $label = $categoryLabels[$item->category] ?? 'Info Pendidikan';
                $c = $colors[$i % count($colors)];
            ?>

            <article class="pnews-card pnews-card--<?php echo e($c); ?>">
                <a href="<?php echo e(route('news.show', $item->slug)); ?>" class="pnews-card__thumb">
                    <?php if($item->image): ?>
                        <img src="<?php echo e(asset('storage/' . $item->image)); ?>" alt="<?php echo e($item->title); ?>" loading="lazy">
                    <?php else: ?>
                        <img src="<?php echo e(asset('img/placeholder.jpg')); ?>" alt="<?php echo e($item->title); ?>" loading="lazy">
                    <?php endif; ?>
                    <span class="pnews-card__badge"><?php echo e($label); ?></span>
                </a>

                <div class="pnews-card__body">
                    <h3><a href="<?php echo e(route('news.show', $item->slug)); ?>"><?php echo e($item->title); ?></a></h3>
                    <p><?php echo e($item->excerpt); ?></p>
                    <div class="pnews-card__meta">
                        <span>🗓️ <?php echo e(optional($item->published_at)->translatedFormat('d F Y')); ?></span>
                        <span>✍️ <?php echo e($item->author); ?></span>
                    </div>
                </div>
            </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>Belum ada berita.</p>
        <?php endif; ?>
    </div>
</section>

<style>
    :root {
        --p-coral: #3B5B7A;
        --p-sky: #64748B;
        --p-sunny: #B9691E;
        --p-mint: #2F6F6B;
        --p-purple: #4B5563;
        --p-teal: #3B7A94;
        --p-ink: #1F2937;
        --p-ink-soft: #6B7280;
        --p-radius: 22px;
    }

    /* -------- Hero (foto full-width, gaya referensi) -------- */
    .rhero {
        position: relative;
        min-height: 560px;
        border-radius: 28px;
        overflow: hidden;
        margin: 24px auto 0;
        max-width: 1600px;
        background-size: cover;
        background-position: center;
        box-shadow: 0 24px 50px rgba(0,0,0,0.18);
    }
    .rhero__overlay {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: flex-end;
        padding: 40px 0 56px;
        background: linear-gradient(180deg, rgba(15,23,32,.05) 0%, rgba(15,23,32,.25) 45%, rgba(15,23,32,.8) 100%);
        color: #fff;
    }
    .rhero__badge {
        display: inline-block;
        background: rgba(255,255,255,.12);
        border: 1px solid rgba(255,255,255,.3);
        border-radius: 999px;
        padding: 6px 16px;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 14px;
    }
    .rhero h1 {
        font-size: clamp(32px, 4.6vw, 50px);
        font-weight: 900;
        line-height: 1.1;
        margin: 0 0 14px;
    }
    .rhero__accent { color: var(--p-sunny, #FF6B4A); }
    .rhero__desc {
        font-size: 16px;
        color: #E5EAEC;
        max-width: 50ch;
        line-height: 1.7;
        margin-bottom: 26px;
    }
    .rhero__actions { display: flex; gap: 14px; flex-wrap: wrap; }

    @media (max-width: 980px) {
        .rhero { min-height: 480px; border-radius: 0; }
    }

    /* -------- Tombol -------- */
    .pbtn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 13px 26px;
        border-radius: 999px;
        font-weight: 700;
        font-size: 14.5px;
        text-decoration: none;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .pbtn--sunny { background: var(--p-sunny); color: #fff; box-shadow: 0 10px 22px rgba(185,105,30,0.4); }
    .pbtn--sunny:hover { transform: translateY(-3px); box-shadow: 0 14px 28px rgba(185,105,30,0.5); }
    .pbtn--ghost { background: #fff; color: var(--p-ink); box-shadow: 0 6px 16px rgba(0,0,0,0.08); }
    .pbtn--ghost:hover { transform: translateY(-3px); }
    .pbtn--outline-purple { border: 2px solid var(--p-purple); color: var(--p-purple); background: #fff; }
    .pbtn--outline-purple:hover { background: var(--p-purple); color: #fff; }
    .pbtn--outline-teal { border: 2px solid var(--p-teal); color: #0e7c8f; background: #fff; }
    .pbtn--outline-teal:hover { background: var(--p-teal); color: #fff; }
    .pbtn--outline-coral { border: 2px solid var(--p-coral); color: var(--p-coral); background: #fff; }
    .pbtn--outline-coral:hover { background: var(--p-coral); color: #fff; }

    /* -------- Statistik -------- */
    .pstats { margin-top: -50px; position: relative; z-index: 5; }
    .pstats__grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }
    .pstat-card {
        border-radius: var(--p-radius);
        padding: 26px 20px;
        text-align: center;
        color: #fff;
        box-shadow: 0 16px 32px rgba(0,0,0,0.12);
        transition: transform 0.2s ease;
    }
    .pstat-card:hover { transform: translateY(-6px); }
    .pstat-card--coral { background: linear-gradient(145deg, var(--p-coral), #5c7fa0); }
    .pstat-card--sky { background: linear-gradient(145deg, var(--p-sky), #8291a0); }
    .pstat-card--sunny { background: linear-gradient(145deg, #c9781f, var(--p-sunny)); color: #fff; }
    .pstat-card--mint { background: linear-gradient(145deg, var(--p-mint), #4f8f8a); }
    .pstat-card__icon { font-size: 30px; display: block; margin-bottom: 8px; }
    .pstat-card__number { display: block; font-size: 32px; font-weight: 900; }
    .pstat-card__label { font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.04em; opacity: 0.9; }

    /* -------- Quicklinks -------- */
    .pquick { margin-top: 56px; }
    .pquick__grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 22px; }
    .pquick-card {
        display: block;
        border-radius: var(--p-radius);
        padding: 30px 26px;
        text-decoration: none;
        color: var(--p-ink);
        position: relative;
        box-shadow: 0 12px 28px rgba(0,0,0,0.08);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .pquick-card:hover { transform: translateY(-6px); box-shadow: 0 20px 36px rgba(0,0,0,0.14); }
    .pquick-card--purple { background: #F1F3F5; border: 2px solid #D7DEE6; }
    .pquick-card--coral { background: #EEF1F4; border: 2px solid #D2DBE3; }
    .pquick-card--teal { background: #E9EEF0; border: 2px solid #CBD8DD; }
    .pquick-card__icon { font-size: 34px; display: block; margin-bottom: 14px; }
    .pquick-card h3 { font-size: 18px; font-weight: 800; margin: 0 0 8px; }
    .pquick-card p { font-size: 13.5px; color: var(--p-ink-soft); margin: 0; line-height: 1.6; }
    .pquick-card__arrow {
        position: absolute; top: 26px; right: 26px;
        font-size: 20px; font-weight: 900;
        transition: transform 0.2s ease;
    }
    .pquick-card:hover .pquick-card__arrow { transform: translateX(4px); }

    /* -------- Tags -------- */
    .ptags { margin-top: 56px; display: flex; align-items: center; gap: 18px; flex-wrap: wrap; }
    .ptags__label { font-weight: 800; color: var(--p-ink); font-size: 15px; }
    .ptags__list { display: flex; gap: 10px; flex-wrap: wrap; }
    .ptag-pill { padding: 7px 16px; border-radius: 999px; font-size: 13px; font-weight: 700; }
    .ptag-pill--coral { background: #E5EAF0; color: #3B5B7A; }
    .ptag-pill--sky { background: #E3E7EB; color: #4B5563; }
    .ptag-pill--sunny { background: #F0E4D6; color: #8A5A1E; }
    .ptag-pill--mint { background: #DEE8E7; color: #2F6F6B; }
    .ptag-pill--purple { background: #E4E7EC; color: #4B5563; }
    .ptag-pill--teal { background: #DCE8ED; color: #3B7A94; }

    /* -------- Section umum -------- */
    .psection { margin-top: 72px; }
    .psection--tint { background: #FAFAFF; border-radius: 32px; padding: 48px 32px; margin-top: 72px; }
    .psection__head { text-align: center; margin-bottom: 36px; }
    .psection__head--split { display: flex; align-items: flex-end; justify-content: space-between; text-align: left; }
    .psection__eyebrow { display: inline-block; font-size: 13px; font-weight: 800; color: var(--p-coral); margin-bottom: 8px; }
    .psection__head h2 { font-size: 30px; font-weight: 900; color: var(--p-ink); margin: 0; }
    .psection__more { text-align: center; margin-top: 32px; }

    /* -------- Program Keahlian -------- */
    .pjurusan-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 22px; }
    .pjurusan-card {
        display: block;
        border-radius: var(--p-radius);
        padding: 30px 22px 26px;
        text-decoration: none;
        color: var(--p-ink);
        text-align: center;
        box-shadow: 0 12px 26px rgba(0,0,0,0.08);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .pjurusan-card:hover { transform: translateY(-8px); box-shadow: 0 22px 38px rgba(0,0,0,0.14); }
    .pjurusan-card--coral { background: linear-gradient(160deg, #EEF1F4, #fff); border: 2px solid #D2DBE3; }
    .pjurusan-card--sky { background: linear-gradient(160deg, #E9EFF1, #fff); border: 2px solid #D0DCE0; }
    .pjurusan-card--sunny { background: linear-gradient(160deg, #F3ECE1, #fff); border: 2px solid #E3D2B5; }
    .pjurusan-card--mint { background: linear-gradient(160deg, #E6EEEC, #fff); border: 2px solid #C9DBD7; }
    .pjurusan-card__badge {
        display: flex; align-items: center; justify-content: center;
        width: 68px; height: 68px; border-radius: 50%;
        background: #fff; margin: 0 auto 16px;
        box-shadow: 0 8px 18px rgba(0,0,0,0.1);
        font-weight: 800; font-size: 18px; overflow: hidden;
    }
    .pjurusan-card__badge img { width: 100%; height: 100%; object-fit: contain; }
    .pjurusan-card h3 { font-size: 16.5px; font-weight: 800; margin: 0 0 8px; }
    .pjurusan-card p { font-size: 13px; color: var(--p-ink-soft); line-height: 1.6; margin: 0 0 12px; min-height: 42px; }
    .pjurusan-card__link { font-size: 13px; font-weight: 800; color: var(--p-coral); }

    /* -------- Ekstrakurikuler scroll -------- */
    .pekskul-scroll {
        display: flex;
        gap: 18px;
        overflow-x: auto;
        padding: 6px 4px 16px;
        scroll-snap-type: x proximity;
    }
    .pekskul-scroll::-webkit-scrollbar { height: 6px; }
    .pekskul-scroll::-webkit-scrollbar-thumb { background: #ddd; border-radius: 999px; }

    .pekskul-card {
        flex: 0 0 150px;
        scroll-snap-align: start;
        border-radius: 20px;
        padding: 24px 16px;
        text-align: center;
        text-decoration: none;
        color: var(--p-ink);
        box-shadow: 0 10px 22px rgba(0,0,0,0.08);
        transition: transform 0.2s ease;
    }
    .pekskul-card:hover { transform: translateY(-6px) scale(1.03); }
    .pekskul-card--coral { background: #EDF1F4; }
    .pekskul-card--sky { background: #E8EFF1; }
    .pekskul-card--sunny { background: #F1EBDF; }
    .pekskul-card--mint { background: #E6EDEB; }
    .pekskul-card--purple { background: #E9ECF0; }
    .pekskul-card--teal { background: #E2EDF0; }
    .pekskul-card__icon {
        display: flex; align-items: center; justify-content: center;
        width: 56px; height: 56px; border-radius: 50%;
        background: #fff; margin: 0 auto 12px;
        font-weight: 800; overflow: hidden;
        box-shadow: 0 6px 14px rgba(0,0,0,0.1);
    }
    .pekskul-card__icon img { width: 100%; height: 100%; object-fit: cover; }
    .pekskul-card h4 { font-size: 13.5px; font-weight: 800; margin: 0; line-height: 1.4; }

    /* -------- Tentang Kami -------- */
    .pabout { margin-top: 72px; }
    .pabout__grid { display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center; }
    .pabout__photo { position: relative; }
    .pabout__photo img { width: 100%; aspect-ratio: 4/3; object-fit: cover; border-radius: 28px; box-shadow: 0 20px 40px rgba(0,0,0,0.15); }
    .pabout__sticker {
        position: absolute; bottom: -14px; left: 24px;
        background: #fff; padding: 10px 18px; border-radius: 999px;
        font-weight: 800; font-size: 13.5px;
        box-shadow: 0 10px 22px rgba(0,0,0,0.14);
    }
    .pabout__text h2 { font-size: 28px; font-weight: 900; color: var(--p-ink); margin: 4px 0 16px; }
    .pabout__text p { color: var(--p-ink-soft); line-height: 1.8; margin-bottom: 24px; }

    /* -------- Responsive -------- */
    @media (max-width: 980px) {
        .phero__grid { grid-template-columns: 1fr; }
        .pstats__grid { grid-template-columns: repeat(2, 1fr); }
        .pquick__grid { grid-template-columns: 1fr; }
        .pjurusan-grid { grid-template-columns: repeat(2, 1fr); }
        .pabout__grid { grid-template-columns: 1fr; }
    }

    @media (max-width: 640px) {
        .pstats__grid { grid-template-columns: 1fr 1fr; }
        .pjurusan-grid { grid-template-columns: 1fr; }
        .psection__head--split { flex-direction: column; align-items: flex-start; gap: 14px; }
    }

    /* -------- Berita & Kegiatan -------- */
    .pnews-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 22px;
    }
    .pnews-card {
        border-radius: var(--p-radius);
        overflow: hidden;
        background: #fff;
        box-shadow: 0 12px 26px rgba(0,0,0,0.08);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        display: flex;
        flex-direction: column;
    }
    .pnews-card:hover { transform: translateY(-6px); box-shadow: 0 20px 36px rgba(0,0,0,0.14); }

    .pnews-card__thumb { position: relative; display: block; aspect-ratio: 16/10; overflow: hidden; background: #f0f0f0; }
    .pnews-card__thumb img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease; }
    .pnews-card:hover .pnews-card__thumb img { transform: scale(1.08); }

    .pnews-card__badge {
        position: absolute; top: 12px; left: 12px;
        font-size: 11.5px; font-weight: 800;
        padding: 5px 14px; border-radius: 999px;
        color: #fff;
    }
    .pnews-card--coral .pnews-card__badge { background: var(--p-coral); }
    .pnews-card--sky .pnews-card__badge { background: #4A6B7D; }
    .pnews-card--sunny .pnews-card__badge { background: #A8672A; }
    .pnews-card--mint .pnews-card__badge { background: #2F6F6B; }
    .pnews-card--purple .pnews-card__badge { background: var(--p-purple); }
    .pnews-card--teal .pnews-card__badge { background: #3B7A94; }

    .pnews-card--coral { border-top: 4px solid var(--p-coral); }
    .pnews-card--sky { border-top: 4px solid var(--p-sky); }
    .pnews-card--sunny { border-top: 4px solid var(--p-sunny); }
    .pnews-card--mint { border-top: 4px solid var(--p-mint); }
    .pnews-card--purple { border-top: 4px solid var(--p-purple); }
    .pnews-card--teal { border-top: 4px solid var(--p-teal); }

    .pnews-card__body { padding: 18px 18px 20px; flex: 1; display: flex; flex-direction: column; }
    .pnews-card__body h3 { font-size: 15.5px; font-weight: 800; margin: 0 0 8px; line-height: 1.4; }
    .pnews-card__body h3 a { color: var(--p-ink); text-decoration: none; }
    .pnews-card__body h3 a:hover { color: var(--p-coral); }
    .pnews-card__body p { font-size: 13px; color: var(--p-ink-soft); line-height: 1.6; flex: 1; margin: 0 0 14px; }
    .pnews-card__meta { display: flex; flex-direction: column; gap: 4px; font-size: 11.5px; color: var(--p-ink-soft); font-weight: 600; }

    @media (max-width: 980px) {
        .pnews-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 640px) {
        .pnews-grid { grid-template-columns: 1fr; }
    }

    @media (prefers-reduced-motion: reduce) {
        .rhero { transition: none !important; }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var hero = document.getElementById('hero-slider');
    if (!hero) return;

    var images = [];
    try {
        images = JSON.parse(hero.dataset.images || '[]');
    } catch (e) {
        images = [];
    }

    hero.style.backgroundImage = "url('" + hero.dataset.bg + "')";

    if (images.length < 2) return;

    var idx = 0;
    function goTo(i) {
        idx = (i + images.length) % images.length;
        hero.style.backgroundImage = "url('" + images[idx] + "')";
    }

    setInterval(function () { goTo(idx + 1); }, 4500);
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\web-sekolah-ukk-otang\resources\views/home.blade.php ENDPATH**/ ?>