@extends('layouts.app')
@section('title', 'Grade Levels')
@section('head')
@endsection
@section('content')
<div class="container-fluid">
    <h1>Grade Levels</h1>
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @error('trackID')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @include('GradeLevel.create')
    <a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#gradeLevelModal">Add Grade Level</a>
    <table class="table table-striped table-hover table-bordered mt-4 align-middle">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Grade Level Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($gradeLevels as $gradeLevel)
            <tr>
                <td>{{ $gradeLevel->gradeLevelID }}</td>
                <td>{{ $gradeLevel->gradeLevelName }}</td>
                <td>
                    <button type="button" class="btn btn-warning me-1" data-bs-toggle="modal" data-bs-target="#EditGradeLevelModal{{ $gradeLevel->gradeLevelID }}">
                        Edit
                    </button>

                    <!-- Pass the correct variable name -->
                    @include('GradeLevel.edit', ['gradeLevel' => $gradeLevel])

                    <form method="POST" action="{{ route('gradelevels.destroy', $gradeLevel->gradeLevelID) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection