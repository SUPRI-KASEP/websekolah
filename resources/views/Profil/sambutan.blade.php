@extends('layouts.app')
@section('title', 'Sambutan Kepala Sekolah')
@section('content')

<div class="container py-4">
    <!-- Header -->
    <h2 class="fw-bold mb-2">Sambutan Kepala Sekolah</h2>
    <p class="fst-italic text-secondary mb-4">"Membangun Generasi Cerdas dan Berkarakter"</p>
    
    <hr class="mb-4">

    <!-- Konten Utama -->
    <div class="row">
        <!-- Kolom Kiri: Foto dan Info -->
        <div class="col-md-4 mb-4">
            <!-- Container untuk gambar dengan rasio 9:16 -->
            <div style="width: 100%; max-width: 250px; aspect-ratio: 9/12; overflow: hidden; border: 1px solid #dee2e6; padding: 5px; background: #f8f9fa; border-radius: 20px;">
                <img src="{{ asset('assets/udin.png') }}" 
                     alt="Kepala Sekolah" 
                     style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
            </div>
            
            <h4 class="fw-bold mb-1 mt-3">Drs. Budi Santoso</h4>
            <p class="mb-2">Kepala Sekolah</p>
            <p class="mb-1">📞 NIP. 19651231 198603 1 045</p>
            <p class="mb-3">📧 kepsek@sdncontoh.sch.id</p>
        </div>
        
        <!-- Kolom Kanan: Teks Sambutan -->
        <div class="col-md-8">
            <p class="mb-3">Assalamu'alaikum Warahmatullahi Wabarakatuh,</p>
            
            <p class="mb-3">Puji syukur kita panjatkan ke hadirat Tuhan Yang Maha Esa, karena atas rahmat dan karunia-Nya, kita semua masih diberikan kesehatan dan kesempatan untuk terus berkarya dalam dunia pendidikan.</p>
            
            <p class="mb-3 fst-italic">"Selamat datang di website resmi SD Negeri Contoh Sekolah. Website ini kami hadirkan sebagai media informasi dan komunikasi antara sekolah, siswa, orang tua, dan masyarakat luas."</p>
            
            <p class="mb-3">Kami berharap dengan adanya website ini, informasi mengenai kegiatan dan perkembangan sekolah dapat diakses dengan mudah dan transparan. Kami berkomitmen untuk terus meningkatkan kualitas pendidikan dan pelayanan kepada siswa.</p>
            
            <p class="mb-3">Dengan dukungan tenaga pendidik yang kompeten dan fasilitas yang memadai, kami optimis dapat mencetak generasi yang cerdas, berkarakter, dan siap menghadapi tantangan masa depan.</p>
        </div>
    </div>

    <!-- List Informasi -->
    <div class="row mt-3">
        <div class="col-md-4">
            <p class="mb-2"><strong>• 30+ Tenaga Pendidik</strong></p>
        </div>
        <div class="col-md-4">
            <p class="mb-2"><strong>• 500+ Siswa Aktif</strong></p>
        </div>
        <div class="col-md-4">
            <p class="mb-2"><strong>• 15 Ruang Kelas</strong></p>
        </div>
    </div>
    
    <div class="row mb-4">
        <div class="col-md-4">
            <p class="mb-2"><strong>• Akreditasi A</strong></p>
        </div>
    </div>

    <!-- Penutup -->
    <p class="mb-3">Akhir kata, kami mengucapkan terima kasih atas kepercayaan masyarakat kepada SD Negeri Contoh Sekolah. Kritik dan saran yang membangun selalu kami nantikan untuk kemajuan sekolah kita tercinta.</p>
    
    <p class="mb-4">Wassalamu'alaikum Warahmatullahi Wabarakatuh.</p>

    <!-- Tanda Tangan -->
    <div class="mb-5">
        <h5 class="fw-bold mb-1">Drs. Budi Santoso</h5>
        <p>Kepala Sekolah</p>
    </div>

    <hr class="mb-5">

    <!-- Sejarah Sekolah -->
    <h2 class="fw-bold mb-2">Sejarah Sekolah</h2>
    <p class="fst-italic text-secondary mb-4">Perjalanan panjang SD Negeri Contoh Sekolah</p>

    <!-- Timeline Sejarah -->
    <div class="row mb-4">
        <div class="col-md-3">
            <p class="fw-bold mb-1">1985</p>
            <p class="text-secondary">Berdirinya sekolah</p>
        </div>
        <div class="col-md-3">
            <p class="fw-bold mb-1">1995</p>
            <p class="text-secondary">Renovasi gedung</p>
        </div>
        <div class="col-md-3">
            <p class="fw-bold mb-1">2010</p>
            <p class="text-secondary">Akreditasi A</p>
        </div>
        <div class="col-md-3">
            <p class="fw-bold mb-1">2024</p>
            <p class="text-secondary">Sekolah unggulan</p>
        </div>
    </div>

    <!-- Teks Sejarah -->
    <p class="mb-3">SD Negeri Contoh Sekolah, yang terletak di Jalan Pendidikan No. 123, Kota Contoh, Jawa Barat, merupakan sekolah negeri yang berdiri sejak tahun 1985. Dengan akreditasi A berdasarkan SK No. 123/BAN-SM/SK/2010, SD Negeri Contoh Sekolah berkomitmen untuk menyediakan pendidikan berkualitas tinggi bagi para siswanya.</p>
    
    <p class="mb-5">Sekolah ini berada di bawah naungan Kementerian Pendidikan dan Kebudayaan dan memiliki sistem penyelenggaraan pendidikan yang terus berkembang mengikuti kemajuan zaman. Dengan berbagai program unggulan dan dukungan tenaga pendidik yang profesional, SD Negeri Contoh Sekolah terus berupaya mencetak lulusan yang cerdas, berkarakter, dan mampu bersaing di masa depan.</p>

    <!-- Footer -->
    <hr class="mb-3">
    <p class="text-secondary text-center small">SD Negeri Contoh Sekolah • Website resmi sekolah</p>
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

h1, h2, h4, h5 {
    color: #212529;
}

h1 {
    font-size: 2.2rem;
}

h2 {
    font-size: 1.8rem;
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

.row {
    display: flex;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}

.col-md-3, .col-md-4, .col-md-8 {
    position: relative;
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
}

@media (min-width: 768px) {
    .col-md-3 {
        flex: 0 0 25%;
        max-width: 25%;
    }
    .col-md-4 {
        flex: 0 0 33.333333%;
        max-width: 33.333333%;
    }
    .col-md-8 {
        flex: 0 0 66.666667%;
        max-width: 66.666667%;
    }
}

.mb-1 { margin-bottom: 0.25rem; }
.mb-2 { margin-bottom: 0.5rem; }
.mb-3 { margin-bottom: 1rem; }
.mb-4 { margin-bottom: 1.5rem; }
.mb-5 { margin-bottom: 3rem; }
.mt-3 { margin-top: 1rem; }
</style>

@endsection