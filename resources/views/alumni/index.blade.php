@extends('layouts.app')
@section('title', 'Alumni - SMK YPC')

@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col">
            <h1 class="fw-bold text-dark mb-1">Alumni Terhormat</h1>
            <p class="text-muted">Kami bangga dengan prestasi alumni SMK YPC</p>
        </div>
    </div>

    <div class="row g-4">
        @forelse($alumni as $item)
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card h-100 shadow-sm border-0 hover-lift">
                @if($item->foto)
                <img src="{{ Storage::url($item->foto) }}" class="card-img-top img-fluid" style="height: 220px; object-fit: cover;" alt="{{ $item->nama_alumni }}" onerror="this.style.display='none'">
                @else
                <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 220px;">
                    <i class="fas fa-user-graduate fa-3x text-muted"></i>
                </div>
                @endif

                <div class="card-body">
                    <h6 class="card-title fw-bold mb-2">{{ $item->nama_alumni }}</h6>
                    <p class="text-muted small mb-2">Angkatan {{ $item->angkatan }}</p>
                    @if($item->pekerjaan_sekarang)
                    <p class="text-primary fw-semibold small mb-0">
                        <i class="fas fa-briefcase me-1"></i>{{ $item->pekerjaan_sekarang }}
                    </p>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="text-center py-5">
                <i class="fas fa-users fa-5x text-muted mb-4"></i>
                <h3 class="text-muted">Belum ada data alumni</h3>
            </div>
        </div>
        @endforelse
    </div>

    @if($alumni->hasPages())
    <nav class="mt-5">
        {{ $alumni->links() }}
    </nav>
    @endif
</div>

<style>
:root {
    --primary-color: #2c3e50;
    --secondary-color: #34495e;
    --accent-color: #1abc9c;
    --success-color: #27ae60;
    --light-bg: #f8f9fa;
    --text-dark: #2c3e50;
    --text-muted: #7f8c8d;
}

.hero-section {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    color: white;
    padding: 60px 0;
    margin-bottom: 4rem;
    border-radius: 20px;
    position: relative;
    overflow: hidden;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1.5" fill="rgba(255,255,255,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>') repeat;
}

.hero-content {
    text-align: center;
}

.hero-title {
    font-size: clamp(2rem, 5vw, 3.5rem);
    font-weight: 800;
    margin-bottom: 1rem;
    text-shadow: 0 4px 12px rgba(0,0,0,0.3);
}

.hero-subtitle {
    font-size: 1.3rem;
    opacity: 0.95;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

.alumni-stats {
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.2);
    border-radius: 16px;
    padding: 2rem;
    margin-top: 3rem;
}

.stat-item {
    text-align: center;
    padding: 1rem;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 800;
    background: linear-gradient(135deg, var(--accent-color), #16a085);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    line-height: 1;
}

.stat-label {
    color: rgba(255,255,255,0.9);
    font-weight: 500;
    margin-top: 0.5rem;
    font-size: 0.95rem;
}

.alumni-grid {
    --gap: 1.5rem;
}

.alumni-card {
    background: white;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: 1px solid rgba(255,255,255,0.8);
    backdrop-filter: blur(10px);
    position: relative;
}

.alumni-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--accent-color), var(--success-color));
}

.alumni-card:hover {
    transform: translateY(-16px) scale(1.02);
    box-shadow: 0 25px 60px rgba(0,0,0,0.15);
}

.card-image {
    height: 280px;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.alumni-card:hover .card-image {
    transform: scale(1.05);
}

.card-image-placeholder {
    height: 280px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

.card-image-placeholder::before {
    content: '👨‍🎓';
    font-size: 4rem;
    opacity: 0.1;
}

.card-image-placeholder i {
    font-size: 4rem;
    color: var(--text-muted);
}

.card-content {
    padding: 2rem;
}

.alumni-name {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
    line-height: 1.3;
}

.angkatan-badge {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    padding: 0.5rem 1.25rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.9rem;
    display: inline-block;
    margin-bottom: 1rem;
}

.job-title {
    color: var(--accent-color);
    font-weight: 600;
    font-size: 1rem;
    margin-bottom: 0.25rem;
}

.job-icon {
    color: var(--accent-color);
    margin-right: 0.5rem;
}

.pagination-custom .page-link {
    border: none;
    color: var(--primary-color);
    font-weight: 500;
    padding: 0.75rem 1.25rem;
    margin: 0 0.25rem;
    border-radius: 12px;
    background: white;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
}

.pagination-custom .page-item.active .page-link {
    background: linear-gradient(135deg, var(--accent-color), #16a085);
    color: white;
    box-shadow: 0 8px 25px rgba(26, 188, 156, 0.4);
}

.pagination-custom .page-link:hover {
    background: var(--light-bg);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.empty-state {
    min-height: 400px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: var(--text-muted);
}

.empty-state i {
    font-size: 6rem;
    margin-bottom: 1.5rem;
    opacity: 0.5;
}

/* Responsive */
@media (max-width: 768px) {
    .hero-section {
        padding: 40px 0;
        margin-bottom: 2rem;
    }
    
    .alumni-grid {
        --gap: 1rem;
    }
    
    .card-content {
        padding: 1.5rem;
    }
}

@media (max-width: 576px) {
    .hero-subtitle {
        font-size: 1.1rem;
    }
    
    .alumni-stats {
        padding: 1.5rem;
    }
    
    .stat-number {
        font-size: 2rem;
    }
}
</style>
@endsection


