<?php

namespace App\Http\Controllers;

use App\Models\Strand;
use App\Models\Track;
use Illuminate\Http\Request;

class StrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $strands = Strand::all();
        return view('Strand.index', compact('strands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tracks = Track::all(); // Fetch all tracks
        return view('Strand.create', compact('tracks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'strandName' => 'required|min:3',
            'trackID' => 'required|exists:tracks,trackID',
        ]);

        // Explicitly map the request data to the Strand model
        Strand::create([
            'strandName' => $request->input('strandName'),
            'trackID' => $request->input('trackID'),
        ]);

        return redirect()->route('strands.index')->with('success', 'Strand created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Strand $strand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Strand $strand)
    {
        $tracks = Track::all(); // Fetch all tracks
        return view('Strand.edit', compact('strand', 'tracks'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Strand $strand)
    {
        $request->validate([
            'strandName' => 'required|min:3',
            'trackID' => 'required|exists:tracks,trackID',
        ]);

        $strand->update([
            'strandName' => $request->input('strandName'),
            'trackID' => $request->input('trackID'),
        ]);

        return redirect()->route('strands.index')->with('success', 'Strand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Strand $strand)
    {
        // Check if the strand has any associated students
        if ($strand->students()->exists()) {
            return redirect()->route('strands.index')->with('error', 'Cannot delete this strand as it has associated students.');
        }

        // Delete the strand if no students are associated
        $strand->delete();

        return redirect()->route('strands.index')->with('success', 'Strand deleted successfully.');
    }
}
