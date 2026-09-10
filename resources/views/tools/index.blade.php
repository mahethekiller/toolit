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

    @php
        $toolsGridAd = App\Models\Ad::where('position', 'tools_grid')->where('active', true)->first();
    @endphp

    <div class="row g-4">
        @forelse($tools as $tool)
            @if ($loop->iteration == 4 && $toolsGridAd && !empty(trim($toolsGridAd->code)))
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 h-100 rounded-4 p-3 d-flex flex-column justify-content-center align-items-center text-center bg-light-subtle">
                        <span class="text-uppercase text-muted" style="font-size: 10px; letter-spacing: 1px; display: block; margin-bottom: 6px;">Advertisement</span>
                        <div class="w-100 d-flex align-items-center justify-content-center" style="min-height: 250px; overflow: hidden;">
                            {!! $toolsGridAd->code !!}
                        </div>
                    </div>
                </div>
            @endif
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

{{-- Recent Blog Posts Section --}}
@include('partials.recent-blogs')
@endsection
