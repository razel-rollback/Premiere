@extends('layouts.head')

@section('title', 'Edit Strand')
@section('head')
@endsection
@section('content')
<div class="container-fluid">
    <h1>Edit Strand</h1>
    @error('trackID')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <form method="POST" action="{{ route('strands.update', $strand->strandID) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="strandName" class="form-label">Strand Name</label>
            <input type="text" class="form-control" id="strandName" name="strandName" value="{{ old('strandName', $strand->strandName) }}" required>
        </div>
        <div class="mb-3">
            <label for="trackID" class="form-label">Track Name</label>
            <select class="form-select" id="trackID" name="trackID" required>
                @foreach($tracks as $track)
                <option value="{{ $track->trackID }}" {{ (old('trackID', $strand->trackID) == $track->trackID) ? 'selected' : '' }}>{{ $track->trackName }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Update</button>
    </form>
    <a href="{{ route('strands.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection