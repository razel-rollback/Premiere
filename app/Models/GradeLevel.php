<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeLevel extends Model
{
    use HasFactory;


    protected $table = 'grade_levels'; // Ensure this matches your database table name
    protected $primaryKey = 'gradeLevelID'; // Ensure this matches your table's primary key

    protected $fillable = [
        'gradeLevelName',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
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
