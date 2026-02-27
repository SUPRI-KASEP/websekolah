@extends('layouts.app')
@section('title', 'Home')

@section('content')

{{-- ============================================
     HERO SECTION
============================================ --}}
<section class="hero-section">
    <div class="hero-content">
        <h1 class="hero-title">Selamat Datang di <span class="text-gold">SMK SLB</span></h1>
        <p class="hero-subtitle">Membangun Generasi Cerdas, Kompeten, dan Berkarakter Islami</p>
        <div class="hero-buttons">
            <a href="{{ route('profil.menu', 'visi-misi') }}" class="btn btn-primary">Visi & Misi</a>
            <a href="{{ route('fasilitas.index') }}" class="btn btn-outline">Jelajahi Fasilitas</a>
        </div>
    </div>
    <div class="hero-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
    </div>
</section>

{{-- ============================================
     PROFIL SECTION - Sambutan
============================================ --}}
<section class="profil-preview">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5">
                <div class="profil-image">
                    @if($sambutan && $sambutan->gambar)
                        <img src="{{ asset('assets/' . $sambutan->gambar) }}" alt="{{ $sambutan->judul }}">
                    @else
                        <img src="{{ asset('assets/udin.png') }}" alt="Kepala Sekolah">
                    @endif
                </div>
            </div>
            <div class="col-md-7">
                <div class="profil-content">
                    <span class="section-tag">Profil Sekolah</span>
                    <h2 class="section-title">@if($sambutan && $sambutan->judul) {{ $sambutan->judul }} @else Sambutan Kepala Sekolah @endif</h2>
                    <p class="section-desc">@if($sambutan && $sambutan->konten) {!! Str::limit(nl2br(e($sambutan->konten)), 300) !!} @else Assalamu'alaikum Warahmatullahi Wabarakatuh, Puji syukur kita panjatkan ke hadirat Tuhan Yang Maha Esa, karena atas rahmat dan karunia-Nya, kita semua masih diberikan kesehatan dan kesempatan untuk terus berkarya dalam dunia pendidikan. @endif</p>
                    <a href="{{ route('profil.menu', 'sambutan') }}" class="btn-link">Selengkapnya <span class="arrow">→</span></a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================
     VISI MISI SECTION
============================================ --}}
<section class="vm-section">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-tag">Tentang Kami</span>
            <h2 class="section-title">Visi & Misi</h2>
            <div class="section-line"></div>
        </div>
        
        <div class="vm-grid">
            <div class="vm-card vm-visi">
                <div class="vm-icon">👁️</div>
                <h3>VISI</h3>
                <p>@if($visimisi && $visimisi->isi_visi) {!! nl2br(e($visimisi->isi_visi)) !!} @elseif($visimisi && $visimisi->konten) {!! nl2br(e($visimisi->konten)) !!} @else "Menjadi sekolah menengah kejuruan yang menghasilkan lulusannya cerdas, kompeten, dan berkarakter Islami, serta mampu bersaing di tingkat nasional maupun internasional." @endif</p>
            </div>
            
            <div class="vm-card vm-misi">
                <div class="vm-icon">🎯</div>
                <h3>MISI</h3>
                @if($visimisi && $visimisi->isi_misi)
                    {!! nl2br(e($visimisi->isi_misi)) !!}
                @else
                    <ul class="misi-list">
                        <li><span class="misi-number">01</span>Penyedia pendidikan berkualitas relevan dengan kebutuhan dunia kerja</li>
                        <li><span class="misi-number">02</span>Mengembangkan kompetensi keahlian sesuai standar industri</li>
                        <li><span class="misi-number">03</span>Membentuk karakter Islami yang kuat</li>
                        <li><span class="misi-number">04</span>Meningkatkan prestasi akademik dan non-akademik</li>
                        <li><span class="misi-number">05</span>Membangun kerja sama dengan dunia industri</li>
                    </ul>
                @endif
            </div>
        </div>
        
        <div class="text-center mt-4">
            <a href="{{ route('profil.menu', 'visi-misi') }}" class="btn btn-primary">Selengkapnya</a>
        </div>
    </div>
</section>

