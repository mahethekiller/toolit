@extends('layouts.app')

@section('content')
    <style>
        .tool-icon {
            max-width: 80px;
            max-height: 80px;
            object-fit: contain;
            display: block;
            margin: 0 auto;
        }
        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            overflow: hidden;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
        }
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 4rem 0;
            margin: -2rem -1.5rem 3rem -1.5rem;
            color: white;
        }
        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #4f46e5;
        }
        .benefit-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            color: white;
            font-size: 1.5rem;
        }
    </style>

    {{-- Hero Section --}}
    <section class="hero-section rounded-bottom-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="fw-bold display-5 mb-3">🚀 Free Online Text Tools</h1>
                    <p class="lead mb-4 opacity-90">Professional text processing tools for developers, writers, students, and content creators. No registration required - start using instantly!</p>
                    <div class="d-flex flex-wrap justify-content-center gap-3 mb-4">
                        <span class="badge bg-white text-dark px-3 py-2">⚡ Instant Processing</span>
                        <span class="badge bg-white text-dark px-3 py-2">🔒 100% Secure</span>
                        <span class="badge bg-white text-dark px-3 py-2">💯 Completely Free</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Statistics Section --}}
    <section class="container mb-5">
        <div class="row text-center g-4">
            <div class="col-md-3 col-6">
                <div class="stat-number">5+</div>
                <p class="text-muted mb-0">Text Tools</p>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-number">100%</div>
                <p class="text-muted mb-0">Free Forever</p>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-number">0</div>
                <p class="text-muted mb-0">Registration</p>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-number">∞</div>
                <p class="text-muted mb-0">Unlimited Use</p>
            </div>
        </div>
    </section>

    {{-- Benefits Section --}}
    <section class="container mb-5">
        <div class="row text-center mb-4">
            <div class="col-lg-8 mx-auto">
                <h2 class="fw-bold h3 mb-3">Why Choose Our Text Tools?</h2>
                <p class="text-muted">We provide professional-grade text processing tools with enterprise-level features, completely free of charge.</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="benefit-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h4 class="h5 fw-bold text-center">Lightning Fast</h4>
                <p class="text-muted text-center small">All tools process text instantly in your browser with zero delays. No server processing means maximum speed.</p>
            </div>
            <div class="col-md-4">
                <div class="benefit-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h4 class="h5 fw-bold text-center">100% Secure</h4>
                <p class="text-muted text-center small">Your data never leaves your computer. All processing happens locally in your browser for maximum privacy.</p>
            </div>
            <div class="col-md-4">
                <div class="benefit-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h4 class="h5 fw-bold text-center">Mobile Optimized</h4>
                <p class="text-muted text-center small">Works perfectly on all devices - desktop, tablet, and mobile. Access your tools anywhere, anytime.</p>
            </div>
        </div>
    </section>

    {{-- Tools Section --}}
    <section class="container mb-5">
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="fw-bold h3 mb-3">🛠️ Our Text Processing Tools</h2>
                <p class="text-muted">Professional tools for all your text manipulation needs. Click any tool to start using instantly.</p>
            </div>
        </div>

        <div class="row g-4">
            @php
                $tools = \App\Models\Tool::where('active', true)->get();
            @endphp

            @foreach ($tools as $tool)
                <article class="col-md-6 col-lg-4" itemscope itemtype="https://schema.org/SoftwareApplication">
                    <div class="card h-100 feature-card shadow-sm border-0 rounded-4">
                        <div class="card-body text-center p-4">
                            <div class="mb-3">
                                @if ($tool->icon)
                                    <img src="{{ asset('uploads/tools/icons/' . $tool->icon) }}"
                                         alt="{{ $tool->icon_alt ?? $tool->name . ' – free online tool' }}"
                                         class="tool-icon img-fluid"
                                         loading="lazy"
                                         itemprop="image">
                                @endif
                            </div>
                            <h3 class="fw-bold h5 mb-2" itemprop="name">{{ $tool->name }}</h3>
                            <p class="text-muted small mb-3" itemprop="description">
                                {{ $tool->description ?? 'Use this tool for your text formatting and content needs.' }}
                            </p>
                            <div class="mt-auto">
                                <a href="{{ $tool->url }}" class="btn btn-primary px-4" itemprop="url">
                                    Try Now <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    {{-- How It Works Section --}}
    <section class="container mb-5">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="fw-bold h3 mb-4">How to Use Our Tools</h2>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4 text-center">
                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                    <span class="fs-2">1</span>
                </div>
                <h4 class="h5 fw-bold">Choose Your Tool</h4>
                <p class="text-muted small">Select from our collection of specialized text processing tools designed for different needs.</p>
            </div>
            <div class="col-md-4 text-center">
                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                    <span class="fs-2">2</span>
                </div>
                <h4 class="h5 fw-bold">Input Your Text</h4>
                <p class="text-muted small">Paste or type your text into the tool. All processing happens instantly in your browser.</p>
            </div>
            <div class="col-md-4 text-center">
                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                    <span class="fs-2">3</span>
                </div>
                <h4 class="h5 fw-bold">Get Results</h4>
                <p class="text-muted small">Copy your processed text and use it anywhere. No limits, no restrictions.</p>
            </div>
        </div>
    </section>

    {{-- Use Cases Section --}}
    <section class="container mb-5">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="fw-bold h3 mb-4">Who Uses Our Tools?</h2>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3 text-center">
                <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="fas fa-code text-primary"></i>
                </div>
                <h5 class="fw-bold">Developers</h5>
                <p class="text-muted small">Format code, clean data, and prepare text for applications.</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center">
                <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="fas fa-pen text-success"></i>
                </div>
                <h5 class="fw-bold">Writers</h5>
                <p class="text-muted small">Count words, format text, and prepare content for publication.</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center">
                <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="fas fa-graduation-cap text-warning"></i>
                </div>
                <h5 class="fw-bold">Students</h5>
                <p class="text-muted small">Format essays, count words, and prepare academic papers.</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center">
                <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="fas fa-bullhorn text-info"></i>
                </div>
                <h5 class="fw-bold">Marketers</h5>
                <p class="text-muted small">Create content, format social media posts, and analyze text.</p>
            </div>
        </div>
    </section>

    {{-- Internal Links Section --}}
    <section class="container text-center mb-5">
        <div class="bg-light rounded-4 p-5">
            <h3 class="fw-bold h4 mb-3">Need Help or Have Questions?</h3>
            <p class="text-muted mb-4">Learn more about our platform and how to get the most out of our tools.</p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="{{ route('about') }}" class="btn btn-outline-primary px-4">
                    <i class="fas fa-info-circle me-2"></i>About Us
                </a>
                <a href="{{ route('contact') }}" class="btn btn-outline-primary px-4">
                    <i class="fas fa-envelope me-2"></i>Contact Support
                </a>
                <a href="/privacy-policy" class="btn btn-outline-secondary px-4">
                    <i class="fas fa-shield-alt me-2"></i>Privacy Policy
                </a>
            </div>
        </div>
    </section>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection
