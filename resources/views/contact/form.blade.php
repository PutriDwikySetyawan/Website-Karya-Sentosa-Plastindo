@php $selected = old('product', request('produk')); @endphp
<div class="form-card">
    <h5>Form Permintaan Penawaran</h5>
    <p class="small text-muted">Lengkapi informasi berikut agar tim kami dapat memahami kebutuhan Anda.</p>

    @if(session('success'))
        <div class="alert alert-success rounded-0">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger rounded-0 small">
            <ul class="mb-0 ps-3">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif


    <form action="{{ route('contact.store') }}" method="POST" novalidate>
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nama</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Nama Perusahaan</label>
                <input type="text" name="company" value="{{ old('company') }}" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Nomor WhatsApp / Email</label>
                <input type="text" name="contact" value="{{ old('contact') }}" class="form-control @error('contact') is-invalid @enderror" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Produk yang Diminati</label>
                <select name="product" class="form-select">
                    <option value="">Pilih produk</option>
                    @foreach(\App\Models\Product::orderBy('name')->pluck('name') as $p)
                        <option value="{{ $p }}" @selected($selected == $p)>{{ $p }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Ukuran / Kapasitas</label>
                <input type="text" name="size" value="{{ old('size') }}" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Estimasi Jumlah</label>
                <input type="text" name="quantity" value="{{ old('quantity') }}" class="form-control">
            </div>
            <div class="col-12">
                <label class="form-label">Pesan atau Kebutuhan Tambahan</label>
                <textarea name="message" rows="5" class="form-control">{{ old('message') }}</textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-orange w-100 py-2">Kirim Permintaan Penawaran</button>
            </div>
        </div>
    </form>
</div>