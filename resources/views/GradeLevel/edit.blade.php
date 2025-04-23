@extends('layouts.head')
@section('title', 'Grade Level')
@section('head')
@endsection
@section('content')
<div class="container-fluid">
    <h1> Edit Grade Level</h1>
    <form method="POST" action="{{ route('gradelevels.update', ['gradelevel' => $gradelevel->gradeLevelID]) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="idgrd" class="form-label">Grade Level Name</label>
            <input type="text" class="form-control" id="idgrd" name="gradeName" value="{{ $gradelevel->gradeLevelName }}">
            @error('gradeName')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">save</button>
    </form>
</div>

@endsection