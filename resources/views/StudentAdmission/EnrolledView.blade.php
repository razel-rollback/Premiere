@extends('layouts.app')

@section('title', 'Enrolled Students')


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
            <h2 class="text-center">Enrolled Students</h2>
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
                <tr>
                    <td>0001</td>
                    <td>Castillo, Julian</td>
                    <td>12</td>
                    <td>ABM</td>
                    <td>2025-2026</td>
                    <td><button class="btn btn-warning rounded-pill"><i class="bi bi-arrow-counterclockwise"></i></button></td>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection