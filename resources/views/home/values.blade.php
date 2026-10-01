{{-- MENGAPA MEMILIH KAMI --}}
<section class="section section-light">
    <div class="container">
        <div class="row gy-4 align-items-start">
            <div class="col-lg-5">
                <x-section-title eyebrow="Mengapa Memilih Kami"
                    title="Mendukung proses pengadaan yang lebih jelas"
                    subtitle="Kami membantu pembelian bisnis memulai dari pilihan produk hingga komunikasi kebutuhan pesanan." />
            </div>
            <div class="col-lg-7">
                <div class="row g-3">
                    @foreach([
                        ['bi-rulers', 'Pilihan Ukuran', 'Pilihan kapasitas jerigen dan drum untuk disesuaikan dengan kebutuhan Anda.'],
                        ['bi-building', 'Fokus Industri', 'Produk dirancang sebagai kemasan untuk konteks kebutuhan operasional industri.'],
                        ['bi-chat-square-text', 'Komunikasi Jelas', 'Diskusikan produk, kapasitas, perkiraan jumlah, dan kebutuhan pengiriman dengan lebih terarah.'],
                        ['bi-headset', 'Konsultasi Produk', 'Tim kami siap membantu memulai pembahasan kebutuhan kemasan Anda.'],
                    ] as [$icon, $title, $text])
                        <div class="col-md-6">
                            <div class="value-card h-100">
                                <i class="bi {{ $icon }}"></i>
                                <h6>{{ $title }}</h6>
                                <p>{{ $text }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CONTOH PENGGUNAAN --}}
<section class="section section-navy">
    <div class="container">
        <div class="row gy-4 align-items-center">
            <div class="col-lg-6">
                <x-section-title :light="true" eyebrow="Contoh Penggunaan"
                    title="Untuk berbagai kebutuhan industri"
                    subtitle="Kategori berikut merupakan contoh konteks penggunaan. Silakan konsultasikan kebutuhan spesifik Anda dengan tim kami." />
                <div class="row g-2">
                    @foreach(['Manufaktur', 'Bahan Baku', 'Agribisnis', 'Distribusi', 'Kebutuhan Operasional'] as $use)
                        <div class="{{ $loop->last ? 'col-12' : 'col-6' }}"><div class="use-chip">{{ $use }}</div></div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('assets/images/gallery/gallery-1.jpg') }}" alt="Gudang industri" class="img-fluid w-100 photo-fill"
                     onerror="this.style.minHeight='320px';this.style.background='#1b3a63'">
            </div>
        </div>
    </div>
</section>

{{-- ALUR PEMESANAN --}}
<section class="section">
    <div class="container">
        <x-section-title eyebrow="Alur Pemesanan" title="Mulai dari kebutuhan, lanjut ke penawaran" />
        <div class="row g-4">
            @foreach([
                ['01', 'Pilih Produk', 'Pilih jerigen atau drum yang ingin Anda tanyakan.'],
                ['02', 'Konsultasikan Kebutuhan', 'Sampaikan ukuran, kapasitas, dan estimasi jumlah.'],
                ['03', 'Terima Penawaran', 'Tim kami akan menindaklanjuti permintaan untuk pembahasan penawaran.'],
                ['04', 'Konfirmasi Pemesanan', 'Lanjutkan konfirmasi pemesanan dan pengiriman bersama tim kami.'],
            ] as [$no, $title, $text])
                <div class="col-sm-6 col-lg-3">
                    <div class="step-card h-100">
                        <span class="step-no">{{ $no }}</span>
                        <h6>{{ $title }}</h6>
                        <p>{{ $text }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>