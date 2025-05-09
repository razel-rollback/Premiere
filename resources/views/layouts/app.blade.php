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

<body style="background-color:rgb(235, 245, 255);">
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
            background-color: rgb(31, 34, 38);
            color: white;
            padding-top: 20px;
            box-shadow: 4px 0px 15px rgba(0, 0, 0, 0.1);
            /* Customize the shadow */

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

        .sidebar a.active {
            background: url('../images/school-building.png') center center / cover no-repeat;
            /* Change this to your desired active color */
            color: #FFFFFF;
            text-shadow: 1px 1px 0px black, 0px 1px 0px black, -1px -1px 0px black, -1px 1px 0px black, 1px -1px 0px black;
            font-weight: bold;
        }

        .sidebar a:hover {
            background-color: #575757;
            color: white;
        }
    </style>
    </head>

    <body>

        <div class="sidebar">
            <div class="d-flex justify-content-center align-items-center">
                <div class="me-2">
                    <img src="{{ asset('images/Premire.png') }}" alt="Logo" class="img-fluid rounded-circle" width="50">
                </div>
                <div>
                    <h4 class="mb-0 text-white">PREMIERE</h4>
                </div>
            </div>
            <a href="{{ route('route.dashboard') }}" class="{{ request()->routeIs('route.dashboard') ? 'active' : '' }}">Dashboard</a>
            <div class="accordion" id="accordionSidebar">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button style="background-color: #343a40; color:white;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseItems" aria-expanded="false" aria-controls="collapseItems">
                            Manage
                        </button>
                    </h2>
                    <div id="collapseItems" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionSidebar">
                        <div class="accordion-body" style="background-color: #343a40;">
                            <a href="{{route('route.student.admission') }}" class="{{ request()->routeIs('route.student.admission') ? 'active' : '' }}">Student Admission</a>
                            <a href="{{route('enrolled.students') }}" class="{{ request()->routeIs('enrolled.students') ? 'active' : '' }}">Admitted Students</a>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('subjects.index') }}" class="{{ request()->routeIs('subjects.index') ? 'active' : '' }}">Subjects</a>
            <a href="{{ route('strands.index') }}" class="{{ request()->routeIs('strands.index') ? 'active' : '' }}">Strands</a>
            <a href="{{ route('tracks.index') }}" class="{{ request()->routeIs('tracks.index') ? 'active' : '' }}">Tracks</a>
            <a href="{{ route('teachers.index') }}" class="{{ request()->routeIs('teachers.index') ? 'active' : '' }}">Teacher</a>
            <a href="{{ route('gradelevels.index') }}" class="{{ request()->routeIs('gradelevels.index') ? 'active' : '' }}">Grade Level</a>
            <a href="{{ route('sections.index') }}" class="{{ request()->routeIs('sections.index') ? 'active' : '' }}">Section</a>
            <a href="{{ route('schedules.index') }}" class="{{ request()->routeIs('schedule.index') ? 'active' : '' }}">Schedules</a>
            <a href="{{ route('reports.index') }}" class="{{ request()->routeIs('reports.index') ? 'active' : '' }}">Reports </a>

            <form method="POST" action="{{ route('admin.logout') }}" class="position-absolute bottom-0 start-50 translate-middle-x mb-3">
                @csrf
                <button type="submit" class="btn btn-primary rounded-pill">
                    Logout
                </button>
            </form>



        </div>


        <div class="content">
            @yield('content')
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>



</html>