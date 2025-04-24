<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $primaryKey = 'teacherID';

    protected $fillable = [
        'teacherName',
        'specialization',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];



    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'teacherID');
    }
}
