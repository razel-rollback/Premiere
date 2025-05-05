@extends('layouts.app')
@section('title', 'Teacher')

@section('head')

@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-3">Teacher</h1>
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
            @include('Teacher.create')
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#TeacherModal">
                Add Teacher
            </button>

            <table class="table table-striped table-hover table-bordered mt-4 align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Specialization</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->teacherID }}</td>
                        <td>{{ $teacher->teacherName }}</td>
                        <td>{{ $teacher->specialization }}</td>
                        <td>
                            <button type="button" class="btn btn-warning  me-1" data-bs-toggle="modal" data-bs-target="#EditTeacherModal{{ $teacher->teacherID }}">
                                Edit
                            </button>
                            @include('Teacher.edit', ['teacher' => $teacher])

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
</div>

@endsection