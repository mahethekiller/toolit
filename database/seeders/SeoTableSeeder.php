<?php

namespace Database\Seeders;

use App\Models\Seo;
use Illuminate\Database\Seeder;

class SeoTableSeeder extends Seeder
{
    /**
     * Run the database seeds for unique sitewide SEO metadata.
     */
    public function run(): void
    {
        $domain = 'https://www.onlinetxttools.com';

        $seoRecords = [
            [
                'url' => '/',
                'title' => 'Free Online Text Tools – Case Converter, Word Counter & More',
                'description' => 'Free online text processing tools for developers, writers, and content creators. Convert case, count words, generate secure passwords, and format text instantly.',
                'keywords' => 'online text tools, text tools, free text utilities, case converter, word counter, password generator',
                'og_title' => 'Free Online Text Tools – Fast & Secure Browser Utilities',
                'og_description' => 'Free online text processing tools for developers, writers, and content creators. Instant browser-based text utilities.',
                'og_image' => 'default-og-image.png',
                'canonical' => $domain . '/',
            ],
            [
                'url' => '/tools',
                'title' => 'All Free Online Text Processing Tools | ToolIt',
                'description' => 'Browse our complete suite of free online text processing tools. Fast, secure, browser-based utilities for text formatting, case conversion, and word counting.',
                'keywords' => 'text tools directory, free online text utilities, developer tools, writing tools, text formatting',
                'og_title' => 'All Free Online Text Tools – Full Suite',
                'og_description' => 'Browse our complete directory of free online text tools including case converters, word counters, and password generators.',
                'og_image' => 'default-og-image.png',
                'canonical' => $domain . '/tools',
            ],
            [
                'url' => '/tools/case-converter',
                'title' => 'Free Online Case Converter – Uppercase, Lowercase, Title Case',
                'description' => 'Convert text case instantly online. Convert to UPPERCASE, lowercase, Title Case, Sentence case, camelCase, PascalCase, snake_case, and kebab-case for free.',
                'keywords' => 'case converter, uppercase converter, lowercase converter, title case, camelcase converter, convert text case',
                'og_title' => 'Free Online Case Converter Tool',
                'og_description' => 'Convert text case instantly: UPPERCASE, lowercase, Title Case, camelCase, PascalCase, snake_case, and kebab-case.',
                'og_image' => 'default-og-image.png',
                'canonical' => $domain . '/tools/case-converter',
            ],
            [
                'url' => '/tools/word-counter',
                'title' => 'Free Word Counter & Character Counter Tool',
                'description' => 'Count words, characters, sentences, and paragraphs in real time. Perfect for essay writing, social media posts, blog editing, and SEO word limits.',
                'keywords' => 'word counter, character counter, count words online, sentence counter, paragraph counter, text length checker',
                'og_title' => 'Free Online Word & Character Counter',
                'og_description' => 'Count words, characters, sentences, and paragraphs in real time. Free client-side word count tool.',
                'og_image' => 'default-og-image.png',
                'canonical' => $domain . '/tools/word-counter',
            ],
            [
                'url' => '/tools/password-generator',
                'title' => 'Free Strong Password Generator – Secure & Customizable',
                'description' => 'Generate strong, random, and secure passwords instantly in your browser. Customize password length, symbols, numbers, and uppercase characters with zero server storage.',
                'keywords' => 'password generator, secure password generator, random password generator, strong password tool, online password creator',
                'og_title' => 'Free Strong & Secure Password Generator',
                'og_description' => 'Generate custom random secure passwords instantly inside your browser. 100% private & secure.',
                'og_image' => 'default-og-image.png',
                'canonical' => $domain . '/tools/password-generator',
            ],
            [
                'url' => '/tools/text-reverser',
                'title' => 'Free Online Text Reverser – Reverse Words & Letters',
                'description' => 'Reverse text, flip words, and invert character order instantly online. Simple, fast, and free client-side text reversing tool.',
                'keywords' => 'text reverser, reverse text online, flip text, backwards text generator, reverse string tool',
                'og_title' => 'Free Online Text Reverser',
                'og_description' => 'Reverse text strings, words, and letters instantly online.',
                'og_image' => 'default-og-image.png',
                'canonical' => $domain . '/tools/text-reverser',
            ],
            [
                'url' => '/tools/whitespace-remover',
                'title' => 'Free Whitespace Remover & Line Trim Tool',
                'description' => 'Remove extra spaces, tabs, line breaks, and whitespace from text or code. Clean up formatted text quickly and easily.',
                'keywords' => 'whitespace remover, remove extra spaces, trim text, remove line breaks, text cleaner, space remover',
                'og_title' => 'Free Whitespace & Extra Space Remover',
                'og_description' => 'Clean up extra spaces, line breaks, and tabs from your text or code instantly.',
                'og_image' => 'default-og-image.png',
                'canonical' => $domain . '/tools/whitespace-remover',
            ],
            [
                'url' => '/about',
                'title' => 'About Online Text Tools – Our Mission & Features',
                'description' => 'Learn about Online Text Tools. We provide fast, privacy-focused, browser-based text processing tools with zero registration required.',
                'keywords' => 'about online text tools, free text utilities mission, privacy text tools',
                'og_title' => 'About Online Text Tools',
                'og_description' => 'Learn more about our mission to provide fast, free, and privacy-first text tools.',
                'og_image' => 'default-og-image.png',
                'canonical' => $domain . '/about',
            ],
            [
                'url' => '/contact',
                'title' => 'Contact Us – Online Text Tools Support & Feedback',
                'description' => 'Get in touch with the Online Text Tools team for feature requests, bug reports, or general inquiries. We reply within 24 hours.',
                'keywords' => 'contact online text tools, text tools support, feedback',
                'og_title' => 'Contact Online Text Tools Support',
                'og_description' => 'Have questions or feedback? Contact the Online Text Tools team directly.',
                'og_image' => 'default-og-image.png',
                'canonical' => $domain . '/contact',
            ],
            [
                'url' => '/privacy-policy',
                'title' => 'Privacy Policy – Online Text Tools',
                'description' => 'Read our Privacy Policy. All text processing happens 100% locally in your browser. No user text or data is collected or saved on servers.',
                'keywords' => 'privacy policy, text tools privacy, data security',
                'og_title' => 'Privacy Policy – Online Text Tools',
                'og_description' => 'Read our commitment to user privacy and 100% browser-side data security.',
                'og_image' => 'default-og-image.png',
                'canonical' => $domain . '/privacy-policy',
            ],
            [
                'url' => '/terms-of-use',
                'title' => 'Terms of Use – Online Text Tools',
                'description' => 'Terms of Use for Online Text Tools. Learn about the terms, conditions, and acceptable usage guidelines for our free web utilities.',
                'keywords' => 'terms of use, terms of service, text tools terms',
                'og_title' => 'Terms of Use – Online Text Tools',
                'og_description' => 'Review the terms and acceptable usage guidelines for Online Text Tools.',
                'og_image' => 'default-og-image.png',
                'canonical' => $domain . '/terms-of-use',
            ],
            [
                'url' => '/ads-disclosure',
                'title' => 'Advertising & Ads Disclosure – Online Text Tools',
                'description' => 'Understand how advertising helps keep Online Text Tools 100% free for everyone. Learn about our ad policy and third-party partner disclosures.',
                'keywords' => 'ads disclosure, advertising policy, free tools funding',
                'og_title' => 'Ads Disclosure – Online Text Tools',
                'og_description' => 'Learn how advertising supports keeping our text tools completely free.',
                'og_image' => 'default-og-image.png',
                'canonical' => $domain . '/ads-disclosure',
            ],
            [
                'url' => '/header-and-footer-script-adder',
                'title' => 'Header & Footer Script Adder Plugin – Custom Script Tool',
                'description' => 'Easily add custom scripts, Google Analytics, tracking pixels, and CSS tags to your site head and footer without editing template files.',
                'keywords' => 'header footer script adder, add custom scripts, google analytics code adder, web script plugin',
                'og_title' => 'Header & Footer Script Adder Plugin',
                'og_description' => 'Easily manage header and footer scripts, analytics, and custom code tags.',
                'og_image' => 'default-og-image.png',
                'canonical' => $domain . '/header-and-footer-script-adder',
            ],
        ];

        foreach ($seoRecords as $record) {
            Seo::updateOrCreate(
                ['url' => $record['url']],
                $record
            );
        }
    }
}
