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
                    @yield('scripts')

                    <!-- Section Dropdown -->
                    <div class="mb-3">
                        <label for="selectSection" class="form-label">Section</label>
                        <select id="sectionDropdown" name="sectionID" class="form-select" required>
                            <option value="" disabled selected>Select Section</option>
                            @foreach($sections as $section)
                            <option value="{{ $section->sectionID }}" data-strand="{{ $section->strandID }}">
                                {{ $section->sectionName }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Subject Dropdown -->
                    <div class="mb-3">
                        <label for="selectSubject" class="form-label">Subject</label>
                        <select id="subjectDropdown" name="subjectID" class="form-select" required>
                            <option value="" disabled selected>Select Subject</option>
                        </select>
                    </div>

                    <!-- Teacher Dropdown -->
                    <div class="mb-3">
                        <label for="selectTeacher" class="form-label">Teacher</label>
                        <select name="teacherID" id="selectTeacher" class="form-select" required>
                            <option value="" disabled selected>Select Teacher</option>
                            @foreach($teachers as $teacher)
                            <option value="{{ $teacher->teacherID }}">{{ $teacher->teacherName }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Time Inputs -->
                    <div class="mb-3">
                        <label for="timeStart" class="form-label">Start Time:</label>
                        <input type="time" id="timeStart" name="timeStart" class="form-control" required>

                        <label for="timeEnd" class="form-label">End Time:</label>
                        <input type="time" id="timeEnd" name="timeEnd" class="form-control" required>
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

@section('scripts')
<script>
    document.getElementById('sectionDropdown').addEventListener('change', function() {
        const strandId = this.options[this.selectedIndex].dataset.strand;
        const subjectDropdown = document.getElementById('subjectDropdown');

        subjectDropdown.innerHTML = '<option value="" disabled selected>Loading...</option>';
        subjectDropdown.disabled = true;

        fetch(`/get-subjects?strand_id=${strandId}`)
            .then(response => response.json())
            .then(subjects => {
                subjectDropdown.innerHTML = '<option value="" disabled selected>Select Subject</option>';
                subjects.forEach(subject => {
                    const option = new Option(subject.subjectName, subject.subjectID);
                    subjectDropdown.add(option);
                });
                subjectDropdown.disabled = false;
            })
            .catch(error => {
                subjectDropdown.innerHTML = '<option value="" disabled selected>Error loading subjects</option>';
            });
    });
</script>
@endsection