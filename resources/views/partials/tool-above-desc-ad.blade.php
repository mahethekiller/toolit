 @php
     // use App\Models\Ad;
     $headerAd = App\Models\Ad::where('position', 'toola')->where('active', true)->first();
 @endphp

 @if ($headerAd)
     <div class="text-center my-3">
         {!! $headerAd->code !!}
     </div>
 @endif
