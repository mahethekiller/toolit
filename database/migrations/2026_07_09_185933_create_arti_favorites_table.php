<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('arti_favorites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('arti_users')->onDelete('cascade');
            $table->foreignId('aarti_id')->constrained('arti_aartis')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('arti_favorites');
    }
};
