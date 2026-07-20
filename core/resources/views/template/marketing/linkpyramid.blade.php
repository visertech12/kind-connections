@php
    $seo = config('seo.marketing.linkpyramid', config('seo.default', []));
    $seodata['title']       = $seo['title'] ?? '';
    $seodata['description'] = $seo['description'] ?? '';
    $seodata['keyword']     = $seo['keyword'] ?? '';
    $seodata['image']       = $seo['image'] ?? '';
@endphp
@extends('template.layouts.frontend',['seodata' => $seodata])
@section('content')
            
    <section class="pyramid-banner my-120">
        <div class="container">
            <div class="section-heading">
                <h1 class="section-heading__title">
                    Driving Website Authority with
                    <br />
                    <span class="shape"> Link Building That Scales </span>
                </h1>
                <p class="section-heading__desc">
                    We help businesses strengthen their digital presence through strategic, scalable, and performance driven
                    link building solutions.
                </p>
            </div>
            <div class="pyramid-banner-content">
                <div class="row gy-4">
                    <div class="col-lg-5">
                        <div class="pyramid-banner-image-wrapper">
                            <img src="/assets/images/marketing/pyramid/pyramid-banner.png" alt="Our Team at Work" class="pyramid-banner-image">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="ps-xl-4">
                            <ul class="pyramid-banner-tab-nav" id="pyramidBannerTab" role="tablist">
                                <li class="pyramid-banner-tab-nav__item" role="presentation">
                                    <button class="pyramid-banner-tab-nav__button active" id="pyramid-mission-tab" data-bs-toggle="tab" data-bs-target="#pyramid-mission" type="button" role="tab" aria-controls="pyramid-mission" aria-selected="true">
                                        Our Mission
                                    </button>
                                </li>
                                <li class="pyramid-banner-tab-nav__item" role="presentation">
                                    <button class="pyramid-banner-tab-nav__button" id="pyramid-vision-tab" data-bs-toggle="tab" data-bs-target="#pyramid-vision" type="button" role="tab" aria-controls="pyramid-vision" aria-selected="false">
                                        Our Vision
                                    </button>
                                </li>
                                <li class="pyramid-banner-tab-nav__item" role="presentation">
                                    <button class="pyramid-banner-tab-nav__button" id="pyramid-story-tab" data-bs-toggle="tab" data-bs-target="#pyramid-story" type="button" role="tab" aria-controls="pyramid-story" aria-selected="false">
                                        Our Story
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content pyramid-banner-tab-content" id="pyramidBannerTabContent">
                                <div class="tab-pane fade show active" id="pyramid-mission" role="tabpanel" aria-labelledby="pyramid-mission-tab">
                                    <p class="pyramid-banner-tab-description">
                                        At the core of our agency is a commitment to helping businesses build sustainable online authority
                                        through intelligent and effective link-building strategies. We simplify the complexities of
                                        off-page SEO by creating trusted, scalable backlink ecosystems that drive measurable results.
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="pyramid-vision" role="tabpanel" aria-labelledby="pyramid-vision-tab">
                                    <p class="pyramid-banner-tab-description">
                                        We envision a digital ecosystem where brands grow through sustainable strategies, not shortcuts. By continuously
                                        innovating and adapting to the changing landscape of search, we strive to help our clients achieve
                                        lasting visibility, stronger authority, and meaningful online success.
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="pyramid-story" role="tabpanel" aria-labelledby="pyramid-story-tab">
                                    <p class="pyramid-banner-tab-description">
                                        Today, we work with businesses that are serious about long term success in search. Our story is
                                        still being written driven by continuous learning, innovation, and a commitment to helping brands
                                        build lasting digital authority in an ever evolving SEO landscape.
                                    </p>
                                </div>
                            </div>
                            <div class="pyramid-banner-counters">
                                <div class="row g-3">
                                    <div class="col-sm-4 col-6">
                                        <div class="pyramid-banner-counter-card counter-item">
                                            <span class="pyramid-banner-counter-card__label">Backlinks Built</span>
                                            <h2 class="pyramid-banner-counter-card__value">
                                                <span class="odometer" data-odometer-final="13"></span>
                                                <span>M+</span>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <div class="pyramid-banner-counter-card counter-item">
                                            <span class="pyramid-banner-counter-card__label">Authority Growth</span>
                                            <h2 class="pyramid-banner-counter-card__value">
                                                <span>+</span>
                                                <span class="odometer" data-odometer-final="56"></span>
                                                <span>%</span>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-12">
                                        <div class="pyramid-banner-counter-card counter-item">
                                            <span class="pyramid-banner-counter-card__label">Domains Ranked</span>
                                            <h2 class="pyramid-banner-counter-card__value">
                                                <span class="odometer" data-odometer-final="920"></span>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="plan-section my-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2 class="section-heading__title"> Self Order Link Pyramid <span class="shape"> Services </span> </h2>
                        <p class="section-heading__desc">Choose from a wide range of backlink services in our link pyramid. Place orders with ease for single orders, mass orders, backlinks, or full SEO campaigns and watch your website soar.</p>
                    </div>
                </div>
            </div>
            <div class="row gy-4 justify-content-center">

                                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="plan-card flex-wrap transition">
                            <div class="plan-card__header">
                                <div class="plan-card__header-bg">
                                    <img src="/assets/images/shapes/plan-card-bg.png" alt="" class="fit-image">
                                </div>
                                <h5 class="plan-card__title">Web 2.0 blogs (Dedicated accounts)</h5>
                            </div>
                            <div class="plan-card__body">
                                <ul class="text-list dotted">
                                    <li class="text-list__item">Minimum Quantity : 50</li>
                                    <li class="text-list__item">Price Per Quantity : $0.4</li>
                                </ul>
                            </div>
                            <div class="plan-card__footer">

                                                                    <a href="/user/login?vlpath=/marketing/linkpyramid" class="btn btn--custom w-100 btn--md">ORDER NOW</a>
                                                                
                            </div>
                        </div>
                    </div>
                                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="plan-card flex-wrap transition">
                            <div class="plan-card__header">
                                <div class="plan-card__header-bg">
                                    <img src="/assets/images/shapes/plan-card-bg.png" alt="" class="fit-image">
                                </div>
                                <h5 class="plan-card__title">PR9 - DA (Domain Authority) 70+</h5>
                            </div>
                            <div class="plan-card__body">
                                <ul class="text-list dotted">
                                    <li class="text-list__item">Minimum Quantity : 10</li>
                                    <li class="text-list__item">Price Per Quantity : $2.5</li>
                                </ul>
                            </div>
                            <div class="plan-card__footer">

                                                                    <a href="/user/login?vlpath=/marketing/linkpyramid" class="btn btn--custom w-100 btn--md">ORDER NOW</a>
                                                                
                            </div>
                        </div>
                    </div>
                                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="plan-card flex-wrap transition">
                            <div class="plan-card__header">
                                <div class="plan-card__header-bg">
                                    <img src="/assets/images/shapes/plan-card-bg.png" alt="" class="fit-image">
                                </div>
                                <h5 class="plan-card__title">DA (Domain Authority) 50+ Do-follow</h5>
                            </div>
                            <div class="plan-card__body">
                                <ul class="text-list dotted">
                                    <li class="text-list__item">Minimum Quantity : 100</li>
                                    <li class="text-list__item">Price Per Quantity : $1</li>
                                </ul>
                            </div>
                            <div class="plan-card__footer">

                                                                    <a href="/user/login?vlpath=/marketing/linkpyramid" class="btn btn--custom w-100 btn--md">ORDER NOW</a>
                                                                
                            </div>
                        </div>
                    </div>
                                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="plan-card flex-wrap transition">
                            <div class="plan-card__header">
                                <div class="plan-card__header-bg">
                                    <img src="/assets/images/shapes/plan-card-bg.png" alt="" class="fit-image">
                                </div>
                                <h5 class="plan-card__title">Wiki backlinks (mix profiles &amp; articles)</h5>
                            </div>
                            <div class="plan-card__body">
                                <ul class="text-list dotted">
                                    <li class="text-list__item">Minimum Quantity : 1000</li>
                                    <li class="text-list__item">Price Per Quantity : $0.05</li>
                                </ul>
                            </div>
                            <div class="plan-card__footer">

                                                                    <a href="/user/login?vlpath=/marketing/linkpyramid" class="btn btn--custom w-100 btn--md">ORDER NOW</a>
                                                                
                            </div>
                        </div>
                    </div>
                                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="plan-card flex-wrap transition">
                            <div class="plan-card__header">
                                <div class="plan-card__header-bg">
                                    <img src="/assets/images/shapes/plan-card-bg.png" alt="" class="fit-image">
                                </div>
                                <h5 class="plan-card__title">Forum profiles backlinks</h5>
                            </div>
                            <div class="plan-card__body">
                                <ul class="text-list dotted">
                                    <li class="text-list__item">Minimum Quantity : 1000</li>
                                    <li class="text-list__item">Price Per Quantity : $0.05</li>
                                </ul>
                            </div>
                            <div class="plan-card__footer">

                                                                    <a href="/user/login?vlpath=/marketing/linkpyramid" class="btn btn--custom w-100 btn--md">ORDER NOW</a>
                                                                
                            </div>
                        </div>
                    </div>
                                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="plan-card flex-wrap transition">
                            <div class="plan-card__header">
                                <div class="plan-card__header-bg">
                                    <img src="/assets/images/shapes/plan-card-bg.png" alt="" class="fit-image">
                                </div>
                                <h5 class="plan-card__title">Article directories backlinks (contextual)</h5>
                            </div>
                            <div class="plan-card__body">
                                <ul class="text-list dotted">
                                    <li class="text-list__item">Minimum Quantity : 1000</li>
                                    <li class="text-list__item">Price Per Quantity : $0.1</li>
                                </ul>
                            </div>
                            <div class="plan-card__footer">

                                                                    <a href="/user/login?vlpath=/marketing/linkpyramid" class="btn btn--custom w-100 btn--md">ORDER NOW</a>
                                                                
                            </div>
                        </div>
                    </div>
                                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="plan-card flex-wrap transition">
                            <div class="plan-card__header">
                                <div class="plan-card__header-bg">
                                    <img src="/assets/images/shapes/plan-card-bg.png" alt="" class="fit-image">
                                </div>
                                <h5 class="plan-card__title">DA (Domain Authority) 50+</h5>
                            </div>
                            <div class="plan-card__body">
                                <ul class="text-list dotted">
                                    <li class="text-list__item">Minimum Quantity : 50</li>
                                    <li class="text-list__item">Price Per Quantity : $1</li>
                                </ul>
                            </div>
                            <div class="plan-card__footer">

                                                                    <a href="/user/login?vlpath=/marketing/linkpyramid" class="btn btn--custom w-100 btn--md">ORDER NOW</a>
                                                                
                            </div>
                        </div>
                    </div>
                                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="plan-card flex-wrap transition">
                            <div class="plan-card__header">
                                <div class="plan-card__header-bg">
                                    <img src="/assets/images/shapes/plan-card-bg.png" alt="" class="fit-image">
                                </div>
                                <h5 class="plan-card__title">Mix platforms backlinks from unique domains</h5>
                            </div>
                            <div class="plan-card__body">
                                <ul class="text-list dotted">
                                    <li class="text-list__item">Minimum Quantity : 100</li>
                                    <li class="text-list__item">Price Per Quantity : $0.12</li>
                                </ul>
                            </div>
                            <div class="plan-card__footer">

                                                                    <a href="/user/login?vlpath=/marketing/linkpyramid" class="btn btn--custom w-100 btn--md">ORDER NOW</a>
                                                                
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
                        <h2 class="section-heading__title"> Link Pyramid <span class="shape"> Features </span> </h2>
                        <p class="section-heading__desc">Experience unparalleled growth and visibility with our cutting-edge link pyramid service features, strategically designed to amplify your online presence</p>
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

    <section class="pyramid-benefit-section my-120">
        <div class="container">
            <div class="section-heading">
                <h2 class="section-heading__title">
                    The Values That
                    <span class="shape">Drive Our Success</span>
                </h2>
            </div>
            <div class="row gy-4">
                <div class="col-lg-4 col-sm-6">
                    <div class="pyramid-benefit-card">
                        <div class="shape">
                            <img src="/assets/images/marketing/pyramid/card-bg.png" alt="">
                        </div>
                        <h3 class="title">Data-Driven Strategy</h3>
                        <p class="desc">
                            Every decision we make is backed by comprehensive SEO insights, domain metrics, traffic analysis, and
                            performance data.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="pyramid-benefit-card">
                        <div class="shape">
                            <img src="/assets/images/marketing/pyramid/card-bg.png" alt="">
                        </div>
                        <h3 class="title">Strategic Architecture</h3>
                        <p class="desc">
                            We focus on building strong backlink ecosystems that strengthen credibility, improve search engine
                            trust, and support ranking performance.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="pyramid-benefit-card">
                        <div class="shape">
                            <img src="/assets/images/marketing/pyramid/card-bg.png" alt="">
                        </div>
                        <h3 class="title">Performance Execution</h3>
                        <p class="desc">
                            Our strategies are built around delivering measurable improvements in keyword rankings, traffic, domain
                            authority, and long-term visibility.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
