<div class="modal fade" id="gradeLevelModal" tabindex="-1" aria-labelledby="gradeLevelModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gradeLevelModalLabel">Create Grade Level</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form inside the modal -->
                <form method="POST" action="{{ route('gradelevels.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="idgrd" class="form-label">Grade Level Name</label>
                        <input type="text" class="form-control" id="idgrd" name="gradeName" value="{{ old('gradeName') }}">
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