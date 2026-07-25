<div class="article-content">
     <h2 class="mt-5 mb-4 text-center fw-bold">Frequently Asked Questions</h2>

     <div class="accordion" id="faqAccordion" itemscope itemtype="https://schema.org/FAQPage">
         @foreach ($faqs as $faq)
             <div class="accordion-item mb-3" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                 <div class="card shadow-sm rounded">
                     <div class="card-header p-0">
                         <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button"
                             data-bs-toggle="collapse" data-bs-target="#faqCollapse{{ $loop->index }}"
                             aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                             aria-controls="faqCollapse{{ $loop->index }}" itemprop="name">
                             {{ $faq->question }}
                         </button>
                     </div>
                     <div id="faqCollapse{{ $loop->index }}"
                         class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                         aria-labelledby="faqHeading{{ $loop->index }}" data-bs-parent="#faqAccordion" itemscope
                         itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                         <div class="card-body text-muted" itemprop="text">
                             {!! $faq->answer !!}
                         </div>
                     </div>
                 </div>
             </div>
         @endforeach
     </div>




 </div>

 @if(!empty($faqs) && count($faqs) > 0)
 @php
     $faqJsonLd = [
         "@context" => "https://schema.org",
         "@type" => "FAQPage",
         "mainEntity" => []
     ];

     foreach ($faqs as $faq) {
         $faqJsonLd["mainEntity"][] = [
             "@type" => "Question",
             "name" => strip_tags($faq->question),
             "acceptedAnswer" => [
                 "@type" => "Answer",
                 "text" => strip_tags($faq->answer)
             ]
         ];
     }
 @endphp
 <script type="application/ld+json">
 {!! json_encode($faqJsonLd, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT) !!}
 </script>
 @endif

 <style>

 </style>
