@extends('layouts.app')
@section('title', 'Kontak - SMK YPC Tasikmalaya')
@section('content')

<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap');

:root {
    --ink:        #0d1b2a;
    --ink-mid:    #1c3144;
    --ink-soft:   #2e4a63;
    --accent:     #e8a87c;
    --accent-dark:#c4834a;
    --white:      #ffffff;
    --off-white:  #f5f3ef;
    --light-bg:   #fafaf8;
    --text-body:  #4a5568;
    --text-muted: #718096;
    --border:     #e2e8f0;
    --shadow-sm:  0 2px 8px rgba(13,27,42,0.06);
    --shadow-md:  0 8px 30px rgba(13,27,42,0.10);
    --shadow-lg:  0 20px 60px rgba(13,27,42,0.14);
    --radius:     16px;
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

.kontak-wrapper {
    font-family: 'DM Sans', sans-serif;
    background: var(--light-bg);
    min-height: 100vh;
    color: var(--text-body);
}

/* ===== HERO ===== */
.kontak-hero {
    position: relative;
    background: var(--ink);
    padding: 100px 24px 90px;
    text-align: center;
    overflow: hidden;
}

.hero-bg-grid {
    position: absolute;
    inset: 0;
    background-image:
        linear-gradient(rgba(232,168,124,0.04) 1px, transparent 1px),
        linear-gradient(90deg, rgba(232,168,124,0.04) 1px, transparent 1px);
    background-size: 60px 60px;
    pointer-events: none;
}

.hero-orb {
    position: absolute;
    border-radius: 50%;
    filter: blur(80px);
    pointer-events: none;
}
.hero-orb-1 {
    width: 400px; height: 400px;
    background: radial-gradient(circle, rgba(232,168,124,0.15) 0%, transparent 70%);
    top: -100px; left: -80px;
}
.hero-orb-2 {
    width: 320px; height: 320px;
    background: radial-gradient(circle, rgba(46,74,99,0.5) 0%, transparent 70%);
    bottom: -60px; right: -40px;
}

.hero-inner {
    position: relative;
    z-index: 2;
    max-width: 640px;
    margin: 0 auto;
    animation: fadeUp 0.9s ease both;
}

.hero-eyebrow {
    display: inline-block;
    font-size: 0.72rem;
    font-weight: 600;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    color: var(--accent);
    border: 1px solid rgba(232,168,124,0.3);
    padding: 6px 18px;
    border-radius: 100px;
    margin-bottom: 24px;
    background: rgba(232,168,124,0.08);
}

.kontak-hero h1 {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(2.2rem, 5vw, 3.4rem);
    font-weight: 700;
    color: var(--white);
    line-height: 1.15;
    letter-spacing: -0.5px;
    margin-bottom: 16px;
}

.kontak-hero h1 span { color: var(--accent); }

.kontak-hero p {
    color: rgba(255,255,255,0.7);
    font-size: 1rem;
    line-height: 1.75;
    font-weight: 300;
}

/* ===== MAP ===== */
.map-section {
    width: 100%;
    height: 300px;
    overflow: hidden;
    background: #d1d5db;
}

.map-section iframe {
    width: 100%;
    height: 100%;
    border: none;
    display: block;
}

/* ===== MAIN CONTENT ===== */
.kontak-content {
    padding: 80px 24px 100px;
    max-width: 1160px;
    margin: 0 auto;
}

.kontak-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 56px;
    align-items: start;
}

/* ===== LEFT: INFO ===== */
.kontak-info-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(1.8rem, 3vw, 2.4rem);
    font-weight: 700;
    color: var(--ink);
    margin-bottom: 14px;
    letter-spacing: -0.3px;
}

.kontak-info-title span { color: var(--accent-dark); }

.kontak-info-desc {
    color: var(--text-muted);
    font-size: 0.97rem;
    line-height: 1.8;
    margin-bottom: 36px;
    font-weight: 300;
}

.info-cards {
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.info-card {
    display: flex;
    align-items: center;
    gap: 18px;
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 20px 22px;
    box-shadow: var(--shadow-sm);
    transition: all 0.25s ease;
    position: relative;
    overflow: hidden;
}

.info-card::before {
    content: '';
    position: absolute;
    left: 0; top: 0; bottom: 0;
    width: 4px;
    background: linear-gradient(to bottom, var(--accent), var(--accent-dark));
    opacity: 0;
    transition: opacity 0.25s ease;
}

.info-card:hover {
    transform: translateX(6px);
    box-shadow: var(--shadow-md);
    border-color: rgba(232,168,124,0.3);
}

.info-card:hover::before { opacity: 1; }

.info-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    background: rgba(232,168,124,0.12);
    border: 1px solid rgba(232,168,124,0.25);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    font-size: 20px;
    color: var(--accent-dark);
    transition: background 0.25s ease;
}

.info-card:hover .info-icon {
    background: rgba(232,168,124,0.2);
}

.info-text { flex: 1; min-width: 0; }

.info-label {
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: var(--accent-dark);
    margin-bottom: 4px;
}

.info-value {
    font-size: 0.92rem;
    font-weight: 500;
    color: var(--ink);
    word-break: break-word;
    line-height: 1.4;
}

/* ===== RIGHT: FORM ===== */
.kontak-form-wrap {
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 36px 32px;
    box-shadow: var(--shadow-md);
    position: relative;
    overflow: hidden;
}

.kontak-form-wrap::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--accent-dark), var(--accent));
}

.form-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 1.4rem;
    font-weight: 700;
    color: var(--ink);
    margin-bottom: 6px;
}

.form-subtitle {
    font-size: 0.85rem;
    color: var(--text-muted);
    margin-bottom: 28px;
    line-height: 1.6;
}

.form-group {
    margin-bottom: 16px;
}

.form-group input,
.form-group textarea {
    width: 100%;
    background: var(--light-bg);
    border: 1px solid var(--border);
    border-radius: 10px;
    padding: 13px 16px;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.9rem;
    color: var(--ink);
    outline: none;
    transition: border-color 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
    resize: none;
}

.form-group input::placeholder,
.form-group textarea::placeholder {
    color: var(--text-muted);
    font-weight: 300;
}

.form-group input:focus,
.form-group textarea:focus {
    border-color: var(--accent);
    background: var(--white);
    box-shadow: 0 0 0 3px rgba(232,168,124,0.15);
}

.form-group textarea {
    height: 130px;
}

.btn-kirim {
    width: 100%;
    background: var(--ink);
    color: var(--white);
    border: none;
    border-radius: 10px;
    padding: 15px 24px;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    cursor: pointer;
    transition: all 0.25s ease;
    margin-top: 6px;
    position: relative;
    overflow: hidden;
}

.btn-kirim::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, var(--accent-dark), var(--accent));
    opacity: 0;
    transition: opacity 0.25s ease;
}

.btn-kirim:hover::after { opacity: 1; }
.btn-kirim span { position: relative; z-index: 1; }

.btn-kirim:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(196,131,74,0.4);
}

.btn-kirim:active { transform: translateY(0); }

/* ===== ANIMATION ===== */
@keyframes fadeUp {
    from { opacity: 0; transform: translateY(28px); }
    to { opacity: 1; transform: translateY(0); }
}

/* ===== RESPONSIVE ===== */
@media (max-width: 900px) {
    .kontak-grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }
}

@media (max-width: 768px) {
    .kontak-hero { padding: 72px 20px 64px; }
    .kontak-content { padding: 52px 16px 72px; }
    .map-section { height: 220px; }
    .kontak-form-wrap { padding: 24px 20px; }
}

@media (max-width: 480px) {
    .info-card { padding: 16px; }
    .info-icon { width: 40px; height: 40px; font-size: 17px; }
}
</style>

<div class="kontak-wrapper">

    {{-- Hero --}}
    <section class="kontak-hero">
        <div class="hero-bg-grid"></div>
        <div class="hero-orb hero-orb-1"></div>
        <div class="hero-orb hero-orb-2"></div>
        <div class="hero-inner">
            <span class="hero-eyebrow">✦ Hubungi Kami</span>
            <h1>Kami Siap <span>Membantu</span></h1>
            <p>Jangan ragu untuk menghubungi kami. Kami dengan senang hati menjawab setiap pertanyaan Anda</p>
        </div>
    </section>

    {{-- Google Maps tile + Leaflet marker merah --}}
    <section class="map-section">
        <div id="map-smkypc" style="width:100%;height:300px;"></div>
    </section>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        (function() {
            var map = L.map('map-smkypc', { zoomControl: true, scrollWheelZoom: false })
                       .setView([-7.3608, 108.1062], 17);

            L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                subdomains: ['mt0','mt1','mt2','mt3'],
                attribution: '&copy; Google Maps'
            }).addTo(map);

            var redIcon = L.icon({
                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                shadowUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            });

            L.marker([-7.3608, 108.1062], { icon: redIcon })
             .addTo(map)
             .bindPopup('<strong>SMK YPC Tasikmalaya</strong><br>Jl. Komplek Pesantren Cintawana,<br>Cikunten, Singaparna, Tasikmalaya')
             .openPopup();
        })();
    </script>

    {{-- Content --}}
    <section class="kontak-content">
        <div class="kontak-grid">

            {{-- Left: Info Kontak --}}
            <div class="kontak-info">
                <h2 class="kontak-info-title">Hubungi <span>Kami</span></h2>
                <p class="kontak-info-desc">
                    Kami siap membantu Anda! Jika Anda memiliki pertanyaan seputar pendaftaran,
                    program sekolah, atau informasi lainnya, jangan ragu untuk menghubungi kami melalui
                </p>

                <div class="info-cards">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="info-text">
                            <div class="info-label">Phone Number</div>
                            <div class="info-value">62265546717</div>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info-text">
                            <div class="info-label">Email</div>
                            <div class="info-value">smkypctasikmalaya@gmail.com</div>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div class="info-text">
                            <div class="info-label">WhatsApp</div>
                            <div class="info-value">08112224563</div>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-text">
                            <div class="info-label">Alamat</div>
                            <div class="info-value">
                                Jl. Raya Mangunreja No. 73, Cikunten Singaparna<br>
                                Tasikmalaya Jawa Barat 46414 Indonesia
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right: Form --}}
            <div class="kontak-form-wrap">
                <h3 class="form-title">Kritik & Saran</h3>
                <p class="form-subtitle">Sampaikan pertanyaan, kritik, atau saran Anda kepada kami</p>

                <form action="{{ route('kontak.kirim') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="nama" placeholder="Tulis Nama Anda" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Alamat Email Anda" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="whatsapp" placeholder="No. WhatsApp">
                    </div>
                    <div class="form-group">
                        <textarea name="pesan" placeholder="Isi Saran dan Kritik Anda Disini" required></textarea>
                    </div>
                    <button type="submit" class="btn-kirim">
                        <span>Kirim Kritik dan Saran</span>
                    </button>
                </form>
            </div>

        </div>
    </section>

</div>
@endsection