@extends('layouts.app')
@section('title', 'Tim Pengajar - Guru SMK YPC')
@section('content')

<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap');

:root {
    --ink:        #0d1b2a;
    --ink-mid:    #1c3144;
    --ink-soft:   #2e4a63;
    --accent:     #e8a87c;
    --accent-dark:#c4834a;
    --white:      #ffffff;
    --off-white:  #f5f3ef;
    --light-bg:   #fafaf8;
    --text-body:  #4a5568;
    --text-muted: #718096;
    --border:     #e2e8f0;
    --shadow-sm:  0 2px 8px rgba(13,27,42,0.06);
    --shadow-md:  0 8px 30px rgba(13,27,42,0.10);
    --shadow-lg:  0 20px 60px rgba(13,27,42,0.14);
    --radius:     18px;
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

.guru-wrapper {
    font-family: 'DM Sans', sans-serif;
    background: var(--light-bg);
    min-height: 100vh;
    color: var(--text-body);
}

/* ===== HERO ===== */
.guru-hero {
    position: relative;
    background: var(--ink);
    padding: 100px 24px 90px;
    text-align: center;
    overflow: hidden;
}

.hero-bg-grid {
    position: absolute;
    inset: 0;
    background-image:
        linear-gradient(rgba(232,168,124,0.04) 1px, transparent 1px),
        linear-gradient(90deg, rgba(232,168,124,0.04) 1px, transparent 1px);
    background-size: 60px 60px;
    pointer-events: none;
}

.hero-orb {
    position: absolute;
    border-radius: 50%;
    filter: blur(80px);
    pointer-events: none;
}
.hero-orb-1 {
    width: 400px; height: 400px;
    background: radial-gradient(circle, rgba(232,168,124,0.15) 0%, transparent 70%);
    top: -100px; left: -80px;
}
.hero-orb-2 {
    width: 320px; height: 320px;
    background: radial-gradient(circle, rgba(46,74,99,0.5) 0%, transparent 70%);
    bottom: -60px; right: -40px;
}

.hero-inner {
    position: relative;
    z-index: 2;
    max-width: 640px;
    margin: 0 auto;
    animation: fadeUp 0.9s ease both;
}

.hero-eyebrow {
    display: inline-block;
    font-size: 0.72rem;
    font-weight: 600;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    color: var(--accent);
    border: 1px solid rgba(232,168,124,0.3);
    padding: 6px 18px;
    border-radius: 100px;
    margin-bottom: 24px;
    background: rgba(232,168,124,0.08);
}

.guru-hero h1 {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(2.2rem, 5vw, 3.4rem);
    font-weight: 700;
    color: var(--white);
    line-height: 1.15;
    letter-spacing: -0.5px;
    margin-bottom: 16px;
}

.guru-hero h1 span { color: var(--accent); }

.guru-hero p {
    color: rgba(255,255,255,0.7);
    font-size: 1rem;
    line-height: 1.75;
    font-weight: 300;
}

/* ===== STATS ===== */
.stats-section {
    background: var(--white);
    border-bottom: 1px solid var(--border);
    padding: 0;
}

.stats-inner {
    display: flex;
    justify-content: center;
}

.stat-item {
    flex: 1;
    text-align: center;
    padding: 36px 20px;
    border-right: 1px solid var(--border);
    transition: background 0.2s ease;
}
.stat-item:last-child { border-right: none; }
.stat-item:hover { background: var(--off-white); }

.stat-number {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 2.4rem;
    font-weight: 700;
    color: var(--ink);
    line-height: 1;
    margin-bottom: 6px;
}

.stat-label {
    font-size: 0.75rem;
    color: var(--text-muted);
    letter-spacing: 1.5px;
    text-transform: uppercase;
    font-weight: 500;
}

/* ===== CONTENT ===== */
.guru-content {
    padding: 80px 24px 100px;
    max-width: 1160px;
    margin: 0 auto;
}

.section-header {
    text-align: center;
    margin-bottom: 56px;
}

.section-eyebrow {
    display: inline-block;
    font-size: 0.72rem;
    font-weight: 600;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: var(--accent-dark);
    background: rgba(232,168,124,0.12);
    border: 1px solid rgba(232,168,124,0.3);
    padding: 6px 16px;
    border-radius: 100px;
    margin-bottom: 16px;
}

.section-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(1.8rem, 3vw, 2.4rem);
    font-weight: 700;
    color: var(--ink);
    margin-bottom: 12px;
    letter-spacing: -0.3px;
}

.section-subtitle {
    color: var(--text-muted);
    font-size: 1rem;
    max-width: 480px;
    margin: 0 auto;
    line-height: 1.7;
}

.content-divider {
    width: 48px;
    height: 3px;
    background: var(--accent);
    border-radius: 3px;
    margin: 20px auto 0;
}

/* ===== CARDS GRID ===== */
.cards-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
}

/* ===== GURU CARD (new photo-cover style) ===== */
.guru-card {
    border-radius: var(--radius);
    overflow: hidden;
    position: relative;
    background: var(--ink-mid);
    box-shadow: var(--shadow-md);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: default;
}

.guru-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
}

/* Left accent bar */
.guru-card .left-bar {
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 4px;
    background: linear-gradient(to bottom, var(--accent), var(--accent-dark));
    z-index: 3;
    border-radius: 0;
}

/* Full-cover photo */
.card-img-wrap {
    width: 100%;
    height: 280px;
    position: relative;
    overflow: hidden;
}

.card-img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: top center;
    display: block;
    transition: transform 0.4s ease;
}

.guru-card:hover .card-img-wrap img {
    transform: scale(1.06);
}

.card-no-photo {
    width: 100%;
    height: 100%;
    background: linear-gradient(160deg, var(--ink-soft) 0%, var(--ink) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
}

.card-no-photo i {
    font-size: 64px;
    color: rgba(255,255,255,0.35);
}

/* Badge top-right */
.card-badge-guru {
    position: absolute;
    top: 14px;
    right: 14px;
    background: rgba(232,168,124,0.92);
    color: #4a2200;
    font-size: 0.6rem;
    font-weight: 700;
    letter-spacing: 1.2px;
    text-transform: uppercase;
    padding: 5px 12px;
    border-radius: 100px;
    z-index: 4;
    backdrop-filter: blur(4px);
}

/* Gradient overlay at bottom of photo */
.card-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(
        to top,
        rgba(8,16,28,0.98) 0%,
        rgba(8,16,28,0.85) 45%,
        rgba(8,16,28,0.4) 75%,
        transparent 100%
    );
    padding: 48px 16px 18px;
    z-index: 2;
}

.card-matpel-label {
    font-size: 0.67rem;
    font-weight: 600;
    letter-spacing: 1.2px;
    text-transform: uppercase;
    color: var(--accent);
    margin-bottom: 5px;
    opacity: 0.9;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.card-nama-overlay {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 1.05rem;
    font-weight: 700;
    color: var(--white);
    line-height: 1.3;
    margin-bottom: 14px;
}

/* Action buttons */
.card-actions {
    display: flex;
    gap: 8px;
    align-items: center;
}

.icon-btn {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255,255,255,0.14);
    color: var(--white);
    border: 1px solid rgba(255,255,255,0.22);
    text-decoration: none;
    font-size: 13px;
    transition: transform 0.2s ease, background 0.2s ease;
    flex-shrink: 0;
}

.icon-btn:hover {
    transform: scale(1.14);
    background: rgba(232,168,124,0.3);
    border-color: rgba(232,168,124,0.5);
    color: var(--white);
}

/* ===== EMPTY STATE ===== */
.empty-state {
    grid-column: 1 / -1;
    text-align: center;
    padding: 80px 40px;
    background: var(--white);
    border-radius: var(--radius);
    border: 1.5px dashed var(--border);
}

.empty-icon { font-size: 64px; opacity: 0.35; margin-bottom: 20px; }
.empty-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--ink);
    margin-bottom: 8px;
}
.empty-text { color: var(--text-muted); font-size: 0.95rem; }

/* ===== ANIMATION ===== */
@keyframes fadeUp {
    from { opacity: 0; transform: translateY(28px); }
    to { opacity: 1; transform: translateY(0); }
}

