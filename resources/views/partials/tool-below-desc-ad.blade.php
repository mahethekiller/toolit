@php
    $toolbAd = App\Models\Ad::where('position', 'toolb')->where('active', true)->first();
@endphp

@if ($toolbAd && !empty(trim($toolbAd->code)))
    <div class="tool-ad-below-desc text-center my-4">
        <span class="text-uppercase text-muted" style="font-size: 10px; letter-spacing: 1px; display: block; margin-bottom: 4px;">Advertisement</span>
        <div style="min-height: 280px; max-width: 320px; margin: 0 auto; display: flex; align-items: center; justify-content: center; overflow: hidden;">
            {!! $toolbAd->code !!}
        </div>
    </div>
@endif

