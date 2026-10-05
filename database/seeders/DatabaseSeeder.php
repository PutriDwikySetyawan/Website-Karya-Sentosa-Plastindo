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
            ['Jerigen Plastik', 'jerigen-plastik', 'jerigen', 'JERIGEN',
             'Pilihan kemasan untuk kebutuhan pengisian, penyimpanan, dan distribusi operasional.',
             'Ukuran tersedia: 5–35 liter', 'product-1.jpg'],
            ['Drum Open Top', 'drum-open-top', 'open-top', 'DRUM',
             'Kemasan drum dengan bukaan atas untuk kebutuhan penanganan dan penyimpanan industri.',
             'Varian: 60, 80, 120, 200 liter', 'product-2.jpg'],
            ['Drum L-single Ring', 'drum-l-single-ring', 'drum-ring', 'DRUM RING',
             'Pilihan drum ring untuk kebutuhan kemasan dan proses operasional industri.',
             'Konsultasikan varian kebutuhan Anda', 'product-3.jpg'],
            ['Drum Double Ring', 'drum-double-ring', 'drum-ring', 'DRUM RING',
             'Produk kemasan drum untuk menunjang kebutuhan pengadaan dan distribusi industri.',
             'Konsultasikan varian kebutuhan Anda', 'product-4.jpg'],
        ];

        foreach ($products as [$name, $slug, $cat, $label, $desc, $spec, $img]) {
            Product::updateOrCreate(['slug' => $slug], [
                'name' => $name, 'category' => $cat, 'label' => $label,
                'description' => $desc, 'spec' => $spec, 'image' => $img,
            ]);
        }

       // Judul dan keterangan galeri, kuncinya nama file foto
$galeri = [
    1 => ['Proses Produksi',       'Operator memantau pengaturan mesin cetak plastik untuk menjaga mutu produksi.'],
    2 => ['Produksi Drum Plastik', 'Pemeriksaan drum plastik hasil produksi sebelum masuk tahap pengemasan.'],
    3 => ['Gudang Penyimpanan',    'Jerigen plastik disusun rapi di gudang, siap dikirim ke pelanggan.'],
];

foreach ($galeri as $i => [$judul, $keterangan]) {
    Gallery::updateOrCreate(['image' => "gallery-$i.jpg"], [
        'title'   => $judul,
        'caption' => $keterangan,
    ]);
}
    }
}