<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TeacherCertification extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = ['name'];

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
