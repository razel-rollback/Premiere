<div class="modal fade" id="TeacherModal" tabindex="-1" aria-labelledby="TeacherModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TeacherModalLabel">Create Teacher</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('teachers.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="idteacherName" class="form-label">Teacher Name</label>
                        <input type="text" class="form-control" id="idteacherName" name="teacherName" value="{{ old('teacherName') }}">
                        @error('teacherName')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="idteacherSpecial" class="form-label">Specialization</label>
                        <input type="text" class="form-control" id="idteacherSpecial" name="specialization" value="{{ old('specialization') }}">
                        @error('specialization')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">save</button>
                </form>
            </div>
        </div>
    </div>
</div>