@extends('layouts.head')
@section('title', 'About Us')

@section('head')
@include('Home.css')
<style>
    /* Consistent About Page Styling */
    #about {
        position: relative;
        background: url('/images/school-building.png') center center / cover no-repeat;
        padding: 160px 20px 100px;
        color: white;
        overflow: hidden;
    }

    #about::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        z-index: 1;
    }

    .about-content {
        position: relative;
        z-index: 2;
        max-width: 900px;
        margin: 0 auto;
        padding: 30px;
        background: rgba(26, 26, 26, 0.7);
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        animation: fadeSlideUp 1s ease-out;
        animation-fill-mode: both;
    }

    .about-content h1 {
        color: #f7df75;
        font-size: 2.5rem;
        margin-bottom: 25px;
        text-align: center;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .about-content h2 {
        color: #f7df75;
        font-size: 1.8rem;
        margin: 30px 0 15px;
        border-bottom: 2px solid #f7df75;
        padding-bottom: 8px;
    }

    .about-content p {
        color: #FFFFFF;
        font-size: 1.1rem;
        line-height: 1.8;
        margin-bottom: 20px;
    }

    .highlight-box {
        background: rgba(26, 26, 26, 0.8);
        border-left: 4px solid #f7df75;
        padding: 20px;
        margin: 30px 0;
        border-radius: 0 8px 8px 0;
    }

    .highlight-box ul {
        list-style-type: none;
        padding-left: 0;
    }

    .highlight-box li {
        color: #FFFFFF;
        margin-bottom: 10px;
        padding-left: 25px;
        position: relative;
        line-height: 1.6;
    }

    .highlight-box li:before {
        content: "•";
        color: #f7df75;
        font-size: 1.5rem;
        position: absolute;
        left: 5px;
        top: -3px;
    }

    .schedule-notice {
        background: rgba(247, 223, 117, 0.15);
        border: 1px solid rgba(247, 223, 117, 0.3);
        border-radius: 8px;
        padding: 20px;
        margin-top: 40px;
        text-align: center;
    }

    .schedule-notice h3 {
        color: #f7df75;
        margin-bottom: 10px;
    }

    .schedule-notice p {
        font-weight: 500;
        margin-bottom: 0;
    }
</style>
@endsection

@section('content')

<!-- Navbar (consistent with home page) -->
<header>
    <div class="navbar">
        <div class="logo">
            <img src="{{ asset('images/Premire.png') }}" alt="Logo">
            <span>PREMIERE</span>
        </div>
        <nav>
            <a href="{{ route('home.index') }}">Home</a>
            <a href="{{ route('home.about') }}">About</a>
            <a href="#">Programs</a>
            <a href="#">Contact Us</a>
        </nav>
    </div>
</header>

<!-- About Section -->
<section id="about">
    <div class="about-content">
        <h1>Welcome to Premiere SHS!</h1>
        <h2>Top Grade School Nationwide</h2>

        <p>Premiere Senior High School offers a comprehensive and dynamic educational program designed to prepare students for higher education and successful careers. Our institution stands as a beacon of academic excellence with specialized programs tailored to student needs.</p>

        <div class="highlight-box">
            <h2>Our Distinguished Programs</h2>
            <ul>
                <li>Academic Excellence Track with 98% college admission rate</li>
                <li>Technical-Vocational programs with industry partnerships</li>
                <li>Specialized Arts & Sports development programs</li>
                <li>Advanced STEM curriculum with modern laboratories</li>
            </ul>
        </div>

        <h2>Our History</h2>
        <p>Since 2020, Premiere SHS has provided rigorous academic guidance and comprehensive student support services. Our school has grown to become a cornerstone of the community, known for its commitment to educational excellence and student development.</p>

        <p>Today, Premiere SHS serves as the premier choice for quality secondary education in the region, with state-of-the-art facilities and a dedicated faculty committed to nurturing future leaders.</p>

        <div class="schedule-notice">
            <h3>Premiere Schedule</h3>
            <p>Summer Classes now in session! Enrollment open for all programs.</p>
        </div>
    </div>
</section>

<!-- Footer (consistent with home page) -->
<div class="footer-block">
    <div class="left">© 2025 Premiere SHS. All Rights Reserved.</div>
</div>

@endsection