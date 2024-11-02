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
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id(); // معرف فريد للرسالة
            $table->text('message'); // محتوى الرسالة
            $table->unsignedBigInteger('sender_id'); // معرف المرسل
            $table->unsignedBigInteger('receiver_id'); // معرف المستلم
            $table->string('sender_type'); // نوع المرسل (user أو teacher)
            $table->string('receiver_type'); // نوع المستلم (user أو teacher)
            $table->timestamp('sent_at')->nullable(); // توقيت الإرسال
            $table->timestamps(); // توقيت الإنشاء والتحديث
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
