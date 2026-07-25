@php
    $sidebarBlogPosts = getRecentBlogPosts(3);
@endphp

@if (!empty($sidebarBlogPosts))
    <div class="sidebar-recent-blogs mt-4 pt-3 border-top">
        <h3 class="h6 fw-bold mb-3 text-dark d-flex align-items-center">
            <i class="fas fa-blog text-primary me-2"></i> Recent Articles
        </h3>
        
        <div class="d-flex flex-column gap-3">
            @foreach ($sidebarBlogPosts as $post)
                <article class="sidebar-blog-item d-flex align-items-center gap-3">
                    <a href="{{ $post['url'] }}" target="_blank" rel="noopener" class="flex-shrink-0 text-decoration-none">
                        <div class="overflow-hidden rounded-3 shadow-xs" style="width: 56px; height: 56px;">
                            <img src="{{ $post['image'] }}" 
                                 alt="{{ $post['title'] }}" 
                                 class="w-100 h-100 object-fit-cover sidebar-blog-img"
                                 loading="lazy">
                        </div>
                    </a>
                    <div class="flex-grow-1 min-w-0">
                        <h4 class="h6 mb-1 text-truncate-2" style="font-size: 0.85rem; line-height: 1.35;">
                            <a href="{{ $post['url'] }}" target="_blank" rel="noopener" class="text-dark text-decoration-none sidebar-blog-title">
                                {{ $post['title'] }}
                            </a>
                        </h4>
                        <span class="text-muted text-xs d-block">
                            <i class="far fa-calendar-alt me-1" style="font-size: 0.75rem;"></i> {{ $post['date'] }}
                        </span>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-3 text-end">
            <a href="https://www.onlinetxttools.com/blog" target="_blank" rel="noopener" class="text-primary text-decoration-none fw-semibold" style="font-size: 0.8rem;">
                More Articles <i class="fas fa-arrow-right ms-1" style="font-size: 0.75rem;"></i>
            </a>
        </div>
    </div>

    <style>
        .text-truncate-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .text-xs {
            font-size: 0.75rem;
        }
        .shadow-xs {
            box-shadow: 0 2px 5px rgba(0,0,0,0.08);
        }
        .sidebar-blog-img {
            transition: transform 0.3s ease;
        }
        .sidebar-blog-item:hover .sidebar-blog-img {
            transform: scale(1.1);
        }
        .sidebar-blog-title {
            transition: color 0.2s ease;
        }
        .sidebar-blog-item:hover .sidebar-blog-title {
            color: #4f46e5 !important;
        }
    </style>
@endif
