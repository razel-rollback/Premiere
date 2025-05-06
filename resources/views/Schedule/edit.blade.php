<div class="modal fade" id="editsectionModal{{ $section->sectionID }}" tabindex="-1" aria-labelledby="editSectionModalLabel{{ $section->sectionID }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSectionModalLabel{{ $section->sectionID }}">Edit Section</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('sections.update', $section->sectionID) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="sectionName{{ $section->sectionID }}" class="form-label">Section Name</label>
                        <input type="text" class="form-control" id="sectionName{{ $section->sectionID }}" name="sectionName" value="{{ $section->sectionName }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="gradeLevelID{{ $section->sectionID }}" class="form-label">Grade Level</label>
                        <select class="form-select" id="gradeLevelID{{ $section->sectionID }}" name="gradeLevelID" required>
                            @foreach($gradeLevels as $gradeLevel)
                            <option value="{{ $gradeLevel->gradeLevelID }}" {{ $section->gradeLevelID == $gradeLevel->gradeLevelID ? 'selected' : '' }}>
                                {{ $gradeLevel->gradeLevelName }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="strandID{{ $section->sectionID }}" class="form-label">Strand</label>
                        <select class="form-select" id="strandID{{ $section->sectionID }}" name="strandID" required>
                            @foreach($strands as $strand)
                            <option value="{{ $strand->strandID }}" {{ $section->strandID == $strand->strandID ? 'selected' : '' }}>
                                {{ $strand->strandName }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>