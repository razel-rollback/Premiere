<?php

namespace App\Http\Controllers;

use App\Models\Strand;
use App\Models\Subject;
use App\Models\GradeLevel;
use Illuminate\Http\Request;

class SubjectController extends Controller
{


    public function index()
    {
        $subjects = Subject::all();
        $gradeLevels = GradeLevel::all();
        $strands = Strand::all();


        return view('Subject.index', compact('subjects', 'gradeLevels', 'strands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $strands = Strand::all();
        $gradeLevels = GradeLevel::all();
        return view('Subject.create', compact('strands', 'gradeLevels'));
    }

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        // Retrieve related data for dropdowns
        $strands = Strand::all(); // Fetch all strands for the dropdown
        $gradeLevels = GradeLevel::all(); // Fetch all grade levels for the dropdown

        // Pass the subject and related data to the view
        return view('Subject.edit', [
            'subject' => $subject,
            'strands' => $strands,
            'gradeLevels' => $gradeLevels,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */


    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'subjectName' => 'required|string|max:255',
            'subjectType' => 'required|string|in:Core,Advanced,Specialized',
            'gradeLevelID' => 'required|exists:grade_levels,gradeLevelID',
            'strandID' => 'nullable|exists:strands,strandID',
        ]);

        // Create the subject
        Subject::create($request->only(['subjectName', 'subjectType', 'gradeLevelID', 'teacherID', 'strandID']));

        // Redirect with success message
        return redirect()->route('subjects.index')->with('success', 'Subject created successfully!');
    }
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'subjectName' => 'required|string|max:255',
            'subjectType' => 'required|string|in:Core,Advanced,Specialized',
            'gradeLevelID' => 'required|exists:grade_levels,gradeLevelID',
            'strandID' => 'nullable|exists:strands,strandID',
        ]);

        $subject->update($request->only(['subjectName', 'subjectType', 'gradeLevelID', 'teacherID', 'strandID']));

        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully!');
    }
    public function destroy(Subject $subject)
    {
        if ($subject->schedules()->exists()) {
            return redirect()->route('subjects.index')->with('error', 'Cannot delete subject with associated schedules.');
        }
        $subject->delete();
        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully!');
    }
}
