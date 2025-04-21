<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premiere SHS</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- AOS for scroll animations -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>


    @include('Dashboard.css')
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
                <a href="#about">About</a>
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
                        top: 145px;
                        right: 790px;
                        width: 710px;
                        max-height: 670px;
                        left: -9px;
                        z-index: 2;">
            </div>

            <div class="hero-content"
                style="
                    position: relative;
                    z-index: 2;">
                <h2>Welcome to Premiere SHS!</h2>
                <h1>Top Grade School Nationwide!</h1>
                <div style="
                    background-color: rgba(0, 0, 0, 0.4);
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2), 0 6px 12px rgba(0, 0, 0, 0.2);
                    margin-top: 20px;
                    color: #fff;">
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
                </div>
                <button>Register!</button>
            </div>
        </div>
        <!-- About Section -->
        <section id="about">

            <!-- Overlay to blur the background -->
            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.6); backdrop-filter: blur(4px); z-index: 1;"></div>

            <!-- Content -->
            <div data-aos="fade-up" style="position: relative; z-index: 2; max-width: 900px; margin: auto; text-align: center;">
                <h2 style="font-size: 36px; color: #f7df75; margin-bottom: 20px;">About Premiere SHS</h2>
                <p style="font-size: 16px; line-height: 1.8;">
                    Established in 2014, Premiere Senior High School was founded with a strong vision to make quality education accessible to all.
                    What started as a humble academic institution with only 60 students and a handful of passionate educators has now evolved into one of the most recognized senior high schools in the region.
                </p>
                <p style="font-size: 16px; line-height: 1.8; margin-top: 20px;">
                    Driven by our core values—integrity, excellence, and inclusivity—Premiere SHS continues to foster a safe, nurturing environment where students grow not only academically but also socially and morally.
                    Our community is composed of dedicated faculty, enthusiastic learners, and a support system that prepares our youth to be the leaders of tomorrow.
                </p>
                <p style="font-size: 16px; line-height: 1.8; margin-top: 20px;">
                    With continuous campus improvements, expanded program offerings, and a growing list of achievements, Premiere SHS remains steadfast in its mission to empower future generations through education.
                </p>
            </div>
        </section>


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

    <script>
        AOS.init();
    </script>

</body>

</html>