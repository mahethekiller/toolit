<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @php
        $seo = getSeo(); // might be null
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

    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
        }

        .navbar {
            padding: 0.8rem 1rem;
        }

        .navbar-brand {
            font-weight: bold;
            color: #0d6efd !important;
        }

        nav a {
            font-weight: 500;
        }

        main {
            min-height: 70vh;
        }

        footer {
            font-size: 0.9rem;
            background: #fff;
        }

        /* Sidebar */
        .tools-sidebar {
            position: sticky;
            top: 80px;
        }
    </style>

    <style>
    /* ===============================
   ARTICLE CONTENT STYLING
   =============================== */

.article-content {
  font-family: "Inter", "Segoe UI", Roboto, sans-serif;
  color: #2c2c2c;
  line-height: 1.8;
  font-size: 1.05rem;
  background: #fff;
  padding: 2rem;
  border-radius: 1rem;
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
}

/* Headings */
.article-content h1,
.article-content h2,
.article-content h3,
.article-content h4,
.article-content h5,
.article-content h6 {
  font-family: "Poppins", sans-serif;
  font-weight: 600;
  line-height: 1.3;
  color: #1a1a1a;
  margin-top: 2rem;
  margin-bottom: 1rem;
}

.article-content h1 {
  font-size: 2rem;
  border-bottom: 3px solid #00a86b;
  display: inline-block;
  padding-bottom: 0.3rem;
}

.article-content h2 {
  font-size: 1.6rem;
  color: #00a86b;
}

.article-content h3 {
  font-size: 1.3rem;
  color: #333;
}

/* Paragraphs */
.article-content p {
  margin-bottom: 1.2rem;
}

/* Links */
.article-content a {
  color: #00a86b;
  text-decoration: none;
  font-weight: 500;
  transition: color 0.3s ease;
}
.article-content a:hover {
  color: #007e55;
  text-decoration: underline;
}

/* Images */
.article-content img {
  max-width: 100%;
  border-radius: 0.8rem;
  margin: 1.5rem 0;
  display: block;
}

/* Lists */
.article-content ul,
.article-content ol {
  margin: 1.2rem 0 1.2rem 2rem;
}
.article-content li {
  margin-bottom: 0.6rem;
}

/* Blockquotes */
.article-content blockquote {
  border-left: 5px solid #00a86b;
  background: #f9f9f9;
  padding: 1rem 1.5rem;
  font-style: italic;
  color: #555;
  border-radius: 0.5rem;
  margin: 1.5rem 0;
}

/* Code blocks */
.article-content pre {
  background: #1e1e1e;
  color: #f8f8f2;
  padding: 1rem;
  border-radius: 0.6rem;
  overflow-x: auto;
  font-family: "Fira Code", monospace;
  font-size: 0.95rem;
}
.article-content code {
  background: #f3f3f3;
  padding: 0.2rem 0.4rem;
  border-radius: 0.3rem;
  font-family: "Fira Code", monospace;
  color: #d63384;
}

/* Tables */
.article-content table {
  width: 100%;
  border-collapse: collapse;
  margin: 1.5rem 0;
}
.article-content th,
.article-content td {
  border: 1px solid #eaeaea;
  padding: 0.8rem 1rem;
  text-align: left;
}
.article-content th {
  background: #00a86b;
  color: #fff;
  font-weight: 600;
}

/* Responsive */
@media (max-width: 768px) {
  .article-content {
    padding: 1.2rem;
    font-size: 1rem;
  }

  .article-content h1 {
    font-size: 1.6rem;
  }

  .article-content h2 {
    font-size: 1.3rem;
  }
}

</style>

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
                    <li class="nav-item"><a class="nav-link" href="{{ url('/tools') }}">All Tools</a></li>
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
                        <h2 class="h6 fw-bold mb-3">🛠 Popular Tools</h2>
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
                        </ul>

                        <div class="mt-4">
                            <div class="card shadow-sm border-0 rounded-4 p-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center">
                                        <div class="mb-3">
                                            @php
                                                // use App\Models\Ad;
                                                $headerAd = App\Models\Ad::where('position', 'sidebar')
                                                    ->where('active', true)
                                                    ->first();
                                            @endphp

                                            @if ($headerAd)
                                                <div class="text-center my-3">
                                                    {!! $headerAd->code !!}
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                                $headerAd = App\Models\Ad::where('position', 'footer')
                                                    ->where('active', true)
                                                    ->first();
                                            @endphp

                                            @if ($headerAd)
                                                <div class="text-center my-3">
                                                    {!! $headerAd->code !!}
                                                </div>
                                            @endif
        </div>
    </main>

    <!-- Footer -->
    <footer class="border-top py-3 text-center" role="contentinfo">
        <small>© {{ date('Y') }} Online Text Tools. All Rights Reserved.</small>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>


    {{-- CUSTOM SCRIPTS --}}
    @if ($siteScripts && $siteScripts->footer_code)
        {!! $siteScripts->footer_code !!}
    @endif
    {{-- CUSTOM SCRIPTS --}}

</body>

</html>
