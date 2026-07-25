<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @php
        $seo = $seo ?? getSeo(); // might be null
        $domain = config('app.url');
    @endphp

    <!-- Dynamic SEO Tags -->
    <title>{{ $seo->title ?? 'Free Online Text Tools – Case Converter, Word Counter & More' }}</title>
    <meta name="description"
        content="{{ $seo->description ?? 'Use free online text tools like Case Converter, Word Counter, Password Generator, Text Reverser & Whitespace Remover. Fast, easy & no sign-up needed!' }}">
    <meta name="keywords"
        content="{{ $seo->keywords ?? 'tools, online tools, free online tools, smart tools, simple tools' }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Online Text Tools">
    <meta property="og:title" content="{{ $seo->og_title ?? ($seo->title ?? 'Online Text Tools') }}">
    <meta property="og:description"
        content="{{ $seo->og_description ?? ($seo->description ?? 'Free smart online tools') }}">
    <meta property="og:url" content="{{ $seo->canonical ?? url()->current() }}">
    <meta property="og:image"
        content="{{ isset($seo->og_image) && $seo->og_image ? url($seo->og_image) : url('/default-og-image.png') }}">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seo->title ?? 'Online Text Tools' }}">
    <meta name="twitter:description"
        content="{{ $seo->description ?? 'Smart, simple, and free online tools to save your time.' }}">
    <meta name="twitter:image"
        content="{{ isset($seo->og_image) && $seo->og_image ? url($seo->og_image) : url('/default-og-image.png') }}">

    <!-- Canonical -->
    <link rel="canonical" href="{{ $seo->canonical ?? url()->current() }}">

    <!-- Author -->
    <meta name="author" content="mahethekiller">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('fevicon.png') }}">

    <!-- Resource Preconnects -->
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>

    {{-- CUSTOM SCRIPTS --}}
    @php $siteScripts = \App\Models\SiteScript::first(); @endphp
    @if ($siteScripts && $siteScripts->head_code)
        {!! $siteScripts->head_code !!}
    @endif

    {{-- CUSTOM SCRIPTS --}}

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- Schema.org JSON-LD -->
    <script type="application/ld+json">
@php
    $jsonLd = [
        "@context" => "https://schema.org",
        "@type" => "WebSite",
        "name" => "Online Text Tools",
        "url" => $domain,
        "potentialAction" => [
            "@type" => "SearchAction",
            "target" => $domain . "/tools?q={search_term_string}",
            "query-input" => "required name=search_term_string"
        ]
    ];
@endphp

{!! json_encode($jsonLd, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT) !!}
</script>

    {{-- WebApplication & Breadcrumb Schema for Tool Pages --}}
    @if(request()->is('tools/*') || isset($tool))
    @php
        $toolName = isset($tool->name) && $tool->name ? $tool->name : ($seo->title ?? 'Online Text Tool');
        $toolDesc = isset($tool->description) && $tool->description ? $tool->description : ($seo->description ?? 'Free online text processing tool.');
        $toolUrl = isset($seo->canonical) && $seo->canonical ? $seo->canonical : url()->current();
        $toolIcon = isset($tool->icon) && $tool->icon ? asset('uploads/tools/icons/' . $tool->icon) : asset('fevicon.png');

        $webAppSchema = [
            "@context" => "https://schema.org",
            "@type" => "WebApplication",
            "name" => $toolName,
            "url" => $toolUrl,
            "description" => $toolDesc,
            "applicationCategory" => "DeveloperApplication",
            "operatingSystem" => "All",
            "browserRequirements" => "Requires JavaScript. Requires HTML5.",
            "softwareVersion" => "1.0.0",
            "image" => $toolIcon,
            "offers" => [
                "@type" => "Offer",
                "price" => "0",
                "priceCurrency" => "USD"
            ]
        ];

        $breadcrumbSchema = [
            "@context" => "https://schema.org",
            "@type" => "BreadcrumbList",
            "itemListElement" => [
                [
                    "@type" => "ListItem",
                    "position" => 1,
                    "name" => "Home",
                    "item" => $domain
                ],
                [
                    "@type" => "ListItem",
                    "position" => 2,
                    "name" => "Tools",
                    "item" => url('/tools')
                ],
                [
                    "@type" => "ListItem",
                    "position" => 3,
                    "name" => $toolName,
                    "item" => $toolUrl
                ]
            ]
        ];
    @endphp

