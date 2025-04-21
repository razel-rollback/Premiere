<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $primaryKey = 'adminID';

    protected $fillable = [
        'roleID',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'roleID');
    }
}
