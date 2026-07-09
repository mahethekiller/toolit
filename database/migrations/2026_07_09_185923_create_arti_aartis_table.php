<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('arti_aartis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('deity_id')->constrained('arti_deities')->onDelete('cascade');
            $table->string('title');
            $table->string('subtitle');
            $table->string('category');
            $table->string('duration');
            $table->string('audio_url');
            $table->string('video_url');
            $table->json('lyrics');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('arti_aartis');
    }
};
