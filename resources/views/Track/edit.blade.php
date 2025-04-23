@extends('layouts.head')
@section('title', 'Tracks')
@section('head')
@endsection
@section('content')
<div class="container-fluid">
    <h1>Tracks</h1>
    <form method="POST" action="{{ route('tracks.update', $track) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="trackName" class="form-label">Track Name</label>
            <input type="text" class="form-control" id="trackName" name="trackName" value="{{ $track->trackName }}">
            @error('trackName')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Track</button>
    </form>
</div>
@endsection