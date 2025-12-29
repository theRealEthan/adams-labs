@extends('layouts.app')

@section('title', 'Our Projects - Adams Labs')

@push('styles')
<link href="{{ asset('css/pages.css') }}" rel="stylesheet">
@endpush

@section('content')
    <!-- Page Header -->
    <section class="page-header" style="text-align: center;">
        <div class="container">
            <h1 class="page-title">Our Projects</h1>
            <p class="page-description">
                Simple tools solving real problems. Each project does one thing well, with no unnecessary features.
            </p>
        </div>
    </section>

    <!-- Projects Grid -->
    <section class="section">
        <div class="container">
            <div class="projects-grid">
                <!-- Project 1 -->
                <div class="project-card">
                    <div class="project-image">
                        <span class="project-status status-development">In Development</span>
                    </div>
                    <div class="project-content">
                        <h2 class="project-title">TaskFlow</h2>
                        <p class="project-description">
                            Dead-simple task management. Add tasks, mark them done. No projects, no tags, no complexity.
                            Just what needs doing today.
                        </p>
                        <div class="project-meta">
                            <span>📅 Expected: Q2 2025</span>
                            <span>👥 Solo Use</span>
                        </div>
                        <div class="project-tags">
                            <span class="tag">Productivity</span>
                            <span class="tag">Minimal</span>
                            <span class="tag">Web</span>
                        </div>
                        <a href="#" class="project-link disabled">Coming Soon</a>
                    </div>
                </div>

                <!-- Project 2 -->
                <div class="project-card">
                    <div class="project-image">
                        <span class="project-status status-development">In Development</span>
                    </div>
                    <div class="project-content">
                        <h2 class="project-title">TimerKit</h2>
                        <p class="project-description">
                            Kitchen timer for your computer. Set it, forget it, it beeps. No accounts, no analytics, no tracking.
                            Just a timer that works.
                        </p>
                        <div class="project-meta">
                            <span>📅 Expected: Q1 2025</span>
                            <span>👥 Everyone</span>
                        </div>
                        <div class="project-tags">
                            <span class="tag">Utility</span>
                            <span class="tag">Simple</span>
                            <span class="tag">Desktop</span>
                        </div>
                        <a href="#" class="project-link disabled">Coming Soon</a>
                    </div>
                </div>

                <!-- Project 3 -->
                <div class="project-card">
                    <div class="project-image">
                        <span class="project-status status-development">In Development</span>
                    </div>
                    <div class="project-content">
                        <h2 class="project-title">ClipSave</h2>
                        <p class="project-description">
                            Clipboard history that actually helps. Your last 50 copies, searchable, always available.
                            No cloud sync, no sharing features. Just local, fast, reliable.
                        </p>
                        <div class="project-meta">
                            <span>📅 Expected: Q3 2025</span>
                            <span>👥 Power Users</span>
                        </div>
                        <div class="project-tags">
                            <span class="tag">Productivity</span>
                            <span class="tag">Utility</span>
                            <span class="tag">Desktop</span>
                        </div>
                        <a href="#" class="project-link disabled">Coming Soon</a>
                    </div>
                </div>

                <!-- Project 4 -->
                <div class="project-card">
                    <div class="project-image">
                        <span class="project-status status-development">Planning</span>
                    </div>
                    <div class="project-content">
                        <h2 class="project-title">QuickMath</h2>
                        <p class="project-description">
                            Calculator that remembers your work. Type expressions naturally, see history, done.
                            No modes, no scientific notation, no unit conversion. Just math.
                        </p>
                        <div class="project-meta">
                            <span>📅 Expected: Q4 2025</span>
                            <span>👥 Everyone</span>
                        </div>
                        <div class="project-tags">
                            <span class="tag">Utility</span>
                            <span class="tag">Simple</span>
                            <span class="tag">Web</span>
                        </div>
                        <a href="#" class="project-link disabled">In Planning</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
