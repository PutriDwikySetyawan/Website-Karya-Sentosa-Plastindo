<article class="product-card h-100">
    <a href="{{ route('products.show', $product->slug) }}" class="product-img">
        <img src="{{ asset('assets/images/products/' . $product->image) }}" alt="{{ $product->name }}"
             onerror="this.style.height='170px';this.style.background='#1b3a63'">
    </a>
    <div class="product-body">
        <span class="product-label">{{ $product->label }}</span>
        <h5>{{ $product->name }}</h5>
        <p>{{ $product->description }}</p>
        <div class="product-spec">{{ $product->spec }}</div>
        <a href="{{ route('contact', ['produk' => $product->name]) }}#minta-penawaran" class="product-link">Tanya Produk &rarr;</a>
    </div>
</article>