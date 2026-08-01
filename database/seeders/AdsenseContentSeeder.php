<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\Seo;
use App\Models\Tool;
use Illuminate\Database\Seeder;

class AdsenseContentSeeder extends Seeder
{
    /**
     * Run the database seeds for AdSense compliance, high-value tool content, FAQs, and SEO metadata.
     */
    public function run(): void
    {
        $domain = config('app.url', 'https://www.onlinetxttools.com');

        // ----------------------------------------------------------------------
        // 1. HIGH-VALUE TOOL DESCRIPTIONS (500–1000+ WORDS PER TOOL)
        // ----------------------------------------------------------------------

        $toolContents = [
            'tools.case-converter' => [
                'name' => 'Case Converter',
                'description' => 'Convert text between UPPERCASE, lowercase, Title Case, Sentence case, camelCase, PascalCase, snake_case, and kebab-case instantly for free.',
                'long_description' => '
<div class="article-body">
    <h2 class="h3 fw-bold mb-3">Free Online Text Case Converter Tool</h2>
    <p class="lead">Capitalization errors, inconsistent string formatting, and mixed text cases can slow down writers, students, and software developers. Our free <strong>Online Case Converter Tool</strong> allows you to instantly transform any text into eight different standard casing formats directly in your web browser — with zero software installation, zero registration, and complete client-side data privacy.</p>
    
    <h3 class="h4 fw-bold mt-4 mb-3">Supported Text Conversion Modes</h3>
    <p>Select any of the conversion options to instantly format your text:</p>
    <ul class="list-group list-group-flush mb-4">
        <li class="list-group-item"><strong>Sentence case:</strong> Capitalizes only the first letter of the first word in each sentence and proper nouns. Perfect for standardizing unformatted paragraphs, emails, and raw notes copied from PDFs.</li>
        <li class="list-group-item"><strong>UPPERCASE:</strong> Converts every letter into a capital letter (e.g., <code>TEXT CONVERSION TOOL</code>). Frequently used for legal disclaimers, document headers, emphasis, database constants, and acronyms.</li>
        <li class="list-group-item"><strong>lowercase:</strong> Changes all letters into small letters (e.g., <code>text conversion tool</code>). Essential for normalizing email addresses, clean text processing, and removing accidental Caps Lock text.</li>
        <li class="list-group-item"><strong>Title Case:</strong> Capitalizes the first letter of every major word (e.g., <code>Text Conversion Tool</code>). Recommended for blog post titles, book headers, essay titles, and marketing campaign headlines.</li>
        <li class="list-group-item"><strong>camelCase:</strong> Converts text into a single continuous string where the first word is lowercase and subsequent words start with a capital letter (e.g., <code>textConversionTool</code>). Standard variable naming convention in JavaScript, Java, TypeScript, Swift, and JSON API payloads.</li>
        <li class="list-group-item"><strong>PascalCase:</strong> Capitalizes the first letter of every word with zero spaces (e.g., <code>TextConversionTool</code>). Popular naming convention in C#, React component names, and object-oriented class definitions.</li>
        <li class="list-group-item"><strong>snake_case:</strong> Replaces spaces with underscores and converts all characters to lowercase (e.g., <code>text_conversion_tool</code>). Widely used for Python variable names, database column names, config keys, and SQL queries.</li>
        <li class="list-group-item"><strong>kebab-case:</strong> Replaces spaces with hyphens and converts characters to lowercase (e.g., <code>text-conversion-tool</code>). Standard format for web URL slugs, CSS class names, HTML data attributes, and command-line flags.</li>
    </ul>

    <h3 class="h4 fw-bold mt-4 mb-3">Why Use a Dedicated Online Case Converter?</h3>
    <p>Formatting text manually is tedious and highly prone to human error. Whether you accidentally left Caps Lock turned on while typing an essay, need to format article headlines for SEO, or need to refactor database strings for a web development project, our tool processes thousands of words in milliseconds. Converting text case manually word-by-word can take minutes or hours; our online tool performs the calculation instantly with 100% accuracy.</p>

    <h3 class="h4 fw-bold mt-4 mb-3">Practical Real-World Use Cases</h3>
    <p><strong>For Writers & Content Editors:</strong> Instantly fix accidental Caps Lock text, convert raw outlines into clean Title Case headlines, and ensure uniform heading capitalization across multi-chapter manuscripts.</p>
    <p><strong>For Developers & Engineers:</strong> Easily transform human-readable labels into programmatic variable names. Quickly turn a string like "User Profile Picture URL" into <code>userProfilePictureUrl</code> (camelCase), <code>UserProfilePictureUrl</code> (PascalCase), <code>user_profile_picture_url</code> (snake_case), or <code>user-profile-picture-url</code> (kebab-case).</p>
    <p><strong>For Marketers & SEO Specialists:</strong> Optimize title tags and meta descriptions for search engines, craft engaging social media captions, and create clean, hyphenated URL slugs for new website landing pages.</p>

    <h3 class="h4 fw-bold mt-4 mb-3">How to Use the Case Converter</h3>
    <ol class="mb-4">
        <li>Paste or type your text into the main input text area.</li>
        <li>Select your target conversion mode (UPPERCASE, lowercase, Title Case, camelCase, PascalCase, snake_case, or kebab-case).</li>
        <li>View the live formatted result in the output panel immediately.</li>
        <li>Click the <strong>Copy</strong> button to save the converted text to your clipboard.</li>
    </ol>

    <h3 class="h4 fw-bold mt-4 mb-3">100% Client-Side Privacy & Security Guarantee</h3>
    <p>Security and confidentiality are fundamental values at Online Text Tools. All text conversions are calculated locally inside your web browser using HTML5 and JavaScript. Your sensitive documents, proprietary code, or confidential text are never sent to external servers, logged, or saved in any database.</p>
</div>'
            ],

            'tools.wordcounter' => [
                'name' => 'Word Counter',
                'description' => 'Count words, characters, sentences, paragraphs, and reading time in real time with our free client-side word count tool.',
                'long_description' => '
<div class="article-body">
    <h2 class="h3 fw-bold mb-3">Free Online Word & Character Counter Tool</h2>
    <p class="lead">Accurate word count and character count statistics are essential for academic writing, content creation, social media marketing, and Search Engine Optimization (SEO). Our free <strong>Online Word Counter Tool</strong> delivers instant, precise real-time analysis of your text as you type or paste content into your browser.</p>

    <h3 class="h4 fw-bold mt-4 mb-3">Comprehensive Text Statistics Delivered Instantly</h3>
    <p>When you input your text, our processing engine automatically calculates and displays multiple vital metrics:</p>
    <ul>
        <li><strong>Total Word Count:</strong> Calculates the exact number of words in your manuscript, essay, or blog post.</li>
        <li><strong>Character Count (With Spaces):</strong> Measures overall character length, vital for strict publisher and form submission limits.</li>
        <li><strong>Character Count (Without Spaces):</strong> Tracks raw alphanumeric density, frequently required for academic papers and official translations.</li>
        <li><strong>Sentence & Paragraph Count:</strong> Helps you evaluate sentence complexity and paragraph structure for better readability.</li>
        <li><strong>Estimated Reading Time:</strong> Calculates how long an average reader will take to read your article (based on standard 200 WPM reading speed).</li>
    </ul>

    <h3 class="h4 fw-bold mt-4 mb-3">Social Media & SEO Character Limit Cheat Sheet</h3>
    <p>Ensure your marketing posts and web metadata fit platform guidelines perfectly without getting truncated:</p>
    <div class="table-responsive mb-4">
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Platform / Asset</th>
                    <th>Optimal / Maximum Limit</th>
                    <th>Key Best Practice</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>X (Twitter) Post</strong></td>
                    <td>280 Characters</td>
                    <td>Keep main message concise with 1-2 relevant hashtags.</td>
                </tr>
                <tr>
                    <td><strong>Meta (Facebook) Post</strong></td>
                    <td>250 - 500 Characters (Max 63,206)</td>
                    <td>Shorter posts under 250 characters yield higher engagement.</td>
                </tr>
                <tr>
                    <td><strong>Instagram Caption</strong></td>
                    <td>125 - 150 Characters (Max 2,200)</td>
                    <td>Place key CTA before the "More" truncation fold.</td>
                </tr>
                <tr>
                    <td><strong>LinkedIn Post</strong></td>
                    <td>1,000 - 3,000 Characters (Max 3,000)</td>
                    <td>Use bullet points and double spacing for executive readability.</td>
                </tr>
                <tr>
                    <td><strong>Google SEO Title Tag</strong></td>
                    <td>50 - 60 Characters (Max 600px)</td>
                    <td>Include primary keyword near the beginning of the title.</td>
                </tr>
                <tr>
                    <td><strong>Google SEO Meta Description</strong></td>
                    <td>140 - 160 Characters</td>
                    <td>Write a compelling action-oriented summary with targeted search terms.</td>
                </tr>
            </tbody>
        </table>
    </div>

    <h3 class="h4 fw-bold mt-4 mb-3">Who Benefits from an Online Word Counter?</h3>
    <p><strong>For Students & Academics:</strong> Avoid grade penalties by meeting strict essay word limits (e.g., 500-word abstracts, 2,500-word term papers, or college application statements).</p>
    <p><strong>For SEO Writers & Bloggers:</strong> Target optimal content lengths (1,500 – 2,500 words) for long-form comprehensive guide articles that rank on Google Search.</p>
    <p><strong>For Translators & Proofreaders:</strong> Calculate job estimates, billing rates per word, and text compression metrics easily.</p>

    <h3 class="h4 fw-bold mt-4 mb-3">Zero Server Data Storage & Privacy Guarantee</h3>
    <p>Your privacy is fully protected. All character counting algorithms run client-side in your web browser. Your text is never stored in memory databases, never cached, and never transmitted over external networks.</p>
</div>'
            ],

            'tools.password' => [
                'name' => 'Password Generator',
                'description' => 'Generate strong, cryptographic passwords with customizable symbols, numbers, and length with zero server storage.',
                'long_description' => '
<div class="article-body">
    <h2 class="h3 fw-bold mb-3">Free Strong & Secure Password Generator Tool</h2>
    <p class="lead">Weak passwords and credential reuse are leading causes of online account compromise. Our free <strong>Online Password Generator Tool</strong> creates unguessable, high-entropy cryptographic passwords instantly inside your browser to protect your email, financial accounts, social profiles, and software portals.</p>

    <h3 class="h4 fw-bold mt-4 mb-3">Why Automated Password Generation is Essential</h3>
    <p>Humans are notoriously bad at inventing random strings. Most people rely on predictable patterns, such as pet names, birthdays, sequential numbers (<code>123456</code>), or common word substitutions (<code>P@ssword</code>). Cybercriminals use sophisticated <em>dictionary attacks</em> and <em>rainbow table brute-force tools</em> that guess millions of common password combinations per second.</p>
    <p>An automated random password generator generates non-deterministic, high-entropy character combinations that would take modern supercomputers thousands of years to crack.</p>

    <h3 class="h4 fw-bold mt-4 mb-3">Anatomy of a Bulletproof Password</h3>
    <ul>
        <li><strong>Generous Length (16+ Characters):</strong> Length exponentializes cracking complexity. A 16-character password is exponentially stronger than an 8-character one.</li>
        <li><strong>Character Diversity:</strong> Combine uppercase letters (A-Z), lowercase letters (a-z), numeric digits (0-9), and special characters (<code>!@#$%^&*()_+-=</code>).</li>
        <li><strong>Zero Dictionary Words:</strong> Exclude complete words found in standard English or foreign dictionaries.</li>
        <li><strong>Strict Uniqueness:</strong> Use a distinct, unique password for every single service. Never reuse passwords across multiple websites.</li>
    </ul>

    <h3 class="h4 fw-bold mt-4 mb-3">How Our Client-Side Generator Works</h3>
    <p>Our tool utilizes the modern Web Cryptography API (<code>window.crypto.getRandomValues()</code>) built directly into modern web browsers. Unlike basic pseudo-random generators, cryptographic randomness produces cryptographically secure random values suitable for sensitive digital security.</p>

    <h3 class="h4 fw-bold mt-4 mb-3">Guaranteed 100% Zero-Server Privacy</h3>
    <p>Because the password generation code executes entirely within your browser environment, <strong>your generated passwords never leave your device</strong>. No network request is transmitted, no server log is recorded, and no database entry is saved. Once you close or refresh the page, the password exists only where you choose to copy and store it (such as in a trusted password manager like Bitwarden, 1Password, or KeePass).</p>
</div>'
            ],

            'tools.textreverser' => [
                'name' => 'Text Reverser',
                'description' => 'Reverse text, flip words, and invert character order instantly online with zero server storage.',
                'long_description' => '
<div class="article-body">
    <h2 class="h3 fw-bold mb-3">Free Online Text Reverser & Flip Tool</h2>
    <p class="lead">Need to reverse a string of text, flip character ordering backwards, or invert word positions? Our free <strong>Online Text Reverser Tool</strong> performs instant character-level and word-level text reversals directly in your web browser.</p>

    <h3 class="h4 fw-bold mt-4 mb-3">Practical Applications of Text Reversing</h3>
    <p>Reversing strings is a useful technique across multiple professional fields:</p>
    <ul>
        <li><strong>Software Development & Algorithm Testing:</strong> Developers frequently use reversed strings to test palindrome algorithms, string inversion functions, right-to-left (RTL) text rendering, data parsing routines, and unit tests.</li>
        <li><strong>Data Obfuscation & Puzzles:</strong> Content creators, game designers, and puzzle enthusiasts use backwards text to create riddles, hidden clues, stylized captions, and mirror-image social media text.</li>
        <li><strong>Cryptographic Password Enhancements:</strong> Strengthen passphrase memory anchors by reversing base words before adding symbols and numbers.</li>
        <li><strong>Data Formatting & Cleaning:</strong> Invert list orders or formatted data strings quickly without writing custom scripts.</li>
    </ul>

    <h3 class="h4 fw-bold mt-4 mb-3">Character Reverse vs. Word Order Reverse</h3>
    <p>Our tool allows you to reverse text in multiple ways depending on your objective:</p>
    <div class="bg-light p-3 rounded border mb-4">
        <p class="mb-2"><strong>Original Input:</strong> <code>Online Text Tools Are Fast</code></p>
        <p class="mb-2"><strong>Character Reverse:</strong> <code>tsaF erA slooT txeT enilnO</code> (Reverses every letter from last to first)</p>
        <p class="mb-0"><strong>Word Reverse:</strong> <code>Fast Are Tools Text Online</code> (Keeps letter spelling intact but flips word sequence)</p>
    </div>

    <h3 class="h4 fw-bold mt-4 mb-3">How to Reverse Text Online</h3>
    <ol class="mb-4">
        <li>Paste or type your target text into the input field.</li>
        <li>The reversed output updates in real time automatically as you type.</li>
        <li>Click <strong>Copy</strong> to instantly copy the reversed text to your clipboard.</li>
    </ol>

    <h3 class="h4 fw-bold mt-4 mb-3">Fast & 100% Private Processing</h3>
    <p>Reversing text manually in text editors is tedious and error-prone. Our client-side tool reverses thousands of words in a fraction of a second. Everything is calculated in your browser, guaranteeing that your text remains 100% private and secure.</p>
</div>'
            ],

            'tools.whitespace' => [
                'name' => 'Whitespace Remover',
                'description' => 'Remove extra spaces, tabs, line breaks, and whitespace from text or code instantly online.',
                'long_description' => '
<div class="article-body">
    <h2 class="h3 fw-bold mb-3">Free Online Whitespace Remover & Text Cleaner</h2>
    <p class="lead">Copied text from PDFs, emails, spreadsheets, or code files often comes cluttered with awkward double spaces, unwanted line breaks, and trailing tabs. Our free <strong>Online Whitespace Remover Tool</strong> cleans up formatted text instantly, removing extra spaces and restoring clean typography.</p>

    <h3 class="h4 fw-bold mt-4 mb-3">Supported Whitespace Cleaning Modes</h3>
    <ul>
        <li><strong>Remove All Whitespace:</strong> Strips out every single space, tab, and line break, collapsing text into a single continuous string. Great for minifying code snippets or creating clean hash strings.</li>
        <li><strong>Remove Extra Spaces (Keep Single):</strong> Replaces multiple consecutive spaces or tabs with a single clean space. Perfect for fixing double-spaced sentences copied from old documents.</li>
        <li><strong>Trim Leading & Trailing Spaces:</strong> Strips unnecessary spaces from the beginning and end of each line while leaving internal sentence spacing intact.</li>
        <li><strong>Trim Left / Trim Right:</strong> Selectively removes spacing from the start or end of text lines.</li>
        <li><strong>Remove Line Breaks:</strong> Converts multi-line text blocks and broken paragraphs into a single smooth paragraph. Excellent for repairing text copied from PDF columns.</li>
    </ul>

    <h3 class="h4 fw-bold mt-4 mb-3">Who Needs a Whitespace Remover?</h3>
    <p><strong>For Developers & Data Engineers:</strong> Clean up JSON payloads, CSV data files, SQL queries, and HTML/CSS snippets to eliminate syntax errors caused by invisible trailing spaces.</p>
    <p><strong>For Content Editors & Writers:</strong> Remove accidental double spaces after periods, fix PDF formatting artifacts, and standardize manuscript submissions.</p>
    <p><strong>For Data Entry Professionals:</strong> Clean spreadsheet column values before importing into CRM platforms or accounting databases.</p>

    <h3 class="h4 fw-bold mt-4 mb-3">Step-by-Step Instructions</h3>
    <ol class="mb-4">
        <li>Paste your raw text or code block into the input text box.</li>
        <li>Select your preferred whitespace cleanup option (Remove All, Remove Extra, Trim, or Line Breaks).</li>
        <li>Click <strong>Clean Text</strong> to execute the formatting.</li>
        <li>Click <strong>Copy</strong> to copy the cleaned text to your clipboard.</li>
    </ol>

    <h3 class="h4 fw-bold mt-4 mb-3">Browser-Side Execution & Privacy</h3>
    <p>All whitespace processing runs instantly in your browser JavaScript environment. Your input data is never sent to external servers or stored in any temporary database.</p>
</div>'
            ],

            'tools.loremipsum' => [
                'name' => 'Lorem Ipsum Generator',
                'description' => 'Generate free Lorem Ipsum dummy placeholder text by paragraphs, words, sentences, or HTML lists for web design and publishing.',
                'long_description' => '
<div class="article-body">
    <h2 class="h3 fw-bold mb-3">Free Online Lorem Ipsum Placeholder Text Generator</h2>
    <p class="lead">When designing website mockups, graphic layouts, or print prototypes, real copy is often unavailable. Our free <strong>Online Lorem Ipsum Generator Tool</strong> allows designers, web developers, and publishers to generate clean Latin placeholder text by paragraphs, words, sentences, or HTML lists instantly.</p>

    <h3 class="h4 fw-bold mt-4 mb-3">What is Lorem Ipsum and Why is it Used?</h3>
    <p>Lorem Ipsum has been the graphic design industry standard dummy text since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. The standard passage originates from sections 1.10.32 and 1.10.33 of <em>"de Finibus Bonorum et Malorum"</em> (The Extremes of Good and Evil) written by Cicero in 45 BC.</p>
    <p>The primary advantage of using Lorem Ipsum is that it features a normal, balanced distribution of letter lengths and word frequencies. Using actual readable English content during early layout stages distracts reviewers, who end up reading the content rather than focusing on visual hierarchy, typography, line height, and UI layout balance.</p>

    <h3 class="h4 fw-bold mt-4 mb-3">Customization Features & Formatting Options</h3>
    <ul>
        <li><strong>Generate by Paragraphs:</strong> Produce full paragraphs of dummy text perfect for blog post wireframes and landing page content blocks.</li>
        <li><strong>Generate by Words or Sentences:</strong> Specify exact word counts or sentence counts to fit constrained UI components like cards, hero titles, and badges.</li>
        <li><strong>HTML Markup Generation:</strong> Wrap output automatically in <code>&lt;p&gt;</code>, <code>&lt;li&gt;</code>, or heading tags for quick copy-pasting directly into frontend code (React, Vue, HTML5).</li>
    </ul>

    <h3 class="h4 fw-bold mt-4 mb-3">How to Use the Generator</h3>
    <ol class="mb-4">
        <li>Select your generation type (Paragraphs, Words, or Sentences).</li>
        <li>Enter the desired quantity.</li>
        <li>Toggle optional settings (such as starting with "Lorem ipsum dolor sit amet...").</li>
        <li>Click <strong>Generate</strong> to instantly copy or view your customized placeholder text.</li>
    </ol>

    <h3 class="h4 fw-bold mt-4 mb-3">Free & Client-Side Execution</h3>
    <p>Generate as much placeholder text as you need for your web development and graphic design projects completely free, with no sign-up or server latency.</p>
</div>'
            ]
        ];

        foreach ($toolContents as $routeName => $data) {
            Tool::updateOrCreate(
                ['route_name' => $routeName],
                [
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'long_description' => trim($data['long_description']),
                    'active' => true,
                ]
            );
        }

        // ----------------------------------------------------------------------
        // 2. DETAILED FAQS FOR ALL TOOL GROUPS (30+ FAQS)
        // ----------------------------------------------------------------------

        $faqRecords = [
            // Case Converter FAQs
            'Case Converter' => [
                [
                    'question' => 'What is an online case converter?',
                    'answer' => 'An online case converter is a free web utility that automatically converts text between capitalization formats like UPPERCASE, lowercase, Title Case, camelCase, PascalCase, snake_case, and kebab-case without needing to retype text manually.'
                ],
                [
                    'question' => 'What is the difference between camelCase, PascalCase, snake_case, and kebab-case?',
                    'answer' => '<strong>camelCase:</strong> First word lowercase, subsequent words capitalized (<code>myVariableName</code>). Used in JavaScript and Java.<br><strong>PascalCase:</strong> Every word capitalized (<code>MyClassName</code>). Used in C# and React.<br><strong>snake_case:</strong> Lowercase words separated by underscores (<code>my_database_column</code>). Used in Python and SQL.<br><strong>kebab-case:</strong> Lowercase words separated by hyphens (<code>my-url-slug</code>). Used in web URLs and CSS.'
                ],
                [
                    'question' => 'Is OnlineTxtTools Case Converter free to use?',
                    'answer' => 'Yes, our Case Converter is 100% free with no registration, no daily conversion limits, and no hidden fees.'
                ],
                [
                    'question' => 'Is my text stored or saved on any server?',
                    'answer' => 'No. All case conversions take place locally inside your web browser using client-side JavaScript. Your text is never transmitted over the internet or saved to our databases.'
                ],
                [
                    'question' => 'Can I use this tool on mobile phones and tablets?',
                    'answer' => 'Yes! The tool is mobile-responsive and works smoothly on all smartphones, tablets, and desktop computers.'
                ],
                [
                    'question' => 'How does Title Case differ from Sentence Case?',
                    'answer' => 'Sentence Case capitalizes only the first letter of the first word in a sentence (and proper nouns). Title Case capitalizes the first letter of almost every word, which is the standard format for blog headlines, book titles, and formal headings.'
                ]
            ],

            // Word Counter FAQs
            'Word Counter' => [
                [
                    'question' => 'How does the free online Word Counter work?',
                    'answer' => 'Simply paste or type your text into the text area. The word counter instantly parses the characters, words, sentences, paragraphs, and reading time in real time as you edit.'
                ],
                [
                    'question' => 'How is reading time calculated?',
                    'answer' => 'Reading time is calculated based on the standard adult reading speed of 200 words per minute (WPM). A 600-word article will take approximately 3 minutes to read.'
                ],
                [
                    'question' => 'What is the ideal word count for blog posts to rank on Google?',
                    'answer' => 'While quality matters most, comprehensive pillar articles that rank well on Google typically contain between 1,500 and 2,500 words to answer user search intent thoroughly.'
                ],
                [
                    'question' => 'What are the character limits for Twitter, Meta, and LinkedIn?',
                    'answer' => '<strong>X (Twitter):</strong> 280 characters.<br><strong>Meta (Facebook):</strong> 250-500 optimal (Max 63,206).<br><strong>Instagram Caption:</strong> 2,200 characters.<br><strong>LinkedIn Post:</strong> 3,000 characters.<br><strong>SEO Title Tag:</strong> 50-60 characters.<br><strong>SEO Meta Description:</strong> 140-160 characters.'
                ],
                [
                    'question' => 'Does this tool count characters with and without spaces?',
                    'answer' => 'Yes! Our tool tracks both total character count (including spaces) and raw character count (excluding spaces).'
                ],
                [
                    'question' => 'Can I use the Word Counter for essay submissions?',
                    'answer' => 'Yes, students and academics frequently use our tool to check word limits for college essays, abstracts, thesis chapters, and application statements.'
                ]
            ],

            // Password Generator FAQs
            'Password Generator' => [
                [
                    'question' => 'What makes a generated password strong and unguessable?',
                    'answer' => 'A strong password requires long length (at least 16 characters) and high character diversity combining uppercase letters, lowercase letters, numbers, and special symbols without containing dictionary words.'
                ],
                [
                    'question' => 'Is it safe to generate passwords online?',
                    'answer' => 'Yes, because our Password Generator operates 100% locally in your browser using cryptographic random algorithms (<code>window.crypto.getRandomValues()</code>). Passwords are never sent to external servers or logged.'
                ],
                [
                    'question' => 'Why should I avoid reusing passwords across accounts?',
                    'answer' => 'If a data breach occurs on one service, hackers use automated credential-stuffing tools to try your compromised password across banking, email, and social media sites. Unique passwords isolate your security risk.'
                ],
                [
                    'question' => 'Where should I store my generated passwords safely?',
                    'answer' => 'We recommend storing generated passwords inside an encrypted password manager such as Bitwarden, 1Password, Dashlane, or KeePass rather than saving them in unencrypted text files.'
                ],
                [
                    'question' => 'What length is recommended for wifi passwords and online banking?',
                    'answer' => 'For high-security applications like banking, master passwords, or Wi-Fi routers, we recommend using at least 16 to 24 characters with all symbol sets enabled.'
                ]
            ],

            // Text Reverser FAQs
            'Text Reverser' => [
                [
                    'question' => 'What is a Text Reverser tool?',
                    'answer' => 'A Text Reverser is a web utility that flips character sequence, word ordering, or line sequence backwards instantly.'
                ],
                [
                    'question' => 'What is the difference between reversing characters and reversing words?',
                    'answer' => 'Reversing characters flips every single letter (e.g., <code>cat</code> becomes <code>tac</code>). Reversing words keeps letter spelling intact but flips word sequence (e.g., <code>cat and dog</code> becomes <code>dog and cat</code>).'
                ],
                [
                    'question' => 'Can programmers use this tool for debugging?',
                    'answer' => 'Yes! Programmers use text reversers to test string manipulation functions, algorithm edge cases, palindrome checkers, and right-to-left text formatting.'
                ],
                [
                    'question' => 'Is there any limit on text length for reversal?',
                    'answer' => 'No, you can paste long multi-paragraph documents, essays, or code files for instant processing.'
                ],
                [
                    'question' => 'Is my text confidential and safe?',
                    'answer' => 'Yes! All text reversal is computed locally in your web browser. Nothing is uploaded to any remote server.'
                ]
            ],

            // Whitespace Remover FAQs
            'Whitespace Remover' => [
                [
                    'question' => 'What is a Whitespace Remover tool?',
                    'answer' => 'A Whitespace Remover cleans up formatted text by stripping out unnecessary double spaces, trailing spaces, tabs, and unwanted line breaks.'
                ],
                [
                    'question' => 'Why should I remove extra spaces from text and code?',
                    'answer' => 'Extra spaces can cause syntax errors in code (like JSON or Python), formatting bugs in databases, and unappealing typography in published articles.'
                ],
                [
                    'question' => 'Can I remove line breaks from text copied from a PDF?',
                    'answer' => 'Yes! Select the <strong>Remove Line Breaks</strong> option to convert broken PDF text columns into a clean, continuous paragraph.'
                ],
                [
                    'question' => 'How do I trim leading and trailing spaces?',
                    'answer' => 'Choose the <strong>Trim Leading/Trailing Spaces</strong> mode to clean up whitespace at the start and end of lines while leaving spacing between words intact.'
                ],
                [
                    'question' => 'Does the Whitespace Remover work on mobile devices?',
                    'answer' => 'Yes, our tool is fully responsive and functions on all mobile browsers, tablets, and desktops.'
                ]
            ],

            // Lorem Ipsum Generator FAQs
            'Lorem Ipsum Generator' => [
                [
                    'question' => 'What is Lorem Ipsum dummy text?',
                    'answer' => 'Lorem Ipsum is standard placeholder text used in typography, graphic design, and web development to demonstrate visual layout without distracting from real content.'
                ],
                [
                    'question' => 'Where does Lorem Ipsum come from?',
                    'answer' => 'Lorem Ipsum originates from sections 1.10.32 and 1.10.33 of Cicero\'s classical Latin literature piece <em>"de Finibus Bonorum et Malorum"</em> written in 45 BC.'
                ],
                [
                    'question' => 'Can I generate Lorem Ipsum text with HTML tags?',
                    'answer' => 'Yes! Our generator allows you to output raw text or wrap placeholder copy automatically in HTML <code>&lt;p&gt;</code> paragraph tags for quick integration into web templates.'
                ],
                [
                    'question' => 'Is Lorem Ipsum text free to use for commercial projects?',
                    'answer' => 'Yes! Lorem Ipsum is in the public domain and completely free to use for both personal and commercial design projects.'
                ],
                [
                    'question' => 'Why should designers use placeholder text instead of real content during early stages?',
                    'answer' => 'Placeholder text prevents reviewers from focusing on copy editing during initial wireframe discussions, allowing stakeholders to focus exclusively on grid layout, typography, and visual hierarchy.'
                ]
            ]
        ];

        foreach ($faqRecords as $groupName => $faqs) {
            Faq::where('group_name', $groupName)->delete();

            foreach ($faqs as $f) {
                Faq::create([
                    'group_name' => $groupName,
                    'question' => $f['question'],
                    'answer' => $f['answer'],
                ]);
            }
        }

        // ----------------------------------------------------------------------
        // 3. SEO METADATA OPTIMIZATION (seos TABLE)
        // ----------------------------------------------------------------------

        $seoData = [
            '/' => [
                'title' => 'Free Online Text Tools – Case Converter, Word Counter & More',
                'description' => 'Free online text processing tools for developers, writers, and content creators. Convert case, count words, generate secure passwords, and format text instantly.',
                'keywords' => 'online text tools, text tools, free text utilities, case converter, word counter, password generator',
                'canonical' => $domain . '/',
            ],
            '/tools' => [
                'title' => 'All Free Online Text Processing Tools | ToolIt',
                'description' => 'Browse our complete suite of free online text processing tools. Fast, secure, browser-based utilities for text formatting, case conversion, and word counting.',
                'keywords' => 'text tools directory, free online text utilities, developer tools, writing tools, text formatting',
                'canonical' => $domain . '/tools',
            ],
            '/tools/case-converter' => [
                'title' => 'Free Online Case Converter – Uppercase, Lowercase, Title Case',
                'description' => 'Convert text case instantly online. Convert to UPPERCASE, lowercase, Title Case, Sentence case, camelCase, PascalCase, snake_case, and kebab-case for free.',
                'keywords' => 'case converter, uppercase converter, lowercase converter, title case, camelcase converter, convert text case',
                'canonical' => $domain . '/tools/case-converter',
            ],
            '/tools/word-counter' => [
                'title' => 'Free Word Counter & Character Counter Tool',
                'description' => 'Count words, characters, sentences, and paragraphs in real time. Perfect for essay writing, social media posts, blog editing, and SEO word limits.',
                'keywords' => 'word counter, character counter, count words online, sentence counter, paragraph counter, text length checker',
                'canonical' => $domain . '/tools/word-counter',
            ],
            '/tools/password-generator' => [
                'title' => 'Free Strong Password Generator – Secure & Customizable',
                'description' => 'Generate strong, random, and secure passwords instantly in your browser. Customize password length, symbols, numbers, and uppercase characters with zero server storage.',
                'keywords' => 'password generator, secure password generator, random password generator, strong password tool, online password creator',
                'canonical' => $domain . '/tools/password-generator',
            ],
            '/tools/text-reverser' => [
                'title' => 'Free Online Text Reverser – Reverse Words & Letters',
                'description' => 'Reverse text, flip words, and invert character order instantly online. Simple, fast, and free client-side text reversing tool.',
                'keywords' => 'text reverser, reverse text online, flip text, backwards text generator, reverse string tool',
                'canonical' => $domain . '/tools/text-reverser',
            ],
            '/tools/whitespace-remover' => [
                'title' => 'Free Whitespace Remover & Line Trim Tool',
                'description' => 'Remove extra spaces, tabs, line breaks, and whitespace from text or code. Clean up formatted text quickly and easily.',
                'keywords' => 'whitespace remover, remove extra spaces, trim text, remove line breaks, text cleaner, space remover',
                'canonical' => $domain . '/tools/whitespace-remover',
            ],
            '/tools/lorem-ipsum-generator' => [
                'title' => 'Free Lorem Ipsum Generator – Custom Placeholder Text Tool',
                'description' => 'Generate free Lorem Ipsum dummy text by paragraphs, words, sentences, or HTML lists. Customize HTML tags and word counts instantly online.',
                'keywords' => 'lorem ipsum generator, dummy text generator, placeholder text, latin dummy text, lorem ipsum creator',
                'canonical' => $domain . '/tools/lorem-ipsum-generator',
            ],
            '/about' => [
                'title' => 'About Online Text Tools – Our Mission & Features',
                'description' => 'Learn about Online Text Tools. We provide fast, privacy-focused, browser-based text processing tools with zero registration required.',
                'keywords' => 'about online text tools, free text utilities mission, privacy text tools',
                'canonical' => $domain . '/about',
            ],
            '/contact' => [
                'title' => 'Contact Us – Online Text Tools Support & Feedback',
                'description' => 'Get in touch with the Online Text Tools team for feature requests, bug reports, or general inquiries. We reply within 24 hours.',
                'keywords' => 'contact online text tools, text tools support, feedback',
                'canonical' => $domain . '/contact',
            ],
            '/privacy-policy' => [
                'title' => 'Privacy Policy – Online Text Tools',
                'description' => 'Read our Privacy Policy. All text processing happens 100% locally in your browser. No user text or data is collected or saved on servers.',
                'keywords' => 'privacy policy, text tools privacy, data security',
                'canonical' => $domain . '/privacy-policy',
            ],
            '/terms-of-use' => [
                'title' => 'Terms of Use – Online Text Tools',
                'description' => 'Terms of Use for Online Text Tools. Learn about the terms, conditions, and acceptable usage guidelines for our free web utilities.',
                'keywords' => 'terms of use, terms of service, text tools terms',
                'canonical' => $domain . '/terms-of-use',
            ],
            '/ads-disclosure' => [
                'title' => 'Advertising & Ads Disclosure – Online Text Tools',
                'description' => 'Understand how advertising helps keep Online Text Tools 100% free for everyone. Learn about our ad policy and third-party partner disclosures.',
                'keywords' => 'ads disclosure, advertising policy, free tools funding',
                'canonical' => $domain . '/ads-disclosure',
            ]
        ];

        foreach ($seoData as $url => $s) {
            Seo::updateOrCreate(
                ['url' => $url],
                [
                    'title' => $s['title'],
                    'description' => $s['description'],
                    'keywords' => $s['keywords'],
                    'og_title' => $s['title'],
                    'og_description' => $s['description'],
                    'og_image' => 'default-og-image.png',
                    'canonical' => $s['canonical'],
                ]
            );
        }

        if (isset($this->command)) {
            $this->command->info('AdsenseContentSeeder executed successfully! High-value tool copy, FAQs, and SEO data updated.');
        }
    }
}
