@extends('layouts.home')

@section('head')
<style>
    :root {
        --primary-color: #D4AF37;
        --primary-light: #f7df75;
        --secondary-color: #1a1a1a;
        --dark-bg: rgba(26, 26, 26, 0.96);
        --darker-bg: rgba(20, 20, 20, 0.98);
        --light-text: #ffffff;
        --dark-text: #1a1a1a;
        --border-color: rgba(212, 175, 55, 0.3);
    }

    body {
        margin: 0;
        padding: 0;
        min-height: 100vh;
        background: linear-gradient(rgba(34, 34, 34, 0.9), rgba(34, 34, 34, 0.9)),
            url('/images/school-building.png') center/cover no-repeat fixed;
        font-family: 'Segoe UI', Arial, sans-serif;
        color: var(--light-text);
        display: flex;
    }

    /* Side Navigation */
    .side-nav {
        width: 280px;
        background-color: var(--darker-bg);
        border-right: 1px solid var(--border-color);
        padding: 30px 0;
        height: 100vh;
        position: sticky;
        top: 0;
        display: flex;
        flex-direction: column;
    }

    .nav-header {
        padding: 0 25px 25px;
        border-bottom: 1px solid var(--border-color);
        margin-bottom: 25px;
    }

    .nav-header img {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        border: 2px solid var(--primary-color);
        object-fit: cover;
        margin-bottom: 15px;
    }

    .student-name {
        font-size: 1.3rem;
        color: var(--primary-color);
        margin-bottom: 5px;
    }

    .student-details {
        font-size: 0.85rem;
        color: var(--primary-light);
    }

    .nav-menu {
        flex-grow: 1;
    }

    .nav-item {
        padding: 12px 25px;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .nav-item:hover,
    .nav-item.active {
        background-color: rgba(212, 175, 55, 0.1);
        border-left: 3px solid var(--primary-color);
    }

    .nav-item i {
        margin-right: 12px;
        color: var(--primary-light);
    }

    .logout-btn {
        margin: 20px 25px 0;
        padding: 12px;
        background-color: var(--primary-color);
        color: var(--dark-text);
        border: none;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        text-align: center;
        transition: all 0.3s ease;
    }

    .logout-btn:hover {
        background-color: var(--primary-light);
        transform: translateY(-2px);
    }

    /* Main Content */
    .main-content {
        flex-grow: 1;
        padding: 30px;
    }

    .welcome-banner {
        background-color: var(--dark-bg);
        border-radius: 10px;
        padding: 25px;
        margin-bottom: 30px;
        border: 1px solid var(--border-color);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .welcome-title {
        color: var(--primary-color);
        margin-top: 0;
        font-size: 1.8rem;
    }

    .dashboard {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 25px;
    }

    .card {
        background-color: var(--dark-bg);
        border-radius: 10px;
        padding: 25px;
        border: 1px solid var(--border-color);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid var(--border-color);
    }

    .card-title {
        color: var(--primary-color);
        margin: 0;
        font-size: 1.3rem;
    }

    .card-icon {
        color: var(--primary-light);
        font-size: 1.5rem;
    }

    .tuition-info {
        display: flex;
        justify-content: space-between;
        margin-bottom: 25px;
    }

    .tuition-box {
        text-align: center;
        padding: 15px;
        border-radius: 8px;
        background-color: rgba(40, 40, 40, 0.8);
        flex: 1;
        margin: 0 10px;
    }

    .tuition-box:first-child {
        margin-left: 0;
    }

    .tuition-box:last-child {
        margin-right: 0;
    }

    .tuition-label {
        font-size: 0.9rem;
        color: var(--primary-light);
        margin-bottom: 8px;
    }

    .tuition-amount {
        font-size: 1.4rem;
        font-weight: bold;
        color: var(--primary-color);
    }

    .payment-methods {
        display: flex;
        gap: 10px;
        margin: 20px 0;
    }

    .payment-method {
        flex: 1;
        padding: 12px;
        text-align: center;
        border-radius: 6px;
        background-color: rgba(40, 40, 40, 0.8);
        cursor: pointer;
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }

    .payment-method:hover {
        background-color: rgba(212, 175, 55, 0.1);
        border-color: var(--border-color);
    }

    .payment-method.active {
        background-color: var(--primary-color);
        color: var(--dark-text);
        font-weight: 600;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: var(--primary-light);
        font-size: 0.9rem;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        border-radius: 6px;
        border: 1px solid #444;
        background-color: rgba(40, 40, 40, 0.8);
        color: white;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 2px rgba(212, 175, 55, 0.3);
        outline: none;
    }

    .btn {
        padding: 12px 20px;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
        display: inline-block;
        text-align: center;
    }

    .btn-primary {
        background-color: var(--primary-color);
        color: var(--dark-text);
        width: 100%;
    }

    .btn-primary:hover {
        background-color: var(--primary-light);
        transform: translateY(-2px);
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }

    .table th {
        text-align: left;
        padding: 12px 15px;
        color: var(--primary-color);
        border-bottom: 1px solid var(--border-color);
        font-weight: 600;
    }

    .table td {
        padding: 12px 15px;
        border-bottom: 1px solid var(--border-color);
    }

    .section-info {
        background-color: rgba(212, 175, 55, 0.1);
        padding: 12px 15px;
        border-radius: 6px;
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
    }

    .section-label {
        color: var(--primary-light);
    }

    .section-value {
        color: var(--primary-color);
        font-weight: 600;
    }

    .no-schedule {
        text-align: center;
        padding: 30px;
        color: var(--primary-light);
    }

    /* Responsive */
    @media (max-width: 992px) {
        body {
            flex-direction: column;
        }

        .side-nav {
            width: 100%;
            height: auto;
            padding: 15px 0;
        }

        .nav-header {
            display: flex;
            align-items: center;
            padding: 0 15px 15px;
        }

        .nav-header img {
            margin-bottom: 0;
            margin-right: 15px;
            width: 50px;
            height: 50px;
        }

        .student-info {
            flex-grow: 1;
        }

        .nav-menu {
            display: none;
        }

        .main-content {
            padding: 20px;
        }
    }

    @media (max-width: 768px) {
        .dashboard {
            grid-template-columns: 1fr;
        }

        .tuition-info {
            flex-direction: column;
            gap: 15px;
        }

        .tuition-box {
            margin: 0 !important;
        }
    }
</style>
@endsection

@section('content')
<div class="side-nav">
    <div class="nav-header">
        <img src="{{ asset('images/student-avatar.jpg') }}" alt="Student Avatar">
        <div class="student-info">
            <div class="student-name">{{ $role->student->name }}</div>
            <div class="student-details">
                Grade {{ $role->student->grade_level }} • {{ $role->student->strand }}
            </div>
        </div>
    </div>

    <div class="nav-menu">
        <div class="nav-item active">
            <i class="fas fa-home"></i> Dashboard
        </div>
        <div class="nav-item">
            <i class="fas fa-calendar-alt"></i> Schedule
        </div>
        <div class="nav-item">
            <i class="fas fa-money-bill-wave"></i> Payments
        </div>
        <div class="nav-item">
            <i class="fas fa-book"></i> Subjects
        </div>
    </div>

    <form method="POST" action="{{ route('student.logout') }}">
        @csrf
        <button type="submit" class="logout-btn">
            <i class="fas fa-sign-out-alt"></i> Logout
        </button>
    </form>
</div>

<div class="main-content">
    <div class="welcome-banner">
        <h1 class="welcome-title">Welcome Back, {{ explode(' ', $role->student->name)[0] }}!</h1>
        <p>You have 1 upcoming payment due on October 15, 2023</p>
    </div>

    <div class="dashboard">
        <!-- Tuition Card -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Tuition Information</h2>
                <i class="fas fa-wallet card-icon"></i>
            </div>

            <div class="tuition-info">
                <div class="tuition-box">
                    <div class="tuition-label">Total Tuition</div>
                    <div class="tuition-amount">₱15,000.00</div>
                </div>
                <div class="tuition-box">
                    <div class="tuition-label">Current Due</div>
                    <div class="tuition-amount">₱3,750.00</div>
                </div>
            </div>

            <h3>Make Payment</h3>
            <div class="payment-methods">
                <div class="payment-method active">
                    <i class="fas fa-credit-card"></i> Credit Card
                </div>
                <div class="payment-method">
                    <i class="fas fa-mobile-alt"></i> GCash
                </div>
            </div>

            <div class="payment-form">
                <div class="form-group">
                    <label for="card-number">Card Number</label>
                    <input type="text" id="card-number" class="form-control" placeholder="1234 5678 9012 3456">
                </div>

                <div class="form-group">
                    <label for="card-holder">Card Holder Name</label>
                    <input type="text" id="card-holder" class="form-control" placeholder="John Doe">
                </div>

                <div class="row" style="display: flex; gap: 15px;">
                    <div class="form-group" style="flex: 1;">
                        <label for="expiry-date">Expiry Date</label>
                        <input type="text" id="expiry-date" class="form-control" placeholder="MM/YY">
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv" class="form-control" placeholder="123">
                    </div>
                </div>

                <button class="btn btn-primary">
                    <i class="fas fa-lock"></i> Pay ₱3,750.00
                </button>
            </div>
        </div>

        <!-- Schedule Card -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Class Schedule</h2>
                <i class="fas fa-calendar card-icon"></i>
            </div>

            @if(isset($schedule) && count($schedule) > 0)
            <div class="section-info">
                <span class="section-label">Class Section:</span>
                <span class="section-value">{{ $role->student->section }}</span>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Subject</th>
                        <th>Room</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schedule as $class)
                    <tr>
                        <td>{{ $class->day }}</td>
                        <td>{{ date('g:i A', strtotime($class->start_time)) }} - {{ date('g:i A', strtotime($class->end_time)) }}</td>
                        <td>{{ $class->subject }}</td>
                        <td>{{ $class->room }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="no-schedule">
                <i class="fas fa-calendar-times" style="font-size: 2rem; margin-bottom: 15px;"></i>
                <p>No schedule available</p>
                <p>You may not be enrolled yet</p>
            </div>
            @endif
        </div>

        <!-- Tuition Breakdown Card -->
        <div class="card" style="grid-column: span 2;">
            <div class="card-header">
                <h2 class="card-title">Tuition Breakdown</h2>
                <i class="fas fa-file-invoice-dollar card-icon"></i>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Period</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Due Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1st Quarter</td>
                        <td>Tuition Fee</td>
                        <td>₱3,750.00</td>
                        <td>Oct 15, 2023</td>
                        <td><span style="color: #ffc107;">Pending</span></td>
                    </tr>
                    <tr>
                        <td>2nd Quarter</td>
                        <td>Tuition Fee</td>
                        <td>₱3,750.00</td>
                        <td>Dec 15, 2023</td>
                        <td><span style="color: #6c757d;">Unpaid</span></td>
                    </tr>
                    <tr>
                        <td>3rd Quarter</td>
                        <td>Tuition Fee</td>
                        <td>₱3,750.00</td>
                        <td>Feb 15, 2024</td>
                        <td><span style="color: #6c757d;">Unpaid</span></td>
                    </tr>
                    <tr>
                        <td>4th Quarter</td>
                        <td>Tuition Fee</td>
                        <td>₱3,750.00</td>
                        <td>Apr 15, 2024</td>
                        <td><span style="color: #6c757d;">Unpaid</span></td>
                    </tr>
                    <tr style="background-color: rgba(212, 175, 55, 0.1); font-weight: bold;">
                        <td colspan="2">Total</td>
                        <td>₱15,000.00</td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection