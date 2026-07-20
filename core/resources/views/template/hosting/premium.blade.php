
@php
    $seo = config('seo.hosting.premium', config('seo.default', []));
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
                        <h2 class="section-heading__title"> Our Premium Hosting <span class="shape"> Plans </span> </h2>
                        <p class="section-heading__desc">Experience seamless premium hosting with our NVMe SSD based solutions. Bid farewell to concerns about backups, speed, and uptime. Benefit from ECC RAM, JetBackup, CloudLinux, KernelCare, LiteSpeed, and top-tier hardware deployed across multiple data centers. Rest assured and focus on your priorities as we handle the technical aspects.</p>
                    </div>
                    <div class="dc-location mb-lg-4 mb-3">
                        <a href="{{ route('hosting.premium') }}" class="{{ menuActive('hosting.premium') }}">USA</a>
                        <a href="{{ route('hosting.premium.sg') }}" class="{{ menuActive('hosting.premium.sg') }}">Singapore</a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="row gy-4 justify-content-center">

                        <div class="col-lg-4 col-sm-6 col-msm-6">
                            <div class="pricing-plan-item transition">
                                <h5 class="pricing-plan-item__title">Starter Premium</h5>
                                <h3 class="pricing-plan-item__price"> $49 <span class="text fs-14">Yearly</span> </h3>
                                <a href="#" class="btn btn--gray btn--md outline w-100">GET IT NOW</a>
                                <div class="pricing-plan-item__list">
                                    <ul class="text-list underlined">
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> 1 Website</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> 30 GB NVMe SSD</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Unlimited Bandwidth</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Free SSL &amp; CDN</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> ECC RAM + KernelCare</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> JetBackup Daily</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-msm-6">
                            <div class="pricing-plan-item transition">
                                <h5 class="pricing-plan-item__title">Business Premium</h5>
                                <h3 class="pricing-plan-item__price"> $89 <span class="text fs-14">Yearly</span> </h3>
                                <a href="#" class="btn btn--gray btn--md outline w-100">GET IT NOW</a>
                                <div class="pricing-plan-item__list">
                                    <ul class="text-list underlined">
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> 5 Websites</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> 75 GB NVMe SSD</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Unlimited Bandwidth</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Free SSL, CDN &amp; Migration</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> CloudLinux + LiteSpeed</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> JetBackup Daily</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-msm-6">
                            <div class="pricing-plan-item transition">
                                <h5 class="pricing-plan-item__title">Pro Premium</h5>
                                <h3 class="pricing-plan-item__price"> $149 <span class="text fs-14">Yearly</span> </h3>
                                <a href="#" class="btn btn--gray btn--md outline w-100">GET IT NOW</a>
                                <div class="pricing-plan-item__list">
                                    <ul class="text-list underlined">
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Unlimited Websites</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> 150 GB NVMe SSD</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Unlimited Bandwidth</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Free SSL, CDN &amp; Priority Migration</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> CloudLinux + LiteSpeed</li>
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

    <section class="premium-host-banner bg-img" style="background-image: url({{ asset('assets/images/hosting/premium/bg.png') }})">
        <div class="container">
            <div class="phb-inner">
                <div class="phb-left">
                    <h2 class="phb-title">Premium Network</h2>
                    <p class="phb-desc">
                        Supercharge your website with high performance infrastructure, enterprise grade security, and exceptional
                        reliability.
                    </p>
                    <a href="#pricing" class="btn btn--base">Get Started</a>
                </div>

                <div class="phb-center">
                    <img src="{{ asset('assets/images/hosting/premium/banner.png') }}" alt="Premium Hosting" class="phb-img" />
                </div>

                <div class="phb-right">
                    <ul class="phb-features">
                        <li>Flexible Hosting Plans &amp; Packages</li>
                        <li>Advanced Server Management</li>
                        <li>Performance Monitoring And Analysis</li>
                    </ul>
                </div>

                <div class="phb-uptime-box">
                    <div class="phb-gauge">
                        <h5 class="phb-gauge-val">99.9%</h5>
                    </div>
                    <h4 class="phb-uptime-text">
                        Industry Leading Uptime
                    </h4>
                </div>

                <div class="phb-users">
                    <div class="phb-avatars">
                        <img src="{{ asset('assets/images/hosting/premium/avatar-1.png') }}" alt="">
                        <img src="{{ asset('assets/images/hosting/premium/avatar-2.png') }}" alt="">
                        <img src="{{ asset('assets/images/hosting/premium/avatar-3.png') }}" alt="">
                        <img src="{{ asset('assets/images/hosting/premium/avatar-4.png') }}" alt="">
                    </div>
                    <div class="phb-users-meta">
                        <h5 class="phb-users-count mb-0">1700+</h5>
                        <span class="phb-users-label">Clients Globally</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('template.hosting.feature.common')


    <section class="business-brand-section py-120">
        <div class="container">
            <h3 class="business-brand-title">
                Trusted by Growing Businesses and Agencies Worldwide
            </h3>

            <div class="business-brand-slider">
                <div class="business-brand-item">
                    <img src="{{ asset('assets/images/hosting/premium/brand/1.png') }}" alt="">
                </div>
                <div class="business-brand-item">
                    <img src="{{ asset('assets/images/hosting/premium/brand/2.png') }}" alt="">
                </div>
                <div class="business-brand-item">
                    <img src="{{ asset('assets/images/hosting/premium/brand/3.png') }}" alt="">
                </div>
                <div class="business-brand-item">
                    <img src="{{ asset('assets/images/hosting/premium/brand/4.png') }}" alt="">
                </div>
                <div class="business-brand-item">
                    <img src="{{ asset('assets/images/hosting/premium/brand/5.png') }}" alt="">
                </div>
                <div class="business-brand-item">
                    <img src="{{ asset('assets/images/hosting/premium/brand/6.png') }}" alt="">
                </div>
                <div class="business-brand-item">
                    <img src="{{ asset('assets/images/hosting/premium/brand/7.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="brand-statistics-section">
        <div class="container">
            <div class="row g-3 g-sm-4">
                <div class="col-lg-3 col-6">
                    <div class="brand-statistics-card counter-item">
                        <div class="count">
                            <span class="odometer" data-odometer-final="99.9"></span>
                            <span class="text--base">%</span>
                        </div>
                        <p class="label">Uptime Guarantee</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="brand-statistics-card counter-item">
                        <div class="count">
                            <span class="odometer" data-odometer-final="10"></span>
                            <span class="text--base">Gbps</span>
                        </div>
                        <p class="label">Network Port Speed</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="brand-statistics-card counter-item">
                        <div class="count">
                            <span class="odometer" data-odometer-final="30"></span>
                            <span class="text--base">+</span>
                        </div>
                        <p class="label">Global Data Centers</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="brand-statistics-card counter-item">
                        <div class="count">
                            <span class="odometer" data-odometer-final="3500"></span>
                            <span class="text--base">+</span>
                        </div>
                        <p class="label">Hosted Websites</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('template.hosting.feature.premium')


    <section class="premium-service py-120">
        <div class="container">
            <div class="row g-4">
                <div class="col-sm-6 col-lg-4 d-flex align-items-center">
                    <div class="section-heading style-left">
                        <h2 class="section-heading__title">Explore Our Premium Services</h2>
                        <p class="section-heading__desc">
                            We deliver powerful, scalable, and secure hosting solutions designed to support businesses of all sizes
                            and industries.
                        </p>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="ps-card">
                        <img src="{{ asset('assets/images/hosting/premium/service/1.png') }}" alt="Cloud Hosting" class="ps-card__img" />
                        <div class="ps-card__label">
                            <div class="ps-card__icon ps-card__icon--base">
                                <img src="{{ asset('assets/images/hosting/premium/service/icon-1.png') }}" alt="">
                            </div>
                            <h4 class="ps-card__name">Cloud Hosting</h4>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="ps-card">
                        <img src="{{ asset('assets/images/hosting/premium/service/2.png') }}" alt="Server Management" class="ps-card__img" />
                        <div class="ps-card__label">
                            <div class="ps-card__icon ps-card__icon--dark">
                                <img src="{{ asset('assets/images/hosting/premium/service/icon-2.png') }}" alt="">
                            </div>
                            <h4 class="ps-card__name">Server Management</h4>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="ps-card">
                        <img src="{{ asset('assets/images/hosting/premium/service/3.png') }}" alt="Business Hosting" class="ps-card__img" />
                        <div class="ps-card__label">
                            <div class="ps-card__icon ps-card__icon--base">
                                <img src="{{ asset('assets/images/hosting/premium/service/icon-3.png') }}" alt="">
                            </div>
                            <h4 class="ps-card__name">Business Hosting</h4>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="ps-card">
                        <img src="{{ asset('assets/images/hosting/premium/service/4.png') }}" alt="Product Deployment" class="ps-card__img" />
                        <div class="ps-card__label">
                            <div class="ps-card__icon ps-card__icon--dark">
                                <img src="{{ asset('assets/images/hosting/premium/service/icon-4.png') }}" alt="">
                            </div>
                            <h4 class="ps-card__name">Product Deployment</h4>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="ps-card">
                        <img src="{{ asset('assets/images/hosting/premium/service/5.png') }}" alt="Customer Support" class="ps-card__img" />
                        <div class="ps-card__label">
                            <div class="ps-card__icon ps-card__icon--base">
                                <img src="{{ asset('assets/images/hosting/premium/service/icon-5.png') }}" alt="">
                            </div>
                            <h4 class="ps-card__name">Customer Support</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
