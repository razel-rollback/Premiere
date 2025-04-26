<!-- resources/views/modal/subject-modal.blade.php -->
<div class="modal fade" id="subjectModal" tabindex="-1" aria-labelledby="subjectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="subjectModalLabel">Create Subject</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form inside the modal -->
                <form method="POST" action="{{ route('subjects.store') }}">
                    @csrf

                    <!-- Subject Name -->
                    <div class="mb-3">
                        <label for="subjectName" class="form-label">Subject Name</label>
                        <input type="text" class="form-control" id="subjectName" name="subjectName" value="{{ old('subjectName') }}" required>
                        @error('subjectName')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Subject Type -->
                    <div class="mb-3">
                        <label for="subjectType" class="form-label">Subject Type</label>
                        <select class="form-select" id="subjectType" name="subjectType" required>
                            <option value="" disabled {{ old('subjectType') ? '' : 'selected' }}>Select Subject Type</option>
                            <option value="Core" {{ old('subjectType') == 'Core' ? 'selected' : '' }}>Core</option>
                            <option value="Advance" {{ old('subjectType') == 'Advance' ? 'selected' : '' }}>Advance</option>
                            <option value="Specialize" {{ old('subjectType') == 'Specialize' ? 'selected' : '' }}>Specialize</option>
                        </select>
                        @error('subjectType')
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
                        <div class="text-danger">{{ $message }}</div>F
                        @enderror
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>