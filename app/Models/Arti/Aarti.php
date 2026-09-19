<?php

namespace App\Models\Arti;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aarti extends Model
{
    protected $table = 'arti_aartis';

    protected $fillable = [
        'slug',
        'deity_id',
        'deity_name',
        'deity_devanagari',
        'title',
        'title_devanagari',
        'subtitle',
        'category',
        'image_url',
        'duration',
        'duration_minutes',
        'timing',
        'timing_devanagari',
        'significance',
        'significance_devanagari',
        'meaning_short',
        'audio_url',
        'video_url',
        'lyrics',
        'lyrics_json',
        'lyrics_transliteration',
        'lyrics_hinglish',
        'lyrics_hindi_plain',
        'is_popular',
    ];

    protected $casts = [
        'lyrics_json' => 'array',
        'lyrics_transliteration' => 'array',
        'is_popular' => 'boolean',
        'duration_minutes' => 'integer',
    ];

    public function deity(): BelongsTo
    {
        return $this->belongsTo(Deity::class, 'deity_id');
    }

    public function getImageUrlAttribute(?string $value): ?string
    {
        if ($value && !str_starts_with($value, 'http')) {
            return url($value);
        }
        return $value;
    }
}