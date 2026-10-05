{{-- Email notifikasi permintaan penawaran, style inline supaya aman di semua aplikasi email --}}
@php
    $label = [
        'name'     => 'Nama',
        'company'  => 'Perusahaan',
        'contact'  => 'WhatsApp / Email',
        'product'  => 'Produk',
        'size'     => 'Ukuran / Kapasitas',
        'quantity' => 'Estimasi Jumlah',
        'message'  => 'Pesan / Kebutuhan',
    ];

    $sembunyikan = ['id', 'created_at', 'updated_at'];

    // Deteksi: email atau nomor telepon
    $kontak  = trim((string) ($contact->contact ?? ''));
    $isEmail = filter_var($kontak, FILTER_VALIDATE_EMAIL) !== false;

    $nomor = $isEmail ? '' : preg_replace('/\D/', '', $kontak);
    if (str_starts_with($nomor, '0')) {
        $nomor = '62' . substr($nomor, 1);
    }
@endphp

<div style="font-family:Arial,Helvetica,sans-serif;background:#eef2f5;padding:24px">
    <div style="max-width:600px;margin:0 auto;background:#ffffff;border:1px solid #dfe5ec">

        {{-- Header --}}
        <div style="background:#0a2342;padding:20px 24px;border-bottom:4px solid #f47b20">
            <h2 style="margin:0;color:#ffffff;font-size:18px">Permintaan Penawaran Baru</h2>
            <p style="margin:6px 0 0;color:#c5d0de;font-size:13px">{{ config('company.name') }}</p>
        </div>

        <div style="padding:24px">
            <p style="margin:0 0 16px;font-size:14px;color:#1c2733">
                Ada pengunjung yang mengisi form di website. Berikut datanya:
            </p>

            {{-- Isi form --}}
            <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;font-size:14px">
                @foreach($contact->getAttributes() as $kolom => $isi)
                    @continue(in_array($kolom, $sembunyikan) || $isi === null || $isi === '')
                    <tr>
                        <td style="padding:10px 12px;border:1px solid #e3e8ee;background:#f4f6f8;width:35%;vertical-align:top;color:#0a2342;font-weight:bold">
                            {{ $label[$kolom] ?? ucfirst(str_replace('_', ' ', $kolom)) }}
                        </td>
                        <td style="padding:10px 12px;border:1px solid #e3e8ee;vertical-align:top;color:#1c2733">
                            {!! nl2br(e($isi)) !!}
                        </td>
                    </tr>
                @endforeach
            </table>

            {{-- Tombol balas --}}
            <p style="margin:24px 0 8px">
                @if(!empty($contact->email))
                    <a href="mailto:{{ $contact->email }}"
                       style="display:inline-block;background:#0a2342;color:#ffffff;text-decoration:none;padding:10px 18px;font-size:13px;font-weight:bold;margin-right:8px">
                        Balas via Email
                    </a>
                @endif
                @if($nomor !== '')
                    <a href="https://wa.me/{{ $nomor }}?text={{ urlencode('Halo ' . ($contact->name ?? '') . ', terima kasih telah menghubungi ' . config('company.name') . '.') }}"
                       style="display:inline-block;background:#f47b20;color:#ffffff;text-decoration:none;padding:10px 18px;font-size:13px;font-weight:bold">
                        Balas via WhatsApp
                    </a>
                @endif
            </p>

            <p style="margin:16px 0 0;font-size:12px;color:#5d6b7a">
                Waktu masuk: {{ $contact->created_at?->timezone('Asia/Jakarta')->format('d M Y, H:i') }} WIB
            </p>
        </div>

        <div style="background:#f4f6f8;padding:12px 24px;font-size:11px;color:#5d6b7a">
            Email ini dikirim otomatis dari form website. Kamu juga bisa menekan Reply untuk membalas langsung ke pengunjung.
        </div>
    </div>
</div>