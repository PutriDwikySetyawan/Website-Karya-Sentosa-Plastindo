<section class="hero">
    <div class="container">
        <div class="row align-items-center gy-5">
            <div class="col-lg-6">
                <span class="eyebrow eyebrow-bar">Produsen Kemasan Plastik Industri</span>
                <h1>Solusi Kemasan Plastik Industri yang Andal</h1>
                <p class="hero-text">PT Karya Sentosa Plastindo memproduksi jerigen dan drum plastik untuk mendukung kebutuhan kemasan industri Anda.</p>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('contact') }}#minta-penawaran" class="btn btn-orange">Konsultasi Produk</a>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-light-sq">Lihat Produk</a>
                </div>
            </div>
            <div class="col-lg-6">
               <div class="hero-photo">
                    {{-- Video hero: muted + playsinline wajib supaya autoplay jalan di browser dan HP --}}
                    <video class="hero-video" autoplay muted loop playsinline preload="auto"
                        aria-label="Kemasan untuk alur kerja industri Anda">
                        <source src="{{ asset('assets/videos/hero.mp4') }}" type="video/mp4">
                    </video>
                    <span class="hero-caption">Kemasan untuk alur kerja industri Anda</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="feature-strip">
    <div class="container">
        <div class="row g-0">
            @foreach([
                ['bi-shield-check', 'Kualitas Konsisten'],
                ['bi-box-seam', 'Kapasitas Produksi'],
                ['bi-truck', 'Pengiriman ke Seluruh Indonesia'],
                ['bi-headset', 'Layanan B2B'],
            ] as [$icon, $text])
                <div class="col-6 col-lg-3">
                    <div class="feature-item">
                        <i class="bi {{ $icon }}"></i>
                        <strong>{{ $text }}</strong>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>