@extends('layouts.app')

@section('title', 'Users')

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

/* WRAPPER */
.member-wrapper{
    margin-top:40px;
    max-width: 1000px;
    margin-bottom: 60px;
}

/* HEADER */
.member-header{
    background: linear-gradient(135deg, #f43f5e, #be123c);
    color:white;
    padding:40px;
    border-radius:28px;
    margin-bottom:30px;
    box-shadow: 0 20px 40px rgba(225, 29, 72, 0.15);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
}

.member-header h1{
    font-family: 'Playfair Display', serif;
    font-size:36px;
    font-weight:700;
    letter-spacing: 0.5px;
    margin-bottom: 5px;
}

.member-header p{
    color: #fce7f3;
    font-size: 0.95rem;
    margin-bottom: 0;
}

/* ADD BUTTON */
.add-member{
    background: #ffffff;
    color: #be123c;
    border: none;
    padding: 12px 26px;
    border-radius: 30px;
    font-weight: 700;
    transition: .3s;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    text-decoration: none;
    display: inline-block;
}

.add-member:hover{
    background: #fff1f2;
    color: #9f1239;
    transform:translateY(-3px);
}

/* SEARCH */
.search-member{
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(12px);
    padding: 12px 20px;
    border-radius: 20px;
    margin-bottom: 25px;
    box-shadow: 0 10px 30px rgba(225, 29, 72, 0.05);
}

.search-member input{
    border: none;
    padding: 10px;
    background: transparent;
}

.search-member input:focus {
    background: transparent;
    box-shadow: none;
}

.search-member .btn-dark {
    background: #be123c;
    border: none;
    border-radius: 12px;
    font-weight: 600;
    padding: 0 25px;
    transition: 0.3s;
}

.search-member .btn-dark:hover {
    background: #9f1239;
}

/* LIST ITEM CONTAINER (BARIS KE BAWAH) */
.member-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

/* CARD USER HORIZONTAL */
.member-row-card{
    background: rgba(255, 255, 255, 0.92);
    backdrop-filter: blur(12px);
    border-radius: 20px;
    padding: 20px 25px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: relative;
    overflow: hidden;
    transition: .3s;
    box-shadow: 0 8px 25px rgba(225, 29, 72, 0.05);
    border: 1px solid rgba(254, 205, 211, 0.4);
    flex-wrap: wrap;
    gap: 15px;
}

.member-row-card:hover{
    transform: translateY(-4px);
    box-shadow: 0 12px 30px rgba(225, 29, 72, 0.1);
    border-color: rgba(244, 63, 94, 0.3);
}

/* INFO BAGIAN KIRI (Avatar + Detail) */
.member-info-group {
    display: flex;
    align-items: center;
    gap: 20px;
}

/* AVATAR */
.avatar{
    width: 55px;
    height: 55px;
    border-radius: 50%;
    background: linear-gradient(135deg, #f43f5e, #fda4af);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 22px;
    font-weight: 700;
    font-family: 'Playfair Display', serif;
    box-shadow: 0 4px 12px rgba(244, 63, 94, 0.25);
    flex-shrink: 0;
}

/* TEXT DETAILS */
.member-details {
    display: flex;
    flex-direction: column;
}

.member-name{
    font-family: 'Playfair Display', serif;
    font-size: 19px;
    font-weight: 700;
    color: #4a3540;
    margin-bottom: 2px;
}

.member-email{
    color: #885d6e;
    font-size: 13.5px;
}

/* ROLE BADGE */
.member-role{
    background: #fff1f2;
    color: #be123c;
    padding: 6px 15px;
    border-radius: 20px;
    font-size: 12.5px;
    font-weight: 700;
    border: 1px solid #fecdd3;
    white-space: nowrap;
}

/* ACTION BUTTONS */
.action-area{
    display: flex;
    gap: 8px;
    align-items: center;
}

.btn-edit{
    background: #ffe4e6;
    color: #9f1239;
    border: none;
    border-radius: 12px;
    padding: 8px 16px;
    font-weight: 700;
    font-size: 13px;
    transition: 0.3s;
    text-decoration: none;
}

.btn-delete{
    background: #f43f5e;
    color: white;
    border: none;
    border-radius: 12px;
    padding: 8px 16px;
    font-weight: 700;
    font-size: 13px;
    transition: 0.3s;
}

.btn-edit:hover{
    background: #fecdd3;
    color: #881337;
}

.btn-delete:hover{
    background: #e11d48;
}

@media (max-width: 768px) {
    .member-row-card {
        flex-direction: column;
        align-items: flex-start;
    }
    .action-area {
        width: 100%;
        justify-content: flex-end;
    }
}
</style>

<div class="container member-wrapper">

    <!-- Header -->
    <div class="member-header">
        <div>
            <h1>
                <i class="fa-solid fa-shoe-prints me-2"></i> Sneaker Team
            </h1>
            <p>Manajemen anggota dan akses pengguna toko sepatu</p>
        </div>
        <div>
            <a href="{{ route('admin.users.create') }}" class="btn add-member">
                + Tambah Member
            </a>
        </div>
    </div>

    <!-- Form Pencarian -->
    <form action="{{ route('admin.users') }}" method="GET" class="search-member">
        <div class="input-group">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari member berdasarkan nama atau email...">
            <button class="btn btn-dark">
                🔍 Cari
            </button>
        </div>
    </form>

    <!-- Daftar List Member (Berjajar ke Bawah) -->
    <div class="member-list">
        @foreach ($users as $user)
            <div class="member-row-card">
                <!-- Kiri: Avatar & Info -->
                <div class="member-info-group">
                    <div class="avatar">
                        {{ strtoupper(substr($user->name,0,1)) }}
                    </div>
                    <div class="member-details">
                        <div class="member-name">{{ $user->name }}</div>
                        <div class="member-email">{{ $user->email }}</div>
                    </div>
                </div>

                <!-- Tengah: Role -->
                <div>
                    <span class="member-role">
                        ⭐ {{ $user->role->name }}
                    </span>
                </div>

                <!-- Kanan: Tombol Aksi -->
                <div class="action-area">
                    <a href="{{ route('admin.users.edit',$user) }}" class="btn btn-edit">
                        ✏ Edit
                    </a>

                    <form action="{{ route('admin.users.destroy',$user) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-delete" onclick="return confirm('Yakin hapus user ini?')">
                            🗑 Hapus
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

</div>

@endsection