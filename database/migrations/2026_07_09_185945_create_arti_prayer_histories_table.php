<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('arti_prayer_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('arti_users')->onDelete('cascade');
            $table->foreignId('aarti_id')->constrained('arti_aartis')->onDelete('cascade');
            $table->timestamp('played_at')->useCurrent();
            $table->integer('duration_played');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('arti_prayer_histories');
    }
};
