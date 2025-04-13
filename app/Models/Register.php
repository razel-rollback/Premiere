<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    protected $fillable = [
        'studentID',
        'registerStatus',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'studentID');
    }
}
