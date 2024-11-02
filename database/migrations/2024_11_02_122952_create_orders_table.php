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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->text('comment')->nullable(); // Comment (optional)
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key referencing users table
            $table->foreignId('teacher_id')->constrained()->onDelete('cascade'); // Foreign key referencing teachers table
            $table->time('time'); // Time of the order
            $table->dateTime('start_at'); // Start date and time of the session
            $table->dateTime('end_at'); // End date and time of the session
            $table->boolean('confirm')->default(false); // Confirmation status (default: not confirmed)
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
