 <div class="row">
     <div class="col-md-12 mb-4 card shadow border-0 rounded-4">
         <h2 class="mt-5 mb-4 text-center fw-bold">Frequently Asked Questions</h2>

<div class="accordion" id="faqAccordion">
    @foreach ($faqs as $faq)
        <div class="accordion-item mb-3">
            <div class="card shadow-sm rounded">
                <div class="card-header p-0" id="faqHeading{{ $loop->index }}">
                    <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faqCollapse{{ $loop->index }}"
                        aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                        aria-controls="faqCollapse{{ $loop->index }}">
                        {{ $faq->question }}
                    </button>
                </div>
                <div id="faqCollapse{{ $loop->index }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                    aria-labelledby="faqHeading{{ $loop->index }}" data-bs-parent="#faqAccordion">
                    <div class="card-body text-muted">
                        {!! $faq->answer !!}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>


     </div>

 </div>

 <style>

 </style>
