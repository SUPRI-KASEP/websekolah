@extends('Layouts-Admin.app')
@section('title', 'Kelola Jurusan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 mb-0">
        <i class="fas fa-graduation-cap text-primary me-2"></i>
        Kelola Jurusan
    </h2>
    <a href="{{ route('admin.jurusan.create') }}" class="btn btn-primary btn-lg">
        <i class="fas fa-plus me-2"></i>Tambah Jurusan Baru
    </a>
</div>

{{-- Filter & Search --}}
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.jurusan.index') }}">
            <div class="row g-3">
                <div class="col-md-5">
                    <input type="text" name="search" class="form-control" placeholder="Cari kode, nama, atau ketua jurusan..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">Semua Status</option>
                        <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ request('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-outline-primary flex-fill">
                            <i class="fas fa-search me-1"></i>Cari
                        </button>
                        <a href="{{ route('admin.jurusan.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-redo me-1"></i>Reset
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Data Table --}}
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-0 py-3">
        <div class="row align-items-center">
            <div class="col">
                <span class="badge bg-light text-dark fs-6 px-3 py-2">
                    <i class="fas fa-list me-1"></i>Total: {{ $jurusans->total() }}
                </span>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light sticky-top">
                    <tr>
                        <th width="60">#</th>
                        <th width="80">Kode</th>
                        <th>Nama Jurusan</th>
                        <th>Ketua</th>
                        <th>Status</th>
                        <th width="200">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jurusans as $index => $jurusan)
                    <tr>
                        <td>{{ $jurusans->firstItem() + $index }}</td>
                        <td>
                            <span class="badge bg-primary">{{ $jurusan->kode_jurusan }}</span>
                        </td>
                        <td>
                            <strong>{{ $jurusan->nama_jurusan }}</strong>
                            @if($jurusan->logo)
                            <br><small class="text-muted">
                                <i class="fas fa-image me-1"></i>Logo OK
                            </small>
                            @endif
                        </td>
                        <td>
                            {{ $jurusan->ketua_jurusan ?: '-' }}
                        </td>
                        <td>
                            <span class="badge bg-{{ $jurusan->status == 'aktif' ? 'success' : 'warning' }}">
                                {{ ucfirst($jurusan->status) }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('admin.jurusan.show', $jurusan->id) }}" class="btn btn-outline-primary" title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.jurusan.edit', $jurusan->id) }}" class="btn btn-outline-warning" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-outline-danger" onclick="confirmDelete({{ $jurusan->id }}, '{{ $jurusan->nama_jurusan }}')" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <i class="fas fa-inbox fa-3x text-muted mb-3 d-block"></i>
                            <h5 class="text-muted">Belum ada data jurusan</h5>
                            <p class="text-muted mb-0">Klik "Tambah Jurusan Baru" untuk memulai.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Pagination --}}
    @if($jurusans->hasPages())
    <div class="card-footer bg-white border-0 py-3">
        {{ $jurusans->appends(request()->query())->links() }}
    </div>
    @endif
</div>

{{-- Delete Confirmation Modal --}}
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle me-2"></i>Konfirmasi Hapus
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center py-4">
                <i class="fas fa-trash-alt fa-3x text-danger mb-3"></i>
                <h5>Apakah Anda yakin?</h5>
                <p class="text-muted mb-0" id="deleteItemName"></p>
                <small class="text-danger">Data tidak dapat dikembalikan setelah dihapus!</small>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete(id, name) {
    document.getElementById('deleteItemName').textContent = name;
    document.getElementById('deleteForm').action = `/admin/jurusan/${id}`;
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}
</script>
@endsection

