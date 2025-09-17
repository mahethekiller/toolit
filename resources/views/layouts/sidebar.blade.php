<div class="sidebar p-3 shadow-lg rounded-end" style="background: #1e293b; min-height: 100vh;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="text-white fw-bold m-0">Admin</h4>
        <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-primary rounded-pill px-3">
            <i class="fas fa-eye me-1"></i> View Site
        </a>
    </div>

    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a class="nav-link text-white py-2 px-3 rounded sidebar-link" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-home me-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-white py-2 px-3 rounded sidebar-link" href="{{ route('admin.tools.index') }}">
                <i class="fas fa-tools me-2"></i> Tools
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-white py-2 px-3 rounded sidebar-link"
                href="{{ route('admin.contact-messages.index') }}">
                <i class="fas fa-envelope me-2"></i> Contact Messages
            </a>
        </li>

        <!-- SEO Dropdown (modified) -->
        <li class="nav-item mb-2">
            <a class="nav-link text-white py-2 px-3 rounded sidebar-link d-flex justify-content-between align-items-center"
                data-bs-toggle="collapse" href="#seoMenu" role="button" aria-expanded="false" aria-controls="seoMenu">
                <span><i class="fas fa-search me-2"></i> SEO Management</span>
                &nbsp;<i class="fas fa-chevron-down small"></i>
            </a>

            <!-- Collapsible Dropdown -->
            <div class="collapse ps-4 mt-1" id="seoMenu">
                <ul class="list-unstyled">
                    <li>
                        <a class="nav-link text-white py-2 px-2 rounded sidebar-link"
                            href="{{ route('admin.seo.index') }}">
                            <i class="fas fa-list me-2"></i> All SEO Records
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-white py-2 px-2 rounded sidebar-link"
                            href="{{ route('admin.seo.create') }}">
                            <i class="fas fa-plus-circle me-2"></i> Add New SEO
                        </a>
                    </li>

                    <li>
                        <a class="nav-link text-white py-2 px-2 rounded sidebar-link"
                            href="{{ route('admin.scripts.edit') }}">
                            <i class="fas fa-code me-2"></i> Scripts
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item mb-2">
            <a class="nav-link text-white py-2 px-3 rounded sidebar-link" href="{{ route('admin.users.index') }}">
                <i class="fas fa-users me-2"></i> Users
            </a>
        </li>
        <li class="nav-item mb-3">
            <a class="nav-link text-white py-2 px-3 rounded sidebar-link" href="{{ route('admin.roles.index') }}">
                <i class="fas fa-user-shield me-2"></i> Roles
            </a>
        </li>

        <li class="nav-item mt-3">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger w-100 rounded-pill shadow-sm">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </button>
            </form>
        </li>
    </ul>
</div>

<style>
    .sidebar-link {
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        font-weight: 500;
    }

    .sidebar-link:hover {
        background-color: #334155;
        transform: translateX(5px);
        color: #fff !important;
    }

    /* Dropdown Slide Animation */
    .dropdown-menu.animate-slide {
        display: block;
        opacity: 0;
        transform: translateY(-10px);
        transition: all 0.3s ease;
        visibility: hidden;
        max-height: 0;
        overflow: hidden;
    }

    .dropdown-menu.show.animate-slide {
        opacity: 1;
        transform: translateY(0);
        visibility: visible;
        max-height: 500px;
    }

    .dropdown-menu .dropdown-item {
        transition: background 0.2s;
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: #e2e8f0;
        border-radius: 8px;
    }

    /* Extra style for collapsible submenu */
    #seoMenu .nav-link {
        font-size: 0.9rem;
        background-color: #1e293b;
    }

    #seoMenu .nav-link:hover {
        background-color: #334155;
    }

    .sidebar-link[aria-expanded="true"] .fa-chevron-down {
        transform: rotate(180deg);
        transition: transform 0.3s ease;
    }
</style>
