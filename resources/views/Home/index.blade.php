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
        <div class="navbar"
            style="
        background-color: rgba(26, 26, 26, 0.8);
        color: #D4AF37;
        padding: 20px 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        backdrop-filter: blur(6px);
        z-index: 1000;
        display: flex; 
        align-items: 
        center; 
        justify-content: 
        space-between; 
        padding: 10px 20px; 
        position: fixed;
                top: 0;
                left: 0;
                right: 0;">

            <div class="logo" style="align-items: center;">
                <img src="{{ asset('images/Premire.png') }}"
                    alt="Logo" class="img-fluid rounded-circle"
                    width="50" style="height: 50px; border-radius: 50%; object-fit: cover;">
                <span>PREMIERE</span>
            </div>
            <nav>
                <a href="#">About</a>
                <a href="#">Programs</a>
                <a href="#">Contact Us</a>
            </nav>
        </div>
    </header>

    <div style="margin-top: 0px;">

        <div class="hero">
            <div class="hero-image">
                <img src="{{ asset('images/students.png') }}" alt="Students"
                    style="
                        position: absolute;
                        top: 125px;
                        right: 790px;
                        width: 710px;
                        max-height: 670px;
                        left: -9px;
                        z-index: 2;">
            </div>

            <div class="hero-content"
                style="
                    position: relative;
                    z-index: 2;
                    text-align: center;">
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
                <a href="{{ route('route.register') }}" style="text-decoration: none;">
                    <button style="cursor: pointer;">Register!</button>
                </a>
                <br>
                <button title="Log-in as Admin.">Log-in</button>
            </div>
        </div>

        <div class="footer-block">
            <div class="left"
                style="
                    background-color: #1A1A1A;
                    color: #D4AF37;
                    justify-content: center;
                    align-items: center;
                    display: flex;">
                <h3>Priemere Schedule</h3>
            </div>
            <div class="right"
                style="
                    background-color: #2E2E2E;
                    color: #f7df75;
                    justify-content: center;
                    align-items: center;
                    display: flex;">
                <h3>Summer Class going on...</h3>
            </div>
        </div>

    </div>

</body>

</html>