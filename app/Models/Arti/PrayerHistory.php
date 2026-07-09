<?php

namespace App\Models\Arti;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PrayerHistory extends Model
{
    protected $table = 'arti_prayer_histories';

    protected $fillable = ['user_id', 'aarti_id', 'played_at', 'duration_played'];

    protected $casts = [
        'played_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(ArtiUser::class, 'user_id');
    }

    public function aarti(): BelongsTo
    {
        return $this->belongsTo(Aarti::class, 'aarti_id');
    }
}