<script type="application/ld+json">
{!! json_encode($webAppSchema, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT) !!}
</script>

<script type="application/ld+json">
{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT) !!}
</script>
    @endif



</head>

<body>


    {{-- CUSTOM SCRIPTS --}}
    @if ($siteScripts && $siteScripts->body_code)
        {!! $siteScripts->body_code !!}
    @endif
    {{-- CUSTOM SCRIPTS --}}

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top" role="navigation">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <i class="fa-solid fa-toolbox me-2" aria-hidden="true"></i>
                <span>Online Text Tools</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTools" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Tools
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownTools">
                            <li><a class="dropdown-item" href="{{ route('tools.case-converter') }}">🔠 Case Converter</a></li>
                            <li><a class="dropdown-item" href="{{ route('tools.wordcounter') }}">📝 Word Counter</a></li>
                            <li><a class="dropdown-item" href="{{ route('tools.password') }}">🔑 Password Generator</a></li>
                            <li><a class="dropdown-item" href="{{ route('tools.textreverser') }}">↩️ Text Reverser</a></li>
                            <li><a class="dropdown-item" href="{{ route('tools.whitespace') }}">✂️ Whitespace Remover</a></li>
                            <li><a class="dropdown-item" href="{{ route('tools.loremipsum') }}">📄 Lorem Ipsum Generator</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ url('/tools') }}">All Tools</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/blog') }}">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main -->
    <main class="container py-4" role="main">
        <div class="row">
            <!-- Sidebar -->
            @if (!isset($showSidebar) || $showSidebar)
                <aside class="col-md-3 d-none d-md-block" aria-label="Popular Tools Sidebar">
                    <div class="tools-sidebar bg-white rounded shadow-sm p-3">
                        <h3 class="h6 fw-bold mb-3">🛠 Popular Tools</h3>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('tools.case-converter') }}" class="text-decoration-none">🔠 Case
                                    Converter</a></li>
                            <li><a href="{{ route('tools.wordcounter') }}" class="text-decoration-none">📝 Word
                                    Counter</a></li>
                            <li><a href="{{ route('tools.password') }}" class="text-decoration-none">🔑 Password
                                    Generator</a></li>
                            <li><a href="{{ route('tools.textreverser') }}" class="text-decoration-none">↩️ Text
                                    Reverser</a></li>
                            <li><a href="{{ route('tools.whitespace') }}" class="text-decoration-none">✂️ Whitespace
                                    Remover</a></li>
                            <li><a href="{{ route('tools.loremipsum') }}" class="text-decoration-none">📄 Lorem Ipsum
                                    Generator</a></li>
                        </ul>

                        {{-- Sidebar Recent Blogs --}}
                        @include('partials.sidebar-recent-blogs')
                    </div>



                </aside>
                <section class="col-md-9">
                    @yield('content')
                </section>
            @else
                <section class="col-12">
                    @yield('content')
                </section>


            @endif

            @php
                // use App\Models\Ad;
                $headerAd = App\Models\Ad::where('position', 'footer')->where('active', true)->first();
            @endphp

            @if ($headerAd)
                <div class="text-center my-3">
                    {!! $headerAd->code !!}
                </div>
            @endif
        </div>
    </main>

    @include('layouts.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>


    {{-- CUSTOM SCRIPTS --}}
    @if ($siteScripts && $siteScripts->footer_code)
        {!! $siteScripts->footer_code !!}
    @endif
    {{-- CUSTOM SCRIPTS --}}

</body>

</html>
