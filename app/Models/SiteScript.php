<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteScript extends Model
{
    //
    protected $fillable = ['head_code', 'body_code', 'footer_code'];
}
