@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4 card shadow border-0 rounded-4">
                <div class="card-body p-4">
                    <!-- Header -->
                    <h1 class="mb-3 text-center fw-bold h2">✂️ Duplicate Line Remover</h1>
                    <p class="text-muted text-center mb-4">
                        Paste your list or text below to find and clean out duplicate lines instantly.
                    </p>

                    <!-- Input Text -->
                    <div class="mb-4">
                        <label for="list-input" class="form-label fw-bold">Input Lines List</label>
                        <textarea id="list-input" class="form-control form-control-lg rounded-3" rows="8"
                            placeholder="Paste your lines here, one line per item..."></textarea>
                    </div>

                    <!-- Config Checks -->
                    <div class="row mb-4">
                        <div class="col-md-4 mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="case-sensitive">
                                <label class="form-check-label fw-semibold" for="case-sensitive">
                                    🔠 Case Sensitive
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="trim-whitespace" checked>
                                <label class="form-check-label fw-semibold" for="trim-whitespace">
                                    ✂️ Trim Whitespace
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <select id="sort-order" class="form-select form-select-sm rounded-3">
                                <option value="none">Preserve Original Order</option>
                                <option value="asc">Sort Alphabetically (A-Z)</option>
                                <option value="desc">Sort Alphabetically (Z-A)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex flex-wrap gap-2 mb-4">
                        <button class="btn btn-primary rounded-pill px-4" onclick="removeDuplicates()">
                            ✨ Remove Duplicates
                        </button>
                        <button class="btn btn-outline-secondary rounded-pill px-3" onclick="clearAll()">
                            🗑️ Clear
                        </button>
                    </div>

                    <!-- Stats Panel -->
                    <div id="stats-panel" class="row g-3 text-center mb-4 d-none">
                        <div class="col-4">
                            <div class="p-3 bg-light rounded-3">
                                <span class="h4 fw-bold text-dark d-block" id="stat-original">0</span>
                                <small class="text-muted">Original Lines</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="p-3 bg-light rounded-3">
                                <span class="h4 fw-bold text-success d-block" id="stat-unique">0</span>
                                <small class="text-muted">Unique Lines</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="p-3 bg-light rounded-3">
                                <span class="h4 fw-bold text-danger d-block" id="stat-removed">0</span>
                                <small class="text-muted">Duplicates Removed</small>
                            </div>
                        </div>
                    </div>

                    <!-- Live Result -->
                    <div id="result-container" class="d-none">
                        <h5 class="fw-bold mb-3">Cleaned List Output:</h5>
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
                <div class="toast-body">Cleaned list copied to clipboard!</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>

    <script>
        function removeDuplicates() {
            const input = document.getElementById("list-input").value;
            const caseSensitive = document.getElementById("case-sensitive").checked;
            const trimWhitespace = document.getElementById("trim-whitespace").checked;
            const sortOrder = document.getElementById("sort-order").value;

            if (!input.trim()) return;

            let lines = input.split(/\r?\n/);
            const originalCount = lines.length;

            // Normalization & set processing
            let seen = new Set();
            let uniqueLines = [];

            for (let line of lines) {
                let checkLine = line;
                if (trimWhitespace) {
                    checkLine = checkLine.trim();
                }
                
                let hashLine = caseSensitive ? checkLine : checkLine.toLowerCase();
                
                if (!seen.has(hashLine)) {
                    seen.add(hashLine);
                    uniqueLines.push(checkLine);
                }
            }

            // Sorting
            if (sortOrder === "asc") {
                uniqueLines.sort((a, b) => a.localeCompare(b, undefined, { sensitivity: caseSensitive ? 'variant' : 'base' }));
            } else if (sortOrder === "desc") {
                uniqueLines.sort((a, b) => b.localeCompare(a, undefined, { sensitivity: caseSensitive ? 'variant' : 'base' }));
            }

            // Render stats
            document.getElementById("stat-original").innerText = originalCount;
            document.getElementById("stat-unique").innerText = uniqueLines.length;
            document.getElementById("stat-removed").innerText = originalCount - uniqueLines.length;
            document.getElementById("stats-panel").classList.remove("d-none");

            // Render result
            document.getElementById("result-text").innerText = uniqueLines.join("\n");
            document.getElementById("result-container").classList.remove("d-none");

            if (window.trackToolExecution) {
                window.trackToolExecution('{{ $tool->route_name ?? "tools.duplicate-line-remover" }}');
            }
        }

        function clearAll() {
            document.getElementById("list-input").value = "";
            document.getElementById("stats-panel").classList.add("d-none");
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
