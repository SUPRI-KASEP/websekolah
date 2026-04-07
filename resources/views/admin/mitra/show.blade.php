@extends('Layouts-Admin.app')
@section('title', 'Detail Mitra - {{ $mitra->nama_mitra }}')

@section('content')
<div class="d-flex align-items-center mb-4">
    <a href="{{ route('admin.mitra.index') }}" class="btn btn-outline-secondary me-3">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
    <h2 class="h3 mb-0">
        <i class="fas fa-handshake text-primary me-2"></i>
        Detail Mitra
    </h2>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-3">{{ $mitra->nama_mitra }}</h5>
                <div class="mb-3">
                    <label class="fw-semibold text-muted small mb-1 d-block">Deskripsi:</label>
                    <p class="lead">{{ $mitra->deskripsi }}</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.mitra.edit', $mitra) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('admin.mitra.destroy', $mitra) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus {{ $mitra->nama_mitra }}?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center">
                @if($mitra->logo)
                <img src="{{ Storage::url('mitra/' . $mitra->logo) }}" class="img-fluid rounded shadow mb-3" style="max-height: 250px; object-fit: cover;">
                <p class="text-muted small">Logo Mitra</p>
                @else
                <div class="bg-light rounded p-4 mb-3">
                    <i class="fas fa-handshake fa-4x text-muted"></i>
                </div>
                <p class="text-muted small">Tidak ada logo</p>
                @endif
                <hr>
                <div class="row text-start">
                    <div class="col-6">
                        <small class="text-muted">ID:</small>
                        <div class="fw-bold">#{{ $mitra->id }}</div>
                    </div>
                    <div class="col-6">
                        <small class="text-muted">Dibuat:</small>
                        <div>{{ $mitra->created_at->format('d/m/Y H:i') }}</div>
                    </div>
                    <div class="col-6">
                        <small class="text-muted">Diupdate:</small>
                        <div>{{ $mitra->updated_at->format('d/m/Y H:i') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

