@extends('Layouts-Admin.app')
@section('title', 'Edit Alumni - {{ $alumni->nama_alumni }}')

@section('content')
<div class="d-flex align-items-center mb-4">
    <i class="fas fa-arrow-left me-3 text-muted fs-4" onclick="history.back()" style="cursor:pointer;"></i>
    <h2 class="h3 mb-0">
        <i class="fas fa-edit text-warning me-2"></i>
        Edit Alumni
    </h2>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('admin.alumni.update', $alumni->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold">Nama Alumni <span class="text-danger">*</span></label>
                            <input type="text" name="nama_alumni" class="form-control @error('nama_alumni') is-invalid @enderror" 
                                   value="{{ old('nama_alumni', $alumni->nama_alumni) }}" required>
                            @error('nama_alumni') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Angkatan <span class="text-danger">*</span></label>
                            <input type="text" name="angkatan" class="form-control @error('angkatan') is-invalid @enderror" 
                                   value="{{ old('angkatan', $alumni->angkatan) }}" required>
                            @error('angkatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Pekerjaan Saat Ini</label>
                            <input type="text" name="pekerjaan_sekarang" class="form-control @error('pekerjaan_sekarang') is-invalid @enderror" 
                                   value="{{ old('pekerjaan_sekarang', $alumni->pekerjaan_sekarang) }}">
                            @error('pekerjaan_sekarang') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    {{-- Foto Current --}}
                    @if($alumni->foto)
                    <div class="mb-4">
                        <label class="form-label fw-semibold mb-2 d-block">Foto Saat Ini</label>
                        <img src="{{ Storage::url($alumni->foto) }}" class="img-fluid rounded shadow-sm mb-2" style="max-height: 150px; object-fit: cover;">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="hapus_foto" id="hapus_foto" value="1">
                            <label class="form-check-label small text-danger" for="hapus_foto">
                                Hapus foto ini
                            </label>
                        </div>
                    </div>
                    @endif
                    
                    {{-- Upload New --}}
                    <label class="form-label fw-semibold">Foto Baru (Opsional)</label>
                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                    <div class="form-text">Maksimal 4MB, format JPG/PNG/WebP</div>
                    @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="d-flex justify-content-end gap-3">
                <a href="{{ route('admin.alumni.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times me-2"></i>Batal
                </a>
                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-save me-2"></i>Update Alumni
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

