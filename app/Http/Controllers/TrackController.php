<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{

    public function index()
    {
        $tracks = Track::all();
        return view('Track.index', compact('tracks'));
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

    public function update(Request $request, Track $track)
    {
        $request->validate([
            'trackName' => 'required|min:3',
        ]);

        $track->update($request->all());
        return redirect()->route('tracks.index')->with('success', 'Track updated successfully.');
    }

    public function destroy(Track $track)
    {
        if ($track->strands()->exists()) {
            return redirect()->route('tracks.index')->with('error', 'Cannot delete track with associated strands.');
        }
        $track->delete();
        return redirect()->route('tracks.index')->with('success', 'Track deleted successfully.');
    }
}
