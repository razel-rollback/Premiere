@extends('layouts.home')

@section('head')
<style>
    body {
        margin: 0;
        padding: 0;
        min-height: 100vh;
        background: linear-gradient(rgba(34, 34, 34, 0.6), rgba(34, 34, 34, 0.6)),
            url('/images/school-building.png') center/cover no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Segoe UI', Arial, sans-serif;
    }

    .contact-container {
        background: rgba(26, 26, 26, 0.90);
        padding: 40px;
        border-radius: 18px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        width: 100%;
        max-width: 500px;
        color: white;
        text-align: center;
    }

    .contact-title {
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

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid #444;
        border-radius: 8px;
        background: rgba(40, 40, 40, 0.8);
        color: #fff;
        font-size: 1rem;
        outline: none;
        resize: none;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #D4AF37;
        box-shadow: 0 0 0 2px rgba(212, 175, 55, 0.3);
    }

    .contact-btn {
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

    .contact-btn:hover {
        background: #e8c352;
    }
</style>
@endsection

@section('content')
<div class="contact-container">
    <h1 class="contact-title">Contact Us</h1>

    <form>
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" placeholder="Your full name">
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="Your email address">
        </div>

        <div class="form-group">
            <label for="message">Your Message</label>
            <textarea id="message" name="message" rows="5" placeholder="Write your message here..."></textarea>
        </div>

        <button type="submit" class="contact-btn">Send Message</button>
    </form>
</div>
@endsection