{{-- ============================================
     SEJARAH SECTION
============================================ --}}
<section class="sejarah-preview">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-7">
                <span class="section-tag section-tag-light">Perjalanan Kami</span>
                <h2 class="section-title">@if($sejarah && $sejarah->judul) {{ $sejarah->judul }} @else Sejarah Sekolah @endif</h2>
                <p class="section-desc">@if($sejarah && $sejarah->konten) {!! Str::limit(nl2br(e($sejarah->konten)), 250) !!} @else SMK Ucup didirikan pada tahun 2000 dengan visi untuk menciptakan sumber daya manusia yang kompeten dan berkarakter. Perjalanan panjang kami penuh dengan pencapaian dan pembelajaran berharga. @endif</p>
                <p class="section-desc">Dengan dukungan tenaga pendidik profesional dan fasilitas modern, kami terus berinovasi untuk menghadirkan pendidikan berkualitas yang relevan dengan perkembangan zaman.</p>
                <a href="{{ route('profil.menu', 'sejarah') }}" class="btn-link btn-link-light">Selengkapnya <span class="arrow">→</span></a>
            </div>
            <div class="col-md-5">
                <div class="sejarah-stats">
                    <div class="stat-box">
                        <span class="stat-number">{{ $tahunBerdiri }}</span>
                        <span class="stat-label">Tahun Berdiri</span>
                    </div>
                    <div class="stat-box">
                        <span class="stat-number">{{ $lamaBeroperasi }}+</span>
                        <span class="stat-label">Tahun Berpengalaman</span>
                    </div>
                    <div class="stat-box">
                        <span class="stat-number">{{ number_format($lulusanSukses) }}+</span>
                        <span class="stat-label">Lulusan Sukses</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================
     FASILITAS SECTION
============================================ --}}
<section class="fasilitas-preview">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-tag">Sarana & Prasarana</span>
            <h2 class="section-title">Fasilitas Unggulan</h2>
            <div class="section-line"></div>
            <p class="section-subtitle">Dilengkapi dengan fasilitas modern untuk mendukung proses pembelajaran optimal</p>
        </div>
        
        <div class="fasilitas-grid">
            @forelse($fasilitas as $item)
            <div class="fasilitas-item">
                <div class="fasilitas-icon-box">
                    @if($item->gambar)
                        <img src="{{ asset('assets/' . $item->gambar) }}" alt="{{ $item->nama_fasilitas }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 10px;">
                    @else
                        <span class="fasilitas-icon">🏫</span>
                    @endif
                </div>
                <h4>{{ $item->nama_fasilitas }}</h4>
                <p>{{ $item->deskripsi }}</p>
            </div>
            @empty
            <div class="fasilitas-item">
                <div class="fasilitas-icon-box">
                    <span class="fasilitas-icon">💻</span>
                </div>
                <h4>Lab Komputer</h4>
                <p>Komputer modern dengan spesifikasi tinggi dan akses internet cepat</p>
            </div>
            <div class="fasilitas-item">
                <div class="fasilitas-icon-box">
                    <span class="fasilitas-icon">📚</span>
                </div>
                <h4>Perpustakaan Digital</h4>
                <p>Koleksi 3000+ buku fisik dan akses ke ribuan referensi digital</p>
            </div>
            <div class="fasilitas-item">
                <div class="fasilitas-icon-box">
                    <span class="fasilitas-icon">🏃</span>
                </div>
                <h4>Lapangan Olahraga</h4>
                <p>Fasilitas olahraga multifungsi untuk berbagai aktivitas atletik</p>
            </div>
            <div class="fasilitas-item">
                <div class="fasilitas-icon-box">
                    <span class="fasilitas-icon">🔬</span>
                </div>
                <h4>Lab Sains</h4>
                <p>Peralatan praktikum lengkap untuk eksperimen dan penelitian</p>
            </div>
            <div class="fasilitas-item">
                <div class="fasilitas-icon-box">
                    <span class="fasilitas-icon">🚌</span>
                </div>
                <h4>Layanan Transportasi</h4>
                <p>Bus sekolah modern untuk kenyamanan dan keamanan siswa</p>
            </div>
            <div class="fasilitas-item">
                <div class="fasilitas-icon-box">
                    <span class="fasilitas-icon">🕌</span>
                </div>
                <h4>Mushola Modern</h4>
                <p>Tempat ibadah yang bersih, nyaman dan mencerminkan nilai Islami</p>
            </div>
            @endforelse
        </div>
        
        <div class="text-center mt-4">
            <a href="{{ route('fasilitas.index') }}" class="btn btn-primary">Jelajahi Semua Fasilitas</a>
        </div>
    </div>
</section>

