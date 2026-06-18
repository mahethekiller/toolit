<!-- Support Queries Form Section -->
<section id="support" class="hf-section hf-section-alt">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="text-center mb-5">
                    <span class="hf-section-subtitle">Got Questions?</span>
                    <h2 class="hf-section-title">We are Here to <span class="hf-gradient-text">Help You</span></h2>
                    <p class="hf-section-desc">
                        Have queries about licensing, features, or custom scripts? Send us a message and our support team will get back to you shortly.
                    </p>
                </div>

                <!-- Contact Form Card -->
                <div class="hf-card p-4 p-md-5 shadow-lg border-0" style="background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(10px); border-radius: 24px;">
                    <div id="hf-form-feedback" class="mb-4 d-none"></div>

                    <form id="hf-support-form" action="{{ route('plugins.header-footer-script-adder.support') }}" method="POST">
                        @csrf
                        <input type="hidden" name="plugin_slug" value="header-and-footer-script-adder">

                        <div class="row g-4">
                            <!-- Name Field -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="support_name" class="form-label fw-semibold text-dark mb-2">Your Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border-end-0 text-muted rounded-start-pill px-3"><i class="fas fa-user"></i></span>
                                        <input type="text" id="support_name" name="name" class="form-control border-start-0 rounded-end-pill py-2.5 ps-0" placeholder="John Doe" required>
                                    </div>
                                    <div class="invalid-feedback d-block text-danger ps-2 small mt-1" id="error-name"></div>
                                </div>
                            </div>

                            <!-- Email Field -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="support_email" class="form-label fw-semibold text-dark mb-2">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border-end-0 text-muted rounded-start-pill px-3"><i class="fas fa-envelope"></i></span>
                                        <input type="email" id="support_email" name="email" class="form-control border-start-0 rounded-end-pill py-2.5 ps-0" placeholder="john@example.com" required>
                                    </div>
                                    <div class="invalid-feedback d-block text-danger ps-2 small mt-1" id="error-email"></div>
                                </div>
                            </div>

                            <!-- Subject Field -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="support_subject" class="form-label fw-semibold text-dark mb-2">Subject</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border-end-0 text-muted rounded-start-pill px-3"><i class="fas fa-pen"></i></span>
                                        <input type="text" id="support_subject" name="subject" class="form-control border-start-0 rounded-end-pill py-2.5 ps-0" placeholder="Query about Pro Features / Custom Request" required>
                                    </div>
                                    <div class="invalid-feedback d-block text-danger ps-2 small mt-1" id="error-subject"></div>
                                </div>
                            </div>

                            <!-- Message Field -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="support_message" class="form-label fw-semibold text-dark mb-2">How can we help you?</label>
                                    <textarea id="support_message" name="message" class="form-control rounded-4 p-3" rows="5" placeholder="Tell us more about your query..." required></textarea>
                                    <div class="invalid-feedback d-block text-danger ps-2 small mt-1" id="error-message"></div>
                                </div>
                            </div>

                            <!-- Math Captcha & Submit Button -->
                            <div class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-center gap-4 mt-4 pt-2">
                                <!-- Captcha Box -->
                                <div class="d-flex align-items-center bg-light border border-secondary border-opacity-10 rounded-pill p-2 px-3 shadow-sm w-100 w-md-auto">
                                    <span class="fw-bold text-dark me-3" style="font-size: 0.95rem;">
                                        <i class="fa-solid fa-calculator text-primary me-2"></i> What is {{ $num1 }} + {{ $num2 }}?
                                    </span>
                                    <input type="number" id="support_captcha" name="captcha" class="form-control text-center rounded-pill fw-bold" style="width: 80px; height: 38px; border: 1.5px solid #cbd5e1;" placeholder="?" required>
                                </div>
                                <div class="invalid-feedback d-block text-danger ps-2 small mt-1" id="error-captcha"></div>

                                <!-- Submit Button -->
                                <button type="submit" id="support-submit-btn" class="btn btn-hf-primary w-100 w-md-auto px-5 py-3 rounded-pill d-flex align-items-center justify-content-center">
                                    <span id="btn-text"><i class="fas fa-paper-plane me-2"></i> Send Query</span>
                                    <span id="btn-spinner" class="spinner-border spinner-border-sm me-2 d-none" role="status" aria-hidden="true"></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Custom Styling and AJAX Handling -->
