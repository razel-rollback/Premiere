@extends('layouts.app')

@section('title', 'Track')

@section('head')
<!-- Add any additional CSS or JS here -->
@endsection

@section('content')
<div class="container-fluid">
    <h1>Tracks</h1>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <a href="{{ route('tracks.create') }}" class="btn btn-primary btn-md">Add track</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Track Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tracks as $track)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $track->trackName }}</td>
                <td>
                    <a href="{{ route('tracks.edit', $track) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form method="POST" action="{{ route('tracks.destroy', $track) }}" style="display:inline;">
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