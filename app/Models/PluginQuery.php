<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PluginQuery extends Model
{
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'plugin_slug',
        'status',
    ];
}
