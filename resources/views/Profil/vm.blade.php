@extends('layouts.app')
@section('title', 'Visi Misi')
@section('content')

<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

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

  .vm-wrapper {
    font-family: 'DM Sans', sans-serif;
    background: var(--cream);
    min-height: 100vh;
    padding: 0;
    overflow: hidden;
  }

  /* ── HERO SECTION ── */
  .vm-hero {
    background: var(--navy);
    position: relative;
    padding: 90px 40px 80px;
    text-align: center;
    overflow: hidden;
  }

  .vm-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
      radial-gradient(ellipse 60% 70% at 20% 50%, rgba(201,169,110,0.12) 0%, transparent 70%),
      radial-gradient(ellipse 50% 60% at 80% 50%, rgba(201,169,110,0.08) 0%, transparent 70%);
  }

  .vm-hero::after {
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

  .vm-hero h1 {
    font-family: 'Cormorant Garamond', serif;
    font-size: clamp(2.8rem, 6vw, 4.5rem);
    font-weight: 700;
    color: var(--white);
    margin: 0 0 18px;
    line-height: 1.1;
    position: relative;
  }

  .vm-hero h1 span {
    color: var(--gold);
  }

  .vm-hero p {
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

  /* ── MAIN CONTENT ── */
  .vm-section {
    padding: 70px 40px 80px;
    max-width: 1100px;
    margin: 0 auto;
  }

  /* ── CONTENT CARD ── */
  .content-card {
    background: var(--white);
    border-radius: 24px;
    padding: 50px;
    box-shadow: 0 10px 40px rgba(13,27,42,0.08);
    border: 1px solid rgba(201,169,110,0.2);
    position: relative;
    overflow: hidden;
  }

  .content-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 6px;
    background: linear-gradient(90deg, var(--gold-dark), var(--gold), var(--gold-light));
  }

  .content-body {
    font-size: 15px;
    color: var(--text-muted);
    line-height: 1.8;
    white-space: pre-line;
  }

  .content-body h1, .content-body h2, .content-body h3 {
    font-family: 'Cormorant Garamond', serif;
    color: var(--navy);
    margin: 30px 0 15px;
  }

  .content-body h1 { font-size: 2rem; }
  .content-body h2 { font-size: 1.6rem; }
  .content-body h3 { font-size: 1.3rem; }

  .content-body p {
    margin-bottom: 15px;
  }

  .content-body ul, .content-body ol {
    margin: 15px 0;
    padding-left: 25px;
  }

  .content-body li {
    margin-bottom: 10px;
  }

  /* ── SECTION ITEM WITH ICON ── */
  .section-item {
    display: flex;
    gap: 24px;
    margin-bottom: 40px;
    align-items: flex-start;
  }

  .section-item:last-child {
    margin-bottom: 0;
  }

  .section-icon {
    flex-shrink: 0;
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--gold) 0%, var(--gold-dark) 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 15px rgba(201,169,110,0.3);
  }

  .section-icon svg {
    width: 28px;
    height: 28px;
    color: var(--white);
  }

  .section-content {
    flex: 1;
  }

  .section-content h2 {
    margin-top: 0;
  }

  /* ── EMPTY STATE ── */
  .empty-state {
    text-align: center;
    padding: 60px 20px;
    color: var(--text-muted);
  }

  .empty-state p {
    font-size: 16px;
  }

  /* ── ANIMATIONS ── */
  @keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  .content-card { animation: fadeInUp 0.6s ease both; }

  /* ── RESPONSIVE ── */
  @media (max-width: 580px) {
    .vm-section { padding: 50px 20px 60px; }
    .vm-hero { padding: 70px 24px 60px; }
    .content-card { padding: 30px 20px; }
    .section-item { flex-direction: column; text-align: center; }
    .section-icon { margin: 0 auto; }
    .section-content { width: 100%; }
  }
</style>

<div class="vm-wrapper">

  {{-- HERO --}}
  <div class="vm-hero">
    <div class="hero-badge">Tentang Kami</div>
    <h1>Visi <span>&</span> Misi</h1>
    <p>Mengenal lebih jauh tentang tujuan dan arah pendidikan sekolah kami untuk menciptakan generasi yang berkarakter.</p>
    <div class="hero-divider">
      <span></span>
      <i>✦</i>
      <span></span>
    </div>
  </div>

  {{-- MAIN CONTENT --}}
  <div class="vm-section">

    @if($profil && ($profil->konten || $profil->isi_visi || $profil->isi_misi))
      <div class="content-card">
        <div class="content-body">
          @if($profil->konten)
            {!! nl2br(e($profil->konten)) !!}
          @else
            @if($profil->isi_visi)
              <div class="section-item">
                <div class="section-icon">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                    <circle cx="12" cy="12" r="3"/>
                  </svg>
                </div>
                <div class="section-content">
                  <h2>VISI</h2>
                  <p>{!! nl2br(e($profil->isi_visi)) !!}</p>
                </div>
              </div>
            @endif

            @if($profil->isi_misi)
              <div class="section-item">
                <div class="section-icon">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/>
                    <circle cx="12" cy="12" r="6"/>
                    <circle cx="12" cy="12" r="2"/>
                  </svg>
                </div>
                <div class="section-content">
                  <h2>MISI</h2>
                  {!! nl2br(e($profil->isi_misi)) !!}
                </div>
              </div>
            @endif
          @endif
        </div>
      </div>
    @else
      <div class="content-card">
        <div class="empty-state">
          <p>Belum ada data visi misi.</p>
        </div>
      </div>
    @endif

  </div>
</div>
@endsection

