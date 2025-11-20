<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'position',
        'company',
        'period',
        'location',
        'responsibilities',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'responsibilities' => 'array',
        'is_active' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }
}
