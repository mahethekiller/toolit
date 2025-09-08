@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-70">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-5">
                    <!-- Header -->
                    <h2 class="mb-3 text-center fw-bold">↩️ Text Reverser</h2>
                    <p class="text-muted text-center mb-4">
                        Paste or type your text below and get the reversed result instantly.
                    </p>

                    <!-- Input Text -->
                    <div class="mb-4">
                        <label for="text" class="form-label fw-bold">Your Text</label>
                        <textarea id="text" class="form-control form-control-lg rounded-3" rows="6"
                            placeholder="Type or paste your text here..."></textarea>
                    </div>

                    <!-- Live Result -->
                    <div id="result-container" class="d-none">
                        <h5 class="fw-bold mb-3">Reversed Text:</h5>
                        <div class="p-3 border rounded-3 bg-light" style="min-height: 150px;">
                            <span id="result-text" class="text-dark d-block"
                                style="white-space: pre-wrap; word-break: break-word;"></span>
                        </div>

                        <button id="copyBtn" class="btn btn-outline-secondary btn-sm mt-3" onclick="copyResult()">📋
                            Copy</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
        <div id="copyToast" class="toast align-items-center text-bg-success border-0 shadow" role="alert">
            <div class="d-flex">
                <div class="toast-body">✅ Reversed text copied to clipboard!</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>

    <script>
        function updateResult() {
            let text = document.getElementById("text").value;
            if (!text.trim()) {
                document.getElementById("result-container").classList.add("d-none");
                return;
            }

            // Reverse the text locally
            let reversed = text.split("").reverse().join("");

            document.getElementById("result-text").innerText = reversed;
            document.getElementById("result-container").classList.remove("d-none");
        }

        function copyResult() {
            let text = document.getElementById("result-text").innerText;
            navigator.clipboard.writeText(text).then(() => {
                let toastEl = document.getElementById('copyToast');
                let toast = new bootstrap.Toast(toastEl, {
                    delay: 2000
                });
                toast.show();
            });
        }

        document.getElementById("text").addEventListener("input", updateResult);
    </script>
@endsection
