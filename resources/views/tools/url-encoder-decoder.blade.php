@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4 card shadow border-0 rounded-4">
                <div class="card-body p-4">
                    <!-- Header -->
                    <h1 class="mb-3 text-center fw-bold h2">🛜 URL Encoder & Decoder</h1>
                    <p class="text-muted text-center mb-4">
                        Encode plain text strings into RFC 3986 safe parameters, or decode percent-encoded URLs instantly.
                    </p>

                    <!-- Input Text -->
                    <div class="mb-4">
                        <label for="url-input" class="form-label fw-bold">Input String</label>
                        <textarea id="url-input" class="form-control form-control-lg rounded-3" rows="8"
                            placeholder="Type or paste your text/URL here..."></textarea>
                    </div>

                    <!-- Error Alert -->
                    <div id="error-container" class="alert alert-danger d-none rounded-3 shadow-sm border-0 mb-4" role="alert">
                        <i class="fa-solid fa-circle-exclamation me-2"></i>
                        <span id="error-message">Invalid URL encoding structure</span>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex flex-wrap gap-2 mb-4">
                        <button class="btn btn-primary rounded-pill px-4" onclick="encodeUrl()">
                            🔗 URL Encode
                        </button>
                        <button class="btn btn-secondary rounded-pill px-4" onclick="decodeUrl()">
                            🔓 URL Decode
                        </button>
                        <button class="btn btn-outline-secondary rounded-pill px-3" onclick="clearAll()">
                            🗑️ Clear
                        </button>
                    </div>

                    <!-- Live Result -->
                    <div id="result-container" class="d-none">
                        <h5 class="fw-bold mb-3">Converted Output:</h5>
                        <div class="p-3 border rounded-3 bg-light overflow-auto" style="max-height: 400px;">
                            <pre id="result-text" class="text-dark mb-0" style="white-space: pre-wrap; word-break: break-all;"></pre>
                        </div>

                        <button id="copyBtn" class="btn btn-success btn-sm mt-3 rounded-pill px-3" onclick="copyResult()">
                            📋 Copy Output
                        </button>
                    </div>
                </div>
            </div>
        </div>

        @include('partials.tool-above-desc-ad')
        @if (!empty($tool->long_description))
            @include('partials.description', ['description' => $tool->long_description])
        @endif
        @include('partials.tool-below-desc-ad')
        @if (!empty($faqs) && $faqs->count() > 0)
            @include('partials.faqs', ['faqs' => $faqs])
        @endif
    </div>

    <!-- Toast -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
        <div id="copyToast" class="toast align-items-center text-bg-success border-0 shadow" role="alert">
            <div class="d-flex">
                <div class="toast-body">Converted URL copied to clipboard!</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>

    <script>
        function encodeUrl() {
            const input = document.getElementById("url-input").value;
            const errorContainer = document.getElementById("error-container");
            const resultContainer = document.getElementById("result-container");
            const resultText = document.getElementById("result-text");

            errorContainer.classList.add("d-none");
            resultContainer.classList.add("d-none");

            if (!input.trim()) return;

            try {
                const encoded = encodeURIComponent(input);
                resultText.innerText = encoded;
                resultContainer.classList.remove("d-none");
                
                if (window.trackToolExecution) {
                    window.trackToolExecution('{{ $tool->route_name ?? "tools.url-encoder-decoder" }}');
                }
            } catch (e) {
                document.getElementById("error-message").innerText = "Encoding Error: " + e.message;
                errorContainer.classList.remove("d-none");
            }
        }

        function decodeUrl() {
            const input = document.getElementById("url-input").value;
            const errorContainer = document.getElementById("error-container");
            const resultContainer = document.getElementById("result-container");
            const resultText = document.getElementById("result-text");

            errorContainer.classList.add("d-none");
            resultContainer.classList.add("d-none");

            if (!input.trim()) return;

            try {
                const decoded = decodeURIComponent(input.replace(/\+/g, ' '));
                resultText.innerText = decoded;
                resultContainer.classList.remove("d-none");
                
                if (window.trackToolExecution) {
                    window.trackToolExecution('{{ $tool->route_name ?? "tools.url-encoder-decoder" }}');
                }
            } catch (e) {
                document.getElementById("error-message").innerText = "URL Decode Error: Please check if percent encoding sequence is valid. " + e.message;
                errorContainer.classList.remove("d-none");
            }
        }

        function clearAll() {
            document.getElementById("url-input").value = "";
            document.getElementById("error-container").classList.add("d-none");
            document.getElementById("result-container").classList.add("d-none");
        }

        function copyResult() {
            const text = document.getElementById("result-text").innerText;
            navigator.clipboard.writeText(text).then(() => {
                const toastEl = document.getElementById('copyToast');
                const toast = new bootstrap.Toast(toastEl, { delay: 2000 });
                toast.show();
            });
        }
    </script>
@endsection
