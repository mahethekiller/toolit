<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

if (!function_exists('getRecentBlogPosts')) {
    /**
     * Fetch recent blog posts from WordPress REST API with 1-hour caching & fallback data.
     *
     * @param int $limit
     * @return array
     */
    function getRecentBlogPosts($limit = 3): array
    {
        return Cache::remember("recent_wp_blog_posts_{$limit}", 3600, function () use ($limit) {
            try {
                $endpoint = 'https://www.onlinetxttools.com/blog/wp-json/wp/v2/posts';
                $response = Http::timeout(3)->get($endpoint, [
                    'per_page' => $limit,
                    '_embed' => 1,
                ]);

                if ($response->successful()) {
                    $posts = $response->json();
                    $formatted = [];

                    foreach ($posts as $post) {
                        $featuredImage = null;
                        if (isset($post['_embedded']['wp:featuredmedia'][0]['source_url'])) {
                            $featuredImage = $post['_embedded']['wp:featuredmedia'][0]['source_url'];
                        }

                        $rawExcerpt = $post['excerpt']['rendered'] ?? '';
                        $cleanExcerpt = Str::limit(trim(strip_tags($rawExcerpt)), 120);

                        $formatted[] = [
                            'title' => $post['title']['rendered'] ?? 'Blog Post',
                            'url' => $post['link'] ?? 'https://www.onlinetxttools.com/blog',
                            'excerpt' => $cleanExcerpt ?: 'Read the latest post from Online Text Tools Blog.',
                            'date' => isset($post['date']) ? date('M d, Y', strtotime($post['date'])) : date('M d, Y'),
                            'image' => $featuredImage ?: asset('default-og-image.png'),
                        ];
                    }

                    if (!empty($formatted)) {
                        return $formatted;
                    }
                }
            } catch (\Throwable $e) {
                // Fall back gracefully when API is offline or unreachable
            }

            // Fallback sample posts for local development & offline state
            return [
                [
                    'title' => 'Top 10 Text Formatting Tips for Developers & Writers',
                    'url' => 'https://www.onlinetxttools.com/blog',
                    'excerpt' => 'Discover how proper case conversion and whitespace trimming can streamline your coding workflow and content publishing.',
                    'date' => date('M d, Y'),
                    'image' => asset('default-og-image.png'),
                ],
                [
                    'title' => 'How Word Count Impacts SEO & Reader Engagement',
                    'url' => 'https://www.onlinetxttools.com/blog',
                    'excerpt' => 'Learn the optimal article lengths for search engine optimization and how to structure your text for maximum readability.',
                    'date' => date('M d, Y', strtotime('-2 days')),
                    'image' => asset('default-og-image.png'),
                ],
                [
                    'title' => 'Why Client-Side Password Generation is 100% Secure',
                    'url' => 'https://www.onlinetxttools.com/blog',
                    'excerpt' => 'Understand the security advantages of generating random cryptographic passwords directly inside your web browser.',
                    'date' => date('M d, Y', strtotime('-5 days')),
                    'image' => asset('default-og-image.png'),
                ],
            ];
        });
    }
}
