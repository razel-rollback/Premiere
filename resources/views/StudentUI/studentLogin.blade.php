@extends('layouts.home')

@section('head')
<style>
    body {
        margin: 0;
        padding: 0;
        min-height: 100vh;
        background: linear-gradient(rgba(34, 34, 34, 0.85),
                rgba(34, 34, 34, 0.85)),
            url('/images/school-building.png') center/cover no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Segoe UI', Arial, sans-serif;
    }

    .login-container {
        background: rgba(26, 26, 26, 0.96);
        padding: 40px 32px 32px 32px;
        border-radius: 18px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.18);
        width: 100%;
        max-width: 370px;
        text-align: center;
        border: 1.5px solid #D4AF37;
        animation: fadeSlideUp 0.6s ease-out;
    }

    .login-logo {
        margin-bottom: 24px;
    }

    .login-logo img {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        border: 2px solid #D4AF37;
        object-fit: cover;
        box-shadow: 0 2px 8px rgba(212, 175, 55, 0.10);
    }

    .login-title {
        color: #D4AF37;
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 24px;
        letter-spacing: 1px;
    }

    .form-group {
        margin-bottom: 20px;
        text-align: left;
    }

    .form-group label {
        display: block;
        color: #f7df75;
        margin-bottom: 8px;
        font-size: 0.95rem;
    }

    .form-group input {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid #444;
        border-radius: 8px;
        background: rgba(40, 40, 40, 0.8);
        color: #fff;
        font-size: 1rem;
        outline: none;
        transition: all 0.3s ease;
    }

    .form-group input:focus {
        border-color: #D4AF37;
        box-shadow: 0 0 0 2px rgba(212, 175, 55, 0.3);
    }

    .login-btn {
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
        margin-top: 15px;
    }

    .login-btn:hover {
        background: #e8c352;
        transform: translateY(-2px);
    }

    .forgot-password {
        display: block;
        margin-top: 20px;
        color: #f7df75;
        text-decoration: none;
        font-size: 0.9rem;
        transition: color 0.2s;
    }

    .forgot-password:hover {
        color: #ffffff;
        text-decoration: underline;
    }

    .error-message {
        color: #ff6b6b;
        margin: 15px 0;
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
<div class="login-container">
    <div class="login-logo">
        <img src="{{ asset('images/Premire.png') }}" alt="School Logo">
    </div>
    <h1 class="login-title">STUDENT PORTAL</h1>

    @if(session('error'))
    <div class="error-message">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('student.login') }}">
        @csrf
        <div class="form-group">
            <label for="student-id">STUDENT ID</label>
            <input type="text" id="student-id" name="student_id" placeholder="Enter your student ID" required autofocus>
        </div>

        <div class="form-group">
            <label for="password">PASSWORD</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>

        <button type="submit" class="login-btn">LOGIN</button>

        <a href="#" class="forgot-password">Forgot Password?</a>
    </form>
</div>
@endsection