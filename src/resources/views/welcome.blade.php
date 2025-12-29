@extends('layouts.app')

@section('title', 'Adams Labs - Built, not marketed.')

@push('styles')
    <style>
        /* ============================================
           Hero Section
           ============================================ */
        .hero {
            min-height: 85vh;
            display: flex;
            align-items: center;
            padding: calc(var(--space-4xl) + 80px) 0 var(--space-4xl);
            background: var(--white);
            position: relative;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .tagline {
            display: inline-flex;
            align-items: center;
            gap: var(--space-sm);
            font-family: var(--font-body);
            font-size: 0.6875rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            color: var(--gray-500);
            margin-bottom: var(--space-xl);
            padding: 0.5rem 1rem;
            background: var(--gray-50);
            border: 1px solid var(--gray-100);
        }

        .tagline::before {
            content: '';
            width: 6px;
            height: 6px;
            background: var(--black);
            border-radius: 50%;
        }

        .hero-title {
            font-family: var(--font-display);
            font-size: clamp(2.5rem, 6vw, 4rem);
            font-weight: 700;
            line-height: 1.05;
            margin-bottom: var(--space-xl);
            color: var(--black);
            letter-spacing: -0.03em;
        }

        .hero-description {
            font-size: 1.1875rem;
            color: var(--gray-500);
            margin-bottom: var(--space-2xl);
            line-height: 1.7;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-actions {
            display: flex;
            gap: var(--space-md);
            flex-wrap: wrap;
            justify-content: center;
        }

        .hero-stats {
            display: flex;
            gap: var(--space-3xl);
            margin-top: var(--space-3xl);
            padding-top: var(--space-2xl);
            border-top: 1px solid var(--gray-100);
            justify-content: center;
        }

        .stat {
            text-align: center;
        }

        .stat-number {
            font-family: var(--font-display);
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--black);
            line-height: 1;
            display: block;
        }

        .stat-label {
            font-size: 0.8125rem;
            color: var(--gray-400);
            margin-top: var(--space-sm);
            display: block;
            font-weight: 500;
        }

        /* ============================================
           Features Section
           ============================================ */
        .features {
            padding: var(--space-4xl) 0;
            background: var(--white);
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-lg);
            margin-top: var(--space-2xl);
        }

        .feature-card {
            padding: var(--space-xl);
            background: var(--white);
            border: 1px solid var(--gray-100);
            transition: all 0.4s var(--ease-smooth);
            position: relative;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--black);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s var(--ease-smooth);
        }

        .feature-card:hover {
            background: var(--gray-50);
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        .feature-card:hover::before {
            transform: scaleX(1);
        }

        .feature-number {
            font-family: var(--font-body);
            font-size: 0.6875rem;
            font-weight: 600;
            color: var(--gray-300);
            margin-bottom: var(--space-lg);
            display: block;
            letter-spacing: 0.05em;
        }

        .feature-title {
            font-family: var(--font-display);
            font-size: 1.125rem;
            font-weight: 700;
            margin-bottom: var(--space-sm);
            color: var(--black);
        }

        .feature-description {
            font-size: 0.9375rem;
            color: var(--gray-500);
            line-height: 1.6;
        }

        /* ============================================
           Principles Section
           ============================================ */
        .principles {
            padding: var(--space-4xl) 0;
            background: var(--gray-50);
        }

        .principles-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: var(--space-md);
            margin-top: var(--space-2xl);
        }

        .principle-item {
            padding: var(--space-xl);
            background: var(--white);
            border: 1px solid var(--gray-100);
            transition: all 0.3s var(--ease-smooth);
            position: relative;
        }

        .principle-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 2px;
            background: var(--black);
            transform: scaleY(0);
            transform-origin: top;
            transition: transform 0.3s var(--ease-smooth);
        }

        .principle-item:hover {
            box-shadow: var(--shadow-md);
        }

        .principle-item:hover::before {
            transform: scaleY(1);
        }

        .principle-item h3 {
            font-family: var(--font-display);
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: var(--space-sm);
            color: var(--black);
        }

        .principle-item p {
            font-size: 0.875rem;
            color: var(--gray-500);
            margin: 0;
            line-height: 1.6;
        }

        /* ============================================
           CTA Section
           ============================================ */
        .cta-section {
            padding: var(--space-4xl) 0;
            background: var(--black);
            color: var(--white);
            position: relative;
        }

        .cta-content {
            position: relative;
            z-index: 1;
            text-align: center;
            max-width: 600px;
            margin: 0 auto;
        }

        .cta-title {
            font-family: var(--font-display);
            font-size: clamp(2rem, 4vw, 2.75rem);
            font-weight: 700;
            margin-bottom: var(--space-lg);
            letter-spacing: -0.02em;
        }

        .cta-description {
            font-size: 1.0625rem;
            margin-bottom: var(--space-2xl);
            opacity: 0.8;
            line-height: 1.7;
        }

        /* ============================================
           Responsive
           ============================================ */
        @media (max-width: 991px) {
            .feature-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .principles-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .hero {
                min-height: auto;
                padding: calc(var(--space-3xl) + 80px) 0 var(--space-3xl);
            }

            .tagline {
                font-size: 0.625rem;
                padding: 0.375rem 0.75rem;
            }

            .hero-title {
                font-size: 2rem;
            }

            .hero-description {
                font-size: 1rem;
            }

            .hero-actions {
                flex-direction: column;
                align-items: center;
            }

            .hero-actions .btn-custom,
            .hero-actions .btn-ghost {
                width: 100%;
                max-width: 280px;
                justify-content: center;
            }

            .hero-stats {
                flex-direction: column;
                gap: var(--space-lg);
                margin-top: var(--space-xl);
                padding-top: var(--space-xl);
            }

            .stat-number {
                font-size: 2rem;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }

            .feature-card {
                padding: var(--space-lg);
            }

            .principles-grid {
                grid-template-columns: 1fr;
            }

            .principle-item {
                padding: var(--space-lg);
            }

            .cta-section {
                padding: var(--space-3xl) 0;
            }
        }

        @media (max-width: 480px) {
            .hero-title {
                font-size: 1.75rem;
            }

            .stat-number {
                font-size: 1.75rem;
            }

            .cta-title {
                font-size: 1.75rem;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="tagline">Built, not marketed</div>
                <h1 class="hero-title">Simple, reliable software for everyday people.</h1>
                <p class="hero-description">
                    Making the digital part of your day less irritating. Good software should be like good plumbing — reliable, robust, and invisible until you need it.
                </p>
                <div class="hero-actions">
                    <button class="btn-custom" onclick="showContactAlert()">Get Started</button>
                    <a href="/projects" class="btn-ghost">View Projects</a>
                </div>

                <div class="hero-stats">
                    <div class="stat">
                        <span class="stat-number">100%</span>
                        <span class="stat-label">Independent</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">0</span>
                        <span class="stat-label">Unnecessary Features</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">∞</span>
                        <span class="stat-label">Reliability</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <div class="section-header">
                <div class="section-label">Our Approach</div>
                <h2 class="section-title">Built for real people, real problems</h2>
                <p class="section-description">We design for clarity first. No dashboards, no jargon, no learning curve.</p>
            </div>

            <div class="feature-grid">
                <div class="feature-card">
                    <span class="feature-number">01</span>
                    <h3 class="feature-title">Easy to Start</h3>
                    <p class="feature-description">No onboarding, no tutorials. If you need training, we've already failed. Our tools work immediately.</p>
                </div>
                <div class="feature-card">
                    <span class="feature-number">02</span>
                    <h3 class="feature-title">Simple to Use</h3>
                    <p class="feature-description">One clear path to get things done. No hidden features, no complexity. Just the essentials.</p>
                </div>
                <div class="feature-card">
                    <span class="feature-number">03</span>
                    <h3 class="feature-title">Forgiving of Mistakes</h3>
                    <p class="feature-description">People make errors. Our systems handle bad input gracefully and recover without drama.</p>
                </div>
                <div class="feature-card">
                    <span class="feature-number">04</span>
                    <h3 class="feature-title">Reliable Over Time</h3>
                    <p class="feature-description">Systems that don't lose data, don't break, and keep working quietly in the background.</p>
                </div>
                <div class="feature-card">
                    <span class="feature-number">05</span>
                    <h3 class="feature-title">Respectful of Attention</h3>
                    <p class="feature-description">No notifications, no unnecessary updates. Your time matters. We stay out of the way.</p>
                </div>
                <div class="feature-card">
                    <span class="feature-number">06</span>
                    <h3 class="feature-title">No Fluff</h3>
                    <p class="feature-description">If it adds stress, it doesn't ship. Every feature earns its place through necessity.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Principles Section -->
    <section class="principles">
        <div class="container">
            <div class="section-header">
                <div class="section-label">Philosophy</div>
                <h2 class="section-title">Identity defined by subtraction</h2>
                <p class="section-description">If it needs explaining, it needs simplifying.</p>
            </div>

            <div class="principles-grid">
                <div class="principle-item">
                    <h3>For People</h3>
                    <p>Not companies. Not power-users. Real people with real problems.</p>
                </div>
                <div class="principle-item">
                    <h3>Design Clarity</h3>
                    <p>Good design should feel obvious. Calm, readable, predictable.</p>
                </div>
                <div class="principle-item">
                    <h3>Invisible Tech</h3>
                    <p>Strong engineering is invisible. Users never think about the technology.</p>
                </div>
                <div class="principle-item">
                    <h3>No Jargon</h3>
                    <p>Plain language. Clear communication. Human tone.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title">Ready to build better software?</h2>
                <p class="cta-description">
                    Join us in creating tools that people actually want to use. Simple, reliable, and built for real life.
                </p>
                <button class="btn-outline" onclick="showContactAlert()">Get in Touch</button>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        function showContactAlert() {
            Swal.fire({
                title: 'Get Started',
                html: '<p style="text-align: left; color: #71717A; line-height: 1.6; font-size: 0.9375rem;">Ready to start? Sign up to access our tools and services. No commitment, no complexity.</p>',
                showCancelButton: true,
                confirmButtonText: 'Sign Up',
                cancelButtonText: 'Not Now',
                customClass: {
                    popup: 'swal-minimal',
                    confirmButton: 'btn-custom',
                    cancelButton: 'btn-ghost'
                },
                buttonsStyling: false,
                width: '420px',
                padding: '2rem'
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
                            popup: 'swal-minimal',
                            confirmButton: 'btn-custom'
                        },
                        buttonsStyling: false,
                        width: '360px'
                    });
                    @endif
                }
            });
        }
    </script>
@endpush
