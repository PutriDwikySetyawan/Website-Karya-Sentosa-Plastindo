<section class="section" id="produk">
    <div class="container">
        <x-section-title eyebrow="Katalog Produk"
            title="Kemasan yang mudah dipilih untuk kebutuhan operasional"
            subtitle="Jelajahi pilihan jerigen dan drum plastik kami. Hubungi tim untuk mendiskusikan ukuran, jumlah, dan ketersediaan." />

        <div class="filter-tabs mb-4" id="productFilter">
            <button class="active" data-filter="all">Semua Produk</button>
            <button data-filter="jerigen">Jerigen</button>
            <button data-filter="open-top">Open Top</button>
            <button data-filter="drum-ring">Drum Ring</button>
        </div>

        <div class="row g-4">
            @foreach($products as $product)
                <div class="col-sm-6 col-lg-3 product-col" data-category="{{ $product->category }}">
                    @include('products.card', ['product' => $product])
                </div>
            @endforeach
        </div>
    </div>
</section>