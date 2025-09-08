@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Whitespace Remover</h1>
    <p class="text-muted">🧹 Clean up text by removing extra spaces, line breaks, or trimming sides.</p>

    <div class="row">
        <!-- Input Area -->
        <div class="col-lg-6 mb-4">
            <label for="input-text" class="form-label fw-bold">Your Text</label>
            <textarea id="input-text" class="form-control" rows="8" placeholder="Paste or type your text here..."></textarea>

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

            <button id="processBtn" class="btn btn-primary mt-3">
                🧹 Clean Text
            </button>
        </div>

        <!-- Result Section -->
        <div class="col-lg-6 mb-4">
            <h5 class="fw-bold mb-3">Result</h5>
            <div class="p-4 border rounded-3 bg-light d-flex justify-content-between align-items-start"
                 style="min-height: 300px; overflow-x: auto;">
                <div id="result-text" class="me-3 flex-grow-1 text-muted"
                     style="white-space: pre-wrap; font-size: 1.1rem;">
                    ✍️ Start typing and click "Clean Text" to see the result...
                </div>
                <button id="copyBtn" class="btn btn-outline-secondary btn-sm d-none" onclick="copyResult()">
                    📋 Copy
                </button>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script>
        document.getElementById("processBtn").addEventListener("click", function () {
            const text = document.getElementById("input-text").value;
            const option = document.querySelector('input[name="mode"]:checked').value;

            fetch("{{ route('tools.whitespace.process') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ text, option })
            })
            .then(res => res.json())
            .then(data => {
                const resultBox = document.getElementById("result-text");
                resultBox.textContent = data.result;
                document.getElementById("copyBtn").classList.remove("d-none");
            });
        });

        function copyResult() {
            const resultText = document.getElementById("result-text").innerText;
            navigator.clipboard.writeText(resultText).then(() => {
                const btn = document.getElementById("copyBtn");
                btn.innerHTML = "✅ Copied!";
                setTimeout(() => btn.innerHTML = "📋 Copy", 1500);
            });
        }
    </script>
@endsection
