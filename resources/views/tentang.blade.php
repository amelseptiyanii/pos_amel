<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tentang Saya - SptyStore</title>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #fff0f5, #ffe4ec);
            color: #555;
        }

        /* =========================
           NAVBAR
        ========================= */
        .navbar {
            width: 92%;
            margin: 25px auto;
            min-height: 75px;
            background: #ffffff;
            display: flex;
            align-items: center;
            padding: 15px 25px;
            border-radius: 5px;
            box-shadow: 0 5px 20px rgba(200, 0, 60, 0.08);
        }

        .logo {
            color: #d41452;
            font-size: 25px;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-right: 35px;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 8px;
            flex: 1;
        }

        .nav-menu a {
            text-decoration: none;
            color: #6c6c6c;
            font-size: 16px;
            padding: 13px 16px;
            border-radius: 30px;
            transition: 0.3s;
        }

        .nav-menu a:hover {
            color: #d41452;
            background: #fff0f5;
        }

        .nav-menu a.active {
            color: white;
            background: #ff6b91;
            box-shadow: 0 5px 15px rgba(255, 107, 145, 0.3);
        }

        .nav-menu i {
            margin-right: 6px;
        }

        .logout {
            border: none;
            background: #ff6b91;
            color: white;
            padding: 13px 22px;
            border-radius: 30px;
            font-size: 16px;
            cursor: pointer;
        }

        /* =========================
           CONTAINER
        ========================= */
        .container {
            width: 92%;
            max-width: 1250px;
            margin: 50px auto 80px;
        }

        /* =========================
           HEADER
        ========================= */
        .hero {
            background: linear-gradient(135deg, #f72f5b, #c9003d);
            color: white;
            padding: 45px;
            border-radius: 35px;
            margin-bottom: 30px;
            box-shadow: 0 15px 35px rgba(200, 0, 60, 0.18);
        }

        .hero h1 {
            font-family: Georgia, serif;
            font-size: 42px;
            margin-bottom: 12px;
        }

        .hero h1 i {
            margin-right: 10px;
        }

        .hero p {
            font-size: 18px;
        }

        /* =========================
           PROFILE
        ========================= */
        .profile-card {
            background: white;
            border-radius: 30px;
            padding: 40px;
            display: grid;
            grid-template-columns: 280px 1fr; /* TANDA - YANG BIKIN ERROR SUDAH DIHAPUS DI SINI */
            gap: 45px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(200, 0, 60, 0.08);
        }

        .profile {
            text-align: center;
            border-right: 1px solid #eee;
            padding-right: 35px;
        }

        .foto {
            width: 180px;
            height: 180px;
            margin: 0 auto 20px;
            border-radius: 50%;
            overflow: hidden;
            background: linear-gradient(135deg, #ff4770, #c9003d);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 75px;
            border: 6px solid #fff0f5;
            box-shadow: 0 10px 25px rgba(200, 0, 60, 0.2);
        }

        .foto img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile h2 {
            color: #c9003d;
            margin-bottom: 8px;
        }

        .jabatan {
            color: #888;
            font-size: 14px;
        }

        /* =========================
           CONTENT
        ========================= */
        .content h2 {
            color: #c9003d;
            margin-bottom: 15px;
            font-size: 25px;
        }

        .content h2 i {
            margin-right: 8px;
        }

        .content p {
            line-height: 1.8;
            margin-bottom: 18px;
            color: #666;
            font-size: 16px;
        }

        /* =========================
           SECTION
        ========================= */
        .section {
            background: white;
            padding: 40px;
            border-radius: 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(200, 0, 60, 0.08);
        }

        .section-title {
            color: #c9003d;
            font-size: 28px;
            margin-bottom: 25px;
            text-align: center;
        }

        /* =========================
           TEKNOLOGI
        ========================= */
        .tech-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .tech-card {
            background: #fff5f7;
            padding: 25px;
            border-radius: 20px;
            text-align: center;
            border: 1px solid #ffe0e8;
            transition: 0.3s;
        }

        .tech-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(200, 0, 60, 0.1);
        }

        .tech-card i {
            font-size: 40px;
            color: #d41452;
            margin-bottom: 15px;
        }

        .tech-card h3 {
            color: #555;
            margin-bottom: 8px;
        }

        .tech-card p {
            color: #888;
            font-size: 14px;
            line-height: 1.6;
        }

        /* =========================
           FITUR
        ========================= */
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .feature {
            display: flex;
            align-items: center;
            gap: 15px;
            background: #fff5f7;
            padding: 18px;
            border-radius: 15px;
        }

        .feature i {
            width: 45px;
            height: 45px;
            min-width: 45px;
            background: #d41452;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .feature h3 {
            color: #555;
            margin-bottom: 5px;
        }

        .feature p {
            font-size: 14px;
            color: #888;
        }

        /* =========================
           PROJECT INFO
        ========================= */
        .project-info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .project-item {
            padding: 20px;
            background: #fff5f7;
            border-radius: 15px;
            border-left: 5px solid #d41452;
        }

        .project-item strong {
            display: block;
            color: #c9003d;
            margin-bottom: 8px;
        }

        .project-item span {
            color: #666;
        }

        /* =========================
           FOOTER
        ========================= */
        .footer {
            text-align: center;
            padding: 25px;
            color: #888;
            font-size: 14px;
        }

        .footer span {
            color: #d41452;
            font-weight: bold;
        }

        /* =========================
           RESPONSIVE
        ========================= */
        @media (max-width: 900px) {
            .navbar {
                flex-wrap: wrap;
                gap: 15px;
            }

            .nav-menu {
                order: 3;
                width: 100%;
                overflow-x: auto;
            }

            .profile-card {
                grid-template-columns: 1fr;
            }

            .profile {
                border-right: none;
                border-bottom: 1px solid #eee;
                padding-right: 0;
                padding-bottom: 30px;
            }

            .tech-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .hero {
                padding: 30px;
            }

            .hero h1 {
                font-size: 32px;
            }

            .profile-card,
            .section {
                padding: 25px;
            }

            .feature-grid,
            .project-info {
                grid-template-columns: 1fr;
            }

            .nav-menu a {
                font-size: 14px;
                padding: 10px;
            }

            .logout {
                padding: 10px 15px;
            }
        }
    </style>
</head>

<body>

    <!-- =========================
         NAVBAR
    ========================= -->
    <nav class="navbar">
        <div class="logo">
            <i class="fa-solid fa-wand-magic-sparkles"></i>
            SptyStore
        </div>

        <div class="nav-menu">
            <a href="{{ route('dashboard') }}">
                <i class="fa-solid fa-house"></i>
                Beranda
            </a>

            <a href="{{ route('tentang') }}" class="active">
                <i class="fa-solid fa-user"></i>
                Tentang Saya
        </a>
                <a href="{{ url('/produk') }}">
                <i class="fa-solid fa-shoe-prints"></i>
                Pengguna
            </a>
           

            <a href="{{ url('/produk') }}">
                <i class="fa-solid fa-shoe-prints"></i>
                Produk
            </a>

            <a href="{{ url('/penjualan') }}">
                <i class="fa-solid fa-cart-shopping"></i>
                Penjualan
            </a>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout">
                <i class="fa-solid fa-right-from-bracket"></i>
                Logout
            </button>
        </form>
    </nav>

    <!-- =========================
         CONTENT
    ========================= -->
    <div class="container">

        <!-- HEADER -->
        <section class="hero">
            <h1>
                <i class="fa-solid fa-user"></i>
                Tentang Saya
            </h1>
            <p>
                Mengenal lebih dekat pembuat dan aplikasi SptyStore.
            </p>
        </section>

        <!-- PROFILE -->
        <section class="profile-card">
            <div class="profile">
               <div class="foto">
                    <img src="{{ asset('storage/images/profil.jpg') }}" alt="Foto Amel Septiyani">
                </div>
                <h2>
                    Amel septiyani
                </h2>
                <p class="jabatan">
                    siswa / Web Developer
                </p>
            </div>

            <div class="content">
                <h2>
                    <i class="fa-solid fa-user-circle"></i>
                    Tentang Saya
                </h2>
                <p>
                    Halo, perkenalkan nama saya
                    <strong>Amel septiyani</strong>.
                    Saya merupakan siswa yang memiliki
                    ketertarikan terhadap teknologi informasi,
                    pemrograman, dan pengembangan aplikasi
                    berbasis web.
                </p>
                <p>
                    Saya membuat aplikasi
                    <strong>SptyStore</strong>
                    sebagai project untuk mempelajari
                    bagaimana sebuah aplikasi berbasis web
                    dapat dibuat dan dikembangkan menggunakan
                    teknologi modern.
                </p>
                <p>
                    Dalam proses pembuatan aplikasi ini,
                    saya mempelajari bagaimana mengatur
                    database, membuat sistem login,
                    mengelola produk, mengelola pengguna,
                    serta membuat sistem penjualan.
                </p>
            </div>
        </section>

        <!-- TENTANG APLIKASI -->
        <section class="section">
            <h2 class="section-title">
                <i class="fa-solid fa-store"></i>
                Tentang Aplikasi SptyStore
            </h2>

            <div class="content">
                <p>
                    <strong>SptyStore</strong> adalah aplikasi
                    berbasis web yang dibuat untuk membantu
                    proses pengelolaan toko sepatu.
                </p>
                <p>
                    Aplikasi ini menyediakan beberapa fitur
                    utama seperti pengelolaan produk,
                    pengelolaan pengguna, serta pengelolaan
                    transaksi penjualan.
                </p>
                <p>
                    Aplikasi ini juga memiliki sistem autentikasi
                    sehingga pengguna harus melakukan login
                    sebelum dapat mengakses halaman utama
                    aplikasi.
                </p>
            </div>

            <div class="project-info">
                <div class="project-item">
                    <strong>Nama Aplikasi</strong>
                    <span>SptyStore</span>
                </div>
                <div class="project-item">
                    <strong>Jenis Aplikasi</strong>
                    <span>Web E-Commerce</span>
                </div>
                <div class="project-item">
                    <strong>Tema Aplikasi</strong>
                    <span>Toko Sepatu</span>
                </div>
                <div class="project-item">
                    <strong>Tujuan</strong>
                    <span>Mengelola produk dan penjualan</span>
                </div>
            </div>
        </section>

        <!-- TEKNOLOGI -->
        <section class="section">
            <h2 class="section-title">
                <i class="fa-solid fa-code"></i>
                Bahasa Pemrograman & Teknologi
            </h2>

            <div class="tech-grid">
                <div class="tech-card">
                    <i class="fa-brands fa-laravel"></i>
                    <h3>Laravel</h3>
                    <p>Framework PHP yang digunakan untuk membangun aplikasi web.</p>
                </div>

                <div class="tech-card">
                    <i class="fa-brands fa-php"></i>
                    <h3>PHP</h3>
                    <p>Bahasa pemrograman utama yang digunakan pada backend aplikasi.</p>
                </div>

                <div class="tech-card">
                    <i class="fa-brands fa-html5"></i>
                    <h3>HTML</h3>
                    <p>Digunakan untuk membuat struktur halaman website.</p>
                </div>

                <div class="tech-card">
                    <i class="fa-brands fa-css3-alt"></i>
                    <h3>CSS</h3>
                    <p>Digunakan untuk mengatur desain dan tampilan aplikasi.</p>
                </div>

                <div class="tech-card">
                    <i class="fa-brands fa-js"></i>
                    <h3>JavaScript</h3>
                    <p>Digunakan untuk membuat interaksi pada halaman aplikasi.</p>
                </div>

                <div class="tech-card">
                    <i class="fa-solid fa-database"></i>
                    <h3>MySQL</h3>
                    <p>Database yang digunakan untuk menyimpan data aplikasi.</p>
                </div>
            </div>
        </section>

        <!-- FITUR -->
        <section class="section">
            <h2 class="section-title">
                <i class="fa-solid fa-list-check"></i>
                Fitur Aplikasi
            </h2>

            <div class="feature-grid">
                <div class="feature">
                    <i class="fa-solid fa-box"></i>
                    <div>
                        <h3>Manajemen Produk</h3>
                        <p>Menambahkan, melihat, mengubah, dan menghapus produk sepatu.</p>
                    </div>
                </div>

                <div class="feature">
                    <i class="fa-solid fa-users"></i>
                    <div>
                        <h3>Manajemen Pengguna</h3>
                        <p>Mengelola data pengguna yang terdapat pada aplikasi.</p>
                    </div>
                </div>

                <div class="feature">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <div>
                        <h3>Penjualan</h3>
                        <p>Mengelola transaksi penjualan produk sepatu.</p>
                    </div>
                </div>

                <div class="feature">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <div>
                        <h3>Pencarian Produk</h3>
                        <p>Memudahkan pengguna mencari produk yang tersedia.</p>
                    </div>
                </div>

                <div class="feature">
                    <i class="fa-solid fa-shield-halved"></i>
                    <div>
                        <h3>Sistem Login</h3>
                        <p>Membatasi akses aplikasi berdasarkan autentikasi pengguna.</p>
                    </div>
                </div>

                <div class="feature">
                    <i class="fa-solid fa-user-shield"></i>
                    <div>
                        <h3>Role Pengguna</h3>
                        <p>Pengaturan akses berdasarkan role admin dan kasir.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- FRAMEWORK DAN TOOLS -->
        <section class="section">
            <h2 class="section-title">
                <i class="fa-solid fa-gears"></i>
                Framework & Tools
            </h2>

            <div class="project-info">
                <div class="project-item">
                    <strong>Framework</strong>
                    <span>Laravel</span>
                </div>
                <div class="project-item">
                    <strong>Bahasa Pemrograman</strong>
                    <span>PHP</span>
                </div>
                <div class="project-item">
                    <strong>Frontend</strong>
                    <span>HTML, CSS, JavaScript</span>
                </div>
                <div class="project-item">
                    <strong>Database</strong>
                    <span>MySQL</span>
                </div>
                <div class="project-item">
                    <strong>Template Engine</strong>
                    <span>Blade Template</span>
                </div>
                <div class="project-item">
                    <strong>Sistem Login</strong>
                    <span>Laravel Authentication</span>
                </div>
            </div>
        </section>

        <!-- FOOTER -->
        <div class="footer">
            Dibuat oleh
            <span>Amel septiyani</span>
            menggunakan Laravel.
            <br><br>
            &copy; {{ date('Y') }} SptyStore
        </div>

    </div>

</body>
</html>