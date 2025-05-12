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
        $teachers = Teacher::all();
        return view('Teacher.index', compact('teachers'));
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

    public function store(Request $request)
    {
        $request->validate([
            'teacherName' => 'required|string|min:3|max:255',
            'specialization' => 'required|string|max:255',
        ]);
        Teacher::create($request->only(['teacherName', 'specialization']));

        return redirect()->route('teachers.index')->with('success', 'Teacher added successfully!');
    }
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'teacherName' => 'required|string|min:3|max:255',
            'specialization' => 'required|string|max:255',
        ]);
        $teacher->update($request->only(['teacherName', 'specialization']));

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully!');
    }

    public function destroy(Teacher $teacher)
    {
        if ($teacher->schedules()->exists()) {
            return redirect()->route('teachers.index')->with('error', 'Cannot delete teacher with assigned schedules.');
        }
        // Delete the teacher
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully!');
    }
}