{{-- ============================================
     PRESTASI SECTION
============================================ --}}
<section class="produksi-preview">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-tag section-tag-light">Keunggulan</span>
            <h2 class="section-title">Prestasi & Penghargaan</h2>
            <div class="section-line section-line-light"></div>
        </div>
        
        <div class="produksi-grid">
            @forelse($prestasis as $index => $item)
            <div class="produksi-card">
                <div class="produksi-image-wrapper">
                    <div class="produksi-badge">
                        @if($item->foto)
                            <img src="{{ asset('assets/' . $item->foto) }}" 
                                 alt="{{ $item->nama_prestasi }}" 
                                 class="produksi-img">
                        @else
                            🏆
                        @endif
                    </div>
                </div>
                <h4 class="produksi-card-title">{{ $item->nama_prestasi }}</h4>
                <p class="produksi-card-text">
                    {!! nl2br(e(Str::limit($item->isi, 100))) !!}
                </p>
                <div class="produksi-card-footer">
                    <a href="" class="btn btn-primary text-white">selengkapnya</a>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="empty-state-card">
                    <div class="empty-icon">🏆</div>
                    <p>Belum ada data prestasi yang ditambahkan.</p>
                </div>
            </div>
        @endforelse
        </div>
        
        <div class="text-center mt-4">
            <a href="{{ route('prestasi.index') }}" class="btn btn-outline-white">Lihat Semua Prestasi</a>
        </div>
    </div>
</section>

{{-- ============================================
     EKSTRAKURIKULER SECTION
============================================ --}}
<section class="eskul-preview">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-tag">Pengembangan Diri</span>
            <h2 class="section-title">Program Ekstrakurikuler</h2>
            <div class="section-line"></div>
            <p class="section-subtitle">Berbagai pilihan kegiatan untuk mengembangkan bakat dan minat siswa</p>
        </div>
        
        <div class="eskul-grid">
            @forelse($eskuls as $item)
            <div class="eskul-card">
                <div class="eskul-icon">
                    @if($item->gambar)
                        <img src="{{ asset('assets/' . $item->gambar) }}" alt="{{ $item->nama_eskul }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%;">
                    @else
                        🎯
                    @endif
                </div>
                <h4>{{ $item->nama_eskul }}</h4>
                <p>{{ $item->deskripsi }}</p>
                @if($item->pembina)
                <p style="font-size: 0.85rem; color: #667eea; margin-top: 10px;">Pembina: {{ $item->pembina }}</p>
                @endif
            </div>
            @empty
            <div class="eskul-card">
                <div class="eskul-icon">🎨</div>
                <h4>Seni Rupa</h4>
                <p>Mengeksplorasi kreativitas melalui berbagai medium seni</p>
            </div>
            <div class="eskul-card">
                <div class="eskul-icon">🎵</div>
                <h4>Paduan Suara</h4>
                <p>Mengembangkan bakat musik dan vokal bersama profesional</p>
            </div>
            <div class="eskul-card">
                <div class="eskul-icon">⚽</div>
                <h4>Klub Olahraga</h4>
                <p>Futsal, Basket, Volly, Atletik dan cabang olahraga lainnya</p>
            </div>
            <div class="eskul-card">
                <div class="eskul-icon">💻</div>
                <h4>IT Club</h4>
                <p>Programming, Jaringan Komputer, dan Multimedia</p>
            </div>
            <div class="eskul-card">
                <div class="eskul-icon">📖</div>
                <h4>OSIS</h4>
                <p>Organisasi Siswa Intra Sekolah untuk kepemimpinan</p>
            </div>
            <div class="eskul-card">
                <div class="eskul-icon">🕌</div>
                <h4>Pramuka</h4>
                <p>Pengembangan karakter, kepemimpinan dan kemandirian</p>
            </div>
            @endforelse
        </div>
        
        <div class="text-center mt-4">
            <a href="#" class="btn btn-primary">Daftar Ekstrakurikuler</a>
        </div>
    </div>
</section>

{{-- ============================================
     CTA SECTION
============================================ --}}
<section class="cta-section">
    <div class="container text-center">
        <h2>Siap Bergabung dengan Kami?</h2>
        <p>Wujudkan masa depan cerah Anda bersama SMK Ucup</p>
        <div class="cta-buttons">
            <a href="#" class="btn btn-white">Hubungi Kami</a>
            <a href="#" class="btn btn-white-outline">Daftar Online</a>
        </div>
    </div>
</section>

