@extends('layouts.app')
@section('title', 'Visi Misi')
@section('content')

<div class="container py-4">
    <!-- Header -->
    <h2 class="fw-bold mb-2">Visi & Misi</h2>
    <p class="fst-italic text-secondary mb-4">"Membangun Generasi Cerdas dan Berkarakter"</p>
    
    <hr class="mb-4">

    <!-- Visi Section -->
    <div class="section mb-5">
        <div class="section-header">
            <h3 class="fw-bold mb-3">
                <span class="section-icon">👁️</span> VISI
            </h3>
        </div>
        <div class="section-content">
            <div class="visi-box">
                <p class="visi-text">
                    @if($profil && $profil->isi_visi)
                        {!! nl2br(e($profil->isi_visi)) !!}
                    @elseif($profil && $profil->konten)
                        {!! nl2br(e($profil->konten)) !!}
                    @else
                        "Menjadi sekolah menengah kejuruan yang menghasilkan lulusannya cerdas, kompeten, dan berkarakter Islami, serta mampu bersaing di tingkat nasional maupun internasional."
                    @endif
                </p>
            </div>
        </div>
    </div>

    <!-- Misi Section -->
    <div class="section mb-5">
        <div class="section-header">
            <h3 class="fw-bold mb-3">
                <span class="section-icon">🎯</span> MISI
            </h3>
        </div>
        <div class="section-content">
            @if($profil && $profil->isi_misi)
                {!! nl2br(e($profil->isi_misi)) !!}
            @else
                <ul class="misi-list">
                    <li class="misi-item">
                        <span class="misi-number">1</span>
                        <span class="misi-text">Menyediakan pendidikan berkualitas yang relevan dengan kebutuhan dunia kerja.</span>
                    </li>
                    <li class="misi-item">
                        <span class="misi-number">2</span>
                        <span class="misi-text">Mengembangkan kompetensi keahlian sesuai standar industri.</span>
                    </li>
                    <li class="misi-item">
                        <span class="misi-number">3</span>
                        <span class="misi-text">Membentuk karakter Islami yang kuat pada setiap peserta didik.</span>
                    </li>
                    <li class="misi-item">
                        <span class="misi-number">4</span>
                        <span class="misi-text">Meningkatkan prestasi akademik dan non-akademik secara berkelanjutan.</span>
                    </li>
                    <li class="misi-item">
                        <span class="misi-number">5</span>
                        <span class="misi-text">Membangun kerja sama dengan dunia industri dan dunia kerja (DUDI).</span>
                    </li>
                    <li class="misi-item">
                        <span class="misi-number">6</span>
                        <span class="misi-text">Mengembangkan sumber daya manusia yang profesional dan berakhlakul karimah.</span>
                    </li>
                    <li class="misi-item">
                        <span class="misi-number">7</span>
                        <span class="misi-text">Menerapkan teknologi informasi dan komunikasi dalam proses pembelajaran.</span>
                    </li>
                </ul>
            @endif
        </div>
    </div>

    <!-- Tujuan Section -->
    <div class="section mb-5">
        <div class="section-header">
            <h3 class="fw-bold mb-3">
                <span class="section-icon">📌</span> TUJUAN
            </h3>
        </div>
        <div class="section-content">
            <ul class="tujuan-list">
                <li class="tujuan-item">
                    <span class="tujuan-icon">✓</span>
                    <span>Menghasilkan lulusan yang kompeten di bidang keahliannya.</span>
                </li>
                <li class="tujuan-item">
                    <span class="tujuan-icon">✓</span>
                    <span>Menciptakan peserta didik yang berakhlak mulia dan berintegritas.</span>
                </li>
                <li class="tujuan-item">
                    <span class="tujuan-icon">✓</span>
                    <span>Meningkatkan daya saing lulusan di pasar kerja.</span>
                </li>
                <li class="tujuan-item">
                    <span class="tujuan-icon">✓</span>
                    <span>Mengembangkan budaya sekolah yang kondusif untuk pembelajaran.</span>
                </li>
                <li class="tujuan-item">
                    <span class="tujuan-icon">✓</span>
                    <span>Memperkuat linkage dengan industri dan dunia kerja.</span>
                </li>
            </ul>
        </div>
    </div>

    <!-- Sasaran Section -->
    <div class="section mb-5">
        <div class="section-header">
            <h3 class="fw-bold mb-3">
                <span class="section-icon">🎯</span> SASARAN
            </h3>
        </div>
        <div class="section-content">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="sasaran-card">
                        <h5 class="fw-bold mb-2">Sasaran Akademik</h5>
                        <ul class="sasaran-list">
                            <li>Peningkatan nilai rata-rata ujian sekolah</li>
                            <li>Peningkatan tingkat kelulusan</li>
                            <li>Peningkatan jumlah siswa lolos PTN</li>
                            <li>Peningkatan prestasi kompetisi akademik</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="sasaran-card">
                        <h5 class="fw-bold mb-2">Sasaran Non-Akademik</h5>
                        <ul class="sasaran-list">
                            <li>Peningkatan prestasi olahraga</li>
                            <li>Peningkatan prestasi seni dan budaya</li>
                            <li>Peningkatan partisipasi organisasi siswa</li>
                            <li>Peningkatan kegiatan ekstrakurikuler</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Motto Section -->
    <div class="section mb-5">
        <div class="section-header">
            <h3 class="fw-bold mb-3">
                <span class="section-icon">⭐</span> MOTTO
            </h3>
        </div>
        <div class="section-content">
            <div class="motto-box">
                <p class="motto-text">"BERIMAN, BERILMU, BERAKHLAK"</p>
            </div>
            <p class="mt-3 text-center text-secondary">
                Bermakna: Seluruh civitas akademika berkomitmen untuk meningkatkan keimanan, ilmu pengetahuan, dan akhlakul karimah dalam setiap aspek kehidupan.
            </p>
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

h3 {
    font-size: 1.5rem;
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

/* Section Styles */
.section {
    margin-bottom: 2rem;
}

.section-header {
    margin-bottom: 1rem;
}

.section-icon {
    margin-right: 10px;
}

/* Visi Box */
.visi-box {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.visi-text {
    font-size: 1.3rem;
    font-weight: 500;
    color: white;
    text-align: center;
    line-height: 1.8;
    margin: 0;
    font-style: italic;
}

/* Misi List */
.misi-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.misi-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 15px;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.misi-item:hover {
    background: #e9ecef;
    transform: translateX(5px);
}

.misi-number {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 35px;
    height: 35px;
    background: #667eea;
    color: white;
    border-radius: 50%;
    font-weight: bold;
    margin-right: 15px;
}

.misi-text {
    flex: 1;
    padding-top: 7px;
    color: #333;
}

/* Tujuan List */
.tujuan-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.tujuan-item {
    display: flex;
    align-items: center;
    margin-bottom: 12px;
    padding: 10px;
}

.tujuan-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 25px;
    height: 25px;
    background: #28a745;
    color: white;
    border-radius: 50%;
    font-size: 14px;
    margin-right: 12px;
}

/* Sasaran Card */
.sasaran-card {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 20px;
    height: 100%;
    border-left: 4px solid #667eea;
}

.sasaran-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sasaran-list li {
    margin-bottom: 8px;
    padding-left: 20px;
    position: relative;
}

.sasaran-list li::before {
    content: "•";
    color: #667eea;
    font-weight: bold;
    position: absolute;
    left: 0;
}

/* Motto Box */
.motto-box {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    border-radius: 15px;
    padding: 25px;
    text-align: center;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.motto-text {
    font-size: 1.8rem;
    font-weight: bold;
    color: white;
    margin: 0;
    letter-spacing: 3px;
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
