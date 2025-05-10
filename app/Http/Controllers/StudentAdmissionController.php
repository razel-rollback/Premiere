<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\Enrollment;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\StudentAdmission;
use App\Services\SectionAssignmentService;

class StudentAdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch only student admissions with status "Pending"
        $registers = Register::where('registerStatus', 'Pending')
            ->orderBy('created_at', 'desc')
            ->get();

        $grade11PendingTotal = Register::where('registerStatus', 'Pending')
            ->whereHas('student', function ($query) {
                $query->whereHas('gradeLevel', function ($q) {
                    $q->where('gradeLevelName', '11');
                });
            })
            ->count();

        // Calculate pending enrollments for Grade 12
        $grade12PendingTotal = Register::where('registerStatus', 'Pending')
            ->whereHas('student', function ($query) {
                $query->whereHas('gradeLevel', function ($q) {
                    $q->where('gradeLevelName', '12');
                });
            })
            ->count();


        // foreach ($register as $reg) {
        //     dd($reg->student); // This will output the first student's related data
        // }
        return view('StudentAdmission.StudentAdmissionView', compact(
            'registers',
            'grade11PendingTotal',
            'grade12PendingTotal'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function accept(Request $request, $registerId)
    {
        // 1. Find the registration record with relationships
        $register = Register::with(['student', 'student.strand', 'student.gradeLevel'])
            ->findOrFail($registerId);

        // 2. Verify student isn't already enrolled
        if ($register->student->status === 'Enrolled') {
            return back()->with('error', 'This student is already enrolled');
        }
        // 3. Auto-generate academic year (2025-2026 as shown in your view)
        $academicYear = now()->year . '-' . (now()->year + 1);


        try {

            $sectionAssignment = new SectionAssignmentService();
            $section = $sectionAssignment->assignSection(
                $register->student->gradeLevel->gradeLevelID,
                $register->student->strand->strandID
            );
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        // 4. Assign to a section based on grade level and strand

        //6. Update student record
        $register->student->update([
            'studentID' => $register->student->studentID,
            'status' => 'Enrolled'
        ]);

        // 7. Create official enrollment record
        $enrollment = Enrollment::create([
            'studentID' => $register->student->studentID,
            'sectionID' => $section->sectionID,
            'AcademicYear' => $academicYear,
            'dateEnrolled' => now()
        ]);

        $enrollment = Payment::create([
            'enrollmentID' => $enrollment->enrollmentID,
            'amountPaid' => '0',
            'totalFee' => '20000',
            'paymentMethod' => 'Unset',
            'paymentType' => 'Tuition Fee',
            'paymentDate' => now(),
            'paymentStatus' => 'Pending',
        ]);

        //8. Update registration status
        $register->update([
            'registerStatus' => 'Approved',
        ]);

        return redirect()->route('route.student.admission')
            ->with(
                'success',
                "Successfully enrolled {$register->student->firstName} {$register->student->lastName} " .
                    "in {$section->sectionName} for S.Y.{$academicYear}"
            );
    }

    public function reject(Request $request, $registerId)
    {
        // Find the register entry
        $register = Register::with('student')->findOrFail($registerId);

        // Update status to 'Rejected'
        $register->update([
            'registerStatus' => 'Rejected',
        ]);

        return redirect()->route('route.student.admission')
            ->with('unsuccess', "Admission for {$register->student->firstName} {$register->student->lastName} has been rejected.");
    }
}
