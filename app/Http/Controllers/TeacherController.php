<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Teacher.index'); // Ensure this view exists
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'teacherName' => 'required|string|min:3|max:255',
            'specialization' => 'required|string|max:255',
        ]);

        // Mass assignment using an array
        Teacher::create($request->only(['teacherName', 'specialization']));

        return redirect()->route('teachers.index')->with('success', 'Teacher added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('Teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'teacherName' => 'required|string|min:3|max:255',
            'specialization' => 'required|string|max:255',
        ]);

        // Update the teacher's information
        $teacher->update($request->only(['teacherName', 'specialization']));

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {

        // Check if the teacher has any associated subjects
        if ($teacher->subjects()->exists()) {
            return redirect()->route('teachers.index')->with('error', 'Cannot delete teacher with assigned subjects.');
        }

        // Check if the teacher has any associated schedules
        if ($teacher->schedules()->exists()) {
            return redirect()->route('teachers.index')->with('error', 'Cannot delete teacher with assigned schedules.');
        }
        // Delete the teacher
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully!');
    }
}
