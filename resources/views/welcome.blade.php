<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Admission</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
            background-color: red;
            color: white;
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
    </style>
</head>

<body>

    <div class="sidebar">
        <div class="justify-content-center align-items-center mb-4">
            <img src="{{ asset('images/Premiere.png')}}" alt="Logo" class="img-fluid rounded-circle" width="180">
        </div>
        <a href='#'>Dashboard</a>
        <a href="#">Manage</a>
        <a href="#"> Student Admission</a>
        <a href="#">Admitted Students</a>
        <a href="#">Subjects</a>
        <a href="#">Strands</a>
        <a href="#">Tracks</a>
    </div>

    <div class="main-content">
        <h2 class="text-center">Student Admission</h2>

        <div class="d-flex justify-content-center gap-3">
            <div class="card bg-warning text-white" style="width: 200px;">
                <p>Grade 11 Total:</p>
                <h3>4</h3>
            </div>
            <div class="card bg-danger text-white" style="width: 200px;">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>