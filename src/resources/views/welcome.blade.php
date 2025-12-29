<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adams Labs - Built, not marketed.</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Inter Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- SweetAlert2 -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <style>
        :root {
            --color-black: #000000;
            --color-white: #FFFFFF;
            --color-gray-light: #F5F5F5;
            --color-gray-medium: #E0E0E0;
            --color-gray-dark: #666666;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background-color: var(--color-white);
            color: var(--color-black);
            line-height: 1.8;
            -webkit-font-smoothing: antialiased;
        }

        .container-custom {
            max-width: 720px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        /* Header */
        .header {
            padding: 2rem 0;
            border-bottom: 1px solid var(--color-gray-medium);
        }

        .logo-container {
            max-width: 200px;
        }

        .logo-container img {
            width: 100%;
            height: auto;
        }

        /* Hero Section */
        .hero {
            padding: 4rem 0;
        }

        .tagline {
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--color-gray-dark);
            margin-bottom: 1rem;
        }

        .hero-title {
            font-size: 2rem;
            font-weight: 600;
            line-height: 1.3;
            margin-bottom: 1.5rem;
        }

        .hero-description {
            font-size: 1.125rem;
            color: var(--color-gray-dark);
            margin-bottom: 2rem;
        }

        /* Content Sections */
        .content-section {
            padding: 3rem 0;
            border-top: 1px solid var(--color-gray-medium);
        }

        .content-section:first-of-type {
            border-top: none;
        }

        .section-title {
            font-size: 0.875rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 1rem;
        }

        .section-content {
            font-size: 1rem;
            color: var(--color-gray-dark);
        }

        .section-content p {
            margin-bottom: 1rem;
        }

        .section-content p:last-child {
            margin-bottom: 0;
        }

        /* Principles List */
        .principles-list {
            list-style: none;
            padding: 0;
        }

        .principles-list li {
            padding: 0.75rem 0;
            border-bottom: 1px solid var(--color-gray-light);
            font-size: 1rem;
        }

        .principles-list li:last-child {
            border-bottom: none;
        }

        /* Buttons */
        .btn-custom {
            display: inline-block;
            padding: 0.75rem 2rem;
            background-color: var(--color-black);
            color: var(--color-white);
            text-decoration: none;
            border: 2px solid var(--color-black);
            font-weight: 500;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .btn-custom:hover {
            background-color: var(--color-white);
            color: var(--color-black);
        }

        .btn-outline {
            background-color: var(--color-white);
            color: var(--color-black);
            border: 2px solid var(--color-black);
        }

        .btn-outline:hover {
            background-color: var(--color-black);
            color: var(--color-white);
        }

        /* Footer */
        .footer {
            padding: 3rem 0 2rem;
            border-top: 1px solid var(--color-gray-medium);
            margin-top: 4rem;
        }

        .footer-content {
            font-size: 0.875rem;
            color: var(--color-gray-dark);
        }

        /* Auth Links */
        .auth-links {
            text-align: right;
        }

        .auth-links a {
            color: var(--color-black);
            text-decoration: none;
            margin-left: 1.5rem;
            font-size: 0.875rem;
            border-bottom: 1px solid transparent;
            transition: border-color 0.2s ease;
        }

        .auth-links a:hover {
            border-bottom-color: var(--color-black);
        }

        /* SweetAlert2 Custom Styling */
        .swal2-popup {
            font-family: 'Inter', sans-serif !important;
        }

        .swal2-styled.swal2-confirm {
            background-color: var(--color-black) !important;
            border: 2px solid var(--color-black) !important;
        }

        .swal2-styled.swal2-confirm:hover {
            background-color: var(--color-white) !important;
            color: var(--color-black) !important;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 1.5rem;
            }

            .hero-description {
                font-size: 1rem;
            }

            .auth-links {
                text-align: left;
                margin-top: 1rem;
            }

            .auth-links a {
                margin-left: 0;
                margin-right: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container-custom">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="logo-container">
                        <img src="{{ asset('images/logo-full.png') }}" alt="Adams Labs">
                    </div>
                </div>
                @if (Route::has('login'))
                    <div class="col-md-6">
                        <nav class="auth-links">
                            @auth
                                <a href="{{ url('/dashboard') }}">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        </nav>
                    </div>
                @endif
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container-custom">
            <div class="tagline">Built, not marketed.</div>
            <h1 class="hero-title">Simple, reliable software for everyday people.</h1>
            <p class="hero-description">
                Making the digital part of your day less irritating. Good software should be like good plumbing:
                reliable, robust, and invisible until you need it.
            </p>
            <div>
                <button class="btn-custom" onclick="showContactAlert()">Get Started</button>
            </div>
        </div>
    </section>

    <!-- Philosophy Section -->
    <section class="content-section">
        <div class="container-custom">
            <h2 class="section-title">Philosophy</h2>
            <div class="section-content">
                <p>
                    Adams Labs isn't trying to change the world. We're making the digital part of your day less irritating.
                </p>
                <p>
                    Our identity is defined by subtraction. If it needs explaining, it needs simplifying.
                </p>
            </div>
        </div>
    </section>

    <!-- Who We Build For -->
    <section class="content-section">
        <div class="container-custom">
            <h2 class="section-title">Who We Build For</h2>
            <div class="section-content">
                <p>
                    People, not companies. Users, not power-users. Real life, not edge cases.
                </p>
                <p>
                    Parents, freelancers, shop owners, small teams, and anyone who just wants things to work.
                    If you need training, we've already failed.
                </p>
            </div>
        </div>
    </section>

    <!-- What We Build -->
    <section class="content-section">
        <div class="container-custom">
            <h2 class="section-title">What We Build</h2>
            <div class="section-content">
                <p>
                    Simple productivity tools, everyday utilities, and small apps that solve one problem well.
                </p>
                <p>
                    We avoid dashboards, over-customisation, technical language, and complexity for its own sake.
                </p>
            </div>
        </div>
    </section>

    <!-- Product Principles -->
    <section class="content-section">
        <div class="container-custom">
            <h2 class="section-title">Product Principles</h2>
            <ul class="principles-list">
                <li>Easy to start</li>
                <li>Simple to use</li>
                <li>Forgiving of mistakes</li>
                <li>Reliable over time</li>
                <li>Respectful of attention</li>
            </ul>
            <div class="section-content mt-3">
                <p>If it adds stress, it doesn't ship.</p>
            </div>
        </div>
    </section>

    <!-- Design Philosophy -->
    <section class="content-section">
        <div class="container-custom">
            <h2 class="section-title">Design Philosophy</h2>
            <div class="section-content">
                <p>
                    Good design should feel obvious. Calm, readable, predictable.
                </p>
                <p>
                    If someone needs instructions, the design needs work.
                </p>
            </div>
        </div>
    </section>

    <!-- Engineering Philosophy -->
    <section class="content-section">
        <div class="container-custom">
            <h2 class="section-title">Engineering Philosophy</h2>
            <div class="section-content">
                <p>
                    Strong engineering is invisible. Our systems don't lose data, recover from errors,
                    handle bad input gracefully, and keep working quietly.
                </p>
                <p>
                    Users never need to think about the technology underneath.
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container-custom">
            <div class="footer-content">
                <p>Adams Labs. Independent software studio.</p>
                <p class="mt-2">A trusted name for simple tools. Known for restraint. Quietly recommended.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function showContactAlert() {
            Swal.fire({
                title: 'Get Started',
                html: '<p style="text-align: left; color: #666;">Ready to start? Sign up to access our tools and services.</p>',
                showCancelButton: true,
                confirmButtonText: 'Sign Up',
                cancelButtonText: 'Not Now',
                customClass: {
                    confirmButton: 'btn-custom',
                    cancelButton: 'btn-outline'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    @if (Route::has('register'))
                        window.location.href = '{{ route("register") }}';
                    @else
                        Swal.fire({
                            title: 'Coming Soon',
                            text: 'Registration will be available soon.',
                            icon: 'info',
                            confirmButtonText: 'OK',
                            customClass: {
                                confirmButton: 'btn-custom'
                            },
                            buttonsStyling: false
                        });
                    @endif
                }
            });
        }
    </script>
</body>
</html>
