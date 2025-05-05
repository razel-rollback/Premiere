<!-- Include the Modal -->
<div class="modal fade" id="EditTrackModal{{ $Track->trackID }}" tabindex="-1" aria-labelledby="EditTrackModalLabel{{ $Track->trackID }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditTrackModalLabel{{ $Track->trackID }}">Edit Track</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('tracks.update', $Track->trackID) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="trackName{{ $Track->trackID }}" class="form-label">Track Name</label>
                        <input type="text" class="form-control" id="trackName{{ $Track->trackID }}" name="trackName" value="{{ $Track->trackName }}" required>
                        @error('trackName')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
</td>