<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherCertification extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'name',
        'photo',
        'link',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
