<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $primaryKey = 'sectionID'; // Specify the primary key column  

    protected $fillable = [
        'sectionName',
        'gradeLevelID',
        'strandID',
        'room',
        'max_capacity'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'sectionID');
    }
    public function students()
    {
        return $this->hasManyThrough(
            Student::class,
            Enrollment::class,
            'sectionID', // Foreign key on enrollments table
            'studentID', // Foreign key on students table
            'sectionID', // Local key on sections table
            'studentID'  // Local key on enrollments table
        );
    }
    public function gradeLevel()
    {
        return $this->belongsTo(GradeLevel::class, 'gradeLevelID', 'gradeLevelID');
    }

    public function strand()
    {
        return $this->belongsTo(Strand::class, 'strandID');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'sectionID');
    }
}
