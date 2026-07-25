@php
    $recentBlogPosts = getRecentBlogPosts(3);
@endphp

@if (!empty($recentBlogPosts))
    <section class="container my-5 py-4" aria-labelledby="recent-blogs-heading">
        <div class="row mb-4 align-items-center">
            <div class="col-md-8">
                <h2 id="recent-blogs-heading" class="fw-bold h1 section-title gradient-text mb-2">
                    📰 Latest From Our Blog
                </h2>
                <p class="text-muted fs-5 mb-0">
                    Guides, tutorials, and insights on text formatting, developer productivity, and writing utilities.
                </p>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <a href="https://www.onlinetxttools.com/blog" target="_blank" rel="noopener" class="btn btn-outline-primary rounded-pill px-4 fw-semibold shadow-sm">
                    View All Articles <i class="fas fa-arrow-right ms-2" aria-hidden="true"></i>
                </a>
            </div>
        </div>

        <div class="row g-4">
            @foreach ($recentBlogPosts as $post)
                <div class="col-md-4">
                    <article class="card h-100 feature-card shadow-sm border-0 rounded-4 overflow-hidden">
                        <div class="position-relative overflow-hidden" style="height: 190px; background-color: #f1f5f9;">
                            <img src="{{ $post['image'] }}"
                                 alt="{{ $post['title'] }}"
                                 class="w-100 h-100 object-fit-cover transition-scale"
                                 loading="lazy">
                            <span class="badge bg-primary position-absolute top-0 end-0 m-3 px-3 py-2 rounded-pill shadow-sm fs-7">
                                Blog
                            </span>
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <div class="text-muted small mb-2 d-flex align-items-center">
                                <i class="far fa-calendar-alt me-2 text-primary" aria-hidden="true"></i>
                                <span>{{ $post['date'] }}</span>
                            </div>
                            <h3 class="h5 fw-bold mb-3">
                                <a href="{{ $post['url'] }}" target="_blank" rel="noopener" class="text-dark text-decoration-none hover-primary">
                                    {{ $post['title'] }}
                                </a>
                            </h3>
                            <p class="text-muted small flex-grow-1 mb-4">
                                {{ $post['excerpt'] }}
                            </p>
                            <div class="mt-auto">
                                <a href="{{ $post['url'] }}" target="_blank" rel="noopener" class="fw-semibold text-primary text-decoration-none">
                                    Read Article <i class="fas fa-chevron-right ms-1 fs-7" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </section>

    <style>
        .transition-scale {
            transition: transform 0.4s ease;
        }
        .feature-card:hover .transition-scale {
            transform: scale(1.05);
        }
        .hover-primary:hover {
            color: #4f46e5 !important;
        }
        .fs-7 {
            font-size: 0.8rem;
        }
    </style>
@endif
