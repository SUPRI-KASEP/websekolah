@extends('Layouts-Admin.app')
@section('title', 'Kelola Alumni')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 mb-0">
        <i class="fas fa-user-graduate text-primary me-2"></i>
        Kelola Alumni
    </h2>
    <a href="{{ route('admin.alumni.create') }}" class="btn btn-primary btn-lg">
        <i class="fas fa-plus me-2"></i>Tambah Alumni
    </a>
</div>

{{-- Filter --}}
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.alumni.index') }}">
            <div class="row g-3">
                <div class="col-md-8">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama alumni, angkatan, atau pekerjaan..." value="{{ request('search') }}">
                </div>
                <div class="col-md-4">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-outline-primary">
                            <i class="fas fa-search"></i>
                        </button>
                        <a href="{{ route('admin.alumni.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-redo"></i>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Table --}}
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-0 py-3">
        <span class="badge bg-light text-dark fs-6 px-3 py-2">
            Total: {{ $alumnis->total() }}
        </span>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th width="60">#</th>
                    <th width="70">Foto</th>
                    <th>Nama Alumni</th>
                    <th>Angkatan</th>
                    <th>Pekerjaan</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($alumnis as $index => $alumni)
                <tr>
                    <td>{{ $alumnis->firstItem() + $index }}</td>
                    <td>
                        @if($alumni->foto)
                        <img src="{{ Storage::url($alumni->foto) }}" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;" alt="{{ $alumni->nama_alumni }}">
                        @else
                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="fas fa-user text-muted"></i>
                        </div>
                        @endif
                    </td>
                    <td>
                        <strong>{{ $alumni->nama_alumni }}</strong>
                    </td>
                    <td>
                        <span class="badge bg-info">{{ $alumni->angkatan }}</span>
                    </td>
                    <td>{{ $alumni->pekerjaan_sekarang ?: '-' }}</td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <a href="{{ route('admin.alumni.show', $alumni) }}" class="btn btn-outline-primary">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.alumni.edit', $alumni) }}" class="btn btn-outline-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.alumni.destroy', $alumni) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus {{ $alumni->nama_alumni }}?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger border-0 p-0">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5">
                        <i class="fas fa-users fa-3x text-muted mb-3"></i>
                        <h5>Belum ada data alumni</h5>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($alumnis->hasPages())
    <div class="card-footer">
        {{ $alumnis->appends(request()->query())->links() }}
    </div>
    @endif
</div>
@endsection

