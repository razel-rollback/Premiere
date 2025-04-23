@extends('layouts.app')

@section('title', 'Strands')

@section('head')

@endsection

@section('content')
<div class="container-fluid">
    <h1>Strand</h1>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <a href="{{ route('strands.create') }}" class="btn btn-primary btn-md">Add track</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Strand Name</th>
                <th>Track Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($strands as $strand)
            <tr>
                <td>{{ $strand->strandID }}</td>
                <td>{{ $strand->strandName }}</td>
                <td>{{ $strand->track->trackName }}</td>
                <td>
                    <a href="{{ route('strands.edit', $strand->strandID) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form method="POST" action="{{ route('strands.destroy', $strand->strandID) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>


                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection