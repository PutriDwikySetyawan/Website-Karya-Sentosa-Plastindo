@extends('layouts.app')
@section('title', 'Produk | ' . config('company.name'))

@section('content')
<section class="page-header">
    <div class="container">
        <span class="eyebrow">Katalog Produk</span>
        <h1>Jerigen &amp; Drum Plastik</h1>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="filter-tabs mb-4">
            <a href="{{ route('products.index') }}" class="{{ !$category ? 'active' : '' }}">Semua Produk</a>
            <a href="{{ route('products.index', ['kategori' => 'jerigen']) }}" class="{{ $category == 'jerigen' ? 'active' : '' }}">Jerigen</a>
            <a href="{{ route('products.index', ['kategori' => 'open-top']) }}" class="{{ $category == 'open-top' ? 'active' : '' }}">Open Top</a>
            <a href="{{ route('products.index', ['kategori' => 'drum-ring']) }}" class="{{ $category == 'drum-ring' ? 'active' : '' }}">Drum Ring</a>
        </div>

        <div class="row g-4">
            @forelse($products as $product)
                <div class="col-sm-6 col-lg-3">@include('products.card', ['product' => $product])</div>
            @empty
                <p class="text-muted">Produk belum tersedia.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection