@extends('Layouts-Admin.app')
@section('title', 'Kelola Profil')
@section('content')

<div class="container-fluid">
    <!-- Alert Messages -->
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

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Kelola Profil</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProfilModal">
            <i class="fas fa-plus"></i> Tambah Profil
        </button>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Menu</th>
                            <th>Judul</th>
                            <th>Urutan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($profils as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    @if ($item->gambar && $item->nama_menu == 'sambutan')
                                        <img src="{{ asset('assets/' . $item->gambar) }}" alt="{{ $item->judul }}" 
                                             style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                                    @else
                                        <div style="width: 60px; height: 60px; background: #ddd; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-image text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $item->nama_menu }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->urutan }}</td>
                                <td>
                                    @if ($item->status)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary">Nonaktif</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" 
                                       data-bs-target="#editProfilModal{{ $item->id }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <form action="{{ route('admin.profil.destroy', $item->id) }}" method="POST" 
                                        class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus profil ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editProfilModal{{ $item->id }}" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Profil</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="{{ route('admin.profil.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nama Menu</label>
                                                            <select name="nama_menu" class="form-select" id="editMenu{{ $item->id }}" required onchange="toggleEditFields{{ $item->id }}()">
                                                                <option value="">-- Pilih Menu --</option>
                                                                <option value="sambutan" {{ $item->nama_menu == 'sambutan' ? 'selected' : '' }}>Sambutan Kepala Sekolah</option>
                                                                <option value="visi-misi" {{ $item->nama_menu == 'visi-misi' ? 'selected' : '' }}>Visi & Misi</option>
                                                                <option value="sejarah" {{ $item->nama_menu == 'sejarah' ? 'selected' : '' }}>Sejarah</option>
                                                                <option value="struktur-organisasi" {{ $item->nama_menu == 'struktur-organisasi' ? 'selected' : '' }}>Struktur Organisasi</option>
                                                                <option value="tentang-kami" {{ $item->nama_menu == 'tentang-kami' ? 'selected' : '' }}>Tentang Kami</option>
                                                                <option value="kontak" {{ $item->nama_menu == 'kontak' ? 'selected' : '' }}>Kontak</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Judul</label>
                                                            <input type="text" name="judul" class="form-control" 
                                                                value="{{ $item->judul }}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Konten Biasa (untuk non-visi-misi dan non-sejarah) -->
                                                <div class="mb-3" id="editKontenContainer{{ $item->id }}" style="{{ in_array($item->nama_menu, ['visi-misi', 'sejarah']) ? 'display:none;' : '' }}">
                                                    <label class="form-label">Konten</label>
                                                    <textarea name="konten" class="form-control" rows="6">{{ $item->konten }}</textarea>
                                                </div>
                                                
                                                <!-- Visi dan Misi (khusus untuk visi-misi) -->
                                                <div id="editVisiMisiContainer{{ $item->id }}" style="{{ $item->nama_menu == 'visi-misi' ? '' : 'display:none;' }}">
                                                    <div class="mb-3">
                                                        <label class="form-label">Isi Visi</label>
                                                        <textarea name="isi_visi" class="form-control" rows="4" placeholder="Masukkan visi sekolah">{{ $item->isi_visi }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Isi Misi</label>
                                                        <textarea name="isi_misi" class="form-control" rows="4" placeholder="Masukkan misi sekolah">{{ $item->isi_misi }}</textarea>
                                                    </div>
                                                </div>
                                                
                                                <!-- Stats untuk Sejarah (khusus untuk sejarah) -->
                                                <div id="editSejarahStatsContainer{{ $item->id }}" style="{{ $item->nama_menu == 'sejarah' ? '' : 'display:none;' }}">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Tahun Berdiri</label>
                                                                <input type="number" name="tahun_berdiri" class="form-control" 
                                                                    value="{{ $item->tahun_berdiri }}" placeholder="2000" min="1900" max="2100">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Jumlah Siswa Tahun Ini</label>
                                                                <input type="number" name="jumlah_siswa" class="form-control" 
                                                                    value="{{ $item->jumlah_siswa }}" placeholder="500" min="0">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Lulusan Sukses</label>
                                                                <input type="number" name="lulusan_sukes" class="form-control" 
                                                                    value="{{ $item->lulusan_sukes }}" placeholder="1000" min="0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Urutan</label>
                                                            <input type="number" name="urutan" class="form-control" 
                                                                value="{{ $item->urutan }}" min="0">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Status</label>
                                                            <div class="form-check form-switch mt-2">
                                                                <input class="form-check-input" type="checkbox" name="status" 
                                                                    id="status{{ $item->id }}" {{ $item->status ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="status{{ $item->id }}">Aktif</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Gambar - hanya untuk sambut -->
                                                <div class="mb-3" id="editImageContainer{{ $item->id }}" style="{{ $item->nama_menu == 'sambutan' ? '' : 'display:none;' }}">
                                                    <label class="form-label">Gambar (Foto Kepala Sekolah)</label>
                                                    @if ($item->gambar && $item->nama_menu == 'sambutan')
                                                        <div class="mb-2">
                                                            <img src="{{ asset('assets/' . $item->gambar) }}" alt="{{ $item->judul }}" 
                                                                 style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px;">
                                                        </div>
                                                    @endif
                                                    <input type="file" name="gambar" class="form-control" accept="image/*">
                                                    <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <script>
                                function toggleEditFields{{ $item->id }}() {
                                    var select = document.getElementById('editMenu{{ $item->id }}');
                                    var kontenContainer = document.getElementById('editKontenContainer{{ $item->id }}');
                                    var visiMisiContainer = document.getElementById('editVisiMisiContainer{{ $item->id }}');
                                    var sejarahStatsContainer = document.getElementById('editSejarahStatsContainer{{ $item->id }}');
                                    var imageContainer = document.getElementById('editImageContainer{{ $item->id }}');
                                    
                                    if (select.value === 'visi-misi') {
                                        kontenContainer.style.display = 'none';
                                        visiMisiContainer.style.display = 'block';
                                        sejarahStatsContainer.style.display = 'none';
                                        imageContainer.style.display = 'none';
                                    } else if (select.value === 'sejarah') {
                                        kontenContainer.style.display = 'block';
                                        visiMisiContainer.style.display = 'none';
                                        sejarahStatsContainer.style.display = 'block';
                                        imageContainer.style.display = 'none';
                                    } else if (select.value === 'sambutan') {
                                        kontenContainer.style.display = 'block';
                                        visiMisiContainer.style.display = 'none';
                                        sejarahStatsContainer.style.display = 'none';
                                        imageContainer.style.display = 'block';
                                    } else {
                                        kontenContainer.style.display = 'block';
                                        visiMisiContainer.style.display = 'none';
                                        sejarahStatsContainer.style.display = 'none';
                                        imageContainer.style.display = 'none';
                                    }
                                }
                            </script>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data profil</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Profil Modal -->
<div class="modal fade" id="addProfilModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Profil Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.profil.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nama Menu</label>
                                <select name="nama_menu" class="form-select" id="addMenu" required onchange="toggleAddFields()">
                                    <option value="">-- Pilih Menu --</option>
                                    <option value="sambutan">Sambutan Kepala Sekolah</option>
                                    <option value="visi-misi">Visi & Misi</option>
                                    <option value="sejarah">Sejarah</option>
                                    <option value="struktur-organisasi">Struktur Organisasi</option>
                                    <option value="tentang-kami">Tentang Kami</option>
                                    <option value="kontak">Kontak</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Judul</label>
                                <input type="text" name="judul" class="form-control" placeholder="Masukkan judul profil" required>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Konten Biasa (untuk non-visi-misi dan non-sejarah) -->
                    <div class="mb-3" id="addKontenContainer">
                        <label class="form-label">Konten</label>
                        <textarea name="konten" class="form-control" rows="6" placeholder="Masukkan konten profil"></textarea>
                    </div>
                    
                    <!-- Visi dan Misi (khusus untuk visi-misi) -->
                    <div id="addVisiMisiContainer" style="display:none;">
                        <div class="mb-3">
                            <label class="form-label">Isi Visi</label>
                            <textarea name="isi_visi" class="form-control" rows="4" placeholder="Masukkan visi sekolah"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Isi Misi</label>
                            <textarea name="isi_misi" class="form-control" rows="4" placeholder="Masukkan misi sekolah"></textarea>
                        </div>
                    </div>
                    
                    <!-- Stats untuk Sejarah (khusus untuk sejarah) -->
                    <div id="addSejarahStatsContainer" style="display:none;">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Tahun Berdiri</label>
                                    <input type="number" name="tahun_berdiri" class="form-control" placeholder="2000" min="1900" max="2100">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Jumlah Siswa Tahun Ini</label>
                                    <input type="number" name="jumlah_siswa" class="form-control" placeholder="500" min="0">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Lulusan Sukses</label>
                                    <input type="number" name="lulusan_sukes" class="form-control" placeholder="1000" min="0">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Urutan</label>
                                <input type="number" name="urutan" class="form-control" value="0" min="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <div class="form-check form-switch mt-2">
                                    <input class="form-check-input" type="checkbox" name="status" id="statusAdd" checked>
                                    <label class="form-check-label" for="statusAdd">Aktif</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Gambar - hanya untuk sambut -->
                    <div class="mb-3" id="addImageContainer" style="display:none;">
                        <label class="form-label">Gambar (Foto Kepala Sekolah)</label>
                        <input type="file" name="gambar" class="form-control" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleAddFields() {
        var select = document.getElementById('addMenu');
        var kontenContainer = document.getElementById('addKontenContainer');
        var visiMisiContainer = document.getElementById('addVisiMisiContainer');
        var sejarahStatsContainer = document.getElementById('addSejarahStatsContainer');
        var imageContainer = document.getElementById('addImageContainer');
        
        if (select.value === 'visi-misi') {
            kontenContainer.style.display = 'none';
            visiMisiContainer.style.display = 'block';
            sejarahStatsContainer.style.display = 'none';
            imageContainer.style.display = 'none';
        } else if (select.value === 'sejarah') {
            kontenContainer.style.display = 'block';
            visiMisiContainer.style.display = 'none';
            sejarahStatsContainer.style.display = 'block';
            imageContainer.style.display = 'none';
        } else if (select.value === 'sambutan') {
            kontenContainer.style.display = 'block';
            visiMisiContainer.style.display = 'none';
            sejarahStatsContainer.style.display = 'none';
            imageContainer.style.display = 'block';
        } else {
            kontenContainer.style.display = 'block';
            visiMisiContainer.style.display = 'none';
            sejarahStatsContainer.style.display = 'none';
            imageContainer.style.display = 'none';
        }
    }
</script>

@endsection
