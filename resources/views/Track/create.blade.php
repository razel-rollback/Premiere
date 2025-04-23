@extends('layouts.head')

@section('title', 'Tracks')
@section('head')
@endsection
@section('content')
<div class="container-fluid">
    <h1>Tracks</h1>
    <form method="POST" action="{{ route('tracks.store') }}">
        @csrf
        <div class="mb-3">
            <label for="trackName" class="form-label">Track Name</label>
            <input type="text" class="form-control" id="trackName" name="trackName" value="{{ old('trackName') }}">
            @error('trackName')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">save</button>
    </form>
</div>
@endsection