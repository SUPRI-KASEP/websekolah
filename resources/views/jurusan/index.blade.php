@extends('layouts.app')
@section('title', 'Jurusan - SMK YPC')

@section('content')

{{-- Hero Section --}}
<section class="jurusan-hero">
    <div class="hero-bg-pattern"></div>
    <div class="hero-inner">
        <div class="hero-tag">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
            Program Keahlian
        </div>
        <h1 class="hero-title">Temukan <span class="hero-accent">Jurusan</span> Terbaikmu</h1>
        <p class="hero-sub">Pilih program keahlian yang sesuai minat dan bakat — kami siapkan kamu menjadi tenaga profesional siap industri.</p>
        <div class="hero-stats">
            <div class="stat-pill">
                <strong>{{ $jurusan->total() }}</strong>
                <span>Program Aktif</span>
            </div>
            <div class="stat-divider"></div>
            <div class="stat-pill">
                <strong>100%</strong>
                <span>Link & Match Industri</span>
            </div>
            <div class="stat-divider"></div>
            <div class="stat-pill">
                <strong>SMK</strong>
                <span>YPC Tasikmalaya</span>
            </div>
        </div>
    </div>
    <div class="hero-wave">
        <svg viewBox="0 0 1440 60" preserveAspectRatio="none"><path d="M0,0 C360,60 1080,60 1440,0 L1440,60 L0,60 Z" fill="#f4f7f9"/></svg>
    </div>
</section>

{{-- Card Grid --}}
<section class="jurusan-section">
    <div class="jurusan-container">

        @if($jurusan->isEmpty())
        <div class="empty-state">
            <div class="empty-icon">
                <svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
            </div>
            <h3>Belum Ada Jurusan</h3>
            <p>Silakan hubungi admin sekolah untuk informasi lebih lanjut.</p>
        </div>
        @else

        <div class="jurusan-grid">
            @foreach($jurusan as $index => $item)
            <div class="jurusan-card" style="animation-delay: {{ $index * 0.08 }}s">

                {{-- Image area --}}
                <div class="card-media">
                    @if($item->foto)
                        <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->nama_jurusan }}"
                             class="card-img" onerror="this.closest('.card-media').classList.add('no-img')">
                    @else
                        <div class="card-img-placeholder">
                            <svg width="52" height="52" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                        </div>
                    @endif

                    {{-- Logo overlay --}}
                    <div class="logo-badge">
                        @if($item->logo)
                            <img src="{{ Storage::url($item->logo) }}" alt="Logo {{ $item->nama_jurusan }}"
                                 onerror="this.closest('.logo-badge').innerHTML='<span class=\'logo-initials\'>{{ strtoupper(substr($item->kode_jurusan,0,2)) }}</span>'">
                        @else
                            <span class="logo-initials">{{ strtoupper(substr($item->kode_jurusan, 0, 2)) }}</span>
                        @endif
                    </div>

                    {{-- Status badge --}}
                    <div class="status-chip status-{{ $item->status }}">
                        <span class="status-dot"></span>
                        {{ ucfirst($item->status) }}
                    </div>
                </div>

                {{-- Body --}}
                <div class="card-body">
                    <div class="card-kode">{{ $item->kode_jurusan }}</div>
                    <h3 class="card-title">{{ $item->nama_jurusan }}</h3>

                    @if($item->ketua_jurusan)
                    <div class="card-ketua">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        {{ $item->ketua_jurusan }}
                    </div>
                    @endif

                    @if($item->deskripsi)
                    <p class="card-desc">{{ Str::limit($item->deskripsi, 110) }}</p>
                    @endif
                </div>

                {{-- Footer --}}
                <div class="card-footer">
                    <span class="card-more">Lihat Detail
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
                    </span>
                </div>

                {{-- Hover glow line --}}
                <div class="card-glow"></div>
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        @if($jurusan->hasPages())
        <div class="pagination-wrap">
            {{ $jurusan->appends(request()->query())->links('vendor.pagination.jurusan') }}
        </div>
        @endif

        @endif
    </div>
