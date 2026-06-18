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
    <link rel="icon" type="image/png" href="{{ asset('storage/fevicon.png') }}">


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
            "target" => $domain . "/search?q={search_term_string}",
            "query-input" => "required name=search_term_string"
        ]
    ];
@endphp

{!! json_encode($jsonLd, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT) !!}
</script>


</head>

<body>


    {{-- CUSTOM SCRIPTS --}}
    @if ($siteScripts && $siteScripts->body_code)
        {!! $siteScripts->body_code !!}
    @endif
    {{-- CUSTOM SCRIPTS --}}

    <!-- Navbar -->
    @yield('header')

    <!-- Main Content Area: Fluid for full-bleed landing page sections -->
    <main role="main" class="w-100 overflow-hidden">
        @yield('content')
    </main>

    @yield('footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>


    {{-- CUSTOM SCRIPTS --}}
    @if ($siteScripts && $siteScripts->footer_code)
        {!! $siteScripts->footer_code !!}
    @endif
    {{-- CUSTOM SCRIPTS --}}

</body>

</html>
