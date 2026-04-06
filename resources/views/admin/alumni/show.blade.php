@extends('Layouts-Admin.app')
@section('title', 'Detail Alumni - {{ $alumni->nama_alumni }}')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <i class="fas fa-arrow-left text-muted me-3 fs-4" onclick="history.back()" style="cursor:pointer;"></i>
        <a href="{{ route('admin.alumni.index') }}" class="btn btn-outline-primary">
            <i class="fas fa-list me-1"></i>Daftar Alumni
        </a>
    </div>
    <div class="btn-group">
        <a href="{{ route('admin.alumni.edit', $alumni->id) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Edit
        </a>
        <button class="btn btn-danger" onclick="deleteAlumni({{ $alumni->id }})">
            <i class="fas fa-trash"></i> Hapus
        </button>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm text-center">
            <div class="card-body py-5">
                @if($alumni->foto)
                    <img src="{{ Storage::url($alumni->foto) }}" class="rounded-circle mx-auto d-block mb-4 shadow-lg" style="width: 180px; height: 180px; object-fit: cover;">
                @else
                    <div class="bg-gradient rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center shadow-lg" style="width: 180px; height: 180px;">
                        <i class="fas fa-user-graduate fa-4x text-white"></i>
                    </div>
                @endif
                <h4 class="mb-1">{{ $alumni->nama_alumni }}</h4>
                <p class="text-primary fw-semibold mb-3">Angkatan {{ $alumni->angkatan }}</p>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-primary text-white py-4">
                <h4 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>Informasi Lengkap
                </h4>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="fw-semibold text-muted mb-2">Nama Lengkap</label>
                        <h5 class="text-dark">{{ $alumni->nama_alumni }}</h5>
                    </div>
                    <div class="col-md-6">
                        <label class="fw-semibold text-muted mb-2">Angkatan</label>
                        <span class="badge bg-info fs-6 px-4 py-2">{{ $alumni->angkatan }}</span>
                    </div>
                    <div class="col-12">
                        <label class="fw-semibold text-muted mb-2">Pekerjaan Saat Ini</label>
                        <h6 class="text-success">
                            <i class="fas fa-briefcase me-2"></i>
                            {{ $alumni->pekerjaan_sekarang ?: 'Belum diisi' }}
                        </h6>
                    </div>
                    <div class="col-md-6">
                        <label class="fw-semibold text-muted mb-2">Dibuat</label>
                        <p class="mb-0">
                            <i class="far fa-calendar-alt me-2 text-muted"></i>
                            {{ $alumni->created_at->format('d M Y') }}
                        </p>
                        <small class="text-muted">{{ $alumni->created_at->diffForHumans() }}</small>
                    </div>
                    <div class="col-md-6">
                        <label class="fw-semibold text-muted mb-2">Diperbarui</label>
                        <p class="mb-0">
                            <i class="fas fa-sync-alt me-2 text-muted"></i>
                            {{ $alumni->updated_at->format('d M Y H:i') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Delete Modal --}}
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle me-2"></i>Konfirmasi Hapus
                </h5>
            </div>
            <div class="modal-body text-center">
                <div class="mb-3">
                    <img src="{{ Storage::url($alumni->foto) }}" class="rounded-circle mx-auto d-block shadow" style="width: 100px; height: 100px; object-fit: cover;" alt="{{ $alumni->nama_alumni }}">
                </div>
                <h6>Hapus alumni <strong>"{{ $alumni->nama_alumni }}"</strong>?</h6>
                <p class="text-muted">Foto dan data akan terhapus permanen.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form method="POST" action="{{ route('admin.alumni.destroy', $alumni->id) }}" style="display:inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function deleteAlumni(id) {
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}
</script>
@endsection

