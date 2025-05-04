@extends('layouts.head')
@section('title', 'Edit Subject')

@section('content')

<div class="container-fluid">
    <h1>Edit Subject</h1>
    <form method="POST" action="{{ route('subjects.update', $subject->subjectID) }}">
        @csrf
        @method('PUT') <!-- Specify the HTTP method for updating -->

        <!-- Subject Name -->
        <div class="mb-3">
            <label for="subjectName" class="form-label">Subject Name</label>
            <input type="text" class="form-control" id="subjectName" name="subjectName" value="{{ old('subjectName', $subject->subjectName) }}" required>
            @error('subjectName')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Subject Type -->
        <div class="mb-3">
            <label for="subjectType" class="form-label">Subject Type</label>
            <select class="form-select" id="subjectType" name="subjectType" required>
                <option value="" disabled>Select Subject Type</option>
                <option value="Core" {{ old('subjectType', $subject->subjectType) == 'Core' ? 'selected' : '' }}>Core</option>
                <option value="Advance" {{ old('subjectType', $subject->subjectType) == 'Advance' ? 'selected' : '' }}>Advance</option>
                <option value="Specialize" {{ old('subjectType', $subject->subjectType) == 'Specialize' ? 'selected' : '' }}>Specialize</option>
            </select>
            @error('subjectType')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Grade Level -->
        <div class="mb-3">
            <label for="gradeLevelID" class="form-label">Grade Level</label>
            <select class="form-select" id="gradeLevelID" name="gradeLevelID" required>
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
            <label for="strandID" class="form-label">Strand</label>
            <select class="form-select" id="strandID" name="strandID">
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

@endsection