@extends('layouts.app')

@section('title', 'Dashboard')

@section('head')

@endsection

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premiere SHS</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        header {
            background-color: #3e5e2e;
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        .hero {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-around;
            background: url('{{ asset("images/school-building.jpg") }}') no-repeat center center/cover;
            color: white;
            padding: 100px 40px;
        }

        .hero::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }

        .hero-content,
        .hero-image {
            position: relative;
            z-index: 2;
        }

        .hero-content {
            max-width: 500px;
        }

        .hero-content h2 {
            color: #f7df75;
            margin-bottom: 10px;
        }

        .hero-content h1 {
            font-size: 32px;
            margin-bottom: 15px;
        }

        .hero-content p {
            font-size: 15px;
            line-height: 1.6;
        }

        .hero-content button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #f7df75;
            border: none;
            cursor: pointer;
            font-weight: bold;
            border-radius: 5px;
        }

        .hero-image img {
            max-height: 400px;
        }

        .footer-block {
            display: flex;
            height: 100px;
        }

        .footer-block>div {
            flex: 1;
        }

        .footer-block .left {
            background-color: #c3cc4e;
        }

        .footer-block .right {
            background-color: #cfdc67;
        }

        @keyframes fadeSlideUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-content p,
        .hero-content button {
            animation: fadeSlideUp 1s ease-out;
            animation-fill-mode: both;
            animation-delay: 0.5s;
            opacity: 0;
        }

        .hero-content button {
            animation-delay: 1s;
        }
    </style>
</head>

<body>

    <header>
        <div class="logo">
            <img src="{{ asset('images/book-icon.png') }}" alt="Logo">
            <span>PREMIERE</span>
        </div>
        <nav>
            <a href="#">About</a>
            <a href="#">Programs</a>
            <a href="#">Contact Us</a>
        </nav>
    </header>

    <div class="hero">
        <div class="hero-image">
            <img src="{{ asset('images/students.png') }}" alt="Students">
        </div>
        <div class="hero-content">
            <h2>Welcome to Premiere SHS!</h2>
            <h1>Top Grade School Nationwide!</h1>
            <p>
                Premiere SHS offers a comprehensive and dynamic curriculum designed to prepare students for higher education and future careers.
                Our institution is committed to academic excellence, character development, and holistic growth.
                With experienced faculty, modern facilities, and a supportive learning environment, students are empowered to reach their full potential and become future leaders.
            </p>
            <p>
                Join us in shaping the future of education and nurturing the leaders of tomorrow.
                Premiere SHS is not just a school; it's a community dedicated to excellence and innovation.
                Enroll now and be part of our journey towards success!
            </p>
            <button>Register!</button>
        </div>
    </div>

    <div class="footer-block">
        <div class="left"></div>
        <div class="right"></div>
    </div>

</body>

</html>

@endsection