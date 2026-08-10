<footer class="bg-dark text-light pt-5 pb-4">
    <div class="container">
        <div class="row">
            <!-- Brand & Features Block (Left) -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="mb-4">
                    <a class="text-decoration-none text-white d-flex align-items-center mb-3" href="{{ url('/') }}">
                        <i class="fa-solid fa-toolbox me-2 text-primary fs-4"></i>
                        <span class="fw-bold h5 mb-0">Online Text Tools</span>
                    </a>
                    <p class="text-light-soft small leading-relaxed">
                        A curated collection of free, high-performance developer and content utility tools. All operations run 100% locally in your browser to guarantee maximum privacy.
                    </p>
                </div>

                <hr class="bg-light opacity-25 d-lg-none">

                <!-- Why Choose Us -->
                <h5 class="fw-bold mb-3 text-success small text-uppercase" style="letter-spacing: 1px;">⭐ Platform Features</h5>
                <div class="features-list">
                    <div class="d-flex align-items-start mb-2">
                        <i class="fas fa-bolt text-warning mt-1 me-2 small"></i>
                        <span class="text-light-soft small">Lightning fast browser-side execution</span>
                    </div>
                    <div class="d-flex align-items-start mb-2">
                        <i class="fas fa-shield-alt text-success mt-1 me-2 small"></i>
                        <span class="text-light-soft small">100% secure, zero server uploads</span>
                    </div>
                    <div class="d-flex align-items-start mb-2">
                        <i class="fas fa-mobile-alt text-info mt-1 me-2 small"></i>
                        <span class="text-light-soft small">Optimized responsive design</span>
                    </div>
                </div>
            </div>

            <!-- Our Text Tools Grid (Middle) -->
            <div class="col-lg-6 col-md-12 mb-4">
                <h5 class="fw-bold mb-3 text-primary text-uppercase small" style="letter-spacing: 1px;">🛠️ Our Utilities</h5>
                <div class="row">
                    <!-- Column A -->
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="https://onlinetxttools.com/tools/case-converter" class="text-decoration-none text-light hover-text d-flex align-items-center p-2 rounded hover-bg">
                                    <span class="fs-6 me-2">🔠</span>
                                    <span class="small fw-semibold">Case Converter</span>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="https://onlinetxttools.com/tools/word-counter" class="text-decoration-none text-light hover-text d-flex align-items-center p-2 rounded hover-bg">
                                    <span class="fs-6 me-2">📝</span>
                                    <span class="small fw-semibold">Word Counter</span>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="https://onlinetxttools.com/tools/password-generator" class="text-decoration-none text-light hover-text d-flex align-items-center p-2 rounded hover-bg">
                                    <span class="fs-6 me-2">🔑</span>
                                    <span class="small fw-semibold">Password Generator</span>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="https://onlinetxttools.com/tools/text-reverser" class="text-decoration-none text-light hover-text d-flex align-items-center p-2 rounded hover-bg">
                                    <span class="fs-6 me-2">↩️</span>
                                    <span class="small fw-semibold">Text Reverser</span>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="https://onlinetxttools.com/tools/whitespace-remover" class="text-decoration-none text-light hover-text d-flex align-items-center p-2 rounded hover-bg">
                                    <span class="fs-6 me-2">✂️</span>
                                    <span class="small fw-semibold">Whitespace Remover</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    <!-- Column B -->
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="https://onlinetxttools.com/tools/lorem-ipsum-generator" class="text-decoration-none text-light hover-text d-flex align-items-center p-2 rounded hover-bg">
                                    <span class="fs-6 me-2">📄</span>
                                    <span class="small fw-semibold">Lorem Ipsum Generator</span>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ route('tools.json-formatter') }}" class="text-decoration-none text-light hover-text d-flex align-items-center p-2 rounded hover-bg">
                                    <span class="fs-6 me-2">🔤</span>
                                    <span class="small fw-semibold">JSON Formatter</span>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ route('tools.duplicate-line-remover') }}" class="text-decoration-none text-light hover-text d-flex align-items-center p-2 rounded hover-bg">
                                    <span class="fs-6 me-2">✂️</span>
                                    <span class="small fw-semibold">Duplicate Line Remover</span>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ route('tools.url-encoder-decoder') }}" class="text-decoration-none text-light hover-text d-flex align-items-center p-2 rounded hover-bg">
                                    <span class="fs-6 me-2">🔗</span>
                                    <span class="small fw-semibold">URL Encoder & Decoder</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Quick Links & Statistics (Right) -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="fw-bold mb-3 text-info text-uppercase small" style="letter-spacing: 1px;">🔗 Quick Links</h5>
                <div class="row mb-4">
                    <div class="col-6">
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="/" class="text-decoration-none text-light-soft hover-text small d-block">
                                    <i class="fas fa-home me-1"></i> Home
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="/blog" class="text-decoration-none text-light-soft hover-text small d-block">
                                    <i class="fas fa-blog me-1"></i> Blog
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="/about" class="text-decoration-none text-light-soft hover-text small d-block">
                                    <i class="fas fa-info-circle me-1"></i> About
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ route('how-we-process-data') }}" class="text-decoration-none text-light-soft hover-text small d-block">
                                    <i class="fas fa-microchip me-1"></i> Security
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="{{ route('privacy.policy') }}" class="text-decoration-none text-light-soft hover-text small d-block">
                                    <i class="fas fa-shield-alt me-1"></i> Privacy
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ route('terms.use') }}" class="text-decoration-none text-light-soft hover-text small d-block">
                                    <i class="fas fa-file-contract me-1"></i> Terms
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ route('faqs') }}" class="text-decoration-none text-light-soft hover-text small d-block">
                                    <i class="fas fa-question-circle me-1"></i> FAQs
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="/contact" class="text-decoration-none text-light-soft hover-text small d-block">
                                    <i class="fas fa-envelope me-1"></i> Contact
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Usage Statistics -->
                <div class="p-3 bg-dark bg-opacity-50 rounded border border-secondary border-opacity-25 text-center">
                    <h6 class="text-warning mb-2 small fw-bold">📊 Platform Status</h6>
                    <div class="row g-1">
                        <div class="col-4">
                            <div class="text-primary fw-bold small">9+</div>
                            <small class="text-light-soft" style="font-size: 0.75rem;">Tools</small>
                        </div>
                        <div class="col-4">
                            <div class="text-success fw-bold small">100%</div>
                            <small class="text-light-soft" style="font-size: 0.75rem;">Free</small>
                        </div>
                        <div class="col-4">
                            <div class="text-info fw-bold small">No</div>
                            <small class="text-light-soft" style="font-size: 0.75rem;">Signups</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-3 bg-light opacity-25">

        <!-- Bottom Bar -->
        <div class="row align-items-center">
            <div class="col-md-6 mb-2 mb-md-0">
                <div class="d-flex align-items-center flex-wrap gap-2 justify-content-center justify-content-md-start">
                    <span class="text-light-soft small">© {{ date('Y') }} OnlineTXTtools.com</span>
                    <span class="badge bg-primary">Free Text Tools</span>
                    <a href="{{ route('data.deletion') }}" class="text-light-soft text-decoration-underline small ms-2">Data Deletion Policy</a>
                </div>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <small class="text-light-soft">
                    <i class="fas fa-lock me-1 text-success"></i>Secure •
                    <i class="fas fa-rocket me-1 text-warning"></i>Local •
                    <i class="fas fa-heart me-1 text-danger"></i>Free Forever
                </small>
            </div>
        </div>
    </div>
</footer>

<style>
.text-light-soft {
    color: rgba(203, 213, 225, 0.7) !important;
}

.hover-text:hover {
    color: rgba(255, 255, 255, 1) !important;
    transition: all 0.3s ease;
}

.hover-bg:hover {
    background: rgba(255, 255, 255, 0.08) !important;
    transition: all 0.2s ease;
}

.leading-relaxed {
    line-height: 1.6;
}

/* Custom badge styles */
.badge {
    font-size: 0.7rem;
    padding: 0.25rem 0.5rem;
}
</style>
