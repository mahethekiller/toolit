@php
    $toolaAd = App\Models\Ad::where('position', 'toola')->where('active', true)->first();
    $sidebarAd = App\Models\Ad::where('position', 'sidebar')->where('active', true)->first();

    $isAdsterraShared = ($toolaAd && str_contains($toolaAd->code, 'container-9bbd04007e4d66bed8bcc2f5a0fc36d9')) ||
                         ($sidebarAd && str_contains($sidebarAd->code, 'container-9bbd04007e4d66bed8bcc2f5a0fc36d9'));
@endphp

@if ($toolaAd && !empty(trim($toolaAd->code)))
    <div class="tool-ad-above-desc text-center my-4">
        <span class="text-uppercase text-muted" style="font-size: 10px; letter-spacing: 1px; display: block; margin-bottom: 4px;">Advertisement</span>
        <div id="tool-ad-container" style="min-height: 280px; max-width: 320px; margin: 0 auto; display: flex; align-items: center; justify-content: center; overflow: hidden;">
            @if (!$isAdsterraShared)
                {!! $toolaAd->code !!}
            @endif
        </div>
    </div>
@endif

@if ($isAdsterraShared)
    {{-- Responsive single-container injector to prevent DOM ID collision & render 100% visible ad on both desktop & mobile --}}
    <script>
        (function() {
            var isDesktop = window.innerWidth >= 768;
            var target = document.getElementById(isDesktop ? 'sidebar-ad-container' : 'tool-ad-container');
            if (target) {
                var adContainer = document.createElement('div');
                adContainer.id = 'container-9bbd04007e4d66bed8bcc2f5a0fc36d9';
                target.appendChild(adContainer);

                var s = document.createElement('script');
                s.async = true;
                s.setAttribute('data-cfasync', 'false');
                s.src = 'https://pl31240142.profitableratecpmnetwork.com/9bbd04007e4d66bed8bcc2f5a0fc36d9/invoke.js';
                target.appendChild(s);
            }
        })();
    </script>
@endif


