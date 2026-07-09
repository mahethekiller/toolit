<?php

namespace App\Models\Arti;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reminder extends Model
{
    protected $table = 'arti_reminders';

    protected $fillable = ['user_id', 'title', 'time', 'is_enabled'];

    protected $casts = [
        'is_enabled' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(ArtiUser::class, 'user_id');
    }
}
