@extends('layouts.head')
@section('title', 'Teacher')

@section('head')

@endsection

@section('content')

<div class="container-fluid">
    <h1>Teacher</h1>
    <form method="POST" action="{{ route('teachers.store') }}">
        @csrf
        <div class="mb-3">
            <label for="idteacherName" class="form-label">Teacher Name</label>
            <input type="text" class="form-control" id="idteacherName" name="teacherName" value="{{ old('teacherName') }}">
            @error('teacherName')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="idteacherSpecial" class="form-label">Specialization</label>
            <input type="text" class="form-control" id="idteacherSpecial" name="specialization" value="{{ old('specialization') }}">
            @error('specialization')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">save</button>
    </form>
</div>
@endsection