@extends('layouts.app')

@section('content')

<style>
        .tool-icon {
            max-width: 80px;
            max-height: 80px;
            object-fit: contain;
            display: block;
            margin: 0 auto;
        }
    </style>
<div class="container my-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold">🛠 Online Tools</h1>
        <p class="text-muted">A collection of handy tools you can use directly from your browser.</p>
    </div>

    <div class="row g-4">
        @forelse($tools as $tool)
            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100 rounded-4 hover-shadow">
                    <div class="card-body d-flex flex-column justify-content-between text-center">
                        <div class="mb-3">
                            @if ($tool->icon)
                                <img src="{{ asset('uploads/tools/icons/' . $tool->icon) }}"
                                    alt="{{ $tool->icon_alt ?? $tool->name }}" class="tool-icon img-fluid">
                            @endif
                        </div>
                        <h5 class="card-title fw-bold">{{ $tool->name }}</h5>
                        <p class="card-text text-muted small">
                            {{ $tool->description ?? 'Use this tool for your text and formatting needs.' }}
                        </p>
                        <a href="{{ $tool->url }}" class="btn btn-primary mt-3">Open Tool</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">⚠ No tools available. Please check back later.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
