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
        Schema::create('site_scripts', function (Blueprint $table) {
            $table->id();
            $table->longText('head_code')->nullable();   // for <head> scripts
            $table->longText('body_code')->nullable();   // for <body> top scripts
            $table->longText('footer_code')->nullable(); // for before </body> scripts
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_scripts');
    }
};
