<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premiere SHS</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('head')
    <style>
        /* general */

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

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
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

        .footer-block {
            display: flex;
            height: 100px;

        }

        .footer-block .left {
            background-color: #1A1A1A;
            color: #D4AF37;
            justify-content: center;
            align-items: center;
            display: flex;
        }

        .footer-block .right {
            background-color: #2E2E2E;
            color: #f7df75;
            justify-content: center;
            align-items: center;
            display: flex;
        }

        .footer-block>div {
            flex: 1;
        }


        /* Hero content */
        .hero {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-around;
            background: url('/images/school-building.png') no-repeat center center / cover;
            color: white;
            padding: 100px 40px;
            z-index: 1;
        }

        /* pic animation */
        .hero-image img {
            position: absolute;
            top: 128px;
            right: 790px;
            width: 600px;
            height: auto;
            max-height: 750px;
            z-index: 2;
            left: -9px;
            animation: fadeSlideUp 1s ease-out;
            animation-fill-mode: both;
            animation-delay: 0.1s;
            opacity: 0;
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

        .hero-content {
            max-width: 500px;
            position: relative;
            z-index: 2;
            text-align: center;
            color: #FFFFFF;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        .hero-content h2 {
            color: #f7df75;
            margin-bottom: 10px;
            max-height: 400px;
            animation: fadeSlideUp 1s ease-out;
            animation-fill-mode: both;
            animation-delay: 0.1s;
        }

        .hero-content h1 {
            font-size: 32px;
            margin-bottom: 15px;
            max-height: 400px;
            animation: fadeSlideUp 1s ease-out;
            animation-fill-mode: both;
            animation-delay: 0.1s;
        }

        .hero-content p {
            font-size: 15px;
            line-height: 1.6;
        }

        .hero-content button {
            width: 100%;
            max-width: 150px;
            height: 40px;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #f7df75;
            border: none;
            cursor: pointer;
            font-size: 100%;
            font-weight: bold;
            border-radius: 5px;
        }

        .hero-content p,
        .hero-content button {
            animation: fadeSlideUp 1s ease-out;
            animation-fill-mode: both;
            animation-delay: 0.1s;
            opacity: 0;
        }

        .hero-content button {
            animation-delay: 0.1s;
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


        #about {
            position: relative;
            background: url('../images/school-building.png') center center / cover no-repeat;
            padding: 160px 20px 100px;
            color: white;
            overflow: hidden;
        }

        /*register blade*/
        .register-body {
            margin: 0;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* Full viewport height */
            overflow: hidden;
        }

        .register-body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('../images/school-building.png') center center / cover no-repeat;
            filter: blur(6px);
            /* Apply blur only to the background */
            z-index: 0;
            /* Ensure it stays behind the content */
        }

        .register-body .card {
            position: relative;
            z-index: 1;
            /* Ensure the card is above the blurred background */
            background: rgba(255, 255, 255, 0.9);
            /* Add slight transparency for better contrast */
            border-radius: 20px;
            animation: fadeSlideUp 1s ease-out;
            animation-fill-mode: both;
            animation-delay: 0.1s;
        }

        .register-body input {
            border-radius: 20px;
        }

        .register-body .ddown {
            border-radius: 20px;
        }
    </style>

</head>

<body>
    <header>
        <div class="navbar">

            <div class="logo">
                <img src="{{ asset('images/Premire.png') }}"
                    alt="Logo" class="img-fluid rounded-circle"
                    width="50">
                <span>PREMIERE</span>
            </div>
            <nav>
                <a href="{{ route('home.index') }}">Home</a>
                <a href="{{ route('student.login') }}">Student Log in</a>
                <a href="{{ route('home.about') }}">About</a>
                <a href="{{ route('home.program') }}">Programs</a>
                <a href="{{ route('home.contact') }}">Contact Us</a>
                <a href="{{ route('admin.login1') }}">Admin</a>

            </nav>
        </div>
    </header>

    @yield('content')
</body>

</html>