@extends('layouts.head')

@section('title', 'Strand')
@section('head')
@endsection
@section('content')
<div class="container-fluid">
    <h1>Strand</h1>
    <form method="POST" action="{{ route('strands.store') }}">
        @csrf
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
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection