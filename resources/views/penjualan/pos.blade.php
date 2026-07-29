@extends('layouts.app')

@section('title', 'POS Kasir')

@section('content')

@include('layouts.navbar')

<!-- CDN Google Fonts & FontAwesome -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
body {
    background: linear-gradient(135deg, #fdf6f9, #f4e8ee);
    font-family: 'Plus Jakarta Sans', sans-serif;
    color: #4a3540;
}

/* Dekorasi background mewah yang lembut */
body::before {
    content: "";
    position: fixed;
    width: 350px;
    height: 350px;
    background: #fbcfe8;
    border-radius: 50%;
    top: -100px;
    left: -100px;
    opacity: 0.3;
    filter: blur(70px);
    z-index: -1;
}

body::after {
    content: "";
    position: fixed;
    width: 400px;
    height: 400px;
    background: #fecdd3;
    border-radius: 50%;
    bottom: -150px;
    right: -150px;
    opacity: 0.3;
    filter: blur(80px);
    z-index: -1;
}

.pos-container {
    max-width: 1350px;
    margin: 30px auto;
}

/* HEADER TITLE */
.pos-title {
    font-family: 'Playfair Display', serif;
    font-size: 2rem;
    font-weight: 700;
    color: #4a3540;
}

/* CARDS STYLING */
.pos-card {
    background: rgba(255, 255, 255, 0.92);
    backdrop-filter: blur(12px);
    border-radius: 24px;
    border: 1px solid rgba(254, 205, 211, 0.4);
    box-shadow: 0 12px 30px rgba(225, 29, 72, 0.06);
    overflow: hidden;
}

.pos-card .card-body {
    padding: 24px;
}

.pos-card .card-footer {
    background: rgba(255, 241, 242, 0.5);
    border-top: 1px solid rgba(254, 205, 211, 0.4);
    padding: 24px;
    border-bottom-left-radius: 24px;
    border-bottom-right-radius: 24px;
}

/* SEARCH BAR */
.pos-search-input {
    border: none;
    background: #fff1f2;
    padding: 14px 20px;
    border-radius: 16px;
    color: #4a3540;
    font-weight: 500;
}

.pos-search-input:focus {
    background: #ffffff;
    box-shadow: 0 0 0 3px rgba(244, 63, 94, 0.15);
}

/* PRODUCT LIST BUTTON */
.product-item-btn {
    background: #ffffff;
    border: 1px solid rgba(254, 205, 211, 0.6);
    border-radius: 16px;
    transition: 0.3s;
    text-align: left;
    padding: 12px;
    width: 100%;
}

.product-item-btn:hover:not(:disabled) {
    background: #fff5f7;
    border-color: #f43f5e;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(225, 29, 72, 0.08);
}

/* QUANTITY & ACTION BUTTONS */
.pos-qty-input {
    border: 1px solid #fecdd3;
    background: #fff5f7;
    border-radius: 12px;
    text-align: center;
    font-weight: 600;
    color: #4a3540;
}

.pos-qty-input:focus {
    background: #fff;
    box-shadow: 0 0 0 3px rgba(244, 63, 94, 0.15);
}

.btn-plus {
    background: #be123c;
    color: white;
    border: none;
    border-radius: 12px;
    font-weight: 700;
    transition: 0.3s;
}

.btn-plus:hover:not(:disabled) {
    background: #9f1239;
    color: white;
}

/* TABLE STYLING */
.pos-table th {
    background: #fff1f2;
    color: #885d6e;
    font-weight: 700;
    border-bottom: 2px solid #fecdd3;
    font-size: 0.9rem;
    padding: 14px;
}

.pos-table td {
    vertical-align: middle;
    color: #4a3540;
    padding: 14px;
    border-color: #fbe8ee;
}

/* CHECKOUT & BUTTONS */
.form-select {
    border: 1px solid #fecdd3;
    background-color: #fff5f7;
    border-radius: 14px;
    padding: 12px;
    color: #4a3540;
    font-weight: 500;
}

.form-select:focus {
    box-shadow: 0 0 0 3px rgba(244, 63, 94, 0.15);
    background-color: #fff;
}

.btn-checkout {
    background: linear-gradient(135deg, #f43f5e, #be123c);
    color: white;
    border: none;
    border-radius: 14px;
    padding: 12px;
    font-weight: 700;
    box-shadow: 0 6px 20px rgba(225, 29, 72, 0.2);
    transition: 0.3s;
}

.btn-checkout:hover:not(:disabled) {
    background: linear-gradient(135deg, #e11d48, #9f1239);
    transform: translateY(-2px);
}

.btn-cancel-trans {
    background: transparent;
    border: 2px solid #f43f5e;
    color: #f43f5e;
    border-radius: 14px;
    padding: 10px;
    font-weight: 700;
    transition: 0.3s;
    margin-top: 10px;
}

.btn-cancel-trans:hover {
    background: #fff1f2;
    color: #e11d48;
}

.total-price-text {
    font-family: 'Playfair Display', serif;
    font-size: 1.4rem;
    color: #be123c;
}
</style>

<div class="container pos-container">

    @if(session('errors'))
        <div class="alert alert-danger border-0 shadow-sm rounded-4 mb-4" style="background: #ffe4e6; color: #9f1239;">
            <i class="fa-solid fa-triangle-exclamation me-2"></i> {{ session('errors') }}
        </div>
    @endif

    <div class="d-flex align-items-center mb-4">
        <h4 class="pos-title mb-0">
            <i class="fa-solid fa-cash-register me-2" style="color: #be123c;"></i> Kasir SPTYSTORE
        </h4>
    </div>

    <div class="row g-4">

        {{-- ===== DAFTAR PRODUK (KIRI) ===== --}}
        <div class="col-lg-6">
            <div class="pos-card h-100">
                <div class="card-body" style="max-height: 72vh; overflow-y: auto;">

                    <div class="mb-4">
                        <form method="GET" action="{{ route('penjualan.create') }}">
                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                class="form-control pos-search-input"
                                placeholder="✨ Cari koleksi sepatu..."
                                onkeyup="this.form.submit()">
                        </form>
                    </div>

                    @foreach ($products as $product)
                        <form method="POST"
                              action="{{ route('itempenjualan.store') }}"
                              class="row g-2 mb-3 align-items-center">
                            @csrf

                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <div class="col-7">
                                <button
                                    type="submit"
                                    class="product-item-btn {{ $sale->status === 'COMPLETED' ? 'disabled opacity-50' : '' }}"
                                    {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}>
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="{{ asset('storage/'.$product->foto) }}"
                                             alt="Gambar"
                                             class="rounded-circle shadow-sm"
                                             style="width: 48px; height: 48px; object-fit: cover; border: 2px solid #fecdd3;">

                                        <div>
                                            <div class="fw-bold" style="color: #4a3540; font-size: 0.95rem;">{{ $product->nama }}</div>
                                            <small style="color: #be123c; font-weight: 700;">
                                                Rp {{ number_format($product->harga_jual, 0, ',', '.') }}
                                            </small>
                                        </div>
                                    </div>
                                </button>
                            </div>

                            <div class="col-3">
                                <input type="number"
                                       name="quantity"
                                       value="1"
                                       min="1"
                                       class="form-control pos-qty-input py-2"
                                       {{ $sale->status === 'COMPLETED' ? 'readonly' : '' }}>
                            </div>

                            <div class="col-2">
                                <button
                                    type="submit"
                                    class="btn btn-plus w-100 py-2 {{ $sale->status === 'COMPLETED' ? 'disabled opacity-50' : '' }}"
                                    {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}>
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                        </form>
                    @endforeach

                </div>
            </div>
        </div>

        {{-- ===== KERANJANG BELANJA & PEMBAYARAN (KANAN) ===== --}}
        <div class="col-lg-6">
            <div class="pos-card h-100 d-flex flex-column justify-content-between">
                
                <div class="table-responsive" style="max-height: 42vh; overflow-y: auto;">
                    <table class="table pos-table mb-0">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th style="width: 90px;">Qty</th>
                                <th>Subtotal</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sale->itempenjualan as $item)
                                <tr>
                                    <td>
                                        <div class="fw-bold" style="font-size: 0.9rem;">{{ $item->produk->nama }}</div>
                                    </td>
                                    <td class="small">Rp {{ number_format($item->produk->harga_jual, 0, ',', '.') }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('itempenjualan.update', $item->id) }}">
                                            @csrf @method('PUT')
                                            <input type="number"
                                                   name="quantity"
                                                   value="{{ $item->kuantitas }}"
                                                   class="form-control form-control-sm pos-qty-input"
                                                   onchange="this.form.submit()">
                                        </form>
                                    </td>
                                    <td class="fw-bold" style="color: #be123c;">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                    <td class="text-center">
                                        @can('delete', $item)
                                        <form method="POST" action="{{ route('itempenjualan.destroy', $item->id) }}">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm text-danger border-0 bg-transparent" title="Hapus Item">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">
                                        <i class="fa-solid fa-bag-shopping fa-2x mb-2 text-pink opacity-50" style="color: #f43f5e;"></i>
                                        <p class="mb-0 small">Keranjang belanja masih kosong</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted fw-semibold">Total Pembayaran:</span>
                        <span class="total-price-text fw-bold">Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}</span>
                    </div>

                    <form method="POST" 
                          action="{{ route('penjualan.update', $sale->id) }}"
                          onsubmit="return confirm('Yakin ingin checkout transaksi ini?')" class="mb-2">
                        @csrf
                        @method('PUT')
                        
                        <select name="payment_method" class="form-select mb-3">
                            <option value="">✨ Pilih Metode Pembayaran</option>
                            <option value="CASH">CASH (Tunai)</option>
                            <option value="QRIS">QRIS (Digital)</option>
                        </select>

                        <button class="btn btn-checkout w-100 py-3" {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}>
                            <i class="fa-solid fa-circle-check me-2"></i> Checkout Transaksi
                        </button>
                    </form>

                    @can('delete', $sale)
                    <form action="{{ route('penjualan.destroy', $sale->id) }}"
                          method="POST" 
                          onsubmit="return confirm('Yakin ingin membatalkan transaksi?')">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-cancel-trans w-100">
                            <i class="fa-solid fa-ban me-2"></i> Batal Transaksi
                        </button>
                    </form>
                    @endcan
                </div>

            </div>
        </div>

    </div>

</div>

@endsection