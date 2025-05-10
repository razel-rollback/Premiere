@extends('layouts.app')

@section('title', 'Student Admission')

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
        margin-bottom: 2rem;
        text-align: center;
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
    }

    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }

    .stat-card.grade11 {
        background: linear-gradient(135deg, #FF914D 0%, #FF6B35 100%);
        color: white;
    }

    .stat-card.grade12 {
        background: linear-gradient(135deg, #FF3131 0%, #D00000 100%);
        color: white;
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

    .alert-note {
        border-left: 4px solid var(--primary);
        background-color: var(--primary-light);
    }

    .applicants-table {
        background: white;
        border-radius: var(--border-radius);
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    .applicants-table th {
        background-color: var(--primary);
        color: white;
        font-weight: 500;
        padding: 1rem;
    }

    .applicants-table td {
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

    .btn-accept {
        background-color: #28a745;
        color: white;
    }

    .btn-reject {
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
    }

    .document-card {
        margin-bottom: 1rem;
        border-radius: var(--border-radius);
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .document-card-header {
        background-color: #f8f9fa;
        padding: 0.75rem 1rem;
        font-weight: 500;
    }

    .document-card-body {
        padding: 1rem;
        text-align: center;
    }

    .document-img {
        max-height: 500px;
        width: auto;
        border-radius: 4px;
        border: 1px solid #eee;
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
        <h1 class="page-title">Student Admission</h1>
    </div>

    <div class="stats-container">
        <div class="stat-card grade11">
            <p class="stat-label">Grade 11 Applicants</p>
            <h3 class="stat-value">{{ $grade11PendingTotal }}</h3>
        </div>
        <div class="stat-card grade12">
            <p class="stat-label">Grade 12 Applicants</p>
            <h3 class="stat-value">{{ $grade12PendingTotal }}</h3>
        </div>
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

    <div class="alert alert-note alert-dismissible fade show">
        <i class="bi bi-info-circle-fill me-2"></i>
        <strong>Note:</strong> Please review student details carefully before accepting or rejecting applications.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="applicants-table">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Grade Level</th>
                    <th>Strand</th>
                    <th>Academic Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registers as $register)
                <tr>
                    <td>{{ $register->registerID }}</td>
                    <td>{{ $register->student->firstName }} {{ $register->student->lastName }}</td>
                    <td>{{ $register->student->gradeLevel->gradeLevelName }}</td>
                    <td>{{ $register->student->strand->strandName }}</td>
                    <td>2025-2026</td>
                    <td>
                        <div class="action-buttons">
                            <button type="button" class="btn-view btn-rounded" data-bs-toggle="modal" data-bs-target="#viewModal{{ $register->registerID }}">
                                <i class="bi bi-eye-fill"></i>
                            </button>
                            <form action="{{ route('route.student.admission.accept', $register) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-accept btn-rounded" title="Accept">
                                    <i class="bi bi-check-lg"></i>
                                </button>
                            </form>
                            <form action="{{ route('route.student.admission.reject', $register) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-reject btn-rounded" title="Reject">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>

                <!-- Student Details Modal -->
                <div class="modal fade" id="viewModal{{ $register->registerID }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $register->registerID }}" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewModalLabel{{ $register->registerID }}">
                                    <i class="bi bi-person-badge me-2"></i>
                                    Student Details
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Student Information -->
                                <div class="modal-section">
                                    <h6 class="modal-section-title">
                                        <i class="bi bi-person-circle me-2"></i>
                                        Student Information
                                    </h6>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>Full Name:</strong> {{ $register->student->firstName }} {{ $register->student->middleName ?? '' }} {{ $register->student->lastName }} {{ $register->student->suffixName ?? '' }}</p>
                                            <p><strong>Gender:</strong> {{ $register->student->gender }}</p>
                                            <p><strong>Birthdate:</strong> {{ \Carbon\Carbon::parse($register->student->birthDate)->format('F j, Y') }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>Contact:</strong> {{ $register->student->contactNumber }}</p>
                                            <p><strong>Email:</strong> {{ $register->student->email }}</p>
                                            <p><strong>Address:</strong> {{ $register->student->address }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Guardian Information -->
                                <div class="modal-section">
                                    <h6 class="modal-section-title">
                                        <i class="bi bi-shield-check me-2"></i>
                                        Guardian Information
                                    </h6>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>Full Name:</strong> {{ $register->student->guardian->guardianFirstName }} {{ $register->student->guardian->guardianMiddleName ?? '' }} {{ $register->student->guardian->guardianLastName }} {{ $register->student->guardian->guardianSuffixName ?? '' }}</p>
                                            <p><strong>Relationship:</strong> {{ $register->student->guardian->guardianRelation }}</p>
                                            <p><strong>Birthdate:</strong> {{ \Carbon\Carbon::parse($register->student->guardian->guardianBirthDate)->format('F j, Y') }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>Contact:</strong> {{ $register->student->guardian->guardianPhone }}</p>
                                            <p><strong>Email:</strong> {{ $register->student->guardian->email }}</p>
                                            <p><strong>Address:</strong> {{ $register->student->guardian->guardianAddress }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Academic Information -->
                                <div class="modal-section">
                                    <h6 class="modal-section-title">
                                        <i class="bi bi-book me-2"></i>
                                        Academic Information
                                    </h6>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>Strand:</strong> {{ $register->student->strand->strandName }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>Grade Level:</strong> {{ $register->student->gradeLevel->gradeLevelName }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Documents -->
                                <div class="modal-section">
                                    <h6 class="modal-section-title">
                                        <i class="bi bi-file-earmark-text me-2"></i>
                                        Uploaded Documents
                                    </h6>
                                    <div class="row">
                                        @foreach($register->student->documents as $document)
                                        <div class="col-md-6 mb-3">
                                            <div class="document-card">
                                                <div class="document-card-header">
                                                    {{ $document->documentType }}
                                                </div>
                                                <div class="document-card-body">
                                                    <img src="{{ asset('storage/' . $document->documentPath) }}"
                                                        alt="{{ $document->documentType }}"
                                                        class="document-img img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
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
@endsection