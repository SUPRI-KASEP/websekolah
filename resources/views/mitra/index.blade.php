@extends('layouts.app')
@section('title', 'Mitra - SMK YPC')

@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col">
            <h1 class="fw-bold text-dark mb-1">Mitra Sekolah</h1>
            <p class="text-muted">Kerjasama dengan mitra terpercaya</p>
        </div>
    </div>

    <div class="row g-4">
        @forelse($mitras as $item)
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card h-100 shadow-sm border-0 hover-lift">
                @if($item->logo_url)
                <img src="{{ $item->logo_url }}" class="card-img-top img-fluid" style="height: 220px; object-fit: contain; background: white;" alt="{{ $item->nama_mitra }}">
                @else
                <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 220px;">
                    <i class="fas fa-handshake fa-3x text-muted"></i>
                </div>
                @endif

                <div class="card-body">
                    <h6 class="card-title fw-bold mb-2">{{ $item->nama_mitra }}</h6>
                    <p class="card-text text-muted small mb-0">{{ Str::limit($item->deskripsi, 100) }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="text-center py-5">
                <i class="fas fa-handshake fa-5x text-muted mb-4"></i>
                <h3 class="text-muted">Belum ada data mitra</h3>
            </div>
        </div>
        @endforelse
    </div>

    @if($mitras->hasPages())
    <nav class="mt-5">
        {{ $mitras->links() }}
    </nav>
    @endif
</div>
@endsection

