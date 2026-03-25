<?php

use App\Models\Seo;

if (!function_exists('getSeo')) {
    function getSeo($url = null)
    {
        echo $url = $url ?? request()->url(); // e.g., /tools/case-converter
        return Seo::where('url', $url)->first();
    }
}


