<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    protected $primaryKey = 'trackID'; // Ensure the primary key is set correctly

    protected $fillable = [
        'trackName',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    public function strands()
    {
        return $this->hasMany(Strand::class, 'trackID');
    }
}
