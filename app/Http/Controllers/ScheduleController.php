<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with('section')->get();
        $sections = Section::all();
        return view('Schedule.index', compact('schedules', 'sections'));
    }

    public function create()
    {
        $subjects = Subject::all();
        $sections = Section::all();
        $teachers = Teacher::all();
        return view('Schedule.create', compact('subjects', 'sections', 'teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subjectID' => 'required|exists:subjects,subjectID',
            'sectionID' => 'required|exists:sections,sectionID',
            'teacherID' => 'required|exists:teachers,teacherID',
            'timeSlot' => 'required',

        ]);

        // Extract start and end times from the timeSlot

        // Create the schedule
        Schedule::create([
            'subjectID' => $request->subjectID,
            'sectionID' => $request->sectionID,
            'teacherID' => $request->teacherID,
            'timeSlot' => $request->timeSlot,
        ]);

        return redirect()->route('schedules.create')->with('success', 'Schedule created successfully.');
    }

    public function getSchedule($sectionID)
    {
        $schedules = Schedule::where('sectionID', $sectionID)
            ->with('subject', 'teacher') // Assuming you have relationships set up
            ->get();

        return response()->json($schedules);
    }
}
