<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;

    protected $primaryKey = 'guardianID'; // Primary key column

    protected $fillable = [
        'guardianFirstName',
        'guardianMiddleName',
        'guardianLastName',
        'guardianSuffixName',
        'email',
        'guardianBirthDate',
        'guardianRelation',
        'guardianPhone',
        'guardianAddress',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    // Relationship: A guardian has many students
    public function students()
    {
        return $this->hasMany(Student::class, 'guardianID', 'guardianID');
    }
}
