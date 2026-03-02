@extends('layouts.app')
@section('title', 'Sambutan Kepala Sekolah')
@section('content')

<div class="sambutan-wrapper">
    <div class="container py-5">

        <!-- Header -->
        <div class="header-section mb-5">
            <div class="header-accent"></div>
            <h2 class="page-title fw-bold mb-1">
                {{ optional($profil)->judul ?? 'Sambutan Kepala Sekolah' }}
            </h2>
            <p class="page-subtitle fst-italic">
                "Membangun Generasi Cerdas dan Berkarakter"
            </p>
        </div>

        <div class="row g-5">

            <!-- LEFT SIDE -->
            <div class="col-md-4 mb-4">
                <div class="profile-card">

                    <!-- FOTO -->
                    <div class="profile-img-wrap">
                        <img src="{{ asset('assets/' . (optional($profil)->gambar ?? 'udin.png')) }}"
                             alt="Kepala Sekolah">
                    </div>

                    <!-- INFO PROFIL -->
                    <div class="profile-info mt-3">
                        <h4 class="fw-bold mb-1">
                            {{ optional($profil)->nama ?? 'Drs. Budi Santoso' }}
                        </h4>

                        <p class="profile-role mb-3">
                            {{ optional($profil)->jabatan ?? 'Kepala Sekolah' }}
                        </p>

                        <div class="profile-detail">
                            <span>📋</span>
                        </div>

                        <div class="profile-detail">
                            <span>📧</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT SIDE -->
            <div class="col-md-8">
                <div class="sambutan-content">

                    

                    @if(optional($profil)->konten)
                        {!! nl2br(e($profil->konten)) !!}
                    
                    @endif

                </div>
            </div>

        </div>


    </div>
</div>


<style>

/* ================= BASE ================= */

body {
    font-family: 'Segoe UI', sans-serif;
    background: #f8f9fa;
    line-height: 1.8;
    color: #333;
}

.container {
    max-width: 1100px;
    margin: auto;
}

/* ================= HEADER ================= */

.header-section {
    position: relative;
    padding-left: 20px;
}

.header-accent {
    position: absolute;
    left: 0;
    top: 5px;
    width: 4px;
    height: 80%;
    background: linear-gradient(180deg,#1a5276,#2e86c1);
    border-radius: 4px;
}

.page-title {
    font-size: 28px;
    color: #1a2f4a;
}

.page-subtitle {
    font-size: 14px;
    color: #7f8c8d;
}

/* ================= PROFILE CARD ================= */

.profile-card {
    background: #fff;
    border-radius: 15px;
    padding: 25px;
    box-shadow: 0 5px 25px rgba(0,0,0,0.05);
    text-align: center;
}

.profile-img-wrap {
    width: 100%;
    max-width: 220px;
    aspect-ratio: 9/12;
    overflow: hidden;
    margin: auto;
    border-radius: 12px;
    border: 3px solid #e9ecef;
}

.profile-img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* supaya teks tidak mentok */
.profile-info,
.sambutan-content {
    word-wrap: break-word;
    overflow-wrap: break-word;
    word-break: break-word;
}

.profile-detail {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 6px;
    font-size: 14px;
    flex-wrap: wrap;
}

/* ================= SAMBUTAN ================= */

.sambutan-content {
    background: #fff;
    padding: 35px;
    border-radius: 15px;
    box-shadow: 0 5px 25px rgba(0,0,0,0.05);
    text-align: justify;
}

.salam {
    font-weight: 600;
    color: #1a5276;
    border-bottom: 1px dashed #ddd;
    padding-bottom: 10px;
    margin-bottom: 20px;
}

.quote-block {
    border-left: 4px solid #2e86c1;
    background: #eef6fc;
    padding: 15px 20px;
    border-radius: 0 10px 10px 0;
    margin: 20px 0;
    font-style: italic;
}

/* ================= TTD ================= */

.ttd-box {
    display: inline-block;
    background: #fff;
    padding: 15px 30px;
    border-radius: 12px;
    border: 1px solid #eee;
    box-shadow: 0 3px 15px rgba(0,0,0,0.05);
}

.footer-divider {
    border-top: 1px solid #ddd;
}

.footer-text {
    font-size: 13px;
    color: #888;
}

@media (min-width:768px){
    .row{
        display:flex;
        gap:30px;
    }
    .col-md-4{width:33%;}
    .col-md-8{width:67%;}
}

</style>

@endsection