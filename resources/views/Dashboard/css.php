<style>
    body {
        margin: 0;
        font-family: 'Segoe UI', sans-serif;
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
    }

    .hero-content h2 {
        color: #f7df75;
        margin-bottom: 10px;
    }

    .hero-content h1 {
        font-size: 32px;
        margin-bottom: 15px;
    }

    .hero-content p {
        font-size: 15px;
        line-height: 1.6;
    }

    .hero-content button {
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #f7df75;
        border: none;
        cursor: pointer;
        font-weight: bold;
        border-radius: 5px;
    }


    .hero-image img {
        max-height: 400px;
    }

    .footer-block {
        display: flex;
        height: 100px;
    }

    .footer-block>div {
        flex: 1;
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

    .hero-content p,
    .hero-content button {
        animation: fadeSlideUp 1s ease-out;
        animation-fill-mode: both;
        animation-delay: 0.5s;
        opacity: 0;
    }

    .hero-content button {
        animation-delay: 1s;
    }
</style>