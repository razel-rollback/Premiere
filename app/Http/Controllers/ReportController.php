<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\GradeLevel;
use App\Models\Strand;
use App\Models\Section;
use App\Models\Register;
use App\Models\Student;

class ReportController extends Controller
{
    public function index()
    {
        $reportTypes = [
            'enrollment_by_grade' => 'Enrollment by Grade Level (11 & 12)',
            'enrollment_by_strand' => 'Enrollment by Strand',
            'enrollment_by_section' => 'Enrollment by Section',
            'pending_vs_approved' => 'Pending vs Approved Enrollments',
            'masterlist_students' => 'Masterlist of Students',
            'students_by_strand_section' => 'List of Students per Strand/Section',
            'registered_unapproved' => 'List of Registered but Unapproved Students'
        ];

        return view('reports.index', compact('reportTypes'));
    }

    public function generate(Request $request)
    {
        $reportType = $request->input('report_type');

        switch ($reportType) {
            case 'enrollment_by_grade':
                return $this->enrollmentByGrade();
            case 'enrollment_by_strand':
                return $this->enrollmentByStrand();
            case 'enrollment_by_section':
                return $this->enrollmentBySection();
            case 'pending_vs_approved':
                return $this->pendingVsApproved();
            case 'masterlist_students':
                return $this->masterlistStudents();
            case 'students_by_strand_section':
                return $this->studentsByStrandSection();
            case 'registered_unapproved':
                return $this->registeredUnapproved();
            default:
                return redirect()->back()->with('error', 'Invalid report type selected.');
        }
    }

    protected function enrollmentByGrade()
    {
        $grades = GradeLevel::whereIn('gradeLevelName', ['11', '12'])
            ->withCount(['students' => function ($query) {
                $query->whereHas('enrollments');
            }])
            ->get();

        return view('reports.results', [
            'title' => 'Enrollment by Grade Level',
            'columns' => ['Grade Level', 'Number of Students'],
            'data' => $grades->map(function ($grade) {
                return [
                    $grade->gradeLevelName,
                    $grade->students_count
                ];
            })
        ]);
    }

    protected function enrollmentByStrand()
    {
        $strands = Strand::withCount(['students' => function ($query) {
            $query->whereHas('enrollments');
        }])
            ->get();

        return view('reports.results', [
            'title' => 'Enrollment by Strand',
            'columns' => ['Strand', 'Number of Students'],
            'data' => $strands->map(function ($strand) {
                return [
                    $strand->strandName,
                    $strand->students_count
                ];
            })
        ]);
    }

    protected function enrollmentBySection()
    {
        $sections = Section::withCount('enrollments')
            ->with(['gradeLevel', 'strand'])
            ->orderBy('gradeLevelID') // Order by grade level first
            ->orderBy('sectionName')  // Then by section name
            ->get();

        return view('reports.results', [
            'title' => 'Enrollment by Section',
            'columns' => ['Section', 'Grade Level', 'Strand', 'Number of Students'],
            'data' => $sections->map(function ($section) {
                return [
                    $section->sectionName,
                    $section->gradeLevel->gradeLevelName ?? 'N/A',
                    $section->strand->strandName ?? 'N/A',
                    $section->enrollments_count
                ];
            })
        ]);
    }

    protected function pendingVsApproved()
    {
        $pending = Register::where('registerStatus', 'pending')->count();
        $approved = Register::where('registerStatus', 'approved')->count();

        return view('reports.results', [
            'title' => 'Pending vs Approved Enrollments',
            'columns' => ['Status', 'Count'],
            'data' => [
                ['Pending', $pending],
                ['Approved', $approved]
            ]
        ]);
    }

    protected function masterlistStudents()
    {
        $students = Student::where('status', 'Enrolled')
            ->with(['gradeLevel', 'strand', 'enrollments.section'])
            ->orderBy('gradeLevelID')    // First by grade level
            ->orderBy('strandID')       // Then by strand
            ->orderBy('lastName')      // Then by last name
            ->orderBy('firstName')     // Then by first name
            ->get();

        return view('reports.results', [
            'title' => 'Masterlist of Enrolled Students',
            'columns' => ['Student ID', 'Name', 'Grade Level', 'Strand', 'Section'],
            'data' => $students->map(function ($student) {
                return [
                    $student->studentID,
                    $student->firstName . ' ' . $student->lastName,
                    $student->gradeLevel->gradeLevelName ?? 'N/A',
                    $student->strand->strandName ?? 'N/A',
                    $student->enrollments->first()->section->sectionName ?? 'N/A'
                ];
            })
        ]);
    }

    protected function studentsByStrandSection()
    {
        $sections = Section::with(['students' => function ($query) {
            $query->orderBy('lastName')
                ->orderBy('firstName');
        }])
            ->with(['strand', 'gradeLevel'])
            ->orderBy('gradeLevelID')    // First by grade level
            ->orderBy('strandID')       // Then by strand
            ->orderBy('sectionName')   // Then by section name
            ->get();

        $data = [];
        foreach ($sections as $section) {
            foreach ($section->students as $student) {
                $data[] = [
                    $student->studentID,
                    $student->firstName . ' ' . $student->lastName,
                    $section->gradeLevel->gradeLevelName ?? 'N/A',
                    $section->strand->strandName ?? 'N/A',
                    $section->sectionName
                ];
            }
        }

        return view('reports.results', [
            'title' => 'Students by Strand/Section',
            'columns' => ['Student ID', 'Name', 'Grade Level', 'Strand', 'Section'],
            'data' => $data
        ]);
    }

    protected function registeredUnapproved()
    {
        $students = Student::whereHas('register', function ($query) {
            $query->where('registerStatus', 'pending');
        })
            ->get();

        return view('reports.results', [
            'title' => 'Registered but Unapproved Students',
            'columns' => ['Student ID', 'Name', 'Grade Level', 'Strand', 'Status'],
            'data' => $students->map(function ($student) {
                return [
                    $student->studentID,
                    $student->firstName . ' ' . $student->lastName,
                    $student->gradeLevel->gradeLevelName ?? 'N/A',
                    $student->strand->strandName ?? 'N/A',
                    'Pending'
                ];
            })
        ]);
    }
}
