<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = 'studentID';

    protected $fillable = [
        'firstName',
        'middleName',
        'lastName',
        'address',
        'birthDate',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function register()
    {
        return $this->hasOne(Register::class, 'studentID');
    }

    public function documents()
    {
        return $this->hasMany(StudentDocument::class, 'studentID');
    }

    public function subjects()
    {
        return $this->hasMany(StudentSubject::class, 'studentID');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'studentID');
    }
}
