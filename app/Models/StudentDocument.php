<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'studentID',
        'documentType',
        'documentPath',
        'documentStatus',
        'UploadDate',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'studentID');
    }
}
