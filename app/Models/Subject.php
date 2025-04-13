<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'subjectName',
        'subjectType',
        'gradeLevelID',
        'teacherID',
        'strandID',
    ];

    public function gradeLevel()
    {
        return $this->belongsTo(GradeLevel::class, 'gradeLevelID');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacherID');
    }

    public function strand()
    {
        return $this->belongsTo(Strand::class, 'strandID');
    }
}
