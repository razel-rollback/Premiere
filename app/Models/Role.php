<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $primaryKey = 'roleID';
    protected $fillable = [
        'username',
        'password',
        'userType',
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'roleID');
    }

    public function admins()
    {
        return $this->hasMany(Admin::class, 'roleID');
    }
}
