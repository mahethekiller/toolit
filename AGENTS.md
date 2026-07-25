# Agent Instructions & Project Rules

## Workspace Architecture & Domain Setup
- **Production Domain**: `https://www.onlinetxttools.com`
- **Primary Application**: Laravel application (`toolit/`) powering all text tools, SEO metadata, dynamic `/sitemap.xml`, and web utilities.

---

## WordPress `/blog` Integration Rules

1. **Standalone Live Server WordPress**:
   - The `/blog` section (`https://www.onlinetxttools.com/blog`) is powered by a **WordPress** installation hosted directly on the **live production server**.
   - It is **NOT** present in the local codebase repository (`toolit/`).

2. **Sitemap & SEO Management**:
   - **Laravel App**: Manages `/sitemap.xml` for all text tool routes (`/tools/*`) and main pages (`/`, `/tools`, `/about`, `/contact`, `/privacy-policy`, `/terms-of-use`, `/ads-disclosure`).
   - **WordPress & Yoast SEO**: Manages sitemaps for `/blog` (`/blog/sitemap_index.xml`, `/blog/post-sitemap.xml`).
   - **Do NOT** add `/blog` route entries inside Laravel's `SitemapController.php` or `SeoTableSeeder.php`.

3. **`public/robots.txt` Guidelines**:
   - Maintain disallow rules for `/blog/wp-admin/` and allow rules for `/blog/wp-admin/admin-ajax.php`.
   - Keep sitemap pointers for both the main Laravel sitemap (`https://www.onlinetxttools.com/sitemap.xml`) and the Yoast blog sitemap (`https://www.onlinetxttools.com/blog/sitemap_index.xml`).

4. **Fetching Recent Blog Posts in Laravel**:
   - When displaying recent blog posts on Laravel views (Homepage or Tools page), query the live WordPress REST API:
     `https://www.onlinetxttools.com/blog/wp-json/wp/v2/posts?per_page=3&_embed=1`
   - **Caching & Timeouts**: Always wrap API calls in Laravel `Cache::remember('recent_wp_posts', 3600, ...)` with a 3-second connection timeout (`Http::timeout(3)`).
   - **Fallback Mechanism**: Always provide fallback sample data so local development environments and offline states render seamlessly without breaking page loads.
