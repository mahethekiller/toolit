<!-- Custom Improved Footer for Landing Page -->
<footer class="hf-footer text-light pt-5 pb-4">
    <div class="container">
        <!-- Main Footer Links Grid -->
        <div class="row g-5">
            <!-- Column 1: Brand & Socials -->
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-primary bg-opacity-20 p-2.5 rounded-3 me-2 border border-primary border-opacity-30">
                        <i class="fa-solid fa-code text-info fs-5"></i>
                    </div>
                    <span class="fs-5 fw-bold text-white font-heading">Header Footer Script Adder</span>
                </div>
                <p class="text-muted-soft small mb-4" style="line-height: 1.7; max-width: 320px;">
                    A modern, secure, and ultra-lightweight script manager for WordPress. Inject tracking codes, style sheets, and scripts without touching theme template code.
                </p>
                <!-- Social Media Links -->
                <div class="d-flex gap-3">
                    <a href="https://wordpress.org/plugins/header-and-footer-script-adder/" target="_blank" rel="noopener" class="hf-social-icon-btn" title="WordPress Plugin Directory">
                        <i class="fab fa-wordpress-simple"></i>
                    </a>
                    <a href="https://github.com/mahethekiller" target="_blank" rel="noopener" class="hf-social-icon-btn" title="GitHub Profile">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="https://www.buymeacoffee.com/mahethekiller" target="_blank" rel="noopener" class="hf-social-icon-btn" title="Buy Me a Coffee">
                        <i class="fas fa-coffee"></i>
                    </a>
                </div>
            </div>

            <!-- Column 2: Quick Navigation -->
            <div class="col-lg-2 col-md-3 col-6">
                <h5 class="text-white fs-6 fw-bold mb-3 text-uppercase tracking-wider" style="letter-spacing: 0.05em;">Plugin</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#features" class="hf-footer-link small">Features</a></li>
                    <li class="mb-2"><a href="#use-cases" class="hf-footer-link small">Common Uses</a></li>
                    <li class="mb-2"><a href="#how-it-works" class="hf-footer-link small">How it Works</a></li>
                    <li class="mb-2"><a href="#reviews" class="hf-footer-link small">Reviews</a></li>
                    <li class="mb-2"><a href="#faq" class="hf-footer-link small">FAQ</a></li>
                    <li class="mb-2"><a href="#support" class="hf-footer-link small">Support Form</a></li>
                </ul>
            </div>

            <!-- Column 3: Site links -->
            <div class="col-lg-2 col-md-3 col-6">
                <h5 class="text-white fs-6 fw-bold mb-3 text-uppercase tracking-wider" style="letter-spacing: 0.05em;">Website</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ url('/') }}" class="hf-footer-link small">Home</a></li>
                    <li class="mb-2"><a href="{{ url('/tools') }}" class="hf-footer-link small">All Tools</a></li>
                    <li class="mb-2"><a href="{{ url('/about') }}" class="hf-footer-link small">About Us</a></li>
                    <li class="mb-2"><a href="{{ url('/contact') }}" class="hf-footer-link small">Contact</a></li>
                </ul>
            </div>

            <!-- Column 4: Help & Support -->
            <div class="col-lg-4 col-md-6">
                <h5 class="text-white fs-6 fw-bold mb-3 text-uppercase tracking-wider" style="letter-spacing: 0.05em;">Support & Coffee</h5>
                <!-- Buy me a Coffee promo card in Footer -->
                <div class="hf-footer-promo-card rounded-4 p-3 border border-secondary border-opacity-20 bg-dark bg-opacity-40">
                    <div class="d-flex align-items-center mb-2">
                        <i class="fas fa-coffee text-warning me-2 fs-5"></i>
                        <span class="fw-bold text-white small">Support Development</span>
                    </div>
                    <p class="text-muted-soft small mb-3">
                        This plugin is 100% free. If you find it helpful, please consider supporting future updates!
                    </p>
                    <a href="https://www.buymeacoffee.com/mahethekiller" target="_blank" rel="noopener" class="btn btn-warning btn-sm fw-bold w-100 rounded-pill py-2 text-dark">
                        <i class="fas fa-heart me-1 text-danger"></i> Buy Me a Coffee
                    </a>
                </div>
            </div>
        </div>

        <hr class="my-4 border-secondary border-opacity-10">

        <!-- Bottom Copyright Area -->
        <div class="row align-items-center justify-content-between g-3">
            <div class="col-md-6 text-center text-md-start">
                <span class="text-muted-soft small">&copy; {{ date('Y') }} <a href="{{ url('/') }}" class="text-light-soft text-decoration-none hover-white">OnlineTXTtools.com</a>. All rights reserved.</span>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <div class="d-flex flex-wrap justify-content-center justify-content-md-end gap-3 text-muted-soft" style="font-size: 0.8rem;">
                    <a href="{{ route('privacy.policy') }}" class="hf-footer-link small">Privacy Policy</a>
                    <span>&bull;</span>
                    <a href="{{ route('terms.use') }}" class="hf-footer-link small">Terms of Use</a>
                    <span>&bull;</span>
                    <a href="https://wordpress.org/support/plugin/header-and-footer-script-adder/" target="_blank" rel="noopener" class="hf-footer-link small">Support Forum</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    /* Premium Footer Styles */
    .hf-footer {
        background-color: #0b0f19; /* Sleek rich dark */
        border-top: 1px solid rgba(255, 255, 255, 0.05);
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .hf-footer-link {
        color: #94a3b8; /* Soft slate text */
        text-decoration: none;
        transition: all 0.2s ease;
        display: inline-block;
    }

    .hf-footer-link:hover {
        color: var(--bs-info) !important;
        transform: translateX(3px);
    }

    .hf-social-icon-btn {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.08);
        color: #94a3b8;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .hf-social-icon-btn:hover {
        background-color: var(--bs-primary);
        border-color: var(--bs-primary);
        color: #ffffff !important;
        transform: translateY(-3px);
    }

    .hf-footer-promo-card {
        background: linear-gradient(135deg, rgba(30, 41, 59, 0.4) 0%, rgba(15, 23, 42, 0.6) 100%);
    }

    .text-muted-soft {
        color: #94a3b8 !important;
    }

    .text-light-soft {
        color: #cbd5e1 !important;
    }

    .hover-white:hover {
        color: #ffffff !important;
    }

    .font-heading {
        font-family: 'Outfit', sans-serif;
    }
</style>
