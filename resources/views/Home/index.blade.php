<!DOCTYPE html>
<html lang="en">
@include('Home.css')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premiere SHS</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
    <!-- Mao ni ang naa sa itaas, ang navbar -->
    <header>
        <div class="navbar">

            <div class="logo">
                <img src="{{ asset('images/Premire.png') }}"
                    alt="Logo" class="img-fluid rounded-circle"
                    width="50">
                <span>PREMIERE</span>
            </div>
            <nav>
                <a href="{{ route('home.about') }}">About</a>
                <a href="{{ route('home.about') }}">Programs</a>
                <a href="{{ route('home.about') }}">Contact Us</a>
            </nav>
        </div>
    </header>

    <div style="margin-top: 0px;">

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
                <a title="Register as Student" href="{{ route('route.register') }}" style="text-decoration: none;">
                    <button style="cursor: pointer;">Register!</button>
                </a>
                <br>
            </div>
        </div>

        <div class="admin">
            <button>Admin Log-in</button>
        </div>

        <div class="footer-block">
            <div class="left">
                <h3>Priemere Schedule</h3>
            </div>
            <div class="right">
                <h3>Summer Class going on...</h3>
            </div>
        </div>

    </div>

</body>

</html>