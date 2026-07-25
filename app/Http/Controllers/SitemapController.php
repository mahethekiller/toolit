<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $baseUrl = 'https://www.onlinetxttools.com';

        $staticUrls = [
            ['loc' => $baseUrl . '/', 'priority' => '1.0', 'changefreq' => 'daily'],
            ['loc' => $baseUrl . '/tools', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/about', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl . '/contact', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl . '/privacy-policy', 'priority' => '0.5', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl . '/terms-of-use', 'priority' => '0.5', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl . '/ads-disclosure', 'priority' => '0.5', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl . '/header-and-footer-script-adder', 'priority' => '0.7', 'changefreq' => 'monthly'],
        ];

        $tools = Tool::where('active', true)->get();
        $toolUrls = [];

        foreach ($tools as $tool) {
            $path = parse_url($tool->url, PHP_URL_PATH) ?? ('/tools/' . $tool->route_name);
            $fullUrl = $baseUrl . '/' . ltrim($path, '/');
            
            $toolUrls[] = [
                'loc' => $fullUrl,
                'priority' => '0.8',
                'changefreq' => 'weekly',
                'lastmod' => $tool->updated_at ? $tool->updated_at->toAtomString() : now()->toAtomString(),
            ];
        }

        $allUrls = array_merge($staticUrls, $toolUrls);

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemap.org/schemas/sitemap/0.9">' . "\n";

        foreach ($allUrls as $url) {
            $xml .= '  <url>' . "\n";
            $xml .= '    <loc>' . htmlspecialchars($url['loc']) . '</loc>' . "\n";
            $xml .= '    <lastmod>' . ($url['lastmod'] ?? now()->toAtomString()) . '</lastmod>' . "\n";
            $xml .= '    <changefreq>' . $url['changefreq'] . '</changefreq>' . "\n";
            $xml .= '    <priority>' . $url['priority'] . '</priority>' . "\n";
            $xml .= '  </url>' . "\n";
        }

        $xml .= '</urlset>';

        return response($xml, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }
}
