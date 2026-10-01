@extends('layouts.app')
@section('title', 'Kontak | ' . config('company.name'))

@section('content')
<section class="page-header">
    <div class="container">
        <span class="eyebrow">Kontak</span>
        <h1>Hubungi Kami</h1>
    </div>
</section>

<section class="section" id="minta-penawaran">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-5">
                <x-section-title title="Informasi Kontak" subtitle="Tim kami siap membantu kebutuhan kemasan plastik industri Anda." />
                <ul class="contact-list text-dark">
                    <li><i class="bi bi-building"></i> {{ config('company.name') }}</li>
                    <li><i class="bi bi-geo-alt"></i> {{ config('company.address') }}</li>
                    <li><i class="bi bi-whatsapp"></i> {{ config('company.wa') }}</li>
                    <li><i class="bi bi-envelope"></i> {{ config('company.email') }}</li>
                </ul>
                <div class="d-flex gap-2 mt-3">
                    <a href="https://wa.me/{{ config('company.wa') }}" target="_blank" rel="noopener" class="btn btn-orange">WhatsApp Kami</a>
                    <a href="mailto:{{ config('company.email') }}" class="btn btn-navy">Kirim Email</a>
                </div>
            </div>
            <div class="col-lg-7">
                @include('contact.form')
            </div>
        </div>
    </div>
</section>

{{-- GOOGLE MAPS --}}
<section class="pb-0">
    <div class="container mb-4">
        <x-section-title eyebrow="Lokasi" title="Temukan Kami di Peta" />
    </div>
    <div class="map-wrap">
        <iframe
            src="https://www.google.com/maps?q={{ urlencode(config('company.maps')) }}&output=embed"
            width="100%" height="450" style="border:0" allowfullscreen loading="lazy"
            referrerpolicy="no-referrer-when-downgrade" title="Lokasi {{ config('company.name') }}"></iframe>
    </div>
</section>
@endsection