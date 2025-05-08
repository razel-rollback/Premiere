<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\GradeLevel;
use App\Models\Strand;


class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::all();
        $gradeLevels = GradeLevel::all();
        $strands = Strand::all();

        return view('schedule.index', compact('sections', 'gradeLevels', 'strands'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'scheduleID' => 'required|unique:schedules,scheduleID|max:255',
            'subjectID' => 'required|exists:subjects,id',
            'sectionID' => 'required|exists:sections,id',
            'teacherID' => 'required|exists:teachers,id',
            'timeStart' => 'required|date_format:H:i',
            'timeEnd' => 'required|date_format:H:i|after:time_start',
            'RoomNum' => 'required|max:255',
        ]);

        Schedule::create([
            'scheduleID' => $request->input('scheduleID'),
            'subjectID' => $request->input('subjectID'),
            'sectionID' => $request->input('sectionID'),
            'teacherID' => $request->input('teacherID'),
            'timeStart' => $request->input('timeStart'),
            'timeEnd' => $request->input('timeEnd'),
            'RoomNum' => $request->input('RoomNum'),
        ]);

        Schedule::create($validated);

        return redirect()->route('schdules.index')->with('success', 'schedule created successfully!');
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
