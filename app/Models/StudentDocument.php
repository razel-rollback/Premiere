<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDocument extends Model
{
    use HasFactory;


    protected $primaryKey = 'studentDocumentID';

    protected $fillable = [
        'studentID',
        'documentType',
        'documentPath',
        'documentStatus',
        'UploadDate',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'studentID');
    }
}
