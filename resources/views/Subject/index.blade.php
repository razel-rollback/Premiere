@extends('layouts.app')

@section('title', 'Subjects')

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
        padding: 0.5rem 1rem;
        border-radius: var(--border-radius);
    }

    .btn-add:hover {
        background-color: var(--secondary);
        color: white;
        transform: translateY(-2px);
    }

    .subjects-table {
        background: white;
        border-radius: var(--border-radius);
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        padding: 1rem;
    }

    .subjects-table th {
        background-color: var(--primary);
        color: white;
        font-weight: 500;
        padding: 1rem;
    }

    .subjects-table td {
        vertical-align: middle;
        padding: 1rem;
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
    }

    .btn-edit {
        background-color: var(--warning);
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: var(--border-radius);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-delete {
        background-color: var(--danger);
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: var(--border-radius);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* Form and modal styles */
    .modal-content {
        border-radius: var(--border-radius);
        border: none;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }

    .modal-title {
        font-weight: 600;
        margin: 0;
    }

    .modal-body {
        padding: 1.5rem;
    }

    .form-label {
        font-weight: 500;
        margin-bottom: 0.5rem;
        color: var(--dark);
    }

    .form-control {
        border-radius: var(--border-radius);
        border: 1px solid #ced4da;
        padding: 0.5rem 0.75rem;
        transition: var(--transition);
    }

    .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25);
    }

    .badge-pill {
        background-color: var(--primary-light);
        color: var(--primary);
        padding: 0.25rem 0.75rem;
        border-radius: 50rem;
        font-weight: 600;
        font-size: 0.8rem;
    }

    .badge-type {
        background-color: #e2f3fb;
        color: #0d6efd;
        padding: 0.25rem 0.75rem;
        border-radius: 50rem;
        font-size: 0.8rem;
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
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1 class="page-title">Subjects Management</h1>
                <button href="#" class="btn btn-add" data-bs-toggle="modal" data-bs-target="#subjectModal">
                    <i class="bi bi-plus-lg"></i>
                    Add Subject
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
            @include('Subject.create', ['gradeLevels' => $gradeLevels, 'strands' => $strands])

            <div class="subjects-table ">
                <div class="table-responsive">
                    <table class="table table-hover align-middle" id="linktable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Subject Name</th>
                                <th>Type</th>
                                <th>Grade Level</th>
                                <th>Strand</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subjects as $subject)
                            <tr>
                                <td><span class="badge-pill">{{ $subject->subjectID }}</span></td>
                                <td>{{ $subject->subjectName }}</td>
                                <td><span class="badge-type">{{ $subject->subjectType }}</span></td>
                                <td>{{ $subject->gradeLevel->gradeLevelName }}</td>
                                <td>{{ $subject->strand?->strandName ?? 'N/A' }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <button type="button" class="btn-edit" data-bs-toggle="modal" data-bs-target="#subjectModal{{ $subject->subjectID }}">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </button>
                                        @include('Subject.edit', ['subject' => $subject, 'gradeLevels' => $gradeLevels, 'strands' => $strands])
                                        <form action="{{ route('subjects.destroy', $subject->subjectID) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete" onclick="return confirm('Are you sure you want to delete this subject?')">
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
    </div>
</div>
@endsection