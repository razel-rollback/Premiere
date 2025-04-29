@extends('layouts.app')

@section('title', 'Strands')

@section('head')

@endsection

@section('content')
<div class="container-fluid">
    <h1>Strand</h1>
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
    @include('Strand.create', ['tracks' => $tracks])
    <table class="table table-striped table-hover table-bordered mt-4 align-middle">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Strand Name</th>
                <th>Track Name</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($strands as $strand)
            <tr>
                <td>{{ $strand->strandID }}</td>
                <td>{{ $strand->strandName }}</td>
                <td>{{ $strand->track->trackName }}</td>
                <td class="text-center">
                    <button type="button" class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#editStrandModal{{ $strand->strandID }}">
                        Edit
                    </button>
                    @include('Strand.edit', ['strand' => $strand, 'tracks' => $tracks])
                    <form method="POST" action="{{ route('strands.destroy', $strand->strandID) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection