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
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus ad ipsam itaque ea iure at voluptates
                corporis exercitationem voluptas? Culpa cumque voluptatum in nulla inventore. Ex fugit provident exercitationem
                distinctio minima dolorum consequatur iste, praesentium incidunt facere unde illo
                sapiente delectus nam quas assumenda non quam eaque quod laborum obcaecati?
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore reprehenderit eaque perspiciatis cum u
                llam similique dolorum. Obcaecati nisi nulla dolorum alias nesciunt consequuntur officiis ut autem, sint
                blanditiis dicta quam quis facere repudiandae corrupti similique. Laborum doloremque tenetur reprehenderit saepe similique harum! Voluptatem ratione eveniet voluptas eum, magnam ut, quia odio corporis iste iusto harum est excepturi? Quo quam, maiores consequatur perspiciatis tempore, autem facilis veniam aliquid tenetur et recusandae temporibus error deserunt doloribus nesciunt ducimus aliquam. Pariatur mollitia odio velit ab asperiores animi sed quia facere, nisi, fugit totam cupiditate aut libero id ullam quae! Quibusdam debitis itaque porro.
            </p>
        </div>
    </div>
</div>



@endsection