<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // tambah kolom jenis produk (slug), kosong untuk Botol PET
        Schema::table('products', function (Blueprint $table) {
            $table->string('type')->nullable()->after('category');
        });

        // kategori lama "open-top" pindah ke kategori "drum" jenis open top
        DB::table('products')
            ->where('category', 'open-top')
            ->update(['category' => 'drum', 'type' => 'drum-open-top']);

        // kategori lama "drum-ring": jenis ditebak dari slug produk
        DB::table('products')
            ->where('category', 'drum-ring')
            ->where('slug', 'like', '%double-ring%')
            ->update(['type' => 'drum-double-ring']);

        DB::table('products')
            ->where('category', 'drum-ring')
            ->where('slug', 'like', '%single-ring%')
            ->update(['type' => 'drum-single-ring']);

        DB::table('products')
            ->where('category', 'drum-ring')
            ->update(['category' => 'drum']);

        // kategori "jerrycan" tidak diubah, kolom type diisi manual
        // (kotak, kapsul, kotak-natural, jerrycan)
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};