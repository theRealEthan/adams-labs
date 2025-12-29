@extends('layouts.app')

@section('title', 'About - Adams Labs')

@push('styles')
<link href="{{ asset('css/pages.css') }}" rel="stylesheet">
@endpush

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <div class="page-header-content">
                <h1 class="page-title">About Adams Labs</h1>
                <p class="page-lead">
                    We're not trying to change the world. We're making the digital part of your day less irritating.
                </p>
            </div>
        </div>
    </section>

    <!-- Who We Are -->
    <section class="content-section">
        <div class="container">
            <div class="section-content">
                <div class="section-label">Who We Are</div>
                <h2 class="section-title">Independent software studio</h2>
                <p class="section-text">
                    Adams Labs is an independent software studio building tools for daily life. We focus on common problems
                    and solve them with software that is easy to use, hard to break, and calm to interact with.
                </p>
                <p class="section-text">
                    No jargon. No unnecessary features. No learning curve. Just software that works.
                </p>
            </div>
        </div>
    </section>

    <!-- Our Philosophy -->
    <section class="content-section">
        <div class="container">
            <div class="section-content">
                <div class="section-label">Philosophy</div>
                <h2 class="section-title">Identity defined by subtraction</h2>
                <p class="section-text">
                    Good software should be like good plumbing: reliable, robust, and invisible until you need it.
                    Our identity is defined by subtraction. If it needs explaining, it needs simplifying.
                </p>
                <p class="section-text">
                    We design for clarity first. We ask what the job is, what can be removed, and what could go wrong
                    in real life. We assume users are busy, mistakes will happen, and attention is limited.
                </p>
            </div>
        </div>
    </section>

    <!-- Our Values -->
    <section class="content-section">
        <div class="container">
            <div class="section-content">
                <div class="section-label">Core Values</div>
                <h2 class="section-title">What we believe</h2>

                <div class="values-grid">
                    <div class="value-card">
                        <span class="value-number">01</span>
                        <h3 class="value-title">People First</h3>
                        <p class="value-description">
                            We build for people, not companies. Users, not power-users. Real life, not edge cases.
                        </p>
                    </div>
                    <div class="value-card">
                        <span class="value-number">02</span>
                        <h3 class="value-title">Simplicity</h3>
                        <p class="value-description">
                            If it adds stress, it doesn't ship. Every feature earns its place through necessity.
                        </p>
                    </div>
                    <div class="value-card">
                        <span class="value-number">03</span>
                        <h3 class="value-title">Reliability</h3>
                        <p class="value-description">
                            Our systems don't lose data, recover from errors, and keep working quietly in the background.
                        </p>
                    </div>
                    <div class="value-card">
                        <span class="value-number">04</span>
                        <h3 class="value-title">Respect</h3>
                        <p class="value-description">
                            We respect your time and attention. No notifications, no unnecessary updates.
                        </p>
                    </div>
                    <div class="value-card">
                        <span class="value-number">05</span>
                        <h3 class="value-title">Independence</h3>
                        <p class="value-description">
                            We answer to users, not investors. No pressure to add features that don't help.
                        </p>
                    </div>
                    <div class="value-card">
                        <span class="value-number">06</span>
                        <h3 class="value-title">Honesty</h3>
                        <p class="value-description">
                            Clear communication. No jargon. No marketing speak. Human, plain, direct.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quote Section -->
    <section class="quote-section">
        <div class="container">
            <blockquote class="quote">
                "If it needs explaining, it needs simplifying."
            </blockquote>
            <p class="quote-author">Adams Labs Manifesto</p>
        </div>
    </section>

    <!-- Journey -->
    <section class="content-section">
        <div class="container">
            <div class="section-content">
                <div class="section-label">Our Journey</div>
                <h2 class="section-title">How we got here</h2>

                <div class="timeline">
                    <div class="timeline-item">
                        <span class="timeline-year">2024</span>
                        <h3 class="timeline-title">Founded</h3>
                        <p class="timeline-description">
                            Adams Labs was founded with a simple mission: build software that doesn't add to daily stress.
                        </p>
                    </div>
                    <div class="timeline-item">
                        <span class="timeline-year">2025 Q1</span>
                        <h3 class="timeline-title">First Projects</h3>
                        <p class="timeline-description">
                            Development begins on our first suite of everyday tools, starting with TimerKit and TaskFlow.
                        </p>
                    </div>
                    <div class="timeline-item">
                        <span class="timeline-year">2025 Q2</span>
                        <h3 class="timeline-title">Beta Release</h3>
                        <p class="timeline-description">
                            Initial beta releases to a small group of users who value simplicity over features.
                        </p>
                    </div>
                    <div class="timeline-item">
                        <span class="timeline-year">Future</span>
                        <h3 class="timeline-title">Building Trust</h3>
                        <p class="timeline-description">
                            Our goal: become a trusted name for simple tools. Known for restraint. Quietly recommended.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
