<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('portfolio_settings', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->default('Mahendra Kumar');
            $table->string('designation')->default('Sr. Software Developer (PHP)');
            $table->text('intro')->nullable();
            $table->text('about_me')->nullable();
            $table->string('email')->default('mahendraaavi@gmail.com');
            $table->string('phone')->default('+91-9125367540');
            $table->string('location')->default('Mayur Vihar Phase 3, New Delhi');
            $table->date('date_of_birth')->default('1993-03-09');
            $table->string('profile_image')->nullable();
            $table->string('website')->default('https://onlinetxttools.com/');
            $table->string('linkedin')->nullable();
            $table->string('github')->nullable();
            $table->json('social_links')->nullable(); // For multiple custom links
            $table->timestamps();
        });

        // Insert default settings
        DB::table('portfolio_settings')->insert([
            'full_name' => 'Mahendra Kumar',
            'designation' => 'Sr. Software Developer (PHP)',
            'intro' => '9+ years of experience in PHP, WordPress, Laravel, and CodeIgniter development',
            'about_me' => 'Highly skilled and results-driven Sr. Software Developer with over 9 years of experience in PHP, WordPress, Laravel, and CodeIgniter development. Proficient in designing, developing, and maintaining scalable web applications, CMS platforms, and custom plugins.',
            'email' => 'mahendraaavi@gmail.com',
            'phone' => '+91-9125367540',
            'location' => 'Mayur Vihar Phase 3, New Delhi',
            'date_of_birth' => '1993-03-09',
            'website' => 'https://onlinetxttools.com/',
            'linkedin' => 'https://www.linkedin.com/in/mahendradev2023/',
            'github' => 'https://github.com/mahethekiller',
            'social_links' => json_encode([]),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('portfolio_settings');
    }
};
