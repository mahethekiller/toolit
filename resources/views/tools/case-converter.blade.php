@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-12">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-5">
                        <!-- Header -->
                        <h2 class="mb-3 text-center fw-bold">🔠 Case Converter</h2>
                        <p class="text-muted text-center mb-5">
                            Type your text, choose a style, and see the result instantly.
                        </p>

                        <div class="row">
                            <!-- Input Section -->
                            <div class="col-lg-6 mb-4">
                                <form method="POST" action="">
                                    @csrf

                                    <!-- Input Text -->
                                    <div class="mb-4">
                                        <label for="text" class="form-label fw-bold">Your Text</label>
                                        <textarea id="text" name="text" class="form-control form-control-lg rounded-3" rows="12"
                                            placeholder="Type or paste your text here...">{{ $text ?? '' }}</textarea>
                                    </div>

                                    <!-- Conversion Options -->
                                    <div class="mb-4">
                                        <label class="form-label fw-bold">Conversion Mode</label>
                                        <div class="row g-2">
                                            <div class="col-6">
                                                <input type="radio" class="btn-check" name="mode" id="upper"
                                                    value="upper" {{ ($mode ?? '') == 'upper' ? 'checked' : '' }}>
                                                <label class="btn btn-outline-primary w-100 mb-2" for="upper">🔼 UPPERCASE</label>
                                            </div>
                                            <div class="col-6">
                                                <input type="radio" class="btn-check" name="mode" id="lower"
                                                    value="lower" {{ ($mode ?? '') == 'lower' ? 'checked' : '' }}>
                                                <label class="btn btn-outline-primary w-100 mb-2" for="lower">🔽 lowercase</label>
                                            </div>
                                            <div class="col-6">
                                                <input type="radio" class="btn-check" name="mode" id="title"
                                                    value="title" {{ ($mode ?? '') == 'title' ? 'checked' : '' }}>
                                                <label class="btn btn-outline-primary w-100 mb-2" for="title">📝 Title Case</label>
                                            </div>
                                            <div class="col-6">
                                                <input type="radio" class="btn-check" name="mode" id="sentence"
                                                    value="sentence" {{ ($mode ?? '') == 'sentence' ? 'checked' : '' }}>
                                                <label class="btn btn-outline-primary w-100 mb-2" for="sentence">💬 Sentence case</label>
                                            </div>
                                            <div class="col-6">
                                                <input type="radio" class="btn-check" name="mode" id="camel"
                                                    value="camel" {{ ($mode ?? '') == 'camel' ? 'checked' : '' }}>
                                                <label class="btn btn-outline-primary w-100 mb-2" for="camel">🐫 camelCase</label>
                                            </div>
                                            <div class="col-6">
                                                <input type="radio" class="btn-check" name="mode" id="pascal"
                                                    value="pascal" {{ ($mode ?? '') == 'pascal' ? 'checked' : '' }}>
                                                <label class="btn btn-outline-primary w-100 mb-2" for="pascal">🏛️ PascalCase</label>
                                            </div>
                                            <div class="col-6">
                                                <input type="radio" class="btn-check" name="mode" id="snake"
                                                    value="snake" {{ ($mode ?? '') == 'snake' ? 'checked' : '' }}>
                                                <label class="btn btn-outline-primary w-100 mb-2" for="snake">🐍 snake_case</label>
                                            </div>
                                            <div class="col-6">
                                                <input type="radio" class="btn-check" name="mode" id="kebab"
                                                    value="kebab" {{ ($mode ?? '') == 'kebab' ? 'checked' : '' }}>
                                                <label class="btn btn-outline-primary w-100 mb-2" for="kebab">🍢 kebab-case</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit Button (optional fallback) -->
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-lg rounded-3">
                                            ⚡ Convert Text
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <!-- Result Section -->
                            <div class="col-lg-6 mb-4">
                                <h5 class="fw-bold mb-3">Result:</h5>
                                <div class="p-4 border rounded-3 bg-light" style="min-height: 300px;">
                                    <!-- Result Text -->
                                    <div id="result-text" class="text-muted mb-3 p-3 bg-white rounded-3"
                                        style="white-space: pre-wrap; word-wrap: break-word; overflow-wrap: anywhere; min-height: 200px; max-height: 350px; overflow-y: auto; font-size: 1.1rem;">
                                        ✍️ Start typing to see the result...
                                    </div>

                                    <!-- Copy Button -->
                                    <div class="d-flex justify-content-end">
                                        <button id="copyBtn" class="btn btn-outline-secondary btn-sm d-none"
                                            onclick="copyResult()">📋 Copy</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @include('partials.tool-above-desc-ad')

            @if (!empty($tool->long_description))
                @include('partials.description', ['description' => $tool->long_description])
            @endif
            @include('partials.tool-below-desc-ad')
            @if (!empty($faqs) && $faqs->count() > 0)
                @include('partials.faqs', ['faqs' => $faqs])
            @endif
        </div>
    </div>

    <!-- Toast (Notification) -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
        <div id="copyToast" class="toast align-items-center text-bg-success border-0 shadow" role="alert"
            aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">✅ Result copied to clipboard!</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>

    <script>
        // Convert to Title Case
        function toTitleCase(str) {
            return str.toLowerCase().replace(/\b\w/g, char => char.toUpperCase());
        }

        // Convert to Sentence case
        function toSentenceCase(str) {
            return str.toLowerCase().replace(/(^\s*|[.!?]\s+)\w/g, match => match.toUpperCase());
        }

        // Convert to camelCase
        function toCamelCase(str) {
            return str.toLowerCase()
                .replace(/[^a-zA-Z0-9]+(.)/g, (_, char) => char.toUpperCase())
                .replace(/[^a-zA-Z0-9]/g, '');
        }

        // Convert to PascalCase
        function toPascalCase(str) {
            const camel = toCamelCase(str);
            return camel.charAt(0).toUpperCase() + camel.slice(1);
        }

        // Convert to snake_case
        function toSnakeCase(str) {
            return str.toLowerCase()
                .replace(/\s+/g, '_')
                .replace(/[^a-zA-Z0-9_]/g, '');
        }

        // Convert to kebab-case
        function toKebabCase(str) {
            return str.toLowerCase()
                .replace(/\s+/g, '-')
                .replace(/[^a-zA-Z0-9-]/g, '');
        }

        // Update result instantly
        function updateResult() {
            let text = document.getElementById("text").value;
            let mode = document.querySelector('input[name="mode"]:checked')?.value;

            let resultText = document.getElementById("result-text");
            let copyBtn = document.getElementById("copyBtn");

            if (!text.trim()) {
                resultText.innerText = "✍️ Start typing to see the result...";
                resultText.classList.add("text-muted");
                copyBtn.classList.add("d-none");
                return;
            }

            let output = text;
            switch (mode) {
                case "upper":
                    output = text.toUpperCase();
                    break;
                case "lower":
                    output = text.toLowerCase();
                    break;
                case "title":
                    output = toTitleCase(text);
                    break;
                case "sentence":
                    output = toSentenceCase(text);
                    break;
                case "camel":
                    output = toCamelCase(text);
                    break;
                case "pascal":
                    output = toPascalCase(text);
                    break;
                case "snake":
                    output = toSnakeCase(text);
                    break;
                case "kebab":
                    output = toKebabCase(text);
                    break;
            }

            resultText.innerText = output;
            resultText.classList.remove("text-muted");
            copyBtn.classList.remove("d-none");
        }

        // Copy result
        function copyResult() {
            let btn = document.getElementById("copyBtn");
            let text = document.getElementById("result-text").innerText;

            navigator.clipboard.writeText(text).then(() => {
                // Change button text temporarily
                btn.innerText = "✅ Copied!";
                setTimeout(() => btn.innerText = "📋 Copy", 2000);

                // Show toast as well
                let toastEl = document.getElementById('copyToast');
                let toast = new bootstrap.Toast(toastEl, {
                    delay: 3000
                });
                toast.show();
            });
        }

        // Event listeners
        document.getElementById("text").addEventListener("input", updateResult);
        document.querySelectorAll('input[name="mode"]').forEach(radio => {
            radio.addEventListener("change", updateResult);
        });

        // Initialize preview if text already exists
        window.addEventListener("DOMContentLoaded", updateResult);
    </script>
@endsection
