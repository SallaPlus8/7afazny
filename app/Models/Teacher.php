<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'gender',
        'timezone',
        'available',
        'topic',
        'password',
        'photo'
    ];

    public function certifications()
    {
        return $this->hasMany(TeacherCertification::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function user()
    {
        return $this->belongsToMany(User::class, 'teacher_user', 'teacher_id', 'user_id')
                    ->withPivot('created_at', 'updated_at'); // لجلب تواريخ الربط إذا كانت ضرورية
    }
    



}
