<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Models\EnrolledStudent;

class EnrolledStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // In StudentAdmissionController or a new EnrolledStudentsController

    public function enrolledStudents()
    {
        // Get all enrolled students with their relationships
        $enrollments = Enrollment::with(['student', 'student.gradeLevel', 'student.strand', 'section'])
            ->whereHas('student', function ($query) {
                $query->where('status', 'Enrolled');
            })
            ->orderBy('created_at', 'desc')
            ->get();

        // Calculate grade level totals
        $grade11Total = Enrollment::whereHas('student', function ($query) {
            $query->where('status', 'Enrolled')
                ->whereHas('gradeLevel', function ($q) {
                    $q->where('gradeLevelName', '11');
                });
        })->count();

        $grade12Total = Enrollment::whereHas('student', function ($query) {
            $query->where('status', 'Enrolled')
                ->whereHas('gradeLevel', function ($q) {
                    $q->where('gradeLevelName', '12');
                });
        })->count();

        return view('StudentAdmission.EnrolledView', compact('enrollments', 'grade11Total', 'grade12Total'));
    }

    public function unenroll(Enrollment $enrollment)
    {
        try {
            // Get the student before deleting enrollment
            $student = $enrollment->student;

            // Delete the enrollment record
            $enrollment->delete();

            // Update student status
            $student->update(['status' => 'Unenrolled']);
            $student->student->register->update(['registerStatus' => 'Unenrolled']);
            return redirect()->route('enrolled.students')
                ->with('success', "Student {$student->firstName} {$student->lastName} has been unenrolled successfully.");
        } catch (\Exception $e) {
            return back()->with('error', 'Error unenrolling student: ' . $e->getMessage());
        }
    }
}
