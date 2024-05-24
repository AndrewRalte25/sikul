<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_id',
        'student_name',
        'student_class',
        'guardian_name',
        'guardian_email',
        'payment_status',
        'amount',
        
    ];
}
