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
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function gradeLevel()
    {
        return $this->belongsTo(GradeLevel::class, 'gradeLevelID');
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
