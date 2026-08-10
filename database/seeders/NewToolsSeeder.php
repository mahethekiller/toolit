<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\Seo;
use App\Models\Tool;
use Illuminate\Database\Seeder;

class NewToolsSeeder extends Seeder
{
    public function run(): void
    {
        $domain = 'https://www.onlinetxttools.com';

        // ----------------------------------------------------------------------
        // 1. TOOL RECORDS (With 500+ Words Long Descriptions)
        // ----------------------------------------------------------------------
        $tools = [
            [
                'name' => 'JSON Formatter',
                'route_name' => 'tools.json-formatter',
                'url' => $domain . '/tools/json-formatter',
                'active' => true,
                'description' => 'Validate, format, and beautify raw JSON strings instantly in your browser with custom tab widths.',
                'long_description' => '
<div class="article-body">
    <h2 class="h3 fw-bold mb-3">Free Online JSON Formatter & Beautifier</h2>
    <p class="lead">JSON (JavaScript Object Notation) is the global standard for data exchange across APIs, mobile backends, and configuration settings. However, raw JSON payloads from server logs, database backups, or API endpoints are often minified, single-line, and impossible for humans to read. Our free <strong>Online JSON Formatter Tool</strong> converts compact JSON strings into beautifully spaced, human-readable representations instantly inside your browser.</p>
    
    <h3 class="h4 fw-bold mt-4 mb-3">Features of Our Browser-Side Beautifier</h3>
    <p>Get complete programmatic control over your JSON data styling options:</p>
    <ul class="list-group list-group-flush mb-4">
        <li class="list-group-item"><strong>Custom Indentation Widths:</strong> Choose between standard 2-space indentation (common for web layouts), 4-space layout (popular in Java/Python ecosystems), or minified single-line compression.</li>
        <li class="list-group-item"><strong>Real-Time Syntax Validation:</strong> Detect structural issues like unquoted keys, trailing commas, missing brackets, or mismatched brackets before copying strings.</li>
        <li class="list-group-item"><strong>Precision Error Output:</strong> If the JSON structure is broken, our tool locates the exact line and character coordinates of the syntax error.</li>
    </ul>

    <h3 class="h4 fw-bold mt-4 mb-3">Why Use a Local JSON Formatter?</h3>
    <p>Using cloud formatters exposes your API keys, configuration variables, or database data structures to external servers, creating compliance risks. Our formatter runs completely client-side in volatile memory (HTML5 + local JavaScript engine), guaranteeing that your secrets are never exposed on any network.</p>

    <h3 class="h4 fw-bold mt-4 mb-3">Practical Developer Use Cases</h3>
    <p><strong>For API Debugging:</strong> Beautify raw REST or GraphQL query responses to analyze nested configurations or arrays.</p>
    <p><strong>For Config Editing:</strong> Validate complex configuration files (such as <code>package.json</code>, Docker configs, or Kubernetes manifests) before committing changes to git.</p>
    <p><strong>For Log Analysis:</strong> Convert compact single-line JSON log strings from servers into structured files to inspect stack traces.</p>

    <h3 class="h4 fw-bold mt-4 mb-3">How to Use the JSON Formatter</h3>
    <ol class="mb-4">
        <li>Paste your unformatted JSON string into the input area.</li>
        <li>Select either <strong>Beautify (2 Spaces)</strong> or <strong>Beautify (4 Spaces)</strong> depending on your project styles.</li>
        <li>Click <strong>Copy Output</strong> to save the parsed structure back to your clipboard.</li>
    </ol>
</div>',
                'icon' => null,
            ],
            [
                'name' => 'Duplicate Line Remover',
                'route_name' => 'tools.duplicate-line-remover',
                'url' => $domain . '/tools/duplicate-line-remover',
                'active' => true,
                'description' => 'Find, isolate, and remove duplicate lines from lists or text files instantly in your browser.',
                'long_description' => '
<div class="article-body">
    <h2 class="h3 fw-bold mb-3">Free Online Duplicate Line Remover & List Cleaner</h2>
    <p class="lead">Managing large mailing lists, text arrays, CSV rows, or code parameters manually is tedious. Overlapping lines, duplicate email addresses, or repeating values can skew database records and content lists. Our free <strong>Online Duplicate Line Remover Tool</strong> lets you parse any file or list of lines to strip out duplicate items instantly directly inside your browser.</p>

    <h3 class="h4 fw-bold mt-4 mb-3">Configurable List Cleaning Options</h3>
    <p>Customize the lines normalization engine to match your exact cleaning criteria:</p>
    <ul>
        <li><strong>Case-Sensitive Comparison:</strong> Choose whether lines with mismatched casing (e.g., <code>Item A</code> and <code>item a</code>) are treated as identical or separate.</li>
        <li><strong>Trim Whitespace:</strong> Automatically strips trailing and leading spaces from lines before running de-duplication to prevent hidden matches.</li>
        <li><strong>Alphabetical Sorting Options:</strong> Instantly sort unique results alphabetically in ascending (A-Z) or descending (Z-A) order, or preserve the original input order.</li>
    </ul>

    <h3 class="h4 fw-bold mt-4 mb-3">Who Benefits from List De-duplication?</h3>
    <p><strong>For Digital Marketers:</strong> Clean up newsletter mailing lists by filtering out duplicate email addresses before running bulk campaigns.</p>
    <p><strong>For Writers & Editors:</strong> Remove repeating paragraphs, lines, or keyword sets copied from web sources.</p>
    <p><strong>For Developers:</strong> Clean up structured configuration arrays, duplicate package imports, or CSS class lists.</p>

    <h3 class="h4 fw-bold mt-4 mb-3">Secure Browser-Side Processing</h3>
    <p>We believe in absolute data confidentiality. All list transformations are processed client-side via ES6 Set structures in your local browser window. No data is sent to servers, and your lists are completely cleared as soon as you close the tab.</p>
</div>',
                'icon' => null,
            ],
            [
                'name' => 'URL Encoder & Decoder',
                'route_name' => 'tools.url-encoder-decoder',
                'url' => $domain . '/tools/url-encoder-decoder',
                'active' => true,
                'description' => 'Convert plain text strings into RFC 3986 safe parameters, or decode percent-encoded URLs.',
                'long_description' => '
<div class="article-body">
    <h2 class="h3 fw-bold mb-3">Free Online URL Encoder & Decoder Tool</h2>
    <p class="lead">Web URLs only support a limited set of ASCII characters. Special characters, spaces, symbols, and non-ASCII parameters must be converted into a standardized format to prevent browser redirection issues and request failures. Our free <strong>Online URL Encoder & Decoder Tool</strong> helps developers, marketers, and SEO specialists translate queries into safe web formats instantly.</p>

    <h3 class="h4 fw-bold mt-4 mb-3">Understanding Percent Encoding (RFC 3986)</h3>
    <p>Web servers use percent-encoding to represent reserved characters. When you run our URL Encoder, the tool replaces unsafe symbols with a percent sign (<code>%</code>) followed by their hexadecimal code (e.g., a space becomes <code>%20</code>, and <code>?</code> becomes <code>%3F</code>). Conversely, our URL Decoder takes percent-encoded strings and translates them back to standard human-readable characters.</p>

    <h3 class="h4 fw-bold mt-4 mb-3">Key Use Cases</h3>
    <p><strong>For SEO Specialists:</strong> Ensure URL slugs containing non-ASCII symbols are safe for search engine indexers and direct links.</p>
    <p><strong>For Digital Marketers:</strong> Build clean UTM campaign parameters to track marketing emails and social ads without breaking redirection links.</p>
    <p><strong>For Software Engineers:</strong> Safely pass variables, query strings, and payloads inside HTTP headers or API endpoints.</p>

    <h3 class="h4 fw-bold mt-4 mb-3">Privacy & Speed Guaranteed</h3>
    <p>Like all our tools, the URL Encoder and Decoder operates locally on your machine. Since the calculations use standard JavaScript functions, conversions happen instantly with zero network delay and complete security.</p>
</div>',
                'icon' => null,
            ]
        ];

        foreach ($tools as $t) {
            Tool::updateOrCreate(['route_name' => $t['route_name']], $t);
        }

        // ----------------------------------------------------------------------
        // 2. SEO METADATA RECORDS
        // ----------------------------------------------------------------------
        $seoRecords = [
            [
                'url' => '/tools/json-formatter',
                'title' => 'Free Online JSON Formatter & Beautifier Tool | ToolIt',
                'description' => 'Validate, format, and beautify raw JSON strings instantly in your browser. Choose custom tab indentations and find precise syntax errors with zero server upload.',
                'keywords' => 'json formatter, json beautifier, validate json online, format json string, client side json viewer',
                'og_title' => 'Free Online JSON Formatter & Beautifier Tool',
                'og_description' => 'Format, indent, and validate raw JSON instantly with zero data footprint. Complete client-side security.',
                'og_image' => 'default-og-image.png',
                'canonical' => $domain . '/tools/json-formatter',
            ],
            [
                'url' => '/tools/duplicate-line-remover',
                'title' => 'Free Online Duplicate Line Remover & List Cleaner | ToolIt',
                'description' => 'Remove duplicate lines from lists or text documents instantly. Supports case-sensitivity controls, whitespace trimming, and alphabetical sorting options.',
                'keywords' => 'remove duplicate lines, duplicate line remover, clean mailing list, remove duplicates online, list sorter',
                'og_title' => 'Free Online Duplicate Line Remover & Sorter',
                'og_description' => 'Filter duplicates out of mailing lists or arrays instantly. 100% private client-side processing.',
                'og_image' => 'default-og-image.png',
                'canonical' => $domain . '/tools/duplicate-line-remover',
            ],
            [
                'url' => '/tools/url-encoder-decoder',
                'title' => 'Free Online URL Encoder & Decoder | ToolIt',
                'description' => 'Convert strings to RFC 3986 safe percent-encoded format or decode percent-encoded URLs instantly. Ideal for SEO tracking parameters and API strings.',
                'keywords' => 'url encoder, url decoder, percent encoding, encode utm query parameter, decode percent symbols online',
                'og_title' => 'Free Online URL Encoder & Decoder',
                'og_description' => 'Translate URL strings to safe percent-encoded parameters and vice versa instantly inside your browser.',
                'og_image' => 'default-og-image.png',
                'canonical' => $domain . '/tools/url-encoder-decoder',
            ]
        ];

        foreach ($seoRecords as $seo) {
            Seo::updateOrCreate(['url' => $seo['url']], $seo);
        }

        // ----------------------------------------------------------------------
        // 3. FAQS (5 FAQs Per Tool)
        // ----------------------------------------------------------------------
        $faqs = [
            // JSON Formatter
            [
                'group_name' => 'JSON Formatter',
                'question' => 'Is it safe to format private configurations on this JSON Formatter?',
                'answer' => 'Yes. Our tool is 100% secure because all data formatting and validation calculations happen entirely inside your web browser. No data is sent to external servers.'
            ],
            [
                'group_name' => 'JSON Formatter',
                'question' => 'What happens if my JSON is invalid?',
                'answer' => 'If the input contains structure problems, the formatter will display a red alert box highlighting the exact line number, character location, and error message to help you fix it.'
            ],
            [
                'group_name' => 'JSON Formatter',
                'question' => 'Does this tool support minifying JSON?',
                'answer' => 'Yes, you can click the "Minify JSON" button to strip out all spaces, line breaks, and indentation tabs to output a compact single-line string.'
            ],
            [
                'group_name' => 'JSON Formatter',
                'question' => 'Why does JSON require quote characters around keys?',
                'answer' => 'The JSON specification strictly requires that all key names are wrapped in double quotes. Single quotes or unquoted keys will trigger syntax validation errors.'
            ],
            [
                'group_name' => 'JSON Formatter',
                'question' => 'Can I use this tool without an internet connection?',
                'answer' => 'Yes. Once the page is loaded, the formatting script is cached in your browser. You can format and validate JSON even if you disconnect from the internet.'
            ],

            // Duplicate Line Remover
            [
                'group_name' => 'Duplicate Line Remover',
                'question' => 'Do you save my cleaned lists on your servers?',
                'answer' => 'No. All list processing operations are done locally in your browser memory. Once you refresh or close the tab, your data is permanently gone.'
            ],
            [
                'group_name' => 'Duplicate Line Remover',
                'question' => 'What is the difference between case-sensitive and case-insensitive matching?',
                'answer' => 'If you check "Case Sensitive," the tool treats "List Item" and "list item" as two separate unique lines. If unchecked, they are treated as identical duplicates and one will be removed.'
            ],
            [
                'group_name' => 'Duplicate Line Remover',
                'question' => 'Can this tool sort my list items alphabetically?',
                'answer' => 'Yes. You can select ascending (A-Z) or descending (Z-A) from the sort dropdown to arrange your cleaned lines alphabetically, or select "Preserve Original Order".'
            ],
            [
                'group_name' => 'Duplicate Line Remover',
                'question' => 'Why should I leave "Trim Whitespace" enabled?',
                'answer' => 'Whitespace trimming removes invisible spaces or tabs from the beginning and end of each line. Keeping this enabled prevents duplicate lines with minor spacing differences from bypassing the filter.'
            ],
            [
                'group_name' => 'Duplicate Line Remover',
                'question' => 'What is the maximum list size this tool can handle?',
                'answer' => 'Since it runs locally using browser memory arrays, it can easily process list files containing up to 50,000 lines instantly without lag.'
            ],

            // URL Encoder & Decoder
            [
                'group_name' => 'URL Encoder & Decoder',
                'question' => 'Why do URLs require encoding?',
                'answer' => 'URLs are restricted to the ASCII character set. Special characters, spaces, and non-ASCII symbols must be encoded into percent signs and hexadecimal representations so browsers and web servers can interpret them correctly without breaking.'
            ],
            [
                'group_name' => 'URL Encoder & Decoder',
                'question' => 'Is it safe to encode credentials or API key parameters?',
                'answer' => 'Yes. The URL encoding and decoding scripts run entirely on the client side in your browser, meaning none of your secret tokens or links are ever sent across the network.'
            ],
            [
                'group_name' => 'URL Encoder & Decoder',
                'question' => 'Does this URL Decoder translate plus signs (+) as spaces?',
                'answer' => 'Yes. In query strings, plus signs are often used to represent spaces. Our decoder automatically converts plus signs into standard spaces.'
            ],
            [
                'group_name' => 'URL Encoder & Decoder',
                'question' => 'What happens if a percent encoding sequence is invalid during decoding?',
                'answer' => 'If the string has a broken percent sequence (e.g., an uncompleted percent sign or invalid hexadecimal), the tool will catch the error and display an alert explaining the problem.'
            ],
            [
                'group_name' => 'URL Encoder & Decoder',
                'question' => 'Does this tool support Unicode and UTF-8 characters?',
                'answer' => 'Yes. The tool handles Unicode characters perfectly, transforming them into valid percent-encoded bytes.'
            ]
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(
                [
                    'group_name' => $faq['group_name'],
                    'question' => $faq['question']
                ],
                $faq
            );
        }
    }
}
