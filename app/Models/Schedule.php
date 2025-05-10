<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules'; // Ensure this matches your database table name
    protected $primaryKey = 'scheduleID'; // Ensure this matches your table's primary key
    public $timestamps = false; // If your table doesn't have `created_at` and `updated_at` columns

    protected $fillable = [
        'sectionID',
        'subjectID',
        'teacherID',
        'timeStart',
        'timeEnd'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function section()
    {
        return $this->belongsTo(Section::class, 'sectionID');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subjectID');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacherID');
    }
    public function getTimeAttribute()
    {
        return date('g:i A', strtotime($this->timeStart)) . ' - ' . date('g:i A', strtotime($this->timeEnd));
    }
}
