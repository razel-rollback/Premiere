<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'gradeLevelName',
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'gradeLevelID');
    }

    public function sections()
    {
        return $this->hasMany(Section::class, 'gradeLevelID');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'gradeLevelID');
    }
}
