@extends('Layouts-Admin.app')
@section('title', 'Edit Mitra - {{ $mitra->nama_mitra }}')

@section('content')
<div class="d-flex align-items-center mb-4">
    <i class="fas fa-arrow-left me-3 text-muted fs-4" onclick="history.back()" style="cursor:pointer;"></i>
    <h2 class="h3 mb-0">
        <i class="fas fa-edit text-warning me-2"></i>
        Edit Mitra
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
        <form action="{{ route('admin.mitra.update', $mitra->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold">Nama Mitra <span class="text-danger">*</span></label>
                            <input type="text" name="nama_mitra" class="form-control @error('nama_mitra') is-invalid @enderror" 
                                   value="{{ old('nama_mitra', $mitra->nama_mitra) }}" required>
                            @error('nama_mitra') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Deskripsi <span class="text-danger">*</span></label>
                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4" required>{{ old('deskripsi', $mitra->deskripsi) }}</textarea>
                            @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    {{-- Logo Current --}}
                    @if($mitra->logo)
                    <div class="mb-4">
                        <label class="form-label fw-semibold mb-2 d-block">Logo Saat Ini</label>
                        <img src="{{ Storage::url('mitra/' . $mitra->logo) }}" class="img-fluid rounded shadow-sm mb-2" style="max-height: 150px; object-fit: cover;">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="hapus_logo" id="hapus_logo" value="1">
                            <label class="form-check-label small text-danger" for="hapus_logo">
                                Hapus logo ini
                            </label>
                        </div>
                    </div>
                    @endif
                    
                    {{-- Upload New --}}
                    <label class="form-label fw-semibold">Logo Baru (Opsional)</label>
                    <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" accept="image/*">
                    <div class="form-text">Maksimal 4MB, format JPG/PNG/WebP</div>
                    @error('logo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="d-flex justify-content-end gap-3">
                <a href="{{ route('admin.mitra.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times me-2"></i>Batal
                </a>
                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-save me-2"></i>Update Mitra
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

