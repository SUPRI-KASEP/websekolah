@extends('layouts.app')
@section('title', 'Prestasi Sekolah')

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    :root {
        --primary: #1e3c72;
        --primary-dark: #0f2744;
        --primary-light: #2a4a7a;
        --accent: #c9a959;
        --accent-light: #e6d5b8;
        --accent-dark: #b38f3f;
        --gray-50: #f9fafc;
        --gray-100: #f0f2f5;
        --gray-200: #e5e7eb;
        --gray-300: #d1d5db;
        --gray-400: #9ca3af;
        --gray-500: #6b7280;
        --gray-600: #4b5563;
        --gray-700: #374151;
        --gray-800: #1f2937;
        --shadow-sm: 0 2px 4px rgba(0,0,0,0.02);
        --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.05), 0 2px 4px -1px rgba(0,0,0,0.03);
        --shadow-lg: 0 20px 25px -5px rgba(0,0,0,0.05), 0 10px 10px -5px rgba(0,0,0,0.02);
        --shadow-hover: 0 30px 40px -15px rgba(0,0,0,0.15);
    }

    .prestasi-wrapper {
        font-family: 'Inter', sans-serif;
        background: var(--gray-50);
        min-height: 100vh;
    }

    /* Hero Section - Minimalis */
    .prestasi-hero {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
        padding: 80px 20px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .prestasi-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"><path d="M30 5L55 30L30 55L5 30L30 5Z" fill="none" stroke="rgba(255,255,255,0.03)" stroke-width="1"/></svg>');
        opacity: 0.3;
    }

    .hero-badge {
        display: inline-block;
        background: rgba(255,255,255,0.1);
        backdrop-filter: blur(5px);
        color: var(--accent-light);
        padding: 6px 20px;
        border-radius: 30px;
        font-size: 13px;
        font-weight: 500;
        letter-spacing: 0.5px;
        margin-bottom: 25px;
        border: 1px solid rgba(255,255,255,0.1);
    }

    .prestasi-hero h1 {
        font-family: 'Montserrat', sans-serif;
        font-size: clamp(2.2rem, 5vw, 3.2rem);
        font-weight: 700;
        color: white;
        margin: 0 0 15px;
        line-height: 1.2;
    }

    .prestasi-hero h1 span {
        color: var(--accent);
        position: relative;
        display: inline-block;
    }

    .prestasi-hero h1 span::after {
        content: '';
        position: absolute;
        bottom: 5px;
        left: 0;
        width: 100%;
        height: 8px;
        background: rgba(201, 169, 89, 0.3);
        z-index: -1;
    }

    .prestasi-hero p {
        color: rgba(255,255,255,0.8);
        font-size: 16px;
        max-width: 550px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Stats Section */
    .stats-section {
        background: white;
        padding: 30px 0;
        border-bottom: 1px solid var(--gray-200);
    }

    .stat-item {
        text-align: center;
        padding: 15px;
    }

    .stat-number {
        font-family: 'Montserrat', sans-serif;
        font-size: 2rem;
        font-weight: 700;
        color: var(--primary);
        line-height: 1.2;
    }

    .stat-label {
        font-size: 0.85rem;
        color: var(--gray-500);
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    /* Content Section */
    .prestasi-content {
        padding: 60px 0 80px;
    }

    .section-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .section-title {
        font-family: 'Montserrat', sans-serif;
        font-size: 2rem;
        font-weight: 600;
        color: var(--gray-800);
        margin-bottom: 10px;
    }

    .section-subtitle {
        color: var(--gray-500);
        font-size: 1rem;
        max-width: 500px;
        margin: 0 auto;
    }

    /* Cards Grid - 4 Columns */
    .cards-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 25px;
        margin-top: 30px;
    }

    /* Card Style */
    .prestasi-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        transition: all 0.3s ease;
        border: 1px solid var(--gray-200);
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .prestasi-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-hover);
        border-color: var(--accent-light);
    }

    .card-image {
        height: 180px;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    .card-image::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(201,169,89,0.1) 0%, transparent 100%);
    }

    .card-image img {
        width: 90px;
        height: 90px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid white;
        box-shadow: var(--shadow-lg);
        position: relative;
        z-index: 2;
    }

    .card-icon {
        font-size: 48px;
        z-index: 2;
        position: relative;
    }

    .card-body {
        padding: 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .card-category {
        display: inline-block;
        background: var(--accent-light);
        color: var(--accent-dark);
        padding: 4px 12px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.3px;
        margin-bottom: 12px;
        width: fit-content;
    }

    .card-title {
        font-family: 'Montserrat', sans-serif;
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--gray-800);
        margin-bottom: 10px;
        line-height: 1.4;
    }

    .card-text {
        font-size: 0.9rem;
        color: var(--gray-500);
        line-height: 1.6;
        margin-bottom: 15px;
        flex: 1;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .card-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: auto;
        padding-top: 15px;
        border-top: 1px solid var(--gray-200);
    }

    .card-date {
        font-size: 0.8rem;
        color: var(--gray-400);
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .card-date i {
        font-size: 14px;
    }

    .card-badge {
        background: var(--primary);
        color: white;
        padding: 4px 12px;
        border-radius: 30px;
        font-size: 10px;
        font-weight: 600;
        letter-spacing: 0.3px;
    }

    /* Empty State */
    .empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 80px 20px;
        background: white;
        border-radius: 20px;
        border: 2px dashed var(--gray-300);
    }

    .empty-icon {
        font-size: 70px;
        margin-bottom: 20px;
        opacity: 0.5;
    }

    .empty-title {
        font-family: 'Montserrat', sans-serif;
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--gray-700);
        margin-bottom: 10px;
    }

    .empty-text {
        color: var(--gray-500);
        font-size: 1rem;
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .cards-grid {
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
    }

    @media (max-width: 992px) {
        .cards-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
    }

    @media (max-width: 576px) {
        .cards-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .prestasi-hero {
            padding: 60px 20px;
        }
        
        .section-title {
            font-size: 1.6rem;
        }
        
        .stat-number {
            font-size: 1.6rem;
        }
    }
</style>

@section('content')
<div class="prestasi-wrapper">
    {{-- Hero Section --}}
    <section class="prestasi-hero">
        <div class="container">
            <span class="hero-badge">✦ ACHIEVEMENTS</span>
            <h1>Prestasi <span>Sekolah</span></h1>
            <p>Kumpulan prestasi membanggakan yang telah diraih oleh siswa-siswi kami di berbagai bidang kompetisi</p>
        </div>
    </section>

    {{-- Stats Section --}}
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="stat-item">
                        <div class="stat-number">{{ $prestasis->count() }}</div>
                        <div class="stat-label">Total Prestasi</div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="stat-item">
                        <div class="stat-number">
                            @php
                                $akademik = $prestasis->filter(function($item) {
                                    return strpos(strtolower($item->nama_prestasi), 'akademik') !== false;
                                })->count();
                            @endphp
                            {{ $akademik }}
                        </div>
                        <div class="stat-label">Akademik</div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="stat-item">
                        <div class="stat-number">{{ $prestasis->count() - $akademik }}</div>
                        <div class="stat-label">Non-Akademik</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Content Section --}}
    <section class="prestasi-content">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Daftar Prestasi</h2>
                <p class="section-subtitle">Berikut adalah prestasi yang telah berhasil diraih oleh siswa/i kami</p>
            </div>
            
            <div class="cards-grid">
                @forelse($prestasis as $index => $item)
                    <div class="prestasi-card" data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                        <div class="card-image">
                            @if($item->foto)
                                <img src="{{ asset('assets/' . $item->foto) }}" 
                                     alt="{{ $item->nama_prestasi }}">
                            @else
                                @php
                                    $icons = ['🏆', '🥇', '🥈', '🥉', '📚', '🎨', '⚽', '🎭'];
                                    $randomIcon = $icons[array_rand($icons)];
                                @endphp
                                <span class="card-icon">{{ $randomIcon }}</span>
                            @endif
                        </div>
                        <div class="card-body">
                            <span class="card-category">
                                {{ $loop->even ? 'Akademik' : 'Non-Akademik' }}
                            </span>
                            <h5 class="card-title">{{ $item->nama_prestasi }}</h5>
                            <p class="card-text">{{ Str::limit($item->isi, 100) }}</p>
                            <div class="card-footer">
                                <span class="card-date">
                                    <i>📅</i> {{ now()->format('d M Y') }}
                                </span>
                                <span class="card-badge">PRESTASI</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <div class="empty-icon">🏆</div>
                        <h4 class="empty-title">Belum Ada Prestasi</h4>
                        <p class="empty-text">Data prestasi akan segera ditambahkan</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</div>
@endsection