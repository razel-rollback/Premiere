@extends('layouts.home')

@section('title', 'Academic Strands')

@section('head')
<style>
    /* Using the exact same styling as About Us page */
    #academic-strands {
        position: relative;
        background: url('/images/school-building.png') center center / cover no-repeat;
        padding: 160px 20px 100px;
        color: white;
        overflow: hidden;
    }

    #academic-strands::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        z-index: 1;
    }

    .strands-content {
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

    .strands-content h1 {
        color: #f7df75;
        font-size: 2.5rem;
        margin-bottom: 25px;
        text-align: center;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .strands-content h2 {
        color: #f7df75;
        font-size: 1.8rem;
        margin: 30px 0 15px;
        border-bottom: 2px solid #f7df75;
        padding-bottom: 8px;
    }

    .strands-content p {
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

    .strand-notice {
        background: rgba(247, 223, 117, 0.15);
        border: 1px solid rgba(247, 223, 117, 0.3);
        border-radius: 8px;
        padding: 20px;
        margin-top: 40px;
        text-align: center;
    }

    .strand-notice h3 {
        color: #f7df75;
        margin-bottom: 10px;
    }

    .strand-notice p {
        font-weight: 500;
        margin-bottom: 0;
    }

    .subject-item {
        background: rgba(26, 26, 26, 0.8);
        border-left: 4px solid #f7df75;
        padding: 15px;
        margin: 15px 0;
        border-radius: 0 8px 8px 0;
    }

    .subject-item strong {
        color: #f7df75;
        display: block;
        margin-bottom: 5px;
    }

    .subject-item span {
        color: #FFFFFF;
        font-size: 0.95rem;
    }

    @keyframes fadeSlideUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endsection

@section('content')

<!-- Academic Strands Section -->
<section id="academic-strands">
    <div class="strands-content">
        <h1>Academic Strands at Premiere SHS</h1>
        <h2>College Preparatory Programs</h2>

        <p>Premiere Senior High School offers comprehensive academic tracks designed to prepare students for higher education and successful careers. Our curriculum follows DepEd Order No. 21, s. 2019 and the latest K-12 curriculum guidelines.</p>

        <div class="highlight-box">
            <h2>STEM Strand</h2>
            <p>Science, Technology, Engineering, and Mathematics</p>
            <ul>
                <li>Pre-Calculus and Basic Calculus</li>
                <li>General Physics 1 & 2 with modern lab facilities</li>
                <li>General Chemistry 1 & 2 with hands-on experiments</li>
                <li>Research/Capstone Project requirement</li>
            </ul>

            <div class="subject-item">
                <strong>Career Pathways:</strong>
                <span>Engineering, Medicine, Pure Sciences, Architecture, Computer Science</span>
            </div>
        </div>

        <div class="highlight-box">
            <h2>ABM Strand</h2>
            <p>Accountancy, Business, and Management</p>
            <ul>
                <li>Fundamentals of ABM 1 & 2</li>
                <li>Business Mathematics and Finance</li>
                <li>Principles of Marketing and Entrepreneurship</li>
                <li>Work Immersion with industry partners</li>
            </ul>

            <div class="subject-item">
                <strong>Career Pathways:</strong>
                <span>Accountancy, Business Management, Economics, Banking & Finance</span>
            </div>
        </div>

        <div class="highlight-box">
            <h2>HUMSS Strand</h2>
            <p>Humanities and Social Sciences</p>
            <ul>
                <li>Philippine Politics and Governance</li>
                <li>Introduction to World Religions and Belief Systems</li>
                <li>Disciplines and Ideas in Social Sciences</li>
                <li>Creative Writing and Community Engagement</li>
            </ul>

            <div class="subject-item">
                <strong>Career Pathways:</strong>
                <span>Law, Education, Psychology, Communication Arts, Political Science</span>
            </div>
        </div>

        <div class="highlight-box">
            <h2>GAS Strand</h2>
            <p>General Academic Strand</p>
            <ul>
                <li>Humanities 1 & 2</li>
                <li>Social Science 1 & 2</li>
                <li>Electives from other academic strands</li>
                <li>Flexible subject selection</li>
            </ul>

            <div class="subject-item">
                <strong>Career Pathways:</strong>
                <span>Flexible college programs, Liberal Arts, Multidisciplinary courses</span>
            </div>
        </div>

        <h2>Core Subjects</h2>
        <p>All strands include these DepEd-mandated core subjects:</p>

        <div class="subject-item">
            <strong>Oral Communication</strong>
            <span>Core Subject for Grade 11</span>
        </div>
        <div class="subject-item">
            <strong>Komunikasyon at Pananaliksik</strong>
            <span>Core Subject for Grade 11</span>
        </div>
        <div class="subject-item">
            <strong>21st Century Literature</strong>
            <span>Core Subject for Grade 12</span>
        </div>
        <div class="subject-item">
            <strong>Contemporary Philippine Arts</strong>
            <span>Core Subject for Grade 12</span>
        </div>

        <div class="strand-notice">
            <h3>Enrollment Now Open</h3>
            <p>Limited slots available for all academic strands. Apply today!</p>
        </div>
    </div>
</section>

<!-- Footer -->
<div class="footer-block">
    <div class="left">© 2025 Premiere SHS. All Rights Reserved.</div>
</div>

@endsection