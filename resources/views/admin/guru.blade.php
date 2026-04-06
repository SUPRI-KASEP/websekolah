@extends('Layouts-Admin.app')

@section('title', 'Manajemen Guru')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">
        <i class="fas fa-chalkboard-teacher me-2 text-primary"></i>
        Data Guru
    </h2>
    <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#createGuruModal">
        <i class="fas fa-plus me-2"></i>Tambah Guru Baru
    </button>
</div>

{{-- Alert Messages --}}
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

{{-- Guru Table --}}
<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="60px">#</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Matpel</th>
                        <th>No. HP</th>
                        <th>Email</th>
                        <th>Profil Singkat</th>
                        <th width="120px" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($gurus as $index => $guru)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($guru->foto)
                                <img src="{{ asset('assets/' . $guru->foto) }}" alt="{{ $guru->nama }}" 
                                     class="rounded shadow-sm" style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                     style="width: 50px; height: 50px;">
                                    <i class="fas fa-user text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <strong>{{ $guru->nama }}</strong>
                        </td>
                        <td>
                            <span class="badge bg-info">{{ $guru->matpel }}</span>
                        </td>
                        <td>{{ $guru->no_hp ?? '-' }}</td>
                        <td>{{ $guru->email ?? '-' }}</td>
                        <td class="text-truncate" style="max-width: 200px;" title="{{ $guru->profil_singkat }}">
                            {{ Str::limit($guru->profil_singkat ?? '-', 50) }}
                        </td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-primary me-1" 
                                    data-bs-toggle="modal" data-bs-target="#editGuruModal{{ $guru->id }}"
                                    title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form action="{{ route('admin.guru.destroy', $guru->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus guru {{ $guru->nama }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-4 text-muted">
                            <i class="fas fa-chalkboard-teacher fa-3x mb-3 opacity-50"></i>
                            <p>Belum ada data guru</p>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createGuruModal">
                                Tambah guru pertama
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Create Guru Modal --}}
<div class="modal fade" id="createGuruModal" tabindex="-1" aria-labelledby="createGuruModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createGuruModalLabel">
                    <i class="fas fa-plus me-2"></i>Tambah Guru Baru
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.guru.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                                   id="nama" name="nama" value="{{ old('nama') }}" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="matpel" class="form-label">Mata Pelajaran <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('matpel') is-invalid @enderror" 
                                   id="matpel" name="matpel" value="{{ old('matpel') }}" required>
                            @error('matpel')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="no_hp" class="form-label">No. HP</label>
                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" 
                                   id="no_hp" name="no_hp" value="{{ old('no_hp') }}">
                            @error('no_hp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="foto" class="form-label">Foto Profil</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" 
                                   id="foto" name="foto" accept="image/*">
                            <div class="form-text">Ukuran maksimal 2MB. Format: JPG, PNG, GIF, SVG</div>
                            @error('foto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="profil_singkat" class="form-label">Profil Singkat</label>
                            <textarea class="form-control @error('profil_singkat') is-invalid @enderror" 
                                      id="profil_singkat" name="profil_singkat" rows="4">{{ old('profil_singkat') }}</textarea>
                            @error('profil_singkat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Edit Guru Modals --}}
@foreach($gurus as $guru)
<div class="modal fade" id="editGuruModal{{ $guru->id }}" tabindex="-1" aria-labelledby="editGuruModalLabel{{ $guru->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editGuruModalLabel{{ $guru->id }}">
                    <i class="fas fa-edit me-2"></i>Edit Guru: {{ $guru->nama }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama_{{ $guru->id }}" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" 
                                   id="nama_{{ $guru->id }}" name="nama" value="{{ $guru->nama }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="matpel_{{ $guru->id }}" class="form-label">Mata Pelajaran <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" 
                                   id="matpel_{{ $guru->id }}" name="matpel" value="{{ $guru->matpel }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="no_hp_{{ $guru->id }}" class="form-label">No. HP</label>
                            <input type="text" class="form-control" 
                                   id="no_hp_{{ $guru->id }}" name="no_hp" value="{{ $guru->no_hp }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email_{{ $guru->id }}" class="form-label">Email</label>
                            <input type="email" class="form-control" 
                                   id="email_{{ $guru->id }}" name="email" value="{{ $guru->email }}">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="foto_{{ $guru->id }}" class="form-label">Foto Profil</label>
                            @if($guru->foto)
                            <div class="mb-2">
                                <img src="{{ asset('assets/' . $guru->foto) }}" alt="{{ $guru->nama }}" 
                                     class="rounded shadow-sm me-2" style="width: 80px; height: 80px; object-fit: cover;">
                            </div>
                            @endif
                            <input type="file" class="form-control" 
                                   id="foto_{{ $guru->id }}" name="foto" accept="image/*">
                            <div class="form-text">Kosongkan untuk mempertahankan foto lama. Ukuran maksimal 2MB.</div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="profil_singkat_{{ $guru->id }}" class="form-label">Profil Singkat</label>
                            <textarea class="form-control" 
                                      id="profil_singkat_{{ $guru->id }}" name="profil_singkat" rows="4">{{ $guru->profil_singkat }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Guru
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection
