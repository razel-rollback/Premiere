<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{

    public function index()
    {
        $Tracks = Track::all();
        return view('Track.index', compact('Tracks'));
    }

    public function create()
    {
        return view('Track.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'trackName' => 'required|min:3', // Corrected field name
        ]);

        Track::create($request->all()); // Save trackName
        return redirect()->route('tracks.index')->with('success', 'Track created successfully.');
    }

    public function show(Track $tracks)
    {
        return view('Track.show', compact('tracks'));
    }

    public function edit(Track $track)
    {
        return view('Track.edit', compact('track'));
    }

    public function update(Request $request, Track $tracks)
    {
        $request->validate([
            'trackName' => 'required|min:3',
        ]);

        $tracks->update($request->all());
        return redirect()->route('tracks.index')->with('success', 'Track updated successfully.');
    }

    public function destroy(Track $tracks)
    {
        if ($tracks->strands()->exists()) {
            return redirect()->route('tracks.index')->with('error', 'Cannot delete track with associated strands.');
        }
        $tracks->delete();
        return redirect()->route('tracks.index')->with('success', 'Track deleted successfully.');
    }
}