</section>

{{-- CTA Strip --}}
<section class="cta-strip">
    <div class="cta-inner">
        <div class="cta-text">
            <h3>Tertarik bergabung bersama kami?</h3>
            <p>Daftarkan diri sekarang dan mulai perjalanan kariermu.</p>
        </div>
        <a href="#" class="cta-btn">
            Daftar Sekarang
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
        </a>
    </div>
</section>

<style>
/* ── Variables matching SMK YPC palette ── */
:root {
    --navy:      #2c3e50;
    --navy-dk:   #1a252f;
    --navy-md:   #34495e;
    --teal:      #1abc9c;
    --teal-dk:   #17a589;
    --teal-lt:   #a8eddf;
    --bg:        #f4f7f9;
    --white:     #ffffff;
    --text:      #2c3e50;
    --muted:     #7f8c8d;
    --border:    #dde3e8;
    --radius:    16px;
    --shadow:    0 4px 24px rgba(44,62,80,.10);
    --shadow-lg: 0 12px 40px rgba(44,62,80,.18);
}

/* ── Hero ── */
.jurusan-hero {
    background: linear-gradient(135deg, var(--navy-dk) 0%, var(--navy) 55%, #1d6a5e 100%);
    padding: 72px 24px 80px;
    position: relative;
    overflow: hidden;
    text-align: center;
}
.hero-bg-pattern {
    position: absolute; inset: 0;
    background-image:
        radial-gradient(circle at 20% 30%, rgba(26,188,156,.18) 0%, transparent 50%),
        radial-gradient(circle at 80% 70%, rgba(26,188,156,.12) 0%, transparent 50%),
        repeating-linear-gradient(45deg, transparent, transparent 40px, rgba(255,255,255,.02) 40px, rgba(255,255,255,.02) 80px);
    pointer-events: none;
}
.hero-inner { position: relative; z-index: 1; max-width: 700px; margin: 0 auto; }
.hero-wave {
    position: absolute; bottom: -1px; left: 0; right: 0; height: 60px;
}
.hero-wave svg { width: 100%; height: 100%; display: block; }

.hero-tag {
    display: inline-flex; align-items: center; gap: 7px;
    background: rgba(26,188,156,.18); border: 1px solid rgba(26,188,156,.4);
    color: var(--teal-lt); border-radius: 100px;
    padding: 5px 16px; font-size: .78rem; font-weight: 600;
    letter-spacing: .4px; margin-bottom: 20px;
    font-family: 'Poppins', sans-serif;
}
.hero-title {
    font-family: 'Poppins', sans-serif;
    font-size: clamp(2rem, 5vw, 3rem);
    font-weight: 700; color: #fff;
    line-height: 1.2; margin-bottom: 16px;
    letter-spacing: -0.5px;
}
.hero-accent {
    color: var(--teal);
    position: relative; display: inline-block;
}
.hero-accent::after {
    content: '';
    position: absolute; bottom: -4px; left: 0; right: 0; height: 3px;
    background: var(--teal); border-radius: 4px; opacity: .6;
}
.hero-sub {
    color: rgba(255,255,255,.72); font-size: .97rem;
    line-height: 1.7; margin-bottom: 36px;
    font-family: 'Poppins', sans-serif;
}
.hero-stats {
    display: inline-flex; align-items: center; gap: 0;
    background: rgba(255,255,255,.08); border: 1px solid rgba(255,255,255,.15);
    border-radius: 100px; padding: 10px 28px; backdrop-filter: blur(8px);
}
.stat-pill { text-align: center; padding: 0 20px; }
.stat-pill strong { display: block; font-size: 1.2rem; font-weight: 700; color: var(--teal); font-family:'Poppins',sans-serif; }
.stat-pill span  { font-size: .7rem; color: rgba(255,255,255,.6); font-family:'Poppins',sans-serif; }
.stat-divider { width: 1px; height: 32px; background: rgba(255,255,255,.2); flex-shrink: 0; }

/* ── Section ── */
.jurusan-section { background: var(--bg); padding: 60px 0 80px; }
.jurusan-container { max-width: 1200px; margin: 0 auto; padding: 0 24px; }

/* ── Grid ── */
.jurusan-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 28px;
}

