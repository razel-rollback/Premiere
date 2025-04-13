<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSubject extends Model
{
    use HasFactory;

    protected $fillable = [
        'studentID',
        'subjectID',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'studentID');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subjectID');
    }
}
