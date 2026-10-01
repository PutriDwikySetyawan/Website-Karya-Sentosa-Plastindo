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
                <p class="text-muted">PT Karya Sentosa Plastindo adalah perusahaan yang memproduksi kemasan plastik berupa jerigen dan drum untuk kebutuhan industri. Kami membuka ruang diskusi agar kebutuhan kemasan Anda dapat dibahas secara jelas sejak awal.</p>
                <div class="note-box">Isi bagian ini dengan sejarah, visi, misi, dan profil perusahaan Anda.</div>
            </div>
        </div>

        <div class="row g-4 mt-4">
            <div class="col-md-6"><div class="value-card h-100"><i class="bi bi-bullseye"></i><h6>Visi</h6><p>Menjadi mitra kemasan plastik industri yang andal.</p></div></div>
            <div class="col-md-6"><div class="value-card h-100"><i class="bi bi-flag"></i><h6>Misi</h6><p>Menyediakan kemasan berkualitas konsisten dengan layanan komunikasi yang jelas.</p></div></div>
        </div>

        <h3 class="heading-font h5 mt-5 mb-3">Tim Kami</h3>
        <div class="row g-4">
            @foreach([['person-1.jpg', 'Nama Anggota 1', 'Jabatan'], ['person-2.jpg', 'Nama Anggota 2', 'Jabatan']] as [$img, $nm, $role])
                <div class="col-6 col-md-3 text-center">
                    <img src="{{ asset('assets/images/team/' . $img) }}" alt="{{ $nm }}" class="img-fluid mb-2"
                         onerror="this.style.minHeight='200px';this.style.background='#eef2f5'">
                    <strong class="d-block">{{ $nm }}</strong>
                    <span class="small text-muted">{{ $role }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection