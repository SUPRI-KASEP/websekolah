@extends('layouts.app')
@section('title', 'Profil Sekolah')
@section('content')

<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap');

:root {
    --ink:#0d1b2a;
    --ink-mid:#1c3144;
    --accent:#e8a87c;
    --accent-dark:#c4834a;
    --white:#ffffff;
    --off-white:#f5f3ef;
    --light-bg:#fafaf8;
    --text-body:#4a5568;
    --text-muted:#718096;
    --border:#e2e8f0;
    --shadow-sm:0 2px 8px rgba(13,27,42,0.06);
    --shadow-md:0 8px 30px rgba(13,27,42,0.10);
    --shadow-lg:0 20px 60px rgba(13,27,42,0.14);
    --radius:16px;
}

*{box-sizing:border-box;margin:0;padding:0}

.profil-wrapper{
    font-family:'DM Sans',sans-serif;
    background:var(--light-bg);
    min-height:100vh;
}

/* HERO */
.profil-hero{
    background:var(--ink);
    padding:80px 24px;
    text-align:center;
    color:white;
}

.hero-title{
    font-family:'Playfair Display',serif;
    font-size:clamp(2rem,5vw,3rem);
    font-weight:700;
}

.hero-subtitle{
    opacity:.7;
    font-style:italic;
}

/* SECTION */
.profil-main{
    max-width:1200px;
    margin:auto;
    padding:60px 24px;
}

.section-header{
    text-align:center;
    margin-bottom:50px;
}

.section-header h2{
    font-family:'Playfair Display',serif;
    font-size:2rem;
    color:var(--ink);
}

/* MENU GRID */
.menu-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:24px;
}

@media(max-width:992px){
    .menu-grid{grid-template-columns:repeat(2,1fr);}
}
@media(max-width:576px){
    .menu-grid{grid-template-columns:1fr;}
}

.menu-card{
    background:white;
    border-radius:var(--radius);
    border:1px solid var(--border);
    padding:30px 20px;
    text-align:center;
    text-decoration:none;
    color:inherit;
    transition:.3s;
    box-shadow:var(--shadow-md);
}

.menu-card:hover{
    transform:translateY(-6px);
    box-shadow:var(--shadow-lg);
    border-color:var(--accent);
}

.menu-icon{
    font-size:38px;
    margin-bottom:15px;
}

.menu-title{
    font-weight:700;
    margin-bottom:8px;
}

.menu-desc{
    font-size:.85rem;
    color:var(--text-muted);
}

/* STRUKTUR GRID MODERN */
.struktur-preview{
    background:white;
    padding:48px;
    border-radius:var(--radius);
    border:1px solid var(--border);
    box-shadow:var(--shadow-md);
}

.struktur-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:24px;
}

@media(max-width:992px){
    .struktur-grid{grid-template-columns:repeat(2,1fr);}
}
@media(max-width:576px){
    .struktur-grid{grid-template-columns:1fr;}
}

.org-card{
    background:white;
    border:1px solid var(--border);
    border-radius:var(--radius);
    padding:28px 20px;
    text-align:center;
    transition:.3s;
    box-shadow:var(--shadow-sm);
}

.org-card:hover{
    transform:translateY(-6px);
    box-shadow:var(--shadow-lg);
    border-color:var(--accent);
}

.org-img{
    width:90px;
    height:90px;
    border-radius:50%;
    object-fit:cover;
    margin-bottom:16px;
    border:4px solid var(--off-white);
}

.org-name{
    font-family:'Playfair Display',serif;
    font-weight:700;
    font-size:1rem;
    color:var(--ink);
    margin-bottom:5px;
}

.org-jabatan{
    font-size:.85rem;
    color:var(--text-muted);
}

.empty-card{
    text-align:center;
    padding:40px;
    background:var(--off-white);
    border-radius:var(--radius);
    border:1px dashed var(--border);
    color:var(--text-muted);
}
</style>

<div class="profil-wrapper">

    {{-- HERO --}}
    <section class="profil-hero">
        <h1 class="hero-title">Profil Sekolah</h1>
        <p class="hero-subtitle">"Membangun Generasi Cerdas dan Berkarakter"</p>
    </section>

    <div class="profil-main">

        {{-- MENU PROFIL --}}
        <div class="section-header">
            <h2>Menu Profil</h2>
        </div>

        <div class="menu-grid">
            @foreach($profils as $profil)
                <a href="{{ route('profil.menu', $profil->nama_menu) }}" class="menu-card">
                    <div class="menu-icon">
                        @switch($profil->nama_menu)
                            @case('sambutan') 👨‍🏫 @break
                            @case('visi-misi') 🎯 @break
                            @case('struktur-organisasi') 🏛️ @break
                            @case('sejarah') 📜 @break
                            @default 📋
                        @endswitch
                    </div>
                    <div class="menu-title">{{ $profil->judul }}</div>
                    <div class="menu-desc">
                        Klik untuk melihat detail {{ strtolower($profil->judul) }}
                    </div>
                </a>
            @endforeach
        </div>

        {{-- STRUKTUR ORGANISASI --}}
        <div style="margin-top:100px" class="section-header">
            <h2>Struktur Organisasi</h2>
        </div>

        <div class="struktur-preview">
            @if(isset($strukturs) && $strukturs->count())
                <div class="struktur-grid">
                    @foreach($strukturs->take(4) as $item)
                        <div class="org-card">
                            @if($item->gambar)
                                <img src="{{ asset('assets/'.$item->gambar) }}" 
                                     alt="{{ $item->judul }}" 
                                     class="org-img">
                            @else
                                <img src="{{ asset('assets/udin.png') }}" 
                                     alt="Foto" 
                                     class="org-img">
                            @endif

                            <div class="org-name">
                                {!! nl2br(e($item->judul)) !!}
                            </div>

                            <div class="org-jabatan">
                                {{ $item->jabatan ?? '-' }}
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-card">
                    Data struktur organisasi belum tersedia.
                </div>
            @endif
        </div>

    </div>

</div>

@endsection