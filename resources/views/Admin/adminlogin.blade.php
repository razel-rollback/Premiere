@extends('layouts.head')
@section('title', 'Admin Login')

@section('head')
<style>
    .navbar .logo {
        align-items: center;
    }

    .navbar .logo img {
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }

    header .logo {
        display: flex;
        align-items: center;
    }

    header .logo img {
        height: 40px;
        margin-right: 10px;
    }

    header nav a {
        color: white;
        text-decoration: none;
        margin: 0 15px;
        font-weight: bold;
    }


    body .navbar {
        background-color: rgba(26, 26, 26, 0.8);
        color: #D4AF37;
        padding: 20px 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        backdrop-filter: blur(6px);
        z-index: 10000;
        display: flex;
        align-items:
            center;
        justify-content:
            space-between;
        padding: 10px 20px;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease;
    }

    body {
        margin: 0;
        padding: 0;
        min-height: 100vh;
        background: linear-gradient(rgba(34, 34, 34, 0.85),
            rgba(34, 34, 34, 0.85)),
        url('{{ asset("images/school-building.png") }}') center/cover no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Segoe UI', Arial, sans-serif;
    }

    .admin-login-container {
        background: rgba(26, 26, 26, 0.96);
        padding: 40px 32px;
        border-radius: 18px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        width: 100%;
        max-width: 400px;
        text-align: center;
        border: 1.5px solid #D4AF37;
        animation: fadeSlideUp 0.6s ease-out;
    }

    .admin-logo {
        margin-bottom: 24px;
    }

    .admin-logo img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        border: 2px solid #D4AF37;
        object-fit: cover;
        box-shadow: 0 4px 12px rgba(212, 175, 55, 0.2);
    }

    .admin-login-title {
        color: #D4AF37;
        font-size: 2rem;
        font-weight: 600;
        margin-bottom: 24px;
        letter-spacing: 1px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .admin-login-form input[type="text"],
    .admin-login-form input[type="password"] {
        width: 100%;
        padding: 14px 16px;
        margin-bottom: 18px;
        border: 1px solid #444;
        border-radius: 8px;
        background: rgba(40, 40, 40, 0.8);
        color: #fff;
        font-size: 1rem;
        outline: none;
        transition: all 0.3s ease;
    }

    .admin-login-form input[type="text"]:focus,
    .admin-login-form input[type="password"]:focus {
        border-color: #D4AF37;
        box-shadow: 0 0 0 2px rgba(212, 175, 55, 0.3);
    }

    .admin-login-form button {
        width: 100%;
        padding: 14px;
        background: #D4AF37;
        color: #1a1a1a;
        font-weight: 600;
        border: none;
        border-radius: 8px;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 10px;
    }

    .admin-login-form button:hover {
        background: #e8c352;
        transform: translateY(-2px);
    }

    .admin-login-form .error {
        color: #ff6b6b;
        margin-bottom: 16px;
        font-size: 0.95rem;
        padding: 8px;
        background: rgba(255, 107, 107, 0.1);
        border-radius: 6px;
    }

    @keyframes fadeSlideUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endsection

@section('content')
<header>
    <div class="navbar">

        <div class="logo">
            <img src="{{ asset('images/Premire.png') }}"
                alt="Logo" class="img-fluid rounded-circle"
                width="50">
            <span>PREMIERE</span>
        </div>
        <nav>
            <a href="{{route('home.index')}}"> Home</a>
        </nav>
    </div>
</header>
<div class="admin-login-container">
    <div class="admin-logo">
        <img src="{{ asset('images/Premire.png') }}" alt="School Logo">
    </div>
    <h1 class="admin-login-title">ADMIN PORTAL</h1>
    <form class="admin-login-form" method="POST" action="{{ route('admin.login') }}">
        @csrf
        @if(session('error'))
        <div class="error">{{ session('error') }}</div>
        @endif
        <input type="text" name="username" placeholder="Username" required autofocus>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">LOGIN</button>
    </form>
</div>
@endsection