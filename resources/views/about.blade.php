@extends('layouts.app')
@section('content')
<div class="container py-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">About Us</li>
        </ol>
    </nav>

    <!-- Hero Section -->
    <div class="text-center mb-5">
        <h1 class="fw-bold">About Us</h1>
        <p class="lead text-muted">Who we are and why we built this platform</p>
    </div>

    <!-- Mission and Vision -->
    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <img src="{{ asset('images/our-mission-online-txt-tools.jpg') }}" alt="Our Mission" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
            <h2 class="fw-bold">Our Mission</h2>
            <p>
                At <strong>Online Text Tools</strong>, our mission is to make everyday tasks simpler by
                providing easy-to-use online tools that save time and increase productivity.
            </p>
            <p>
                We believe in building tools that are free, accessible, and reliable for everyone.
            </p>
        </div>
    </div>

    <div class="row align-items-center mb-5 flex-md-row-reverse">
        <div class="col-md-6">
            <img src="{{ asset('images/our-vision-online-txt-tools.jpg') }}" alt="Our Vision" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
            <h2 class="fw-bold">Our Vision</h2>
            <p>
                Our vision is to become a trusted platform where users can find solutions for text,
                SEO, file management, and more – all in one place.
            </p>
            <p>
                We aim to keep expanding our tool library while maintaining simplicity and
                effectiveness.
            </p>
        </div>
    </div>

    <!-- Why Choose Us -->
    <div class="text-center mb-5">
        <h2 class="fw-bold">Why Choose Us?</h2>
        <p class="text-muted">Here’s what makes us different:</p>
    </div>
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="p-4 border rounded shadow-sm h-100">
                <h4>✅ Easy to Use</h4>
                <p>Our tools are designed for simplicity – no technical knowledge required.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="p-4 border rounded shadow-sm h-100">
                <h4>⚡ Fast & Reliable</h4>
                <p>Get results instantly without unnecessary delays or ads interruptions.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="p-4 border rounded shadow-sm h-100">
                <h4>🔒 Secure</h4>
                <p>We respect your privacy – no data is stored, shared, or misused.</p>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="text-center mt-5">
        <h3 class="fw-bold">Want to know more?</h3>
        <p>Check out our <a href="{{ route('contact') }}">Contact Page</a> to reach us directly.</p>
    </div>
</div>
@endsection
