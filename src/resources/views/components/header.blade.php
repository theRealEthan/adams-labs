<header class="navbar-custom">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <!-- Logo -->
            <div class="logo-container">
                <a href="/">
                    <img src="{{ asset('images/logo-full.png') }}" alt="Adams Labs">
                </a>
            </div>

            <!-- Navigation -->
            <nav class="d-none d-lg-block">
                <ul class="nav-links">
                    <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                    <li><a href="/projects" class="{{ request()->is('projects') ? 'active' : '' }}">Projects</a></li>
                    <li><a href="/about" class="{{ request()->is('about') ? 'active' : '' }}">About</a></li>
                    <li><a href="/contact" class="{{ request()->is('contact') ? 'active' : '' }}">Contact</a></li>
                </ul>
            </nav>

            <!-- Auth Buttons -->
            <div class="d-flex align-items-center gap-3">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn-custom">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn-custom">Sign In</a>
                    @endauth
                @endif

                <!-- Mobile Menu Toggle -->
                <button class="d-lg-none btn-ghost" style="padding: 0.5rem 0.75rem;" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Menu Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
    <div class="offcanvas-header border-bottom">
        <div class="logo-container" style="max-width: 100px;">
            <img src="{{ asset('images/logo-full.png') }}" alt="Adams Labs" style="width: 100%;">
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <nav class="d-flex flex-column gap-2">
            <a href="/" class="py-3 text-decoration-none {{ request()->is('/') ? 'fw-bold text-black' : 'text-secondary' }}" style="border-bottom: 1px solid var(--gray-100);">Home</a>
            <a href="/projects" class="py-3 text-decoration-none {{ request()->is('projects') ? 'fw-bold text-black' : 'text-secondary' }}" style="border-bottom: 1px solid var(--gray-100);">Projects</a>
            <a href="/about" class="py-3 text-decoration-none {{ request()->is('about') ? 'fw-bold text-black' : 'text-secondary' }}" style="border-bottom: 1px solid var(--gray-100);">About</a>
            <a href="/contact" class="py-3 text-decoration-none {{ request()->is('contact') ? 'fw-bold text-black' : 'text-secondary' }}">Contact</a>
        </nav>
    </div>
</div>
