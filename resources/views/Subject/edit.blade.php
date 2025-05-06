<div class="modal fade" id="subjectModal{{ $subject->subjectID }}" tabindex="-1" aria-labelledby="editSubjectModalLabel{{ $subject->subjectID }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSubjectModalLabel{{ $subject->subjectID }}">Edit Subject</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('subjects.update', $subject->subjectID) }}">
                    @csrf
                    @method('PUT') <!-- Specify the HTTP method for updating -->

                    <!-- Subject Name -->
                    <div class="mb-3">
                        <label for="subjectName{{ $subject->subjectID }}" class="form-label">Subject Name</label>
                        <input type="text" class="form-control" id="subjectName{{ $subject->subjectID }}" name="subjectName" value="{{ old('subjectName', $subject->subjectName) }}" required>
                        @error('subjectName')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Subject Type -->
                    <div class="mb-3">
                        <label for="subjectType{{ $subject->subjectID }}" class="form-label">Subject Type</label>
                        <select class="form-select" id="subjectType{{ $subject->subjectID }}" name="subjectType" required>
                            <option value="" disabled>Select Subject Type</option>
                            <option value="Core" {{ old('subjectType', $subject->subjectType) == 'Core' ? 'selected' : '' }}>Core</option>
                            <option value="Advance" {{ old('subjectType', $subject->subjectType) == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                            <option value="Specialize" {{ old('subjectType', $subject->subjectType) == 'Specialized' ? 'selected' : '' }}>Specialized</option>
                        </select>
                        @error('subjectType')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Grade Level -->
                    <div class="mb-3">
                        <label for="gradeLevelID{{ $subject->subjectID }}" class="form-label">Grade Level</label>
                        <select class="form-select" id="gradeLevelID{{ $subject->subjectID }}" name="gradeLevelID" required>
                            <option value="" disabled>Select Grade Level</option>
                            @foreach($gradeLevels as $gradeLevel)
                            <option value="{{ $gradeLevel->gradeLevelID }}" {{ old('gradeLevelID', $subject->gradeLevelID) == $gradeLevel->gradeLevelID ? 'selected' : '' }}>
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
                        <label for="strandID{{ $subject->subjectID }}" class="form-label">Strand</label>
                        <select class="form-select" id="strandID{{ $subject->subjectID }}" name="strandID">
                            <option value="">Select Strand</option>
                            @foreach($strands as $strand)
                            <option value="{{ $strand->strandID }}" {{ old('strandID', $subject->strandID) == $strand->strandID ? 'selected' : '' }}>
                                {{ $strand->strandName }}
                            </option>
                            @endforeach
                        </select>
                        @error('strandID')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>