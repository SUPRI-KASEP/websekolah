@extends('layouts.app')
@section('title', 'Sejarah Sekolah')
@section('content')

<div class="container py-4">
    <!-- Header -->
    <h2 class="fw-bold mb-2">Sejarah Sekolah</h2>
    <p class="fst-italic text-secondary mb-4">"Perjalanan panjang menuju keunggulan pendidikan"</p>
    
    <hr class="mb-4">

    <!-- Main Content -->
    <div class="sejarah-content">
        <!-- Hero Section -->
        <div class="sejarah-hero mb-5">
            <div class="hero-content">
                <h3 class="fw-bold mb-3">SMK-Ucup</h3>
                <p class="mb-2">Berdiri sejak tahun 2000</p>
                <span class="badge-years">2000 - {{ date('Y') }}</span>
            </div>
        </div>

        <!-- Timeline Section -->
        <div class="section mb-5">
            <h4 class="fw-bold mb-4">
                <span class="section-icon">📅</span> Perjalanan Kami
            </h4>
            
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <h5 class="fw-bold">2000</h5>
                        <p>Didirikan dengan nama awal "SMK Teknologi UCUP" dengan fokus pada program keahlian Teknik Komputer dan Jaringan.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <h5 class="fw-bold">2005</h5>
                        <p>Mengembangkan program keahlian baru yaitu Teknik Otomotif dan Akuntansi. Memperoleh akreditasi A dari BAN-SM.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <h5 class="fw-bold">2010</h5>
                        <p>Menjadi sekolah pilot project untuk program Link and Match dengan dunia industri. Kerjasama dengan berbagai perusahaan terkemuka.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <h5 class="fw-bold">2015</h5>
                        <p>Meraih predikat sekolah bermutu tingkat nasional. Melakukan pengembangan fasilitas laboratorium dan workshop.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <h5 class="fw-bold">2020</h5>
                        <p>Mengalmi pengembangan signifikan dengan penambahan program keahlian baru. Meraih berbagai prestasi di tingkat provinsi dan nasional.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <h5 class="fw-bold">{{ date('Y') }}</h5>
                        <p>Terus berkomitmen untuk menyediakan pendidikan berkualitas tinggi dan menghasilkan lulusan yang kompeten dan berakhlakul karimah.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Visi Misi Section -->
        <div class="section mb-5">
            <h4 class="fw-bold mb-4">
                <span class="section-icon">🎯</span> Komitmen Kami
            </h4>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="commitment-card">
                        <div class="card-icon">👨‍🏫</div>
                        <h5 class="fw-bold mb-2">Pendidikan Berkualitas</h5>
                        <p>Menyediakan pendidikan yang relevan dengan kebutuhan dunia kerja dan perkembangan teknologi.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="commitment-card">
                        <div class="card-icon">🌟</div>
                        <h5 class="fw-bold mb-2">Karakter Islami</h5>
                        <p>Membentuk generasi yang berakhlakul karimah, disiplin, dan bertanggung jawab.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="commitment-card">
                        <div class="card-icon">🏆</div>
                        <h5 class="fw-bold mb-2">Prestasi Unggul</h5>
                        <p>Mendorong prestasi akademik dan non-akademik secara berkelanjutan.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="commitment-card">
                        <div class="card-icon">🤝</div>
                        <h5 class="fw-bold mb-2">Kerja Sama Strategis</h5>
                        <p>Membangun kemitraan dengan dunia industri untuk kesiapan kerja.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Section -->
        <div class="section mb-5">
            <h4 class="fw-bold mb-4">
                <span class="section-icon">📊</span> Pencapaian Kami
            </h4>
            
            <div">
                <div class="stats-grid class="stat-item">
                    <div class="stat-number">20+</div>
                    <div class="stat-label">Tahun Pengalaman</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">1000+</div>
                    <div class="stat-label">Lulusan</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">50+</div>
                    <div class="stat-label">Guru & Staff</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">10+</div>
                    <div class="stat-label">Program Keahlian</div>
                </div>
            </div>
        </div>

        <!-- Quote Section -->
        <div class="section mb-5">
            <div class="quote-box">
                <blockquote>
                    "Pendidikan adalah passport untuk masa depan, hari adalah milik kita bersama."
                </blockquote>
                <cite>- Manajemen SMK-Ucup</cite>
            </div>
        </div>
    </div>

    <hr class="mb-4">

    <!-- Footer Info -->
    <p class="text-secondary text-center small">SMK-Ucup • Website resmi sekolah</p>
