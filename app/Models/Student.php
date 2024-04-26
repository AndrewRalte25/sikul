<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'dob',
        'gender',
        'class',
        'marksheet',
        'address',
        'phone_number',
        'class_id',
        'guardian_id',
        'status',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
       
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function guardian()
{
    return $this->belongsTo(Guardian::class, 'guardian_id', 'user_id');
}
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function class()
    {
        return $this->belongsTo(Classs::class, 'class_id');
    }
    public function assignments()
    {
        return $this->hasManyThrough(Assignment::class, Subject::class);
    }
    
}
