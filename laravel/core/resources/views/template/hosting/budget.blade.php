
@php
    $seo = config('seo.hosting.budget', config('seo.default', []));
    $seodata['title']       = $seo['title'] ?? '';
    $seodata['description'] = $seo['description'] ?? '';
    $seodata['keyword']     = $seo['keyword'] ?? '';
    $seodata['image']       = $seo['image'] ?? '';
@endphp
@extends('template.layouts.frontend', ['seodata' => $seodata])
@section('content')



    <section class="pricing-plan py-120" id="pricing">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2 class="section-heading__title"> Our Budget Hosting <span class="shape"> Plans </span> </h2>
                        <p class="section-heading__desc">Uniquely Different from Competitors. Discover the perfect blend of high-performance hardware, free bundled features, and expert management by our technical team. Benefit from complimentary backups, migrations, LiteSpeed, SSL, support, and CloudLinux.</p>
                    </div>
                    <div class="dc-location mb-lg-4 mb-3">
                        <a href="{{ route('hosting.budget') }}" class="{{ menuActive('hosting.budget') }}">USA</a>
                        <a href="{{ route('hosting.budget.sg') }}" class="{{ menuActive('hosting.budget.sg') }}">Singapore</a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="row gy-4 justify-content-center">

                        <div class="col-lg-4 col-sm-6 col-msm-6">
                            <div class="pricing-plan-item transition">
                                <h5 class="pricing-plan-item__title">Starter</h5>
                                <h3 class="pricing-plan-item__price"> $29 <span class="text fs-14">Yearly</span> </h3>
                                <a href="#" class="btn btn--gray btn--md outline w-100">GET IT NOW</a>
                                <div class="pricing-plan-item__list">
                                    <ul class="text-list underlined">
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> 1 Website</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> 10 GB NVMe SSD</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Unmetered Bandwidth</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Free SSL Certificate</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Daily Backups</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> LiteSpeed Server</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-msm-6">
                            <div class="pricing-plan-item transition">
                                <h5 class="pricing-plan-item__title">Business</h5>
                                <h3 class="pricing-plan-item__price"> $59 <span class="text fs-14">Yearly</span> </h3>
                                <a href="#" class="btn btn--gray btn--md outline w-100">GET IT NOW</a>
                                <div class="pricing-plan-item__list">
                                    <ul class="text-list underlined">
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> 5 Websites</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> 50 GB NVMe SSD</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Unmetered Bandwidth</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Free SSL &amp; CDN</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Daily Backups</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> CloudLinux + LiteSpeed</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-msm-6">
                            <div class="pricing-plan-item transition">
                                <h5 class="pricing-plan-item__title">Pro</h5>
                                <h3 class="pricing-plan-item__price"> $99 <span class="text fs-14">Yearly</span> </h3>
                                <a href="#" class="btn btn--gray btn--md outline w-100">GET IT NOW</a>
                                <div class="pricing-plan-item__list">
                                    <ul class="text-list underlined">
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Unlimited Websites</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> 100 GB NVMe SSD</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Unmetered Bandwidth</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Free SSL, CDN &amp; Migration</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Daily Backups</li>
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

    @include('template.hosting.feature.common')

    <section class="budget-service my-120">
        <div class="container">
            <div class="section-heading">
                <h2 class="section-heading__title">
                    Choose the Hosting That Fits <span class="shape"> Your Stage </span>
                </h2>
                <p class="section-heading__desc">
                    From your first website to a high-traffic platform, there is a
                    plan engineered for the scale you are at and the growth you are
                    heading toward.
                </p>
            </div>
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                    <div class="bs-card">
                        <div class="bs-card__header">
                            <h4 class="bs-card__title">Shared Hosting</h4>
                            <p class="bs-card__desc">
                                Perfect for beginners and small websites
                            </p>
                        </div>
                        <div class="bs-card__icon-badge">
                            <i class="fa-regular fa-share-nodes"></i>
                        </div>
                        <div class="bs-card__img-wrap">
                            <img src="{{ asset('assets/images/hosting/budget/shared-hosting-bg.jpg') }}" alt="Shared Hosting" class="bs-card__img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="bs-card">
                        <div class="bs-card__header">
                            <h4 class="bs-card__title">VPS Hosting</h4>
                            <p class="bs-card__desc">
                                Full control with guaranteed resources
                            </p>
                        </div>
                        <div class="bs-card__icon-badge">
                            <i class="fa-regular fa-router"></i>
                        </div>
                        <div class="bs-card__img-wrap">
                            <img src="{{ asset('assets/images/hosting/budget/vps-hosting-bg.jpg') }}" alt="VPS Hosting" class="bs-card__img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bs-card">
                        <div class="bs-card__header">
                            <h4 class="bs-card__title">Dedicated Servers</h4>
                            <p class="bs-card__desc">
                                Maximum power for high-traffic platforms
                            </p>
                        </div>
                        <div class="bs-card__icon-badge">
                            <i class="fa-regular fa-server"></i>
                        </div>
                        <div class="bs-card__img-wrap">
                            <img src="{{ asset('assets/images/hosting/budget/dedicated-hosting-bg.jpg') }}" alt="Dedicated Servers" class="bs-card__img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="budget-choose py-120 bg-img" style="background-image: url({{ asset('assets/images/hosting/budget/choose.png') }})">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="bc-content">
                        <div class="bc-heading">
                            <h2 class="bc-title">
                                Why Choose Our Budget Hosting
                            </h2>
                            <p class="bc-desc">
                                We combine affordable pricing with enterprise-level
                                performance so you never have to compromise on quality.
                            </p>
                        </div>
                        <div class="bc-features">
                            <div class="bc-feature-item">
                                <span class="bc-feature-icon">
                                    <img src="{{ asset('assets/images/hosting/budget/bost.png') }}" alt="">
                                </span>
                                <div class="bc-feature-content">
                                    <h4 class="bc-feature-title">Get Online in Minutes</h4>
                                    <p class="bc-feature-desc">
                                        Launch your website the same day with our one-click
                                        installer and guided setup that gets you live without the
                                        technical headaches.
                                    </p>
                                </div>
                            </div>
                            <div class="bc-feature-item">
                                <span class="bc-feature-icon">
                                    <img src="{{ asset('assets/images/hosting/budget/badge.png') }}" alt="">
                                </span>
                                <div class="bc-feature-content">
                                    <h4 class="bc-feature-title">Enterprise-Grade Infrastructure</h4>
                                    <p class="bc-feature-desc">
                                        Enterprise-grade hardware, daily backups, and DDoS
                                        protection on every single plan.
                                    </p>
                                </div>
                            </div>
                            <div class="bc-feature-item">
                                <span class="bc-feature-icon">
                                    <img src="{{ asset('assets/images/hosting/budget/support.png') }}" alt="">
                                </span>
                                <div class="bc-feature-content">
                                    <h4 class="bc-feature-title">Customer Support</h4>
                                    <p class="bc-feature-desc">
                                        Our expert team is available via live
                                        chat and email whenever you need us.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('template.hosting.feature.budget')

    <section class="budget-banner my-120">
        <div class="container">
            <div class="row align-items-center gy-5">
                <div class="col-lg-6">
                    <div class="budget-banner__content">
                        <h2 class="budget-banner__title">
                            Lightning-Fast Hosting That Fits Your Budget
                        </h2>
                        <p class="budget-banner__desc">
                            Reliable hosting is the backbone of every successful website.
                            Get blazing-fast servers, rock-solid uptime, and round-the-clock
                            support at a price that works for startups, side projects, and
                            growing businesses alike.
                        </p>

                        <ul class="budget-banner__features">
                            <li class="budget-banner__feature-item">
                                <span class="budget-banner__feature-icon">
                                    <i class="fa-regular fa-bolt"></i>
                                </span>
                                <p>
                                    <strong>Blazing-Fast Performance</strong> Powered by NVMe
                                    SSD storage and LiteSpeed servers for ultra-fast load times
                                </p>
                            </li>
                            <li class="budget-banner__feature-item">
                                <span class="budget-banner__feature-icon">
                                    <i class="fa-regular fa-circle-up"></i>
                                </span>
                                <p>
                                    <strong>99.9% Uptime Guarantee</strong> Your website stays
                                    online around the clock with our redundant infrastructure
                                </p>
                            </li>
                        </ul>

                        <a href="#pricing" class="btn btn--base">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="budget-banner__img-wrap">
                        <img src="{{ asset('assets/images/hosting/budget/hosting.png') }}" alt="Budget Hosting Server" class="budget-banner__img">

                        <div class="budget-banner__badge">
                            <div class="budget-banner__badge-wrapper">
                                <div class="budget-banner__badge--countries">
                                    <div class="budget-banner__badge-icon">
                                        <i class="fa-regular fa-globe"></i>
                                    </div>
                                    <div class="budget-banner__badge-text">
                                        <span class="budget-banner__badge-num">150+</span>
                                        <span class="budget-banner__badge-label">
                                            Countries<br>Supported
                                        </span>
                                    </div>
                                </div>
                                <div class="budget-banner__badge--uptime">
                                    <h2 class="budget-banner__uptime-num">99%</h2>
                                    <span class="budget-banner__uptime-label">Uptime</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
