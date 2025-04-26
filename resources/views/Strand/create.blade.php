<!-- Strand/create.blade.php -->

<!-- Button to Open Modal -->
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addStrandModal">
    Add Strand
</button>

<!-- Modal -->
<div class="modal fade" id="addStrandModal" tabindex="-1" aria-labelledby="addStrandModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('strands.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addStrandModalLabel">Add Strand</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="idstrandName" class="form-label">Strand Name</label>
                        <input type="text" class="form-control" id="idstrandName" name="strandName" placeholder="Enter strand name" value="{{ old('strandName') }}">
                        @error('strandName')
                        <div class="text-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="idtrackID" class="form-label">Track</label>
                        <select class="form-select" id="idtrackID" name="trackID">
                            <option value="" selected>Select Track</option>
                            @foreach($tracks as $track)
                            <option value="{{ $track->trackID }}" {{ old('trackID') == $track->trackID ? 'selected' : '' }}>
                                {{ $track->trackName }}
                            </option>
                            @endforeach
                        </select>
                        @error('trackID')
                        <div class="text-danger" role="alert">{{ $message }}</div>
                        @enderror
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