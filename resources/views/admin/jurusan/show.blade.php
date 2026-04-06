@extends('Layouts-Admin.app')
@section('title', 'Detail Jurusan - {{ $jurusan->nama_jurusan }}')

@section('content')
<div class="d-flex align-items-center mb-4">
    <div>
        <i class="fas fa-arrow-left me-3 text-muted fs-4" onclick="history.back()" style="cursor:pointer;"></i>
        <a href="{{ route('admin.jurusan.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-list me-1"></i>Kembali ke Daftar
        </a>
    </div>
    <div class="ms-auto">
        <a href="{{ route('admin.jurusan.edit', $jurusan->id) }}" class="btn btn-warning me-2">
            <i class="fas fa-edit me-1"></i>Edit
        </a>
        <button class="btn btn-danger" onclick="confirmDelete({{ $jurusan->id }})">
            <i class="fas fa-trash me-1"></i>Hapus
        </button>
    </div>
</div>

<div class="row g-4">
    {{-- Main Info --}}
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-primary text-white py-3">
                <h4 class="mb-0 fw-bold">
                    <i class="fas fa-info-circle me-2"></i>
                    Informasi Jurusan
                </h4>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="fw-semibold text-muted mb-2 d-block">Kode Jurusan</label>
                        <h5 class="fw-bold text-primary">{{ $jurusan->kode_jurusan }}</h5>
                    </div>
                    <div class="col-md-6">
                        <label class="fw-semibold text-muted mb-2 d-block">Status</label>
                        <span class="badge fs-6 px-3 py-2 bg-{{ $jurusan->status == 'aktif' ? 'success' : 'warning' }}">
                            {{ ucfirst($jurusan->status) }}
                        </span>
                    </div>
                    <div class="col-12">
                        <label class="fw-semibold text-muted mb-2 d-block">Nama Jurusan</label>
                        <h4 class="fw-bold text-dark">{{ $jurusan->nama_jurusan }}</h4>
                    </div>
                    <div class="col-md-6">
                        <label class="fw-semibold text-muted mb-2 d-block">Ketua Jurusan</label>
                        <p class="mb-0">{{ $jurusan->ketua_jurusan ?: '<i>Tidak diisi</i>' }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="fw-semibold text-muted mb-2 d-block">Dibuat</label>
                        <p class="mb-0">
                            <i class="fas fa-calendar me-1 text-muted"></i>
                            {{ $jurusan->created_at->format('d M Y H:i') }}
                        </p>
                    </div>
                    @if($jurusan->deskripsi)
                    <div class="col-12">
                        <label class="fw-semibold text-muted mb-3 d-block">Deskripsi</label>
                        <div class="bg-light p-3 rounded">
                            {!! nl2br(e($jurusan->deskripsi)) !!}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Images --}}
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-success text-white py-3">
                <h5 class="mb-0 fw-bold">
                    <i class="fas fa-images me-2"></i>Logo Jurusan
                </h5>
            </div>
            <div class="card-body text-center p-4">
                @if($jurusan->logo)
                    <img src="{{ Storage::url($jurusan->logo) }}" class="img-fluid rounded mb-3 shadow-sm" style="max-height: 200px; object-fit: contain;" alt="Logo {{ $jurusan->nama_jurusan }}">
                    <p class="text-muted small mb-0">File: {{ basename(Storage::url($jurusan->logo)) }}</p>
                @else
                    <div class="bg-light rounded p-5 mb-3 d-flex align-items-center justify-content-center">
                        <i class="fas fa-image fa-4x text-muted"></i>
                    </div>
                    <p class="text-muted">Belum ada logo</p>
                @endif
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-info text-white py-3">
                <h5 class="mb-0 fw-bold">
                    <i class="fas fa-image me-2"></i>Foto Jurusan
                </h5>
            </div>
            <div class="card-body text-center p-4">
                @if($jurusan->foto)
                    <img src="{{ Storage::url($jurusan->foto) }}" class="img-fluid rounded shadow-sm" style="max-height: 250px; object-fit: cover;" alt="Foto {{ $jurusan->nama_jurusan }}">
                    <p class="text-muted small mt-2 mb-0">File: {{ basename(Storage::url($jurusan->foto)) }}</p>
                @else
                    <div class="bg-light rounded p-5 mb-3">
                        <i class="fas fa-image fa-4x text-muted"></i>
                    </div>
                    <p class="text-muted">Belum ada foto</p>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- Delete Confirmation --}}
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle me-2"></i>Hapus Jurusan
                </h5>
            </div>
            <div class="modal-body text-center">
                <i class="fas fa-trash fa-3x text-danger mb-3"></i>
                <h6>Apakah Anda yakin ingin menghapus jurusan ini?</h6>
                <p class="text-muted">Jurusan "{{ $jurusan->nama_jurusan }}" dan semua file terkait akan terhapus permanen.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="{{ route('admin.jurusan.destroy', $jurusan->id) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus Permanen</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete(id) {
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}
</script>
@endsection

