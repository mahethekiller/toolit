@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">How We Process Data</li>
        </ol>
    </nav>

    <!-- Schema.org Breadcrumb JSON-LD -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "BreadcrumbList",
      "itemListElement": [
        {
          "@@type": "ListItem",
          "position": 1,
          "name": "Home",
          "item": "{{ url('/') }}"
        },
        {
          "@@type": "ListItem",
          "position": 2,
          "name": "How We Process Data",
          "item": "{{ url('/how-we-process-data') }}"
        }
      ]
    }
    </script>

    <!-- Hero Section -->
    <div class="text-center mb-5">
        <div class="d-inline-block bg-light p-3 rounded-circle mb-3 shadow-sm border">
            <span class="fs-1">🔒</span>
        </div>
        <h1 class="fw-bold">How We Process Your Data</h1>
        <p class="lead text-muted max-width-600 mx-auto">
            At Online Text Tools, user privacy isn't just a policy—it is hardcoded into our architecture. Learn how all processing runs entirely inside your web browser.
        </p>
    </div>

    <!-- The Client-Side Security Concept -->
    <div class="row align-items-center mb-5 py-3">
        <div class="col-md-6 mb-4 mb-md-0">
            <h2 class="fw-bold mb-3">100% Client-Side Processing</h2>
            <p>
                Unlike traditional websites that send your inputs to a remote server to format text, generate passwords, or count characters, <strong>Online Text Tools operates entirely on the client side</strong>.
            </p>
            <p>
                When you input text into any of our tools, the calculations are executed locally inside your device's web browser using standard technologies like <strong>HTML5</strong>, <strong>JavaScript (JS)</strong>, and native browser security APIs.
            </p>
            <div class="alert alert-success border-0 shadow-sm rounded-3">
                <i class="fa-solid fa-circle-check me-2"></i><strong>Zero Server Transmissions:</strong> Your confidential notes, API keys, source codes, and passwords never leave your device.
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow rounded-4 overflow-hidden">
                <div class="card-header bg-dark text-white p-3">
                    <span class="text-danger">●</span> <span class="text-warning">●</span> <span class="text-success">●</span>
                    <span class="ms-2 small text-muted">Browser Local Execution</span>
                </div>
                <div class="card-body bg-light p-4 font-monospace small">
                    <div class="mb-2 text-muted">// Your browser fetches the tool once</div>
                    <div class="mb-2"><span class="text-primary">const</span> input = document.getElementById(<span class="text-success">'your-text'</span>).value;</div>
                    <div class="mb-2 text-muted">// Execution runs locally on your CPU</div>
                    <div class="mb-2"><span class="text-primary">const</span> result = processTextLocally(input);</div>
                    <div class="mb-2 text-muted">// DOM is updated instantly with 0 server latency</div>
                    <div>document.getElementById(<span class="text-success">'result'</span>).innerText = result;</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tech Stack details -->
    <h2 class="fw-bold text-center mb-4 mt-5">The Technology Behind Our Security</h2>
    <div class="row text-start mb-5">
        <div class="col-md-4 mb-4">
            <div class="p-4 bg-white border rounded shadow-sm h-100">
                <div class="fs-2 text-primary mb-3">⚡</div>
                <h5>Native JavaScript Engines</h5>
                <p class="text-muted">
                    We use optimization-grade Javascript algorithms that run directly in your browser's V8 (Chrome), SpiderMonkey (Firefox), or JavaScriptCore (Safari) engine for ultra-fast, local processing.
                </p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="p-4 bg-white border rounded shadow-sm h-100">
                <div class="fs-2 text-success mb-3">🛡️</div>
                <h5>Web Cryptography API</h5>
                <p class="text-muted">
                    Our Password Generator leverages the browser's native cryptographic module <code>window.crypto.getRandomValues</code> to generate mathematically random passwords that cannot be intercepted.
                </p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="p-4 bg-white border rounded shadow-sm h-100">
                <div class="fs-2 text-info mb-3">🛜</div>
                <h5>No Databases or Logging</h5>
                <p class="text-muted">
                    We do not maintain databases to store user text inputs, nor do we run background logging tasks. Once you close the tab, all inputs are permanently cleared from your device's memory.
                </p>
            </div>
        </div>
    </div>

    <!-- Tool by Tool Privacy Breakdown -->
    <h2 class="fw-bold text-center mb-4">Tool-by-Tool Processing Breakdown</h2>
    <div class="table-responsive shadow border rounded-4 bg-white mb-5">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 25%;">Tool</th>
                    <th style="width: 25%;">Core Technology</th>
                    <th>Processing Flow Details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Case Converter</strong></td>
                    <td>JavaScript String APIs</td>
                    <td>Transforms characters locally inside memory buffers using native string methods like <code>toUpperCase()</code> and regex loops.</td>
                </tr>
                <tr>
                    <td><strong>Word Counter</strong></td>
                    <td>Regex Word Bounds</td>
                    <td>Counts words, characters, and spaces via optimized regular expressions immediately upon input changes. No server-side parser is triggered.</td>
                </tr>
                <tr>
                    <td><strong>Password Generator</strong></td>
                    <td>Web Cryptography API</td>
                    <td>Creates high-entropy arrays utilizing modern browser security libraries. Passwords are never sent to the network.</td>
                </tr>
                <tr>
                    <td><strong>Whitespace Remover</strong></td>
                    <td>Regex Trimming</td>
                    <td>Parses the text locally to clean up trailing lines, tabs, and spaces in real-time. Works offline.</td>
                </tr>
                <tr>
                    <td><strong>Text Reverser</strong></td>
                    <td>JS Array Manipulation</td>
                    <td>Flips word order or character arrays locally on client device's CPU.</td>
                </tr>
                <tr>
                    <td><strong>Lorem Ipsum Generator</strong></td>
                    <td>Static Dictionary Array</td>
                    <td>Pulls random sentences and paragraph sets from a locally packaged list of classical Latin terms.</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Verification / Audit commitment -->
    <div class="card border-0 bg-dark text-white rounded-4 shadow-sm p-4 text-center my-5">
        <div class="card-body">
            <h3 class="fw-bold mb-3">How to Verify This Yourself</h3>
            <p class="lead max-width-600 mx-auto text-light opacity-75">
                We believe in verifiable trust. If you are a developer or security researcher, you can easily inspect our client-side processing:
            </p>
            <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
                <span class="badge bg-secondary p-2"><i class="fa-solid fa-terminal me-1"></i> Open Developer Tools (F12)</span>
                <span class="badge bg-secondary p-2"><i class="fa-solid fa-network-wired me-1"></i> Check the 'Network' Tab</span>
                <span class="badge bg-secondary p-2"><i class="fa-solid fa-code me-1"></i> Verify 0 network requests on typing</span>
            </div>
        </div>
    </div>
</div>
@endsection