</div>

<style>
body {
    font-family: 'Segoe UI', Arial, sans-serif;
    line-height: 1.6;
    color: #333;
}

.container {
    max-width: 1140px;
    margin: 0 auto;
    padding: 20px;
}

h1, h2, h3, h4, h5 {
    color: #212529;
}

h2 {
    font-size: 1.8rem;
}

h4 {
    font-size: 1.4rem;
}

hr {
    border: 0;
    border-top: 1px solid #dee2e6;
    margin: 20px 0;
}

p {
    margin-bottom: 1rem;
}

.text-secondary {
    color: #6c757d;
}

.fw-bold {
    font-weight: 700;
}

.fst-italic {
    font-style: italic;
}

/* Hero Section */
.sejarah-hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 20px;
    padding: 40px;
    text-align: center;
    color: white;
}

.hero-content h3 {
    color: white;
    font-size: 2.5rem;
    margin-bottom: 10px;
}

.hero-content p {
    font-size: 1.2rem;
    margin-bottom: 15px;
    opacity: 0.9;
}

.badge-years {
    display: inline-block;
    background: rgba(255, 255, 255, 0.2);
    padding: 8px 20px;
    border-radius: 30px;
    font-weight: 600;
}

/* Timeline */
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 7px;
    top: 0;
    bottom: 0;
    width: 3px;
    background: linear-gradient(to bottom, #667eea, #764ba2);
    border-radius: 3px;
}

.timeline-item {
    position: relative;
    margin-bottom: 25px;
    padding-left: 20px;
}

.timeline-dot {
    position: absolute;
    left: -27px;
    top: 5px;
    width: 16px;
    height: 16px;
    background: #667eea;
    border-radius: 50%;
    border: 3px solid white;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}

.timeline-content {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 10px;
    border-left: 4px solid #667eea;
}

.timeline-content h5 {
    color: #667eea;
    margin-bottom: 10px;
}

/* Section Icon */
.section-icon {
    margin-right: 10px;
}

/* Commitment Card */
.commitment-card {
    background: #f8f9fa;
    border-radius: 15px;
    padding: 25px;
    height: 100%;
    text-align: center;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.commitment-card:hover {
    transform: translateY(-5px);
    border-color: #667eea;
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.15);
}

.commitment-card .card-icon {
    font-size: 40px;
    margin-bottom: 15px;
}

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 20px;
}

.stat-item {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 15px;
    padding: 25px;
    text-align: center;
    color: white;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 5px;
}

.stat-label {
    font-size: 0.9rem;
    opacity: 0.9;
}

/* Quote Box */
.quote-box {
    background: #f8f9fa;
    border-radius: 15px;
    padding: 30px;
    text-align: center;
    border-left: 5px solid #764ba2;
}

.quote-box blockquote {
    font-size: 1.3rem;
    font-style: italic;
    color: #333;
    margin-bottom: 15px;
}

.quote-box cite {
    color: #667eea;
    font-weight: 600;
}

/* Row & Col */
.row {
    display: flex;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}

.col-md-6 {
    position: relative;
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
}

@media (min-width: 768px) {
    .col-md-6 {
        flex: 0 0 50%;
        max-width: 50%;
    }
}

/* Spacing */
.mb-1 { margin-bottom: 0.25rem; }
.mb-2 { margin-bottom: 0.5rem; }
.mb-3 { margin-bottom: 1rem; }
.mb-4 { margin-bottom: 1.5rem; }
.mb-5 { margin-bottom: 3rem; }
.mt-3 { margin-top: 1rem; }
</style>

@endsection
