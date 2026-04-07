@extends('Layouts-Admin.app')
@section('title', 'Kelola Mitra')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 mb-0">
        <i class="fas fa-handshake text-primary me-2"></i>
        Kelola Mitra
    </h2>
    <a href="{{ route('admin.mitra.create') }}" class="btn btn-primary btn-lg">
        <i class="fas fa-plus me-2"></i>Tambah Mitra
    </a>
</div>

{{-- Filter --}}
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.mitra.index') }}">
            <div class="row g-3">
                <div class="col-md-8">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama mitra atau deskripsi..." value="{{ request('search') }}">
                </div>
                <div class="col-md-4">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-outline-primary">
                            <i class="fas fa-search"></i>
                        </button>
                        <a href="{{ route('admin.mitra.index') }}" class="btn btn-outline-secondary">
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
            Total: {{ $mitras->total() }}
        </span>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th width="60">#</th>
                    <th width="70">Logo</th>
                    <th>Nama Mitra</th>
                    <th>Deskripsi</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mitras as $index => $mitra)
                <tr>
                    <td>{{ $mitras->firstItem() + $index }}</td>
                    <td>
                        @if($mitra->logo)
                        <img src="{{ Storage::url('mitra/' . $mitra->logo) }}" class="rounded" style="width: 40px; height: 40px; object-fit: cover;" alt="{{ $mitra->nama_mitra }}">
                        @else
                        <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="fas fa-handshake text-muted"></i>
                        </div>
                        @endif
                    </td>
                    <td>
                        <strong>{{ $mitra->nama_mitra }}</strong>
                    </td>
                    <td>{{ Str::limit($mitra->deskripsi, 50) }}</td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <a href="{{ route('admin.mitra.show', $mitra) }}" class="btn btn-outline-primary">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.mitra.edit', $mitra) }}" class="btn btn-outline-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.mitra.destroy', $mitra) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus {{ $mitra->nama_mitra }}?')">
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
                    <td colspan="5" class="text-center py-5">
                        <i class="fas fa-handshake fa-3x text-muted mb-3"></i>
                        <h5>Belum ada data mitra</h5>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($mitras->hasPages())
    <div class="card-footer">
        {{ $mitras->appends(request()->query())->links() }}
    </div>
    @endif
</div>
@endsection

