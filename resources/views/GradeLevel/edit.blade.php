<div class="modal fade" id="EditGradeLevelModal{{ $gradeLevel->gradeLevelID }}" tabindex="-1" aria-labelledby="EditGradeLevelModalLabel{{ $gradeLevel->gradeLevelID }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditGradeLevelModalLabel{{ $gradeLevel->gradeLevelID }}">Edit Grade Level</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('gradelevels.update', ['gradelevel' => $gradeLevel->gradeLevelID]) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="idgrd{{ $gradeLevel->gradeLevelID }}" class="form-label">Grade Level Name</label>
                        <input type="text" class="form-control" id="idgrd{{ $gradeLevel->gradeLevelID }}" name="gradeName" value="{{ $gradeLevel->gradeLevelName }}">
                        @error('gradeName')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>