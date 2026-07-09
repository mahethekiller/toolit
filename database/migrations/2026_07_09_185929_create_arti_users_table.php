<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('arti_users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Seeker of Peace');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('gotra')->nullable();
            $table->string('rashi')->nullable();
            $table->integer('streak_count')->default(0);
            $table->date('last_prayer_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('arti_users');
    }
};
