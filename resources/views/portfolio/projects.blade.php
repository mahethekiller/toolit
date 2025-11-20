<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects - {{ $settings->full_name }}</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
            --text-color: #333;
            --text-light: #777;
        }

        body {
            font-family: 'Roboto', sans-serif;
            color: var(--text-color);
            line-height: 1.6;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }

        .projects-hero {
            background: linear-gradient(135deg, var(--secondary-color) 0%, var(--dark-color) 100%);
            color: white;
            padding: 6rem 0 4rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .projects-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="%23ffffff" opacity="0.05"><polygon points="1000,100 1000,0 0,100"/></svg>');
            background-size: cover;
        }

        .projects-hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            position: relative;
        }

        .projects-hero .lead {
            font-size: 1.3rem;
            opacity: 0.9;
            position: relative;
        }

        .back-to-portfolio {
            position: absolute;
            top: 2rem;
            left: 2rem;
            z-index: 10;
        }

        .projects-section {
            padding: 4rem 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            min-height: 100vh;
        }

        .project-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            background: white;
            height: 100%;
            position: relative;
        }

        .project-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .project-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
        }

        .project-card:hover::before {
            transform: scaleX(1);
        }

        .project-image {
            height: 250px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .project-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .project-card:hover .project-image img {
            transform: scale(1.1);
        }

        .project-icon {
            font-size: 3rem;
            color: white;
            opacity: 0.8;
        }

        .project-content {
            padding: 2rem;
            position: relative;
        }

        .project-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--secondary-color);
        }

        .project-description {
            color: var(--text-light);
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .project-technologies {
            margin-bottom: 1.5rem;
        }

        .tech-badge {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            margin: 0.2rem;
            display: inline-block;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .tech-badge:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .tech-badge.active {
            background: linear-gradient(135deg, var(--accent-color), #c0392b);
            transform: scale(1.1);
        }

        .project-actions {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .btn-project {
            padding: 0.6rem 1.2rem;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary-project {
            background: linear-gradient(135deg, var(--primary-color), #2980b9);
            color: white;
        }

        .btn-outline-project {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
        }

        .btn-project:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .btn-primary-project:hover {
            background: linear-gradient(135deg, #2980b9, var(--primary-color));
            color: white;
        }

        .btn-outline-project:hover {
            background: var(--primary-color);
            color: white;
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--text-light);
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .filter-section {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 3rem;
        }

        .filter-buttons {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 0.8rem;
            margin-bottom: 1.5rem;
        }

        .filter-btn {
            padding: 0.8rem 1.5rem;
            border: 2px solid var(--primary-color);
            background: transparent;
            color: var(--primary-color);
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .filter-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--primary-color);
            transition: left 0.3s ease;
            z-index: -1;
        }

        .filter-btn.active,
        .filter-btn:hover {
            color: white;
            transform: translateY(-2px);
        }

        .filter-btn.active::before,
        .filter-btn:hover::before {
            left: 0;
        }

        .project-count {
            background: var(--accent-color);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-left: 0.5rem;
        }

        .tech-stats {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
            margin-top: 1.5rem;
        }

        .tech-stat-item {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 1rem 1.5rem;
            border-radius: 15px;
            text-align: center;
            min-width: 120px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid transparent;
        }

        .tech-stat-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            border-color: var(--primary-color);
        }

        .tech-stat-item.active {
            background: linear-gradient(135deg, var(--primary-color), #2980b9);
            color: white;
            transform: scale(1.05);
        }

        .tech-stat-count {
            font-size: 2rem;
            font-weight: 700;
            display: block;
            margin-bottom: 0.5rem;
        }

        .tech-stat-name {
            font-size: 0.9rem;
            font-weight: 600;
            opacity: 0.8;
        }

        .results-count {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 1.1rem;
            color: var(--text-light);
        }

        .no-results {
            text-align: center;
            padding: 3rem;
            color: var(--text-light);
        }

        .no-results i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        /* Animation classes */
        .fade-in {
            animation: fadeIn 0.6s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .stagger-item {
            animation: stagger 0.5s ease-out forwards;
            opacity: 0;
        }

        @keyframes stagger {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .project-card.hidden {
            display: none;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .projects-hero h1 {
                font-size: 2.5rem;
            }

            .back-to-portfolio {
                position: relative;
                top: auto;
                left: auto;
                margin-bottom: 2rem;
            }

            .project-card {
                margin-bottom: 2rem;
            }

            .tech-stats {
                gap: 0.5rem;
            }

            .tech-stat-item {
                min-width: 100px;
                padding: 0.8rem 1rem;
            }

            .tech-stat-count {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="projects-hero">
        <div class="container">
            <a href="{{ url('/') }}" class="btn btn-outline-light back-to-portfolio">
                <i class="fas fa-arrow-left me-2"></i> Back to Portfolio
            </a>

            <h1>My Projects</h1>
            <p class="lead">A showcase of my work and development projects</p>

            <div class="mt-4">
                <span class="badge bg-light text-dark fs-6 p-2">
                    <i class="fas fa-project-diagram me-2"></i>
                    {{ $projects->count() }} Projects
                </span>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section class="projects-section">
        <div class="container">
            <!-- Filter Section -->
            <div class="filter-section">
                <div class="text-center mb-4">
                    <h3>Filter by Technology</h3>
                    <p class="text-muted">Click on any technology to filter projects</p>
                </div>

                <!-- Quick Filter Buttons -->
                <div class="filter-buttons">
                    <button class="filter-btn active" data-filter="all">
                        All Projects <span class="project-count">{{ $projects->count() }}</span>
                    </button>
                    <button class="filter-btn" data-filter="laravel">
                        Laravel <span class="project-count">{{ $techCounts['Laravel'] ?? 0 }}</span>
                    </button>
                    <button class="filter-btn" data-filter="wordpress">
                        WordPress <span class="project-count">{{ $techCounts['WordPress'] ?? 0 }}</span>
                    </button>
                    <button class="filter-btn" data-filter="react">
                        React <span class="project-count">{{ $techCounts['React'] ?? 0 }}</span>
                    </button>
                    <button class="filter-btn" data-filter="php">
                        PHP <span class="project-count">{{ $techCounts['PHP'] ?? 0 }}</span>
                    </button>
                </div>

                <!-- Technology Statistics -->
                <div class="tech-stats">
                    @foreach($topTechnologies as $tech => $count)
                    <div class="tech-stat-item" data-tech="{{ strtolower($tech) }}">
                        <span class="tech-stat-count">{{ $count }}</span>
                        <span class="tech-stat-name">{{ $tech }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Results Count -->
            <div class="results-count" id="resultsCount">
                Showing all {{ $projects->count() }} projects
            </div>

            <!-- Projects Grid -->
            @if($projects->count() > 0)
            <div class="row" id="projectsGrid">
                @foreach($projects as $index => $project)
                <div class="col-lg-4 col-md-6 mb-4 stagger-item project-item"
                     data-tech="{{ strtolower(implode(' ', $project->technologies)) }}"
                     style="animation-delay: {{ $index * 0.1 }}s">
                    <div class="project-card fade-in">
                        <div class="project-image">
                            @if($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name }}">
                            @else
                                <div class="project-icon">
                                    <i class="fas fa-project-diagram"></i>
                                </div>
                            @endif
                        </div>

                        <div class="project-content">
                            <h3 class="project-title">{{ $project->name }}</h3>
                            <p class="project-description">{{ $project->description }}</p>

                            <div class="project-technologies">
                                @foreach($project->technologies as $tech)
                                <span class="tech-badge" data-tech="{{ strtolower($tech) }}">{{ $tech }}</span>
                                @endforeach
                            </div>

                            <div class="project-actions">
                                @if($project->link)
                                <a href="{{ $project->link }}" target="_blank" class="btn btn-primary-project">
                                    <i class="fas fa-external-link-alt"></i> Live Demo
                                </a>
                                @endif
                                <button class="btn btn-outline-project view-details" data-project="{{ $project->id }}">
                                    <i class="fas fa-info-circle"></i> Details
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- No Results Message -->
            <div class="no-results" id="noResults" style="display: none;">
                <i class="fas fa-search"></i>
                <h4>No Projects Found</h4>
                <p>No projects match the selected technology filter.</p>
                <button class="btn btn-primary-project" onclick="clearFilters()">
                    <i class="fas fa-times me-2"></i> Clear Filters
                </button>
            </div>

            @else
            <div class="empty-state">
                <i class="fas fa-project-diagram"></i>
                <h3>No Projects Yet</h3>
                <p>Projects will be displayed here once they are added to the portfolio.</p>
                <a href="{{ url('/') }}" class="btn btn-primary-project mt-3">
                    <i class="fas fa-home me-2"></i> Back to Portfolio
                </a>
            </div>
            @endif
        </div>
    </section>

    <!-- Project Modal -->
    <div class="modal fade" id="projectModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="projectModalTitle">Project Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="projectModalBody">
                    <!-- Content will be loaded here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Technology filtering functionality
        let currentFilter = 'all';
        let allProjects = {{ $projects->count() }};

        function filterProjects(tech) {
            currentFilter = tech;

            // Update filter buttons
            $('.filter-btn').removeClass('active');
            $(`.filter-btn[data-filter="${tech}"]`).addClass('active');

            // Update tech stat items
            $('.tech-stat-item').removeClass('active');
            if (tech !== 'all') {
                $(`.tech-stat-item[data-tech="${tech}"]`).addClass('active');
            }

            let visibleCount = 0;

            // Filter projects
            $('.project-item').each(function() {
                const projectTech = $(this).data('tech');

                if (tech === 'all' || projectTech.includes(tech)) {
                    $(this).show().addClass('fade-in');
                    visibleCount++;
                } else {
                    $(this).hide().removeClass('fade-in');
                }
            });

            // Update results count
            if (tech === 'all') {
                $('#resultsCount').text(`Showing all ${allProjects} projects`);
            } else {
                $('#resultsCount').text(`Showing ${visibleCount} projects with ${tech}`);
            }

            // Show/hide no results message
            if (visibleCount === 0) {
                $('#noResults').show();
                $('#projectsGrid').hide();
            } else {
                $('#noResults').hide();
                $('#projectsGrid').show();
            }

            // Update tech badges
            $('.tech-badge').removeClass('active');
            if (tech !== 'all') {
                $(`.tech-badge[data-tech="${tech}"]`).addClass('active');
            }
        }

        function clearFilters() {
            filterProjects('all');
        }

        $(document).ready(function() {
            // Initialize filtering
            $('.filter-btn').on('click', function() {
                const filter = $(this).data('filter');
                filterProjects(filter);
            });

            // Tech stat items filtering
            $('.tech-stat-item').on('click', function() {
                const tech = $(this).data('tech');
                filterProjects(tech);
            });

            // Tech badges filtering
            $('.tech-badge').on('click', function(e) {
                e.stopPropagation();
                const tech = $(this).data('tech');
                filterProjects(tech);
            });

            // Add animation to project cards
            $('.stagger-item').each(function(index) {
                $(this).css({
                    'animation-delay': (index * 0.1) + 's',
                    'transform': 'translateY(30px)'
                });
            });

            // Project details modal
            $('.view-details').on('click', function() {
                const projectId = $(this).data('project');
                const projectCard = $(this).closest('.project-card');
                const projectName = projectCard.find('.project-title').text();
                const projectDescription = projectCard.find('.project-description').text();
                const projectTechnologies = projectCard.find('.project-technologies').html();
                const projectLink = projectCard.find('.btn-primary-project').attr('href');

                let modalContent = `
                    <div class="project-modal-content">
                        <h4>${projectName}</h4>
                        <p class="text-muted">${projectDescription}</p>

                        <div class="mb-3">
                            <h6>Technologies Used:</h6>
                            ${projectTechnologies}
                        </div>
                `;

                if (projectLink) {
                    modalContent += `
                        <div class="mt-4">
                            <a href="${projectLink}" target="_blank" class="btn btn-primary">
                                <i class="fas fa-external-link-alt me-2"></i> Visit Live Project
                            </a>
                        </div>
                    `;
                }

                modalContent += `</div>`;

                $('#projectModalTitle').text(projectName);
                $('#projectModalBody').html(modalContent);
                $('#projectModal').modal('show');
            });

            // Add hover effects
            $('.project-card').hover(
                function() {
                    $(this).addClass('hover-active');
                },
                function() {
                    $(this).removeClass('hover-active');
                }
            );
        });

        // Intersection Observer for fade-in animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                }
            });
        }, { threshold: 0.1 });

        document.addEventListener('DOMContentLoaded', function() {
            const staggerItems = document.querySelectorAll('.stagger-item');
            staggerItems.forEach(item => observer.observe(item));
        });
    </script>
</body>
</html>
