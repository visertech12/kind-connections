@extends('template.layouts.frontend')
@section('content')
  <section class="consult-banner my-120">
        <div class="container">
            <div class="consult-banner__head">
                <div class="row gy-4 align-items-center mb-5">
                    <div class="col-xl-8 col-lg-7">
                        <h1 class="consult-banner__title wow fadeInUp" data-wow-delay="0.2s">
                            Accelerate Your Business with
                            <span class="text--base">
                                Strategic Tech Consulting
                            </span>
                        </h1>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="consult-tags wow fadeInUp" data-wow-delay="0.3s">
                            <div class="consult-tags__row">
                                <span class="consult-tag-pill">Digital Transformation</span>
                                <span class="consult-tag-pill">Tech Auditing</span>
                                <span class="consult-tag-pill">Architecture Planning</span>
                                <span class="consult-tag-pill">Innovation</span>
                                <span class="consult-tag-pill">System Evaluation</span>
                                <span class="consult-tag-pill">AI Integration</span>
                            </div>
                        </div>
                        <hr class="consult-banner__divider wow fadeInUp" data-wow-delay="0.4s">
                        <p class="consult-banner__years wow fadeInUp" data-wow-delay="0.5s">
                            Over 10+ Years of Proven Digital Expertise
                        </p>
                    </div>
                </div>
            </div>
            <div class="row gy-4 align-items-end">
                <div class="col-lg-7 col-xl-8">
                    <div class="consult-visual wow fadeInUp" data-wow-delay="0.4s">
                        <img class="consult-visual__shape" src="/assets/images/service/consultancy/banner-shape.png" alt="Tech Consultant">
                        <div class="consult-stat counter-item">
                            <div class="consult-stat__num">
                                <span class="odometer" data-odometer-final="32000"></span>
                                +
                            </div>
                            <p class="consult-stat__text">
                                Projects Delivered with Precision
                            </p>
                        </div>
                        <div class="consult-visual-card">
                            <div class="consult-visual-card__wrapper">
                                <img class="consult-visual-card__bg" src="/assets/images/service/consultancy/banner-card-shape.png" alt="">
                                <a class="consult-visual-card__arrow" href="/book-a-meeting">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                                <div class="consult-visual-card__content">
                                    <p class="consult-visual-card__title">100%</p>
                                    <span class="consult-visual-card__text">Success</span>
                                </div>
                            </div>
                        </div>
                        <img class="consult-visual__thumb" src="/assets/images/service/consultancy/banner-thumb.png" alt="Tech Consultant">
                    </div>
                </div>
                <div class="col-lg-5 col-xl-4 d-none d-lg-block">
                    <div class="consult-chart-card wow fadeInUp" data-wow-delay="0.4s">
                        <img src="/assets/images/service/consultancy/graph.png" alt="Revenue by Service" class="fit-image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="consult-choose-section my-120">
        <div class="container">
            <div class="section-heading">
                <h2 class="section-heading__title wow fadeInUp" data-wow-delay="0.2s">
                    Technology That Converts
                    <span class="shape"> Into Revenue </span>
                </h2>
                <p class="section-heading__desc wow fadeInUp" data-wow-delay="0.3s">
                    We evaluate your entire digital ecosystem, identify inefficiencies that drive up expenses and limit
                    performance, and replace them with streamlined, scalable systems that enhance profitability and improve overall
                    operational efficiency.
                </p>
            </div>

            <div class="row gy-4">
                <div class="col-xl-7">
                    <div class="consult-choose-thumb wow fadeInUp" data-wow-delay="0.4s">
                        <img class="thumb fit-image" src="/assets/images/service/consultancy/choose-thumb.png" alt="">
                        <img class="chart" src="/assets/images/service/consultancy/choose-thumb-chart.png" alt="">
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="consult-choose-wrapper">
                        <div class="consult-choose-card card--1 counter-item wow fadeInUp" data-wow-delay="0.5s">
                            <h3 class="consult-choose-card__title">
                                <span class="odometer" data-odometer-final="200"></span>
                                k+
                            </h3>
                            <h4 class="consult-choose-card__desc">Clients Save Through Our Expertise</h4>
                        </div>
                        <div class="consult-choose-card card--2 counter-item wow fadeInUp" data-wow-delay="0.6s">
                            <h3 class="consult-choose-card__title">
                                <span class="odometer" data-odometer-final="25000"></span>
                                +
                            </h3>
                            <h4 class="consult-choose-card__desc">Global clients supported and served</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="consult-solution my-120">
        <div class="container">
            <div class="section-heading">
                <h2 class="section-heading__title wow fadeInUp" data-wow-delay="0.2s">
                    Fast, Scalable And Reliable
                    <span class="shape">Consultancy Solutions</span>
                </h2>
            </div>

            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="uix-solution-card card--1 wow fadeInLeft" data-wow-delay="0.3s">
                        <div class="uix-solution-card__content">
                            <h3 class="uix-solution-card__title">For Emerging Startups</h3>
                            <p class="uix-solution-card__desc">
                                Got a new idea or building your first digital product? We help startups choose the right tech stack,
                                architecture, and strategy to avoid costly mistakes.
                            </p>
                            <a href="/book-a-meeting" class="btn btn--sm btn--base">
                                Startup Consulting
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right-icon lucide-move-right">
                                    <path d="M18 8L22 12L18 16" />
                                    <path d="M2 12H22" />
                                </svg>
                            </a>
                        </div>
                        <div class="uix-solution-card__thumb">
                            <img class="img" src="/assets/images/service/uiux/solution-thumb-1.png" alt="">
                            <img class="icon icon-1" src="/assets/images/service/uiux/solution-avatar-1.png" alt="">
                            <img class="icon icon-2" src="/assets/images/service/uiux/solution-avatar-2.png" alt="">
                            <img class="icon icon-3" src="/assets/images/service/uiux/solution-avatar-3.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="uix-solution-card card--2 wow fadeInRight" data-wow-delay="0.4s">
                        <div class="uix-solution-card__content">
                            <h3 class="uix-solution-card__title">For Established Enterprises</h3>
                            <p class="uix-solution-card__desc">
                                Working with legacy systems or scaling across business units? We modernize your infrastructure to
                                enterprise grade solutions that boost performance.
                            </p>
                            <a href="/book-a-meeting" class="btn btn--sm btn--base">
                                Enterprise Consulting
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right-icon lucide-move-right">
                                    <path d="M18 8L22 12L18 16" />
                                    <path d="M2 12H22" />
                                </svg>
                            </a>
                        </div>
                        <div class="uix-solution-card__thumb">
                            <img class="img" src="/assets/images/service/uiux/solution-thumb-2.png" alt="">
                            <div class="uix-solution-card-info one">
                                <div class="uix-solution-card-info__body">
                                    <span class="uix-solution-card-info__label">London office</span>
                                    <h6 class="uix-solution-card-info__title">620,500 GBP</h6>
                                </div>
                                <div class="uix-solution-card-info__footer">
                                    <img class="uix-solution-card-info__flag" src="/assets/images/service/uiux/flag-1.png" alt="">
                                </div>
                            </div>
                            <div class="uix-solution-card-info two">
                                <div class="uix-solution-card-info__body">
                                    <span class="uix-solution-card-info__label">New York office</span>
                                    <h6 class="uix-solution-card-info__title">840,000 USD</h6>
                                </div>
                                <div class="uix-solution-card-info__footer">
                                    <img class="uix-solution-card-info__flag" src="/assets/images/service/uiux/flag-2.png" alt="">
                                </div>
                            </div>
                            <div class="uix-solution-card-info three">
                                <div class="uix-solution-card-info__body">
                                    <span class="uix-solution-card-info__label">Canada office</span>
                                    <h6 class="uix-solution-card-info__title">1,240,000 USD</h6>
                                </div>
                                <div class="uix-solution-card-info__footer">
                                    <img class="uix-solution-card-info__flag" src="/assets/images/service/uiux/flag-3.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="consult-cta my-120">
        <div class="container">
            <div class="consult-cta-card">
                <div class="consult-cta-card__main">
                    <div class="consult-cta-card__content">
                        <h2 class="consult-cta-card__title wow fadeInUp" data-wow-delay="0.2s">
                            Get a <span class="text--base">Complimentary</span> First Technology Consultation
                        </h2>
                        <p class="consult-cta-card__desc wow fadeInUp" data-wow-delay="0.25s">
                            Start with a no-cost, in-depth technology assessment designed to identify gaps, opportunities, and
                            optimization areas within your current system. We provide actionable insights and a clear roadmap to
                            help you move forward with confidence.
                        </p>
                        <div class=" wow fadeInUp" data-wow-delay="0.3s">
                            <a class="btn btn--base" href="/book-a-meeting">
                                Book a Free Consultation
                            </a>
                        </div>
                    </div>
                </div>
                <div class="wow fadeInUp" data-wow-delay="0.4s">
                    <img class="consult-cta-card__thumb " src="/assets/images/service/consultancy/cta-thumb.png" alt="">
                </div>
            </div>
        </div>
    </section>
@endsection
