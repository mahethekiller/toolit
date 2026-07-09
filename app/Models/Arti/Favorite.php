<?php

namespace App\Models\Arti;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favorite extends Model
{
    protected $table = 'arti_favorites';

    protected $fillable = ['user_id', 'aarti_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(ArtiUser::class, 'user_id');
    }

    public function aarti(): BelongsTo
    {
        return $this->belongsTo(Aarti::class, 'aarti_id');
    }
}
