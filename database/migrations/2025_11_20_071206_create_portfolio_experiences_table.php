<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('portfolio_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('position');
            $table->string('company');
            $table->string('period');
            $table->string('location');
            $table->json('responsibilities');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('portfolio_experiences');
    }
};
