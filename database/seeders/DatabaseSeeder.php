<?php

namespace Database\Seeders;

use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['Drum Open Top', 'drum-open-top', 'open-top', 'DRUM',
             'Kemasan drum dengan bukaan atas untuk kebutuhan penanganan dan penyimpanan industri.',
             'Varian: 60, 80, 120, 200 liter', 'product-2.jpg'],
            ['Drum L-single Ring', 'drum-l-single-ring', 'drum-ring', 'DRUM RING',
             'Pilihan drum ring untuk kebutuhan kemasan dan proses operasional industri.',
             'Konsultasikan varian kebutuhan Anda', 'product-3.jpg'],
            ['Drum Double Ring', 'drum-double-ring', 'drum-ring', 'DRUM RING',
             'Produk kemasan drum untuk menunjang kebutuhan pengadaan dan distribusi industri.',
             'Konsultasikan varian kebutuhan Anda', 'product-4.jpg'],

            ['Jerrycan Kapsul 30L', 'jerrycan-kapsul-30l', 'jerrycan', 'JERRYCAN',
             'Jerrycan model kapsul kapasitas 30 liter untuk kebutuhan pengisian, penyimpanan, dan distribusi dalam jumlah besar.',
             'Ukuran tersedia: 30 liter', 'product-1.jpg'],
            ['Jerrycan Kapsul 25L', 'jerrycan-kapsul-25l', 'jerrycan', 'JERRYCAN',
             'Jerrycan model kapsul kapasitas 25 liter, pilihan ukuran menengah untuk kebutuhan operasional harian.',
             'Ukuran tersedia: 25 liter', 'product-6.jpg'],
            ['Jerrycan Kapsul 20L', 'jerrycan-kapsul-20l', 'jerrycan', 'JERRYCAN',
             'Jerrycan model kapsul kapasitas 20 liter yang praktis dibawa dan disimpan, cocok untuk berbagai kebutuhan kemasan.',
             'Ukuran tersedia: 20 liter', 'product-7.jpg'],
            ['Jerrycan 5L dan 2L', 'jerrycan-5l-dan-2l', 'jerrycan', 'JERRYCAN',
             'Jerrycan ukuran kecil untuk kebutuhan pengemasan dalam jumlah terbatas dan distribusi eceran.',
             'Ukuran tersedia: 5 dan 2 liter', 'product-8.jpg'],
            ['Jerrycan Kotak List', 'jerrycan-kotak-list', 'jerrycan', 'JERRYCAN',
             'Jerrycan model kotak dengan banyak pilihan kapasitas. Bentuknya mudah ditumpuk sehingga hemat ruang penyimpanan dan pengiriman.',
             'Ukuran tersedia: 10, 20, 25, 30 liter', 'product-9.jpg'],
            ['Jerrycan Natural 30L', 'jerrycan-natural-30l', 'jerrycan', 'JERRYCAN',
             'Jerrycan warna natural kapasitas 30 liter untuk kebutuhan pengisian, penyimpanan, dan distribusi operasional.',
             'Ukuran tersedia: 30 liter', 'product-10.jpg'],
            ['Jerrycan Kotak 18L', 'jerrycan-kotak-18l', 'jerrycan', 'JERRYCAN',
             'Jerrycan model kotak kapasitas 18 liter, praktis untuk penyimpanan dan distribusi dalam skala menengah.',
             'Ukuran tersedia: 18 liter', 'product-11.jpg'],
        ];

        foreach ($products as [$name, $slug, $cat, $label, $desc, $spec, $img]) {
            Product::updateOrCreate(['slug' => $slug], [
                'name' => $name, 'category' => $cat, 'label' => $label,
                'description' => $desc, 'spec' => $spec, 'image' => $img,
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