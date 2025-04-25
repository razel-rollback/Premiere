<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <title>@yield('title', 'Laravel App')</title>
    @yield('head')

</head>

<body>
    <!-- <nav class="navbar navbar-light">
        <div class="sidebar">
            <h2>Menu</h2>
            <div class="justify-content-center align-items-center mb-4">
                <img src="{{ asset('images/Premire.png') }}" alt="Logo" class="img-fluid rounded-circle" width="180">
            </div>
            <a href="{{ route('route.dashboard') }}">Dashboard</a>
            <a href="#">Manage</a>
            <a href="{{ route('route.student.admission') }}">Student Admission</a>
            <a href="#">Admitted Students</a>
            <a href="{{ route('route.subject') }}">Subjects</a>
            <a href="{{ route('strands.index') }}">Strands</a>
            <a href="{{ route('tracks.index') }}">Tracks</a>
            <a href="{{ route('teachers.index') }}">Teacher</a>
            <a href="{{ route('gradelevels.index') }}">Grade Level</a>
            <a href="{{ route('sections.index') }}">Section </a>
        </div>
    </nav> -->

    <style>
        body {
            margin: 0;
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            color: white;
            padding-top: 20px;
        }

        .sidebar a {
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
        }

        .sidebar a:hover {
            background-color: #575757;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
    </head>

    <body>

        <div class="sidebar"
            style="
        /* background: rgba(0, 0, 0, 0); */
        /* background: url('../images/school-building.png') center center / cover no-repeat; */
        ">

            <div class="d-flex justify-content-center align-items-center">
                <div class="me-2">
                    <img src="{{ asset('images/Premire.png') }}" alt="Logo" class="img-fluid rounded-circle" width="50">
                </div>
                <div>
                    <h4 class="mb-0">PREMIERE</h4>
                </div>
            </div>
            <a href="{{ route('route.dashboard') }}">Dashboard</a>
            <div class="accordion" id="accordionSidebar">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button style="background-color: #343a40; color:white;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseItems" aria-expanded="false" aria-controls="collapseItems">
                            Services
                        </button>
                    </h2>
                    <div id="collapseItems" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionSidebar">
                        <div class="accordion-body" style="background-color: #343a40;">
                            <a href="#">Student Admission</a>
                            <a href="#">Admitted Students</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- outside accordion -->
            <a href="{{ route('route.subject') }}">Subjects</a>
            <a href="{{ route('strands.index') }}">Strands</a>
            <a href="{{ route('tracks.index') }}">Tracks</a>
            <a href="{{ route('teachers.index') }}">Teacher</a>
            <a href="{{ route('gradelevels.index') }}">Grade Level</a>
            <a href="{{ route('sections.index') }}">Section </a>
        </div>

        <div class="content">
            <h1>Welcome to My Website</h1>
            <p>This is a simple sidebar layout using Bootstrap 5.</p>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>


    @yield('content')

</html>