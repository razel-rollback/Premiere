<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\GradeLevel;
use App\Models\Strand;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Facades\Log;


class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $schedules = Schedule::select(
            'schedules.*',
            'sections.sectionName as sectionName',
            'subjects.subjectName as subjectName',
            'teachers.teacherName as teacherName'
        )
            ->join('sections', 'schedules.sectionID', '=', 'sections.sectionID')
            ->join('subjects', 'schedules.subjectID', '=', 'subjects.subjectID')
            ->join('teachers', 'schedules.teacherID', '=', 'teachers.teacherID')
            ->get();

        $sections = Section::all(); // Add this line
        $subjects = Subject::all(); // Add this line
        $teachers = Teacher::all(); // Add this line

        return view('schedule.index', compact('schedules', 'sections', 'subjects', 'teachers'));
    }

    public function getSubjectsByStrand($strandId)
    {
        // Verify the strand exists
        if (!\App\Models\Strand::find($strandId)) {
            return response()->json(['error' => 'Strand not found'], 404);
        }

        // Get subjects with their full data
        $subjects = Subject::where('strandID', $strandId)
            ->select('subjectID', 'subjectName')
            ->get();

        return response()->json($subjects);
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections = Section::all(); // Fetch all sections
        $subjects = Subject::all(); // Fetch all subjects
        $teachers = Teacher::all(); // Fetch all teachers

        return view('Schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::debug('Schedule Store Request:', $request->all());

        $validated = $request->validate([
            'sectionID' => 'required|exists:sections,sectionID',
            'subjectID' => 'required|exists:subjects,subjectID',
            'teacherID' => 'required|exists:teachers,teacherID',
            'timeStart' => 'required|date_format:H:i',
            'timeEnd' => 'required|date_format:H:i|after:timeStart',
        ]);

        Log::debug('Validated Data:', $validated);

        try {
            $schedule = Schedule::create([
                'sectionID' => $validated['sectionID'],
                'subjectID' => $validated['subjectID'],
                'teacherID' => $validated['teacherID'],
                'timeStart' => $validated['timeStart'],
                'timeEnd' => $validated['timeEnd']
            ]);

            Log::debug('Created Schedule:', $schedule->toArray());

            return redirect()->route('schedules.index')->with('success', 'Schedule created successfully!');
        } catch (\Exception $e) {
            Log::error('Schedule Creation Error:', ['error' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Error creating schedule: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
