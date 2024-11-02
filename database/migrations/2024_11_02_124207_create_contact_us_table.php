<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    { Schema::create('contact_us', function (Blueprint $table) {
        $table->id(); // معرف فريد للصف
        $table->string('type'); // نوع طريقة التواصل
        $table->string('value'); // القيمة مثل عنوان البريد الإلكتروني أو رقم الهاتف
        $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_us');
    }
};
