@extends('layouts.app')

@section('head')
<style>
    :root {
        --primary-color: #4361ee;
        --secondary-color: #3f37c9;
        --accent-color: #4895ef;
        --success-color: #4cc9f0;
        --light-bg: #f8f9fa;
        --dark-text: #2b2d42;
        --light-text: #f8f9fa;
        --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    body {
        background-color: var(--light-bg);
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        color: var(--dark-text);
        line-height: 1.6;
    }

    .container {
        padding: 2rem;
        max-width: 1400px;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-weight: 600;
        color: var(--dark-text);
    }

    .dashboard-header {
        margin-bottom: 2.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .dashboard-header h1 {
        font-size: 2rem;
        margin: 0;
    }

    .summary-card {
        border-radius: 12px;
        border: none;
        box-shadow: var(--card-shadow);
        transition: var(--transition);
        overflow: hidden;
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

    .summary-card .card-body::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 100%);
        z-index: -1;
    }

    .summary-card .card-title {
        font-size: 1rem;
        font-weight: 500;
        margin-bottom: 0.5rem;
        color: rgba(255, 255, 255, 0.9);
    }

    .summary-card .card-text {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0;
        color: white;
    }

    .summary-card.bg-primary {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    }

    .summary-card.bg-success {
        background: linear-gradient(135deg, #4cc9f0 0%, #4895ef 100%);
    }

    .summary-card.bg-info {
        background: linear-gradient(135deg, #3a0ca3 0%, #7209b7 100%);
    }

    .strand-card {
        border-radius: 12px;
        border: none;
        box-shadow: var(--card-shadow);
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
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: var(--dark-text);
    }

    .strand-card .card-text {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 0;
    }

    .chart-container {
        background: white;
        border-radius: 12px;
        box-shadow: var(--card-shadow);
        padding: 1.5rem;
        margin-top: 2rem;
    }

    .chart-container .card-title {
        font-size: 1.25rem;
        margin-bottom: 1.5rem;
        color: var(--dark-text);
    }

    @media (max-width: 768px) {
        .container {
            padding: 1rem;
        }

        .dashboard-header {
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 1.5rem;
        }

        .dashboard-header h1 {
            margin-bottom: 1rem;
        }

        .summary-card .card-text,
        .strand-card .card-text {
            font-size: 1.5rem;
        }
    }
</style>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

@section('content')
<div class="container">
    <div class="dashboard-header">
        <h1>School Dashboard</h1>
        <div class="text-muted">Last updated: {{ now()->format('M j, Y g:i A') }}</div>
    </div>

    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card summary-card bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Students</h5>
                    <p class="card-text">{{ $totalStudents }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card summary-card bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Teachers</h5>
                    <p class="card-text">{{ $totalTeachers }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card summary-card bg-info">
                <div class="card-body">
                    <h5 class="card-title">Total Sections</h5>
                    <p class="card-text">{{ $totalSections }}</p>
                </div>
            </div>
        </div>
    </div>

    <h4 class="mb-3">Students by Strand</h4>
    <div class="row">
        @foreach($strandCounts as $strand => $count)
        <div class="col-md-3 mb-3">
            <div class="card strand-card">
                <div class="card-body">
                    <h5 class="card-title">{{ $strand }}</h5>
                    <p class="card-text">{{ $count }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- <div class="chart-container">
        <h5 class="card-title">Strand Distribution</h5>
        <canvas id="strandChart" height="120"></canvas>
    </div> -->
</div>
<!-- 
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('strandChart').getContext('2d');

        const labels = {
            !!json_encode(array_keys($strandCounts)) !!
        };
        const data = {
            !!json_encode(array_values($strandCounts)) !!
        };

        const strandChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Number of Students',
                    data: data,
                    backgroundColor: [
                        'rgba(67, 97, 238, 0.8)',
                        'rgba(76, 201, 240, 0.8)',
                        'rgba(72, 149, 239, 0.8)',
                        'rgba(63, 55, 201, 0.8)'
                    ],
                    borderColor: [
                        'rgba(67, 97, 238, 1)',
                        'rgba(76, 201, 240, 1)',
                        'rgba(72, 149, 239, 1)',
                        'rgba(63, 55, 201, 1)'
                    ],
                    borderWidth: 1,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: true,
                            drawBorder: false
                        },
                        ticks: {
                            stepSize: 10
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    });
</script> -->
@endsection