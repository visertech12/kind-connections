
@php
    $seo = config('seo.marketing.branding', config('seo.default', []));
    $seodata['title']       = $seo['title'] ?? '';
    $seodata['description'] = $seo['description'] ?? '';
    $seodata['keyword']     = $seo['keyword'] ?? '';
    $seodata['image']       = $seo['image'] ?? '';
@endphp
@extends('template.layouts.frontend', ['seodata' => $seodata])
@section('content')


    <section class="branding-banner bg-img" style="background-image: url({{ asset('assets/images/marketing/seo/banner-bg.png') }})">
        <div class="branding-banner-color-plate">
            <img src="{{ asset('assets/images/marketing/brand/color-plete.png') }}" alt="">
        </div>
        <div class="branding-banner-color-plate-show">
            <img src="{{ asset('assets/images/marketing/brand/color-show.png') }}" alt="">
        </div>
        <div class="branding-banner-color-typography">
            <img src="{{ asset('assets/images/marketing/brand/typography.png') }}" alt="">
        </div>
        <div class="branding-banner-color-typography-show">
            <img src="{{ asset('assets/images/marketing/brand/typography-view.png') }}" alt="">
        </div>

        <div class="container">
            <div class="row justify-content-center g-4">
                <div class="col-xxl-8 col-xl-6 col-12 text-center">
                    <div class="py-120">
                        <div class="bb-identity-badge">
                            <span class="bb-dot"></span>
                            Brand Identity Kit
                        </div>
                        <div class="bb-float-pill bb-float-pill--rot-neg6">
                            <span class="bb-dot"></span>
                            <span>Base unit</span>
                            <strong>8px</strong>
                        </div>
                        <h1 class="bb-heading">
                            We Don&rsquo;t Make Logos.<br />
                            <span class="text--base d-inline">We Build Legends.</span>
                        </h1>
                        <p class="bb-desc">
                            Your brand is more than a logo. It is every color, font, and
                            word someone associates with you. We design each detail with
                            intent so your story shows up clear, consistent, and
                            unforgettable everywhere it appears.
                        </p>
                        <div class="bb-mobile-pills d-xl-none">
                            <div class="bb-float-pill">
                                <span class="bb-dot"></span>
                                <span>Base unit</span>
                                <strong>8px</strong>
                            </div>
                            <div class="bb-float-pill">
                                <span>Motion</span>
                                <strong>240ms &middot; ease-out</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4 d-none d-xl-block">
                <div class="bb-float-pill bb-float-pill--motion d-inline-flex">
                    <span>Motion</span>
                    <strong>240ms &middot; ease-out</strong>
                </div>
            </div>
        </div>
        <div class="bb-bar d-none d-lg-block">
            <div class="container">
                <div class="bb-bar__inner">
                    <span class="bb-bar__text">Brand Guidelines &middot; Unlock Themes LLC</span>
                    <div class="bb-bar__nav">
                        <span>COLOR</span>
                        <span class="bb-bar__dot"></span>
                        <span>TYPE</span>
                        <span class="bb-bar__dot"></span>
                        <span>MARK</span>
                        <span class="bb-bar__dot"></span>
                        <span>VOICE</span>
                    </div>
                    <span class="bb-bar__text">05 / 2026 &middot; v2.4</span>
                </div>
            </div>
        </div>
    </section>

    <section class="business-plan my-120" id="pricing">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2 class="section-heading__title"> Let's Boost Your Brand By <span class="shape"> Creative Graphics </span> </h2>
                        <p class="section-heading__desc">Great branding is what makes your business memorable. From logos and color systems to typography and tone of voice, we craft creative, market-oriented designs that get your brand noticed and set you apart from the competition.</p>
                    </div>
                </div>
            </div>
            <div class="row gy-4 justify-content-center">

                <div class="col-xl-3 col-lg-4 col-sm-6 col-msm-6">
                    <div class="business-plan-item flex-wrap transition">
                        <div class="business-plan-item__header">
                            <h5 class="business-plan-item__package">Logo Design</h5>
                            <h3 class="business-plan-item__price">$149</h3>
                        </div>
                        <div class="business-plan-item__body">
                            <ul class="text-list underlined">
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> 3 Custom Logo Concepts</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Unlimited Revisions</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> High-Res Files (PNG, JPG)</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Vector Files (AI, EPS)</li>
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
                            <h5 class="business-plan-item__package">Brand Identity</h5>
                            <h3 class="business-plan-item__price">$349</h3>
                        </div>
                        <div class="business-plan-item__body">
                            <ul class="text-list underlined">
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Logo Design Package</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Color Palette &amp; Typography</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Brand Guidelines PDF</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Business Card Design</li>
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
                            <h5 class="business-plan-item__package">Brand Plus</h5>
                            <h3 class="business-plan-item__price">$599</h3>
                        </div>
                        <div class="business-plan-item__body">
                            <ul class="text-list underlined">
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Brand Identity Package</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Social Media Kit</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Letterhead &amp; Envelope</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Email Signature Design</li>
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
                            <h5 class="business-plan-item__package">Full Agency Brand</h5>
                            <h3 class="business-plan-item__price">$1,299</h3>
                        </div>
                        <div class="business-plan-item__body">
                            <ul class="text-list underlined">
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Complete Brand Plus</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Presentation Template</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Merch/Apparel Design</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Dedicated Design Team</li>
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

    <section class="brand-why-choose my-120">
        <div class="container">
            <div class="section-heading">
                <h2 class="section-heading__title">
                    Everything Your Brand Needs to
                    <br />
                    <span class="shape"> Stand Out Smarter </span>
                </h2>
                <p class="section-heading__desc">
                    From brand identity to visual storytelling, our branding services
                    are built to keep your business memorable, consistent, and moving
                    forward together.
                </p>
            </div>

            <div class="brand-why-choose-cards">
                <div class="row g-4">
                    <div class="col-lg-4 order-lg-1">
                        <div class="bwc-card bwc-card--light">
                            <div class="bwc-card__body">
                                <h3 class="bwc-card__title bwc-card__title--dark">
                                    Brand Strategy &amp; Positioning
                                </h3>
                                <p class="bwc-card__desc bwc-card__desc--dark">
                                    Define your unique market position, core messaging, and
                                    ideal audience with a clear, actionable strategy that
                                    turns brand into measurable growth.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 order-lg-0">
                        <div class="bwc-card bwc-card--image">
                            <img src="{{ asset('assets/images/marketing/brand/building.png') }}" alt="Brand Identity Design" class="bwc-card__bg-img">
                            <div class="bwc-card__gradient"></div>
                            <div class="bwc-card__body">
                                <h3 class="bwc-card__title">Brand Identity Design</h3>
                                <p class="bwc-card__desc">
                                    Craft a powerful visual identity that captures your
                                    brand's voice and resonates everywhere your audience
                                    finds you.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 order-lg-2">
                        <div class="bwc-card bwc-card--light">
                            <div class="bwc-card__body">
                                <h3 class="bwc-card__title bwc-card__title--dark">
                                    Logo &amp; Visual System
                                </h3>
                                <p class="bwc-card__desc bwc-card__desc--dark">
                                    Build a timeless logo and a complete visual system with
                                    colors, typography, iconography, and guidelines that keep
                                    your team consistent on every channel.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 order-lg-3">
                        <div class="bwc-card bwc-card--dark">
                            <div class="bwc-card__body">
                                <h3 class="bwc-card__title">Brand Campaign Management</h3>
                                <p class="bwc-card__desc">
                                    Plan, launch, and measure brand campaigns from a single
                                    dashboard that surfaces what is resonating and what needs
                                    attention next.
                                </p>
                                <a href="#pricing" class="bwc-card__cta">
                                    Start Your Branding Journey
                                    <i class="far fa-arrow-right"></i>
                                </a>
                            </div>
                            <div class="bwc-card__person">
                                <img src="{{ asset('assets/images/marketing/brand/women.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="brand-capabilities py-120 bg-img" style="background-image: url({{ asset('assets/images/marketing/brand/brand-capabilities-bg.png') }})">

        <div class="brand-capabilities-thumb">
            <img class="fit-image" src="{{ asset('assets/images/marketing/brand/brand-capabilities.png') }}" alt="">
        </div>

        <div class="container">
            <div class="row align-items-center justify-content-end">
                <div class="col-lg-6">
                    <div class="brand-cap-content">
                        <h2 class="brand-cap-title">
                            Built for Every Brand, <br />
                            Ready for Any Market
                        </h2>
                        <p class="brand-cap-desc">
                            From local startups to global campaigns, our branding services
                            adapt to the way your business works, no matter the industry
                            or scale.
                        </p>
                    </div>
                    <div class="row g-4">
                        <div class="col-sm-6">
                            <div class="bfc-card">
                                <h5 class="bfc-card__title">Brand Identity Design</h5>
                                <p class="bfc-card__desc">
                                    Create, refine, and launch a complete brand identity
                                    system that keeps your business consistent and compelling.
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="bfc-card">
                                <h5 class="bfc-card__title">Multi-Channel Brand Rollout</h5>
                                <p class="bfc-card__desc">
                                    Deploy your brand seamlessly across digital, print, and
                                    social platforms with total consistency.
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="bfc-card">
                                <h5 class="bfc-card__title">
                                    Brand Performance Monitoring
                                </h5>
                                <p class="bfc-card__desc">
                                    Track brand health, audience sentiment, and campaign
                                    results with real-time performance dashboards.
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="bfc-card">
                                <h5 class="bfc-card__title">Creative Asset Workflow</h5>
                                <p class="bfc-card__desc">
                                    Streamline creative production with structured workflows
                                    that keep your brand assets organized and on-brand.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="brand-process my-120">
        <div class="container">
            <div class="brand-process-wrapper">
                <div class="brand-process-hero">
                    <img src="{{ asset('assets/images/marketing/brand/office-bg.png') }}" alt="Brand Process" class="brand-process-hero__img">
                </div>

                <div class="brand-process-cards">
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6">
                            <div class="bp-card">
                                <h5 class="bp-card__num mb-0">01</h5>
                                <div class="bp-card__content">
                                    <h5 class="bp-card__title">
                                        Stay Aligned, Always<br />Keep your brand consistent
                                        everywhere
                                    </h5>
                                    <p class="bp-card__desc">
                                        Clear brand guidelines and shared messaging keep every
                                        touchpoint cohesive, so your brand grows with purpose
                                        and instant recognition.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="bp-card">
                                <h5 class="bp-card__num mb-0">02</h5>
                                <div class="bp-card__content">
                                    <h5 class="bp-card__title">
                                        Boost Brand Impact<br />Ship faster with less creative
                                        friction
                                    </h5>
                                    <p class="bp-card__desc">
                                        Automated asset management and creative
                                        workflows free your team to focus on the work that
                                        actually builds your brand.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="bp-card">
                                <h5 class="bp-card__num mb-0">03</h5>
                                <div class="bp-card__content">
                                    <h5 class="bp-card__title">
                                        Make Smarter, Data-Backed Decisions<br />Act on
                                        real-time brand insights
                                    </h5>
                                    <p class="bp-card__desc">
                                        Live brand tracking and campaign analytics guide every
                                        marketing decision with data you can actually trust.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="budget-hosting-feature pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2 class="section-heading__title"> Branding <span class="shape"> Features </span> </h2>
                        <p class="section-heading__desc">Utilize our branding service features to create a memorable and cohesive brand experience that drives success in the digital marketing landscape.</p>
                    </div>
                </div>
            </div>
            <div class="budget-hosting-feature__inner">
                <div class="row budget-hosting-feature-wrapper service-item-wrapper gy-xsm-4">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item style-left">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/branding-01.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title">Brainstorming</h4>
                            <p class="service-item__desc">We use thorough market research and create innovative designs to help your brand develop or revamp your brand identity.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item style-left">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/branding-02.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title">Creative & Unique</h4>
                            <p class="service-item__desc">We are intact in our creative thoughts and unique design to make a perfect and meaningful market-oriented brand.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item style-left">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/branding-03.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title">Memorable</h4>
                            <p class="service-item__desc">We create attractive digital properties that are easily memorable. We create a hard-to-forget brand identity.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item style-left">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/branding-04.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title">Rebranding</h4>
                            <p class="service-item__desc">We also help businesses to create new brands or sister concerns to avoid past bad reputations, bad reviews, or a narrow brand vibe.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item style-left">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/branding-05.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title">Market Research</h4>
                            <p class="service-item__desc">We do a market study. We choose unique icons, fonts, and colors. We design unique ones you have never seen before.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item style-left">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/branding-06.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title">Copyright FREE </h4>
                            <p class="service-item__desc">We create brand images that are completely copyright free. You never face any copyright issues when you are with us.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
