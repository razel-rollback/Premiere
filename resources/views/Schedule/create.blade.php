@extends('layouts.head')

@section('content')
<div class="container">
    <h2>Create Schedule</h2>
    <form action="{{ route('schedules.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="sectionID">Section</label>
            <select name="sectionID" id="sectionID" class="form-control" required>
                <option value="">Select Section</option>
                @foreach($sections as $section)
                <option value="{{ $section->sectionID }}" data-strand-id="{{ $section->strandID }}">
                    {{ $section->sectionName }}
                </option>
                @endforeach
            </select>
        </div>

        <button type="button" id="confirmSectionButton" class="btn btn-primary mt-3">Confirm Section Schedule</button>

        <div class="mt-4">
            <h4>Section Schedule</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Teacher</th>
                        <th>Room</th>
                        <th>Time Slot</th>
                    </tr>
                </thead>
                <tbody id="scheduleTableBody">
                    <tr>
                        <td colspan="4" class="text-center">Select a section and confirm to view its schedule.</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="form-group">
            <label for="subjectID">Subject</label>
            <select name="subjectID" id="subjectID" class="form-control" required>
                <option value="">Select Subject</option>
                @foreach($subjects as $subject)
                <option value="{{ $subject->subjectID }}">{{ $subject->subjectName }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="teacherID">Teacher</label>
            <select name="teacherID" id="teacherID" class="form-control" required>
                <option value="">Select Teacher</option>
                @foreach($teachers as $teacher)
                <option value="{{ $teacher->teacherID }}">{{ $teacher->teacherName }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="timeSlot">Time Slot</label>
            <select name="timeSlot" id="timeSlot" class="form-control" required>
                <option value="">Select Time Slot</option>
                @for ($hour = 7; $hour < 17; $hour++)
                    <option value="{{ sprintf('%02d:00-%02d:00', $hour, $hour + 1) }}">
                    {{ sprintf('%02d:00 - %02d:00', $hour, $hour + 1) }}
                    </option>
                    @endfor
            </select>
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-success">Add Schedule</button>
        </div>
    </form>

    <div class="form-group mt-3">
        <a href="{{ route('schedules.index') }}" class="btn btn-secondary">Back to Dashboard</a>
    </div>
</div>
@endsection

@section('scripts')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.getElementById('confirmSectionButton').addEventListener('click', function() {
        const sectionID = document.getElementById('sectionID').value;
        const scheduleTableBody = document.getElementById('scheduleTableBody');

        scheduleTableBody.innerHTML = '<tr><td colspan="4" class="text-center">Loading...</td></tr>';

        if (sectionID) {
            fetch(`/api/section-schedules/${sectionID}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (Array.isArray(data) && data.length > 0) {
                        scheduleTableBody.innerHTML = '';
                        data.forEach(schedule => {
                            const row = `
                        <tr>
                            <td>${schedule.subject ? schedule.subject.subjectName : 'N/A'}</td>
                            <td>${schedule.teacher ? schedule.teacher.teacherName : 'N/A'}</td>
                            <td>${schedule.RoomNum || 'N/A'}</td>
                            <td>${schedule.timeSlot || 'N/A'}</td>
                        </tr>
                    `;
                            scheduleTableBody.innerHTML += row;
                        });
                    } else {
                        scheduleTableBody.innerHTML = '<tr><td colspan="4" class="text-center">No schedules available for this section.</td></tr>';
                    }
                })
                .catch(error => {
                    console.error('Error fetching schedules:', error);
                    scheduleTableBody.innerHTML = '<tr><td colspan="4" class="text-center">Failed to load schedules. Please try again.</td></tr>';
                });
        } else {
            scheduleTableBody.innerHTML = '<tr><td colspan="4" class="text-center">Please select a section first.</td></tr>';
        }
    });
</script>

@endsection