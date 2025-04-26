<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $primaryKey = 'subjectID';

    protected $fillable = [
        'subjectName',
        'subjectType',
        'gradeLevelID',
        'strandID',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function gradeLevel()
    {
        return $this->belongsTo(GradeLevel::class, 'gradeLevelID');
    }


    public function strand()
    {
        return $this->belongsTo(Strand::class, 'strandID');
    }
    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'scheduleID');
    }
}
