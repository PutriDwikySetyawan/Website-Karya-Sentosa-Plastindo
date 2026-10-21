@php
    // struktur katalog dari config/katalog.php
    $katalog = config('katalog');
@endphp
<section class="section" id="produk">
    <div class="container">
        <x-section-title eyebrow="Katalog Produk"
            title="Kemasan yang mudah dipilih untuk kebutuhan operasional"
            subtitle="Jelajahi pilihan jerigen, botol PET, dan drum plastik kami. Hubungi tim untuk mendiskusikan ukuran, jumlah, dan ketersediaan." />

        <div class="filter-tabs mb-4" id="productFilter">
            <button class="active" data-filter="all">Semua Produk</button>
            @foreach($katalog as $slug => $kat)
                <button data-filter="{{ $slug }}">{{ $kat['label'] }}</button>
            @endforeach
        </div>

        <div class="row g-4">
            {{-- batasi maksimal 4 produk --}}
            @foreach($products->take(4) as $product)
                <div class="col-sm-6 col-lg-3 product-col" data-category="{{ $product->category }}">
                    @include('products.card', ['product' => $product])
                </div>
            @endforeach
        </div>

        {{-- ringkasan jenis per kategori (ukuran ada di filter halaman produk) --}}
        <div class="row g-4 mt-4">
            @foreach($katalog as $slug => $kat)
                <div class="col-md-4">
                    <h3 class="h6 mb-2">{{ $kat['label'] }}</h3>
                    @if(!empty($kat['jenis']))
                        <ul class="list-unstyled text-muted small mb-0">
                            @foreach($kat['jenis'] as $j)
                                <li>{{ $j['label'] }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted small mb-0">Berbagai ukuran, hubungi tim kami.</p>
                    @endif
                </div>
            @endforeach
        </div>

        {{-- link ke halaman produk --}}
        <div class="text-center mt-5">
            <a href="{{ route('products.index') }}" class="btn btn-primary">Lihat Semua Produk</a>
        </div>
    </div>
</section>