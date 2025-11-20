<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'designation',
        'intro',
        'about_me',
        'email',
        'phone',
        'location',
        'date_of_birth',
        'profile_image',
        'website',
        'linkedin',
        'github',
        'social_links'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'social_links' => 'array'
    ];

    // Singleton pattern for settings
    public static function getSettings()
    {
        $settings = self::first();
        if (!$settings) {
            $settings = self::create();
        }
        return $settings;
    }

    public function getProfileImageUrl()
    {
        if ($this->profile_image) {
            // Check if it's already a full URL
            if (filter_var($this->profile_image, FILTER_VALIDATE_URL)) {
                return $this->profile_image;
            }

            // Check if file exists in storage
            if (\Storage::disk('public')->exists($this->profile_image)) {
                return asset('storage/' . $this->profile_image);
            }

            // Check if file exists in the old path
            if (file_exists(public_path('storage/' . $this->profile_image))) {
                return asset('storage/' . $this->profile_image);
            }
        }

        // Return default image
        return asset('images/profile.jpg');
    }
}
