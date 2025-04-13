<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'subjectID',
        'sectionID',
        'teacherID',
        'timeStart',
        'timeEnd',
        'RoomNum',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subjectID');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'sectionID');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacherID');
    }
}
