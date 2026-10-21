@extends('layouts.app')
@section('title', 'Produk | ' . config('company.name'))

@section('content')
@php
    // struktur katalog dari config/katalog.php
    $katalog = config('katalog');
    // kelompokkan produk per kategori
    $grouped = $products->groupBy('category');

    // daftar jenis milik kategori yang dipilih
    $kat = $category ? ($katalog[$category] ?? null) : null;
    $jenisList = $kat['jenis'] ?? [];
    $jenisSlugs = array_keys($jenisList);

    // jenis dan ukuran yang dipilih dari filter (?jenis=kapsul&ukuran=20)
    $jenisDipilih = request('jenis');
    if ($jenisDipilih && !isset($jenisList[$jenisDipilih])) {
        $jenisDipilih = null; // abaikan jenis yang tidak dikenal
    }
    $ukuran = request('ukuran');

    // pembuat link filter: nilai null otomatis dibuang dari URL
    $url = fn (array $extra) => route('products.index', array_filter(
        array_merge(['kategori' => $category, 'jenis' => $jenisDipilih], $extra),
        fn ($v) => $v !== null && $v !== ''
    ));

    // ukuran hanya dari config/katalog.php (tidak dari database):
    // kategori dengan jenis -> ukuran milik jenis yang dipilih
    // kategori tanpa jenis (Botol PET) -> ukuran milik kategori
    if ($jenisDipilih) {
        $daftarUkuran = $jenisList[$jenisDipilih]['ukuran'] ?? [];
    } elseif ($category && empty($jenisList)) {
        $daftarUkuran = $kat['ukuran'] ?? [];
    } else {
        $daftarUkuran = [];
    }

    // '30 liter' -> 30, lalu diurutkan naik
    $ukuranTersedia = collect($daftarUkuran)
        ->map(fn ($u) => (int) $u)
        ->unique()
        ->sort()
        ->values();

    // produk yang ditampilkan di mode satu kategori (disaring jenis lalu ukuran)
    $produkTampil = $products;
    if ($category && $jenisDipilih) {
        $produkTampil = $produkTampil->where('type', $jenisDipilih);
    }
    if ($category && $ukuran) {
        $produkTampil = $produkTampil->filter(
            fn ($p) => in_array($ukuran, array_map('trim', explode(',', (string) $p->ukuran)))
        );
    }
    $produkTampil = $produkTampil->values();
@endphp

<section class="page-header">
    <div class="container">
        <span class="eyebrow">Katalog Produk</span>
        <h1>Jerrycan, Botol PET &amp; Drum Plastik</h1>
    </div>
</section>

<section class="section">
    <div class="container">
        {{-- langkah 1: filter kategori --}}
        <div class="filter-tabs mb-3">
            <a href="{{ route('products.index') }}" class="{{ !$category ? 'active' : '' }}">Semua Produk</a>
            @foreach($katalog as $slug => $k)
                <a href="{{ route('products.index', ['kategori' => $slug]) }}" class="{{ $category == $slug ? 'active' : '' }}">{{ $k['label'] }}</a>
            @endforeach
        </div>

        {{-- langkah 2: filter jenis, muncul setelah kategori dipilih --}}
        @if($category && !empty($jenisList))
            <div class="small text-muted mb-2">Pilih jenis</div>
            <div class="filter-tabs mb-3">
                <a href="{{ $url(['jenis' => null, 'ukuran' => null]) }}" class="{{ !$jenisDipilih ? 'active' : '' }}">Semua Jenis</a>
                @foreach($jenisList as $jSlug => $j)
                    <a href="{{ $url(['jenis' => $jSlug, 'ukuran' => null]) }}" class="{{ $jenisDipilih == $jSlug ? 'active' : '' }}">{{ $j['label'] }}</a>
                @endforeach
            </div>
        @endif

        {{-- langkah 3: filter ukuran, muncul setelah jenis dipilih --}}
        @if($ukuranTersedia->isNotEmpty())
            <div class="small text-muted mb-2">Pilih ukuran</div>
            <div class="filter-tabs mb-4">
                <a href="{{ $url(['ukuran' => null]) }}" class="{{ !$ukuran ? 'active' : '' }}">Semua Ukuran</a>
                @foreach($ukuranTersedia as $u)
                    <a href="{{ $url(['ukuran' => $u]) }}" class="{{ $ukuran == $u ? 'active' : '' }}">{{ $u }} liter</a>
                @endforeach
            </div>
        @endif

        @if(!$category)
            {{-- mode "Semua Produk": per kategori, maksimal 4 produk --}}
            @foreach($katalog as $slug => $k)
                @php $items = $grouped->get($slug, collect()); @endphp
                @if($items->isNotEmpty())
                    <div class="mb-5">
                        <h2 class="h4 mb-1">{{ $k['label'] }}</h2>

                        {{-- daftar jenis (ukuran ada di filter) --}}
                        @if(!empty($k['jenis']))
                            <p class="text-muted small mb-3">{{ collect($k['jenis'])->pluck('label')->implode(' · ') }}</p>
                        @endif

                        <div class="row g-4">
                            @foreach($items->take(4) as $product)
                                <div class="col-sm-6 col-lg-3">@include('products.card', ['product' => $product])</div>
                            @endforeach
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('products.index', ['kategori' => $slug]) }}" class="btn btn-outline-primary">Lihat produk selengkapnya</a>
                        </div>
                    </div>
                @endif
            @endforeach

            @if($products->isEmpty())
                <p class="text-muted">Produk belum tersedia.</p>
            @endif
        @else
            {{-- mode satu kategori: produk dikelompokkan per jenis --}}
            @if(!empty($jenisList))
                @foreach($jenisList as $jSlug => $j)
                    @php $items = $produkTampil->where('type', $jSlug); @endphp
                    @if($items->isNotEmpty())
                        <div class="mb-5">
                            <h2 class="h5 mb-3">{{ $j['label'] }}</h2>
                            <div class="row g-4">
                                @foreach($items as $product)
                                    <div class="col-sm-6 col-lg-3">@include('products.card', ['product' => $product])</div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach

                {{-- produk yang belum punya jenis tetap ditampilkan --}}
                @php $sisa = $produkTampil->reject(fn ($p) => in_array($p->type, $jenisSlugs)); @endphp
                @if($sisa->isNotEmpty())
                    <div class="row g-4">
                        @foreach($sisa as $product)
                            <div class="col-sm-6 col-lg-3">@include('products.card', ['product' => $product])</div>
                        @endforeach
                    </div>
                @endif

                @if($produkTampil->isEmpty())
                    <p class="text-muted">{{ $ukuran ? 'Tidak ada produk dengan ukuran tersebut.' : 'Produk belum tersedia.' }}</p>
                @endif
            @else
                {{-- kategori tanpa jenis (Botol PET) --}}
                <div class="row g-4">
                    @forelse($produkTampil as $product)
                        <div class="col-sm-6 col-lg-3">@include('products.card', ['product' => $product])</div>
                    @empty
                        <p class="text-muted">{{ $ukuran ? 'Tidak ada produk dengan ukuran tersebut.' : 'Produk belum tersedia.' }}</p>
                    @endforelse
                </div>
            @endif
        @endif
    </div>
</section>
@endsection