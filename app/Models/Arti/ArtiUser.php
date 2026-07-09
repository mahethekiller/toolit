<?php

namespace App\Models\Arti;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ArtiUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'arti_users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'gotra',
        'rashi',
        'streak_count',
        'last_prayer_date',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
        'last_prayer_date' => 'date',
    ];

    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class, 'user_id');
    }

    public function reminders(): HasMany
    {
        return $this->hasMany(Reminder::class, 'user_id');
    }

    public function prayerHistories(): HasMany
    {
        return $this->hasMany(PrayerHistory::class, 'user_id');
    }
}
