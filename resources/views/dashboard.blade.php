<!-- memanggil file app.blade.php -->
@extends('layouts.app')

<!-- mengirimkan nilai ke tittle untuk ditampilkan -->
@section('title', 'Dashboard - SPTYSTORE')

<!-- batas awal isi konten -->
@section('content')

@include('layouts.navbar')

<!-- Tambahkan CDN Google Fonts & FontAwesome untuk nuansa feminim dan elegan -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="container py-5">
    <div class="dashboard-header text-center mb-5">
        <h1 class="store-title">
            <i class="fa-solid fa-shoe-prints me-2 text-accent"></i> Toko SPTYSTORE
        </h1>
        <h2 class="dashboard-subtitle">
            Ringkasan Hari Ini
            <span class="badge date-badge ms-2">
                <i class="fa-regular fa-calendar-days me-1"></i> ({{$tanggalHariIni->translatedFormat('l, d F Y')}})
            </span>
        </h2>
    </div>

    @can('viewAny', App\Models\User::class)
    <!-- Today's Sales Section -->
    <div class="mb-5">
        <div class="section-header-modern mb-4">
            <h3><i class="fa-solid fa-chart-line me-2"></i> Today's Sales</h3>
        </div>
        <div class="row g-4">
            <!-- Total Nilai Penjualan -->
            <div class="col-md-4">
                <div class="card text-center h-100 shadow-sm border-0">
                    <div class="card-header bg-gradient-rose text-white py-3">
                        <h3 class="mb-0"><i class="fa-solid fa-wallet me-2"></i> Total Nilai Penjualan Hari ini</h3>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <h4 class="text-rose mb-0 fw-bold">Rp. {{ number_format($ringkasan['total_penjualan']) }}</h4>
                    </div>
                </div>
            </div>

            <!-- Jumlah Transaksi -->
            <div class="col-md-4">
                <div class="card text-center h-100 shadow-sm border-0">
                    <div class="card-header bg-gradient-rose text-white py-3">
                        <h3 class="mb-0"><i class="fa-solid fa-receipt me-2"></i> Jumlah Transaksi Hari ini</h3>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <h4 class="text-rose mb-0 fw-bold">{{ number_format($ringkasan['total_transaksi']) }} Transaksi</h4>
                    </div>
                </div>
            </div>

            <!-- Kuantitas Barang Dibeli / Total Item Terjual -->
            <div class="col-md-4">
                <div class="card text-center h-100 shadow-sm border-0">
                    <div class="card-header bg-gradient-rose text-white py-3">
                        <h3 class="mb-0"><i class="fa-solid fa-bag-shopping me-2"></i> Total Item Belanjaan Terjual</h3>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <h4 class="text-rose mb-0 fw-bold">
                            {{ number_format($ringkasan['total_qty_terjual'] ?? 0) }} Pcs 
                            <span class="d-block text-muted small mt-1 font-monospace" style="font-size: 0.85rem; font-weight: normal;">(Jumlah produk dibeli)</span>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cash & Payment Status Section -->
    <div class="mb-5">
        <div class="section-header-modern mb-4">
            <h3><i class="fa-solid fa-cash-register me-2"></i> Cash & Payment Status</h3>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card text-center h-100 shadow-sm border-0">
                    <div class="card-header bg-gradient-blush text-white py-3">
                        <h3 class="mb-0"><i class="fa-solid fa-money-bill-wave me-2"></i> Total pembayaran tunai</h3>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <h4 class="text-blush mb-0 fw-bold">Rp. {{ number_format($ringkasan['total_cash']) }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-center h-100 shadow-sm border-0">
                    <div class="card-header bg-gradient-cream text-white py-3">
                        <h3 class="mb-0"><i class="fa-solid fa-credit-card me-2"></i> Total pembayaran non-tunai</h3>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <h4 class="text-cream mb-0 fw-bold">Rp. {{ number_format($ringkasan['total_non_tunai']) }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan

    <!-- Critical Inventory Status Section -->
    <div class="mb-5">
        <div class="section-header-modern mb-4">
            <h3><i class="fa-solid fa-triangle-exclamation me-2 text-warning"></i> Critical Inventory Status</h3>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card p-3 h-100 shadow-sm border-0">
                    <h3 class="h4 mb-3 text-dark"><i class="fa-solid fa-box-open text-warning me-2"></i> Daftar produk stok rendah</h3>
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 15%;">#</th>
                                    <th scope="col" style="width: 60%;">Nama</th>
                                    <th scope="col" style="width: 25%;">Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($produkStokRendah as $index => $produk)
                                <tr>
                                    <td>{{ $produkStokRendah->firstItem() + $index }}</td>
                                    <td><span class="fw-semibold text-dark">{{ $produk->nama}}</span></td>
                                    <td><span class="badge bg-warning text-dark px-3 py-2 rounded-pill">{{$produk->stok}} pcs</span></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-muted text-center py-4">
                                        <i class="fa-regular fa-face-smile fa-2x mb-2 text-rose"></i><br>
                                        Seluruh produk berada dalam kondisi stok aman.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-auto">
                        {{ $produkStokRendah->links() }}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-3 h-100 shadow-sm border-0">
                    <h3 class="h4 mb-3 text-dark"><i class="fa-solid fa-circle-xmark text-danger me-2"></i> Produk habis stok</h3>
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 15%;">#</th>
                                    <th scope="col" style="width: 60%;">Nama</th>
                                    <th scope="col" style="width: 25%;">Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($produkStokHabis as $index => $produk)
                                <tr>
                                    <td>{{ $produkStokHabis->firstItem() + $index }}</td>
                                    <td><span class="fw-semibold text-dark">{{ $produk->nama}}</span></td>
                                    <td><span class="badge bg-danger px-3 py-2 rounded-pill">{{$produk->stok}} pcs</span></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-muted text-center py-4">
                                        <i class="fa-regular fa-face-smile fa-2x mb-2 text-rose"></i><br>
                                        Seluruh produk berada dalam kondisi stok aman.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-auto">
                        {{ $produkStokHabis->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Best Seller Products Section -->
    <div class="mb-5">
        <div class="section-header-modern mb-4">
            <h3><i class="fa-solid fa-fire me-2 text-rose"></i> Best Seller Products</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3 shadow-sm border-0">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th scope="col"><i class="fa-solid fa-shoe-prints me-1"></i> Nama Produk</th>
                                    <th scope="col">Stok Tersedia</th>
                                    <th scope="col"><i class="fa-solid fa-bag-shopping me-1"></i> Unit Terjual</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($produkTerlaris as $produk)
                                <tr>
                                    <td><span class="fw-bold text-rose-dark">{{ $produk->nama}}</span></td>
                                    <td><span class="badge bg-light text-dark border px-3 py-2 rounded-pill">{{ $produk->stok}} pcs</span></td>
                                    <td><span class="badge bg-gradient-rose text-white px-3 py-2 rounded-pill">{{$produk->total_terjual }} terjual</span></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-muted text-center py-4">
                                        Seluruh produk berada dalam kondisi stok aman.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- batas Akhir isi konten -->
<style>
    /* ===== FEMININE ELEGANT SHOE BOUTIQUE THEME ===== */
    body {
        background: linear-gradient(135deg, #fdf6f9, #f4e8ee);
        font-family: 'Plus Jakarta Sans', sans-serif;
        min-height: 100vh;
        color: #2c2227;
    }

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

    .store-title {
        font-family: 'Playfair Display', serif;
        color: #881337;
        font-weight: 700;
        letter-spacing: 1px;
        font-size: 2.5rem;
    }

    .text-accent {
        color: #e11d48 !important;
    }

    .dashboard-subtitle {
        font-size: 1.15rem;
        font-weight: 500;
        color: #705863;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 10px;
    }

    h3 {
        font-family: 'Playfair Display', serif;
        font-weight: 600;
        color: #4a3540;
        font-size: 1.2rem;
    }

    .card {
        border: none;
        border-radius: 24px;
        overflow: hidden;
        background: rgba(255, 255, 255, 0.92);
        backdrop-filter: blur(12px);
        box-shadow: 0 12px 30px rgba(225, 29, 72, 0.06);
        transition: all 0.35s ease;
    }

    .card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 40px rgba(225, 29, 72, 0.12);
    }

    .card-header {
        border: none;
        padding: 20px;
    }

    .bg-gradient-rose {
        background: linear-gradient(135deg, #f43f5e, #be123c) !important;
    }

    .bg-gradient-blush {
        background: linear-gradient(135deg, #fb7185, #e11d48) !important;
    }

    .bg-gradient-cream {
        background: linear-gradient(135deg, #fda4af, #f43f5e) !important;
    }

    .text-rose {
        color: #e11d48 !important;
    }

    .text-rose-dark {
        color: #9f1239 !important;
    }

    .text-blush {
        color: #be123c !important;
    }

    .text-cream {
        color: #9f1239 !important;
    }

    .card-header h3 {
        color: white;
        font-size: 0.95rem;
        margin: 0;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 600;
    }

    .card-body {
        padding: 25px;
    }

    .card-body h4 {
        color: #4a3540;
        font-size: 1.6rem;
        font-weight: 700;
    }

    .section-header-modern h3 {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(10px);
        padding: 16px 24px;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(225, 29, 72, 0.04);
        border-left: 5px solid #e11d48;
        font-size: 1.3rem;
        text-align: left;
        color: #4a3540;
        margin: 0;
    }

    .table {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        margin-bottom: 1rem;
    }

    .table thead th {
        background: #fff1f2;
        color: #881337;
        border: none;
        padding: 15px 18px;
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table tbody td {
        padding: 15px 18px;
        color: #4a3540;
        vertical-align: middle;
        border-bottom: 1px solid #fce7f3;
        font-size: 0.95rem;
    }

    .table tbody tr:hover {
        background: #fff5f7;
    }

    .pagination {
        justify-content: center;
        margin-top: 15px;
    }

    .page-link {
        border: none;
        border-radius: 50%;
        margin: 0 4px;
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #e11d48;
        background: #fff1f2;
        box-shadow: 0 2px 6px rgba(225, 29, 72, 0.05);
        font-size: 0.85rem;
        font-weight: 600;
    }

    .page-item.active .page-link {
        background: #e11d48;
        border-color: #e11d48;
        color: white;
    }

    .date-badge {
        background: #ffe4e6;
        color: #9f1239 !important;
        padding: 8px 16px;
        border-radius: 30px;
        font-size: 0.9rem;
        font-weight: 600;
    }

    .card, .table {
        animation: muncul 0.5s ease;
    }

    @keyframes muncul {
        from {
            opacity: 0;
            transform: translateY(15px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media(max-width: 768px) {
        .store-title {
            font-size: 1.8rem;
        }
        .dashboard-subtitle {
            font-size: 0.95rem;
        }
        .card-body h4 {
            font-size: 1.3rem;
        }
    }
</style>
@endsection