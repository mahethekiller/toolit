<?php

namespace App\Models\Arti;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryImage extends Model
{
    protected $table = 'arti_gallery_images';

    protected $fillable = ['deity_id', 'title', 'image_url', 'download_count'];

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
