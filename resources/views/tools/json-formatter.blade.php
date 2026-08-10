@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4 card shadow border-0 rounded-4">
                <div class="card-body p-4">
                    <!-- Header -->
                    <h1 class="mb-3 text-center fw-bold h2">🔠 JSON Formatter & Beautifier</h1>
                    <p class="text-muted text-center mb-4">
                        Paste your raw JSON string below to validate, format, and beautify it instantly.
                    </p>

                    <!-- Input Text -->
                    <div class="mb-4">
                        <label for="json-input" class="form-label fw-bold">Raw JSON Input</label>
                        <textarea id="json-input" class="form-control form-control-lg rounded-3 font-monospace" rows="8"
                            placeholder="Paste your JSON here..."></textarea>
                    </div>

                    <!-- Error Alert -->
                    <div id="error-container" class="alert alert-danger d-none rounded-3 shadow-sm border-0 mb-4" role="alert">
                        <i class="fa-solid fa-circle-exclamation me-2"></i>
                        <span id="error-message">Invalid JSON structure</span>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex flex-wrap gap-2 mb-4">
                        <button class="btn btn-primary rounded-pill px-4" onclick="formatJson(2)">
                            ✨ Beautify (2 Spaces)
                        </button>
                        <button class="btn btn-outline-primary rounded-pill px-4" onclick="formatJson(4)">
                            ✨ Beautify (4 Spaces)
                        </button>
                        <button class="btn btn-secondary rounded-pill px-4" onclick="minifyJson()">
                            ⚡ Minify JSON
                        </button>
                        <button class="btn btn-outline-secondary rounded-pill px-3" onclick="clearAll()">
                            🗑️ Clear
                        </button>
                    </div>

                    <!-- Live Result -->
                    <div id="result-container" class="d-none">
                        <h5 class="fw-bold mb-3">Formatted JSON Output:</h5>
                        <div class="p-3 border rounded-3 bg-light overflow-auto" style="max-height: 400px;">
                            <pre id="result-text" class="text-dark mb-0 font-monospace" style="white-space: pre-wrap; word-break: break-all;"></pre>
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
                <div class="toast-body">String copied to clipboard!</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>

    <script>
        function formatJson(spaces) {
            const input = document.getElementById("json-input").value;
            const errorContainer = document.getElementById("error-container");
            const resultContainer = document.getElementById("result-container");
            const resultText = document.getElementById("result-text");

            errorContainer.classList.add("d-none");
            resultContainer.classList.add("d-none");

            if (!input.trim()) return;

            try {
                const parsed = JSON.parse(input);
                resultText.innerText = JSON.stringify(parsed, null, spaces);
                resultContainer.classList.remove("d-none");
                
                if (window.trackToolExecution) {
                    window.trackToolExecution('{{ $tool->route_name ?? "tools.json-formatter" }}');
                }
            } catch (e) {
                document.getElementById("error-message").innerText = "JSON Syntax Error: " + e.message;
                errorContainer.classList.remove("d-none");
            }
        }

        function minifyJson() {
            const input = document.getElementById("json-input").value;
            const errorContainer = document.getElementById("error-container");
            const resultContainer = document.getElementById("result-container");
            const resultText = document.getElementById("result-text");

            errorContainer.classList.add("d-none");
            resultContainer.classList.add("d-none");

            if (!input.trim()) return;

            try {
                const parsed = JSON.parse(input);
                resultText.innerText = JSON.stringify(parsed);
                resultContainer.classList.remove("d-none");
                
                if (window.trackToolExecution) {
                    window.trackToolExecution('{{ $tool->route_name ?? "tools.json-formatter" }}');
                }
            } catch (e) {
                document.getElementById("error-message").innerText = "JSON Syntax Error: " + e.message;
                errorContainer.classList.remove("d-none");
            }
        }

        function clearAll() {
            document.getElementById("json-input").value = "";
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
