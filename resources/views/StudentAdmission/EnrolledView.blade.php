@extends('layouts.app')

@section('title', 'Enrolled Students')

@section('head')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
    <div class="main-content">
        <div class="d-flex justify-content-center align-items-center mb-4">
            <h2 class="text-center">Enrolled Students</h2>
        </div>

        <div class="d-flex justify-content-evenly gap-3 mb-4">
            <div class="card text-white justify-content-center align-items-center" style="width: 300px; background: #FF914D;">
                <p>Grade 11 Total:</p>
                <h3>{{ $grade11Total }}</h3>
            </div>
            <div class="card text-white justify-content-center align-items-center" style="width: 300px; background: #FF3131;">
                <p>Grade 12 Total:</p>
                <h3>{{ $grade12Total }}</h3>
            </div>
        </div>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered align-middle">
                <thead class="table-dark">
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
                        <td>{{ $enrollment->student->gradeLevel->gradeLevelName }}</td>
                        <td>{{ $enrollment->student->strand->strandName ?? 'N/A' }}</td>
                        <td>{{ $enrollment->section->sectionName ?? 'N/A' }}</td>
                        <td>{{ $enrollment->AcademicYear }}</td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center gap-2">
                                <!-- View Button (Outside Form) -->
                                <button class="btn btn-primary btn-lg rounded-pill" data-bs-toggle="modal" data-bs-target="#viewModal{{ $enrollment->enrollmentID }}">
                                    <i class="bi bi-eye-fill"></i>
                                </button>

                                <!-- Unenroll Form (Only Submit Button Inside) -->
                                <form action="{{ route('student.unenroll', $enrollment) }}" method="POST" class="m-1" onsubmit="return confirm('Are you sure you want to unenroll this student?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-lg rounded-pill">
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
                                    <h5 class="modal-title" id="viewModalLabel{{ $enrollment->enrollmentID }}">Student Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Student Information -->
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <h5>Student Information</h5>
                                            <p><strong>Name:</strong> {{ $enrollment->student->firstName }} {{ $enrollment->student->lastName }}</p>
                                            <p><strong>Gender:</strong> {{ $enrollment->student->gender }}</p>
                                            <p><strong>Birthdate:</strong> {{ \Carbon\Carbon::parse($enrollment->student->birthDate)->format('F j, Y') }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Contact Information</h5>
                                            <p><strong>Email:</strong> {{ $enrollment->student->email }}</p>
                                            <p><strong>Phone:</strong> {{ $enrollment->student->contactNumber }}</p>
                                            <p><strong>Address:</strong> {{ $enrollment->student->address }}</p>
                                        </div>
                                    </div>

                                    <!-- Academic Information -->
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <h5>Academic Information</h5>
                                            <p><strong>Grade Level:</strong> {{ $enrollment->student->gradeLevel->gradeLevelName }}</p>
                                            <p><strong>Strand:</strong> {{ $enrollment->student->strand->strandName ?? 'N/A' }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Enrollment Details</h5>
                                            <p><strong>Section:</strong> {{ $enrollment->section->sectionName ?? 'N/A' }}</p>
                                            <p><strong>Academic Year:</strong> {{ $enrollment->AcademicYear }}</p>
                                            <p><strong>Date Enrolled:</strong> {{ \Carbon\Carbon::parse($enrollment->dateEnrolled)->format('F j, Y') }}</p>
                                        </div>
                                    </div>

                                    <!-- Guardian Information -->
                                    <div class="row">
                                        <div class="col-12">
                                            <h5>Guardian Information</h5>
                                            <p><strong>Name:</strong> {{ $enrollment->student->guardian->guardianFirstName }} {{ $enrollment->student->guardian->guardianLastName }}</p>
                                            <p><strong>Relationship:</strong> {{ $enrollment->student->guardian->guardianRelation }}</p>
                                            <p><strong>Contact:</strong> {{ $enrollment->student->guardian->guardianPhone }}</p>
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