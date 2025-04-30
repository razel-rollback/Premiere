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
        <div class="mt-4">
            <h4>Section Schedule</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Teacher</th>
                        <th>Room</th>
                        <th>Time Slot</th>
                        <th>Action</th>
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
    document.getElementById('sectionID').addEventListener('change', function() {
        var sectionID = this.value;

        // Send sectionID to the server
        fetch(`/debug-section/${sectionID}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Server response:', data); // Logs the server's response
            })
            .catch(error => console.error('Error fetching section data:', error));
        // Check if a section is selected
        if (sectionID) {
            // Fetch schedule data via AJAX (you will need to create the appropriate route and controller)
            fetch(`/schedules/getSchedule/${sectionID}`)
                .then(response => response.json())
                .then(data => {
                    var tableBody = document.getElementById('scheduleTableBody');

                    // Clear the table body first
                    tableBody.innerHTML = '';

                    if (data.length > 0) {
                        // Iterate over the data and populate the table
                        data.forEach(schedule => {
                            var row = document.createElement('tr');

                            var subjectCell = document.createElement('td');
                            subjectCell.textContent = schedule.subjectName;
                            row.appendChild(subjectCell);

                            var teacherCell = document.createElement('td');
                            teacherCell.textContent = schedule.teacherName;
                            row.appendChild(teacherCell);

                            var roomCell = document.createElement('td');
                            roomCell.textContent = schedule.room;
                            row.appendChild(roomCell);

                            var timeSlotCell = document.createElement('td');
                            timeSlotCell.textContent = schedule.timeSlot;
                            row.appendChild(timeSlotCell);

                            var actionCell = document.createElement('td');
                            var actionButton = document.createElement('button');
                            actionButton.classList.add('btn', 'btn-danger');
                            actionButton.textContent = 'Delete';
                            // Implement deletion logic if needed
                            actionCell.appendChild(actionButton);
                            row.appendChild(actionCell);

                            tableBody.appendChild(row);
                        });
                    } else {
                        // No schedule available for the selected section
                        var noScheduleRow = document.createElement('tr');
                        var noScheduleCell = document.createElement('td');
                        noScheduleCell.colSpan = 5;
                        noScheduleCell.textContent = 'No schedule available for this section.';
                        noScheduleRow.appendChild(noScheduleCell);
                        tableBody.appendChild(noScheduleRow);
                    }
                })
                .catch(error => {
                    console.error('Error fetching schedule data:', error);
                });
        } else {
            // If no section is selected, reset the table
            document.getElementById('scheduleTableBody').innerHTML = '<tr><td colspan="4" class="text-center">Select a section and confirm to view its schedule.</td></tr>';
        }
    });
</script>

@endsection