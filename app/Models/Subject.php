<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /* public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'student_subjects', 'subject_id', 'student_id')
            ->withPivot('grade', 'status', 'remarks')  // match what's in the pivot
            ->withTimestamps();
    }*/
}
