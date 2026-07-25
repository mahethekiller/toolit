<?php

use App\Models\Seo;

if (!function_exists('getSeo')) {
    function getSeo($url = null)
    {
        if ($url) {
            $path = '/' . ltrim(parse_url($url, PHP_URL_PATH) ?? '', '/');
            return Seo::where('url', $url)
                ->orWhere('url', $path)
                ->orWhere('url', url($path))
                ->first();
        }

        $fullUrl = request()->url();
        $path = '/' . ltrim(request()->path(), '/');

        return Seo::where('url', $fullUrl)
            ->orWhere('url', $path)
            ->orWhere('url', url($path))
            ->first();
    }
}
