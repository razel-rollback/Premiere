<div class="modal fade" id="editStrandModal{{ $strand->strandID }}" tabindex="-1" aria-labelledby="editStrandModalLabel{{ $strand->strandID }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('strands.update', $strand->strandID) }}">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editStrandModalLabel{{ $strand->strandID }}">Edit Strand</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="strandName" class="form-label text-start d-block">Strand Name:</label>
                        <input type="text" class="form-control" id="strandName" name="strandName" value="{{ old('strandName', $strand->strandName) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="trackID" class="form-label text-start d-block">Track Name:</label>
                        <select class="form-select" id="trackID" name="trackID" required>
                            @foreach($tracks as $track)
                            <option value="{{ $track->trackID }}" {{ (old('trackID', $strand->trackID) == $track->trackID) ? 'selected' : '' }}>
                                {{ $track->trackName }}
                            </option>
                            @endforeach
                        </select>
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