@extends('layouts.home')

@section('head')
<style>
    body {
        padding: 0;
        min-height: 100vh;
        background: linear-gradient(rgba(34, 34, 34, 0.6), rgba(34, 34, 34, 0.6)),
            url('/images/school-building.png') center/cover no-repeat;

        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Segoe UI', Arial, sans-serif;
    }

    .login-container {
        background: rgba(26, 26, 26, 0.90);
        padding: 40px;
        border-radius: 18px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        width: 100%;
        max-width: 400px;
        text-align: center;
    }

    .login-title {
        color: #D4AF37;
        font-size: 2rem;
        margin-bottom: 30px;
        font-weight: 600;
    }

    .form-group {
        margin-bottom: 20px;
        text-align: left;
    }

    .form-group label {
        display: block;
        color: #ffffff;
        margin-bottom: 8px;
        font-weight: 500;
    }

    .form-group input {
        width: 91%;
        padding: 12px 16px;
        border: 1px solid #444;
        border-radius: 8px;
        background: rgba(40, 40, 40, 0.8);
        color: #fff;
        font-size: 1rem;
        outline: none;
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
        margin-top: 10px;
        transition: all 0.3s ease;
    }

    .login-btn:hover {
        background: #e8c352;
    }

    .forgot-password {
        display: block;
        margin-top: 20px;
        color: #f7df75;
        text-decoration: none;
        font-size: 0.9rem;
    }

    .forgot-password:hover {
        text-decoration: underline;
    }
</style>
@endsection

@section('content')
<div class="login-container">
    <h1 class="login-title">Student Portal</h1>

    <form>
        <div class="form-group">
            <label for="student-id">Student ID</label>
            <input type="text" id="student-id" name="student_id" placeholder="Enter your student ID">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password">
        </div>

        <button type="submit" class="login-btn">Login</button>

        <a href="#" class="forgot-password">Forgot Password?</a>
    </form>
</div>
@endsection