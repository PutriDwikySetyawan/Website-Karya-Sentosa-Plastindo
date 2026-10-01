<section class="section section-navy" id="minta-penawaran">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-5">
                <x-section-title :light="true" eyebrow="Minta Penawaran" title="Mari bahas kebutuhan kemasan Anda"
                    subtitle="Sampaikan kebutuhan produk dan estimasi jumlah Anda. Kami akan menggunakan informasi tersebut untuk menindaklanjuti permintaan penawaran." />
                <ul class="contact-list">
                    <li><i class="bi bi-whatsapp"></i> WhatsApp: {{ config('company.wa') }}</li>
                    <li><i class="bi bi-envelope"></i> Email: {{ config('company.email') }}</li>
                    <li><i class="bi bi-geo-alt"></i> Alamat: {{ config('company.address') }}</li>
                </ul>
                <div class="d-flex gap-2 mt-3">
                    <a href="https://wa.me/{{ config('company.wa') }}" target="_blank" rel="noopener" class="btn btn-orange">WhatsApp Kami</a>
                    <a href="mailto:{{ config('company.email') }}" class="btn btn-outline-light-sq">Kirim Email</a>
                </div>
            </div>
            <div class="col-lg-7">
                @include('contact.form')
            </div>
        </div>
    </div>
</section>