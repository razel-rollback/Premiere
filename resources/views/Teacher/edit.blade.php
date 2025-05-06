<div class="modal fade" id="EditTeacherModal{{ $teacher->teacherID }}" tabindex="-1" aria-labelledby="EditTeacherModalLabel{{ $teacher->teacherID }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditTeacherModalLabel{{ $teacher->teacherID }}">Edit Teacher</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('teachers.update', $teacher->teacherID) }}">
                    @csrf
                    @method('PUT') <!-- Specify the HTTP method for updating -->
                    <div class="mb-3">
                        <label for="idteacherName{{ $teacher->teacherID }}" class="form-label">Teacher Name</label>
                        <input type="text" class="form-control" id="idteacherName{{ $teacher->teacherID }}" name="teacherName" value="{{ $teacher->teacherName }}">
                        @error('teacherName')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="idteacherSpecial{{ $teacher->teacherID }}" class="form-label">Specialization</label>
                        <input type="text" class="form-control" id="idteacherSpecial{{ $teacher->teacherID }}" name="specialization" value="{{ $teacher->specialization }}">
                        @error('specialization')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>