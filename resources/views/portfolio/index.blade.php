<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahendra Kumar - Portfolio</title>
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
            scroll-behavior: smooth;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }

        .section-title {
            position: relative;
            margin-bottom: 2rem;
            padding-bottom: 0.5rem;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background-color: var(--primary-color);
        }

        /* Header Styles */
        .navbar {
            background-color: var(--secondary-color);
            padding: 1rem 0;
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }

        .navbar-dark .navbar-nav .nav-link {
            color: rgba(255,255,255,0.8);
            font-weight: 500;
            margin: 0 0.5rem;
            transition: color 0.3s;
        }

        .navbar-dark .navbar-nav .nav-link:hover {
            color: var(--primary-color);
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--secondary-color) 0%, var(--dark-color) 100%);
            color: white;
            padding: 8rem 0 5rem;
            position: relative;
            overflow: hidden;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .hero-content .lead {
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }

        .profile-img {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid rgba(255,255,255,0.2);
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        /* About Section */
        .about-section {
            padding: 5rem 0;
            background-color: #f8f9fa;
        }

        /* Skills Section */
        .skills-section {
            padding: 5rem 0;
        }

        .skill-item {
            margin-bottom: 1.5rem;
        }

        .skill-name {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }

        .skill-bar {
            height: 8px;
            background-color: #e9ecef;
            border-radius: 4px;
            overflow: hidden;
        }

        .skill-level {
            height: 100%;
            background-color: var(--primary-color);
            border-radius: 4px;
            transition: width 1s ease-in-out;
            width: 0%;
        }

        /* Experience Section */
        .experience-section {
            padding: 5rem 0;
            background-color: #f8f9fa;
        }

        .timeline {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
        }

        .timeline::after {
            content: '';
            position: absolute;
            width: 6px;
            background-color: var(--primary-color);
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -3px;
        }

        .timeline-item {
            padding: 10px 40px;
            position: relative;
            width: 50%;
            box-sizing: border-box;
        }

        .timeline-item:nth-child(odd) {
            left: 0;
        }

        .timeline-item:nth-child(even) {
            left: 50%;
        }

        .timeline-content {
            padding: 20px;
            background-color: white;
            border-radius: 6px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .timeline-item::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background-color: white;
            border: 4px solid var(--primary-color);
            border-radius: 50%;
            top: 15px;
            right: -10px;
            z-index: 1;
        }

        .timeline-item:nth-child(even)::after {
            left: -10px;
        }

        /* Projects Section */
        .projects-section {
            padding: 5rem 0;
        }

        .project-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
        }

        .project-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .project-img {
            height: 200px;
            object-fit: cover;
        }

        /* Contact Section */
        .contact-section {
            padding: 5rem 0;
            background-color: var(--secondary-color);
            color: white;
        }

        .contact-info {
            margin-bottom: 2rem;
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            background-color: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-size: 1.2rem;
        }

        /* Footer */
        .footer {
            background-color: var(--dark-color);
            color: white;
            padding: 2rem 0;
            text-align: center;
        }

        .social-links a {
            color: white;
            font-size: 1.5rem;
            margin: 0 0.5rem;
            transition: color 0.3s;
        }

        .social-links a:hover {
            color: var(--primary-color);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }

            .timeline::after {
                left: 31px;
            }

            .timeline-item {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
            }

            .timeline-item:nth-child(even) {
                left: 0;
            }

            .timeline-item::after {
                left: 21px;
                right: auto;
            }

            .timeline-item:nth-child(even)::after {
                left: 21px;
            }
        }

        /* Admin Badge */
        .admin-badge {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">{{ config('app.name', 'Mahendra Kumar') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#skills">Skills</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#experience">Experience</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#projects">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-cog me-1"></i> Admin
                        </a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
   <!-- Hero Section -->
<section id="home" class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content">
                    <h1>{{ $settings->full_name }}</h1>
                    <p class="lead">{{ $settings->designation }}</p>
                    <p class="mb-4">{{ $settings->intro }}</p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#contact" class="btn btn-primary btn-lg">Get In Touch</a>
                        <a href="#projects" class="btn btn-outline-light btn-lg">View Projects</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <img src="{{ $settings->getProfileImageUrl() }}" alt="{{ $settings->full_name }}" class="profile-img">
            </div>

            <div class="col-lg-6 text-center">
    <!-- Debug info - remove this after testing -->
    <div style="display: none;">
        Image Path: {{ $settings->profile_image }}<br>
        Full URL: {{ $settings->getProfileImageUrl() }}<br>
        Storage Exists: {{ \Storage::disk('public')->exists($settings->profile_image) ? 'Yes' : 'No' }}
    </div>

    <img src="{{ $settings->getProfileImageUrl() }}" alt="{{ $settings->full_name }}" class="profile-img"
         onerror="this.src='https://via.placeholder.com/300'">
</div>
        </div>
    </div>
</section>

   <!-- About Section -->
<section id="about" class="about-section">
    <div class="container">
        <h2 class="section-title">About Me</h2>
        <div class="row">
            <div class="col-lg-8">
                <p class="lead">{{ $settings->about_me }}</p>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Personal Details</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-envelope me-2"></i> {{ $settings->email }}</li>
                            <li class="mb-2"><i class="fas fa-phone me-2"></i> {{ $settings->phone }}</li>
                            <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> {{ $settings->location }}</li>
                            <li class="mb-2"><i class="fas fa-calendar me-2"></i> {{ $settings->date_of_birth->format('Y-m-d') }}</li>
                            @if($settings->website)
                            <li class="mb-2"><i class="fas fa-globe me-2"></i> {{ $settings->website }}</li>
                            @endif
                        </ul>
                        <div class="mt-3">
                            @if($settings->linkedin)
                            <a href="{{ $settings->linkedin }}" target="_blank" class="btn btn-outline-primary btn-sm me-2">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            @endif
                            @if($settings->github)
                            <a href="{{ $settings->github }}" target="_blank" class="btn btn-outline-dark btn-sm me-2">
                                <i class="fab fa-github"></i>
                            </a>
                            @endif
                            @if($settings->website)
                            <a href="{{ $settings->website }}" target="_blank" class="btn btn-outline-info btn-sm">
                                <i class="fas fa-globe"></i>
                            </a>
                            @endif

                            <!-- Additional Social Links -->
                            @if($settings->social_links && count($settings->social_links) > 0)
                                @foreach($settings->social_links as $socialLink)
                                <a href="{{ $socialLink['url'] }}" target="_blank" class="btn btn-outline-secondary btn-sm me-1 mt-1">
                                    <i class="{{ $socialLink['icon'] }}"></i>
                                </a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Skills Section -->
    <section id="skills" class="skills-section">
        <div class="container">
            <h2 class="section-title">Technical Skills</h2>
            <div class="row">
                @if($skillsByCategory['languages']->count() > 0)
                <div class="col-md-6">
                    <h4>Programming Languages</h4>
                    @foreach($skillsByCategory['languages'] as $skill)
                    <div class="skill-item">
                        <div class="skill-name">
                            <span>{{ $skill->name }}</span>
                            <span>{{ $skill->level }}%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-level" data-level="{{ $skill->level }}"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif

                @if($skillsByCategory['frameworks']->count() > 0)
                <div class="col-md-6">
                    <h4>Frameworks & Technologies</h4>
                    @foreach($skillsByCategory['frameworks'] as $skill)
                    <div class="skill-item">
                        <div class="skill-name">
                            <span>{{ $skill->name }}</span>
                            <span>{{ $skill->level }}%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-level" data-level="{{ $skill->level }}"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

            @if($skillsByCategory['other']->count() > 0)
            <div class="row mt-4">
                <div class="col-12">
                    <h4>Other Skills</h4>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($skillsByCategory['other'] as $skill)
                        <span class="badge bg-primary p-2">{{ $skill->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- Experience Section -->
    <section id="experience" class="experience-section">
        <div class="container">
            <h2 class="section-title">Employment Details</h2>
            @if($experiences->count() > 0)
            <div class="timeline">
                @foreach($experiences as $experience)
                <div class="timeline-item">
                    <div class="timeline-content">
                        <h4>{{ $experience->position }}</h4>
                        <h5>{{ $experience->company }}</h5>
                        <p class="text-muted">{{ $experience->period }} | {{ $experience->location }}</p>
                        <ul>
                            @foreach($experience->responsibilities as $responsibility)
                            <li>{{ $responsibility }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-5">
                <i class="fas fa-briefcase fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">No experiences added yet</h4>
                <p class="text-muted">Work experiences will be displayed here once added.</p>
            </div>
            @endif
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="projects-section">
        <div class="container">
            <h2 class="section-title">Projects</h2>
            @if($projects->count() > 0)
            <div class="row">
                @foreach($projects as $project)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card project-card">
                        @if($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top project-img" alt="{{ $project->name }}">
                        @else
                        <div class="card-img-top project-img bg-light d-flex align-items-center justify-content-center">
                            <i class="fas fa-project-diagram fa-3x text-muted"></i>
                        </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->name }}</h5>
                            <p class="card-text">{{ $project->description }}</p>
                            <div class="mb-3">
                                @foreach($project->technologies as $tech)
                                <span class="badge bg-secondary me-1 mb-1">{{ $tech }}</span>
                                @endforeach
                            </div>
                            @if($project->link)
                            <a href="{{ $project->link }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-external-link-alt me-1"></i> View Project
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-5">
                <i class="fas fa-project-diagram fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">No projects added yet</h4>
                <p class="text-muted">Projects will be displayed here once added.</p>
            </div>
            @endif
        </div>
    </section>

    <!-- Contact Section -->
    <!-- Contact Section -->
<section id="contact" class="contact-section">
    <div class="container">
        <h2 class="section-title text-white">Get In Touch</h2>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-info d-flex">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h5>Email</h5>
                                <p>{{ $settings->email }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-info d-flex">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <h5>Phone</h5>
                                <p>{{ $settings->phone }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-info d-flex">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h5>Location</h5>
                                <p>{{ $settings->location }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-info d-flex">
                            <div class="contact-icon">
                                <i class="fas fa-globe"></i>
                            </div>
                            <div>
                                <h5>Website</h5>
                                <p>{{ $settings->website ?: 'Not specified' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <h4 class="mb-3">Connect with me</h4>
                    <div class="social-links">
                        @if($settings->linkedin)
                        <a href="{{ $settings->linkedin }}" target="_blank" title="LinkedIn">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        @endif
                        @if($settings->github)
                        <a href="{{ $settings->github }}" target="_blank" title="GitHub">
                            <i class="fab fa-github"></i>
                        </a>
                        @endif
                        @if($settings->website)
                        <a href="{{ $settings->website }}" target="_blank" title="Website">
                            <i class="fas fa-globe"></i>
                        </a>
                        @endif

                        <!-- Additional Social Links -->
                        @if($settings->social_links && count($settings->social_links) > 0)
                            @foreach($settings->social_links as $socialLink)
                            <a href="{{ $socialLink['url'] }}" target="_blank" title="{{ $socialLink['name'] }}">
                                <i class="{{ $socialLink['icon'] }}"></i>
                            </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Footer -->
<footer class="footer">
    <div class="container">
        <p>&copy; {{ date('Y') }} {{ $settings->full_name }}. All Rights Reserved.</p>
        @auth
        <small class="text-muted">
            <a href="{{ route('admin.dashboard') }}" class="text-muted text-decoration-none">
                <i class="fas fa-cog me-1"></i> Admin Panel
            </a>
        </small>
        @endauth
    </div>
</footer>

    <!-- Admin Access Badge -->
    @auth
    <div class="admin-badge">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-sm shadow">
            <i class="fas fa-cog me-1"></i> Admin
        </a>
    </div>
    @endauth

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Animate skill bars on scroll
            function animateSkillBars() {
                $('.skill-level').each(function() {
                    var skillLevel = $(this).data('level');
                    var skillPosition = $(this).offset().top;
                    var windowHeight = $(window).height();
                    var scrollPosition = $(window).scrollTop();

                    if (scrollPosition > skillPosition - windowHeight + 100) {
                        $(this).css('width', skillLevel + '%');
                    }
                });
            }

            // Initial animation check
            animateSkillBars();

            // Animate on scroll
            $(window).scroll(function() {
                animateSkillBars();
            });

            // Smooth scrolling for navigation links
            $('a[href*="#"]').on('click', function(e) {
                e.preventDefault();

                $('html, body').animate(
                    {
                        scrollTop: $($(this).attr('href')).offset().top - 70,
                    },
                    500,
                    'linear'
                );
            });

            // Navbar background change on scroll
            $(window).scroll(function() {
                if ($(window).scrollTop() > 50) {
                    $('.navbar').addClass('navbar-scrolled');
                } else {
                    $('.navbar').removeClass('navbar-scrolled');
                }
            });

            // Initialize skill bars with 0 width
            $('.skill-level').css('width', '0%');
        });
    </script>
</body>
</html>
