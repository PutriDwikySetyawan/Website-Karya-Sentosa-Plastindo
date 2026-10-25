<?php

namespace Database\Seeders;

use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus SEMUA produk lama (kategori tidak ikut terhapus karena ada di config/katalog.php)
        Product::query()->delete();

        $warna = 'Warna bisa custom sesuai kebutuhan Anda.';

        // [nama, slug, kategori, label, deskripsi, spec, gambar, type (jenis), ukuran]
        // kategori = slug kategori di config/katalog.php (drum, jerrycan, tutup-jerrycan)
        // type     = slug jenis di config/katalog.php (null jika kategori tidak punya jenis)
        // ukuran   = angka liter dipisah koma, dipakai filter ukuran
        $products = [
            // ===== DRUM =====
            ['Drum Open Top 150L, 120L, 60L', 'drum-open-top-150l-120l-60l', 'drum', 'DRUM',
             "Drum plastik dengan bukaan atas untuk kebutuhan penanganan dan penyimpanan industri. $warna",
             'Ukuran tersedia: 60, 120, dan 150 liter · Warna bisa custom', 'drum-open-top.jpg',
             'drum-open-top', '60,120,150'],

            ['Drum Double Ring 200L', 'drum-double-ring-200l', 'drum', 'DRUM',
             "Drum plastik double ring untuk menunjang kebutuhan pengadaan dan distribusi industri. $warna",
             'Ukuran tersedia: 200 liter · Warna bisa custom', 'drum-double-ring.jpg',
             'drum-double-ring', '200'],

            ['Drum Single Ring 200L', 'drum-single-ring-200l', 'drum', 'DRUM',
             "Drum plastik single ring untuk kebutuhan kemasan dan proses operasional industri. $warna",
             'Ukuran tersedia: 200 liter · Warna bisa custom', 'drum-single-ring.jpg',
             'drum-single-ring', '200'],

            // ===== JERRYCAN =====
            ['Jerrycan 2L, 5L', 'jerrycan-2l-5l', 'jerrycan', 'JERRYCAN',
             "Jerrycan ukuran kecil untuk pengemasan dalam jumlah terbatas dan distribusi eceran. $warna",
             'Ukuran tersedia: 2 dan 5 liter · Warna bisa custom', 'jerrycan-2l-5l.jpg',
             'jerrycan', '2,5'],

            ['Jerrycan Kapsul 20L', 'jerrycan-kapsul-20l', 'jerrycan', 'JERRYCAN',
             "Jerrycan model kapsul kapasitas 20 liter yang praktis dibawa dan disimpan. $warna",
             'Ukuran tersedia: 20 liter · Warna bisa custom', 'jerrycan-kapsul-20l.jpg',
             'kapsul', '20'],

            ['Jerrycan Kotak 25L, 20L, 10L', 'jerrycan-kotak-25l-20l-10l', 'jerrycan', 'JERRYCAN',
             "Jerrycan model kotak dalam tiga pilihan kapasitas. Bentuknya mudah ditumpuk sehingga hemat ruang penyimpanan dan pengiriman. $warna",
             'Ukuran tersedia: 25, 20, dan 10 liter · Warna bisa custom', 'jerrycan-kotak-25l-20l-10l.jpg',
             'kotak', '10,20,25'],

            ['Jerrycan Kotak 20L', 'jerrycan-kotak-20l', 'jerrycan', 'JERRYCAN',
             "Jerrycan model kotak kapasitas 20 liter, praktis untuk penyimpanan dan distribusi. $warna",
             'Ukuran tersedia: 20 liter · Warna bisa custom', 'jerrycan-kotak-20l.jpg',
             'kotak', '20'],

            ['Jerrycan Kapsul 25L', 'jerrycan-kapsul-25l', 'jerrycan', 'JERRYCAN',
             "Jerrycan model kapsul kapasitas 25 liter, pilihan ukuran menengah untuk kebutuhan operasional harian. $warna",
             'Ukuran tersedia: 25 liter · Warna bisa custom', 'jerrycan-kapsul-25l.jpg',
             'kapsul', '25'],

            ['Jerrycan Kotak 30L', 'jerrycan-kotak-30l', 'jerrycan', 'JERRYCAN',
             "Jerrycan model kotak kapasitas 30 liter untuk pengisian, penyimpanan, dan distribusi dalam jumlah besar. $warna",
             'Ukuran tersedia: 30 liter · Warna bisa custom', 'jerrycan-kotak-30l.jpg',
             'kotak', '30'],

            // ===== TUTUP JERRYCAN =====
            ['Tutup Jerrycan 20-30L', 'tutup-jerrycan-20-30l', 'tutup-jerrycan', 'TUTUP JERRYCAN',
             "Tutup untuk jerrycan kapasitas 20 sampai 30 liter. $warna",
             'Cocok untuk jerrycan 20-30 liter · Warna bisa custom', 'tutup-jerrycan-20-30l.jpg',
             null, '20,30'],
        ];

        foreach ($products as [$name, $slug, $cat, $label, $desc, $spec, $img, $type, $ukuran]) {
            Product::updateOrCreate(['slug' => $slug], [
                'name' => $name, 'category' => $cat, 'label' => $label,
                'description' => $desc, 'spec' => $spec, 'image' => $img,
                'type' => $type, 'ukuran' => $ukuran,
            ]);
        }

        $galeri = [
            1 => ['Proses Produksi',       'Operator memantau pengaturan mesin cetak plastik untuk menjaga mutu produksi.'],
            2 => ['Produksi Drum Plastik', 'Pemeriksaan drum plastik hasil produksi sebelum masuk tahap pengemasan.'],
            3 => ['Gudang Penyimpanan',    'Jerrycan plastik disusun rapi di gudang, siap dikirim ke pelanggan.'],
        ];

        foreach ($galeri as $i => [$judul, $keterangan]) {
            Gallery::updateOrCreate(['image' => "gallery-$i.jpg"], [
                'title'   => $judul,
                'caption' => $keterangan,
            ]);
        }
    }
}