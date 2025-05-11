<!-- Edit Modal -->
<div class="modal fade" id="editScheduleModal{{ $schedule->scheduleID }}" tabindex="-1" aria-labelledby="editScheduleModalLabel{{ $schedule->scheduleID }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('schedules.update', $schedule->scheduleID) }}">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <h3>Edit Schedule</h3>

                    <!-- Section (readonly or not) -->
                    <div class="mb-3">
                        <label for="editSection{{ $schedule->scheduleID }}" class="form-label">Section</label>
                        <input type="text" class="form-control" value="{{ $schedule->sectionName }}" readonly>
                    </div>

                    <!-- Subject -->
                    <div class="mb-3">
                        <label for="editSubject{{ $schedule->scheduleID }}" class="form-label">Subject</label>
                        <select name="subjectID" class="form-select" required>
                            @foreach($subjects as $subject)
                            <option value="{{ $subject->subjectID }}" {{ $subject->subjectID == $schedule->subjectID ? 'selected' : '' }}>
                                {{ $subject->subjectName }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Teacher -->
                    <div class="mb-3">
                        <label for="editTeacher{{ $schedule->scheduleID }}" class="form-label">Teacher</label>
                        <select name="teacherID" class="form-select" required>
                            @foreach($teachers as $teacher)
                            <option value="{{ $teacher->teacherID }}" {{ $teacher->teacherID == $schedule->teacherID ? 'selected' : '' }}>
                                {{ $teacher->teacherName }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Time -->
                    <div class="mb-3">
                        <label for="editTimeStart{{ $schedule->scheduleID }}" class="form-label">Start Time</label>
                        <input type="time" class="form-control" name="timeStart" value="{{ \Carbon\Carbon::parse($schedule->timeStart)->format('H:i') }}" required>

                        <label for="editTimeEnd{{ $schedule->scheduleID }}" class="form-label mt-2">End Time</label>
                        <input type="time" class="form-control" name="timeEnd" value="{{ \Carbon\Carbon::parse($schedule->timeEnd)->format('H:i') }}" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>