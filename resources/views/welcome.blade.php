@extends('layouts.app')

@section('content')
    <style>
        .tool-icon {
            width: 80px;
            height: 80px;
            object-fit: contain;
            display: block;
            margin: 0 auto;
            transition: transform 0.3s ease;
        }
        .feature-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
            overflow: hidden;
            position: relative;
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        }
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #4f46e5, #7c3aed);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }
        .feature-card:hover::before {
            transform: scaleX(1);
        }
        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(79, 70, 229, 0.15) !important;
        }
        .feature-card:hover .tool-icon {
            transform: scale(1.1);
        }
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 5rem 0;
            margin: -2rem -1.5rem 4rem -1.5rem;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .benefit-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-size: 2rem;
            transition: transform 0.3s ease;
        }
        .benefit-icon:hover {
            transform: rotate(5deg) scale(1.1);
        }
        .gradient-text {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 3rem;
        }
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #4f46e5, #7c3aed);
            border-radius: 2px;
        }
        .floating-shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 6s ease-in-out infinite;
        }
        .shape-1 {
            width: 100px;
            height: 100px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }
        .shape-2 {
            width: 150px;
            height: 150px;
            bottom: 20%;
            right: 10%;
            animation-delay: 2s;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
        .tool-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .use-case-card {
            transition: all 0.3s ease;
            border: none;
            background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
        }
        .use-case-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
    </style>



    {{-- Hero Section --}}
    <section class="hero-section rounded-bottom-4" role="banner" aria-label="Main heading">
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="fw-bold display-4 mb-4" itemprop="headline">
                        🚀 Free Online Text Tools for Professionals
                    </h1>
                    <p class="lead mb-4 opacity-90 fs-5" itemprop="description">
                        Professional text processing tools for developers, writers, students, and content creators.
                        <strong>No registration required</strong> - start using instantly with enterprise-level features, completely free!
                    </p>
                    <div class="d-flex flex-wrap justify-content-center gap-3 mb-4" role="list" aria-label="Key features">
                        <span class="badge bg-white text-dark px-3 py-2 shadow-sm" role="listitem">⚡ Instant Browser Processing</span>
                        <span class="badge bg-white text-dark px-3 py-2 shadow-sm" role="listitem">🔒 100% Secure & Private</span>
                        <span class="badge bg-white text-dark px-3 py-2 shadow-sm" role="listitem">💯 Completely Free Forever</span>
                        <span class="badge bg-white text-dark px-3 py-2 shadow-sm" role="listitem">📱 Mobile Optimized</span>
                    </div>
                    <div class="mt-4">
                        <a href="#tools" class="btn btn-light btn-lg px-5 py-3 rounded-pill fw-semibold shadow">
                            Explore Tools <i class="fas fa-arrow-down ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Statistics Section --}}
    <section class="container mb-5" aria-label="Statistics">
        <div class="row text-center g-4">
            <div class="col-md-3 col-6">
                <div class="stat-number" aria-label="5 plus tools">5+</div>
                <p class="text-muted mb-0 fw-semibold">Professional Text Tools</p>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-number" aria-label="100 percent free">100%</div>
                <p class="text-muted mb-0 fw-semibold">Free Forever</p>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-number" aria-label="Zero registration">0</div>
                <p class="text-muted mb-0 fw-semibold">Registration Required</p>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-number" aria-label="Unlimited usage">∞</div>
                <p class="text-muted mb-0 fw-semibold">Unlimited Usage</p>
            </div>
        </div>
    </section>

    {{-- Benefits Section --}}
    <section class="container mb-5" aria-labelledby="benefits-heading">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h2 id="benefits-heading" class="fw-bold h1 mb-3 section-title gradient-text">
                    Why Professionals Choose Our Tools
                </h2>
                <p class="text-muted fs-5">
                    Enterprise-grade text processing capabilities with zero cost and maximum privacy protection.
                </p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="benefit-icon">
                    <i class="fas fa-bolt" aria-hidden="true"></i>
                </div>
                <h3 class="h4 fw-bold text-center mb-3">Lightning Fast Processing</h3>
                <p class="text-muted text-center">
                    All tools process text instantly in your browser with zero server delays.
                    <strong>Client-side processing</strong> ensures maximum speed and reliability for all your text manipulation needs.
                </p>
            </div>
            <div class="col-md-4">
                <div class="benefit-icon">
                    <i class="fas fa-shield-alt" aria-hidden="true"></i>
                </div>
                <h3 class="h4 fw-bold text-center mb-3">Maximum Security & Privacy</h3>
                <p class="text-muted text-center">
                    Your sensitive data <strong>never leaves your computer</strong>. All processing happens locally in your browser,
                    ensuring complete privacy and security for confidential documents and passwords.
                </p>
            </div>
            <div class="col-md-4">
                <div class="benefit-icon">
                    <i class="fas fa-mobile-alt" aria-hidden="true"></i>
                </div>
                <h3 class="h4 fw-bold text-center mb-3">Fully Responsive Design</h3>
                <p class="text-muted text-center">
                    Optimized for all devices - desktop, tablet, and mobile. Access your essential text tools
                    <strong>anywhere, anytime</strong> with our mobile-first responsive design.
                </p>
            </div>
        </div>
    </section>

    {{-- Tools Section --}}
    <section id="tools" class="container mb-5" aria-labelledby="tools-heading" itemscope itemtype="https://schema.org/ItemList">
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <h2 id="tools-heading" class="fw-bold h1 mb-3 section-title gradient-text">
                    🛠️ Professional Text Processing Tools
                </h2>
                <p class="text-muted fs-5">
                    Click any tool below to start processing your text instantly. All tools work completely in your browser - no data is sent to servers.
                </p>
            </div>
        </div>

        <div class="row g-4">
            @php
                $tools = \App\Models\Tool::where('active', true)->get();
            @endphp

            @foreach ($tools as $tool)
                <div class="col-md-6 col-lg-4" itemprop="itemListElement" itemscope itemtype="https://schema.org/SoftwareApplication">
                    <article class="card h-100 feature-card shadow-sm border-0 rounded-4">
                        <div class="tool-badge">
                            FREE
                        </div>
                        <div class="card-body text-center p-4 d-flex flex-column">
                            <div class="mb-3">
                                @if ($tool->icon)
                                    <img src="{{ asset('uploads/tools/icons/' . $tool->icon) }}"
                                         alt="{{ $tool->icon_alt ?? $tool->name . ' - Free online text tool for professionals' }}"
                                         class="tool-icon img-fluid"
                                         loading="lazy"
                                         itemprop="image"
                                         width="80"
                                         height="80">
                                @endif
                            </div>
                            <h3 class="fw-bold h4 mb-3" itemprop="name">{{ $tool->name }}</h3>
                            <p class="text-muted mb-4 flex-grow-1" itemprop="description">
                                {{ $tool->description ?? 'Professional tool for text formatting and content processing needs.' }}
                            </p>
                            <div class="mt-auto">
                                <a href="{{ $tool->url }}"
                                   class="btn btn-primary px-4 py-2 rounded-pill fw-semibold shadow-sm"
                                   itemprop="url"
                                   aria-label="Try {{ $tool->name }} tool">
                                    Try Tool Now <i class="fas fa-arrow-right ms-2" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </section>

    {{-- How It Works Section --}}
    <section class="container mb-5" aria-labelledby="how-it-works-heading">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 id="how-it-works-heading" class="fw-bold h1 mb-5 section-title gradient-text">
                    How to Use Our Text Tools
                </h2>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4 text-center">
                <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4"
                     style="width: 100px; height: 100px;">
                    <span class="fs-1 fw-bold text-primary">1</span>
                </div>
                <h3 class="h4 fw-bold mb-3">Choose Your Tool</h3>
                <p class="text-muted">
                    Select from our collection of specialized text processing tools designed for different professional needs and use cases.
                </p>
            </div>
            <div class="col-md-4 text-center">
                <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4"
                     style="width: 100px; height: 100px;">
                    <span class="fs-1 fw-bold text-success">2</span>
                </div>
                <h3 class="h4 fw-bold mb-3">Input Your Text</h3>
                <p class="text-muted">
                    Paste or type your text into the tool interface. All processing happens instantly in your browser with real-time preview.
                </p>
            </div>
            <div class="col-md-4 text-center">
                <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4"
                     style="width: 100px; height: 100px;">
                    <span class="fs-1 fw-bold text-warning">3</span>
                </div>
                <h3 class="h4 fw-bold mb-3">Get Instant Results</h3>
                <p class="text-muted">
                    Copy your processed text and use it immediately. No limits, no restrictions, no hidden costs - completely free forever.
                </p>
            </div>
        </div>
    </section>

    {{-- Use Cases Section --}}
    <section class="container mb-5" aria-labelledby="use-cases-heading">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 id="use-cases-heading" class="fw-bold h1 mb-5 section-title gradient-text">
                    Trusted by Professionals Worldwide
                </h2>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3 text-center">
                <div class="use-case-card rounded-4 p-4 h-100">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                        <i class="fas fa-code text-primary fs-3"></i>
                    </div>
                    <h4 class="h5 fw-bold mb-3">Developers</h4>
                    <p class="text-muted small">
                        Format code snippets, clean API data, prepare strings for applications, and process configuration files with precision.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 text-center">
                <div class="use-case-card rounded-4 p-4 h-100">
                    <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                        <i class="fas fa-pen text-success fs-3"></i>
                    </div>
                    <h4 class="h5 fw-bold mb-3">Content Writers</h4>
                    <p class="text-muted small">
                        Count words accurately, format articles, prepare content for publication, and analyze text complexity for better SEO.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 text-center">
                <div class="use-case-card rounded-4 p-4 h-100">
                    <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                        <i class="fas fa-graduation-cap text-warning fs-3"></i>
                    </div>
                    <h4 class="h5 fw-bold mb-3">Students</h4>
                    <p class="text-muted small">
                        Format academic papers, count essay words, prepare research documents, and clean up text for assignments and theses.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 text-center">
                <div class="use-case-card rounded-4 p-4 h-100">
                    <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                        <i class="fas fa-bullhorn text-info fs-3"></i>
                    </div>
                    <h4 class="h5 fw-bold mb-3">Marketers</h4>
                    <p class="text-muted small">
                        Create engaging content, format social media posts, analyze campaign text, and prepare marketing materials efficiently.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="container mb-5" aria-labelledby="cta-heading">
        <div class="bg-gradient-primary rounded-4 p-5 text-center text-white" style="background: linear-gradient(135deg, #4f46e5, #7c3aed);">
            <h2 id="cta-heading" class="fw-bold h1 mb-3">Ready to Boost Your Productivity?</h2>
            <p class="fs-5 mb-4 opacity-90">
                Join thousands of professionals who trust our tools for their daily text processing needs.
            </p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="#tools" class="btn btn-light btn-lg px-5 py-3 rounded-pill fw-semibold shadow">
                    Explore All Tools <i class="fas fa-rocket ms-2"></i>
                </a>
                <a href="{{ route('about') }}" class="btn btn-outline-light btn-lg px-5 py-3 rounded-pill fw-semibold">
                    Learn More <i class="fas fa-info-circle ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


@endsection
