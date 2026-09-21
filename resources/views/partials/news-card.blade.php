@php
    $categoryLabels = [
        'prestasi' => 'Prestasi',
        'ekstrakurikuler' => 'Ekstrakurikuler',
        'info-pendidikan' => 'Info Pendidikan',
    ];
    $label = $categoryLabels[$item->category] ?? 'Info Pendidikan';
@endphp

@once
    <style>
        .nc2-card {
            display: flex;
            flex-direction: column;
            background: #fff;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 10px 24px -16px rgba(10, 61, 48, 0.35);
            transition: transform .2s ease, box-shadow .2s ease;
        }
        .nc2-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 30px -14px rgba(10, 61, 48, 0.28);
        }

        .nc2-card__thumb {
            position: relative;
            display: block;
            aspect-ratio: 16 / 10;
            overflow: hidden;
            background: var(--line);
        }
        .nc2-card__thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform .4s ease;
        }
        .nc2-card:hover .nc2-card__thumb img { transform: scale(1.05); }

        .nc2-card__badge {
            position: absolute;
            top: 12px;
            left: 12px;
            font-size: 11.5px;
            font-weight: 700;
            color: #fff;
            padding: 6px 13px;
            border-radius: 999px;
            box-shadow: 0 4px 10px rgba(0,0,0,.18);
        }
        .nc2-card__badge--prestasi { background: var(--amber); }
        .nc2-card__badge--ekstrakurikuler { background: var(--teal); }
        .nc2-card__badge--info-pendidikan { background: var(--navy); }

        .nc2-card__body {
            display: flex;
            flex-direction: column;
            padding: 18px 20px 22px;
            flex: 1;
        }

        .nc2-card__date {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            align-self: flex-start;
            font-size: 12.5px;
            font-weight: 700;
            color: #fff;
            background: var(--amber);
            padding: 6px 14px;
            border-radius: 999px;
            margin-bottom: 14px;
        }

        .nc2-card__body h3 {
            font-family: var(--font-display);
            font-size: 16.5px;
            line-height: 1.35;
            margin: 0 0 8px;
        }
        .nc2-card__body h3 a { color: var(--navy-deep); text-decoration: none; }
        .nc2-card__body h3 a:hover { color: var(--amber); }

        .nc2-card__body p {
            font-size: 13.5px;
            color: var(--ink-soft);
            line-height: 1.6;
            margin: 0 0 18px;
            flex: 1;
        }

        .nc2-card__btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: var(--navy);
            color: #fff;
            font-size: 13.5px;
            font-weight: 700;
            padding: 11px 18px;
            border-radius: 999px;
            text-decoration: none;
            transition: background .2s ease;
        }
        .nc2-card__btn:hover { background: var(--navy-deep); }
        .nc2-card__btn svg { flex-shrink: 0; }
    </style>
@endonce

<article class="nc2-card">
    <a href="{{ route('news.show', $item->slug) }}" class="nc2-card__thumb">
        @if($item->image)
            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" loading="lazy">
        @else
            <img src="{{ asset('img/placeholder.jpg') }}" alt="{{ $item->title }}" loading="lazy">
        @endif
        <span class="nc2-card__badge nc2-card__badge--{{ $item->category }}">{{ $label }}</span>
    </a>

    <div class="nc2-card__body">
        <span class="nc2-card__date">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
            {{ optional($item->published_at)->translatedFormat('d M Y') }}
        </span>

        <h3><a href="{{ route('news.show', $item->slug) }}">{{ $item->title }}</a></h3>
        <p>{{ $item->excerpt }}</p>

        <a href="{{ route('news.show', $item->slug) }}" class="nc2-card__btn">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M9 12h6M13 9l3 3-3 3"/></svg>
            Selengkapnya
        </a>
    </div>
</article>