@extends('layouts.app')

@section('title', 'Subject')

@section('head')

@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Subject </h1>
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
            <a href="{{ route('subjects.create') }}" class="btn btn-primary mb-3">Add Subject</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Subject Name</th>
                        <th>Subject Type</th>
                        <th>Grade Level</th>
                        <th>Strand</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subjects as $subject)
                    <tr>
                        <td>{{ $subject->subjectID }}</td>
                        <td>{{ $subject->subjectName }}</td>
                        <td>{{ $subject->subjectType }}</td>
                        <td>{{ $subject->gradeLevel->gradeLevelName }}</td>
                        <td>{{ $subject->strand->strandName }}</td>
                        <td>
                            <a href="{{ route('subjects.edit', $subject->subjectID) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('subjects.destroy', $subject->subjectID) }}" method="POST" style="display:inline;">
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