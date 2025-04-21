<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $primaryKey = 'enrollmentID';

    protected $fillable = [
        'studentID',
        'sectionID',
        'AcademicYear',
        'dateEnrolled',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'studentID');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'sectionID');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'enrollmentID');
    }
}
