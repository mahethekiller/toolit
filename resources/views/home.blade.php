@extends('layouts.app')

@section('content')
<div class="text-center mb-5">
    <h1 class="fw-bold display-5">🚀 Welcome to Online Text Tools</h1>
    <p class="text-muted lead">Smart, simple, and free online tools to save your time.</p>
</div>

<div class="row g-4">
    <!-- Tool Card -->

    @php
        $tools = Tool::where('active', true)->get();
    @endphp

    @foreach($tools as $tool)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm border-0 rounded-4">
                <div class="card-body text-center p-4">
                    <div class="fs-1 mb-3">{{ $tool->icon }}</div>
                    <h5 class="fw-bold">{{ $tool->name }}</h5>
                    <p class="text-muted small">{{ $tool->description ?? 'Use this tool for your text and formatting needs.' }}</p>
                    <a href="{{ $tool->url }}" class="btn btn-primary btn-sm mt-2">Try Now</a>
                </div>
            </div>
        </div>
    @endforeach



    <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow-sm border-0 rounded-4">
            <div class="card-body text-center p-4">
                <div class="fs-1 mb-3">🔠</div>
                <h5 class="fw-bold">Case Converter</h5>
                <p class="text-muted small">Convert your text to uppercase, lowercase, or title case instantly.</p>
                <a href="{{ route('case-converter') }}" class="btn btn-primary btn-sm mt-2">Try Now</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow-sm border-0 rounded-4">
            <div class="card-body text-center p-4">
                <div class="fs-1 mb-3">📝</div>
                <h5 class="fw-bold">Word Counter</h5>
                <p class="text-muted small">Count words, characters, and spaces in your text with ease.</p>
                <a href="{{ route('tools.wordcounter') }}" class="btn btn-primary btn-sm mt-2">Try Now</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow-sm border-0 rounded-4">
            <div class="card-body text-center p-4">
                <div class="fs-1 mb-3">🔑</div>
                <h5 class="fw-bold">Password Generator</h5>
                <p class="text-muted small">Generate strong and secure passwords with customizable options.</p>
                <a href="{{ route('tools.password') }}" class="btn btn-primary btn-sm mt-2">Try Now</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow-sm border-0 rounded-4">
            <div class="card-body text-center p-4">
                <div class="fs-1 mb-3">↩️</div>
                <h5 class="fw-bold">Text Reverser</h5>
                <p class="text-muted small">Reverse your text easily for fun or formatting needs.</p>
                <a href="{{ route('tools.textreverser') }}" class="btn btn-primary btn-sm mt-2">Try Now</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow-sm border-0 rounded-4">
            <div class="card-body text-center p-4">
                <div class="fs-1 mb-3">↩️</div>
                <h5 class="fw-bold">Text Reverser</h5>
                <p class="text-muted small">Reverse your text easily for fun or formatting needs.</p>
                <a href="{{ route('tools.whitespace') }}" class="btn btn-primary btn-sm mt-2">Try Now</a>
            </div>
        </div>
    </div>
</div>
@endsection
