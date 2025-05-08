@extends('layouts.app')

@section('title', 'Schedules')

@section('head')
<!-- Add any additional CSS or JS here -->
@endsection

@section('content')
<div class="container-fluid">
    <h1>Schedule</h1>
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
    @include('Schedule.create')
    <!-- <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#sectionModal">Add Section</button> -->

    <!-- Search bar -->
    <div class="mb-3">
        <input type="text" id="searchBar" class="form-control" placeholder="Search...">
    </div>

    <!-- Sorting buttons -->
    <div class="mb-3">
        <button class="btn btn-secondary" onclick="sortTable('sectionName')">Sort by Section Name</button>
        <button class="btn btn-secondary" onclick="sortTable('subject')">Sort by Subject</button>
        <button class="btn btn-secondary" onclick="sortTable('teacher')">Sort by Teacher</button>
        <button class="btn btn-secondary" onclick="sortTable('time')">Sort by Time</button>
    </div>

    <table class="table table-striped table-hover table-bordered mt-4 align-middle" id="sectionsTable">
        <thead class="table-dark">
            <tr>
                <th>Section Name</th>
                <th>Subject</th>
                <th>Teacher</th>
                <th>Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sections as $section)
            <tr>
                <td>{{ $section->sectionName }}</td>
                <td>{{ $section->subject }}</td>
                <td>{{ $section->teacher }}</td>
                <td>{{ $section->time }}</td>
                <td>
                    <a class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editsectionModal{{ $section->sectionID }}">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

<script>
    // Search functionality
    document.getElementById('searchBar').addEventListener('input', function() {
        const filter = this.value.toLowerCase();
        const rows = document.querySelectorAll('#sectionsTable tbody tr');
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });

    // Sorting functionality
    function sortTable(column) {
        const table = document.getElementById('sectionsTable');
        const rows = Array.from(table.querySelectorAll('tbody tr'));
        const columnIndex = {
            'sectionName': 0,
            'subject': 1,
            'teacher': 2,
            'time': 3
        } [column];

        rows.sort((a, b) => {
            const aText = a.children[columnIndex].textContent.trim().toLowerCase();
            const bText = b.children[columnIndex].textContent.trim().toLowerCase();
            return aText.localeCompare(bText);
        });

        const tbody = table.querySelector('tbody');
        tbody.innerHTML = '';
        rows.forEach(row => tbody.appendChild(row));
    }
</script>
@endsection