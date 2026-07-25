@php
    $recentBlogPosts = getRecentBlogPosts(3);
@endphp

@if (!empty($recentBlogPosts))
    <section class="container my-5 py-4" aria-labelledby="recent-blogs-heading">
        <!-- Header -->
        <div class="row mb-4 align-items-end">
            <div class="col-md-8">
                <div class="d-inline-flex align-items-center gap-2 mb-2">
                    <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-semibold fs-7">
                        <i class="fas fa-blog me-1"></i> OUR ARTICLES
                    </span>
                </div>
                <h2 id="recent-blogs-heading" class="fw-bold h1 gradient-text mb-2 blog-title-line">
                    Latest From Our Blog
                </h2>
                <p class="text-muted fs-5 mb-0">
                    Guides, tutorials, and insights on text formatting, developer productivity, and content optimization.
                </p>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <a href="https://www.onlinetxttools.com/blog" target="_blank" rel="noopener" class="btn btn-primary rounded-pill px-4 py-2 fw-semibold shadow-sm view-all-btn">
                    View All Articles <i class="fas fa-arrow-right ms-2 transition-arrow" aria-hidden="true"></i>
                </a>
            </div>
        </div>

        <!-- Cards Grid -->
        <div class="row g-4">
            @foreach ($recentBlogPosts as $post)
                <div class="col-md-4">
                    <article class="card h-100 blog-card shadow-sm border-0 rounded-4 overflow-hidden">
                        <!-- Image Container -->
                        <div class="position-relative overflow-hidden bg-light" style="aspect-ratio: 16/9;">
                            <img src="{{ $post['image'] }}"
                                 alt="{{ $post['title'] }}"
                                 class="w-100 h-100 object-fit-cover blog-card-img"
                                 loading="lazy">
                            <div class="img-overlay"></div>
                            <span class="badge bg-dark bg-opacity-75 position-absolute top-0 end-0 m-3 px-3 py-2 rounded-pill shadow-sm fs-7 fw-medium" style="backdrop-filter: blur(4px);">
                                <i class="far fa-newspaper me-1"></i> Article
                            </span>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body p-4 d-flex flex-column">
                            <div class="text-muted small mb-2 d-flex align-items-center gap-2">
                                <span class="badge bg-light text-secondary border px-2 py-1 rounded-2 fw-normal">
                                    <i class="far fa-calendar-alt me-1 text-primary"></i> {{ $post['date'] }}
                                </span>
                            </div>
                            
                            <!-- Title (2 lines clamped) -->
                            <h3 class="h5 fw-bold mb-3 blog-card-title">
                                <a href="{{ $post['url'] }}" target="_blank" rel="noopener" class="text-dark text-decoration-none blog-title-link">
                                    {{ $post['title'] }}
                                </a>
                            </h3>

                            <!-- Excerpt (3 lines clamped) -->
                            <p class="text-muted small mb-4 blog-card-excerpt">
                                {{ $post['excerpt'] }}
                            </p>

                            <!-- Action Link -->
                            <div class="mt-auto pt-2 border-top border-light d-flex justify-content-between align-items-center">
                                <a href="{{ $post['url'] }}" target="_blank" rel="noopener" class="fw-semibold text-primary text-decoration-none read-more-link">
                                    Read Article <i class="fas fa-arrow-right ms-1 fs-7 transition-arrow"></i>
                                </a>
                                <span class="text-muted fs-7">5 min read</span>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </section>

    <style>
        .gradient-text {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .blog-title-line {
            position: relative;
            padding-bottom: 8px;
        }

        .blog-card {
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            background: #ffffff;
        }

        .blog-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #4f46e5, #7c3aed);
            transform: scaleX(0);
            transition: transform 0.3s ease;
            z-index: 2;
        }

        .blog-card:hover::before {
            transform: scaleX(1);
        }

        .blog-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(79, 70, 229, 0.12) !important;
        }

        .blog-card-img {
            transition: transform 0.5s ease, filter 0.5s ease;
        }

        .blog-card:hover .blog-card-img {
            transform: scale(1.08);
        }

        .img-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0) 60%, rgba(0,0,0,0.15) 100%);
            pointer-events: none;
        }

        .blog-title-link:hover {
            color: #4f46e5 !important;
        }

        .blog-card-title {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.4;
            min-height: 2.8rem;
        }

        .blog-card-excerpt {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.6;
            min-height: 4.8rem;
        }

        .transition-arrow {
            transition: transform 0.3s ease;
            display: inline-block;
        }

        .blog-card:hover .transition-arrow,
        .view-all-btn:hover .transition-arrow {
            transform: translateX(4px);
        }

        .view-all-btn {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            border: none;
            color: #ffffff;
            transition: all 0.3s ease;
        }

        .view-all-btn:hover {
            background: linear-gradient(135deg, #4338ca, #6d28d9);
            color: #ffffff;
            box-shadow: 0 10px 20px rgba(79, 70, 229, 0.25) !important;
        }

        .fs-7 {
            font-size: 0.8rem;
        }
    </style>
@endif
