
@php
    $seo = config('seo.hosting.smtp', config('seo.default', []));
    $seodata['title']       = $seo['title'] ?? '';
    $seodata['description'] = $seo['description'] ?? '';
    $seodata['keyword']     = $seo['keyword'] ?? '';
    $seodata['image']       = $seo['image'] ?? '';
@endphp
@extends('template.layouts.frontend', ['seodata' => $seodata])
@section('content')



    <section class="pricing-plan my-120" id="pricing">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2 class="section-heading__title"> Our SMTP Server <span class="shape"> Plans </span> </h2>
                        <p class="section-heading__desc">Uniquely Different from Competitors. Discover the perfect blend of high-performance features, expert management, and enhanced security. Benefit from Auto IP Rotation, Dedicated Resources, and more. Experience the ultimate SMTP Server solution.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="row gy-4 justify-content-center">

                        <div class="col-lg-4 col-sm-6 col-msm-6">
                            <div class="pricing-plan-item transition">
                                <h5 class="pricing-plan-item__title">SMTP Starter</h5>
                                <h3 class="pricing-plan-item__price">
                                    $39 <span class="text fs-14">monthly</span>
                                    <span class="text fs-12"> $0 One-time Setup Fee (Setup fees waived with annual payment)</span>
                                </h3>
                                <a href="#" class="btn btn--gray btn--md outline w-100">GET IT NOW</a>
                                <div class="pricing-plan-item__list">
                                    <ul class="text-list underlined">
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> 50,000 Emails/mo</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> 1 Dedicated IP</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Auto IP Warmup</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> 99.9% Uptime SLA</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Spam Filter Included</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-msm-6">
                            <div class="pricing-plan-item transition">
                                <h5 class="pricing-plan-item__title">SMTP Business</h5>
                                <h3 class="pricing-plan-item__price">
                                    $79 <span class="text fs-14">monthly</span>
                                    <span class="text fs-12"> $0 One-time Setup Fee (Setup fees waived with annual payment)</span>
                                </h3>
                                <a href="#" class="btn btn--gray btn--md outline w-100">GET IT NOW</a>
                                <div class="pricing-plan-item__list">
                                    <ul class="text-list underlined">
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> 250,000 Emails/mo</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> 3 Dedicated IPs</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Auto IP Rotation</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> 99.9% Uptime SLA</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Bounce &amp; Complaint Tracking</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-msm-6">
                            <div class="pricing-plan-item transition">
                                <h5 class="pricing-plan-item__title">SMTP Pro</h5>
                                <h3 class="pricing-plan-item__price">
                                    $149 <span class="text fs-14">monthly</span>
                                    <span class="text fs-12"> $0 One-time Setup Fee (Setup fees waived with annual payment)</span>
                                </h3>
                                <a href="#" class="btn btn--gray btn--md outline w-100">GET IT NOW</a>
                                <div class="pricing-plan-item__list">
                                    <ul class="text-list underlined">
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> 1,000,000 Emails/mo</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> 10 Dedicated IPs</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Auto IP Rotation + Warmup</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> 99.99% Uptime SLA</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Priority 24/7 Support</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="smtp-process my-120">
        <div class="container">
            <div class="section-heading">
                <h2 class="section-heading__title">
                    Deliver With <span class="shape"> Confidence </span>
                </h2>
                <p class="section-heading__desc">
                    Our end-to-end SMTP infrastructure is designed to simplify email operations while improving deliverability,
                    stability, and scalability. From setup to ongoing management, we ensure your email systems operate at peak
                    performance with minimal effort on your side.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-12 col-md-4">
                    <div class="smtp-grid-card smtp-grid-card--stat h-100 counter-item">
                        <div>
                            <h3 class="smtp-grid-stat-value">
                                <span class="odometer" data-odometer-final="99.9"></span>
                                <span>%</span>
                            </h3>
                            <p class="smtp-grid-stat-label">Uptime Guarantee</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-8">
                    <div class="smtp-grid-card smtp-grid-card--testimonial smtp-grid-card--testimonial-right h-100">
                        <p class="smtp-grid-card__quote">
                            "Their SMTP service significantly improved our email deliverability. Setup was smooth, and our
                            transactional emails now reach customers instantly"
                        </p>
                        <div class="smtp-grid-card__author smtp-grid-card__author--right">
                            <div class="smtp-grid-card__author-info smtp-grid-card__author-info--right">
                                <span class="smtp-grid-card__author-name">James Torrance</span>
                                <span class="smtp-grid-card__author-role">CTO, Dbridge Co.</span>
                            </div>

                            <img class="smtp-grid-card__author-avatar" src="{{ asset('assets/images/hosting/smtp/avatar-1.png') }}" alt="James Torrance">
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="smtp-grid-card smtp-grid-card--stat h-100 counter-item">
                        <div>
                            <div class="smtp-grid-stat-value">
                                <span class="odometer" data-odometer-final="2"></span>
                                <span>K+</span>
                            </div>
                            <div class="smtp-grid-stat-label">Dedicated IPv4 Addresses</div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="smtp-grid-card smtp-grid-card--stat smtp-grid-card--dark h-100 counter-item">
                        <img src="{{ asset('assets/images/hosting/smtp/shape.png') }}" alt="" class="smtp-grid-card__wave-bg">
                        <div class="smtp-grid-card__inner">
                            <div class="smtp-grid-stat-value">
                                <span class="odometer" data-odometer-final="10"></span>
                                <span>M+</span>
                            </div>
                            <div class="smtp-grid-stat-label">
                                Emails Delivered Per Month
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="smtp-grid-card smtp-grid-card--stat h-100 counter-item">
                        <div>
                            <div class="smtp-grid-stat-value">
                                <span class="odometer" data-odometer-final="350"></span>
                                <span>+</span>
                            </div>
                            <div class="smtp-grid-stat-label">Businesses Served</div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-8">
                    <div class="smtp-grid-card smtp-grid-card--testimonial h-100">
                        <p class="smtp-grid-card__quote">
                            "From day one, the reliability has been exceptional. We handle millions of emails monthly without any
                            critical downtime."
                        </p>
                        <div class="smtp-grid-card__author">
                            <img class="smtp-grid-card__author-avatar" src="{{ asset('assets/images/hosting/smtp/avatar-2.png') }}" alt="Emily Williams">
                            <div class="smtp-grid-card__author-info">
                                <span class="smtp-grid-card__author-name">Emily Williams</span>
                                <span class="smtp-grid-card__author-role">CMO, Treekz Inc.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="smtp-grid-card smtp-grid-card--stat h-100 counter-item">
                        <div>
                            <div class="smtp-grid-stat-value">
                                <span class="odometer" data-odometer-final="99.7"></span>
                                <span>%</span>
                            </div>
                            <div class="smtp-grid-stat-label">Deliverability Rate</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('template.hosting.feature.smtp')

    <section class="smtp-service my-120">
        <div class="container">
            <div class="section-heading">
                <h2 class="section-heading__title">
                    Simple Installation,
                    <span class="shape"> Smart Feature, </span> Secure Delivery
                </h2>
                <p class="section-heading__desc">
                    Send valid emails instantly and at scale with zero friction. Our system is built to ensure reliable inbox
                    delivery every time, keeping your customers informed, engaged, and connected throughout their entire
                    journey.
                </p>
            </div>

            <div class="smtp-feature-list">
                <div class="smtp-feature-card">
                    <div class="row align-items-center g-4">
                        <div class="col-lg-6">
                            <div class="smtp-feature-content">
                                <div class="smtp-feature-header">
                                    <h3 class="smtp-feature-title">Built for Beginners</h3>
                                    <p class="smtp-feature-desc">
                                        Get started effortlessly, even if you have no technical background. Our platform is designed to
                                        get you live in minutes with minimal configuration.
                                    </p>
                                </div>
                                <ul class="smtp-feature-items">
                                    <li class="smtp-feature-item">
                                        <span class="smtp-feature-item__icon">
                                            <i class="fa-regular fa-square-check"></i>
                                        </span>
                                        <p>
                                            <strong>Easy Setup Wizard</strong>: Connect your SMTP credentials in just a few steps using our
                                            guided setup flow. The process is intuitive, structured, and designed to eliminate complexity.
                                        </p>
                                    </li>
                                    <li class="smtp-feature-item">
                                        <span class="smtp-feature-item__icon">
                                            <i class="fa-regular fa-square-check"></i>
                                        </span>
                                        <p>
                                            <strong>One-click Migration:</strong> Move your existing email configuration from any major
                                            provider in seconds, ensuring a smooth transition.
                                        </p>
                                    </li>
                                    <li class="smtp-feature-item">
                                        <span class="smtp-feature-item__icon">
                                            <i class="fa-regular fa-square-check"></i>
                                        </span>
                                        <p>
                                            <strong>IP Rotation:</strong> Automated IP rotation designed to protect sender reputation and
                                            maximize deliverability at scale.
                                        </p>
                                    </li>
                                </ul>
                                <div class="smtp-feature-actions">
                                    <a href="#pricing" class="btn btn--base">Get
                                        Started</a>
                                    <a href="{{ route('book.meeting') }}" class="btn btn--white">Talk
                                        With Our Team ➔</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="smtp-feature-img-wrap">
                                <img src="{{ asset('assets/images/hosting/smtp/feature-1.png') }}" alt="Easy Setup Illustration" class="smtp-feature-img">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="smtp-feature-card">
                    <div class="row align-items-center g-4 flex-lg-row-reverse">
                        <div class="col-lg-6">
                            <div class="smtp-feature-content">
                                <div class="smtp-feature-header">
                                    <h3 class="smtp-feature-title">
                                        Optimized for Maximum Deliverability
                                    </h3>
                                    <p class="smtp-feature-desc">
                                        Ensure uninterrupted email delivery with a resilient, multi-layer sending infrastructure designed
                                        for reliability and real time fault handling.
                                    </p>
                                </div>
                                <ul class="smtp-feature-items">
                                    <li class="smtp-feature-item">
                                        <span class="smtp-feature-item__icon">
                                            <i class="fa-regular fa-square-check"></i>
                                        </span>
                                        <p>
                                            <strong>Multiple Connections:</strong> Purchase and manage multiple SMTP connections from a single,
                                            centralized dashboard for greater flexibility and control.
                                        </p>
                                    </li>
                                    <li class="smtp-feature-item">
                                        <span class="smtp-feature-item__icon">
                                            <i class="fa-regular fa-square-check"></i>
                                        </span>
                                        <p>
                                            <strong>Automatic Fallback System:</strong>
                                            If your primary sending connection fails, our system instantly switches to a backup SMTP route,
                                            ensuring continuous delivery without disruption.
                                        </p>
                                    </li>
                                    <li class="smtp-feature-item">
                                        <span class="smtp-feature-item__icon">
                                            <i class="fa-regular fa-square-check"></i>
                                        </span>
                                        <p>
                                            <strong>Failure Notifications:</strong> Stay informed with instant notifications delivered via
                                            email whenever a complaint is received or a sending error occurs.
                                        </p>
                                    </li>
                                </ul>
                                <div class="smtp-feature-actions">
                                    <a href="#pricing" class="btn btn--base">Get
                                        Started</a>
                                    <a href="{{ route('book.meeting') }}" class="btn btn--white">Talk
                                        With Our Team ➔</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="smtp-feature-img-wrap">
                                <img src="{{ asset('assets/images/hosting/smtp/feature-2.png') }}" alt="Maximum Delivery Illustration" class="smtp-feature-img">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="smtp-feature-card">
                    <div class="row align-items-center g-4">
                        <div class="col-lg-6">
                            <div class="smtp-feature-content">
                                <div class="smtp-feature-header">
                                    <h3 class="smtp-feature-title">
                                        Built-in Delivery Monitoring
                                    </h3>
                                    <p class="smtp-feature-desc">
                                        Gain full visibility into your email delivery with real time tracking and detailed reporting for
                                        every message sent through your system.
                                    </p>
                                </div>
                                <ul class="smtp-feature-items">
                                    <li class="smtp-feature-item">
                                        <span class="smtp-feature-item__icon">
                                            <i class="fa-regular fa-square-check"></i>
                                        </span>
                                        <p>
                                            <strong>Email Logging:</strong> Access a centralized panel to view, search, and manage all
                                            outgoing activity. Easily track delivery history and resend messages when needed with a single
                                            action.
                                        </p>
                                    </li>
                                    <li class="smtp-feature-item">
                                        <span class="smtp-feature-item__icon">
                                            <i class="fa-regular fa-square-check"></i>
                                        </span>
                                        <p>
                                            <strong>Seamless SMTP Migration:</strong> Migrate your existing SMTP configuration from any
                                            major email provider in seconds with minimal effort and zero disruption.
                                        </p>
                                    </li>
                                </ul>
                                <div class="smtp-feature-actions">
                                    <a href="#pricing" class="btn btn--base">Get
                                        Started</a>
                                    <a href="{{ route('book.meeting') }}" class="btn btn--white">Talk
                                        With Our Team ➔</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="smtp-feature-img-wrap">
                                <img src="{{ asset('assets/images/hosting/smtp/feature-3.png') }}" alt="Delivery Monitoring Illustration" class="smtp-feature-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
