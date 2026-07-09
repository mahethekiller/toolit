<?php

namespace App\Models\Arti;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aarti extends Model
{
    protected $table = 'arti_aartis';

    protected $fillable = [
        'deity_id',
        'title',
        'subtitle',
        'category',
        'duration',
        'audio_url',
        'video_url',
        'lyrics',
    ];

    protected $casts = [
        'lyrics' => 'array',
    ];

    public function deity(): BelongsTo
    {
        return $this->belongsTo(Deity::class, 'deity_id');
    }
}
