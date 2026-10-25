<?php

// Struktur katalog: kategori -> jenis.
// Urutan di file ini = urutan tab filter di halaman produk dan beranda.
// Slug kategori harus sama dengan kolom products.category,
// slug jenis harus sama dengan kolom products.type.
// 'ukuran' dikosongkan, jadi tombol filter ukuran tidak ditampilkan.
// (Isi 'ukuran' => ['20 liter', ...] pada suatu jenis jika filter ukuran ingin dipakai lagi.)
return [
    'drum' => [
        'label' => 'Drum',
        'jenis' => [
            'drum-open-top' => [
                'label'  => 'Drum Open Top',
                'ukuran' => [],
            ],
            'drum-double-ring' => [
                'label'  => 'Drum Double Ring',
                'ukuran' => [],
            ],
            'drum-single-ring' => [
                'label'  => 'Drum Single Ring',
                'ukuran' => [],
            ],
        ],
    ],

    'jerrycan' => [
        'label' => 'Jerrycan',
        'jenis' => [
            'jerrycan' => [
                'label'  => 'Jerrycan',
                'ukuran' => [],
            ],
            'kapsul' => [
                'label'  => 'Kapsul',
                'ukuran' => [],
            ],
            'kotak' => [
                'label'  => 'Kotak',
                'ukuran' => [],
            ],
        ],
    ],

    // tutup jerrycan tidak punya jenis
    'tutup-jerrycan' => [
        'label'  => 'Tutup Jerrycan',
        'jenis'  => [],
        'ukuran' => [],
    ],
];