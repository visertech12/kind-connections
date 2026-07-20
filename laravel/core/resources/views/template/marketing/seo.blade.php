
@php
    $seo = config('seo.marketing.seo', config('seo.default', []));
    $seodata['title']       = $seo['title'] ?? '';
    $seodata['description'] = $seo['description'] ?? '';
    $seodata['keyword']     = $seo['keyword'] ?? '';
    $seodata['image']       = $seo['image'] ?? '';
@endphp
@extends('template.layouts.frontend', ['seodata' => $seodata])
@section('content')


    <section class="seo-banner bg-img" style="background-image: url({{ asset('assets/images/marketing/seo/banner-bg.png') }})">
        <div class="container">
            <div class="row gy-5 align-items-center">
                <div class="col-lg-6">
                    <div class="seo-banner-content">
                        <h1 class="seo-banner-title">
                            Rank Higher. Get Found Faster.
                            <span class="text--base d-inline">Grow Consistently.</span>
                        </h1>
                        <p class="seo-banner-desc">
                            Every optimized page, every authoritative backlink, and every targeted keyword contributes lasting value
                            to your business, something paid advertising cannot sustain over time.
                        </p>

                        <a href="{{ route('book.meeting') }}" class="btn btn--base">Set A Meeting Now</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="seo-banner-thumb ps-lg-40">
                        <div class="seo-banner-thumb-shape1">
                            <img src="{{ asset('assets/images/marketing/seo/banner-shape-one.png') }}" alt="">
                        </div>
                        <div class="seo-banner-thumb-shape2">
                            <img src="{{ asset('assets/images/marketing/seo/banner-shape-two.png') }}" alt="">
                        </div>
                        <div class="seo-banner-thumb-shape"></div>
                        <img src="{{ asset('assets/images/marketing/seo/banner-image.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="business-plan mt-40 mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2 class="section-heading__title">Affordable <span class="shape">SEO Solutions</span> for Your Business</h2>
                        <p class="section-heading__desc">Empower your online presence, accelerate organic growth, and boost your search rankings with tailored and transparent SEO packages designed to drive long-term success</p>
                    </div>
                </div>
            </div>
            <div class="row gy-4 justify-content-center">
                <div class="col-xl-3 col-lg-4 col-sm-6 col-msm-6">
                    <div class="business-plan-item flex-wrap transition">
                        <div class="business-plan-item__header">
                            <h5 class="business-plan-item__package">Basic SEO</h5>
                            <h3 class="business-plan-item__price">$99</h3>
                        </div>
                        <div class="business-plan-item__body">
                            <ul class="text-list underlined">
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> On-Page Optimization</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> 10 Keywords Targeted</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Monthly Report</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Basic Technical Audit</li>
                            </ul>
                        </div>
                        <div class="business-plan-item__footer">
                            <a href="#" class="btn btn--custom w-100 btn--md">ORDER NOW</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 col-msm-6">
                    <div class="business-plan-item flex-wrap transition">
                        <div class="business-plan-item__header">
                            <h5 class="business-plan-item__package">Standard SEO</h5>
                            <h3 class="business-plan-item__price">$199</h3>
                        </div>
                        <div class="business-plan-item__body">
                            <ul class="text-list underlined">
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Advanced On-Page</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> 25 Keywords Targeted</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Competitor Analysis</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> 5 High DA Backlinks</li>
                            </ul>
                        </div>
                        <div class="business-plan-item__footer">
                            <a href="#" class="btn btn--custom w-100 btn--md">ORDER NOW</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 col-msm-6">
                    <div class="business-plan-item flex-wrap transition">
                        <div class="business-plan-item__header">
                            <h5 class="business-plan-item__package">Premium SEO</h5>
                            <h3 class="business-plan-item__price">$399</h3>
                        </div>
                        <div class="business-plan-item__body">
                            <ul class="text-list underlined">
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Comprehensive SEO</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> 50 Keywords Targeted</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Content Strategy</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> 15 High DA Backlinks</li>
                            </ul>
                        </div>
                        <div class="business-plan-item__footer">
                            <a href="#" class="btn btn--custom w-100 btn--md">ORDER NOW</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 col-msm-6">
                    <div class="business-plan-item flex-wrap transition">
                        <div class="business-plan-item__header">
                            <h5 class="business-plan-item__package">Enterprise SEO</h5>
                            <h3 class="business-plan-item__price">$799</h3>
                        </div>
                        <div class="business-plan-item__body">
                            <ul class="text-list underlined">
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Full-Scale SEO Strategy</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Unlimited Keywords</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Dedicated SEO Manager</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Custom Link Building</li>
                            </ul>
                        </div>
                        <div class="business-plan-item__footer">
                            <a href="#" class="btn btn--custom w-100 btn--md">ORDER NOW</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="seo-process-section mb-120">
        <div class="container">
            <div class="section-heading">
                <h2 class="section-heading__title">
                    Driving Growth Through Strategic
                    <br>
                    <span class="shape">SEO and Digital Marketing</span>
                </h2>
            </div>
            <div class="seo-process-item">
                <div class="content">
                    <h3 class="title">01. SEO Optimization</h3>
                    <p class="desc">
                        We enhance your website’s visibility through comprehensive on-page and technical SEO. This includes
                        keyword research, meta tag optimization, content structuring, clean URL architecture, internal linking
                        improvements, and technical issue resolution.
                    </p>
                </div>
                <span class="arrow-icon">
                    <i class="fa-solid fa-arrow-right"></i>
                </span>

                <div class="thumb">
                    <img src="{{ asset('assets/images/marketing/seo/seo.png') }}" alt="">
                </div>
            </div>
            <div class="seo-process-item">
                <div class="content">
                    <h3 class="title">02. Content Marketing</h3>
                    <p class="desc">
                        We develop and optimize high quality, search focused content that aligns with user intent and business
                        goals. Our content strategies improve engagement, strengthen topical authority, and support long term
                        organic growth across search engines.
                    </p>
                </div>
                <span class="arrow-icon">
                    <i class="fa-solid fa-arrow-right"></i>
                </span>
                <div class="thumb">
                    <img src="{{ asset('assets/images/marketing/seo/seo.png') }}" alt="">
                </div>
            </div>
            <div class="seo-process-item">
                <div class="content">
                    <h3 class="title">03. Social Media Marketing</h3>
                    <p class="desc">
                        We build and manage strategic social media campaigns that enhance brand awareness, increase audience
                        engagement, and drive qualified traffic to your website through consistent and impactful content
                        distribution.
                    </p>
                </div>
                <span class="arrow-icon">
                    <i class="fa-solid fa-arrow-right"></i>
                </span>
                <div class="thumb">
                    <img src="{{ asset('assets/images/marketing/seo/seo.png') }}" alt="">
                </div>
            </div>
            <div class="seo-process-item">
                <div class="content">
                    <h3 class="title">04. Link Building Strategy</h3>
                    <p class="desc">
                        We implement structured, high quality link building campaigns designed to strengthen domain authority,
                        improve keyword rankings, and increase organic visibility through relevant and authoritative backlink
                        acquisition.
                    </p>
                </div>
                <span class="arrow-icon">
                    <i class="fa-solid fa-arrow-right"></i>
                </span>
                <div class="thumb">
                    <img src="{{ asset('assets/images/marketing/seo/seo.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="seo-benefit-section py-120">
        <div class="container">
            <div class="row gy-4">
                <div class="col-xl-5 d-none d-xl-block">
                    <div class="seo-benefit-thumb">
                        <img class="fit-image" src="{{ asset('assets/images/marketing/seo/benefit.png') }}" alt="">
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="ps-xl-5">
                        <div class="section-heading style-left">
                            <h2 class="section-heading__title text-white">
                                Let's Take Your SEO To The <br> Next Level
                            </h2>
                            <p class="section-heading__desc text-white">
                                With data driven SEO strategies and advanced optimization techniques, we help your website achieve
                                stronger visibility, increased traffic, and higher conversion performance.
                            </p>
                        </div>
                        <div class="seo-benefit-wrapper">
                            <div class="seo-benefit-item">
                                <div class="thumb">
                                    <img src="{{ asset('assets/images/marketing/seo/local.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h4 class="title">Local Business Presence</h4>
                                    <p class="desc">
                                        Strengthen your visibility in local search results with targeted SEO strategies, optimized Google
                                        Business Profile management, and geo-focused keyword targeting.
                                    </p>
                                </div>
                            </div>
                            <div class="seo-benefit-item">
                                <div class="thumb">
                                    <img src="{{ asset('assets/images/marketing/seo/build.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h4 class="title">Built for Organic Growth</h4>
                                    <p class="desc">
                                        We drive consistent, high quality organic traffic through technical SEO audits, on-page
                                        optimization, and strategic content planning designed for long term scalability.
                                    </p>
                                </div>
                            </div>
                            <div class="seo-benefit-item">
                                <div class="thumb">
                                    <img src="{{ asset('assets/images/marketing/seo/rank.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <h4 class="title">Maximize Ranking Opportunity</h4>
                                    <p class="desc">
                                        We transform rankings into revenue through conversion focused landing pages, click through rate
                                        optimization, and performance tracking.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="budget-hosting-feature py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2 class="section-heading__title"> SEO <span class="shape"> Features </span> </h2>
                        <p class="section-heading__desc">Drive high-quality organic traffic, improve keyword rankings, and enhance user experience with our comprehensive and tailored search engine optimization solution</p>
                    </div>
                </div>
            </div>
            <div class="budget-hosting-feature__inner">
                <div class="row budget-hosting-feature-wrapper service-item-wrapper gy-xsm-4">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item style-left">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/analysis_fix.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title">Analysis & Fix</h4>
                            <p class="service-item__desc">Our expert team conducts thorough website analysis and implements effective fixes to enhance performance and visibility.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item style-left">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/keyword_research.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title">Keyword Research</h4>
                            <p class="service-item__desc">Uncover strategic keywords for your niche, ensuring improved search rankings and targeted traffic.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item style-left">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/affordable_pricing.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title">Affordable Pricing</h4>
                            <p class="service-item__desc">Enjoy cost-effective SEO packages designed to meet your budget without compromising quality.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item style-left">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/no_contracts.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title">No Contracts</h4>
                            <p class="service-item__desc">Experience the freedom of our services with no long-term commitments or binding contracts.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item style-left">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/expert_team.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title">Expert Team</h4>
                            <p class="service-item__desc">Our dedicated professionals bring their expertise to drive your SEO success and online growth.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item style-left">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/fast_delivery.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title">Fast Delivery</h4>
                            <p class="service-item__desc">We prioritize swift implementation, delivering noticeable results in record time for your business.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
