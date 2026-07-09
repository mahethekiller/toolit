<?php

namespace App\Models\Arti;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Deity extends Model
{
    protected $table = 'arti_deities';

    protected $fillable = ['name', 'description', 'image_url'];

    public function aartis(): HasMany
    {
        return $this->hasMany(Aarti::class, 'deity_id');
    }

    public function galleryImages(): HasMany
    {
        return $this->hasMany(GalleryImage::class, 'deity_id');
    }

    public function getImageUrlAttribute(?string $value): ?string
    {
        if ($value && !str_starts_with($value, 'http')) {
            return url($value);
        }
        return $value;
    }
}
