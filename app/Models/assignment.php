<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assignment extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'subject_id',    
        'teacher_id', 
        'assignment',
        'due_date',
    ];
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
