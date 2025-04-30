@extends('layouts.home')

@section('head')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
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
        </div>
    </div>

    <div class="footer-block">
        <div class="left">
            <h3>Premiere Schedule</h3>
        </div>
        <div class="right">
            <h3>Summer Class going on...</h3>
        </div>
    </div>

    <div class="footer-block">
        <div class="left">© 2025 Premiere SHS. All Rights Reserved.</div>
    </div>
</div>
@endsection