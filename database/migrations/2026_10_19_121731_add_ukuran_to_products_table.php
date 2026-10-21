<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // kolom ukuran dalam liter, angka dipisah koma jika lebih dari satu (contoh: "2,5")
        Schema::table('products', function (Blueprint $table) {
            $table->string('ukuran')->nullable()->after('type');
        });

        // isi ukuran produk yang sudah ada, berdasarkan slug
        $ukuranPerSlug = [
            'drum-open-top'       => '120,150',
            'drum-l-single-ring'  => '200',
            'drum-double-ring'    => '200',
            'jerrycan-kapsul-30l' => '30',
            'jerrycan-kapsul-25l' => '25',
            'jerrycan-kapsul-20l' => '20',
            'jerrycan-5l-dan-2l'  => '2,5',
            'jerrycan-natural-30l' => '30',
            'jerrycan-kotak-18l'  => '18',
            // 'jerrycan-kotak-list' sengaja tidak diisi, ukurannya belum diketahui
        ];

        foreach ($ukuranPerSlug as $slug => $ukuran) {
            DB::table('products')->where('slug', $slug)->update(['ukuran' => $ukuran]);
        }
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('ukuran');
        });
    }
};