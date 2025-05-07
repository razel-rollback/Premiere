<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = 'studentID'; // Primary key column

    protected $fillable = [
        'firstName',
        'middleName',
        'lastName',
        'suffixName',
        'birthDate',
        'gender',
        'address',
        'contactNumber',
        'email',
        'status',
        'gradeLevelID',
        'roleID',
        'strandID',
        'guardianID',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // A student belongs to a grade level
    public function gradeLevel()
    {
        return $this->belongsTo(GradeLevel::class, 'gradeLevelID');
    }
    // A student belongs to a strand
    public function strand()
    {
        return $this->belongsTo(Strand::class, 'strandID');
    }
    public function role()
    {
        return $this->belongsTo(Role::class, 'roleID');
    }

    // Relationships
    public function guardian()
    {
        return $this->belongsTo(Guardian::class, 'guardianID', 'guardianID');
    }
    // A student has one register record
    public function register()
    {
        return $this->hasOne(Register::class, 'studentID');
    }

    // A student has many documents
    public function documents()
    {
        return $this->hasMany(StudentDocument::class, 'studentID');
    }

    // A student has many subjects
    public function subjects()
    {
        return $this->hasMany(StudentSubject::class, 'studentID');
    }

    // A student has many enrollments
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'studentID');
    }
}
