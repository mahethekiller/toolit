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
        Schema::table('arti_aartis', function (Blueprint $table) {
            $table->longText('lyrics_hinglish')->nullable()->after('lyrics');
            $table->longText('lyrics_hindi_plain')->nullable()->after('lyrics_hinglish');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('arti_aartis', function (Blueprint $table) {
            $table->dropColumn(['lyrics_hinglish', 'lyrics_hindi_plain']);
        });
    }
};
