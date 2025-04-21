@extends('layouts.app')
@section('title', 'Grade Levels')
@section('head')
@endsection
@section('content')
<div class="container-fluid">
    <h1>Grade Levels</h1>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @error('trackID')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <a href="{{ route('gradelevels.create') }}" class="btn btn-primary btn-md">Add Grade Level</a>
    <table class="table mt-4">
        <thead>
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
                    <a href="{{ route('gradelevels.edit', $gradeLevel->gradeLevelID) }}" class="btn btn-warning btn-sm">Edit</a>

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