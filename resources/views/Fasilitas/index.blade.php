@extends('layouts.app')
@section('title','Fasilitas Sekolah')
@section('content')

<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

<style>
  :root {
    --gold: #C9A96E;
    --gold-light: #E8D5B0;
    --gold-dark: #9A7340;
    --navy: #0D1B2A;
    --navy-mid: #1A2E45;
    --navy-light: #243B55;
    --cream: #FAF7F2;
    --white: #FFFFFF;
    --text-muted: #8A9BB0;
  }

  .fasilitas-wrapper {
    font-family: 'DM Sans', sans-serif;
    background: var(--cream);
    min-height: 100vh;
    padding: 0;
    overflow: hidden;
  }

  /* ── HERO SECTION ── */
  .fasilitas-hero {
    background: var(--navy);
    position: relative;
    padding: 90px 40px 80px;
    text-align: center;
    overflow: hidden;
  }

  .fasilitas-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
      radial-gradient(ellipse 60% 70% at 20% 50%, rgba(201,169,110,0.12) 0%, transparent 70%),
      radial-gradient(ellipse 50% 60% at 80% 50%, rgba(201,169,110,0.08) 0%, transparent 70%);
  }

  .fasilitas-hero::after {
    content: '';
    position: absolute;
    bottom: -1px;
    left: 0;
    right: 0;
    height: 60px;
    background: var(--cream);
    clip-path: ellipse(55% 100% at 50% 100%);
  }

  .hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: rgba(201,169,110,0.15);
    border: 1px solid rgba(201,169,110,0.35);
    color: var(--gold);
    padding: 7px 22px;
    border-radius: 50px;
    font-size: 11px;
    font-weight: 500;
    letter-spacing: 3px;
    text-transform: uppercase;
    margin-bottom: 26px;
    position: relative;
  }

  .hero-badge::before, .hero-badge::after {
    content: '✦';
    font-size: 9px;
  }

  .fasilitas-hero h1 {
    font-family: 'Cormorant Garamond', serif;
    font-size: clamp(2.8rem, 6vw, 4.5rem);
    font-weight: 700;
    color: var(--white);
    margin: 0 0 18px;
    line-height: 1.1;
    position: relative;
  }

  .fasilitas-hero h1 span {
    color: var(--gold);
  }

  .fasilitas-hero p {
    color: var(--text-muted);
    font-size: 15px;
    max-width: 560px;
    margin: 0 auto;
    line-height: 1.7;
    position: relative;
  }

  .hero-divider {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 14px;
    margin: 28px auto 0;
    position: relative;
  }

  .hero-divider span {
    width: 60px;
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--gold));
  }

  .hero-divider span:last-child {
    background: linear-gradient(90deg, var(--gold), transparent);
  }

  .hero-divider i {
    color: var(--gold);
    font-size: 10px;
  }

  /* ── STATS BAR ── */
  .stats-bar {
    background: var(--white);
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 0;
    border-bottom: 1px solid #EDE8E0;
    box-shadow: 0 4px 30px rgba(13,27,42,0.06);
    position: relative;
    z-index: 2;
  }

  .stat-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 28px 48px;
    border-right: 1px solid #EDE8E0;
    min-width: 150px;
    animation: fadeInUp 0.6s ease both;
  }

  .stat-item:last-child { border-right: none; }

  .stat-number {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2.6rem;
    font-weight: 700;
    color: var(--navy);
    line-height: 1;
  }

  .stat-number sup {
    font-size: 1.2rem;
    color: var(--gold);
  }

  .stat-label {
    font-size: 11px;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: var(--text-muted);
    margin-top: 5px;
    font-weight: 500;
  }

  /* ── CARDS SECTION ── */
  .fasilitas-section {
    padding: 70px 40px 80px;
    max-width: 1200px;
    margin: 0 auto;
  }

  .section-header {
    text-align: center;
    margin-bottom: 52px;
  }

  .section-kicker {
    font-size: 11px;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: var(--gold);
    font-weight: 500;
    margin-bottom: 12px;
  }

  .section-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2.4rem;
    font-weight: 700;
    color: var(--navy);
    margin: 0 0 12px;
  }

  .section-line {
    width: 50px;
    height: 2px;
    background: linear-gradient(90deg, var(--gold-dark), var(--gold));
    margin: 0 auto;
    border-radius: 2px;
  }

  /* ── GRID ── */
  .cards-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 28px;
  }

  .facility-card {
    background: var(--white);
    border-radius: 18px;
    overflow: hidden;
    border: 1px solid #EDE8E0;
    box-shadow: 0 4px 24px rgba(13,27,42,0.06);
    transition: transform 0.35s cubic-bezier(0.34,1.56,0.64,1), box-shadow 0.35s ease;
    animation: fadeInUp 0.6s ease both;
    position: relative;
    display: flex;
    flex-direction: column;
  }

  .facility-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 50px rgba(13,27,42,0.14);
  }

  .facility-card:nth-child(1) { animation-delay: 0.05s; }
  .facility-card:nth-child(2) { animation-delay: 0.12s; }
  .facility-card:nth-child(3) { animation-delay: 0.19s; }
  .facility-card:nth-child(4) { animation-delay: 0.26s; }
  .facility-card:nth-child(5) { animation-delay: 0.33s; }
  .facility-card:nth-child(6) { animation-delay: 0.40s; }

  /* Gold accent top bar */
  .card-accent {
    height: 4px;
    background: linear-gradient(90deg, var(--gold-dark), var(--gold), var(--gold-light));
  }

  .card-body {
    padding: 30px 28px 26px;
    flex: 1;
    display: flex;
    flex-direction: column;
  }

  .card-icon-wrap {
    width: 56px;
    height: 56px;
    border-radius: 14px;
    background: linear-gradient(135deg, var(--navy) 0%, var(--navy-light) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    position: relative;
    overflow: hidden;
    flex-shrink: 0;
  }

  .card-icon-wrap::after {
    content: '';
    position: absolute;
    top: -10px;
    right: -10px;
    width: 30px;
    height: 30px;
    background: rgba(201,169,110,0.2);
    border-radius: 50%;
  }

  .card-icon {
    font-size: 1.5rem;
    position: relative;
    z-index: 1;
  }

  .card-count {
    font-family: 'Cormorant Garamond', serif;
    font-size: 13px;
    font-weight: 600;
    color: var(--gold);
    letter-spacing: 1px;
    text-transform: uppercase;
    margin-bottom: 6px;
  }

  .card-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.45rem;
    font-weight: 700;
    color: var(--navy);
    margin: 0 0 10px;
    line-height: 1.2;
  }

  .card-desc {
    font-size: 13.5px;
    color: #6B7A8D;
    line-height: 1.65;
    flex: 1;
    margin-bottom: 20px;
  }

  .card-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 7px;
    margin-top: auto;
    padding-top: 18px;
    border-top: 1px solid #F0EBE3;
  }

  .card-tag {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 5px 12px;
    border-radius: 50px;
    background: var(--cream);
    border: 1px solid #E8E0D4;
    font-size: 11px;
    font-weight: 500;
    color: var(--navy-mid);
    letter-spacing: 0.3px;
  }

  .card-tag::before {
    content: '·';
    color: var(--gold);
    font-size: 14px;
    line-height: 1;
  }

  /* ── ANIMATIONS ── */
  @keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  /* ── RESPONSIVE ── */
  @media (max-width: 900px) {
    .cards-grid { grid-template-columns: repeat(2, 1fr); }
    .stat-item { padding: 22px 30px; }
  }

  @media (max-width: 580px) {
    .cards-grid { grid-template-columns: 1fr; }
    .stats-bar { flex-direction: row; flex-wrap: wrap; }
    .stat-item { flex: 1 1 40%; border-right: none; border-bottom: 1px solid #EDE8E0; }
    .fasilitas-section { padding: 50px 20px 60px; }
    .fasilitas-hero { padding: 70px 24px 60px; }
  }
</style>

<div class="fasilitas-wrapper">

  {{-- HERO --}}
  <div class="fasilitas-hero">
    <div class="hero-badge">Lengkap & Modern</div>
    <h1>Fasilitas <span>Sekolah</span></h1>
    <p>Berikut adalah fasilitas yang tersedia di sekolah kami untuk mendukung proses pembelajaran dan kegiatan siswa secara optimal.</p>
    <div class="hero-divider">
      <span></span>
      <i>✦</i>
      <span></span>
    </div>
  </div>

  {{-- STATS BAR --}}
  <div class="stats-bar">
    <div class="stat-item" style="animation-delay:0.1s">
      <div class="stat-number">15<sup>+</sup></div>
      <div class="stat-label">Ruang Kelas</div>
    </div>
    <div class="stat-item" style="animation-delay:0.2s">
      <div class="stat-number">3</div>
      <div class="stat-label">Laboratorium</div>
    </div>
    <div class="stat-item" style="animation-delay:0.3s">
      <div class="stat-number">2</div>
      <div class="stat-label">Lapangan</div>
    </div>
    <div class="stat-item" style="animation-delay:0.4s">
      <div class="stat-number">4</div>
      <div class="stat-label">Fasilitas Umum</div>
    </div>
  </div>

  {{-- CARDS --}}
  <div class="fasilitas-section">
    <div class="section-header">
      <div class="section-kicker">Fasilitas Unggulan</div>
      <h2 class="section-title">Sarana & Prasarana</h2>
      <div class="section-line"></div>
    </div>

    <div class="cards-grid">

      {{-- Card 1: Lab Komputer --}}
      <div class="facility-card">
        <div class="card-accent"></div>
        <div class="card-body">
          <div class="card-icon-wrap">
            <span class="card-icon">💻</span>
          </div>
          <div class="card-count">15 Unit</div>
          <h3 class="card-title">Laboratorium Komputer</h3>
          <p class="card-desc">Dilengkapi perangkat komputer modern dan akses internet untuk mendukung pembelajaran teknologi secara efektif.</p>
          <div class="card-tags">
            <span class="card-tag">WiFi 24/7</span>
            <span class="card-tag">AC Central</span>
          </div>
        </div>
      </div>

      {{-- Card 2: Perpustakaan --}}
      <div class="facility-card">
        <div class="card-accent"></div>
        <div class="card-body">
          <div class="card-icon-wrap">
            <span class="card-icon">📚</span>
          </div>
          <div class="card-count">3000+ Buku</div>
          <h3 class="card-title">Perpustakaan</h3>
          <p class="card-desc">Menyediakan berbagai koleksi buku pelajaran dan literatur untuk meningkatkan minat baca siswa.</p>
          <div class="card-tags">
            <span class="card-tag">Referensi Digital</span>
          </div>
        </div>
      </div>

      {{-- Card 3: Lapangan --}}
      <div class="facility-card">
        <div class="card-accent"></div>
        <div class="card-body">
          <div class="card-icon-wrap">
            <span class="card-icon">🏃</span>
          </div>
          <div class="card-count">Multi-fungsi</div>
          <h3 class="card-title">Lapangan Olahraga</h3>
          <p class="card-desc">Fasilitas olahraga yang luas untuk kegiatan fisik, upacara, dan berbagai event sekolah.</p>
          <div class="card-tags">
            <span class="card-tag">Basket</span>
            <span class="card-tag">Futsal</span>
          </div>
        </div>
      </div>

      {{-- Card 4: Ruang Kelas --}}
      <div class="facility-card">
        <div class="card-accent"></div>
        <div class="card-body">
          <div class="card-icon-wrap">
            <span class="card-icon">🏫</span>
          </div>
          <div class="card-count">15 Kelas</div>
          <h3 class="card-title">Ruang Kelas Nyaman</h3>
          <p class="card-desc">Ruang kelas bersih dan nyaman dilengkapi fasilitas pendukung pembelajaran yang modern.</p>
          <div class="card-tags">
            <span class="card-tag">Proyektor</span>
            <span class="card-tag">AC</span>
          </div>
        </div>
      </div>

      {{-- Card 5: Lab IPA --}}
      <div class="facility-card">
        <div class="card-accent"></div>
        <div class="card-body">
          <div class="card-icon-wrap">
            <span class="card-icon">🔬</span>
          </div>
          <div class="card-count">Lab IPA</div>
          <h3 class="card-title">Laboratorium IPA</h3>
          <p class="card-desc">Mendukung pembelajaran sains dengan peralatan praktikum yang lengkap dan standar.</p>
          <div class="card-tags">
            <span class="card-tag">Mikroskop</span>
            <span class="card-tag">Alat Lab</span>
          </div>
        </div>
      </div>

      {{-- Card 6: Mushola --}}
      <div class="facility-card">
        <div class="card-accent"></div>
        <div class="card-body">
          <div class="card-icon-wrap">
            <span class="card-icon">🕌</span>
          </div>
          <div class="card-count">Ibadah</div>
          <h3 class="card-title">Mushola</h3>
          <p class="card-desc">Tempat ibadah yang nyaman untuk mendukung kegiatan spiritual siswa dan guru sehari-hari.</p>
          <div class="card-tags">
            <span class="card-tag">Wudhu</span>
            <span class="card-tag">AC</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection