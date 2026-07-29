@extends('layouts.app')

@section('title', 'Login - SPTYSTORE')

@section('content')

<!-- CDN Google Fonts & FontAwesome -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="card text-center position-absolute top-50 start-50 translate-middle login-aesthetic-card" style="width: 22rem;">
    <h5 class="card-header login-header-aesthetic">
        <i class="fa-solid fa-bag-shopping me-2"></i> SPTYSTORE sneakers
    </h5>

    <div class="card-body login-body-aesthetic">
        <p class="text-muted small mb-4" style="color: #885d6e !important;">✨ Silakan masuk ke akun kasir Anda ✨</p>

        <form action="{{ route('auth') }}" method="POST">
            @csrf

            <div class="mb-3 text-start">
                <label class="form-label">Email address</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="nama@email.com" value="{{ old('email') }}">
                </div>

                @error('email')
                    <div class="badge text-bg-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4 text-start">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="••••••••">
                </div>

                @error('password')
                    <div class="badge text-bg-danger">{{ $message }}</div>
                @enderror        
            </div>

            <button type="submit" class="btn btn-primary btn-login-aesthetic">
                <i class="fa-solid fa-arrow-right-to-bracket me-2"></i> Masuk Sekarang
            </button>
        </form>   
    </div>
</div>


<style>
    /* Background halaman nuansa toko wanita */
    body {
        background: linear-gradient(135deg, #fdf6f9, #f4e8ee);
        min-height: 100vh;
        font-family: 'Plus Jakarta Sans', sans-serif;
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

    /* Card Login Estetik */
    .login-aesthetic-card {
        background: rgba(255, 255, 255, 0.92);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(254, 205, 211, 0.5);
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(225, 29, 72, 0.08);
        animation: muncul 0.6s ease;
    }

    /* Header Card */
    .login-header-aesthetic {
        background: linear-gradient(135deg, #f43f5e, #be123c);
        color: white;
        font-family: 'Playfair Display', serif;
        font-size: 22px;
        font-weight: 700;
        padding: 25px;
        border: none;
        letter-spacing: 0.5px;
    }

    /* Body Card */
    .login-body-aesthetic {
        padding: 30px;
        background: transparent;
    }

    /* Label */
    .form-label {
        font-weight: 600;
        color: #4a3540;
        font-size: 0.9rem;
        margin-bottom: 6px;
    }

    /* Input Group Styling */
    .input-group-text {
        background: #fff1f2;
        border: 1px solid #fecdd3;
        border-right: none;
        border-top-left-radius: 14px;
        border-bottom-left-radius: 14px;
        color: #be123c;
    }

    /* Input */
    .form-control {
        height: 46px;
        border-radius: 14px;
        border: 1px solid #fecdd3;
        background: #fff5f7;
        color: #4a3540;
        font-size: 0.95rem;
        transition: 0.3s;
    }

    .input-group .form-control {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        border-left: none;
    }

    .form-control:focus {
        background: #ffffff;
        border-color: #f43f5e;
        box-shadow: 0 0 0 3px rgba(244, 63, 94, 0.15);
    }

    .input-group:focus-within .input-group-text {
        background: #ffffff;
        border-color: #f43f5e;
    }

    /* Button */
    .btn-login-aesthetic {
        width: 100%;
        height: 46px;
        border-radius: 14px;
        border: none;
        background: linear-gradient(135deg, #f43f5e, #be123c);
        color: white;
        font-weight: 700;
        box-shadow: 0 6px 20px rgba(225, 29, 72, 0.2);
        transition: 0.3s;
    }

    .btn-login-aesthetic:hover {
        background: linear-gradient(135deg, #e11d48, #9f1239);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(225, 29, 72, 0.3);
    }

    /* Pesan Error */
    .badge {
        display: block;
        margin-top: 6px;
        padding: 8px 12px;
        border-radius: 10px;
        text-align: left;
        background: #ffe4e6 !important;
        color: #9f1239 !important;
        font-weight: 600;
    }

    /* Animasi */
    @keyframes muncul {
        from {
            opacity: 0;
            transform: translate(-50%, -45%);
        }
        to {
            opacity: 1;
            transform: translate(-50%, -50%);
        }
    }
</style>

@endsection