<style>
    #hf-support-form input.form-control, 
    #hf-support-form textarea.form-control {
        border-color: #e2e8f0;
        box-shadow: none;
        transition: all 0.3s ease;
    }
    #hf-support-form input.form-control:focus, 
    #hf-support-form textarea.form-control:focus {
        border-color: var(--hf-primary);
        box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        background-color: #ffffff;
    }
    #hf-support-form .input-group-text {
        border-color: #e2e8f0;
        color: #94a3b8;
    }
    #hf-support-form input.form-control:focus + .input-group-text,
    #hf-support-form .input-group-focus .input-group-text {
        border-color: var(--hf-primary);
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('hf-support-form');
    const feedbackDiv = document.getElementById('hf-form-feedback');
    const submitBtn = document.getElementById('support-submit-btn');
    const btnText = document.getElementById('btn-text');
    const btnSpinner = document.getElementById('btn-spinner');

    if (!form) return;

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        // Clear previous errors
        document.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');
        feedbackDiv.classList.add('d-none');
        feedbackDiv.className = 'mb-4 alert';

        // Disable button & show spinner
        submitBtn.disabled = true;
        btnText.classList.add('d-none');
        btnSpinner.classList.remove('d-none');

        const formData = {
            name: document.getElementById('support_name').value,
            email: document.getElementById('support_email').value,
            subject: document.getElementById('support_subject').value,
            message: document.getElementById('support_message').value,
            captcha: document.getElementById('support_captcha').value,
            plugin_slug: 'header-and-footer-script-adder'
        };

        fetch(form.action, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
            },
            body: JSON.stringify(formData)
        })
        .then(response => {
            return response.json().then(data => {
                if (!response.ok) {
                    throw { status: response.status, data: data };
                }
                return data;
            });
        })
        .then(data => {
            // Success
            if (typeof gtag === 'function') {
                gtag('event', 'submit_support_query', {
                    'status': 'success',
                    'plugin_slug': 'header-and-footer-script-adder'
                });
            }
            console.log("GA4 Event Triggered: submit_support_query", {
                'status': 'success',
                'plugin_slug': 'header-and-footer-script-adder'
            });

            feedbackDiv.classList.remove('d-none');
            feedbackDiv.classList.add('alert-success');
            feedbackDiv.innerHTML = `<div class="d-flex align-items-center"><i class="fas fa-check-circle me-2 fs-5"></i><span>${data.message}</span></div>`;
            form.reset();
            // Scroll to feedback
            feedbackDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
        })
        .catch(err => {
            if (typeof gtag === 'function') {
                gtag('event', 'submit_support_query', {
                    'status': 'error',
                    'error_type': err.status === 422 ? 'validation' : 'server',
                    'plugin_slug': 'header-and-footer-script-adder'
                });
            }
            console.log("GA4 Event Triggered: submit_support_query", {
                'status': 'error',
                'error_type': err.status === 422 ? 'validation' : 'server',
                'plugin_slug': 'header-and-footer-script-adder'
            });

            feedbackDiv.classList.remove('d-none');
            feedbackDiv.classList.add('alert-danger');

            if (err.status === 422 && err.data.errors) {
                // Show inline errors
                let mainMessage = "Please correct the errors below.";
                for (const [key, messages] of Object.entries(err.data.errors)) {
                    const errorEl = document.getElementById(`error-${key}`);
                    if (errorEl) {
                        errorEl.textContent = messages[0];
                    }
                    if (key === 'captcha') {
                        mainMessage = messages[0];
                    }
                }
                feedbackDiv.innerHTML = `<div class="d-flex align-items-center"><i class="fas fa-exclamation-circle me-2 fs-5"></i><span>${mainMessage}</span></div>`;
            } else {
                feedbackDiv.innerHTML = `<div class="d-flex align-items-center"><i class="fas fa-exclamation-circle me-2 fs-5"></i><span>An error occurred. Please try again.</span></div>`;
            }
        })
        .finally(() => {
            // Re-enable button
            submitBtn.disabled = false;
            btnText.classList.remove('d-none');
            btnSpinner.classList.add('d-none');
        });
    });
});
</script>
