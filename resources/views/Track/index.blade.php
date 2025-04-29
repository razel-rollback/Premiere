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
    <!-- <a href="{{ route('tracks.create') }}" class="btn btn-primary btn-md"> -->
    <a href="#"> Add track</a>
    <table class="table table-striped table-hover table-bordered mt-4 align-middle">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Track Name</th>
                <th>Track Name</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach($Tracks as $Track) --}}
            <tr>
                {{-- <td>{{ $Track->TrackID }}</td>
                <td>{{ $Track->TrackName }}</td>
                <td>{{ $Track->track->trackName }}</td> --}}

                <td>1</td>
                <td>Academics</td>
                <td>Academics?</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Technical Vocational</td>
                <td>Technical Vocational?</td>

                <td class="text-center">
                    {{-- <a href="{{ route('Tracks.edit', $Track->TrackID) }}" class="btn btn-warning btn-sm me-1">--}}
                    <a href="#" class="btn btn-warning btn-sm me-1">
                        Edit
                    </a>
                    {{-- <form method="POST" action="{{ route('Tracks.destroy', $Track->TrackID) }}" class="d-inline"> --}}
                    {{-- @csrf
        @method('DELETE') --}}
                    <button type="submit" class="btn btn-danger btn-sm">
                        Delete
                    </button>
                </td>
            </tr>
            {{-- @endforeach --}}

        </tbody>
    </table>

</div>
@endsection