@extends('layouts.head')
@section('title', 'Grade Level')
@section('head')
@endsection
@section('content')
<div class="container-fluid">
    <h1>Grade Level</h1>
    <form method="POST" action="{{ route('gradelevels.store') }}">
        @csrf
        <div class="mb-3">
            <label for="idgrd" class="form-label">Grade Level Name</label>
            <input type="text" class="form-control" id="idgrd" name="gradeName" value="{{ old('gradeName') }}">
            @error('gradeName')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">save</button>
    </form>
</div>

@endsection