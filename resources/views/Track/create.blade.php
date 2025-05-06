<div class="modal fade" id="AddTrackModal" tabindex="-1" aria-labelledby="AddTrackModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddTrackModalLabel">Add New Track</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('tracks.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="trackName" class="form-label">Track Name</label>
                        <input type="text" class="form-control" id="trackName" name="trackName" value="{{ old('trackName') }}" required>
                        @error('trackName')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>