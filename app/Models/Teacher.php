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
}
