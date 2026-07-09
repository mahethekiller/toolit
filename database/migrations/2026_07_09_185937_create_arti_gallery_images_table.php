<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('arti_gallery_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('deity_id')->constrained('arti_deities')->onDelete('cascade');
            $table->string('title');
            $table->string('image_url');
            $table->integer('download_count')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('arti_gallery_images');
    }
};
