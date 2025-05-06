@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Schedules</h1>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#scheduleModal">Add Schedule</button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Schedule ID</th>
                <th>Subject</th>
                <th>Section</th>
                <th>Teacher</th>
                <th>Time Start</th>
                <th>Time End</th>
                <th>Room Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $schedule)
            <tr>
                <td>{{ $schedule->scheduleID }}</td>
                <td>{{ $schedule->subject->subjectName }}</td>
                <td>{{ $schedule->section->sectionName }}</td>
                <td>{{ $schedule->teacher->teacherName }}</td>
                <td>{{ $schedule->timeStart }}</td>
                <td>{{ $schedule->timeEnd }}</td>
                <td>{{ $schedule->RoomNum }}</td>
                <td>
                    <button class="btn btn-warning btn-sm">Edit</button>
                    <button class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="scheduleModal" tabindex="-1" aria-labelledby="scheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scheduleModalLabel">Add Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('schedules.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="subjectID" class="form-label">Subject</label>
                        <select class="form-select" id="subjectID" name="subjectID" required>
                            <option value="" disabled {{ old('subjectID') ? '' : 'selected' }}>Select Subject</option>
                            @foreach($subjects as $subject)
                            <option value="{{ $subject->subjectID }}" {{ old('subjectID') == $subject->subjectID ? 'selected' : '' }}>
                                {{ $subject->subjectName }}
                            </option>
                            @endforeach
                        </select>
                        @error('subjectID')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="sectionID" class="form-label">Section</label>
                        <select class="form-select" id="sectionID" name="sectionID" required>
                            <option value="" disabled {{ old('sectionID') ? '' : 'selected' }}>Select Section</option>
                            @foreach($sections as $section)
                            <option value="{{ $section->sectionID }}" {{ old('sectionID') == $section->sectionID ? 'selected' : '' }}>
                                {{ $section->sectionName }}
                            </option>
                            @endforeach
                        </select>
                        @error('sectionID')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="teacherID" class="form-label">Teacher</label>
                        <select class="form-select" id="teacherID" name="teacherID" required>
                            <option value="" disabled {{ old('teacherID') ? '' : 'selected' }}>Select Teacher</option>
                            @foreach($teachers as $teacher)
                            <option value="{{ $teacher->teacherID }}" {{ old('teacherID') == $teacher->teacherID ? 'selected' : '' }}>
                                {{ $teacher->teacherName }}
                            </option>
                            @endforeach
                        </select>
                        @error('teacherID')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="timeStart" class="form-label">Time Start</label>
                        <input type="time" class="form-control" id="timeStart" name="timeStart" required>
                        @error('timeStart')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="timeEnd" class="form-label">Time End</label>
                        <input type="time" class="form-control" id="timeEnd" name="timeEnd" required>
                        @error('timeEnd')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="RoomNum" class="form-label">Room Number</label>
                        <input type="text" class="form-control" id="RoomNum" name="RoomNum" required>
                        @error('RoomNum')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection