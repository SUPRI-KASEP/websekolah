@extends('Layouts-Admin.app')
@section('title', 'Tambah Alumni')

@section('content')
<div class="d-flex align-items-center mb-4">
    <i class="fas fa-arrow-left me-3 text-muted fs-4" onclick="history.back()" style="cursor:pointer;"></i>
    <h2 class="h3 mb-0">
        <i class="fas fa-plus-circle text-success me-2"></i>
        Tambah Alumni
    </h2>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Silakan perbaiki kesalahan berikut:</strong>
    <ul class="mb-0 mt-2">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('admin.alumni.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold">Nama Alumni <span class="text-danger">*</span></label>
                            <input type="text" name="nama_alumni" class="form-control @error('nama_alumni') is-invalid @enderror" value="{{ old('nama_alumni') }}" required>
                            @error('nama_alumni') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Angkatan <span class="text-danger">*</span></label>
                            <input type="text" name="angkatan" class="form-control @error('angkatan') is-invalid @enderror" value="{{ old('angkatan') }}" required placeholder="Contoh: 2018">
                            @error('angkatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Pekerjaan Saat Ini</label>
                            <input type="text" name="pekerjaan_sekarang" class="form-control @error('pekerjaan_sekarang') is-invalid @enderror" value="{{ old('pekerjaan_sekarang') }}" placeholder="PT. ABC">
                            @error('pekerjaan_sekarang') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <label class="form-label fw-semibold">Foto Alumni</label>
                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                    <div class="form-text">Ukuran ideal 300x300px, maks 4MB</div>
                    @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    <div class="mt-3 p-3 bg-light rounded">
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>Foto akan disimpan di storage/public/alumni
                        </small>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="d-flex justify-content-end gap-3">
                <a href="{{ route('admin.alumni.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times me-2"></i>Batal
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save me-2"></i>Simpan Alumni
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

