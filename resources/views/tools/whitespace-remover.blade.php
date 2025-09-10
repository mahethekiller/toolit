@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Whitespace Remover</h1>
    <p class="text-muted">🧹 Clean up text by removing extra spaces, line breaks, or trimming sides.</p>

    <div class="row">
        <!-- Input Area -->
        <div class="col-lg-6 mb-4">
            <label for="input-text" class="form-label fw-bold">Your Text</label>
            <textarea id="input-text" class="form-control" rows="10" placeholder="Paste or type your text here..."></textarea>

            <!-- Options -->
            <div class="mt-4">
                <label class="form-label fw-bold mb-3">✨ Choose Option</label>
                <div class="list-group">
                    <label class="list-group-item">
                        <input class="form-check-input me-2" type="radio" name="mode" value="all" checked>
                        Remove All Whitespace
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-2" type="radio" name="mode" value="extra">
                        Remove Extra Spaces (Keep Single)
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-2" type="radio" name="mode" value="leading-trailing">
                        Trim Leading/Trailing Spaces
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-2" type="radio" name="mode" value="left">
                        Trim Left (Leading Spaces Only)
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-2" type="radio" name="mode" value="right">
                        Trim Right (Trailing Spaces Only)
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-2" type="radio" name="mode" value="line-breaks">
                        Remove Line Breaks
                    </label>
                </div>
            </div>

            <!-- Action Button -->
            <div class="d-grid mt-3">
                <button class="btn btn-primary" onclick="processText()">🧹 Clean Text</button>
            </div>
        </div>

        <!-- Result Section -->
        <div class="col-lg-6 mb-4">
            <label for="result-text" class="form-label fw-bold">Result</label>
            <textarea id="result-text" class="form-control bg-light" rows="10" readonly
                      placeholder="✍️ Start typing or click clean to see the result..."></textarea>
            <button id="copyBtn" class="btn btn-outline-secondary btn-sm mt-2 d-none" onclick="copyResult()">
                📋 Copy
            </button>
        </div>
    </div>

    <!-- JS -->
    <script>
        const inputText = document.getElementById("input-text");
        const resultText = document.getElementById("result-text");

        function processText() {
            let text = inputText.value;
            const mode = document.querySelector('input[name="mode"]:checked').value;

            let output = text;
            switch (mode) {
                case "all":
                    output = text.replace(/\s+/g, "");
                    break;
                case "extra":
                    output = text.replace(/\s+/g, " ").trim();
                    break;
                case "leading-trailing":
                    output = text.trim();
                    break;
                case "left":
                    output = text.replace(/^\s+/, "");
                    break;
                case "right":
                    output = text.replace(/\s+$/, "");
                    break;
                case "line-breaks":
                    output = text.replace(/(\r\n|\r|\n)/g, "");
                    break;
            }

            resultText.value = output;
            document.getElementById("copyBtn").classList.toggle("d-none", !output.trim());
        }

        function copyResult() {
            resultText.select();
            document.execCommand("copy");

            const btn = document.getElementById("copyBtn");
            btn.innerHTML = "✅ Copied!";
            setTimeout(() => btn.innerHTML = "📋 Copy", 1500);
        }

        // Optional live update
        inputText.addEventListener("input", processText);
        document.querySelectorAll('input[name="mode"]').forEach(radio => {
            radio.addEventListener("change", processText);
        });
    </script>
@endsection
