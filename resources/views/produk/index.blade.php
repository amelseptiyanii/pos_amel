@extends('layouts.app')

@section('title', 'Produk')

@section('content')

@include('layouts.navbar')

<!-- Tambahkan CDN Google Fonts & FontAwesome untuk nuansa feminim dan elegan -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
body{
    background: linear-gradient(135deg, #fdf6f9, #f4e8ee);
    font-family:'Plus Jakarta Sans', sans-serif;
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

.container {
    max-width: 1280px;
}

/* HEADER */
.shop-header{
    margin-top:40px;
    padding:45px;
    border-radius:30px;
    background: linear-gradient(135deg, #f43f5e, #be123c);
    color:white;
    box-shadow: 0 20px 40px rgba(225, 29, 72, 0.15);
}

.shop-header h1{
    font-family: 'Playfair Display', serif;
    font-size:38px;
    font-weight:700;
    letter-spacing: 0.5px;
}

.shop-header p{
    color: #fce7f3;
    font-size: 1.05rem;
    opacity: 1;
}

/* TOMBOL TAMBAH PRODUK */
.btn-add-product {
    background: #ffffff;
    color: #be123c;
    border: none;
    padding: 12px 25px;
    border-radius: 30px;
    font-weight: 700;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    transition: 0.3s;
}

.btn-add-product:hover {
    background: #fff1f2;
    color: #9f1239;
    transform: translateY(-3px);
}

/* SEARCH */
.search-box{
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(12px);
    padding:20px;
    border-radius:20px;
    box-shadow: 0 10px 30px rgba(225, 29, 72, 0.05);
    border: 1px solid rgba(254, 205, 211, 0.4);
}

.search-box input{
    border:none;
    background:#fff1f2;
    padding:15px;
    border-radius:15px;
    color: #4a3540;
}

.search-box input:focus {
    background: #ffffff;
    box-shadow: 0 0 0 3px rgba(244, 63, 94, 0.15);
}

.btn-search{
    background:#be123c;
    color:white;
    border:none;
    border-radius:15px;
    padding:12px 25px;
    font-weight: 600;
    transition: 0.3s;
}

.btn-search:hover {
    background: #9f1239;
}

/* PRODUCT CARD */
.product-card{
    background: rgba(255, 255, 255, 0.92);
    backdrop-filter: blur(12px);
    border-radius:24px;
    overflow:hidden;
    box-shadow: 0 12px 30px rgba(225, 29, 72, 0.06);
    transition:.35s;
    height:100%;
    border: 1px solid rgba(254, 205, 211, 0.4);
}

.product-card:hover{
    transform:translateY(-8px);
    box-shadow: 0 20px 45px rgba(225, 29, 72, 0.12);
}

/* IMAGE */
.product-image{
    height:240px;
    background:#fff5f7;
    display:flex;
    justify-content:center;
    align-items:center;
    position:relative;
}

.product-image img{
    width:90%;
    height:90%;
    object-fit:contain;
    transition:.4s;
}

.product-card:hover img{
    transform:scale(1.08);
}

/* BODY */
.product-body{
    padding:25px;
}

.product-name{
    font-family: 'Playfair Display', serif;
    font-size:20px;
    font-weight:700;
    color:#4a3540;
}

.brand{
    font-size:12px;
    color:#be123c;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* PRICE */
.price{
    color:#be123c;
    font-size:22px;
    font-weight:800;
}

/* STOCK */
.stock{
    display:inline-block;
    padding:6px 14px;
    border-radius:20px;
    background:#ffe4e6;
    color:#9f1239;
    font-size:12px;
    font-weight:700;
}

/* BUTTON */
.action-btn{
    display:flex;
    gap:8px;
    margin-top:20px;
}

.action-btn a,
.action-btn button{
    flex:1;
    border-radius:12px;
    font-size:13px;
    font-weight: 600;
    padding: 8px 12px;
    border: none;
    transition: 0.3s;
    text-align: center;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.btn-detail{
    background:#0ea5e9;
    color:white;
}

.btn-detail:hover {
    background: #0284c7;
    color: white;
}

.btn-edit{
    background:#f59e0b;
    color:white;
}

.btn-edit:hover {
    background: #d97706;
    color: white;
}

.btn-delete{
    background:#f43f5e;
    color:white;
}

.btn-delete:hover {
    background: #e11d48;
    color: white;
}

/* PAGINATION */
.pagination{
    justify-content:center;
    margin-top:35px;
}

.page-link{
    border:none;
    border-radius:50%!important;
    margin:0 4px;
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #e11d48;
    background: #fff1f2;
    font-weight: 600;
    box-shadow: 0 2px 6px rgba(225, 29, 72, 0.05);
}

.page-item.active .page-link{
    background:#e11d48;
    color: white;
}
</style>

<div class="container">

<!-- HEADER -->
<div class="shop-header">
<div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
    <div>
        <h1>
            <i class="fa-solid fa-shoe-prints me-2"></i> SPTYSTORE Shoes Collection
        </h1>
        <p class="mb-0">
            Temukan koleksi sepatu terbaik dengan kualitas premium
        </p>
    </div>

    @can('create', App\Models\Produk::class)
    <div>
        <a href="{{ route('produk.create') }}" 
           class="btn-add-product">
            <i class="bi bi-plus-circle"></i>
            Tambah Produk
        </a>
    </div>
    @endcan
</div>
</div>

<!-- SEARCH -->
<div class="search-box mt-4 mb-5">
<form action="{{ route('produk.index') }}" method="GET">
<div class="row g-3">
<div class="col-md-10">
<input 
type="text"
name="search"
class="form-control"
placeholder="Cari sepatu..."
value="{{ request('search') }}"
>
</div>

<div class="col-md-2">
<button class="btn-search w-100 h-100">
🔍 Cari
</button>
</div>
</div>
</form>
</div>

<!-- PRODUCT GRID -->
<div class="row g-4">

@forelse($products as $product)

<div class="col-xl-3 col-lg-4 col-md-6">

<div class="product-card">

<div class="product-image">
<img src="{{ asset('storage/'.$product->foto) }}">
</div>

<div class="product-body">

<div class="brand">
SPTYSTORE ORIGINAL
</div>

<div class="product-name mt-1">
{{ $product->nama }}
</div>

<div class="mt-3">
<span class="stock">
Stok {{ $product->stok }}
</span>
</div>

<div class="price mt-3">
Rp {{ number_format($product->harga_jual,0,',','.') }}
</div>

<div class="text-muted small mt-1" style="display: none;">
Modal :
Rp {{ number_format($product->harga_beli,0,',','.') }}
</div>

<div class="action-btn">

<a href="{{route('produk.show',$product)}}"
class="btn btn-detail">
Detail
</a>

@can('update',$product)
<a href="{{route('produk.edit',$product)}}"
class="btn btn-edit">
Edit
</a>
@endcan

@can('delete',$product)
<form action="{{route('produk.destroy',$product)}}"
method="POST"
style="flex:1">
@csrf
@method('DELETE')

<button
class="btn btn-delete w-100"
onclick="return confirm('Hapus produk ini?')">
Hapus
</button>
</form>
@endcan

</div>

</div>

</div>

</div>

@empty

<div class="text-center py-5">
<h3 class="text-muted">
😢 Produk belum tersedia
</h3>
</div>

@endforelse

</div>

<div class="mt-5">
{{$products->links()}}
</div>

</div>

@endsection