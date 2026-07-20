
@php
    $seo = config('seo.marketing.advertising', config('seo.default', []));
    $seodata['title']       = $seo['title'] ?? '';
    $seodata['description'] = $seo['description'] ?? '';
    $seodata['keyword']     = $seo['keyword'] ?? '';
    $seodata['image']       = $seo['image'] ?? '';
@endphp
@extends('template.layouts.frontend', ['seodata' => $seodata])
@section('content')


    <section class="advertise-banner bg-img" style="background-image: url({{ asset('assets/images/marketing/advertise/bg.png') }})">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9">
                    <div class="advertise-banner__header text-center">
                        <h1 class="advertise-banner__title mb-3">
                            Digital Ads That
                            <span class="text--base d-inline">Actually Convert</span>
                        </h1>
                        <p class="advertise-banner__desc">
                            Stop burning budget on ads that go nowhere. We design, launch,
                            and optimize high-performance ad campaigns across Google,
                            Meta, TikTok, and LinkedIn engineered for clicks, leads, and
                            real revenue.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row align-items-end justify-content-center">
                <div class="col-xl-3 col-lg-3">
                    <div class="advertise-banner__side-card left-side">
                        <img src="{{ asset('assets/images/marketing/advertise/insight.png') }}" alt="Insights Overview" class="img-fluid">
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6">
                    <div class="advertise-banner__center">
                        <img src="{{ asset('assets/images/marketing/advertise/banner.png') }}" alt="Digital Advertising" class="advertise-banner__person img-fluid">
                        <div class="advertise-banner__followers">
                            <img src="{{ asset('assets/images/marketing/advertise/follower.png') }}" alt="Followers" class="img-fluid">
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3">
                    <div class="advertise-banner__side-card right-side">
                        <img src="{{ asset('assets/images/marketing/advertise/post-insight.png') }}" alt="Post Insight" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="business-plan my-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2 class="section-heading__title"> Let's Boost Your Business <span class="shape"> Online Today </span> </h2>
                        <p class="section-heading__desc">Billions of people use the internet every day, and that number keeps growing. They come from every walk of life, from day laborers and job holders to business owners and decision-makers. If you are a manufacturer, distributor, or seller, online advertising is a powerful, modern way to market your products and services.</p>
                    </div>
                </div>
            </div>
            <div class="row gy-4 justify-content-center">

                <div class="col-xl-3 col-lg-4 col-sm-6 col-msm-6">
                    <div class="business-plan-item flex-wrap transition">
                        <div class="business-plan-item__header">
                            <h5 class="business-plan-item__package">Basic Ads</h5>
                            <h3 class="business-plan-item__price">$299</h3>
                        </div>
                        <div class="business-plan-item__body">
                            <ul class="text-list underlined">
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Up to $1k Ad Spend</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> 1 Ad Platform (FB/Google)</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Ad Copy &amp; Design</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Monthly Performance Report</li>
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
                            <h5 class="business-plan-item__package">Pro Ads</h5>
                            <h3 class="business-plan-item__price">$599</h3>
                        </div>
                        <div class="business-plan-item__body">
                            <ul class="text-list underlined">
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Up to $5k Ad Spend</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> 2 Ad Platforms</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> A/B Testing &amp; Optimization</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Retargeting Campaigns</li>
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
                            <h5 class="business-plan-item__package">Advanced Ads</h5>
                            <h3 class="business-plan-item__price">$999</h3>
                        </div>
                        <div class="business-plan-item__body">
                            <ul class="text-list underlined">
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Up to $15k Ad Spend</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> 3+ Ad Platforms</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Landing Page Optimization</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Bi-Weekly Meetings</li>
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
                            <h5 class="business-plan-item__package">Enterprise Ads</h5>
                            <h3 class="business-plan-item__price">$1,999</h3>
                        </div>
                        <div class="business-plan-item__body">
                            <ul class="text-list underlined">
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Unlimited Ad Spend</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Omnichannel Strategy</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Advanced Conversion Tracking</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Dedicated Account Manager</li>
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

    <section class="advertise-cta my-120">
        <div class="container-fluid">
            <div class="advertise-cta-thumb">
                <img src="{{ asset('assets/images/marketing/advertise/rersult.png') }}" alt="">
            </div>

            <div class="advertise-cta-content">
                <div class="row">
                    <div class="col-xl-4 col-md-5">
                        <h2 class="title">FIND OUTSTANDING AD RESULTS.</h2>
                    </div>
                    <div class="col-xl-8 col-md-7">
                        <p class="desc">
                            From precision targeting to creative that converts, our
                            data-driven campaigns are engineered to deliver measurable
                            growth. We turn ad spend into predictable pipeline, more
                            qualified leads, higher ROAS, and scalable revenue you can
                            count on every quarter.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="advertise-choose-section my-120">
        <div class="container">
            <div class="section-heading">
                <h2 class="section-heading__title">
                    Why Brands
                    <span class="shape"> Trust Us </span>
                </h2>
                <p class="section-heading__desc">
                    We blend sharp strategy, creative excellence, and proven
                    technology to deliver advertising that doesn't just look good.
                    It performs. Here's what makes our approach different.
                </p>
            </div>
            <div class="row gy-4 justify-content-between align-items-center">
                <div class="col-lg-6 col-xxl-5 d-none d-lg-block">
                    <div class="advertise-choose-thumb">
                        <img src="{{ asset('assets/images/marketing/advertise/choose-us.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="advertise-choose-item">
                        <div class="icon">
                            <img src="{{ asset('assets/images/marketing/advertise/mike.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h5 class="title">End-to-End Campaign Execution</h5>
                            <p class="desc">
                                From kickoff to scale, our team handles every detail:
                                strategy, creative, launch, and optimization. Share your
                                goals once and watch your campaigns come to life with full
                                transparency and real-time performance reporting.
                            </p>
                        </div>
                    </div>
                    <div class="advertise-choose-item active">
                        <div class="icon">
                            <img src="{{ asset('assets/images/marketing/advertise/target.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h5 class="title">Data-Driven Audience Targeting</h5>
                            <p class="desc">
                                We reach the right people at the right moment. Using
                                advanced audience modeling, behavioral data, and platform
                                intelligence, we put your message in front of buyers who
                                are most likely to convert, not just impressions that
                                inflate vanity metrics.
                            </p>
                        </div>
                    </div>
                    <div class="advertise-choose-item">
                        <div class="icon">
                            <img src="{{ asset('assets/images/marketing/advertise/badge.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h5 class="title">Transparent & Results-Focused</h5>
                            <p class="desc">
                                Your budget, brand, and data are safe with us. We follow
                                strict platform compliance, transparent billing, and proven
                                optimization frameworks, so every dollar works harder and
                                every campaign delivers reliable, repeatable results.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="advertise-choose-slider">
                <div class="adv-testimonial-outer">
                    <div class="row g-0 align-items-stretch">
                        <div class="col-lg-4 col-md-12">
                            <div class="adv-testimonial-left">
                                <h2 class="adv-testimonial-heading">
                                    What Our <br />
                                    Customers Say
                                </h2>
                                <div class="adv-testimonial-nav">
                                    <button class="adv-nav-btn adv-slider-prev" aria-label="Previous">
                                        <i class="far fa-arrow-left"></i>
                                    </button>
                                    <button class="adv-nav-btn adv-slider-next" aria-label="Next">
                                        <i class="far fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <div class="adv-testimonial-slider">
                                <div class="adv-testimonial-item">
                                    <p class="adv-testimonial-text">
                                        <span class="adv-quote-icon"><i class="fas fa-quote-left"></i></span>
                                        I recently launched a Google Ads campaign through their
                                        team, and the results truly impressed me. Our ROAS
                                        exceeded expectations in every way. Communication was
                                        smooth, and the campaign quality
                                        was outstanding. I highly recommend this agency to
                                        anyone looking for top-notch advertising skills and
                                        professionalism.
                                    </p>
                                    <div class="adv-testimonial-footer">
                                        <div class="adv-author">
                                            <div class="adv-author-avatar">
                                                <img src="{{ asset('assets/images/marketing/advertise/avatars/avatar-13.jpg') }}" alt="Thomas Karlow">
                                            </div>
                                            <div class="adv-author-info">
                                                <h6 class="adv-author-name">Thomas Karlow</h6>
                                                <span class="adv-author-role">Chief Executive Officer</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="adv-testimonial-item">
                                    <p class="adv-testimonial-text">
                                        <span class="adv-quote-icon"><i class="fas fa-quote-left"></i></span>
                                        Working with this team transformed our digital marketing
                                        strategy completely. The Meta ad campaigns they built
                                        for us generated over 3x our previous conversion rate.
                                        Their data-driven approach and constant optimization
                                        make them stand out from every other agency we've worked
                                        with before.
                                    </p>
                                    <div class="adv-testimonial-footer">
                                        <div class="adv-author">
                                            <div class="adv-author-avatar">
                                                <img src="{{ asset('assets/images/marketing/advertise/avatars/avatar-5.jpg') }}" alt="Sarah Mitchell">
                                            </div>
                                            <div class="adv-author-info">
                                                <h6 class="adv-author-name">Sarah Mitchell</h6>
                                                <span class="adv-author-role">Chief Marketing Officer</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="adv-testimonial-item">
                                    <p class="adv-testimonial-text">
                                        <span class="adv-quote-icon"><i class="fas fa-quote-left"></i></span>
                                        We struggled for months trying to scale our TikTok ads
                                        in-house with little to show for it. Within six weeks
                                        of partnering with this team, our cost per acquisition
                                        dropped by 47% and monthly revenue from paid social
                                        nearly doubled. They genuinely understand performance
                                        marketing.
                                    </p>
                                    <div class="adv-testimonial-footer">
                                        <div class="adv-author">
                                            <div class="adv-author-avatar">
                                                <img src="{{ asset('assets/images/marketing/advertise/avatars/avatar-33.jpg') }}" alt="Daniel Reyes">
                                            </div>
                                            <div class="adv-author-info">
                                                <h6 class="adv-author-name">Daniel Reyes</h6>
                                                <span class="adv-author-role">Founder</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="adv-testimonial-item">
                                    <p class="adv-testimonial-text">
                                        <span class="adv-quote-icon"><i class="fas fa-quote-left"></i></span>
                                        What impressed me most was their transparency. Weekly
                                        performance reports, clear next steps, and honest
                                        conversations when something wasn't working. Our
                                        LinkedIn lead gen campaigns now bring in qualified B2B
                                        prospects on autopilot. Easily the best ROI we've seen
                                        from any marketing partner.
                                    </p>
                                    <div class="adv-testimonial-footer">
                                        <div class="adv-author">
                                            <div class="adv-author-avatar">
                                                <img src="{{ asset('assets/images/marketing/advertise/avatars/avatar-47.jpg') }}" alt="Priya Sharma">
                                            </div>
                                            <div class="adv-author-info">
                                                <h6 class="adv-author-name">Priya Sharma</h6>
                                                <span class="adv-author-role">Head of Growth</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="adv-testimonial-item">
                                    <p class="adv-testimonial-text">
                                        <span class="adv-quote-icon"><i class="fas fa-quote-left"></i></span>
                                        I've worked with five agencies over the past decade and
                                        none came close to this level of strategic thinking.
                                        They didn't just run our ads, they restructured our
                                        funnel, rewrote our creative, and helped us launch in
                                        two new markets profitably within a quarter. Worth
                                        every dollar.
                                    </p>
                                    <div class="adv-testimonial-footer">
                                        <div class="adv-author">
                                            <div class="adv-author-avatar">
                                                <img src="{{ asset('assets/images/marketing/advertise/avatars/avatar-60.jpg') }}" alt="Marcus Chen">
                                            </div>
                                            <div class="adv-author-info">
                                                <h6 class="adv-author-name">Marcus Chen</h6>
                                                <span class="adv-author-role">VP of Marketing</span>
                                            </div>
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

    <section class="budget-hosting-feature pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2 class="section-heading__title"> Advertising <span class="shape"> Features </span> </h2>
                        <p class="section-heading__desc">Unleash the power of our advertising service features, targeting, engaging, and converting your audience with precision to drive remarkable growth in the digital marketing landscape.</p>
                    </div>
                </div>
            </div>
            <div class="budget-hosting-feature__inner">
                <div class="row budget-hosting-feature-wrapper service-item-wrapper gy-xsm-4">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item style-left">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/advertise-01.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title">Low Cost</h4>
                            <p class="service-item__desc">It is a low-cost way to reach out to a large audience. Marketing or brand promotion costs a lot on other channels.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item style-left">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/advertise-02.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title">Implementation</h4>
                            <p class="service-item__desc">Once the planning is done our expert team starts to implement the project accordingly and then the optimization.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item style-left">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/advertise-03.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title">Marketing Strategy</h4>
                            <p class="service-item__desc">Target desired audience by gender, age, location, and keywords. Use a professional or engaging ad description.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item style-left">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/advertise-04.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title">Brand Promotion</h4>
                            <p class="service-item__desc">Branding is the most important part of the business. Through online advertisements, we try to promote your brand.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item style-left">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/advertise-05.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title">Website Traffic</h4>
                            <p class="service-item__desc">To build your own online business or brand, you can boost your post to drive traffic to your website and maximize profit.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item style-left">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/advertise-06.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title">Easy Retargeting</h4>
                            <p class="service-item__desc">Retargeting is one of the latest technologies that helps bring back customers who already know your business.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
