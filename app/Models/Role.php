<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Role extends Authenticatable
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'roles';

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'roleID';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'username',
        'password',
        'userType',
    ];

    /**
     * The attributes that should be hidden for arrays (e.g., toArray, JSON).
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the students associated with this role.
     */
    public function student()
    {
        return $this->hasOne(Student::class, 'roleID');
    }


    /**
     * Get the admins associated with this role.
     */
    public function admins()
    {
        return $this->hasMany(Admin::class, 'roleID');
    }
}
