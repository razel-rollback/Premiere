<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacherName',
        'specialization',
    ];

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'teacherID');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'teacherID');
    }
}
