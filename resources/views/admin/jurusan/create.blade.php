@extends('Layouts-Admin.app')
@section('title', 'Tambah Jurusan Baru')

@section('content')
<div class="d-flex align-items-center mb-4">
    <i class="fas fa-arrow-left me-3 text-muted fs-4" onclick="history.back()" style="cursor:pointer;"></i>
    <h2 class="h3 mb-0">
        <i class="fas fa-plus-circle text-success me-2"></i>
        Tambah Jurusan Baru
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

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('admin.jurusan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold">Kode Jurusan <span class="text-danger">*</span></label>
                            <input type="text" name="kode_jurusan" class="form-control @error('kode_jurusan') is-invalid @enderror" 
                                   value="{{ old('kode_jurusan') }}" maxlength="10" required 
                                   placeholder="Contoh: TKJ, TKR, TAV">
                            @error('kode_jurusan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Nama Jurusan <span class="text-danger">*</span></label>
                            <input type="text" name="nama_jurusan" class="form-control @error('nama_jurusan') is-invalid @enderror" 
                                   value="{{ old('nama_jurusan') }}" required placeholder="Teknik Komputer dan Jaringan">
                            @error('nama_jurusan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Ketua Jurusan</label>
                            <input type="text" name="ketua_jurusan" class="form-control @error('ketua_jurusan') is-invalid @enderror" 
                                   value="{{ old('ketua_jurusan') }}" placeholder="Nama Ketua Jurusan">
                            @error('ketua_jurusan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                <option value="">Pilih Status</option>
                                <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" 
                                      rows="4" placeholder="Deskripsi singkat tentang jurusan...">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Logo Jurusan</label>
                            <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" accept="image/*">
                            <div class="form-text">Maksimal 2MB (JPG, PNG, SVG, WebP)</div>
                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Foto Jurusan</label>
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                            <div class="form-text">Maksimal 4MB (JPG, PNG, SVG, WebP). Foto banner jurusan.</div>
                            @error('foto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-end gap-3 pt-2">
                <a href="{{ route('admin.jurusan.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Batal
                </a>
                <button type="submit" class="btn btn-success px-4">
                    <i class="fas fa-save me-2"></i>Simpan Jurusan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

