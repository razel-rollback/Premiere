<div class="modal fade" id="sectionModal" tabindex="-1" aria-labelledby="gradeLevelModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gradeLevelModalLabel">Create Section</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form inside the modal -->
                <form action="{{ route('sections.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="sectionName" class="form-label">Section Name</label>
                        <input type="text" class="form-control" id="sectionName" name="sectionName" required>
                        @error('sectionName')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Grade Level -->
                    <div class="mb-3">
                        <label for="gradeLevelID" class="form-label">Grade Level</label>
                        <select class="form-select" id="gradeLevelID" name="gradeLevelID" required>
                            <option value="" disabled {{ old('gradeLevelID') ? '' : 'selected' }}>Select Grade Level</option>
                            @foreach($gradeLevels as $gradeLevel)
                            <option value="{{ $gradeLevel->gradeLevelID }}" {{ old('gradeLevelID') == $gradeLevel->gradeLevelID ? 'selected' : '' }}>
                                {{ $gradeLevel->gradeLevelName }}
                            </option>
                            @endforeach
                        </select>
                        @error('gradeLevelID')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Strand -->
                    <div class="mb-3">
                        <label for="strandID" class="form-label">Strand</label>
                        <select class="form-select" id="strandID" name="strandID" required>
                            <option value="" disabled {{ old('strandID') ? '' : 'selected' }}>Select Strand</option>
                            @foreach($strands as $strand)
                            <option value="{{ $strand->strandID }}" {{ old('strandID') == $strand->strandID ? 'selected' : '' }}>
                                {{ $strand->strandName }}
                            </option>
                            @endforeach
                        </select>
                        @error('strandID')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>