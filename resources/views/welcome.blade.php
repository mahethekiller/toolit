@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="text-center mb-5">
    <h1 class="fw-bold display-5 mkk">🚀 Welcome to Online Text Tools</h1>
    <p class="text-muted lead">Smart, simple, and free online tools to save your time.</p>
</div>
=======
    <style>
        .tool-icon {
            max-width: 80px;
            max-height: 80px;
            object-fit: contain;
            display: block;
            margin: 0 auto;
        }
    </style>
>>>>>>> dev

    <div class="text-center mb-5">
        <h1 class="fw-bold display-5">🚀 Welcome to Online Text Tools</h1>
        <p class="text-muted lead">Smart, simple, and free online tools to save your time.</p>
    </div>

    <div class="row g-4">

        @php
            $tools = \App\Models\Tool::where('active', true)->get();
        @endphp

        @foreach ($tools as $tool)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 rounded-4">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            @if ($tool->icon)
                                <img src="{{ asset('uploads/tools/icons/' . $tool->icon) }}"
                                    alt="{{ $tool->icon_alt ?? $tool->name }}" class="tool-icon img-fluid">
                            @endif
                        </div>
                        <h5 class="fw-bold">{{ $tool->name }}</h5>
                        <p class="text-muted small">
                            {{ $tool->description ?? 'Use this tool for your text and formatting needs.' }}
                        </p>
                        <a href="{{ $tool->url }}" class="btn btn-primary btn-sm mt-2">Try Now</a>
                    </div>
                </div>
            </div>
        @endforeach


@endsection
