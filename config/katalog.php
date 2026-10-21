<?php

// Struktur katalog: kategori -> jenis -> ukuran.
// Slug kategori harus sama dengan kolom products.category,
// slug jenis harus sama dengan kolom products.type.
// Daftar 'ukuran' inilah yang menjadi tombol filter ukuran.
return [
    'jerrycan' => [
        'label' => 'Jerrycan',
        'jenis' => [
            'kotak' => [
                'label'  => 'Kotak',
                'ukuran' => ['30 liter', '18 liter', '20 liter'],
            ],
            'kapsul' => [
                'label'  => 'Kapsul',
                'ukuran' => ['20 liter', '25 liter', '30 liter'],
            ],
            'kotak-natural' => [
                'label'  => 'Kotak Natural',
                'ukuran' => ['10 liter', '20 liter', '25 liter'],
            ],
            'jerrycan' => [
                'label'  => 'Jerrycan',
                'ukuran' => ['2 liter', '5 liter'],
            ],
        ],
    ],

    // botol PET tidak punya jenis; isi ukuran sendiri nanti
    'botol-pet' => [
        'label'  => 'Botol PET',
        'jenis'  => [],
        'ukuran' => [],
    ],

    'drum' => [
        'label' => 'Drum',
        'jenis' => [
            'drum-single-ring' => [
                'label'  => 'Drum Single Ring',
                'ukuran' => ['200 liter'],
            ],
            'drum-double-ring' => [
                'label'  => 'Drum Double Ring',
                'ukuran' => ['200 liter'],
            ],
            'drum-open-top' => [
                'label'  => 'Drum Open Top',
                'ukuran' => ['120 liter', '150 liter'],
            ],
        ],
    ],
];