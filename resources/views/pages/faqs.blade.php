@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">FAQ Hub</li>
        </ol>
    </nav>

    <!-- Schema.org FAQPage JSON-LD -->
    @php
        $faqSchemaList = [];
        foreach ($faqs as $group => $faqList) {
            foreach ($faqList as $faq) {
                $faqSchemaList[] = [
                    "@type" => "Question",
                    "name" => $faq->question,
                    "acceptedAnswer" => [
                        "@type" => "Answer",
                        "text" => strip_tags($faq->answer)
                    ]
                ];
            }
        }
        $faqSchema = [
            "@context" => "https://schema.org",
            "@type" => "FAQPage",
            "mainEntity" => $faqSchemaList
        ];
    @endphp
    <script type="application/ld+json">
    {!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT) !!}
    </script>

    <!-- Header Section -->
    <div class="text-center mb-5">
        <h1 class="fw-bold">Frequently Asked Questions</h1>
        <p class="lead text-muted max-width-600 mx-auto">
            Got questions about our text processing utilities? Browse the answers below. Type in the search box to filter instantly.
        </p>

        <!-- Search Bar -->
        <div class="max-width-500 mx-auto mt-4">
            <div class="input-group input-group-lg shadow-sm border rounded-pill overflow-hidden bg-white">
                <span class="input-group-text bg-white border-0 ps-3"><i class="fa-solid fa-magnifying-glass text-muted"></i></span>
                <input type="text" id="faqSearch" class="form-control border-0 px-2" placeholder="Search questions & answers..." oninput="filterFaqs()">
            </div>
        </div>
    </div>

    <!-- FAQ Contents -->
    <div class="row">
        <!-- Categories Sidebar -->
        <div class="col-lg-3 mb-4">
            <div class="sticky-top" style="top: 2rem; z-index: 100;">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-light">
                    <h5 class="fw-bold mb-3 px-2">Categories</h5>
                    <div class="list-group list-group-flush" id="faqCategories">
                        <button type="button" class="list-group-item list-group-item-action active border-0 rounded-3 mb-1" onclick="showCategory('all', this)">
                            🌐 All Questions
                        </button>
                        @foreach($faqs as $group => $faqList)
                            <button type="button" class="list-group-item list-group-item-action border-0 rounded-3 mb-1 text-truncate" onclick="showCategory('cat-{{ Str::slug($group) }}', this)">
                                🛠️ {{ $group }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Accordions Column -->
        <div class="col-lg-9">
            <div id="faqAccordionContainer">
                @php $faqIndex = 1; @endphp
                @foreach($faqs as $group => $faqList)
                    <div class="faq-group-section mb-5" id="cat-{{ Str::slug($group) }}">
                        <h3 class="fw-bold h4 mb-3 border-bottom pb-2 text-primary">{{ $group }}</h3>
                        
                        <div class="accordion accordion-flush shadow-sm rounded-4 overflow-hidden" id="accordion-{{ Str::slug($group) }}">
                            @foreach($faqList as $faq)
                                <div class="accordion-item faq-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed fw-semibold py-3" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapse-{{ $faqIndex }}" aria-expanded="false">
                                            {{ $faq->question }}
                                        </button>
                                    </h2>
                                    <div id="faq-collapse-{{ $faqIndex }}" class="accordion-collapse collapse" data-bs-parent="#accordion-{{ Str::slug($group) }}">
                                        <div class="accordion-body text-muted leading-relaxed">
                                            {!! $faq->answer !!}
                                        </div>
                                    </div>
                                </div>
                                @php $faqIndex++; @endphp
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <!-- Empty State -->
                <div id="faqEmptyState" class="text-center py-5 d-none">
                    <span class="fs-1 d-block mb-3">🔍</span>
                    <h5 class="fw-bold text-muted">No matching questions found</h5>
                    <p class="text-muted">Try using different keywords or terms.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function filterFaqs() {
        const query = document.getElementById('faqSearch').value.toLowerCase().trim();
        const faqItems = document.querySelectorAll('.faq-item');
        const groups = document.querySelectorAll('.faq-group-section');
        let totalVisible = 0;

        // Reset category active state if searching
        if (query.length > 0) {
            const catButtons = document.querySelectorAll('#faqCategories button');
            catButtons.forEach(btn => btn.classList.remove('active'));
            catButtons[0].classList.add('active'); // set to "All" active
        }

        groups.forEach(group => {
            let visibleInGroup = 0;
            const items = group.querySelectorAll('.faq-item');
            
            items.forEach(item => {
                const questionText = item.querySelector('.accordion-button').innerText.toLowerCase();
                const answerText = item.querySelector('.accordion-body').innerText.toLowerCase();
                
                if (questionText.includes(query) || answerText.includes(query)) {
                    item.classList.remove('d-none');
                    visibleInGroup++;
                    totalVisible++;
                } else {
                    item.classList.add('d-none');
                }
            });

            if (visibleInGroup > 0) {
                group.classList.remove('d-none');
            } else {
                group.classList.add('d-none');
            }
        });

        const emptyState = document.getElementById('faqEmptyState');
        if (totalVisible === 0) {
            emptyState.classList.remove('d-none');
        } else {
            emptyState.classList.add('d-none');
        }
    }

    function showCategory(catId, element) {
        // Reset search bar
        document.getElementById('faqSearch').value = '';

        // Handle active class updates
        const buttons = document.querySelectorAll('#faqCategories button');
        buttons.forEach(btn => btn.classList.remove('active'));
        element.classList.add('active');

        // Filter categories
        const groups = document.querySelectorAll('.faq-group-section');
        const emptyState = document.getElementById('faqEmptyState');
        emptyState.classList.add('d-none');

        groups.forEach(group => {
            // Unhide all inner items
            group.querySelectorAll('.faq-item').forEach(item => item.classList.remove('d-none'));

            if (catId === 'all' || group.id === catId) {
                group.classList.remove('d-none');
            } else {
                group.classList.add('d-none');
            }
        });
    }
</script>

<style>
    .accordion-button:not(.collapsed) {
        background-color: var(--bs-light);
        color: var(--bs-primary);
        box-shadow: none;
    }
    .accordion-button:focus {
        box-shadow: none;
        border-color: rgba(0,0,0,.125);
    }
    .list-group-item.active {
        z-index: 2;
        color: #fff;
        background-color: var(--bs-primary);
        border-color: var(--bs-primary);
    }
</style>
@endsection
