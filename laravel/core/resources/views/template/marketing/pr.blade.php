
@php
    $seo = config('seo.marketing.pr', config('seo.default', []));
    $seodata['title']       = $seo['title'] ?? '';
    $seodata['description'] = $seo['description'] ?? '';
    $seodata['keyword']     = $seo['keyword'] ?? '';
    $seodata['image']       = $seo['image'] ?? '';
@endphp
@extends('template.layouts.frontend', ['seodata' => $seodata])
@section('content')


    <section class="press-banner">
        <div class="container">
            <div class="section-heading">
                <h1 class="section-heading__title">
                    Unlock the Full Potential of <br />
                    Press Release Distribution
                </h1>
                <p class="section-heading__desc mb-4">
                    From strategic writing to global syndication, we deliver advanced press release solutions designed to help
                    startups, growing businesses, and enterprise brands.
                </p>

                <a href="{{ route('book.meeting') }}" class="btn btn--base">Schedule a Call</a>
            </div>
            <div class="row g-4 align-items-xl-end">
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="press-stat-card counter-item">
                        <h2 class="press-stat-card__number">
                            <span class="odometer" data-odometer-final="100"></span>
                            <span>%</span>
                        </h2>
                        <p class="press-stat-card__desc">
                            Recognized and trusted by leading media outlets and news platforms worldwide.
                        </p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-3 d-none d-sm-block">
                    <div class="press-photo-card">
                        <img src="{{ asset('assets/images/marketing/press/men.png') }}" alt="Press Media" class="press-photo-card__img">
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="press-dark-card">
                        <div class="press-dark-card__chart">
                            <img src="{{ asset('assets/images/marketing/press/graph.png') }}" alt="Press Media">
                        </div>
                        <div class="press-dark-card__content">
                            <h2 class="press-dark-card__number">60+</h2>
                            <p class="press-dark-card__desc">
                                Scalable network of high authority media channels used by top brands and PR agencies.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="press-stat-card">
                        <h2 class="press-stat-card__number">4.8/5</h2>
                        <p class="press-stat-card__desc">
                            Highly rated by global clients and media professionals for quality, reach, and impact.
                        </p>
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
                        <h2 class="section-heading__title"> New Business? Need A <span class="shape"> Boost? </span> </h2>
                        <p class="section-heading__desc">Do you want your press release distributed quickly, efficiently, and to a wide audience? Are you struggling to find a competent professional to distribute your press release or promotional news? If so, you have come to the right place. We offer press release writing, ideas, and distribution services for new businesses.</p>
                    </div>
                </div>
            </div>
            <div class="row gy-4 justify-content-center">

                <div class="col-xl-3 col-lg-4 col-sm-6 col-msm-6">
                    <div class="business-plan-item flex-wrap transition">
                        <div class="business-plan-item__header">
                            <h5 class="business-plan-item__package">Basic PR</h5>
                            <h3 class="business-plan-item__price">$49</h3>
                        </div>
                        <div class="business-plan-item__body">
                            <ul class="text-list underlined">
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> 1 Press Release</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> 50+ Media Outlets</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Google News Indexed</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> 48hr Delivery</li>
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
                            <h5 class="business-plan-item__package">Standard PR</h5>
                            <h3 class="business-plan-item__price">$149</h3>
                        </div>
                        <div class="business-plan-item__body">
                            <ul class="text-list underlined">
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> 1 Press Release + Writing</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> 200+ Media Outlets</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> AP &amp; Business Wire</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> 24hr Delivery</li>
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
                            <h5 class="business-plan-item__package">Premium PR</h5>
                            <h3 class="business-plan-item__price">$299</h3>
                        </div>
                        <div class="business-plan-item__body">
                            <ul class="text-list underlined">
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> 2 Press Releases + Writing</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> 400+ Media Outlets</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> TV &amp; Radio Broadcast</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Same Day Delivery</li>
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
                            <h5 class="business-plan-item__package">Enterprise PR</h5>
                            <h3 class="business-plan-item__price">$599</h3>
                        </div>
                        <div class="business-plan-item__body">
                            <ul class="text-list underlined">
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Monthly PR Retainer</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> 500+ Media Outlets</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Dedicated PR Manager</li>
                                <li class="text-list__item"><span class="icon"><i class="far fa-check"></i></span> Guaranteed Pickup</li>
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

    <section class="press-choose-section pb-120">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5">
                    <div class="press-choose-thumb">
                        <img class="fit-image" src="{{ asset('assets/images/marketing/press/choose.png') }}" alt="Why Choose Us">
                        <div class="content">
                            <h4 class="title">Redefining the Future of Public Relations</h4>
                            <p class="desc">
                                We combine editorial expertise with advanced media distribution systems to ensure your message reaches
                                the right audience at the right time.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="press-choose-content ps-lg-4">
                        <div class="section-heading style-left">
                            <h2 class="section-heading__title">
                                Empowering Brands Through <br />
                                Strategic Media Coverage
                            </h2>
                            <p class="section-heading__desc mb-4">
                                We help businesses transform announcements into impactful stories that capture attention, build
                                credibility, and generate real media traction.
                            </p>
                        </div>
                        <div class="row gy-4">
                            <div class="col-sm-6">
                                <div class="press-choose-card">
                                    <span class="icon">
                                        <img src="{{ asset('assets/images/marketing/press/mike.png') }}" alt="">
                                    </span>

                                    <h5 class="title">Innovative Distribution</h5>
                                    <p class="desc">
                                        We provide wide reaching, scalable press release syndication across 500+ trusted news portals and
                                        media networks.
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="press-choose-card">
                                    <span class="icon">
                                        <img src="{{ asset('assets/images/marketing/press/taget.png') }}" alt="">
                                    </span>

                                    <h5 class="title">Precision Targeting</h5>
                                    <p class="desc">
                                        We ensure your press releases reach the most relevant, industry-specific publications for higher
                                        engagement and pickup rates.
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="press-choose-card">
                                    <span class="icon">
                                        <img src="{{ asset('assets/images/marketing/press/edit.png') }}" alt="">
                                    </span>

                                    <h5 class="title">Human Centered Writing</h5>
                                    <p class="desc">
                                        We craft compelling, journalist friendly narratives designed to increase readability, credibility,
                                        and media adoption.
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="press-choose-card">
                                    <span class="icon">
                                        <img src="{{ asset('assets/images/marketing/press/hand.png') }}" alt="">
                                    </span>

                                    <h5 class="title">Collaborative Partnership</h5>
                                    <p class="desc">
                                        We work closely with clients to develop consistent media exposure strategies that strengthen brand
                                        awareness and deliver measurable PR results.
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
                        <h2 class="section-heading__title"> Press Release <span class="shape"> Features </span> </h2>
                        <p class="section-heading__desc">Amplify your reach and influence with our press release service features, driving targeted exposure and building a strong online presence in the digital marketing arena.</p>
                    </div>
                </div>
            </div>
            <div class="budget-hosting-feature__inner">
                <div class="row budget-hosting-feature-wrapper service-item-wrapper gy-xsm-4">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item style-left">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/press-feature-01.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title">Click to Share</h4>
                            <p class="service-item__desc">Our distribution system delivers your story to thousands of websites, newspapers, and affiliates network. </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item style-left">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/press-feature-02.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title">Fast Performance</h4>
                            <p class="service-item__desc">To deliver better performance, we offer instant authority, a trusted network, and superfast distribution.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item style-left">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/press-feature-03.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title">Lowest Price</h4>
                            <p class="service-item__desc">We are offering PR services at the lowest price. At an affordable price, we love to ensure your satisfaction.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item style-left">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/press-feature-04.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title">Published to Major Media</h4>
                            <p class="service-item__desc">Get mass media exposure across a wide range of trusted media outlets based on your desired campaign goals.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item style-left">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/press-feature-05.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title">Boost Your Presence</h4>
                            <p class="service-item__desc">We offer more reach and greater visibility so you can get better returns on your marketing and communication.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item style-left">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/press-feature-06.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title">International Distribution </h4>
                            <p class="service-item__desc">Increment your visibility universally to help earn more attention for your news. One-click borderless Press Release.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
