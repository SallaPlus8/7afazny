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
        Schema::create('social_media', function (Blueprint $table) {
            $table->id(); // معرف فريد
            $table->enum('platform', ['facebook', 'twitter', 'snapchat', 'instagram', 'tiktok']); // نوع المنصة
            $table->string('link'); // رابط الحساب على المنصة
            $table->timestamps(); // توقيت الإنشاء والتحديث
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_media');
    }
};
