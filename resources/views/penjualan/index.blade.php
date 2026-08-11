@extends('layouts.app')

@section('title', 'Penjualan')

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

/* CONTAINER */
.shop-container{
    margin-top:40px;
    max-width: 1280px;
}

/* HEADER - Pembeda: Nuansa Rose Gold & Warm Amber khusus Transaksi Kasir */
.shop-header{
    background: linear-gradient(135deg, #9f1239, #be123c);
    color:white;
    border-radius:30px;
    padding:45px;
    margin-bottom:30px;
    box-shadow: 0 20px 40px rgba(159, 18, 57, 0.2);
}

.shop-header h1{
    font-family: 'Playfair Display', serif;
    font-size:38px;
    font-weight:700;
    letter-spacing: 0.5px;
}

.shop-header p{
    color:#fce7f3;
    font-size: 1.05rem;
}

/* BUTTON */
.btn-create{
    background:#ffffff;
    color:#9f1239;
    padding:12px 25px;
    border-radius:30px;
    font-weight:700;
    border:none;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    transition: 0.3s;
}

.btn-create:hover{
    background:#fff1f2;
    color:#881337;
    transform: translateY(-3px);
}

/* SEARCH */
.search-card{
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(12px);
    padding:15px;
    border-radius:20px;
    box-shadow: 0 10px 30px rgba(225, 29, 72, 0.05);
    border: 1px solid rgba(254, 205, 211, 0.4);
}

.search-card input{
    border:none;
    padding:15px;
    background: #fff1f2;
    border-radius: 12px;
    color: #4a3540;
}

.search-card button{
    border-radius:15px;
    background: #be123c;
    border: none;
    font-weight: 600;
    transition: 0.3s;
}

.search-card button:hover {
    background: #9f1239;
}

/* ORDER CARD */
.order-card{
    background: rgba(255, 255, 255, 0.92);
    backdrop-filter: blur(12px);
    border-radius:24px;
    padding:25px;
    margin-bottom:20px;
    box-shadow: 0 12px 30px rgba(225, 29, 72, 0.06);
    transition:.3s;
    border: 1px solid rgba(254, 205, 211, 0.4);
}

.order-card:hover{
    transform:translateY(-6px);
    box-shadow: 0 20px 40px rgba(225, 29, 72, 0.12);
}

/* TOP ORDER */
.order-top{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.order-number{
    font-family: 'Playfair Display', serif;
    font-size:22px;
    font-weight:700;
    color: #4a3540;
}

.order-date{
    color:#885d6e;
    font-size: 0.9rem;
}

/* PRODUCT INFO */
.info-box{
    display:flex;
    gap:25px;
    flex-wrap:wrap;
}

.info-item{
    background:#fff5f7;
    padding:15px 20px;
    border-radius:18px;
    border: 1px solid #fce7f3;
}

.info-item span{
    display:block;
    color:#885d6e;
    font-size:13px;
    font-weight: 600;
}

.info-item strong{
    font-size:18px;
    color: #4a3540;
}

/* PRICE */
.total{
    color:#be123c;
    font-size:24px;
    font-weight:800;
}

/* STATUS */
.status{
    padding:8px 20px;
    border-radius:50px;
    font-size:13px;
    font-weight:700;
}

.selesai{
    background:#dcfce7;
    color:#15803d;
}

.proses{
    background:#fef3c7;
    color:#b45309;
}

.batal{
    background:#fee2e2;
    color:#dc2626;
}

/* ACTION */
.action {
    display: flex;
    gap: 8px;
}

.action a,
.action button{
    border-radius:15px;
    padding:9px 18px;
    font-weight:600;
    border: none;
    transition: 0.3s;
}

.action .btn-primary {
    background: #0ea5e9;
}
.action .btn-primary:hover {
    background: #0284c7;
}

.action .btn-warning {
    background: #f59e0b;
    color: white;
}
.action .btn-warning:hover {
    background: #d97706;
}

.action .btn-danger {
    background: #f43f5e;
}
.action .btn-danger:hover {
    background: #e11d48;
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

<div class="container shop-container">

<div class="shop-header">
<div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
    <div>
        <h1>
            <i class="fa-solid fa-receipt me-2"></i> Sneaker Store
        </h1>
        <p class="mb-0">
            Manajemen transaksi penjualan sepatu modern
        </p>
    </div>

    <div>
        <a href="{{ route('penjualan.create') }}"
        class="btn btn-create">
            + Tambah Pesanan
        </a>
    </div>
</div>
</div>

@if(session('errors'))
<div class="alert alert-danger">
{{session('errors')}}
</div>
@endif

<form action="{{route('penjualan.index')}}"
method="GET"
class="mb-4">

<div class="search-card input-group">
<input
type="text"
name="search"
value="{{request()->search}}"
class="form-control"
placeholder="Cari nomor transaksi / kasir...">

<button class="btn btn-dark px-4">
🔍 Cari
</button>
</div>

</form>

@forelse($sales as $sale)

<div class="order-card">

<div class="order-top">
<div>
<div class="order-number">
#ORDER-{{$sale->id}}
</div>
<div class="order-date">
{{$sale->created_at->translatedFormat('d F Y H:i')}}
</div>
</div>

<div>
@if(strtolower($sale->status)=='selesai')
<span class="status selesai">
{{$sale->status}}
</span>
@elseif(strtolower($sale->status)=='proses')
<span class="status proses">
{{$sale->status}}
</span>
@else
<span class="status batal">
{{$sale->status}}
</span>
@endif
</div>
</div>

<div class="info-box">

<div class="info-item">
<span>Kasir</span>
<strong>
{{$sale->user->name}}
</strong>
</div>

<div class="info-item">
<span>Pembayaran</span>
<strong>
{{$sale->metode_pembayaran}}
</strong>
</div>

<div class="info-item">
<span>Total Belanja</span>
<strong class="total">
Rp {{number_format($sale->total_pembayaran)}}
</strong>
</div>

</div>

<div class="mt-4 action">

<a href="{{route('penjualan.show',$sale)}}"
class="btn btn-primary">
Detail
</a>

@can('view',$sale)
<a href="{{route('penjualan.edit',$sale)}}"
class="btn btn-warning">
Edit
</a>
@endcan

@can('delete',$sale)
<form action="{{route('penjualan.destroy',$sale)}}"
method="POST"
class="d-inline" style="flex:unset;">
@csrf
@method('DELETE')
<button class="btn btn-danger"
onclick="return confirm('Hapus transaksi ini?')">
Hapus
</button>
</form>
@endcan

</div>

</div>

@empty

<div class="text-center p-5">
<h3 class="text-muted">
👟 Belum ada transaksi sepatu
</h3>
</div>

@endforelse

{{$sales->links()}}

</div>

@endsection