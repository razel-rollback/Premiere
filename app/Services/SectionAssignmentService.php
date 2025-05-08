<?php

namespace App\Services;

use App\Models\Section;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SectionAssignmentService
{
    /**
     * Assign student to optimal section (fills sections to capacity before moving to next)
     */

    /* 
public function assignSection(int $gradeLevelId, ?int $strandId = null): Section
{
    $sections = Section::withCount(['enrollments as current_enrollment'])
        ->where('gradeLevelID', $gradeLevelId)
        ->when($strandId, fn($q) => $q->where('strandID', $strandId), 
              fn($q) => $q->whereNull('strandID'))
        ->orderBy('current_enrollment')
        ->get();

    foreach ($sections as $section) {
        // Strict fill-to-capacity before moving on
        if (is_null($section->max_capacity) || 
            $section->current_enrollment < $section->max_capacity) {
            return $section;
        }
    }
    
    throw new \Exception("All sections are full");
}
     */
    public function assignSection(int $gradeLevelId, ?int $strandId = null): Section
    {
        // First fetch grade and strand names for error messages
        $gradeName = \App\Models\GradeLevel::find($gradeLevelId)?->gradeLevelName ?? 'Unknown Grade';
        $strandName = $strandId
            ? \App\Models\Strand::find($strandId)?->strandName ?? 'Unknown Strand'
            : null;

        // Get all eligible sections with their current enrollment count
        $sections = Section::select([
            'sections.*',
            DB::raw('(SELECT COUNT(*) FROM enrollments WHERE enrollments.sectionID = sections.sectionID) as current_enrollment')
        ])
            ->where('gradeLevelID', $gradeLevelId)
            ->when($strandId, function ($query) use ($strandId) {
                return $query->where('strandID', $strandId);
            }, function ($query) {
                return $query->whereNull('strandID');
            })
            ->orderBy('current_enrollment')
            ->orderBy('sectionName')
            ->get();

        if ($sections->isEmpty()) {
            throw new \Exception("No sections available for Grade Level: $gradeName" . ($strandId ? " and Strand: $strandName" : ""));
        }

        // Find the first section that has room
        foreach ($sections as $section) {
            if (is_null($section->max_capacity) || $section->current_enrollment < $section->max_capacity) {
                return $section;
            }
        }

        // If all sections are full
        throw new \Exception("All sections are at full capacity for Grade Level: $gradeLevelId" . ($strandId ? " and Strand: $strandId" : ""));
    }
}
