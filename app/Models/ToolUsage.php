<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToolUsage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tool_usages';

    /**
     * Indicates if the model should be stamp-filled.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tool_id',
        'route_name',
        'ip_address',
        'user_agent',
        'user_id',
        'action',
    ];

    /**
     * Get the tool associated with this usage.
     */
    public function tool()
    {
        return $this->belongsTo(Tool::class);
    }

    /**
     * Get the user associated with this usage.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
