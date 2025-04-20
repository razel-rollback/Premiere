@extends('layouts.app')
@section('title', 'Teacher')

@section('head')

@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-3">Teacher</h1>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <a href="{{ route('teachers.create') }}" class="btn btn-primary mb-3">Add Teacher</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Specialization</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->teacherID }}</td>
                        <td>{{ $teacher->teacherName }}</td>
                        <td>{{ $teacher->specialization }}</td>
                        <td>
                            <a href="{{ route('teachers.edit', $teacher->teacherID) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('teachers.destroy', $teacher->teacherID) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    @endsection