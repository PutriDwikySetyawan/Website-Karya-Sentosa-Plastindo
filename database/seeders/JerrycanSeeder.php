<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JerrycanSeeder extends Seeder
{
    public function run(): void
    {
        // image: nama file di public/assets/images/products/ (null jika belum ada foto)
        $produk = [
            ['name' => 'Jerrycan Kapsul 30L',  'spec' => 'Ukuran tersedia: 30 liter',             'image' => null],
            ['name' => 'Jerrycan Kapsul 25L',  'spec' => 'Ukuran tersedia: 25 liter',             'image' => null],
            ['name' => 'Jerrycan Kapsul 20L',  'spec' => 'Ukuran tersedia: 20 liter',             'image' => null],
            ['name' => 'Jerrycan 5L dan 2L',   'spec' => 'Ukuran tersedia: 5 dan 2 liter',        'image' => null],
            ['name' => 'Jerrycan Kotak List',  'spec' => 'Ukuran tersedia: 10, 20, 25, 30 liter', 'image' => null],
            ['name' => 'Jerrycan Natural 30L', 'spec' => 'Ukuran tersedia: 30 liter',             'image' => null],
            ['name' => 'Jerrycan Kotak 18L',   'spec' => 'Ukuran tersedia: 18 liter',             'image' => null],
        ];

        foreach ($produk as $p) {
            $slug = Str::slug($p['name']);

            Product::updateOrCreate(
                ['slug' => $slug],
                [
                    'name'        => $p['name'],
                    'category'    => 'jerigen',   // slug filter, jangan diubah
                    'label'       => 'JERRYCAN',
                    'description' => 'Kemasan jerrycan untuk kebutuhan pengisian, penyimpanan, dan distribusi operasional.',
                    'spec'        => $p['spec'],
                    'image'       => $p['image'],
                ]
            );
        }
    }
}