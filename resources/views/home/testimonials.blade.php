<section class="section" id="faq">
    <div class="container" style="max-width:860px">
        <x-section-title :center="true" eyebrow="Pertanyaan Umum" title="Informasi sebelum meminta penawaran" />

        <div class="accordion faq" id="faqAccordion">
            @foreach([
                ['Ukuran produk apa saja yang tersedia?', 'Jerigen tersedia dalam ukuran 5–35 liter, sedangkan drum open top tersedia dalam varian 60, 80, 120, dan 200 liter. Hubungi tim kami untuk ketersediaan terbaru.'],
                ['Apa perbedaan drum open top dan drum ring?', 'Drum open top memiliki bukaan atas yang lebar untuk memudahkan pengisian dan pengeluaran isi, sedangkan drum ring menggunakan cincin penjepit penutup. Tim kami dapat membantu memilih yang sesuai kebutuhan.'],
                ['Apakah ada minimum order?', 'Ketentuan minimum order dapat dikonfirmasi langsung oleh tim kami sesuai jenis produk dan kebutuhan Anda.'],
                ['Bagaimana cara meminta penawaran?', 'Isi form permintaan penawaran di halaman ini atau hubungi kami melalui WhatsApp dan email.'],
                ['Apakah tersedia pengiriman?', 'Kami melayani pengiriman ke berbagai wilayah di Indonesia. Detail pengiriman dibahas bersama tim kami.'],
            ] as $i => [$q, $a])
                <div class="accordion-item">
                    <h3 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $i }}">{{ $q }}</button>
                    </h3>
                    <div id="faq{{ $i }}" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">{{ $a }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>