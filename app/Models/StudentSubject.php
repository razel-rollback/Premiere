<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSubject extends Model
{
    use HasFactory;

    protected $primaryKey = 'studentID';

    protected $fillable = [
        'studentID',
        'subjectID',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
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
