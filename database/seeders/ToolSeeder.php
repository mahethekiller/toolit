<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class ToolSeeder extends Seeder
{
    public function run(): void
    {
        $domain = 'https://www.onlinetxttools.com';

        $tools = [
            [
                'name' => 'Case Converter',
                'route_name' => 'tools.case-converter',
                'url' => $domain . '/tools/case-converter',
                'active' => true,
                'description' => 'Convert text between UPPERCASE, lowercase, Title Case, camelCase, PascalCase, and more.',
                'long_description' => 'Convert any text format instantly with our free online case converter tool.',
                'icon' => null,
            ],
            [
                'name' => 'Word Counter',
                'route_name' => 'tools.wordcounter',
                'url' => $domain . '/tools/word-counter',
                'active' => true,
                'description' => 'Count words, characters, sentences, and paragraphs in real time with reading time estimates.',
                'long_description' => 'Accurate word count and character count statistics for writers and SEO specialists.',
                'icon' => null,
            ],
            [
                'name' => 'Password Generator',
                'route_name' => 'tools.password',
                'url' => $domain . '/tools/password-generator',
                'active' => true,
                'description' => 'Generate strong, cryptographic passwords with customizable symbols, numbers, and length.',
                'long_description' => 'Secure client-side random password generator for maximum digital safety.',
                'icon' => null,
            ],
            [
                'name' => 'Text Reverser',
                'route_name' => 'tools.textreverser',
                'url' => $domain . '/tools/text-reverser',
                'active' => true,
                'description' => 'Reverse text, words, or sentences backwards instantly online.',
                'long_description' => 'Flip text strings, reverse word order, and mirror text strings.',
                'icon' => null,
            ],
            [
                'name' => 'Whitespace Remover',
                'route_name' => 'tools.whitespace',
                'url' => $domain . '/tools/whitespace-remover',
                'active' => true,
                'description' => 'Remove extra spaces, tabs, empty lines, and trailing whitespace from any text.',
                'long_description' => 'Clean up messy text formatting, trim spaces, and compress lines.',
                'icon' => null,
            ],
            [
                'name' => 'Lorem Ipsum Generator',
                'route_name' => 'tools.loremipsum',
                'url' => $domain . '/tools/lorem-ipsum-generator',
                'active' => true,
                'description' => 'Generate custom placeholder text in paragraphs, words, sentences, or HTML lists for web design.',
                'long_description' => 'Customizable Latin dummy text generator with HTML formatting options and word counts.',
                'icon' => null,
            ],
        ];

        foreach ($tools as $t) {
            Tool::updateOrCreate(
                ['route_name' => $t['route_name']],
                $t
            );
        }
    }
}
