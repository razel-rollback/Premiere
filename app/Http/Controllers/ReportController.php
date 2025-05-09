<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Payment;
use App\Models\Schedule;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('Report.index');
    }

    public function generate(Request $request)
    {
        $reportType = $request->input('reportType');
        $dates = $request->input('dateRange') ? explode(' - ', $request->input('dateRange')) : [null, null];

        $reportConfig = $this->getReportConfig($reportType, $dates);

        if (!$reportConfig) {
            return redirect()->back()->with('error', 'Invalid report type selected');
        }

        return view('Report.index', [
            'reportTitle' => $reportConfig['title'],
            'reportHeaders' => $reportConfig['headers'],
            'reportData' => $reportConfig['data'],
        ]);
    }

    private function getReportConfig($reportType, $dates)
    {
        $configs = [
            'enrollment_by_grade' => [
                'title' => 'Enrollment by Grade Level',
                'headers' => ['Grade Level', 'Total Students', 'Student Names'],
                'query' => function ($start, $end) {
                    $query = Enrollment::with(['student', 'section.gradeLevel']);
                    if ($start && $end) {
                        $query->whereBetween('dateEnrolled', [$start, $end]);
                    }
                    return $query->get()->groupBy('section.gradeLevel.gradeLevelName');
                },
                'formatter' => function ($data) {
                    return $data->map(function ($items, $grade) {
                        return [
                            $grade,
                            count($items),
                            $items->map(fn($e) => "{$e->student->lastName}, {$e->student->firstName}")->join('<br>')
                        ];
                    })->toArray();
                }
            ],
            // Add all other report configurations similarly
        ];

        if (!array_key_exists($reportType, $configs)) {
            return null;
        }

        $config = $configs[$reportType];
        $data = $config['query']($dates[0], $dates[1]);
        $formattedData = $config['formatter']($data);

        return [
            'title' => $config['title'],
            'headers' => $config['headers'],
            'data' => $formattedData
        ];
    }
}
