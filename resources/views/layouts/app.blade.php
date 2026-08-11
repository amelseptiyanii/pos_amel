<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <!-- Isi title yang kita kirimkan dari views lain -->
    <title>@yield('title')</title>

    <!-- memanggil link bootstrap -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background: linear-gradient(135deg, #fdf6f9, #f4e8ee);
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .alert-success-feminine {
            background: linear-gradient(135deg, #fce7f3, #fbcfe8);
            color: #9d174d;
            border: 1px solid #f9a8d4;
            border-radius: 18px;
            padding: 18px 25px;
            font-weight: 600;
            box-shadow: 0 10px 25px rgba(190, 24, 93, 0.12);
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .alert-success-feminine i {
            color: #db2777;
            font-size: 22px;
        }
    </style>
</head>

<body>

<div class="container mt-3">

    @if(session('success'))
        <div class="alert-success-feminine">
            <i class="fa-solid fa-circle-check"></i>
            {{ session('success') }}
        </div>
    @endif

    <!-- Isi konten yang kita kirimkan dari views lain -->
    @yield('content')

</div>

</body>
</html>