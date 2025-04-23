@extends('layouts.head')
@section('title', 'About Us')

@section('head')

@include('Home.css')

@endsection



@section('content')

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
            <a href="{{ route('home.about') }}">About</a>
            <a href="#">Programs</a>
            <a href="#">Contact Us</a>
        </nav>
    </div>
</header>


<div style="margin-top: 0px;">

    <div class="hero">

        <div class="hero-text">
            <h1>About Us</h1>
            <p>Welcome to Premiere Senior High School, where excellence meets opportunity. Our school is dedicated to
                providing a nurturing environment that fosters academic growth and personal development.</p>
            <p> Established in 2024, Premiere Senior High School was founded with a strong vision to make quality education accessible to all.
                What started as a humble academic institution with only 60 students and a handful of passionate educators has now evolved into one of the most recognized senior high schools in the region.
            </p>
            <p> Premiere SHS offers a comprehensive and dynamic curriculum designed to prepare students for higher education and future careers.
                Our institution is committed to academic excellence, character development, and holistic growth.
                With experienced faculty, modern facilities, and a supportive learning environment, students are empowered to reach their full potential and become future leaders.
            </p>
        </div>
    </div>
</div>



@endsection