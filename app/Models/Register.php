<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    protected $primaryKey = 'registerID';
    protected $fillable = [
        'studentID',
        'registerStatus',
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
