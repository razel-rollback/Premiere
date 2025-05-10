<?php

namespace App\Http\Controllers;

use App\Models\Strand;
use App\Models\Section;
use App\Models\GradeLevel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $Sections = Section::all();
        $strands = Strand::all(); // Retrieve strands
        $gradeLevels = GradeLevel::all();

        return view('Section.index', [
            'Sections' => $Sections,
            'gradeLevels' => $gradeLevels,
            'strands' => $strands,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $gradeLevels = GradeLevel::all(); // Fetch all grade levels
        // $strands = Strand::all(); // Fetch all strands

        // return view('Section.create', compact('gradeLevels', 'strands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sectionName' => 'required|string|max:255',
            'gradeLevelID' => 'required|exists:grade_levels,gradeLevelID',
            'strandID' => 'required|exists:strands,strandID',
            'room' => 'required|unique:sections,room',
        ]);

        try {
            Section::create([
                'sectionName' => $request->sectionName,
                'gradeLevelID' => $request->gradeLevelID,
                'strandID' => $request->strandID,
                'room' => $request->room,
            ]);

            return redirect()->route('sections.index')->with('success', 'Section created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create section. Error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        $strands = Strand::all();
        $gradeLevels = GradeLevel::all();
        return view('Section.edit', compact('section', 'strands', 'gradeLevels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        $request->validate([
            'sectionName' => 'required|string|max:255',
            'gradeLevelID' => 'required|exists:grade_levels,gradeLevelID',
            'strandID' => 'required|exists:strands,strandID',
            'room' => [
                'required',
                Rule::unique('sections', 'room')->ignore($section->sectionID, 'sectionID')
            ],
        ]);

        try {
            $section->update([
                'sectionName' => $request->sectionName,
                'gradeLevelID' => $request->gradeLevelID,
                'strandID' => $request->strandID,
                'room' => $request->room,
            ]);

            return redirect()->route('sections.index')->with('success', 'Section updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update section. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        try {
            // Check if the section is associated with enrollments or schedules
            if ($section->enrollments()->exists() || $section->schedules()->exists()) {
                return redirect()->route('sections.index')->with('error', 'Cannot delete section as it is associated with enrollments or schedules.');
            }

            // Delete the section
            $section->delete();
            return redirect()->route('sections.index')->with('success', 'Section deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('sections.index')->with('error', 'Failed to delete section. Please try again.');
        }
    }
}
