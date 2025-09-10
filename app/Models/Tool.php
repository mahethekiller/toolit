<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    //

    protected $fillable = [
        'name',
        'route_name',
        'url',
        'active',
        'description',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];
}
