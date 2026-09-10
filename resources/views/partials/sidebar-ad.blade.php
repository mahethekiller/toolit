@php
    $sidebarAd = App\Models\Ad::where('position', 'sidebar')->where('active', true)->first();
    $isAdsterraUnit = $sidebarAd && str_contains($sidebarAd->code, 'container-9bbd04007e4d66bed8bcc2f5a0fc36d9');
@endphp

@if ($sidebarAd && !empty(trim($sidebarAd->code)))
    <div class="sidebar-ad-card bg-white rounded shadow-sm p-3 mt-4 text-center">
        <span class="text-uppercase text-muted" style="font-size: 10px; letter-spacing: 1px; display: block; margin-bottom: 6px;">Advertisement</span>
        <div id="sidebar-ad-container" class="ad-slot-wrapper" style="min-height: 280px; width: 100%; display: flex; align-items: center; justify-content: center; overflow: hidden;">
            @if (!$isAdsterraUnit)
                {!! $sidebarAd->code !!}
            @endif
        </div>
    </div>
@endif

