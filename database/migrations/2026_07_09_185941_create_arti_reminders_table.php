<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('arti_reminders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('arti_users')->onDelete('cascade');
            $table->string('title');
            $table->time('time');
            $table->boolean('is_enabled')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('arti_reminders');
    }
};