{{-- ============================================
     STYLES
============================================ --}}
<style>
:root {
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --primary-color: #667eea;
    --secondary-color: #764ba2;
    --dark-color: #2c3e50;
    --light-color: #f8f9fa;
    --text-color: #444;
    --text-light: #666;
    --border-color: #e0e0e0;
    --gold-color: #f39c12;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Typography */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: var(--text-color);
    line-height: 1.6;
}

h1, h2, h3, h4, h5, h6 {
    font-weight: 600;
    color: var(--dark-color);
}

/* Section Tags */
.section-tag {
    display: inline-block;
    background: var(--primary-gradient);
    color: white;
    padding: 8px 20px;
    border-radius: 25px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    margin-bottom: 20px;
}

.section-tag-light {
    background: rgba(255, 255, 255, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--dark-color);
    margin-bottom: 15px;
    letter-spacing: -0.5px;
}

.section-subtitle {
    font-size: 1.1rem;
    color: var(--text-light);
    margin-top: 15px;
}

.section-desc {
    color: var(--text-light);
    line-height: 1.8;
    margin-bottom: 20px;
    font-size: 1rem;
}

.section-line {
    width: 80px;
    height: 4px;
    background: var(--primary-gradient);
    margin: 20px auto 30px;
    border-radius: 3px;
}

.section-line-light {
    background: rgba(255, 255, 255, 0.3);
}

.text-center { text-align: center; }
.text-gold { color: var(--gold-color); }

/* Buttons */
.btn {
    padding: 14px 35px;
    border-radius: 35px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    display: inline-block;
    font-size: 1rem;
    border: none;
    cursor: pointer;
}

.btn-primary {
    background: var(--primary-gradient);
    color: white;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.5);
}

.btn-outline {
    border: 2px solid white;
    color: white;
    background: transparent;
}

.btn-outline:hover {
    background: white;
    color: var(--primary-color);
}

.btn-outline-white {
    border: 2px solid white;
    color: white;
    background: transparent;
}

.btn-outline-white:hover {
    background: white;
    color: var(--secondary-color);
}

.btn-white {
    background: white;
    color: var(--primary-color);
    font-weight: 700;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.btn-white:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
}

.btn-white-outline {
    border: 2px solid white;
    color: white;
    background: transparent;
}

.btn-white-outline:hover {
    background: white;
    color: var(--primary-color);
}

.btn-link {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    transition: all 0.3s ease;
}

.btn-link:hover {
    gap: 10px;
}

.btn-link-light {
    color: white;
}

.btn-link .arrow {
    transition: transform 0.3s ease;
}

.btn-link:hover .arrow {
    transform: translateX(5px);
}

/* Hero Section */
.hero-section {
    position: relative;
    background: var(--primary-gradient);
    padding: 120px 20px;
    min-height: 600px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.hero-content {
    position: relative;
    z-index: 2;
    text-align: center;
    color: white;
    max-width: 900px;
    animation: fadeInUp 0.8s ease;
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 25px;
    line-height: 1.2;
    letter-spacing: -1px;
}

.hero-subtitle {
    font-size: 1.4rem;
    opacity: 0.95;
    margin-bottom: 40px;
    font-weight: 300;
    letter-spacing: 0.5px;
}

.hero-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
}

/* Hero Shapes */
.hero-shapes {
    position: absolute;
    inset: 0;
    pointer-events: none;
}

.shape {
    position: absolute;
    border-radius: 50%;
    opacity: 0.08;
}

.shape-1 {
    width: 350px;
    height: 350px;
    background: white;
    top: -80px;
    left: -80px;
}

.shape-2 {
    width: 250px;
    height: 250px;
    background: white;
    bottom: -60px;
    right: 5%;
}

.shape-3 {
    width: 200px;
    height: 200px;
    background: white;
    top: 15%;
    right: 3%;
}

/* Profil Preview */
.profil-preview {
    padding: 100px 20px;
    background: white;
}

.profil-image {
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
}

.profil-image img {
    width: 100%;
    display: block;
    transition: transform 0.3s ease;
}

.profil-image:hover img {
    transform: scale(1.05);
}

.profil-content {
    padding: 20px 0;
}

/* Visi Misi Section */
.vm-section {
    padding: 100px 20px;
    background: white;
}

.vm-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 40px;
    margin-top: 50px;
}

.vm-card {
    background: var(--light-color);
    padding: 50px 40px;
    border-radius: 20px;
    text-align: center;
    transition: all 0.3s ease;
    border: 1px solid #f0f0f0;
}

