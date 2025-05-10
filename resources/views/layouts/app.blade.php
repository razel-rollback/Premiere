<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">

    <title>@yield('title', 'Premiere Admin')</title>
    @yield('head')

    <style>
        /* Customize DataTables search input */
        .dataTables_filter input {
            width: 300px !important;
            /* Set your desired width */
            padding: 0.5rem;
            border: 1px solid #e2e8f0;
            border-radius: var(--border-radius);
            transition: var(--transition);
        }

        .dataTables_filter input:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        }

        :root {
            --sidebar-width: 280px;
            --sidebar-bg: #1a2035;
            --sidebar-active: #2d3748;
            --sidebar-hover: #2a3347;
            --primary: #4361ee;
            --primary-light: #ebf1ff;
            --secondary: #3f37c9;
            --accent: #4895ef;
            --success: #4cc9f0;
            --danger: #f72585;
            --warning: #f8961e;
            --info: #3a0ca3;
            --light: #f8f9fa;
            --dark: #212529;
            --border-radius: 0.5rem;
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background-color: #f5f7fb;
            color: #4a5568;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            background-color: var(--sidebar-bg);
            color: white;
            padding-top: 1rem;
            box-shadow: 4px 0px 15px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            transition: var(--transition);
            overflow-y: auto;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            padding: 1rem 1.5rem;
            margin-bottom: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-brand img {
            width: 40px;
            height: 40px;
            object-fit: contain;
            margin-right: 0.75rem;
        }

        .sidebar-brand h4 {
            font-weight: 700;
            margin: 0;
            color: white;
            font-size: 1.25rem;
        }

        .sidebar-nav {
            padding: 0 1rem;
        }

        .sidebar-item {
            margin-bottom: 0.25rem;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            border-radius: var(--border-radius);
            transition: var(--transition);
        }

        .sidebar-link:hover {
            background-color: var(--sidebar-hover);
            color: white;
        }

        .sidebar-link.active {
            background-color: var(--primary);
            color: white;
            font-weight: 500;
        }

        .sidebar-link i {
            margin-right: 0.75rem;
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        .sidebar-link .chevron {
            margin-left: auto;
            transition: var(--transition);
        }

        .sidebar-link[aria-expanded="true"] .chevron {
            transform: rotate(180deg);
        }

        .sidebar-dropdown {
            padding-left: 2.5rem;
        }

        .sidebar-dropdown .sidebar-link {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }

        .content {
            margin-left: var(--sidebar-width);
            padding: 1.5rem;
            transition: var(--transition);
        }

        .logout-btn {
            position: fixed;
            bottom: 1rem;
            left: 1.5rem;
            width: calc(var(--sidebar-width) - 3rem);
            background-color: rgba(255, 255, 255, 0.1);
            border: none;
            color: white;
            padding: 0.75rem;
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .logout-btn:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .logout-btn i {
            margin-right: 0.5rem;
        }

        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .content {
                margin-left: 0;
            }

            .sidebar-toggle {
                display: block !important;
            }
        }

        .sidebar-toggle {
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 1100;
            display: none;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <button class="sidebar-toggle" id="sidebarToggle">
        <i class="bi bi-list"></i>
    </button>

    <div class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <img src="{{ asset('images/Premire.png') }}" alt="Premiere Logo" style="border-radius: 50%;">
            <h4>PREMIERE</h4>
        </div>

        <div class="sidebar-nav">
            <div class="sidebar-item">
                <a href="{{ route('route.dashboard') }}" class="sidebar-link {{ request()->routeIs('route.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
            </div>

            <div class="sidebar-item">
                <a class="sidebar-link collapsed" data-bs-toggle="collapse" href="#manageCollapse" role="button" aria-expanded="false">
                    <i class="bi bi-people-fill"></i>
                    <span>Student Management</span>
                    <i class="bi bi-chevron-down chevron ms-auto"></i>
                </a>
                <div class="collapse sidebar-dropdown" id="manageCollapse">
                    <a href="{{ route('route.student.admission') }}" class="sidebar-link {{ request()->routeIs('route.student.admission') ? 'active' : '' }}">
                        <i class="bi bi-person-plus"></i>
                        <span>Student Admission</span>
                    </a>
                    <a href="{{ route('enrolled.students') }}" class="sidebar-link {{ request()->routeIs('enrolled.students') ? 'active' : '' }}">
                        <i class="bi bi-person-check"></i>
                        <span>Admitted Students</span>
                    </a>
                </div>
            </div>




            <div class="sidebar-item">
                <a href="{{ route('tracks.index') }}" class="sidebar-link {{ request()->routeIs('tracks.index') ? 'active' : '' }}">
                    <i class="bi bi-signpost-split"></i>
                    <span>Tracks</span>
                </a>
            </div>

            <div class="sidebar-item">
                <a href="{{ route('strands.index') }}" class="sidebar-link {{ request()->routeIs('strands.index') ? 'active' : '' }}">
                    <i class="bi bi-diagram-3"></i>
                    <span>Strands</span>
                </a>
            </div>

            <div class="sidebar-item">
                <a href="{{ route('subjects.index') }}" class="sidebar-link {{ request()->routeIs('subjects.index') ? 'active' : '' }}">
                    <i class="bi bi-book"></i>
                    <span>Subjects</span>
                </a>
            </div>



            <div class="sidebar-item">
                <a href="{{ route('teachers.index') }}" class="sidebar-link {{ request()->routeIs('teachers.index') ? 'active' : '' }}">
                    <i class="bi bi-person-badge"></i>
                    <span>Teachers</span>
                </a>
            </div>

            <div class="sidebar-item" hidden>
                <a href="{{ route('gradelevels.index') }}" class="sidebar-link {{ request()->routeIs('gradelevels.index') ? 'active' : '' }}">
                    <i class="bi bi-123"></i>
                    <span>Grade Levels</span>
                </a>
            </div>

            <div class="sidebar-item">
                <a href="{{ route('sections.index') }}" class="sidebar-link {{ request()->routeIs('sections.index') ? 'active' : '' }}">
                    <i class="bi bi-collection"></i>
                    <span>Sections</span>
                </a>
            </div>

            <div class="sidebar-item">
                <a href="{{ route('schedules.index') }}" class="sidebar-link {{ request()->routeIs('schedules.index') ? 'active' : '' }}">
                    <i class="bi bi-calendar-week"></i>
                    <span>Schedules</span>
                </a>
            </div>
            <div class="sidebar-item">
                <a href="{{ route('reports.index') }}" class="sidebar-link  {{ request()->routeIs('reports.index') ? 'active' : '' }}"> <i class="bi bi-clipboard-data-fill"></i>Reports </a>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.logout') }}" class="logout-btn" id="logout-form">
            @csrf
            <button type="submit" style="background: none; border: none; color: white; width: 100%; display: flex; align-items: center; justify-content: center;">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>

    <div class="content" id="mainContent">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery (required for DataTables) -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- DataTables Bootstrap 5 JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <!-- DataTables Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <!-- Buttons HTML5 export -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <!-- PDF export -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <!-- JSZip for Excel export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const mainContent = document.getElementById('mainContent');

            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
            });

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(e) {
                if (window.innerWidth <= 992 && !sidebar.contains(e.target) && e.target !== sidebarToggle) {
                    sidebar.classList.remove('active');
                }
            });
        });
    </script>
    @yield('scripts')
    <script>
        $(document).ready(function() {
            $('#linktable').DataTable({
                dom: 'Bfrtip',
                buttons: [],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search...",
                },
                pageLength: 10,
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ],
                initComplete: function() {
                    $('.dataTables_filter input').css('width', '300px');
                }
            });
        });
    </script>
</body>

</html>