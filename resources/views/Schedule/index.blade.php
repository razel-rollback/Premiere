@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Schedules</h1>
    <!-- Link to create a new schedule -->
    <a href="{{ route('schedules.create') }}" class="btn btn-success">Manage Schedule</a>
    <!-- Table to display schedules -->
    <table class="table table-striped table-hover table-bordered mt-4 align-middle">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Section</th>
                <th>Subject</th>
                <th>Teacher</th>
                <th>Time Slot</th>
                <th>Room</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $schedule)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $schedule->section->sectionName }}</td>
                <td>{{ $schedule->subject->subjectName }}</td>
                <td>{{ $schedule->teacher->teacherName }}</td>
                <td>{{ $schedule->timeSlot }}</td>
                <td>{{ $schedule->section->room }}</td>
                <!-- <td>
                    <a href="{{ route('schedules.edit', $schedule->scheduleID) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('schedules.destroy', $schedule->scheduleID) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td> -->
            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection