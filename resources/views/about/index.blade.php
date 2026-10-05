@extends('layouts.app')
@section('title', 'Tentang Kami | ' . config('company.name'))

@section('content')
<section class="page-header">
    <div class="container">
        <span class="eyebrow">Tentang Perusahaan</span>
        <h1>{{ config('company.name') }}</h1>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row gy-4 align-items-center">
            <div class="col-lg-6">
                <img src="{{ asset('assets/images/about/about.jpg') }}" alt="Fasilitas produksi" class="img-fluid w-100"
                     onerror="this.style.minHeight='320px';this.style.background='#cfd8e3'">
            </div>
            <div class="col-lg-6">
                <x-section-title title="Kemasan plastik untuk kebutuhan industri" />
                <p class="text-muted">PT Karya Sentosa Plastindo adalah perusahaan manufaktur terkemuka di Pandaan, Pasuruan, Jawa Timur yang berspesialisasi dalam memproduksi kemasan plastik HDPE berkualitas seperti jerigen, drum, dan botol industri.
Didukung teknologi mesin injection dan blow moulding terkini serta sertifikasi ISO 9001:2015, kami menjamin kemasan yang kuat dan aman untuk menjaga integritas produk Anda. Kami selalu membuka ruang diskusi yang transparan sejak awal agar setiap spesifikasi kemasan yang Anda butuhkan dapat terwujud dengan presisi.</p>
        </div>

       <div class="row g-4 mt-4">
    <div class="col-md-6">
        <div class="value-card h-100">
            <i class="bi bi-bullseye"></i>
            <h6>Visi</h6>
            <p>Menjadi perusahaan yang unggul, terkemuka, dan terdepan dalam layanan dan kinerja.</p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="value-card h-100">
            <i class="bi bi-flag"></i>
            <h6>Misi</h6>
            <p>Membangun Karya Sentosa menjadi perusahaan yang memberikan nilai tambah bagi para pemangku kepentingan dengan:</p>
            {{-- Poin misi tampil sebagai daftar --}}
            <ul class="misi-list">
                <li>Menyediakan solusi produk dan sesuai prinsip berkelanjutan bagi setiap pelanggan.</li>
                <li>Memperhatikan keselamatan kerja dan kelestarian lingkungan.</li>
                <li>Membina kemampuan sumber daya manusia, berinovasi dan membangun jaringan yang kuat.</li>
            </ul>
        </div>
    </div>
</div>
<h3 class="heading-font h5 mt-5 mb-4 text-center">Tim Kami</h3>

@php
    // Data tim, ganti nama di sini kalau ada perubahan
    $divisi = [
        ['bi-calculator',        'Accounting & Pajak', 'Fatimatuszuhria Ulfa'],
        ['bi-cash-coin',         'Keuangan',           'Elisa Ulfah'],
        ['bi-megaphone',         'Marketing',          'Cici Ayuningtyas'],
        ['bi-gear-wide-connected','Produksi',          'Dedy Poerwanto, ST'],
        ['bi-cpu',               'Engineering',        'Budi Harianto'],
        ['bi-patch-check',       'Quality Control',    'Yudi Eko Budi S.'],
        ['bi-cart-check',        'Pembelian',          'Sucik Nurul A.'],
        ['bi-people',            'HRD',                'Sivio Ananta Firman'],
        ['bi-wrench',            'Maintenance',        'Priyatno Effendi'],
    ];

    // Gudang punya dua bagian di dalamnya
    $gudang = [
        ['Bahan Baku',  'Jefrry'],
        ['Barang Jadi', 'Masruri'],
    ];
@endphp

{{-- Direktur utama di tengah atas --}}
<div class="team-lead mx-auto mb-4">
    <i class="bi bi-person-badge"></i>
    <strong>Direktur Utama</strong>
    <span>Khusnul Qotimah</span>
</div>

{{-- Kartu divisi --}}
<div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3">
    @foreach($divisi as [$icon, $jabatan, $nama])
        <div class="col">
            <div class="team-card h-100">
                <i class="bi {{ $icon }}"></i>
                <strong>{{ $jabatan }}</strong>
                <span>{{ $nama }}</span>
            </div>
        </div>
    @endforeach

    {{-- Gudang: satu kartu berisi dua bagian --}}
    <div class="col">
        <div class="team-card h-100">
            <i class="bi bi-box-seam"></i>
            <strong>Gudang</strong>
            <ul class="team-sub">
                @foreach($gudang as [$bagian, $nama])
                    <li><small>{{ $bagian }}</small>{{ $nama }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
    </div>
</section>
@endsection