.vm-card:hover {
    transform: translateY(-15px);
    box-shadow: 0 30px 60px rgba(0, 0, 0, 0.12);
}

.vm-visi {
    background: var(--primary-gradient);
    color: white;
    border: none;
}

.vm-visi p {
    color: rgba(255, 255, 255, 0.95);
    font-size: 1.1rem;
    line-height: 1.8;
}

.vm-icon {
    font-size: 60px;
    margin-bottom: 25px;
}

.vm-card h3 {
    font-size: 2rem;
    margin-bottom: 25px;
    font-weight: 700;
    letter-spacing: 1px;
}

.misi-list {
    list-style: none;
    padding: 0;
    text-align: left;
}

.misi-list li {
    padding: 15px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.15);
    display: flex;
    align-items: center;
    gap: 15px;
    font-size: 0.95rem;
    line-height: 1.6;
}

.misi-list li:last-child {
    border-bottom: none;
}

.misi-number {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 35px;
    height: 35px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    font-weight: 700;
    flex-shrink: 0;
}

/* Sejarah Preview */
.sejarah-preview {
    padding: 100px 20px;
    background: var(--primary-gradient);
    color: white; 
}

.sejarah-preview .section-title {
    color: white;
}

.sejarah-preview .section-desc {
    color: rgba(255, 255, 255, 0.9);
    font-size: 1.05rem;
}

.sejarah-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
    margin-top: 40px;
}

.stat-box {
    background: rgba(255, 255, 255, 0.15);
    padding: 40px 25px;
    border-radius: 15px;
    text-align: center;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: all 0.3s ease;
}

.stat-box:hover {
    background: rgba(255, 255, 255, 0.25);
    transform: translateY(-5px);
}

.stat-number {
    display: block;
    font-size: 3rem;
    font-weight: 700;
    color: white;
    margin-bottom: 10px;
}

.stat-label {
    font-size: 1rem;
    opacity: 0.9;
    font-weight: 500;
}

/* Fasilitas Preview */
.fasilitas-preview {
    padding: 100px 20px;
    background: white;
}

.fasilitas-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-top: 50px;
}

.fasilitas-item {
    background: var(--light-color);
    padding: 40px 30px;
    border-radius: 20px;
    text-align: center;
    transition: all 0.3s ease;
    border: 1px solid #f0f0f0;
}

.fasilitas-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.08);
    border-color: var(--primary-color);
}

.fasilitas-icon-box {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 70px;
    height: 70px;
    background: var(--primary-gradient);
    border-radius: 15px;
    margin: 0 auto 20px;
}

.fasilitas-icon {
    font-size: 40px;
}

.fasilitas-item h4 {
    font-size: 1.2rem;
    font-weight: 700;
    margin-bottom: 15px;
    color: var(--dark-color);
}

.fasilitas-item p {
    font-size: 0.95rem;
    color: var(--text-light);
    margin: 0;
    line-height: 1.6;
}

/* Prestasi Preview - Elegant Design */
.produksi-preview {
    padding: 100px 20px;
    background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
    color: white;
    position: relative;
    overflow: hidden;
}

.produksi-preview::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 50%, rgba(212, 175, 55, 0.08) 0%, transparent 50%),
        radial-gradient(circle at 80% 50%, rgba(212, 175, 55, 0.05) 0%, transparent 50%);
    pointer-events: none;
}

.produksi-preview .section-title {
    color: white;
}

.produksi-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
    margin-top: 50px;
    position: relative;
    z-index: 1;
}

.produksi-card {
    background: rgba(255, 255, 255, 0.06);
    padding: 45px 30px 35px;
    border-radius: 24px;
    text-align: center;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: 1px solid rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(10px);
    position: relative;
    overflow: hidden;
}

.produksi-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #b8962e, #d4af37, #f4e4bc);
    opacity: 0;
    transition: opacity 0.4s ease;
}

.produksi-card:hover {
    background: rgba(255, 255, 255, 0.12);
    transform: translateY(-12px);
    border-color: rgba(212, 175, 55, 0.3);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
}

.produksi-card:hover::before {
    opacity: 1;
}

.produksi-image-wrapper {
    margin-bottom: 25px;
}

.produksi-badge {
    width: 90px;
    height: 90px;
    margin: 0 auto;
    border-radius: 50%;
    background: linear-gradient(135deg, #d4af37 0%, #b8962e 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 40px;
    box-shadow: 0 8px 30px rgba(212, 175, 55, 0.4);
    transition: all 0.4s ease;
    border: 4px solid rgba(255, 255, 255, 0.2);
}

.produksi-card:hover .produksi-badge {
    transform: scale(1.1);
    box-shadow: 0 12px 40px rgba(212, 175, 55, 0.5);
    border-color: rgba(255, 255, 255, 0.4);
}

.produksi-img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
}

.produksi-card-title {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 15px;
    color: white;
    line-height: 1.3;
}

.produksi-card-text {
    font-size: 0.9rem;
    opacity: 0.75;
    margin: 0 0 20px;
    line-height: 1.7;
}

.produksi-card-footer {
    padding-top: 15px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.produksi-cta {
    color: #d4af37;
    font-weight: 600;
    font-size: 0.85rem;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.produksi-cta .arrow {
    transition: transform 0.3s ease;
}

.produksi-card:hover .produksi-cta {
    color: #f4e4bc;
}

.produksi-card:hover .produksi-cta .arrow {
    transform: translateX(5px);
}

.empty-state-card {
    text-align: center;
    padding: 60px 40px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 20px;
    border: 1px dashed rgba(255, 255, 255, 0.2);
    grid-column: 1 / -1;
}

.empty-state-card .empty-icon {
    font-size: 60px;
    margin-bottom: 20px;
    opacity: 0.5;
}

.empty-state-card p {
    color: rgba(255, 255, 255, 0.6);
    font-size: 1rem;
}

/* Eskul Preview */
.eskul-preview {
    padding: 100px 20px;
    background: white;
}

.eskul-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-top: 50px;
}

.eskul-card {
    background: var(--light-color);
    padding: 40px 30px;
    border-radius: 20px;
    text-align: center;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.eskul-card:hover {
    border-color: var(--primary-color);
    transform: translateY(-10px);
    box-shadow: 0 25px 50px rgba(102, 126, 234, 0.15);
}

.eskul-icon {
    font-size: 50px;
    margin-bottom: 20px;
}

.eskul-card h4 {
    font-size: 1.2rem;
    font-weight: 700;
    margin-bottom: 15px;
    color: var(--dark-color);
}

.eskul-card p {
    font-size: 0.95rem;
    color: var(--text-light);
    margin: 0;
    line-height: 1.6;
}

/* CTA Section */
.cta-section {
    padding: 100px 20px;
    background: var(--primary-gradient);
    color: white;
    text-align: center;
}

.cta-section h2 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 20px;
    color: white;
}

.cta-section p {
    font-size: 1.3rem;
    opacity: 0.95;
    margin-bottom: 40px;
    font-weight: 300;
}

.cta-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
}

/* Container */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.section-header {
    margin-bottom: 40px;
}

/* Grid System */
.row {
    display: flex;
    flex-wrap: wrap;
    margin: 0 -15px;
    gap: 30px;
}

.col-md-5, .col-md-7 {
    padding: 0 15px;
}

@media (min-width: 768px) {
    .col-md-5 {
        flex: 0 0 41.666667%;
        max-width: 41.666667%;
    }
    .col-md-7 {
        flex: 0 0 58.333333%;
        max-width: 58.333333%;
    }
}

.align-items-center {
    align-items: center;
}

/* Spacing */
.mt-4 { margin-top: 40px; }

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive */
@media (max-width: 992px) {
    .col-md-5,
    .col-md-7 {
        flex: 0 0 100%;
        max-width: 100%;
    }
    
    .sejarah-stats {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2.2rem;
    }
    
    .hero-subtitle {
        font-size: 1.1rem;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .cta-section h2 {
        font-size: 2rem;
    }
    
    .cta-section p {
        font-size: 1.1rem;
    }
    
    .vm-grid,
    .fasilitas-grid,
    .produksi-grid,
    .eskul-grid {
        grid-template-columns: 1fr;
    }
    
    .stat-box {
        padding: 30px 20px;
    }
    
    .stat-number {
        font-size: 2.5rem;
    }
}

@media (max-width: 480px) {
    .hero-title {
        font-size: 1.8rem;
    }
    
    .hero-subtitle {
        font-size: 1rem;
    }
    
    .section-title {
        font-size: 1.6rem;
    }
    
    .hero-buttons,
    .cta-buttons {
        flex-direction: column;
    }
    
    .btn {
        width: 100%;
    }
}
</style>

@endsection
