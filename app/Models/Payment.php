<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $primaryKey = 'paymentID';

    protected $fillable = [
        'enrollmentID',
        'amountPaid',
        'paymentMethod',
        'totalFee',
        'paymentType',
        'paymentDate',
        'paymentStatus',
    ];

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class, 'enrollmentID');
    }
}
