@php
    $fotoAda = $product->image && file_exists(public_path('assets/images/products/' . $product->image));
@endphp

<article class="product-card h-100">
    <a href="{{ route('products.show', $product->slug) }}" class="product-img">
        @if($fotoAda)
            <img src="{{ asset('assets/images/products/' . $product->image) }}" alt="{{ $product->name }}">
        @else
            <div class="product-noimg">
                <span>{{ $product->name }}</span>
                <small>Foto segera hadir</small>
            </div>
        @endif
    </a>
    <div class="product-body">
        <span class="product-label">{{ $product->label }}</span>
        <h5>{{ $product->name }}</h5>
        <p>{{ $product->description }}</p>
        <div class="product-spec">{{ $product->spec }}</div>
        <a href="{{ route('contact', ['produk' => $product->name]) }}#minta-penawaran" class="product-link">Tanya Produk &rarr;</a>
    </div>
</article>