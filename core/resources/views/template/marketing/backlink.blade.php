
@php
    $seo = config('seo.marketing.backlink', config('seo.default', []));
    $seodata['title']       = $seo['title'] ?? '';
    $seodata['description'] = $seo['description'] ?? '';
    $seodata['keyword']     = $seo['keyword'] ?? '';
    $seodata['image']       = $seo['image'] ?? '';
@endphp
@extends('template.layouts.frontend', ['seodata' => $seodata])
@section('content')


    <section class="backlink-banner my-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="bb-hero text-center">
                        <h1 class="bb-hero__title">
                            <span class="bb-hero__word">SCALE</span>
                            <span class="bb-hero__icons">
                                <img src="{{ asset('assets/images/marketing/backlink/link.png') }}" alt="link">
                                <img src="{{ asset('assets/images/marketing/backlink/power.png') }}" alt="power">
                                <img src="{{ asset('assets/images/marketing/backlink/seo.png') }}" alt="growth">
                            </span>
                            <span class="bb-hero__word">ORGANIC</span>
                            <span class="bb-hero__word">TRAFFIC</span>
                        </h1>
                        <p class="bb-hero__desc">
                            Build a powerful backlink profile from real, high-authority
                            websites. Our proven outreach process drives sustainable
                            rankings, qualified traffic, and long-term SEO growth you can
                            actually measure.
                        </p>
                        <a href="#pricing" class="bb-hero__btn btn btn--base">Start Ranking</a>
                    </div>
                </div>
            </div>

            <div class="row g-4 bb-cards-row">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="bb-card bb-card--rank">
                        <div class="bb-card__body">
                            <h5 class="bb-card__title">Rank #1 With Backlinks</h5>
                            <p class="bb-card__desc">
                                Earn high-authority backlinks that lift your Google
                                rankings and compound your domain authority quarter
                                after quarter.
                            </p>
                        </div>
                        <div class="bb-card__chart-wrap">
                            <img src="{{ asset('assets/images/marketing/backlink/chart.png') }}" alt="Chart" class="bb-card__chart-img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="bb-card bb-card--connect">
                        <div class="bb-card__connect-content">
                            <h3 class="bb-card__connect-title">
                                Turning "Backlinks" Into "Real Business Growth"
                            </h3>
                        </div>
                        <div class="bb-card__connect-thumb">
                            <img src="{{ asset('assets/images/marketing/backlink/growth.png') }}" alt="Business Growth" class="bb-card__connect-img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="bb-stack">
                        <div class="bb-card bb-card--stat counter-item">
                            <div class="bb-card__stat-row">
                                <h2 class="bb-card__stat-value">
                                    <span class="odometer" data-odometer-final="500"></span>
                                    +
                                </h2>
                                <div class="bb-card__avatars">
                                    <img src="{{ asset('assets/images/marketing/backlink/avatar-1.png') }}" alt="Avatar">
                                    <img src="{{ asset('assets/images/marketing/backlink/avatar-2.png') }}" alt="Avatar">
                                    <img src="{{ asset('assets/images/marketing/backlink/avatar-3.png') }}" alt="Avatar">
                                </div>
                            </div>
                            <p class="bb-card__stat-label">Happy Clients</p>
                        </div>

                        <div class="bb-card bb-card--algo">
                            <div class="bb-card__algo-icon">
                                <img src="{{ asset('assets/images/marketing/backlink/result.png') }}" alt="Result">
                            </div>
                            <h5 class="bb-card__algo-title mb-0">
                                Algorithm-Proof Strategy, Real Rankings
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="plan-section my-120" id="pricing">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2 class="section-heading__title"> Improve Your Rank <span class="shape"> Easily </span> </h2>
                        <p class="section-heading__desc">With Unlock Themes, it's easy to order new backlinks, SEO services, campaigns, wiki links, forum and blog posts, and more. Manage your orders by tracking progress and downloading reports. We ensure stable SEO services with quality and fast delivery.</p>
                    </div>
                </div>
            </div>
            <div class="row gy-4 justify-content-center">

                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="plan-card flex-wrap transition">
                            <div class="plan-card__header">
                                <div class="plan-card__header-bg">
                                    <img src="{{ asset('assets/images/shapes/plan-card-bg.png') }}" alt="" class="fit-image">
                                </div>
                                <h5 class="plan-card__title">Guest Post Backlinks</h5>
                            </div>
                            <div class="plan-card__body">
                                <ul class="text-list dotted">
                                    <li class="text-list__item">High DA/DR (50+)</li>
                                    <li class="text-list__item">Dofollow Links</li>
                                    <li class="text-list__item">Contextual Placement</li>
                                    <li class="text-list__item">Unique Article Included</li>
                                    <li class="text-list__item">Minimum Quantity : 5</li>
                                    <li class="text-list__item">Price Per Quantity : $25.00</li>
                                </ul>
                            </div>
                            <div class="plan-card__footer">
                                <a href="#" class="btn btn--custom w-100 btn--md">ORDER NOW</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="plan-card flex-wrap transition">
                            <div class="plan-card__header">
                                <div class="plan-card__header-bg">
                                    <img src="{{ asset('assets/images/shapes/plan-card-bg.png') }}" alt="" class="fit-image">
                                </div>
                                <h5 class="plan-card__title">PBN Backlinks</h5>
                            </div>
                            <div class="plan-card__body">
                                <ul class="text-list dotted">
                                    <li class="text-list__item">High metrics PBNs</li>
                                    <li class="text-list__item">Low OBL</li>
                                    <li class="text-list__item">Relevant Niche</li>
                                    <li class="text-list__item">Fast Indexing</li>
                                    <li class="text-list__item">Minimum Quantity : 10</li>
                                    <li class="text-list__item">Price Per Quantity : $10.00</li>
                                </ul>
                            </div>
                            <div class="plan-card__footer">
                                <a href="#" class="btn btn--custom w-100 btn--md">ORDER NOW</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="plan-card flex-wrap transition">
                            <div class="plan-card__header">
                                <div class="plan-card__header-bg">
                                    <img src="{{ asset('assets/images/shapes/plan-card-bg.png') }}" alt="" class="fit-image">
                                </div>
                                <h5 class="plan-card__title">Forum Backlinks</h5>
                            </div>
                            <div class="plan-card__body">
                                <ul class="text-list dotted">
                                    <li class="text-list__item">Niche relevant forums</li>
                                    <li class="text-list__item">Natural profile links</li>
                                    <li class="text-list__item">Mix of Dofollow/Nofollow</li>
                                    <li class="text-list__item">High Trust Flow</li>
                                    <li class="text-list__item">Minimum Quantity : 50</li>
                                    <li class="text-list__item">Price Per Quantity : $2.00</li>
                                </ul>
                            </div>
                            <div class="plan-card__footer">
                                <a href="#" class="btn btn--custom w-100 btn--md">ORDER NOW</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="plan-card flex-wrap transition">
                            <div class="plan-card__header">
                                <div class="plan-card__header-bg">
                                    <img src="{{ asset('assets/images/shapes/plan-card-bg.png') }}" alt="" class="fit-image">
                                </div>
                                <h5 class="plan-card__title">Web 2.0 Backlinks</h5>
                            </div>
                            <div class="plan-card__body">
                                <ul class="text-list dotted">
                                    <li class="text-list__item">Tier 1 Link Building</li>
                                    <li class="text-list__item">Manually Created</li>
                                    <li class="text-list__item">Unique content</li>
                                    <li class="text-list__item">Login Details Provided</li>
                                    <li class="text-list__item">Minimum Quantity : 20</li>
                                    <li class="text-list__item">Price Per Quantity : $5.00</li>
                                </ul>
                            </div>
                            <div class="plan-card__footer">
                                <a href="#" class="btn btn--custom w-100 btn--md">ORDER NOW</a>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </section>

    <section class="backlink-choose-section py-120">
        <div class="container">
            <div class="row gy-4 align-items-center justify-content-between">
                <div class="col-lg-5">
                    <div class="section-heading style-left">
                        <h2 class="section-heading__title">
                            Is Your Website Invisible to <span class="shape">90% of Search</span> Results?
                        </h2>
                        <p class="section-heading__desc">
                            You have a great website. But if you aren't in the top 3
                            Google search results, you don't exist. Your potential
                            customers are searching right now and they are visiting your
                            competitors instead.
                        </p>
                    </div>

                    <a href="{{ route('marketing.seo') }}" class="btn btn--base">Explore SEO Services</a>
                </div>
                <div class="col-lg-6">
                    <div class="backlink-choose-wrapper">
                        <div class="backlink-choose-card">
                            <div class="backlink-choose-card__icon">
                                <img src="{{ asset('assets/images/marketing/backlink/gost.png') }}" alt="">
                            </div>
                            <div class="backlink-choose-card__content">
                                <h4 class="backlink-choose-card__title">The Ghost Town</h4>
                                <p class="backlink-choose-card__desc">
                                    Your site looks great but barely shows up in search
                                    results. Without a strong backlink profile, your domain
                                    authority stays too low to break onto page one.
                                </p>
                            </div>
                        </div>
                        <div class="backlink-choose-card">
                            <div class="backlink-choose-card__icon">
                                <img src="{{ asset('assets/images/marketing/backlink/hand.png') }}" alt="">
                            </div>
                            <div class="backlink-choose-card__content">
                                <h4 class="backlink-choose-card__title">The Competitor</h4>
                                <p class="backlink-choose-card__desc">
                                    Your competitors are not winning because their content is
                                    better. They are winning because stronger backlinks and
                                    higher domain authority push them above you on Google.
                                </p>
                            </div>
                        </div>
                        <div class="backlink-choose-card">
                            <div class="backlink-choose-card__icon">
                                <img src="{{ asset('assets/images/marketing/backlink/coin.png') }}" alt="">
                            </div>
                            <div class="backlink-choose-card__content">
                                <h4 class="backlink-choose-card__title">
                                    The Missed Revenue
                                </h4>
                                <p class="backlink-choose-card__desc">
                                    Every day outside the top 3 search positions costs you
                                    qualified visitors, warm leads, and the revenue your
                                    competitors are quietly taking instead.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="feature-two section-bg py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2 class="section-heading__title"> Backlink <span class="shape"> Features </span> </h2>
                        <p class="section-heading__desc">Experience unparalleled growth and visibility with our cutting-edge backlink service features, strategically designed to amplify your online presence</p>
                    </div>
                </div>
            </div>
            <div class="row gy-4 justify-content-center">
                <div class="col-xl-3 col-lg-4 col-sm-6 col-msm-6">
                    <div class="feature-two-item">
                        <div class="feature-two-item__icon flex-center"><i class="fas fa-tag"></i></div>
                        <div class="feature-two-item__content">
                            <h4 class="feature-two-item__title">Affordable Pricing</h4>
                            <p class="feature-two-item__desc">Quality SEO services at the most affordable prices possible. We never compromise on quality.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 col-msm-6">
                    <div class="feature-two-item">
                        <div class="feature-two-item__icon flex-center"><i class="fas fa-box"></i></div>
                        <div class="feature-two-item__content">
                            <h4 class="feature-two-item__title">Easy to Order</h4>
                            <p class="feature-two-item__desc">Pick any bundle, click add to cart, and you're done. Simply pay and your order begins processing.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 col-msm-6">
                    <div class="feature-two-item">
                        <div class="feature-two-item__icon flex-center"><i class="fas fa-file-alt"></i></div>
                        <div class="feature-two-item__content">
                            <h4 class="feature-two-item__title">No Contracts</h4>
                            <p class="feature-two-item__desc">No contracts. No hidden fees. We are focused on earning our customers' trust.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 col-msm-6">
                    <div class="feature-two-item">
                        <div class="feature-two-item__icon flex-center"><i class="fas fa-link"></i></div>
                        <div class="feature-two-item__content">
                            <h4 class="feature-two-item__title">Quality Backlinks</h4>
                            <p class="feature-two-item__desc">With our simple-to-use ordering system, you can place backlink orders, campaigns, and more.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 col-msm-6">
                    <div class="feature-two-item">
                        <div class="feature-two-item__icon flex-center"><i class="fas fa-rocket"></i></div>
                        <div class="feature-two-item__content">
                            <h4 class="feature-two-item__title">Fast Delivery</h4>
                            <p class="feature-two-item__desc">We do our utmost to start order processing within 0-24 hours. Most orders are completed within 72 hours.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 col-msm-6">
                    <div class="feature-two-item">
                        <div class="feature-two-item__icon flex-center"><i class="fas fa-user"></i></div>
                        <div class="feature-two-item__content">
                            <h4 class="feature-two-item__title">Expert Team</h4>
                            <p class="feature-two-item__desc">All of our specialists are fully professional. Every one of them is trained to ensure quality.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 col-msm-6">
                    <div class="feature-two-item">
                        <div class="feature-two-item__icon flex-center"><i class="fas fa-th-large"></i></div>
                        <div class="feature-two-item__content">
                            <h4 class="feature-two-item__title">Dashboard Tool</h4>
                            <p class="feature-two-item__desc">We have designed a client dashboard for all of your operations. You can manage your orders from there.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 col-msm-6">
                    <div class="feature-two-item">
                        <div class="feature-two-item__icon flex-center"><i class="fas fa-file-signature"></i></div>
                        <div class="feature-two-item__content">
                            <h4 class="feature-two-item__title">Content Marketing</h4>
                            <p class="feature-two-item__desc">Create, distribute, and promote engaging content to drive more traffic and build a loyal audience.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
