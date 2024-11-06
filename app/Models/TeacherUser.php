<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TeacherUser extends Pivot
{
    protected $table = 'teacher_user'; // تحديد اسم الجدول
    protected $fillable = ['teacher_id', 'user_id'];

    // إذا كنت ترغب في إضافة تواريخ أو عمليات تخصيصية هنا، يمكنك القيام بذلك
}