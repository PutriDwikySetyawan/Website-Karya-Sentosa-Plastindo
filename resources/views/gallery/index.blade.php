@extends('layouts.app')
@section('title', 'Galeri | ' . config('company.name'))

@section('content')
<section class="page-header">
    <div class="container">
        <span class="eyebrow">Galeri</span>
        <h1>Dokumentasi &amp; Fasilitas</h1>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row g-4">
            @forelse($galleries as $item)
                <div class="col-sm-6 col-lg-4">
                    <figure class="gallery-item">
                        <img src="{{ asset('assets/images/gallery/' . $item->image) }}" alt="{{ $item->title }}"
                             onerror="this.style.height='240px';this.style.background='#1b3a63'">
                        <figcaption><strong>{{ $item->title }}</strong><span>{{ $item->caption }}</span></figcaption>
                    </figure>
                </div>
            @empty
                <p class="text-muted">Galeri belum tersedia.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection