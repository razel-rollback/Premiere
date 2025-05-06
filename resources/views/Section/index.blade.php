@extends('layouts.app')

@section('title', 'Sections')

@section('head')
<!-- Add any additional CSS or JS here -->
@endsection

@section('content')
<div class="container-fluid">
    <h1>Section</h1>
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
    @include('Section.create')
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#sectionModal">Add Section</button>
    <table class="table table-striped table-hover table-bordered mt-4 align-middle">
        <thead class="table-dark">
            <tr>
                <th>Section id</th>
                <th>Section Name</th>
                <th>Grade Level</th>
                <th>Strand</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <tbody>
            @forelse($Sections as $section)
            <tr>
                <td>{{ $section->sectionID }}</td>
                <td>{{ $section->sectionName }}</td>
                <td>{{ $section->gradeLevel->gradeLevelName }}</td>
                <td>{{ $section->strand->strandName }}</td>
                <td>
                    @include('Section.edit', ['section' => $section])
                    <a class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editsectionModal{{ $section->sectionID }}">Edit</a>
                    <form action="{{ route('sections.destroy', $section->sectionID) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No sections available.</td>
            </tr>
            @endforelse
        </tbody>
        </tbody>
    </table>
</div>
@endsection