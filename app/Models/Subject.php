<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'sbj_id',
        'name',
        'class_id',
        
    ];

    public function class()
    {
        return $this->belongsTo(Classs::class, 'class_id');
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
