<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    protected $fillable = [
        'trackName',
    ];

    public function strands()
    {
        return $this->hasMany(Strand::class, 'trackID');
    }
}
