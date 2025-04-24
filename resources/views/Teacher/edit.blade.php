@extends('layouts.head')
@section('title', 'Teacher')

@section('head')
@endsection

@section('content')

<div class="container-fluid">
    <h1>Edit Teacher</h1>
    <form method="POST" action="{{ route('teachers.update', $teacher->teacherID) }}">
        @csrf
        @method('PUT') <!-- Specify the HTTP method for updating -->
        <div class="mb-3">
            <label for="idteacherName" class="form-label">Teacher Name</label>
            <input type="text" class="form-control" id="idteacherName" name="teacherName" value="{{ $teacher->teacherName }}">
            @error('teacherName')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="idteacherSpecial" class="form-label">Specialization</label>
            <input type="text" class="form-control" id="idteacherSpecial" name="specialization" value="{{ $teacher->specialization }}">
            @error('specialization')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection