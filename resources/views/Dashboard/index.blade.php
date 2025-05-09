@extends('layouts.app')
@section('title', 'Dashboard')

@section('head')
<style>
    :root {
        --sidebar-width: 280px;
        --sidebar-bg: #1a2035;
        --sidebar-active: #2d3748;
        --sidebar-hover: #2a3347;
        --primary: #4361ee;
        --primary-light: #ebf1ff;
        --secondary: #3f37c9;
        --accent: #4895ef;
        --success: #4cc9f0;
        --danger: #f72585;
        --warning: #f8961e;
        --info: #3a0ca3;
        --light: #f8f9fa;
        --dark: #212529;
        --border-radius: 0.5rem;
        --transition: all 0.3s ease;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        background-color: #f5f7fb;
        color: #4a5568;
        margin: 0;
        padding: 0;
        min-height: 100vh;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .page-title {
        font-size: 1.75rem;
        font-weight: 600;
        color: #2d3748;
        margin: 0;
    }

    .last-updated {
        color: #718096;
        font-size: 0.875rem;
    }

    .summary-card {
        border: none;
        border-radius: var(--border-radius);
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        transition: var(--transition);
        height: 100%;
    }

    .summary-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    .summary-card .card-body {
        padding: 1.5rem;
        position: relative;
        z-index: 1;
    }

    .summary-card .card-icon {
        position: absolute;
        top: 1rem;
        right: 1rem;
        font-size: 2.5rem;
        opacity: 0.2;
        z-index: 0;
    }

    .summary-card .card-title {
        font-size: 0.875rem;
        font-weight: 500;
        margin-bottom: 0.5rem;
        color: rgba(255, 255, 255, 0.9);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .summary-card .card-value {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0;
        color: white;
    }

    .summary-card.bg-primary {
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
    }

    .summary-card.bg-success {
        background: linear-gradient(135deg, var(--success) 0%, var(--accent) 100%);
    }

    .summary-card.bg-info {
        background: linear-gradient(135deg, var(--info) 0%, #7209b7 100%);
    }

    .section-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #2d3748;
        margin: 2rem 0 1rem;
        position: relative;
        padding-left: 1rem;
    }

    .section-title::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 4px;
        background: var(--primary);
        border-radius: 4px;
    }

    .strand-card {
        border: none;
        border-radius: var(--border-radius);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        transition: var(--transition);
        background: white;
        height: 100%;
    }

    .strand-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    .strand-card .card-body {
        padding: 1.5rem;
        text-align: center;
    }

    .strand-card .card-title {
        font-size: 0.875rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #4a5568;
    }

    .strand-card .card-value {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 0;
    }

    .chart-container {
        background: white;
        border-radius: var(--border-radius);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        padding: 1.5rem;
        margin-top: 2rem;
    }

    .chart-container .card-title {
        font-size: 1.25rem;
        margin-bottom: 1.5rem;
        color: #2d3748;
    }

    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .last-updated {
            margin-top: 0.5rem;
        }

        .summary-card .card-value,
        .strand-card .card-value {
            font-size: 1.5rem;
        }
    }
</style>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <h1 class="page-title">School Dashboard</h1>
        <div id="realTime" class="RealTime"></div>
    </div>

    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card summary-card bg-primary">
                <div class="card-body">
                    <i class="bi bi-people card-icon"></i>
                    <h5 class="card-title">Total Students</h5>
                    <p class="card-value">{{ $totalStudents }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card summary-card bg-success">
                <div class="card-body">
                    <i class="bi bi-person-badge card-icon"></i>
                    <h5 class="card-title">Total Teachers</h5>
                    <p class="card-value">{{ $totalTeachers }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card summary-card bg-info">
                <div class="card-body">
                    <i class="bi bi-collection card-icon"></i>
                    <h5 class="card-title">Total Sections</h5>
                    <p class="card-value">{{ $totalSections }}</p>
                </div>
            </div>
        </div>
    </div>

    <h4 class="section-title">Students by Strand</h4>
    <div class="row">
        @foreach($strandCounts as $strand => $count)
        <div class="col-md-3 mb-3">
            <div class="card strand-card">
                <div class="card-body">
                    <h5 class="card-title">{{ $strand }}</h5>
                    <p class="card-value">{{ $count }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    function updateTime() {
        const now = new Date();
        const hours = now.getHours();
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const ampm = hours >= 12 ? 'PM' : 'AM';
        const displayHours = ((hours + 11) % 12 + 1);

        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        const month = months[now.getMonth()];
        const day = now.getDate();
        const year = now.getFullYear();

        const timeString = `${month} ${day}, ${year} ${displayHours}:${minutes} ${ampm}`;
        document.getElementById('realTime').textContent = timeString;
    }

    // Update time immediately and then every second
    updateTime();
    setInterval(updateTime, 1000);
</script>
@endsection