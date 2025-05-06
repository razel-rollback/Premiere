<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Section;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStudents = Student::count();
        $totalTeachers = Teacher::count();    // Make sure you have a Teacher model
        $totalSections = Section::count();    // Make sure you have a Section model

        // Assuming strandID relates to strand name via a separate table
        // or is stored directly as a string (e.g., STEM, ABM, etc.)
        $strandCounts = Student::join('strands', 'students.strandID', '=', 'strands.strandID')
            ->select('strands.strandName', DB::raw('count(*) as total'))
            ->groupBy('strands.strandName')
            ->pluck('total', 'strands.strandName')
            ->toArray();

        return view('Dashboard.index', compact('totalStudents', 'totalTeachers', 'totalSections', 'strandCounts'));
    }
}
