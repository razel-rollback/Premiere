@extends('layouts.app')

@section('title', 'Student Admission')

@section('head')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

{{--<style>
    body {
        background-color: #FFFBDA;
    }

    .sidebar {
        background-color: #EEE7AD;
        height: 100vh;
        padding: 20px;
        width: 250px;
        position: fixed;
    }

    .sidebar a {
        display: block;
        padding: 10px;
        text-decoration: none;
        color: black;
    }

    .sidebar a:hover {
        background-color: #FFFBDA;
        border-radius: 5px;
    }

    .main-content {
        margin-left: 270px;
        padding: 20px;
    }

    .card {
        text-align: center;
        font-size: 24px;
        padding: 10px;
    }

    .table-container {
        background: white;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .table th {
        background-color: #FF914D;
        color: black;
    }

    .table td {
        vertical-align: middle;
    }

    .checkmark {
        color: green;
        font-weight: bold;
    }

    .cross {
        color: red;
        font-weight: bold;
    }
</style>--}}
@endsection

@section('content')
<div class="container-fluid">
    <h1>Welcome</h1>

    <div class="main-content">

        <div class="d-flex justify-content-center align-items-center mb-4">
            <h2 class="text-center">Student Admission</h2>
        </div>

        <div class="d-flex justify-content-evenly  gap-3 ">

            <div class="card text-black cardgrade11 justify-content-center align-items-center" style="width: 300px; background: #FF914D;">
                <p>Grade 11 Total:</p>
                <!-- button dapat ni -->
                <h3>4</h3>
            </div>
            <div class="card text-black justify-content-center align-items-center" style="width: 300px; background: #FF3131;">
                <p>Grade 12 Total:</p>
                <!-- pati pud ni -->
                <h3>5</h3>
            </div>

        </div>

        <table class="table table-striped table-hover table-bordered mt-4 align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Grade Level</th>
                    <th>Strand</th>
                    <th>Year Level</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registers as $register)
                <tr>
                    <td>{{ $register->registerID}}</td>
                    <td>{{ $register->student->firstName . ' ' . $register->student->lastName }}</td>
                    <td>{{$register->student->gradeLevel->gradeLevelName}}</td>
                    <td>{{ $register->student->strand->strandName}}</td>
                    <td>2025-2026</td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center gap-2">

                            <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#viewModal{{ $register->registerID }}">
                                <i class="bi bi-eye-fill"></i>
                            </button>


                            <form action="{{ route('route.student.admission.accept') }}" method="POST">
                                @csrf
                                <button class="btn btn-success rounded-pill"><i class="bi bi-check-circle"></i></button>
                            </form>
                            <form action="{{ route ('route.student.admission.reject') }}" method="POST">
                                @csrf
                                <button class="btn btn-danger rounded-pill"><i class="bi bi-x-circle"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                <div class="modal fade" id="viewModal{{ $register->registerID }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $register->registerID }}" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewModalLabel{{ $register->registerID }}">Student Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Student Details -->
                                <p><strong>Name:</strong> {{ $register->student->firstName }} {{ $register->student->lastName }}</p>
                                <p><strong>Email:</strong> {{ $register->student->email }}</p>
                                <p><strong>Contact:</strong> {{ $register->student->contactNumber }}</p>
                                <p><strong>Address:</strong> {{ $register->student->address }}</p>

                                <!-- Documents -->
                                <h6 class="mt-4">Uploaded Documents</h6>
                                @foreach($register->student->documents as $document)
                                <p><strong>{{ $document->documentType }}</strong></p>
                                <img src="{{ asset('storage/' . $document->documentPath) }}" alt="{{ $document->documentType }}" class="img-fluid mb-3" style="max-height: 300px;">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


            </tbody>
        </table>
    </div>
</div>
</div>
@endsection