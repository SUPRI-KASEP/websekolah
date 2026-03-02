@extends('layouts.app')
@section('title', 'Ekstrakurikuler')

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

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
    }

    .eskul-wrapper {
        font-family: 'Poppins', sans-serif;
        background: var(--cream);
        min-height: 100vh;
    }

    /* Hero Section */
    .eskul-hero {
        background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 100%);
        position: relative;
        padding: 100px 40px 120px;
        text-align: center;
        overflow: hidden;
    }

    .eskul-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: 
            radial-gradient(ellipse 60% 70% at 20% 50%, rgba(201,169,110,0.15) 0%, transparent 70%),
            radial-gradient(ellipse 50% 60% at 80% 50%, rgba(201,169,110,0.1) 0%, transparent 70%);
    }

    .eskul-hero::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        right: 0;
        height: 80px;
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
        padding: 8px 24px;
        border-radius: 50px;
        font-size: 11px;
        font-weight: 500;
        letter-spacing: 3px;
        text-transform: uppercase;
        margin-bottom: 28px;
        position: relative;
    }

    .hero-badge::before, .hero-badge::after {
        content: '✦';
        font-size: 8px;
    }

    .eskul-hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2.8rem, 6vw, 4.5rem);
        font-weight: 700;
        color: var(--white);
        margin: 0 0 20px;
        line-height: 1.1;
        position: relative;
    }

    .eskul-hero h1 span {
        color: var(--gold);
    }

    .eskul-hero p {
        color: rgba(255,255,255,0.7);
        font-size: 16px;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.7;
        position: relative;
    }

    /* Content Section */
    .eskul-content {
        padding: 60px 0 100px;
    }

    .section-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.2rem;
        font-weight: 600;
        color: var(--navy);
        text-align: center;
        margin-bottom: 50px;
        position: relative;
    }

    .section-title::after {
        content: '';
        display: block;
        width: 60px;
        height: 3px;
        background: var(--gold);
        margin: 15px auto 0;
        border-radius: 2px;
    }

    /* Cards */
    .eskul-card {
        background: var(--white);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0,0,0,0.08);
        transition: all 0.4s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .eskul-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 60px rgba(0,0,0,0.15);
    }

    .card-image {
        position: relative;
        padding: 35px;
        background: linear-gradient(135deg, var(--navy) 0%, var(--navy-light) 100%);
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 180px;
    }

    .card-image img {
        width: 100px;
        height: 100px;
       ;
        border-radius object-fit: cover: 50%;
        border: 4px solid var(--gold);
        box-shadow: 0 8px 25px rgba(0,0,0,0.3);
    }

    .card-icon {
        font-size: 60px;
        filter: drop-shadow(0 4px 10px rgba(0,0,0,0.2));
    }

    .card-body {
        padding: 30px;
        flex: 1;
        display: flex;
        flex-direction: column;
        text-align: center;
    }

    .card-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.4rem;
        font-weight: 600;
        color: var(--navy);
        margin-bottom: 10px;
        line-height: 1.3;
    }

    .card-pembina {
        display: inline-block;
        background: rgba(201,169,110,0.15);
        color: var(--gold-dark);
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
        margin-bottom: 15px;
    }

    .card-text {
        font-size: 0.95rem;
        color: #6c757d;
        line-height: 1.7;
        flex: 1;
    }

    .card-badge {
        display: inline-block;
        background: linear-gradient(135deg, var(--gold) 0%, var(--gold-dark) 100%);
        color: var(--white);
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 500;
        letter-spacing: 1px;
        text-transform: uppercase;
        margin-top: 20px;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 80px 20px;
    }

    .empty-icon {
        font-size: 80px;
        margin-bottom: 20px;
        opacity: 0.5;
    }

    .empty-text {
        font-size: 1.2rem;
        color: #6c757d;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .eskul-hero {
            padding: 80px 20px 100px;
        }
        
        .section-title {
            font-size: 1.8rem;
        }
        
        .card-body {
            padding: 25px;
        }
        
        .card-title {
            font-size: 1.2rem;
        }
    }
</style>

@section('content')
<div class="eskul-wrapper">
    {{-- Hero Section --}}
    <section class="eskul-hero">
        <div class="hero-badge">Pengembangan Diri</div>
        <h1>Ekstra<span>kurikuler</span></h1>
        <p>Berbagai pilihan kegiatan ekstrakurikuler untuk mengembangkan bakat dan minat siswa secara optimal.</p>
    </section>

    {{-- Content Section --}}
    <section class="eskul-content">
        <div class="container">
            <h2 class="section-title">Program Ekskul</h2>
            
            <div class="row g-4">
                @forelse($eskuls as $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="eskul-card">
                            <div class="card-image">
                                @if($item->gambar)
                                    <img src="{{ asset('assets/' . $item->gambar) }}" 
                                         alt="{{ $item->nama_eskul }}">
                                @else
                                    <span class="card-icon">🎯</span>
                                @endif
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->nama_eskul }}</h5>
                                @if($item->pembina)
                                    <span class="card-pembina">Pembina: {{ $item->pembina }}</span>
                                @endif
                                <p class="card-text">{{ $item->deskripsi }}</p>
                                <span class="card-badge">Aktif</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="empty-state">
                            <div class="empty-icon">🎯</div>
                            <p class="empty-text">Belum ada data ekstrakurikuler yang ditambahkan.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</div>
@endsection
