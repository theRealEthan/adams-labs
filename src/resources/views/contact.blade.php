@extends('layouts.app')

@section('title', 'Contact - Adams Labs')

@push('styles')
<link href="{{ asset('css/pages.css') }}" rel="stylesheet">
@endpush

@section('content')
    <!-- Page Header -->
    <section class="page-header" style="text-align: center;">
        <div class="container">
            <h1 class="page-title">Get in Touch</h1>
            <p class="page-description">
                Questions, feedback, or suggestions? We're here to help.
            </p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="contact-grid">
                <div class="contact-info">
                    <h2>Let's talk</h2>
                    <p>
                        We keep communication simple and direct. No sales pitches, no automated responses.
                        Real people, real conversations.
                    </p>

                    <div class="contact-methods">
                        <div class="contact-method">
                            <h3>Email</h3>
                            <p><a href="mailto:hello@adamslabs.com">hello@adamslabs.com</a></p>
                        </div>
                        <div class="contact-method">
                            <h3>Response Time</h3>
                            <p>Within 24 hours (usually faster)</p>
                        </div>
                        <div class="contact-method">
                            <h3>Support</h3>
                            <p><a href="mailto:support@adamslabs.com">support@adamslabs.com</a></p>
                        </div>
                    </div>
                </div>

                <div class="contact-form">
                    <form id="contactForm">
                        <div class="form-group">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" id="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" id="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="subject">Subject</label>
                            <input type="text" id="subject" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="message">Message</label>
                            <textarea id="message" class="form-control" required></textarea>
                        </div>

                        <button type="submit" class="btn-submit">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="faq-container">
                <h2 class="faq-title">Common Questions</h2>

                <div class="faq-item">
                    <h3 class="faq-question">When will your tools be available?</h3>
                    <p class="faq-answer">
                        Our first tools are scheduled for beta release in Q1-Q2 2025. Sign up to be notified when they're ready.
                    </p>
                </div>

                <div class="faq-item">
                    <h3 class="faq-question">Will your software be free?</h3>
                    <p class="faq-answer">
                        Some tools will be free. Others will have a one-time purchase price. No subscriptions, no recurring fees.
                        You buy it, you own it.
                    </p>
                </div>

                <div class="faq-item">
                    <h3 class="faq-question">Do you offer custom development?</h3>
                    <p class="faq-answer">
                        Not currently. We're focused on building tools for everyone, not custom solutions for specific clients.
                    </p>
                </div>

                <div class="faq-item">
                    <h3 class="faq-question">Can I suggest a feature or tool idea?</h3>
                    <p class="faq-answer">
                        Yes. We listen to user feedback, but we're selective about what we build. If it adds complexity,
                        it probably won't happen. If it solves a real problem simply, we're interested.
                    </p>
                </div>

                <div class="faq-item">
                    <h3 class="faq-question">Are you hiring?</h3>
                    <p class="faq-answer">
                        Not at the moment. Adams Labs is intentionally small. If that changes, we'll post here.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const subject = document.getElementById('subject').value;
        const message = document.getElementById('message').value;

        // Show success message
        Swal.fire({
            title: 'Message Sent',
            html: '<p style="text-align: left; color: #666;">Thank you for reaching out. We\'ll get back to you within 24 hours.</p>',
            icon: 'success',
            confirmButtonText: 'OK',
            customClass: {
                confirmButton: 'btn-custom'
            },
            buttonsStyling: false
        }).then(() => {
            // Reset form
            document.getElementById('contactForm').reset();
        });
    });
</script>
@endpush
