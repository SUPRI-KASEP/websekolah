@extends('Layouts-Admin.app')
@section('title', 'Edit Jurusan - {{ $jurusan->nama_jurusan }}')

@section('content')
<div class="d-flex align-items-center mb-4">
    <i class="fas fa-arrow-left me-3 text-muted fs-4" onclick="history.back()" style="cursor:pointer;"></i>
    <h2 class="h3 mb-0">
        <i class="fas fa-edit text-warning me-2"></i>
        Edit Jurusan: {{ $jurusan->nama_jurusan }}
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
        <form action="{{ route('admin.jurusan.update', $jurusan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold">Kode Jurusan <span class="text-danger">*</span></label>
                            <input type="text" name="kode_jurusan" class="form-control @error('kode_jurusan') is-invalid @enderror" 
                                   value="{{ old('kode_jurusan', $jurusan->kode_jurusan) }}" maxlength="10" required>
                            @error('kode_jurusan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Nama Jurusan <span class="text-danger">*</span></label>
                            <input type="text" name="nama_jurusan" class="form-control @error('nama_jurusan') is-invalid @enderror" 
                                   value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}" required>
                            @error('nama_jurusan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Ketua Jurusan</label>
                            <input type="text" name="ketua_jurusan" class="form-control @error('ketua_jurusan') is-invalid @enderror" 
                                   value="{{ old('ketua_jurusan', $jurusan->ketua_jurusan) }}">
                            @error('ketua_jurusan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                <option value="">Pilih Status</option>
                                <option value="aktif" {{ old('status', $jurusan->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="nonaktif" {{ old('status', $jurusan->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
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
                                      rows="4">{{ old('deskripsi', $jurusan->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Logo --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Logo Saat Ini</label>
                            @if($jurusan->logo)
                            <div class="mb-2">
                                <img src="{{ Storage::url($jurusan->logo) }}" class="img-thumbnail img-fluid" style="max-height: 100px;" alt="Logo">
                                <label class="form-check form-switch d-block mt-2">
                                    <input class="form-check-input" type="checkbox" name="hapus_logo" value="1">
                                    <span class="form-check-label small text-danger">Hapus Logo</span>
                                </label>
                            </div>
                            @else
                            <p class="text-muted small">Tidak ada logo</p>
                            @endif
                            <label class="form-label mt-2 fw-semibold small">Ganti Logo</label>
                            <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" accept="image/*">
                            <div class="form-text">Maksimal 2MB (JPG, PNG, SVG, WebP)</div>
                        </div>

                        {{-- Foto --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Foto Saat Ini</label>
                            @if($jurusan->foto)
                            <div class="mb-2">
                                <img src="{{ Storage::url($jurusan->foto) }}" class="img-thumbnail img-fluid" style="max-height: 100px;" alt="Foto">
                                <label class="form-check form-switch d-block mt-2">
                                    <input class="form-check-input" type="checkbox" name="hapus_foto" value="1">
                                    <span class="form-check-label small text-danger">Hapus Foto</span>
                                </label>
                            </div>
                            @else
                            <p class="text-muted small">Tidak ada foto</p>
                            @endif
                            <label class="form-label mt-2 fw-semibold small">Ganti Foto</label>
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                            <div class="form-text">Maksimal 4MB (JPG, PNG, SVG, WebP)</div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-end gap-3 pt-2">
                <a href="{{ route('admin.jurusan.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times me-2"></i>Batal
                </a>
                <button type="submit" class="btn btn-warning px-4">
                    <i class="fas fa-save me-2"></i>Update Jurusan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

