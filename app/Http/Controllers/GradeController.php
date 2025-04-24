<?php

namespace App\Http\Controllers;

use App\Models\GradeLevel;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all grade levels from the database
        $gradeLevels = GradeLevel::all(); // Uncomment this line when you have a GradeLevel model

        return view('GradeLevel.index', compact('gradeLevels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('GradeLevel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'gradeName' => 'required',
        ]);

        // Create a new grade level using the validated data
        GradeLevel::create([
            'gradeLevelName' => $request->input('gradeName'),
        ]);

        return redirect()->route('gradelevels.index')->with('success', 'Grade Level created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(GradeLevel $gradeName) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GradeLevel $gradelevel)
    {
        return view('GradeLevel.edit', compact('gradelevel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GradeLevel $gradelevel)
    {
        $request->validate([
            'gradeName' => 'required',
        ]);

        // Update the grade level using the validated data
        $gradelevel->update([
            'gradeLevelName' => $request->input('gradeName'),
        ]);

        return redirect()->route('gradelevels.index')->with('success', 'Grade Level Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GradeLevel $gradelevel)
    {
        if ($gradelevel->students()->exists()) {
            return redirect()->route('gradelevels.index')->with('error', 'Cannot delete this Grade level as it has associated students.');
        }
        if ($gradelevel->sections()->exists()) {
            return redirect()->route('gradelevels.index')->with('error', 'Cannot delete this Grade level as it has associated sections.');
        }

        // Delete the grade level if no students are associated
        $gradelevel->delete();

        return redirect()->route('gradelevels.index')->with('success', 'Grade deleted successfully.');
    }
}