/* ── Card ── */
.jurusan-card {
    background: var(--white);
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    border: 1px solid var(--border);
    overflow: hidden;
    display: flex; flex-direction: column;
    position: relative;
    transition: transform .3s ease, box-shadow .3s ease;
    opacity: 0;
    animation: cardIn .5s ease forwards;
    cursor: default;
}
@keyframes cardIn {
    from { opacity:0; transform: translateY(20px); }
    to   { opacity:1; transform: translateY(0); }
}
.jurusan-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-lg);
}
.jurusan-card:hover .card-glow { opacity: 1; }
.card-glow {
    position: absolute; bottom: 0; left: 0; right: 0; height: 3px;
    background: linear-gradient(90deg, var(--teal), #2980b9);
    opacity: 0; transition: opacity .3s;
}

/* ── Media ── */
.card-media {
    height: 190px; position: relative; overflow: hidden;
    background: linear-gradient(135deg, #e8f4f0 0%, #d5eae3 100%);
    flex-shrink: 0;
}
.card-img {
    width: 100%; height: 100%; object-fit: cover;
    transition: transform .4s ease;
}
.jurusan-card:hover .card-img { transform: scale(1.04); }

.card-img-placeholder {
    width: 100%; height: 100%;
    display: flex; align-items: center; justify-content: center;
    background: linear-gradient(135deg, #ddeee9, #c8e4dd);
    color: var(--teal-dk); opacity: .5;
}

/* Logo badge */
.logo-badge {
    position: absolute; bottom: -20px; left: 20px;
    width: 52px; height: 52px;
    background: var(--white); border-radius: 12px;
    border: 2px solid var(--white);
    box-shadow: 0 4px 12px rgba(0,0,0,.15);
    overflow: hidden; display: flex; align-items: center; justify-content: center;
    z-index: 2;
}
.logo-badge img { width: 100%; height: 100%; object-fit: contain; padding: 4px; }
.logo-initials {
    font-family: 'Poppins', sans-serif;
    font-size: .75rem; font-weight: 700;
    color: var(--white);
    background: linear-gradient(135deg, var(--navy), var(--teal-dk));
    width: 100%; height: 100%;
    display: flex; align-items: center; justify-content: center;
    border-radius: 10px;
}

/* Status chip */
.status-chip {
    position: absolute; top: 12px; right: 12px;
    display: inline-flex; align-items: center; gap: 5px;
    padding: 4px 10px; border-radius: 100px;
    font-size: .7rem; font-weight: 600; letter-spacing: .3px;
    font-family: 'Poppins', sans-serif;
    backdrop-filter: blur(6px);
}
.status-aktif    { background: rgba(26,188,156,.85); color: #fff; }
.status-nonaktif { background: rgba(127,140,141,.85); color: #fff; }
.status-dot {
    width: 6px; height: 6px; border-radius: 50%; background: currentColor;
    opacity: .9;
}

/* ── Card Body ── */
.card-body {
    padding: 32px 20px 16px;
    flex: 1; display: flex; flex-direction: column; gap: 6px;
}
.card-kode {
    font-family: 'Poppins', sans-serif;
    font-size: .7rem; font-weight: 700;
    text-transform: uppercase; letter-spacing: 1.2px;
    color: var(--teal-dk);
    background: rgba(26,188,156,.10);
    border: 1px solid rgba(26,188,156,.25);
    display: inline-block; padding: 2px 10px; border-radius: 100px;
    width: fit-content;
}
.card-title {
    font-family: 'Poppins', sans-serif;
    font-size: 1.05rem; font-weight: 700;
    color: var(--navy); line-height: 1.35; margin: 4px 0 0;
}
.card-ketua {
    display: flex; align-items: center; gap: 6px;
    font-size: .78rem; color: var(--muted);
    font-family: 'Poppins', sans-serif;
}
.card-desc {
    font-size: .84rem; color: #5d6d7e;
    line-height: 1.65; margin-top: 4px;
    font-family: 'Poppins', sans-serif;
    flex: 1;
}

/* ── Card Footer ── */
.card-footer {
    padding: 12px 20px 18px;
    border-top: 1px solid var(--border);
    display: flex; align-items: center; justify-content: flex-end;
}
.card-more {
    display: inline-flex; align-items: center; gap: 5px;
    font-size: .8rem; font-weight: 600; color: var(--teal-dk);
    font-family: 'Poppins', sans-serif;
    cursor: pointer; transition: gap .2s;
}
.jurusan-card:hover .card-more { gap: 9px; }

/* ── Empty State ── */
.empty-state {
    text-align: center; padding: 80px 20px; color: var(--muted);
}
.empty-icon {
    width: 100px; height: 100px; border-radius: 50%;
    background: linear-gradient(135deg, #ddeee9, #c8e4dd);
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 24px; color: var(--teal-dk);
}
.empty-state h3 { font-family:'Poppins',sans-serif; font-size:1.3rem; color:var(--navy); margin-bottom:8px; }
.empty-state p  { font-family:'Poppins',sans-serif; font-size:.9rem; }

/* ── Pagination ── */
.pagination-wrap { margin-top: 52px; display: flex; justify-content: center; }
.pagination-wrap .pagination { gap: 6px; }
.pagination-wrap .page-link {
    border-radius: 8px !important;
    border: 1px solid var(--border);
    color: var(--navy);
    font-family: 'Poppins', sans-serif;
    font-size: .85rem; font-weight: 600;
    padding: 8px 14px;
    transition: all .2s;
}
.pagination-wrap .page-link:hover {
    background: var(--teal); border-color: var(--teal); color: #fff;
}
.pagination-wrap .page-item.active .page-link {
    background: var(--navy); border-color: var(--navy); color: #fff;
}

/* ── CTA ── */
.cta-strip {
    background: linear-gradient(135deg, var(--navy) 0%, #1d6a5e 100%);
    padding: 52px 24px;
    position: relative; overflow: hidden;
}
.cta-strip::before {
    content: '';
    position: absolute; inset: 0;
    background: radial-gradient(circle at 10% 50%, rgba(26,188,156,.2) 0%, transparent 60%);
    pointer-events: none;
}
.cta-inner {
    max-width: 900px; margin: 0 auto;
    display: flex; align-items: center; justify-content: space-between;
    gap: 24px; position: relative; z-index: 1;
    flex-wrap: wrap;
}
.cta-text h3 {
    font-family: 'Poppins', sans-serif;
    font-size: 1.4rem; font-weight: 700; color: #fff; margin-bottom: 6px;
}
.cta-text p { font-family:'Poppins',sans-serif; color:rgba(255,255,255,.7); font-size:.9rem; }
.cta-btn {
    display: inline-flex; align-items: center; gap: 9px;
    background: var(--teal); color: #fff;
    font-family: 'Poppins', sans-serif; font-weight: 700;
    font-size: .9rem; padding: 13px 28px; border-radius: 100px;
    text-decoration: none; white-space: nowrap;
    box-shadow: 0 6px 20px rgba(26,188,156,.4);
    transition: all .25s;
}
.cta-btn:hover {
    background: var(--teal-dk); color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 10px 28px rgba(26,188,156,.5);
}

/* ── Responsive ── */
@media (max-width: 768px) {
    .hero-stats { flex-direction: column; gap: 12px; border-radius: 16px; padding: 16px; }
    .stat-divider { width: 80px; height: 1px; }
    .jurusan-grid { grid-template-columns: 1fr; }
    .cta-inner { flex-direction: column; text-align: center; }
}
</style>

@endsection