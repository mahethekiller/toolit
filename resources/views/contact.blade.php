@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg rounded-4 border-0">
                    <div class="card-body p-5">
                        <!-- Header -->
                        <h1 class="mb-3 text-center fw-bold">📬 Contact Us</h1>
                        <p class="text-center text-muted mb-4">
                            Have questions or feedback? We’d love to hear from you! Fill out the form below.
                        </p>

                        <!-- Success Message -->
                        @if (session('success'))
                            <div class="alert alert-success mt-4 text-center">
                                 {{ session('success') }}
                            </div>
                        @endif

                        <!-- Error Message -->
                        @if ($errors->any())
                            <div class="alert alert-danger mt-4 text-center">
                                {{ implode('', $errors->all(':message')) }}
                            </div>
                        @endif


                        <!-- Contact Form -->
                        <form action="{{ route('contact.send') }}" method="POST" id="contactForm">
                            @csrf

                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold">Your Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control form-control-lg rounded-3" placeholder="Your name"
                                    value="{{ old('name') }}" required>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Email Address</label>
                                <input type="email" name="email" id="email"
                                    class="form-control form-control-lg rounded-3" placeholder="email address"
                                    value="{{ old('email') }}" required>
                            </div>

                            <!-- Subject -->
                            <div class="mb-3">
                                <label for="subject" class="form-label fw-bold">Subject</label>
                                <input type="text" name="subject" id="subject"
                                    class="form-control form-control-lg rounded-3" placeholder="Subject of your message"
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

            <!-- Optional Sidebar / Info -->
            <div class="col-lg-4 d-none d-lg-block">
                <div class="card shadow-sm rounded-4 border-0 p-4 bg-light">
                    <h5 class="fw-bold mb-3">Contact Information</h5>
                    <p><i class="fas fa-map-marker-alt me-2"></i>123 Tool Street, Tech City, India</p>
                    <p><i class="fas fa-phone me-2"></i>+91 12345 67890</p>
                    <p><i class="fas fa-envelope me-2"></i>support@toolsite.com</p>
                    <hr>
                    <h6 class="fw-bold mb-2">Follow Us</h6>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-decoration-none text-primary fs-5"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-decoration-none text-info fs-5"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-decoration-none text-danger fs-5"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-decoration-none text-primary fs-5"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Optional: Simple client-side validation or toast notification
        const form = document.getElementById('contactForm');
        form.addEventListener('submit', function() {
            // Could add spinner or disable button here
        });
    </script>
@endsection
