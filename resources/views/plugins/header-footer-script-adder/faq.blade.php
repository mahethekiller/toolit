<!-- FAQ Section -->
<section id="faq" class="hf-section hf-section-alt" aria-labelledby="faq-title">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center mb-5">
            <span class="hf-section-subtitle">FAQ</span>
            <h2 id="faq-title" class="hf-section-title">Frequently Asked <span class="hf-gradient-text">Questions</span></h2>
            <p class="hf-section-desc">
                Find answers to common questions about Header Footer Script Adder security, options, compatibility, and performance.
            </p>
        </div>

        <!-- Accordion row -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion accordion-flush bg-white rounded-4 shadow-sm p-3 border border-light" id="faqAccordion">
                    
                    <!-- Item 1 -->
                    <div class="accordion-item border-0 py-2">
                        <h3 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed fw-bold text-dark bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Is this plugin safe to use?
                            </button>
                        </h3>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted small">
                                Yes. All inputs are properly sanitized before storage to prevent script injection vulnerabilities, and form updates utilize strict WordPress nonce security tokens. Furthermore, editing scripts is restricted purely to verified site administrators.
                            </div>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="accordion-item border-0 py-2">
                        <h3 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed fw-bold text-dark bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Will it slow down my website?
                            </button>
                        </h3>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted small">
                                Absolutely not. The plugin is engineered to be extremely lightweight and high-performance. It executes only a single cacheable database request and runs minimal conditional page checks. The performance impact is practically zero.
                            </div>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="accordion-item border-0 py-2">
                        <h3 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed fw-bold text-dark bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Can I inject scripts to specific pages or posts only?
                            </button>
                        </h3>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted small">
                                Yes. Along with global (sitewide) loading configurations, the plugin inserts a custom metabox field directly inside your WordPress Page/Post editor. You can paste unique page-specific conversion pixel trackers or layout stylesheets there.
                            </div>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="accordion-item border-0 py-2">
                        <h3 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed fw-bold text-dark bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Does it support Gutenberg (Block Editor) and Classic Editor?
                            </button>
                        </h3>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted small">
                                Yes. It works seamlessly with both the modern Gutenberg block-editor environment and the classic tinymce rich text editor. The per-page script injector blocks are fully responsive in both editor views.
                            </div>
                        </div>
                    </div>

                    <!-- Item 5 -->
                    <div class="accordion-item border-0 py-2">
                        <h3 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed fw-bold text-dark bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Will my scripts stay if I switch themes?
                            </button>
                        </h3>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted small">
                                Yes. This is one of the primary advantages of utilizing this plugin. Your scripts are stored securely inside the WordPress database options tables, not inside the active theme's <code>header.php</code> or <code>functions.php</code>. You can switch themes at any time without losing scripts.
                            </div>
                        </div>
                    </div>

                    <!-- Item 6 -->
                    <div class="accordion-item border-0 py-2">
                        <h3 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed fw-bold text-dark bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Can I add both Google Analytics and Facebook Pixels together?
                            </button>
                        </h3>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted small">
                                Yes, absolutely. You can paste multiple scripts, track parameters, meta verification blocks, style blocks, and layout code chunks into the input boxes. Just paste them one after another.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Schema.org JSON-LD FAQ Markup -->
<script type="application/ld+json">
{
  "{{ '@' }}context": "https://schema.org",
  "{{ '@' }}type": "FAQPage",
  "mainEntity": [
    {
      "{{ '@' }}type": "Question",
      "name": "Is this plugin safe to use?",
      "acceptedAnswer": {
        "{{ '@' }}type": "Answer",
        "text": "Yes. All inputs are properly sanitized before storage to prevent script injection vulnerabilities, and form updates utilize strict WordPress nonce security tokens. Furthermore, editing scripts is restricted purely to verified site administrators."
      }
    },
    {
      "{{ '@' }}type": "Question",
      "name": "Will it slow down my website?",
      "acceptedAnswer": {
        "{{ '@' }}type": "Answer",
        "text": "Absolutely not. The plugin is engineered to be extremely lightweight and high-performance. It executes only a single cacheable database request and runs minimal conditional page checks. The performance impact is practically zero."
      }
    },
    {
      "{{ '@' }}type": "Question",
      "name": "Can I inject scripts to specific pages or posts only?",
      "acceptedAnswer": {
        "{{ '@' }}type": "Answer",
        "text": "Yes. Along with global (sitewide) loading configurations, the plugin inserts a custom metabox field directly inside your WordPress Page/Post editor. You can paste unique page-specific conversion pixel trackers or layout stylesheets there."
      }
    },
    {
      "{{ '@' }}type": "Question",
      "name": "Does it support Gutenberg (Block Editor) and Classic Editor?",
      "acceptedAnswer": {
        "{{ '@' }}type": "Answer",
        "text": "Yes. It works seamlessly with both the modern Gutenberg block-editor environment and the classic tinymce rich text editor. The per-page script injector blocks are fully responsive in both editor views."
      }
    },
    {
      "{{ '@' }}type": "Question",
      "name": "Will my scripts stay if I switch themes?",
      "acceptedAnswer": {
        "{{ '@' }}type": "Answer",
        "text": "Yes. This is one of the primary advantages of utilizing this plugin. Your scripts are stored securely inside the WordPress database options tables, not inside the active theme's header.php or functions.php. You can switch themes at any time without losing scripts."
      }
    },
    {
      "{{ '@' }}type": "Question",
      "name": "Can I add both Google Analytics and Facebook Pixels together?",
      "acceptedAnswer": {
        "{{ '@' }}type": "Answer",
        "text": "Yes, absolutely. You can paste multiple scripts, track parameters, meta verification blocks, style blocks, and layout code chunks into the input boxes. Just paste them one after another."
      }
    }
  ]
}
</script>
