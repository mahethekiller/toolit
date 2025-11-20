<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('portfolio_skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('level');
            $table->string('category'); // languages, frameworks, other
            $table->string('type')->default('technical'); // technical, framework, other
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('portfolio_skills');
    }
};
