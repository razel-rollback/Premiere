<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $primaryKey = 'scheduleID';
    protected $fillable = [
        'subjectID',
        'sectionID',
        'teacherID',
        'timeStart',
        'timeEnd',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subjectID', 'subjectID');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'sectionID', 'sectionID');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacherID', 'teacherID');
    }
}