/* ===== RESPONSIVE ===== */
@media (max-width: 1200px) {
    .cards-grid { grid-template-columns: repeat(4, 1fr); }
}
@media (max-width: 1024px) {
    .cards-grid { grid-template-columns: repeat(3, 1fr); }
}
@media (max-width: 768px) {
    .guru-hero { padding: 72px 20px 64px; }
    .guru-content { padding: 52px 16px 72px; }
    .cards-grid { grid-template-columns: repeat(2, minmax(0,1fr)); gap: 14px; }
    .stats-inner { flex-wrap: wrap; }
    .stat-item { flex: 1 1 calc(33% - 1px); }
    .card-img-wrap { height: 240px; }
}
@media (max-width: 480px) {
    .cards-grid { grid-template-columns: repeat(2, minmax(0,1fr)); gap: 10px; }
    .stats-inner { flex-direction: row; flex-wrap: wrap; }
    .stat-item { flex: 1 1 calc(33% - 1px); border-right: 1px solid var(--border); border-bottom: none; padding: 20px 10px; }
    .stat-number { font-size: 1.6rem; }
    .card-img-wrap { height: 200px; }
    .card-nama-overlay { font-size: 0.9rem; }
    .card-matpel-label { font-size: 0.6rem; }
}
</style>

<div class="guru-wrapper">

    {{-- Hero --}}
    <section class="guru-hero">
        <div class="hero-bg-grid"></div>
        <div class="hero-orb hero-orb-1"></div>
        <div class="hero-orb hero-orb-2"></div>
        <div class="hero-inner">
            <span class="hero-eyebrow">✦ Tim Pengajar</span>
            <h1>Guru <span>Terbaik</span></h1>
            <p>Para pengajar berpengalaman dan berdedikasi yang siap membimbing Anda menuju prestasi gemilang</p>
        </div>
    </section>

    {{-- Stats --}}
    <section class="stats-section">
        <div class="stats-inner">
            <div class="stat-item">
                <div class="stat-number">{{ $gurus->count() }}</div>
                <div class="stat-label">Guru Aktif</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">100%</div>
                <div class="stat-label">Sertifikasi</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">5+</div>
                <div class="stat-label">Tahun Rata-rata</div>
            </div>
        </div>
    </section>

    {{-- Content --}}
    <section class="guru-content">
        <div class="section-header">
            <span class="section-eyebrow">Daftar Guru</span>
            <h2 class="section-title">Tim Pengajar Profesional</h2>
            <p class="section-subtitle">Guru-guru berkualitas dengan pengalaman mengajar yang telah teruji</p>
            <div class="content-divider"></div>
        </div>

        <div class="cards-grid">
            @forelse($gurus as $guru)
                <div class="guru-card">
                    {{-- Left accent bar --}}
                    <div class="left-bar"></div>

                    {{-- Badge --}}
                    <span class="card-badge-guru">Guru</span>

                    {{-- Full-cover photo --}}
                    <div class="card-img-wrap">
                        @if($guru->foto)
                            <img src="{{ asset('assets/' . $guru->foto) }}" alt="{{ $guru->nama }}">
                        @else
                            <div class="card-no-photo">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                        @endif

                        {{-- Overlay info --}}
                        <div class="card-overlay">
                            <div class="card-matpel-label">{{ $guru->matpel }}</div>
                            <div class="card-nama-overlay">{{ $guru->nama }}</div>
                            <div class="card-actions">

                                @if($guru->email)
                                <a href="mailto:{{ $guru->email }}" class="icon-btn" title="{{ $guru->email }}">
                                    <i class="fas fa-envelope"></i>
                                </a>
                                @endif
                                @if($guru->no_hp)
                                <a href="tel:{{ $guru->no_hp }}" class="icon-btn" title="{{ $guru->no_hp }}">
                                    <i class="fas fa-phone"></i>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <div class="empty-icon">👨‍🏫</div>
                    <h4 class="empty-title">Belum Ada Guru</h4>
                    <p class="empty-text">Data guru akan ditampilkan setelah ditambahkan admin</p>
                </div>
            @endforelse
        </div>
    </section>

</div>
@endsection