@extends('layouts.app')

@section('title', 'Schedules')

@section('head')
<style>
    /* Reuse the root variables from parent */
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

    /* Page header styles */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .page-title {
        font-size: 1.75rem;
        font-weight: 600;
        color: var(--dark);
        margin: 0;
    }

    /* Button styles */
    .btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        border-radius: var(--border-radius);
        border: none;
        cursor: pointer;
        transition: var(--transition);
        font-weight: 500;
    }

    .btn-sm {
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
    }

    .btn-primary {
        background-color: var(--primary);
        color: white;
    }

    .btn-primary:hover {
        background-color: var(--secondary);
        color: white;
        transform: translateY(-2px);
    }

    .btn-warning {
        background-color: var(--warning);
        color: white;
    }

    .btn-warning:hover {
        background-color: #e07e0c;
        color: white;
    }

    .btn-danger {
        background-color: var(--danger);
        color: white;
    }

    .btn-danger:hover {
        background-color: #e0115f;
        color: white;
    }

    /* Table styles */
    .table {
        width: 100%;
        background: white;
        border-radius: var(--border-radius);
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        border-collapse: collapse;
        padding: 1rem;
    }

    .table th {
        background-color: var(--primary);
        color: white;
        font-weight: 500;
        padding: 1rem;
        text-align: left;
    }

    .table td {
        vertical-align: middle;
        padding: 1rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.02);
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.03);
    }

    /* Badge styles */
    .badge-pill {
        background-color: var(--primary-light);
        color: var(--primary);
        padding: 0.25rem 0.75rem;
        border-radius: 50rem;
        font-weight: 600;
        font-size: 0.8rem;
    }

    .badge-level {
        background-color: #e2f3fb;
        color: #0d6efd;
        padding: 0.25rem 0.75rem;
        border-radius: 50rem;
        font-size: 0.8rem;
    }

    .alert {
        padding: 1rem;
        border-radius: var(--border-radius);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
    }

    /* Action buttons */
    .action-buttons {
        display: flex;
        gap: 0.5rem;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .action-buttons {
            flex-direction: column;
            width: 100%;
        }

        .btn {
            width: 100%;
            justify-content: center;
        }

        .table td,
        .table th {
            padding: 0.75rem;
        }
    }
</style>@endsection

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <h1 class="page-title">Schedule</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStrandModal">
            + Add Schedule
        </button>
    </div>
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @include('Schedule.create')

    <table class="table table-striped table-hover table-bordered mt-4 align-middle" id="linktable">
        <thead class="table-dark">
            <tr>
                <th>Section Name</th>
                <th>Subject</th>
                <th>Teacher</th>
                <th>Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $schedule)
            <tr>
                <td>{{ $schedule->sectionName }}</td>
                <td>{{ $schedule->subjectName }}</td>
                <td>{{ $schedule->teacherName }}</td>
                <td>{{ $schedule->time }}</td>
                <td>
                    <!-- Edit Button -->
                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editScheduleModal{{ $schedule->scheduleID }}">
                        <i class="bi bi-pencil"></i>Edit
                    </button>
                    @include('Schedule.edit')



                    <form action="{{ route('schedules.destroy', $schedule->scheduleID) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </form>

                </td>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection