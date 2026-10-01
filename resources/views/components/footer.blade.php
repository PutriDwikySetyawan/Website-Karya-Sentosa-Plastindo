<footer class="site-footer">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-5">
                <h6 class="text-white fw-bold">{{ config('company.name') }}</h6>
                <p class="mb-0">Produsen jerigen dan drum plastik untuk kebutuhan kemasan industri.</p>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <h5 class="footer-title">Navigasi</h5>
                <ul class="list-unstyled small">
                    <li><a href="{{ route('products.index') }}">Produk</a></li>
                    <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                    <li><a href="{{ route('gallery.index') }}">Galeri</a></li>
                    <li><a href="{{ route('contact') }}">Kontak</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h5 class="footer-title">Kontak</h5>
                <p class="small mb-1"><i class="bi bi-whatsapp me-1"></i> {{ config('company.wa') }}</p>
                <p class="small mb-1"><i class="bi bi-envelope me-1"></i> {{ config('company.email') }}</p>
                <p class="small mb-0"><i class="bi bi-geo-alt me-1"></i> {{ config('company.address') }}</p>
            </div>
        </div>
        <hr class="border-secondary-subtle my-4">
        <p class="small mb-0 text-orange">&copy; {{ date('Y') }} {{ config('company.name') }}. Seluruh hak cipta dilindungi.</p>
    </div>
</footer>