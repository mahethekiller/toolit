@extends('layouts.app')
@section('content')
<div class="container py-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">About Online Text Tools</li>
        </ol>
    </nav>

    <!-- Hero Section -->
    <div class="text-center mb-5">
        <h1 class="fw-bold">About Online Text Tools</h1>
        <p class="lead text-muted">
            Discover why thousands of users trust our free online text tools for case conversion, word counting, password generation, and more.
        </p>
    </div>

    <!-- Mission and Vision -->
    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <img src="{{ asset('images/our-mission-online-txt-tools.jpg') }}"
                 alt="Online Text Tools mission - free case converter, word counter, password generator"
                 class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
            <h2 class="fw-bold">Our Mission</h2>
            <p>
                At <strong>Online Text Tools</strong>, our mission is to make content creation and editing
                simple for everyone. We provide <strong>free online tools</strong> such as
                <a href="{{ route('tools.case-converter') }}"><em>Case Converter</em></a>,
                <a href="{{ route('tools.wordcounter') }}"><em>Word Counter</em></a>,
                <a href="{{ route('tools.password') }}"><em>Password Generator</em></a>,
                <em><a href="{{ route('tools.textreverser') }}">Text Reverser</a></em>, and more — all designed to save time and boost productivity.
            </p>
            <p>
                We focus on creating fast, reliable, and ad-free tools that help writers, students, bloggers,
                and developers get things done quickly.
            </p>
        </div>
    </div>

    <div class="row align-items-center mb-5 flex-md-row-reverse">
        <div class="col-md-6">
            <img src="{{ asset('images/our-vision-online-txt-tools.jpg') }}"
                 alt="Vision of Online Text Tools - one stop platform for text utilities"
                 class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
            <h2 class="fw-bold">Our Vision</h2>
            <p>
                We envision becoming the go-to platform for <strong>text editing tools</strong>,
                <strong>SEO utilities</strong>, and productivity resources. Whether you need to format text,
                count characters, or clean up whitespace, we want you to find everything in one place.
            </p>
            <p>
                Our goal is to keep expanding our library of tools while maintaining a clean, intuitive user
                experience.
            </p>
        </div>
    </div>

    <!-- Why Choose Us -->
    <div class="text-center mb-5">
        <h2 class="fw-bold">Why Choose Online Text Tools?</h2>
        <p class="text-muted">Here’s why users love our platform:</p>
    </div>
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="p-4 border rounded shadow-sm h-100">
                <h4>✅ Easy to Use</h4>
                <p>Our <strong>text tools</strong> work instantly — just paste, click, and get results.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="p-4 border rounded shadow-sm h-100">
                <h4>⚡ Fast & Reliable</h4>
                <p>Enjoy instant processing with zero waiting time and no unnecessary popups.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="p-4 border rounded shadow-sm h-100">
                <h4>🔒 Secure & Private</h4>
                <p>Your data stays on your device — we never store or share your text.</p>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="text-center mt-5">
        <h3 class="fw-bold">Want to Learn More?</h3>
        <p>
            Have questions or suggestions? Visit our
            <a href="{{ route('contact') }}">Contact Page</a> — we’d love to hear from you!
        </p>
    </div>
</div>
@endsection
