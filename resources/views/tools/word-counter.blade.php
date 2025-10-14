@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row">
        <!-- Input -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body p-4">
                    <h2 class="fw-bold mb-3 text-center">📝 Word & Letter Counter</h2>
                    <p class="text-muted text-center mb-4">Paste or type your text below:</p>

                    <textarea id="text" class="form-control rounded-3 mb-3" rows="10" placeholder="Type or paste your text here...">{{ $text ?? '' }}</textarea>
                </div>
            </div>
        </div>

        <!-- Results -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-3">📊 Results</h4>

                    <ul class="list-group list-group-flush mb-3">
                        <li class="list-group-item">Characters (with spaces): <strong id="charCount">0</strong></li>
                        <li class="list-group-item">Characters (without spaces): <strong id="charNoSpaceCount">0</strong></li>
                        <li class="list-group-item">Words: <strong id="wordCount">0</strong></li>
                        <li class="list-group-item">Sentences: <strong id="sentenceCount">0</strong></li>
                        <li class="list-group-item">Paragraphs: <strong id="paragraphCount">0</strong></li>
                    </ul>

                    <div class="d-grid">
                        <button id="copyStatsBtn" class="btn btn-outline-primary">
                            📋 Copy Stats
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if (!empty($tool->long_description))
            <div class="row">

                <div class="col-md-12 mb-4 card shadow border-0 rounded-4">
                    <div class="card-body p-4">
                        {!! $tool->long_description !!}
                    </div>
                </div>

            </div>
        @endif
        @if (!empty($faqs) && $faqs->count() > 0)
            @include('partials.faqs', ['faqs' => $faqs])
        @endif

</div>

<!-- Toast Notification -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1050;">
    <div id="copyToast" class="toast align-items-center text-bg-success border-0 shadow" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">✅ Stats copied to clipboard!</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<script>
// Live Counter
function updateCounts() {
    let text = document.getElementById("text").value.trim();

    // Character counts
    let chars = text.length;
    let charsNoSpaces = text.replace(/\s/g, '').length;

    // Word count
    let words = text ? text.split(/\s+/).filter(Boolean).length : 0;

    // Sentence count
    let sentences = text ? (text.match(/[.!?]+/g) || []).length : 0;

    // Paragraph count
    let paragraphs = text ? (text.trim().split(/\n\s*\n/).filter(Boolean).length) : 0;

    // Update DOM
    document.getElementById("charCount").innerText = chars;
    document.getElementById("charNoSpaceCount").innerText = charsNoSpaces;
    document.getElementById("wordCount").innerText = words;
    document.getElementById("sentenceCount").innerText = sentences;
    document.getElementById("paragraphCount").innerText = paragraphs;
}

// Copy Stats in Markdown/Tabular format
function copyStats() {
    let stats = [
        ["Characters (with spaces)", document.getElementById("charCount").innerText],
        ["Characters (without spaces)", document.getElementById("charNoSpaceCount").innerText],
        ["Words", document.getElementById("wordCount").innerText],
        ["Sentences", document.getElementById("sentenceCount").innerText],
        ["Paragraphs", document.getElementById("paragraphCount").innerText],
    ];

    // Markdown-style table (good for Docs, GitHub, Slack)
    let markdownTable = "| Metric | Count |\n|--------|-------|\n";
    stats.forEach(([label, value]) => {
        markdownTable += `| ${label} | ${value} |\n`;
    });

    // Tab-separated for Excel/Sheets
    let tsv = "Metric\tCount\n" + stats.map(([label, value]) => `${label}\t${value}`).join("\n");

    // Final content: Markdown + TSV
    let finalText = markdownTable + "\n\n" + tsv;

    navigator.clipboard.writeText(finalText).then(() => {
        let toastEl = document.getElementById('copyToast');
        let toast = new bootstrap.Toast(toastEl, { delay: 3000 });
        toast.show();
    });
}

// Events
document.getElementById("text").addEventListener("input", updateCounts);
document.getElementById("copyStatsBtn").addEventListener("click", copyStats);

// Initialize
window.addEventListener("DOMContentLoaded", updateCounts);
</script>
@endsection
