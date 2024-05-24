<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_id',  
        'student_id',    
        'remarks',
       
    ];
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'user_id');
    }
}
