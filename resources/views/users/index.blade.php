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
    max-width: 1280px;
}

/* HEADER */
.member-header{
    background: linear-gradient(135deg, #f43f5e, #be123c);
    color:white;
    padding:45px;
    border-radius:30px;
    margin-bottom:35px;
    box-shadow: 0 20px 40px rgba(225, 29, 72, 0.15);
}

.member-header h1{
    font-family: 'Playfair Display', serif;
    font-size:42px;
    font-weight:700;
    letter-spacing: 0.5px;
}

.member-header p{
    color: #fce7f3;
    font-size: 1.05rem;
}

/* ADD BUTTON */
.add-member{
    background: #ffffff;
    color: #be123c;
    border: none;
    padding: 12px 28px;
    border-radius: 30px;
    font-weight: 700;
    transition: .3s;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
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
    padding: 15px;
    border-radius: 20px;
    margin-bottom:35px;
    box-shadow: 0 10px 30px rgba(225, 29, 72, 0.05);
}

.search-member input{
    border: none;
    padding: 15px;
    background: transparent;
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

/* CARD USER */
.member-card{
    background: rgba(255, 255, 255, 0.92);
    backdrop-filter: blur(12px);
    border-radius:24px;
    padding:30px;
    height:100%;
    position:relative;
    overflow:hidden;
    transition:.4s;
    box-shadow: 0 12px 30px rgba(225, 29, 72, 0.06);
    border: 1px solid rgba(254, 205, 211, 0.4);
}

.member-card::before{
    content:"";
    position:absolute;
    width:120px;
    height:120px;
    background:#f43f5e;
    border-radius:50%;
    top:-50px;
    right:-50px;
    opacity:.12;
}

.member-card:hover{
    transform:translateY(-8px);
    box-shadow: 0 20px 40px rgba(225, 29, 72, 0.12);
}

/* AVATAR */
.avatar{
    width:80px;
    height:80px;
    border-radius:50%;
    background: linear-gradient(135deg, #f43f5e, #fda4af);
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    font-size:32px;
    font-weight:700;
    font-family: 'Playfair Display', serif;
    box-shadow: 0 8px 20px rgba(244, 63, 94, 0.25);
}

/* NAME */
.member-name{
    font-family: 'Playfair Display', serif;
    font-size:23px;
    font-weight:700;
    margin-top:20px;
    color:#4a3540;
}

.member-email{
    color:#885d6e;
    font-size:14px;
}

/* ROLE */
.member-role{
    display:inline-block;
    margin-top:15px;
    background:#fff1f2;
    color:#be123c;
    padding:8px 18px;
    border-radius:30px;
    font-size:13px;
    font-weight:700;
    border: 1px solid #fecdd3;
}

/* ACTION */
.action-area{
    margin-top:25px;
    display: flex;
    gap: 8px;
}

.btn-edit{
    background:#ffe4e6;
    color:#9f1239;
    border:none;
    border-radius:20px;
    padding:9px 20px;
    font-weight:700;
    transition: 0.3s;
}

.btn-delete{
    background:#f43f5e;
    color:white;
    border:none;
    border-radius:20px;
    padding:9px 20px;
    font-weight:700;
    transition: 0.3s;
}

.btn-edit:hover{
    background: #fecdd3;
    color: #881337;
    transform:scale(1.03);
}

.btn-delete:hover{
    background:#e11d48;
    transform:scale(1.03);
}
</style>

<div class="container member-wrapper">

<div class="member-header">
<h1>
<i class="fa-solid fa-shoe-prints me-2"></i> Sneaker Team
</h1>

<p>
Manajemen anggota dan akses pengguna toko sepatu
</p>

<a href="{{ route('admin.users.create') }}"
class="btn add-member mt-2">
+ Tambah Member
</a>
</div>


<form action="{{ route('admin.users') }}"
method="GET"
class="search-member">

<div class="input-group">

<input
type="text"
name="search"
value="{{ request('search') }}"
class="form-control"
placeholder="Cari member...">

<button class="btn btn-dark">
🔍 Cari
</button>

</div>

</form>


<div class="row">

@foreach ($users as $user)

<div class="col-md-4 mb-4">

<div class="member-card">

<div class="avatar">
{{ strtoupper(substr($user->name,0,1)) }}
</div>

<div class="member-name">
{{ $user->name }}
</div>

<div class="member-email">
{{ $user->email }}
</div>

<div>
<span class="member-role">
⭐ {{ $user->role->name }}
</span>
</div>


<div class="action-area">

<a href="{{ route('admin.users.edit',$user) }}"
class="btn btn-edit">
✏ Edit
</a>


<form action="{{ route('admin.users.destroy',$user) }}"
method="POST"
class="d-inline">

@csrf
@method('DELETE')

<button class="btn btn-delete"
onclick="return confirm('Yakin hapus user ini?')">
🗑 Hapus
</button>

</form>

</div>

</div>

</div>

@endforeach

</div>

</div>

@endsection