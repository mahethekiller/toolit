<!-- Custom Header Navbar for Landing Page -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top border-bottom border-secondary border-opacity-10 py-3" role="navigation">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center fw-bold" href="{{ url('/') }}">
            <i class="fa-solid fa-code me-2 text-info" aria-hidden="true"></i>
            <span class="text-white">Header Footer Script Adder</span>
        </a>
        
        <!-- Toggle button for mobile -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#landingNavbar"
            aria-controls="landingNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="landingNavbar">
            <ul class="navbar-nav ms-auto align-items-center gap-2 mt-3 mt-lg-0">
                <li class="nav-item"><a class="nav-link text-white-50 hover-link" href="#features">Features</a></li>
                <li class="nav-item"><a class="nav-link text-white-50 hover-link" href="#use-cases">Use Cases</a></li>
                <li class="nav-item"><a class="nav-link text-white-50 hover-link" href="#how-it-works">How It Works</a></li>
                <li class="nav-item"><a class="nav-link text-white-50 hover-link" href="#pricing">Pricing</a></li>
                <li class="nav-item"><a class="nav-link text-white-50 hover-link" href="#reviews">Reviews</a></li>
                <li class="nav-item"><a class="nav-link text-white-50 hover-link" href="#faq">FAQ</a></li>
                <li class="nav-item"><a class="nav-link text-white-50 hover-link" href="#support">Support</a></li>
                <li class="nav-item ms-lg-2">
                    <a href="#pricing" class="btn btn-info btn-sm text-dark fw-bold rounded-pill px-4 py-2 shadow-sm">
                        <i class="fas fa-rocket me-1"></i> Go Pro Free
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .hover-link:hover {
        color: var(--bs-info) !important;
        transition: color 0.2s ease;
    }
</style>
