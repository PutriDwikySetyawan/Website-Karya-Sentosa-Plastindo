@extends('layouts.app')
@section('title', $product->name . ' | ' . config('company.name'))

@section('content')
@php
    $fotoAda = $product->image && file_exists(public_path('assets/images/products/' . $product->image));
@endphp

<section class="section">
    <div class="container">
        <a href="{{ route('products.index') }}" class="small text-decoration-none">&larr; Kembali ke produk</a>
        <div class="row gy-4 mt-1">
            <div class="col-lg-6">
                @if($fotoAda)
                    <img src="{{ asset('assets/images/products/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid w-100">
                @else
                    <div class="product-noimg" style="aspect-ratio:4/3">
                        <span>{{ $product->name }}</span>
                        <small>Foto segera hadir</small>
                    </div>
                @endif
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