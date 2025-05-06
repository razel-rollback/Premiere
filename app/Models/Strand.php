<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strand extends Model
{
    use HasFactory;

    protected $primaryKey = 'strandID'; // Specify the primary key columns

    protected $fillable = [
        'strandName',
        'trackID',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function track()
    {
        return $this->belongsTo(Track::class, 'trackID');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'strandID');
    }

    public function sections()
    {
        return $this->hasMany(Section::class, 'strandID');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'strandID');
    }
}
