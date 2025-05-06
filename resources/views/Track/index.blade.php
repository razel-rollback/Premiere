@extends('layouts.app')

<!-- @section('title', 'Tracks') -->

@section('head')
<!-- Add any additional CSS or JS here -->
@endsection

@section('content')
<div class="container-fluid">
    <h1>Track</h1>
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
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#AddTrackModal">
        Add Track
    </button>
    @include('Track.create') <!-- Include the modal for adding a new track -->
    <table class="table table-striped table-hover table-bordered mt-4">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Track Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Tracks as $Track)
            <tr>
                <td>
                    {{ $Track->trackID }}
                </td>
                <td>
                    {{ $Track->trackName }}
                </td>
                <td>
                    <button type="button" class="btn btn-warning me-1" data-bs-toggle="modal" data-bs-target="#EditTrackModal{{ $Track->trackID }}">
                        Edit
                    </button>
                    <form method="POST" action="{{ route('tracks.destroy', $Track->trackID) }}" style="display:inline;" class="mb-3">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <!-- Include the Modal -->
                    @include('Track.edit', ['Track' => $Track])


            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection