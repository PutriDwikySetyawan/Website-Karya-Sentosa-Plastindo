@extends('layouts.app')
@section('title', $product->name . ' | ' . config('company.name'))

@section('content')
<section class="section">
    <div class="container">
        <a href="{{ route('products.index') }}" class="small text-decoration-none">&larr; Kembali ke produk</a>
        <div class="row gy-4 mt-1">
            <div class="col-lg-6">
                <img src="{{ asset('assets/images/products/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid w-100"
                     onerror="this.style.minHeight='320px';this.style.background='#1b3a63'">
            </div>
            <div class="col-lg-6">
                <span class="eyebrow">{{ $product->label }}</span>
                <h1 class="h2 heading-font">{{ $product->name }}</h1>
                <p class="text-muted">{{ $product->description }}</p>
                <div class="note-box mb-3">{{ $product->spec }}</div>
                <a href="{{ route('contact', ['produk' => $product->name]) }}#minta-penawaran" class="btn btn-orange">Minta Penawaran</a>
                <a href="https://wa.me/{{ config('company.wa') }}?text={{ urlencode('Halo, saya ingin menanyakan ' . $product->name) }}" target="_blank" rel="noopener" class="btn btn-navy ms-1">WhatsApp</a>
            </div>
        </div>

        @if($related->count())
            <h3 class="heading-font h5 mt-5 mb-3">Produk Lainnya</h3>
            <div class="row g-4">
                @foreach($related as $item)
                    <div class="col-sm-6 col-lg-4">@include('products.card', ['product' => $item])</div>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection