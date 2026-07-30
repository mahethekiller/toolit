# Project Architecture, Schema, and Structure Guide

This document is a comprehensive guide for AI agents and developers working on the **ToolIt** project. Refer to this file to understand the project structure, directory layout, database schemas, and development guidelines.

---

## 1. Project Overview & Environment
- **Production Domain**: `https://www.onlinetxttools.com`
- **Primary Application**: Laravel PHP framework, located in the `toolit/` directory.
- **Database**: SQLite database stored locally at `toolit/database/database.sqlite`.

---

## 2. Directory Layout & Key Components

Inside the `toolit/` directory:

### `app/Http/Controllers/`
Contains the request handling logic, organized into:
*   **`Tools/`**: Specific text tool controllers (e.g., `CaseConvertorController.php`, `LoremIpsumController.php`, `PasswordGeneratorController.php`, `TextReverserController.php`, `WhitespaceRemoverController.php`, `WordCounterController.php`).
*   **`Admin/`**: Backend admin dashboard controllers (including `ToolAnalyticsController.php` for tracking metrics).
*   **`Api/`**: Backend JSON APIs (including the `Api/Arti/` folder for the Arti mobile application).
*   **`Auth/`**: Standard authentication controllers.
*   **`ContactController.php`**: Handles contact page logic and queries.
*   **`PageController.php`**: Handles static pages (Privacy Policy, Terms of Use, Ads Disclosure, Data Deletion Policy, etc.).
*   **`PortfolioController.php`**: Controls the developer portfolio views.
*   **`SitemapController.php`**: Dynamically generates `/sitemap.xml` for all tools and page routes.
*   **`ToolsPageController.php`**: Renders the tools index page `/tools`.

### `app/Models/`
Contains Eloquent models mapping to the SQLite database:
*   **`User.php`**: Standard user and admin accounts.
*   **`Tool.php`**: Model for text tools stored in the database.
*   **`ToolUsage.php`**: Tracks tool usage views and executions.
*   **`Seo.php`**: Meta description, titles, and keywords for each page route.
*   **`Faq.php`**: FAQ groups, questions, and answers for tool pages.
*   **`Ad.php`**: Configuration for ad slots and display.
*   **`SiteScript.php`**: Header, body, and footer analytics/tracking scripts.
*   **`ContactMessage.php`**: Inquiries sent from the site contact form.
*   **`PluginQuery.php`**: Queries submitted by users of the WordPress plugin.
*   **`Arti/`**: Isolated models for the Arti mobile app API backend (`Deity.php`, `Aarti.php`, `Favorite.php`, `Reminder.php`, `GalleryImage.php`, `PrayerHistory.php`).
*   **`PortfolioExperience.php`, `PortfolioSkill.php`, `PortfolioProject.php`, `PortfolioSetting.php`**: Models for the portfolio page.

### `routes/`
Defines route groups and registries:
*   **`web.php`**: Web routes for the homepage, tools, static pages, and portfolio.
*   **`auth.php`**: Authentication routes.
*   **`admin.php`**: Admin panel routes.
*   **`arti.php`**: API routes for the Arti application (loaded under the `/api/arti` prefix with Sanctum middleware).
*   **`admin_arti.php`**: Admin panel routes for the Arti application data management.
*   **`api.php`**: General API routes.

### `resources/views/`
Renders views using Laravel Blade template engine:
*   **`layouts/`**: Base design layouts (e.g., `layouts/app.blade.php`).
*   **`tools/`**: Blade templates for individual text tools (e.g., `text-reverser.blade.php`).
*   **`portfolio/`**: Views for the developer portfolio.
*   **`welcome.blade.php`**: Main homepage template.

### `database/`
*   **`database.sqlite`**: Active database file.
*   **`migrations/`**: All database schemas.
*   **`seeders/`**: Seeders for default tools, SEO configs, and portfolio details.

---

## 3. Database Schema Reference

Below is the database table configuration.

### Core Tables

#### `tools`
Stores the metadata for available tools on the website.
*   `id` (BIGINT, Primary Key, Auto Increment)
*   `name` (VARCHAR) - Name of the tool (e.g., "Text Reverser").
*   `route_name` (VARCHAR, Unique) - Laravel route identifier (e.g., "tools.textreverser").
*   `url` (VARCHAR, Nullable) - Direct path segment (e.g., "tools/text-reverser").
*   `active` (BOOLEAN) - Visibility status (default: true).
*   `description` (VARCHAR, Nullable) - Short summary of what the tool does.
*   `long_description` (TEXT, Nullable) - In-depth content displayed below the tool interface.
*   `icon` (VARCHAR, Nullable) - Path to the icon image.
*   `icon_alt` (VARCHAR, Nullable) - Alt text for the icon.
*   `timestamps`

#### `seos`
Contains SEO details for dynamic routing.
*   `id` (BIGINT, Primary Key, Auto Increment)
*   `url` (VARCHAR, Unique) - Page URL (e.g., "/", "/tools/password-generator").
*   `title` (VARCHAR, Nullable) - Page SEO title tag.
*   `description` (TEXT, Nullable) - Page meta description.
*   `keywords` (VARCHAR, Nullable) - Meta keywords.
*   `og_title` (VARCHAR, Nullable) - OpenGraph Title.
*   `og_description` (VARCHAR, Nullable) - OpenGraph Description.
*   `og_image` (VARCHAR, Nullable) - OpenGraph Image URL.
*   `canonical` (VARCHAR, Nullable) - Canonical URL pointer.
*   `timestamps`

#### `faqs`
Stores Frequently Asked Questions associated with specific tools.
*   `id` (BIGINT, Primary Key, Auto Increment)
*   `group_name` (VARCHAR) - Group identifier, matching the tool name (e.g., "Password Generator").
*   `question` (VARCHAR) - The FAQ question.
*   `answer` (TEXT) - The FAQ answer.
*   `timestamps`

#### `ads`
Configures advertisements displayed on the site.
*   `id` (BIGINT, Primary Key, Auto Increment)
*   `name` (VARCHAR) - Internal reference title.
*   `position` (VARCHAR, Nullable) - Ad layout slot (e.g., "header", "sidebar", "footer").
*   `code` (TEXT) - Ad HTML/JS script block.
*   `active` (BOOLEAN) - Display status (default: true).
*   `timestamps`

#### `site_scripts`
Stores site-wide tracking and analytics scripts.
*   `id` (BIGINT, Primary Key, Auto Increment)
*   `head_code` (TEXT, Nullable) - Scripts injected into `<head>`.
*   `body_code` (TEXT, Nullable) - Scripts injected at the start of `<body>`.
*   `footer_code` (TEXT, Nullable) - Scripts injected before `</body>`.
*   `timestamps`

#### `contact_messages`
Stores contact form entries.
*   `id` (BIGINT, Primary Key, Auto Increment)
*   `name` (VARCHAR)
*   `email` (VARCHAR)
*   `subject` (VARCHAR)
*   `message` (TEXT)
*   `status` (ENUM: 'new', 'read', default: 'new')
*   `timestamps`

#### `plugin_queries`
Stores support inquiries for the WordPress "Header Footer Script Adder" plugin.
*   `id` (BIGINT, Primary Key, Auto Increment)
*   `name` (VARCHAR)
*   `email` (VARCHAR)
*   `subject` (VARCHAR)
*   `message` (TEXT)
*   `plugin_slug` (VARCHAR) - defaults to "header-and-footer-script-adder".
*   `status` (ENUM: 'new', 'read', default: 'new')
*   `timestamps`

#### `tool_usages`
Stores analytics and logs for tool usages.
*   `id` (BIGINT, Primary Key, Auto Increment)
*   `tool_id` (BIGINT, Foreign Key references `tools(id)` on delete cascade, Nullable)
*   `route_name` (VARCHAR, Nullable)
*   `ip_address` (VARCHAR)
*   `user_agent` (TEXT, Nullable)
*   `user_id` (BIGINT, Foreign Key references `users(id)` on delete set null, Nullable)
*   `action` (VARCHAR, default: 'view') - 'view' (page load) or 'execute' (processing)
*   `created_at` (TIMESTAMP, default: CURRENT_TIMESTAMP)

---

### Portfolio Tables
Used to render the developer portfolio for Mahendra Kumar at `/portfolio/mahendra`.

#### `portfolio_settings`
Global portfolio configurations.
*   `id` (BIGINT, Primary Key, Auto Increment)
*   `full_name` (VARCHAR, default: 'Mahendra Kumar')
*   `designation` (VARCHAR, default: 'Sr. Software Developer (PHP)')
*   `intro` (TEXT, Nullable)
*   `about_me` (TEXT, Nullable)
*   `email` (VARCHAR, default: 'mahendraaavi@gmail.com')
*   `phone` (VARCHAR, default: '+91-9125367540')
*   `location` (VARCHAR, default: 'Mayur Vihar Phase 3, New Delhi')
*   `date_of_birth` (DATE, default: '1993-03-09')
*   `profile_image` (VARCHAR, Nullable)
*   `website` (VARCHAR, default: 'https://onlinetxttools.com/')
*   `linkedin` (VARCHAR, Nullable)
*   `github` (VARCHAR, Nullable)
*   `social_links` (JSON, Nullable)
*   `timestamps`

#### `portfolio_experiences`
Work experience entries.
*   `id` (BIGINT, Primary Key, Auto Increment)
*   `position` (VARCHAR)
*   `company` (VARCHAR)
*   `period` (VARCHAR)
*   `location` (VARCHAR)
*   `responsibilities` (JSON)
*   `sort_order` (INTEGER, default: 0)
*   `is_active` (BOOLEAN, default: true)
*   `timestamps`

#### `portfolio_skills`
Skill ratings and categories.
*   `id` (BIGINT, Primary Key, Auto Increment)
*   `name` (VARCHAR)
*   `category` (VARCHAR)
*   `percentage` (INTEGER)
*   `sort_order` (INTEGER, default: 0)
*   `timestamps`

#### `portfolio_projects`
Past projects and works.
*   `id` (BIGINT, Primary Key, Auto Increment)
*   `title` (VARCHAR)
*   `description` (TEXT)
*   `image` (VARCHAR, Nullable)
*   `link` (VARCHAR, Nullable)
*   `technologies` (JSON)
*   `sort_order` (INTEGER, default: 0)
*   `is_active` (BOOLEAN, default: true)
*   `timestamps`

---

### Arti API Isolation Tables
Isolated tables prefixed with `arti_` specifically for the mobile app backend backend.

*   **`arti_deities`**: Stores divine entities (`id`, `name`, `description`, `image_url`, `timestamps`).
*   **`arti_aartis`**: Stores lyrics and links for specific prayers (`id`, `deity_id`, `title`, `subtitle`, `category`, `duration`, `audio_url`, `video_url`, `lyrics` [changed from JSON to TEXT], `timestamps`).
*   **`arti_users`**: Separate user directory for the mobile application (`id`, `name`, `email`, `password`, `gotra`, `rashi`, `streak_count`, `last_prayer_date`, `timestamps`).
*   **`arti_favorites`**: Pivot table marking user favorite aartis (`id`, `user_id`, `aart_id`, `timestamps`).
*   **`arti_gallery_images`**: Wallpaper links mapping to seeded deities (`id`, `deity_id`, `title`, `image_url`, `download_count`, `timestamps`).
*   **`arti_reminders`**: Configurable notifications for prayer times (`id`, `user_id`, `title`, `time`, `is_enabled`, `timestamps`).
*   **`arti_prayer_histories`**: Logs of user prayer duration (`id`, `user_id`, `aarti_id`, `played_at`, `duration_played`, `timestamps`).

---

## 4. Key Conventions & Integration Rules

### WordPress `/blog` Integration
1.  The `/blog` section (`https://www.onlinetxttools.com/blog`) runs on a standalone WordPress installation on the production server. It is **NOT** present in this codebase.
2.  **Sitemaps**: Do not add `/blog` route entries inside `SitemapController.php` or `SeoTableSeeder.php`. WordPress Yoast SEO manages them.
3.  **Recent Blog Posts**: In Laravel templates, fetch recent blog posts from the live WordPress REST API:
    `https://www.onlinetxttools.com/blog/wp-json/wp/v2/posts?per_page=3&_embed=1`.
    *   *Constraint*: Always wrap calls in `Cache::remember('recent_wp_posts', 3600, ...)` with a 3-second connection timeout (`Http::timeout(3)`).
    *   *Fallback*: Provide offline mock data to avoid breaking local/dev environments.

### SEO Rules
*   Every public page must have metadata defined in the `seos` table.
*   Routes should fetch metadata using their URL endpoint inside the controller or middleware.

### Checklist for Adding a New Tool
1.  **Create View**: Add a blade template to `resources/views/tools/<tool-name>.blade.php`.
2.  **Create Controller**: Create the corresponding controller under `app/Http/Controllers/Tools/`.
3.  **Add Routes**: Register GET and POST routes in `routes/web.php` inside the `tools` prefix group.
4.  **Register Tool in DB**: Insert a row in the `tools` database table (preferably via a migration/seeder or admin panel) with name, route_name, and active = true.
5.  **Configure SEO Metadata**: Insert a row in the `seos` table matching the new URL to define title, description, and keywords.
6.  **Add FAQs**: Insert any related FAQs in the `faqs` table under the corresponding group name.
