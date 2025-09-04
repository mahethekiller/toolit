<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('seos', function (Blueprint $table) {
            $table->renameColumn('page_slug', 'url');
        });
    }

    public function down(): void
    {
        Schema::table('seos', function (Blueprint $table) {
            $table->renameColumn('url', 'page_slug');
        });
    }

};
