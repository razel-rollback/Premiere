@extends('layouts.app')

@section('title', 'Grade Levels')

@section('head')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<style>
    :root {
        --primary: #4361ee;
        --primary-light: #ebf1ff;
        --secondary: #3f37c9;
        --success: #4cc9f0;
        --danger: #f72585;
        --warning: #f8961e;
        --info: #3a0ca3;
        --light: #f8f9fa;
        --dark: #212529;
        --border-radius: 0.5rem;
        --transition: all 0.3s ease;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .page-title {
        font-size: 1.75rem;
        font-weight: 600;
        color: var(--dark);
        margin: 0;
    }

    .btn-add {
        background-color: var(--primary);
        color: white;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-add:hover {
        background-color: var(--secondary);
        color: white;
    }

    .grade-levels-table {
        width: 100%;
        background: white;
        border-radius: var(--border-radius);
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        border-collapse: collapse;
        padding: 1rem;
    }

    .grade-levels-table th {
        background-color: var(--primary);
        color: white;
        font-weight: 500;
        padding: 1rem;
        text-align: left;
    }

    .grade-levels-table td {
        vertical-align: middle;
        padding: 1rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
    }

    .btn-edit {
        background-color: var(--warning);
        color: white;
    }

    .btn-delete {
        background-color: var(--danger);
        color: white;
    }

    .badge-id {
        background-color: var(--primary-light);
        color: var(--primary);
        padding: 0.25rem 0.5rem;
        border-radius: 0.25rem;
        font-weight: 600;
    }

    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .action-buttons {
            flex-direction: column;
        }
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <h1 class="page-title">Grade Levels</h1>
        <button href="#" class="btn btn-add" data-bs-toggle="modal" data-bs-target="#gradeLevelModal">
            <i class="bi bi-plus-lg"></i>
            Add Grade Level
        </button>
    </div>

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @error('trackID')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @enderror

    @include('GradeLevel.create')

    <div class="grade-levels-table ">
        <div class="table-responsive">
            <table class="table table-hover align-middle" id="linktable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Grade Level Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gradeLevels as $gradeLevel)
                    <tr>
                        <td><span class=" badge-id">{{ $gradeLevel->gradeLevelID }}</span></td>
                        <td>{{ $gradeLevel->gradeLevelName }}</td>
                        <td>
                            <div class="action-buttons">
                                <button type="button" class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#EditGradeLevelModal{{ $gradeLevel->gradeLevelID }}">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </button>

                                @include('GradeLevel.edit', ['gradeLevel' => $gradeLevel])

                                <form method="POST" action="{{ route('gradelevels.destroy', $gradeLevel->gradeLevelID) }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this grade level?')">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection