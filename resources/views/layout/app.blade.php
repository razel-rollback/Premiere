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
    <nav class="navbar navbar-light bg-danger">
        <div class="sidebar">
            <h2>Menu</h2>
            <div class="justify-content-center align-items-center mb-4">
                <img src="{{ asset('images/Premire.png') }}" alt="Logo" class="img-fluid rounded-circle" width="180">
            </div>
            <a href='#'>Dashboard</a>
            <a href="#">Manage</a>
            <a href="#"> Student Admission</a>
            <a href="#">Admitted Students</a>
            <a href="#">Subjects</a>
            <a href="#">Strands</a>
            <a href="#">Tracks</a>
        </div>
    </nav>


    @yield('content')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>