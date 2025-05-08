<!-- Button to Open Modal -->
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addStrandModal">
    Add Schedule
</button>

<!-- Modal -->
<div class="modal fade" id="addStrandModal" tabindex="-1" aria-labelledby="addStrandModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('schedules.store') }}">
                @csrf
                <div class="modal-body">

                    <h3>Add Schedule</h3>
                    <div class="mb-3">
                        <label for="selectsection" class="form-label">Section</label>
                        <select class="form-select" id="selectsection" name="sectionID">
                            <option value="0" disabled selected>Select Section</option>
                            <option value="">Section 1</option>
                            <option value="">Section 2</option>
                            <option value="">Section 3</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="selectsubject" class="form-label">Subject</label>
                        <select name="subjectID" id="selectsubject" class="form-select">
                            <option value="" disabled selected>Select Subject</option>
                            <option value="">Subject 1</option>
                            <option value="">Subject 2</option>
                            <option value="">Subject 3</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="selectteacher" class="form-label">Teacher</label>
                        <select name="teacherID" id="selectteacher" class="form-select">
                            <option value="" disabled selected>Select Teacher</option>
                            <option value="">Teacher 1</option>
                            <option value="">Teacher 2</option>
                            <option value="">Teacher 3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="str" class="form-label">Start:</label>
                        <input type="time" id="str" name="str" class="form-control" min="08:00" max="16:00">

                        <label for="end" class="form-label">End:</label>
                        <input type="time" id="end" name="end" class="form-control" min="09:00" max="17:00">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>