@php
    // struktur katalog dari config/katalog.php
    $katalog = config('katalog');
@endphp
<section class="section" id="produk">
    <div class="container">
        <x-section-title eyebrow="Katalog Produk"
            title="Kemasan yang mudah dipilih untuk kebutuhan operasional"
            subtitle="Jelajahi pilihan drum plastik, jerigen, dan tutup jerigen kami. Hubungi tim untuk mendiskusikan ukuran, jumlah, dan ketersediaan." />

        <div class="filter-tabs mb-4" id="productFilter">
            <button class="active" data-filter="all">Semua Produk</button>
            @foreach($katalog as $slug => $kat)
                <button data-filter="{{ $slug }}">{{ $kat['label'] }}</button>
            @endforeach
        </div>

        <div class="row g-4">
            {{-- maksimal 4 produk per kategori, urutan kategori mengikuti config/katalog.php --}}
            @foreach($products->groupBy('category')->flatMap(fn ($items) => $items->take(4)) as $product)
                <div class="col-sm-6 col-lg-3 product-col" data-category="{{ $product->category }}">
                    @include('products.card', ['product' => $product])
                </div>
            @endforeach
        </div>

        {{-- link ke halaman produk --}}
        <div class="text-center mt-5">
            <a href="{{ route('products.index') }}" class="btn btn-primary">Lihat Semua Produk</a>
        </div>
    </div>
</section>