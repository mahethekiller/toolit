@php
    $toolbAd = App\Models\Ad::where('position', 'toolb')->where('active', true)->first();
    $isLeaderboard = $toolbAd && (str_contains($toolbAd->code, '728') || str_contains($toolbAd->code, 'e99f37155d2bae6b009d35c97184ae10'));
@endphp

@if ($toolbAd && !empty(trim($toolbAd->code)))
    <div class="tool-ad-below-desc {{ $isLeaderboard ? 'd-none d-md-flex flex-column align-items-center' : '' }} text-center my-4">
        <span class="text-uppercase text-muted" style="font-size: 10px; letter-spacing: 1px; display: block; margin-bottom: 4px;">Advertisement</span>
        <div style="min-height: {{ $isLeaderboard ? '90px' : '280px' }}; width: {{ $isLeaderboard ? '728px' : '320px' }}; max-width: 100%; margin: 0 auto; display: flex; align-items: center; justify-content: center; overflow: hidden;">
            {!! $toolbAd->code !!}
        </div>
    </div>
@endif


