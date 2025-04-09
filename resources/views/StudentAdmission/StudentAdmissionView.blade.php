@extends('layouts.app')

@section('title', 'Student Admission')

@section('head')
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

            <div class="card text-black cardgrade11 " style="width: 300px; background: #FF914D;">
                <p>Grade 11 Total:</p>
                <h3>4</h3>
            </div>
            <div class="card text-black " style="width: 300px; background: #FF3131;">
                <p>Grade 12 Total:</p>
                <h3>5</h3>
            </div>

        </div>

        <div class="table-container mt-4">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Grade Level</th>
                        <th>Strand</th>
                        <th>Year Level</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>0001</td>
                        <td>Castillo, Julian</td>
                        <td>12</td>
                        <td>ABM</td>
                        <td>2025-2026</td>
                        <td><span class="checkmark">&#10004;</span> <span class="cross">&#10008;</span></td>
                    </tr>
                    <tr>
                        <td>0002</td>
                        <td>Harrison, Michael Reginald</td>
                        <td>12</td>
                        <td>STEM</td>
                        <td>2025-2026</td>
                        <td><span class="checkmark">&#10004;</span> <span class="cross">&#10008;</span></td>
                    </tr>
                    <tr>
                        <td>0003</td>
                        <td>Mullner, Alex</td>
                        <td>12</td>
                        <td>HUMSS</td>
                        <td>2025-2026</td>
                        <td><span class="checkmark">&#10004;</span> <span class="cross">&#10008;</span></td>
                    </tr>
                    <tr>
                        <td>0004</td>
                        <td>Dean, James</td>
                        <td>12</td>
                        <td>HUMSS</td>
                        <td>2025-2026</td>
                        <td><span class="checkmark">&#10004;</span> <span class="cross">&#10008;</span></td>
                    </tr>
                    <tr>
                        <td>0005</td>
                        <td>Padao, Vaness Ken</td>
                        <td>12</td>
                        <td>HUMSS</td>
                        <td>2025-2026</td>
                        <td><span class="checkmark">&#10004;</span> <span class="cross">&#10008;</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection