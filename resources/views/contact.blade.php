@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg rounded-4 border-0">
                <div class="card-body p-5">
                    <!-- Header -->
                    <h1 class="mb-3 text-center fw-bold">📬 Contact Online Text Tools</h1>
                    <p class="text-center text-muted mb-4">
                        Have questions, found a bug, or want a new feature? Fill out the form below – we usually reply within 24 hours.
                    </p>

                    <!-- Success Message -->
                    @if (session('success'))
                        <div class="alert alert-success mt-4 text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="alert alert-danger mt-4">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Contact Form -->
                    <form action="{{ route('contact.send') }}" method="POST" id="contactForm">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Your Name</label>
                            <input type="text" name="name" id="name"
                                class="form-control form-control-lg rounded-3" placeholder="Enter your name"
                                value="{{ old('name') }}" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email Address</label>
                            <input type="email" name="email" id="email"
                                class="form-control form-control-lg rounded-3" placeholder="you@example.com"
                                value="{{ old('email') }}" required>
                        </div>

                        <!-- Subject -->
                        <div class="mb-3">
                            <label for="subject" class="form-label fw-bold">Subject</label>
                            <input type="text" name="subject" id="subject"
                                class="form-control form-control-lg rounded-3" placeholder="Bug report, feature request, or question"
                                value="{{ old('subject') }}" required>
                        </div>

                        <!-- Message -->
                        <div class="mb-4">
                            <label for="message" class="form-label fw-bold">Message</label>
                            <textarea name="message" id="message" rows="6" class="form-control form-control-lg rounded-3"
                                placeholder="Type your message here..." required>{{ old('message') }}</textarea>
                        </div>

                        <!-- Math CAPTCHA -->
                        <div class="mb-4">
                            <label for="captcha" class="form-label fw-bold">
                                Solve: {{ $num1 }} + {{ $num2 }} = ?
                            </label>
                            <input type="text" name="captcha" id="captcha"
                                class="form-control form-control-lg rounded-3" placeholder="Enter answer"
                                value="{{ old('captcha') }}" required>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg rounded-3">
                                ✉️ Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar / Info -->
        <div class="col-lg-4 d-none d-lg-block">
            <div class="card shadow-sm rounded-4 border-0 p-4 bg-light">
                <h5 class="fw-bold mb-3">Why Contact Us?</h5>
                <ul class="list-unstyled">
                    <li>✅ Report a bug or broken tool</li>
                    <li>✅ Suggest new features or tools</li>
                    <li>✅ Share feedback to improve user experience</li>
                    <li>✅ Ask questions about text converters</li>
                </ul>
                <hr>
                {{-- <h6 class="fw-bold mb-2">Connect with Us</h6>
                <p class="mb-2"><i class="fas fa-envelope me-2"></i>support@onlinetxttools.com</p>
                <div class="d-flex gap-3">
                    <a href="#" class="text-decoration-none text-primary fs-5"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-decoration-none text-info fs-5"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-decoration-none text-danger fs-5"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-decoration-none text-primary fs-5"><i class="fab fa-linkedin"></i></a>
                </div> --}}
            </div>
        </div>
    </div>
</div>


<script>
    // Optional: Add a simple loading state when form is submitted
    document.getElementById('contactForm').addEventListener('submit', function () {
        const btn = this.querySelector('button[type="submit"]');
        btn.disabled = true;
        btn.innerHTML = '⏳ Sending...';
    });
</script>
@endsection
