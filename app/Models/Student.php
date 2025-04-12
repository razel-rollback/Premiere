<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /* public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class, 'student_subjects', 'student_id', 'subject_id')
            ->withPivot('grade', 'status', 'remarks')  // extra fields
            ->withTimestamps();
    }*/
}
