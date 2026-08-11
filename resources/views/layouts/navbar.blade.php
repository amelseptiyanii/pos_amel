<nav class="navbar navbar-expand-lg shadow-sm custom-navbar py-3">
    <div class="container">

        <!-- Brand dengan nuansa feminin -->
        <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('dashboard') }}" style="color: #d63384; font-family: 'Poppins', sans-serif; letter-spacing: 0.5px;">
            <i class="fa-solid fa-wand-magic-sparkles me-2" style="font-size: 1.1rem;"></i> SptuStore
        </a>

        <button class="navbar-toggler border-0 shadow-none" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav align-items-center w-100 ms-lg-3">

                <li class="nav-item">
                    <a class="nav-link px-3 py-2 rounded-pill transition-all {{ Request::is('dashboard') ? 'active-girl' : '' }}"
                        href="{{ route('dashboard') }}">
                        <i class="fa-solid fa-house me-1"></i> Beranda
                    </a>
                </li>

                @if(auth()->check() && strtolower(auth()->user()->role->name) === 'admin')
                <li class="nav-item">
                    <a class="nav-link px-3 py-2 rounded-pill transition-all {{ Request::is('admin/users') ? 'active-girl' : '' }}"
                        href="{{ route('admin.users') }}">
                        <i class="fa-solid fa-users me-1"></i> Pengguna
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link px-3 py-2 rounded-pill transition-all {{ Request::is('produk') ? 'active-girl' : '' }}"
                        href="{{ route('produk.index') }}">
                        <i class="fa-solid fa-shoe-prints me-1"></i> Produk
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3 py-2 rounded-pill transition-all {{ Request::is('penjualan') ? 'active-girl' : '' }}"
                        href="{{ route('penjualan.index') }}">
                        <i class="fa-solid fa-cart-shopping me-1"></i> Penjualan
                    </a>
                </li>

                <!-- Bagian Tombol Logout di Pinggir -->
                <li class="nav-item ms-auto mt-3 mt-lg-0">
                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="btn logout-girl-btn d-flex align-items-center px-3 py-2 rounded-pill">
                            <i class="fa-solid fa-right-from-bracket me-1"></i> Logout
                        </button>
                    </form>
                </li>

            </ul>

        </div>
    </div>
</nav>

<!-- Tambahkan Style CSS Pendukung di Bawah Kodingan Ini (atau di file CSS Anda) -->
<style>
    /* Styling Dasar Navbar */
    .custom-navbar {
        background-color: #fff0f3; /* Background pink muda pastel yang manis */
        border-bottom: 1px solid #ffd1dc;
    }

    /* Warna Teks Menu Default */
    .custom-navbar .nav-link {
        color: #6c757d;
        font-weight: 500;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    /* Efek Hover pada Menu */
    .custom-navbar .nav-link:hover {
        color: #d63384;
        background-color: #ffe5ec;
    }

    /* Styling Menu Aktif (Saat halaman dibuka) */
    .custom-navbar .nav-link.active-girl {
        color: #ffffff !important;
        background-color: #ff758c !important;
        box-shadow: 0 4px 10px rgba(255, 117, 140, 0.3);
    }

    /* Tombol Logout Khas Toko Cewek (Soft Gradient Pink) */
    .logout-girl-btn {
        background: linear-gradient(135deg, #ff758c 0%, #ff7eb3 100%);
        border: none;
        color: white;
        font-weight: 500;
        font-size: 0.95rem;
        box-shadow: 0 4px 10px rgba(255, 117, 140, 0.25);
        transition: all 0.3s ease;
    }

    .logout-girl-btn:hover {
        background: linear-gradient(135deg, #e65c75 0%, #fa6ea0 100%);
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 6px 15px rgba(255, 117, 140, 0.4);
    }
</style>