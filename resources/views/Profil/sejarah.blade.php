@extends('layouts.app')
@section('title', 'Sejarah Sekolah')
@section('content')

<?php
use Illuminate\Support\Str;

// Get sejarah profile data dari database atau null jika tidak ada
$sejarah = isset($profil) ? $profil : null;

// Ambil nilai dari database atau default value
$tahunBerdiri = 2000;
$jumlahSiswa = 500;
$lulusanSukses = 1000;

if ($sejarah) {
    if ($sejarah->tahun_berdiri) {
        $tahunBerdiri = $sejarah->tahun_berdiri;
    }
    if ($sejarah->jumlah_siswa) {
        $jumlahSiswa = $sejarah->jumlah_siswa;
    }
    if ($sejarah->lulusan_sukes) {
        $lulusanSukses = $sejarah->lulusan_sukes;
    }
}

$tahunSekarang = date('Y');
$lamaBeroperasi = $tahunSekarang - $tahunBerdiri;
?>

<div class="container py-4">
    <!-- Header Section -->
    <div class="text-center mb-5">
        <span class="section-tag">Tentang Kami</span>
        <h2 class="fw-bold mb-3"><?php echo ($sejarah && $sejarah->judul) ? e($sejarah->judul) : 'Sejarah SMK-Ucup'; ?></h2>
        <p class="fst-italic text-secondary fs-5">"Perjalanan panjang menuju keunggulan pendidikan"</p>
        <div class="section-line mx-auto"></div>
    </div>

    <!-- Hero Banner with Stats -->
    <div class="sejarah-hero mb-5">
        <div class="hero-content text-center">
            <h3 class="fw-bold mb-3"><?php echo ($sejarah && $sejarah->konten) ? nl2br(e($sejarah->konten)) : 'Berdiri sejak tahun ' . $tahunBerdiri; ?></h3>
            <span class="badge-years"><?php echo $tahunBerdiri; ?> - <?php echo $tahunSekarang; ?></span>
        </div>
    </div>

    <!-- Dynamic Statistics Section -->
    <div class="stats-section mb-5">
        <div class="stats-grid">
            <div class="stat-box">
                <span class="stat-number"><?php echo $lamaBeroperasi; ?>+</span>
                <span class="stat-label">Tahun Pengalaman</span>
            </div>
            <div class="stat-box">
                <span class="stat-number"><?php echo number_format($lulusanSukses); ?>+</span>
                <span class="stat-label">Lulusan Sukses</span>
            </div>
            <div class="stat-box">
                <span class="stat-number"><?php echo number_format($jumlahSiswa); ?>+</span>
                <span class="stat-label">Siswa Aktif</span>
            </div>
            <div class="stat-box">
                <span class="stat-number">10+</span>
                <span class="stat-label">Program Keahlian</span>
            </div>
        </div>
    </div>

    <!-- Timeline Section -->
    <div class="section mb-5">
        <h4 class="fw-bold mb-4 text-center">
            <span class="section-icon">📅</span> Perjalanan Kami
        </h4>
        
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <h5 class="fw-bold"><?php echo $tahunBerdiri; ?></h5>
                    <p>Didirikan dengan nama awal "SMK Teknologi omay" dengan fokus pada program keahlian Teknik Komputer dan Jaringan.</p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <h5 class="fw-bold"><?php echo $tahunBerdiri + 5; ?></h5>
                    <p>Mengembangkan program keahlian baru yaitu Teknik Otomotif dan Akuntansi. Memperoleh akreditasi A dari BAN-SM.</p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <h5 class="fw-bold"><?php echo $tahunBerdiri + 10; ?></h5>
                    <p>Menjadi sekolah pilot project untuk program Link and Match dengan dunia industri. Kerjasama dengan berbagai perusahaan terkemuka.</p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <h5 class="fw-bold"><?php echo $tahunBerdiri + 15; ?></h5>
                    <p>Meraih predikat sekolah bermutu tingkat nasional. Melakukan pengembangan fasilitas laboratorium dan workshop.</p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <h5 class="fw-bold"><?php echo $tahunSekarang; ?></h5>
                    <p>Terus berkomitmen untuk menyediakan pendidikan berkualitas tinggi dan menghasilkan lulusan yang kompeten dan berakhlakul karimah.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quote Section -->
    <div class="section mb-5">
        <div class="quote-box">
            <blockquote>
                "Pendidikan adalah passport untuk masa depan, hari adalah milik kita bersama."
            </blockquote>
            <cite>- Manajemen SMK-SLB</cite>
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
    font-size: 2rem;
}

h3 {
    font-size: 1.5rem;
}

h4 {
    font-size: 1.3rem;
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

.fs-5 {
    font-size: 1.25rem;
}

.text-center {
    text-align: center;
}

.mx-auto {
    margin-left: auto;
    margin-right: auto;
}

/* Section Tag */
.section-tag {
    display: inline-block;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 8px 20px;
    border-radius: 25px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    margin-bottom: 15px;
}

.section-line {
    width: 80px;
    height: 4px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 3px;
    margin-top: 15px;
}

/* Hero Section */
.sejarah-hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 20px;
    padding: 50px 40px;
    color: white;
}

.badge-years {
    display: inline-block;
    background: rgba(255, 255, 255, 0.2);
    padding: 8px 20px;
    border-radius: 30px;
    font-weight: 600;
    margin-top: 15px;
}

/* Stats Grid */
.stats-section {
    padding: 30px 0;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 20px;
}

.stat-box {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 15px;
    padding: 25px;
    text-align: center;
    color: white;
}

.stat-number {
    display: block;
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 5px;
}

.stat-label {
    font-size: 0.9rem;
    opacity: 0.9;
}

/* Timeline */
.timeline {
    position: relative;
    padding-left: 30px;
    max-width: 800px;
    margin: 0 auto;
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

.section-icon {
    margin-right: 8px;
}

/* Quote Box */
.quote-box {
    background: #f8f9fa;
    border-radius: 15px;
    padding: 30px;
    text-align: center;
    border-left: 5px solid #764ba2;
    max-width: 800px;
    margin: 0 auto;
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

.mb-3 {
    margin-bottom: 1rem;
}

.mb-4 {
    margin-bottom: 1.5rem;
}

.mb-5 {
    margin-bottom: 3rem;
}

.mt-3 {
    margin-top: 1rem;
}

.small {
    font-size: 0.875rem;
}
</style>

@endsection
