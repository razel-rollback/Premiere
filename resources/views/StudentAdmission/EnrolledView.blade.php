@extends('layouts.app')

@section('title', 'Enrolled Students')

@section('head')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<style>
    :root {
        --primary: #4361ee;
        --primary-light: #ebf1ff;
        --secondary: #3f37c9;
        --success: #4cc9f0;
        --danger: #f72585;
        --warning: #f8961e;
        --info: #3a0ca3;
        --light: #f8f9fa;
        --dark: #212529;
        --border-radius: 0.5rem;
        --transition: all 0.3s ease;
    }

    .page-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .page-title {
        font-size: 1.75rem;
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 1rem;
    }

    .stats-container {
        display: flex;
        justify-content: center;
        gap: 1.5rem;
        margin-bottom: 2rem;
        flex-wrap: wrap;
    }

    .stat-card {
        width: 280px;
        border-radius: var(--border-radius);
        padding: 1.5rem;
        text-align: center;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        transition: var(--transition);
        color: white;
    }

    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }

    .stat-card.grade11 {
        background: linear-gradient(135deg, #FF914D 0%, #FF6B35 100%);
    }

    .stat-card.grade12 {
        background: linear-gradient(135deg, #FF3131 0%, #D00000 100%);
    }

    .stat-card .stat-label {
        font-size: 1rem;
        margin-bottom: 0.5rem;
    }

    .stat-card .stat-value {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0;
    }

    .students-table {
        background: white;
        border-radius: var(--border-radius);
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        padding: 1rem;
    }

    .students-table th {
        background-color: var(--primary);
        color: white;
        font-weight: 500;
        padding: 1rem;
    }

    .students-table td {
        vertical-align: middle;
        padding: 1rem;
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
        justify-content: center;
    }

    .btn-view {
        background-color: var(--primary);
        color: white;
    }

    .btn-unenroll {
        background-color: var(--danger);
        color: white;
    }

    .btn-rounded {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        transition: var(--transition);
    }

    .btn-rounded:hover {
        transform: scale(1.1);
    }

    .modal-section {
        margin-bottom: 1.5rem;
    }

    .modal-section-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--primary);
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 1px solid #eee;
        display: flex;
        align-items: center;
    }

    .modal-section-title i {
        margin-right: 0.5rem;
    }

    .badge-section {
        background-color: #f8f9fa;
        padding: 0.25rem 0.5rem;
        border-radius: 0.25rem;
        font-size: 0.8rem;
        color: #6c757d;
    }

    @media (max-width: 768px) {
        .stats-container {
            flex-direction: column;
            align-items: center;
        }

        .action-buttons {
            flex-direction: column;
            align-items: center;
        }

        .btn-rounded {
            margin-bottom: 0.5rem;
        }
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <h1 class="page-title">Enrolled Students</h1>
    </div>

    <div class="stats-container">
        <div class="stat-card grade11">
            <p class="stat-label">Grade 11 Students</p>
            <h3 class="stat-value">{{ $grade11Total }}</h3>
        </div>
        <div class="stat-card grade12">
            <p class="stat-label">Grade 12 Students</p>
            <h3 class="stat-value">{{ $grade12Total }}</h3>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="students-table">
        <div class="table-responsive">

            <table class="table table-hover align-middle" id="linktable">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Grade Level</th>
                        <th>Strand</th>
                        <th>Section</th>
                        <th>Academic Year</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($enrollments as $enrollment)
                    <tr>
                        <td>{{ $enrollment->student->studentID }}</td>
                        <td>{{ $enrollment->student->lastName }}, {{ $enrollment->student->firstName }}</td>
                        <td>
                            <span class="badge-section">
                                {{ $enrollment->student->gradeLevel->gradeLevelName }}
                            </span>
                        </td>
                        <td>{{ $enrollment->student->strand->strandName ?? 'N/A' }}</td>
                        <td>{{ $enrollment->section->sectionName ?? 'N/A' }}</td>
                        <td>{{ $enrollment->AcademicYear }}</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-view btn-rounded" data-bs-toggle="modal" data-bs-target="#viewModal{{ $enrollment->enrollmentID }}" title="View Details">
                                    <i class="bi bi-eye-fill"></i>
                                </button>

                                <form action="{{ route('student.unenroll', $enrollment) }}" method="POST" onsubmit="return confirm('Are you sure you want to unenroll this student?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-unenroll btn-rounded" title="Unenroll">
                                        <i class="bi bi-person-dash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <!-- Student Details Modal -->
                    <div class="modal fade" id="viewModal{{ $enrollment->enrollmentID }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $enrollment->enrollmentID }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="viewModalLabel{{ $enrollment->enrollmentID }}">
                                        <i class="bi bi-person-badge me-2"></i>
                                        Student Details
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Student Information -->
                                    <div class="modal-section">
                                        <h6 class="modal-section-title">
                                            <i class="bi bi-person-circle"></i>
                                            Student Information
                                        </h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><strong>Name:</strong> {{ $enrollment->student->firstName }} {{ $enrollment->student->lastName }}</p>
                                                <p><strong>Gender:</strong> {{ $enrollment->student->gender }}</p>
                                                <p><strong>Birthdate:</strong> {{ \Carbon\Carbon::parse($enrollment->student->birthDate)->format('F j, Y') }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Email:</strong> {{ $enrollment->student->email }}</p>
                                                <p><strong>Phone:</strong> {{ $enrollment->student->contactNumber }}</p>
                                                <p><strong>Address:</strong> {{ $enrollment->student->address }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Academic Information -->
                                    <div class="modal-section">
                                        <h6 class="modal-section-title">
                                            <i class="bi bi-book"></i>
                                            Academic Information
                                        </h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><strong>Grade Level:</strong> {{ $enrollment->student->gradeLevel->gradeLevelName }}</p>
                                                <p><strong>Strand:</strong> {{ $enrollment->student->strand->strandName ?? 'N/A' }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Section:</strong> {{ $enrollment->section->sectionName ?? 'N/A' }}</p>
                                                <p><strong>Academic Year:</strong> {{ $enrollment->AcademicYear }}</p>
                                                <p><strong>Date Enrolled:</strong> {{ \Carbon\Carbon::parse($enrollment->dateEnrolled)->format('F j, Y') }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Guardian Information -->
                                    <div class="modal-section">
                                        <h6 class="modal-section-title">
                                            <i class="bi bi-shield-check"></i>
                                            Guardian Information
                                        </h6>
                                        <div class="row">
                                            <div class="col-12">
                                                <p><strong>Name:</strong> {{ $enrollment->student->guardian->guardianFirstName }} {{ $enrollment->student->guardian->guardianLastName }}</p>
                                                <p><strong>Relationship:</strong> {{ $enrollment->student->guardian->guardianRelation }}</p>
                                                <p><strong>Contact:</strong> {{ $enrollment->student->guardian->guardianPhone }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Any additional JavaScript can go here
</script>
@endsection