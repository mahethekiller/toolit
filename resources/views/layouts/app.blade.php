<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @php
        $seo = getSeo(); // gets SEO for current page automatically
        $domain = config('app.url');
    @endphp

    <title>{{  $seo->title ?? 'ToolSite - Smart, simple, and free online tools to save your time.' }}</title>
    <meta name="description" content="{{ $seo->description ?? 'Smart, simple, and free online tools to save your time.' }}">
    <meta name="keywords" content="{{ $seo->keywords ?? implode(', ', array_unique(array_merge([
        'tools',
        'online tools',
        'free online tools',
        'smart tools',
        'simple tools',
    ], array_filter(explode(' ', $seo->title ?? ''))))) }}">

    @if ($seo)
        <meta property="og:title" content="{{ $seo->og_title ?? $seo->title }}">
        <meta property="og:description" content="{{ $seo->og_description ?? $seo->description }}">
        <meta property="og:image" content="{{ $seo->og_image ? url($seo->og_image) : url('/default-og-image.png') }}">
        <link rel="canonical" href="{{ $seo->canonical ?? url()->current() }}">
    @endif
    <meta name="author" content="mahethekiller">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('storage/fevicon.png') }}">


    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar {
            padding: 0.8rem 1rem;
        }

        .navbar-brand {
            font-weight: bold;
            color: #0d6efd !important;
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
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fa-solid fa-toolbox me-2"></i> ToolSite
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
    <main class="container py-4">
        <div class="row">
            <!-- Sidebar (hidden if $showSidebar is false) -->
            @if (!isset($showSidebar) || $showSidebar)
                <aside class="col-md-3 d-none d-md-block">
                    <div class="tools-sidebar bg-white rounded shadow-sm p-3">
                        <h6 class="fw-bold mb-3">🛠 Popular Tools</h6>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('tools.case-converter') }}" class="text-decoration-none">🔠 Case
                                    Converter</a></li>
                            <li><a href="{{ route('tools.wordcounter') }}" class="text-decoration-none">📝 Word
                                    Counter</a></li>
                            <li><a href="{{ route('tools.password') }}" class="text-decoration-none">🔑 Password
                                    Generator</a></li>
                            <li><a href="{{ route('tools.textreverser') }}" class="text-decoration-none">↩️ Text Reverser</a></li>
                            <li><a href="{{ route('tools.whitespace') }}" class="text-decoration-none">✂️ Whitespace Remover</a></li>


                        </ul>
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
        </div>
    </main>


    <!-- Footer -->
    <footer class="border-top py-3 text-center">
        <small>© {{ date('Y') }} ToolSite. All Rights Reserved.</small>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
