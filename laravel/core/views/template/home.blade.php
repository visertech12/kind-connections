@extends('template.layouts.frontend')
@section('content')

    <section class="banner">
        <div class="banner__inner">
            <img src="{{ asset('assets/images/shapes/banner-shape.png') }}" alt="" class="banner__shape pa-wh-100-tl-0">
            <div class="banner-elements">
                <img src="{{ asset('assets/images/thumbs/banner-tech1.png') }}" alt="" class="banner-technology wordpress">
                <img src="{{ asset('assets/images/thumbs/banner-tech2.png') }}" alt="" class="banner-technology flutter">
                <img src="{{ asset('assets/images/thumbs/banner-tech3.png') }}" alt="" class="banner-technology php">
                <img src="{{ asset('assets/images/thumbs/banner-tech4.png') }}" alt="" class="banner-technology laravel">
                <img src="{{ asset('assets/images/thumbs/banner-tech5.png') }}" alt="" class="banner-technology figma">
                <img src="{{ asset('assets/images/thumbs/banner-tech6.png') }}" alt="" class="banner-technology marketing">
                <img src="{{ asset('assets/images/shapes/banner-element1.png') }}" alt="" class="banner-element one">
                <img src="{{ asset('assets/images/shapes/banner-element2.png') }}" alt="" class="banner-element two">
                <img src="{{ asset('assets/images/shapes/banner-element3.png') }}" alt="" class="banner-element three">
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-9">


                        <div class="banner-review">
                            <div class="banner-review-thumb">
                                <img src="{{ asset('assets/images/thumbs/envato.png') }}" alt="">
                            </div>


                            <div class="banner-review-content">
                                <div class="banner-review-rating">
                                    <ul class="list">
                                        <li class="item">
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li class="item">
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li class="item">
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li class="item">
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li class="item">
                                            <i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <span class="count">4.8</span>
                                </div>
                                <span class="banner-review-text">Based on <span class="highlight-text">2000+ reviews</span></span>
                            </div>
                        </div>



                        <div class="banner-content">
                            <span class="banner-content__subtitle fs-18">Looking for a One-Stop Solution Provider?</span>
                            <h1 class="banner-content__title">360 Degree Solution For Your Digital Business</h1>
                            {{-- Service/hosting/marketing banner links hidden --}}
                            {{-- <ul class="category-list flex-center">
                                <li class="category-list__item">
                                    <a href="{{ route('service.web') }}" class="category-list__link fs-14">Web Application</a>
                                </li>
                                <li class="category-list__item">
                                    <a href="{{ route('service.app') }}" class="category-list__link fs-14">Mobile Application</a>
                                </li>
                                <li class="category-list__item">
                                    <a href="{{ route('service.uiux') }}" class="category-list__link fs-14">UI/UX Design</a>
                                </li>
                                <li class="category-list__item">
                                    <a href="{{ route('service.hosting') }}" class="category-list__link fs-14">Domain & Hosting</a>
                                </li>
                                <li class="category-list__item">
                                    <a href="{{ route('service.marketing') }}" class="category-list__link fs-14">Digital Marketing</a>
                                </li>
                                <li class="category-list__item">
                                    <a href="{{ route('service.consultancy') }}" class="category-list__link fs-14">Tech Consultancy</a>
                                </li>
                            </ul> --}}
                            <div class="banner-content__buttons flex-center">
                                <a href="{{ route('product.all') }}" class="btn btn--base">EXPLORE US</a>
                                <a href="{{ route('contact') }}" class="btn btn--base outline">CONTACT US</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="about-section pt-120 pb-60">
        <div class="container">
            <div class="row justify-content-lg-between gy-4">
                <div class="col-xxl-5 col-lg-6 col-md-10 d-lg-block d-none">
                    <div class="about-thumb">
                        <img src="{{ asset('assets/images/thumbs/about-img.png') }}" alt="" class="fit-image">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="section-heading style-left">
                            <h2 class="section-heading__title"> Building Tomorrow's <span class="shape"> Digital World</span> </h2>
                            <p class="section-heading__desc fs-16">As a leading provider of digital solutions, UnlockThemes specializes in a wide range of services to help businesses thrive in the ever-changing digital landscape.</p>
                            <div class="about-thumb mb-4 d-lg-none d-block w--md-75">
                                <img src="{{ asset('assets/images/thumbs/about-img.png') }}" alt="" class="fit-image">
                            </div>
                            <p class="section-heading__desc"> UnlockThemes offers a comprehensive range of digital services to fuel your success. From web application development and mobile application development to UI/UX design, domain and hosting services, digital marketing, and tech consultancy, we cover all aspects of your digital journey. Our team of skilled professionals combines technical expertise and industry insights to deliver exceptional results in these areas. Whether you need a powerful web application, a user-friendly mobile app, captivating UI/UX design, reliable domain and hosting solutions, effective digital marketing strategies, or expert tech consultancy, UnlockThemes is your trusted partner. </p>
                            <p class="section-heading__desc">Partner with UnlockThemes to unlock your digital potential and achieve growth, innovation, and success in today's competitive digital market.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="feature py-60">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 pe-xl-5">
                    <div class="feature-item-box flex-center">
                        <div class="feature-item-box__shapes">
                            <img src="{{ asset('assets/images/shapes/feature-shape1.png') }}" alt="" class="feature-item-box__shape one">
                            <img src="{{ asset('assets/images/shapes/feature-shape2.png') }}" alt="" class="feature-item-box__shape two">
                        </div>
                        <div class="feature-item-box__content">
                            <h2 class="feature-item-box__title">Featured Items</h2>
                            <p class="feature-item-box__desc">Discover our featured software solutions that can help you achieve your business goals.</p>
                            <a href="{{ route('product.featured') }}" class="btn btn--white btn--lg outline">VIEW ALL FEATURED ITEMS</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row gy-4">

                        @php
                            $featuredProducts = \App\Models\Product::where('status', 1)->where('featured', 1)->inrandomOrder()->take(4)->with('category')->get();
                        @endphp
                        @foreach ($featuredProducts as $product)
                            <div class="col-sm-6 col-xsm-6">
                                <div class="product-card d-flex flex-wrap">
                                    <div class="product-card__thumb">
                                        <a href="{{ route('product.details', [slug($product->name), $product->id]) }}" class="link"> <img src="{{ asset('assets/images/products/' . $product->image) }}" alt="" class="fit-image" loading="lazy"></a>
                                    </div>
                                    <div class="product-card__content d-flex flex-wrap align-content-between">
                                        <div class="product-card__inner w-100">
                                            <h6 class="product-card__title"> <a href="{{ route('product.details', [slug($product->name), $product->id]) }}" class="link border-effect">{{ $product->name }}</a></h6>
                                            <div class="product-card__rating flex-between">
                                                <ul class="rating-list">{{ getStar($product->rating) }}</ul>
                                                @if (isset(json_decode(json_encode($product->attributes), true)['Demo URL']) != null)
                                                    <a href="{{ json_decode(json_encode($product->attributes), true)['Demo URL'] }}" target="_blank" class="btn btn--gray btn--sm outline">Live Preview</a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="product-card__meta flex-between w-100">
                                            <div class="product-card__actions">
                                                <a href="{{ route('product.category', $product->category->slug) }}" class="flex-align gap-2"><span class="category-icon flex-center" data-color="#{{ $product->category->color_class }}"><i class="{{ $product->category->icon_class }}"></i></span><span class="item-category-name">{{ $product->category->short_name }}</span></a>
                                            </div>
                                            <h6 class="product-card__price">
                                                @if($product->is_free)
                                                    <span class="text-success">Free</span>
                                                @else
                                                    ${{ getAmount($product->regular_price) }}
                                                @endif
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="service-price-work bg-img" style="background-image: url({{ asset('assets/images/shapes/service-price-work-bg.png') }});">
        <div class="service-price-work__shape">
            <img src="{{ asset('assets/images/shapes/service-price-work-shape.png') }}" alt="">
        </div>
        {{-- Services section hidden --}}
        {{-- <section class="services py-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading">
                            <h2 class="section-heading__title"> Solutions for Your <span class="shape"> Digital Business </span> </h2>
                            <p class="section-heading__desc">Elevating businesses with our wide range of services including web and mobile applications, cutting-edge UI/UX design, reliable domain & hosting solutions, powerful digital marketing strategies, and expert tech consultancy.</p>
                        </div>
                    </div>
                </div>
                <div class="row service-item-wrapper gy-xsm-4">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/service-icon1.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title"> <a href="{{ route('service.web') }}" class="link">Web Application</a></h4>
                            <p class="service-item__desc">We develop bespoke web applications tailored to your business needs, ensuring seamless user experiences, better performance and optimal functionality. </p>
                            <a href="{{ route('service.web') }}" class="arrow-btn"><i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/service-icon2.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title"> <a href="{{ route('service.app') }}" class="link">Mobile Application</a></h4>
                            <p class="service-item__desc">Our mobile app development expertise brings your ideas to life, creating intuitive and engaging experiences for iOS and Android platforms. </p>
                            <a href="{{ route('service.app') }}" class="arrow-btn"><i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/service-icon3.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title"> <a href="{{ route('service.uiux') }}" class="link">UI/UX Design</a></h4>
                            <p class="service-item__desc">Our talented designers craft visually stunning interfaces, focusing on user-centric design principles to enhance usability and overall satisfaction. </p>
                            <a href="{{ route('service.uiux') }}" class="arrow-btn"><i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/service-icon4.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title"> <a href="{{ route('service.hosting') }}" class="link">Domain & Hosting</a></h4>
                            <p class="service-item__desc">We provide reliable domain registration services and secure hosting solutions, ensuring your online presence remains accessible and stable.</p>
                            <a href="{{ route('service.hosting') }}" class="arrow-btn"><i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/service-icon5.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title"> <a href="{{ route('service.marketing') }}" class="link">Digital Marketing</a></h4>
                            <p class="service-item__desc">Our strategic digital marketing campaigns drive targeted traffic, increase brand visibility, and boost conversions through SEO, social media, and more. </p>
                            <a href="{{ route('service.marketing') }}" class="arrow-btn"><i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xsm-6">
                        <div class="service-item">
                            <div class="service-item__icon">
                                <img src="{{ asset('assets/images/icons/service-icon6.svg') }}" alt="">
                            </div>
                            <h4 class="service-item__title"> <a href="{{ route('service.consultancy') }}" class="link">Tech Consultancy</a></h4>
                            <p class="service-item__desc">Leverage our tech expertise to optimize your digital business strategy, streamline operations, and stay ahead with the latest industry trends.</p>
                            <a href="{{ route('service.consultancy') }}" class="arrow-btn"><i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <section class="how-to-work-section py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading">
                            <h2 class="section-heading__title"> How We Empower You <span class="shape"> Toward Success </span> </h2>
                            <p class="section-heading__desc">A transparent journey to digital excellence. Discover our systematic approach, from envisioning your goals to delivering tailored solutions, as we collaborate to turn your vision into reality.</p>
                        </div>
                    </div>
                </div>
                <div class="how-to-work-wrapper flex-wrap">
                    <div class="how-to-work">
                        <div class="how-to-work__content">
                            <div class="how-to-work__icon"><img src="{{ asset('assets/images/icons/how-work11.svg') }}" alt=""></div>
                            <div class="how-to-work__line"></div>
                            <div class="how-to-work__border"></div>
                            <div class="how-to-work__info transition">
                                <p class="how-to-work__desc">We generate innovative ideas based on your requirements and market trends to lay the foundation for your project.</p>
                            </div>
                        </div>
                        <h5 class="how-to-work__title">Idea-Generation</h5>
                    </div>
                    <div class="how-to-work">
                        <div class="how-to-work__content">
                            <div class="how-to-work__icon"><img src="{{ asset('assets/images/icons/how-work21.svg') }}" alt=""></div>
                            <div class="how-to-work__line"></div>
                            <div class="how-to-work__border"></div>
                            <div class="how-to-work__info transition">
                                <p class="how-to-work__desc">Thorough market research enables us to gather insights and define strategies for your project's success.</p>
                            </div>
                        </div>
                        <h5 class="how-to-work__title">Research</h5>
                    </div>
                    <div class="how-to-work">
                        <div class="how-to-work__content">
                            <div class="how-to-work__icon"><img src="{{ asset('assets/images/icons/how-work31.svg') }}" alt=""></div>
                            <div class="how-to-work__line"></div>
                            <div class="how-to-work__border"></div>
                            <div class="how-to-work__info transition">
                                <p class="how-to-work__desc">Our expert designers create visually appealing interfaces and seamless user experiences for maximum engagement.</p>
                            </div>
                        </div>
                        <h5 class="how-to-work__title">UI/UX</h5>
                    </div>
                    <div class="how-to-work">
                        <div class="how-to-work__content">
                            <div class="how-to-work__icon"><img src="{{ asset('assets/images/icons/how-work41.svg') }}" alt=""></div>
                            <div class="how-to-work__line"></div>
                            <div class="how-to-work__border"></div>
                            <div class="how-to-work__info transition">
                                <p class="how-to-work__desc">Our skilled developers bring your ideas to life, crafting robust and scalable solutions.</p>
                            </div>
                        </div>
                        <h5 class="how-to-work__title">Development</h5>
                    </div>
                    <div class="how-to-work">
                        <div class="how-to-work__content">
                            <div class="how-to-work__icon"><img src="{{ asset('assets/images/icons/how-work51.svg') }}" alt=""></div>
                            <div class="how-to-work__line"></div>
                            <div class="how-to-work__border"></div>
                            <div class="how-to-work__info transition">
                                <p class="how-to-work__desc">We provide reliable hosting solutions, ensuring your website or application remains secure and accessible.</p>
                            </div>
                        </div>
                        <h5 class="how-to-work__title">Domain-Hosting</h5>
                    </div>
                    <div class="how-to-work">
                        <div class="how-to-work__content">
                            <div class="how-to-work__icon"><img src="{{ asset('assets/images/icons/how-work61.svg') }}" alt=""></div>
                            <div class="how-to-work__line"></div>
                            <div class="how-to-work__border"></div>
                            <div class="how-to-work__info transition">
                                <p class="how-to-work__desc">Our SEO strategies enhance your online visibility, driving targeted traffic and increasing organic search rankings.</p>
                            </div>
                        </div>
                        <h5 class="how-to-work__title">SEO</h5>
                    </div>
                    <div class="how-to-work">
                        <div class="how-to-work__content">
                            <div class="how-to-work__icon"><img src="{{ asset('assets/images/icons/how-work71.svg') }}" alt=""></div>
                            <div class="how-to-work__line"></div>
                            <div class="how-to-work__border"></div>
                            <div class="how-to-work__info transition">
                                <p class="how-to-work__desc">We measure success through continuous evaluation, optimization, and delivering exceptional results for your digital venture.</p>
                            </div>
                        </div>
                        <h5 class="how-to-work__title">Success</h5>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="how-to-deal-section pt-60 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading style-three">
                        <h2 class="section-heading__title"> Our Effective <span class="shape"> Work Process </span> </h2>
                        <p class="section-heading__desc">Our methodology for building strong client relationships. Discover how we foster open communication, prioritize your goals, and deliver exceptional results through our collaborative approach to working together.</p>
                    </div>
                </div>
            </div>
            <div class="how-to-deal-wrapper">
                <div class="how-to-deal flex-between">
                    <div class="how-to-deal__thumb">
                        <div class="how-to-deal__img flex-center">
                            <img src="{{ asset('assets/images/thumbs/how-to-deal1.svg') }}" alt="">
                        </div>
                    </div>
                    <div class="how-to-deal__content">
                        <h4 class="how-to-deal__title">Discuss </h4>
                        <p class="how-to-deal__desc">We initiate the process by engaging in open and thorough discussions with you. We listen attentively to understand your specific requirements, goals, and expectations.</p>
                    </div>
                </div>
                <div class="how-to-deal flex-between">
                    <div class="how-to-deal__thumb">
                        <div class="how-to-deal__img flex-center">
                            <img src="{{ asset('assets/images/thumbs/how-to-deal2.svg') }}" alt="">
                        </div>
                    </div>
                    <div class="how-to-deal__content">
                        <h4 class="how-to-deal__title">Deal </h4>
                        <p class="how-to-deal__desc">After gaining a deep understanding of your needs, We work closely with you, crafting tailored proposals and transparent deal that align with your budget and objectives.</p>
                    </div>
                </div>
                <div class="how-to-deal flex-between">
                    <div class="how-to-deal__thumb">
                        <div class="how-to-deal__img flex-center">
                            <img src="{{ asset('assets/images/thumbs/how-to-deal3.svg') }}" alt="">
                        </div>
                    </div>
                    <div class="how-to-deal__content">
                        <h4 class="how-to-deal__title">Develop </h4>
                        <p class="how-to-deal__desc">Once the deal is finalized, our expert team leverages technical prowess and industry insights to develop innovative solutions that precisely cater to your requirements, keeping you involved throughout the process.</p>
                    </div>
                </div>
                <div class="how-to-deal flex-between">
                    <div class="how-to-deal__thumb">
                        <div class="how-to-deal__img flex-center">
                            <img src="{{ asset('assets/images/thumbs/how-to-deal4.svg') }}" alt="">
                        </div>
                    </div>
                    <div class="how-to-deal__content">
                        <h4 class="how-to-deal__title">Delivery </h4>
                        <p class="how-to-deal__desc">With meticulous attention to detail, we ensure timely and successful project delivery, exceeding expectations and prioritizing your satisfaction.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our-achievement pt-120 bg--base">
        <div class="our-achievement__wave">
            <img src="{{ asset('assets/images/shapes/wave-shape.png') }}" alt="">
        </div>
        <img src="{{ asset('assets/images/shapes/our-achievement-bg.png') }}" alt="" class="our-achievement__bg pa-wh-100-tl-0">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-5 col-md-6">
                    <div class="our-achievement-content">
                        <div class="section-heading style-left">
                            <h2 class="section-heading__title text-white"> Our Remarkable <span class="shape"> Achievements </span> </h2>
                            <p class="section-heading__desc text-white"> Highlighting Our Impressive Milestones and Accomplishments. Explore our track record of delivering exceptional results, exceeding client expectations, and making a positive impact in the digital landscape.</p>
                        </div>
                        <a href="{{ route('contact') }}" class="btn btn--white outline">CONTACT US</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="achievement-thumbs-wrapper">
                        <div class="achievement-thumbs text-center">
                            <div class="achievement-thumbs__inner">
                                <div class="achievement-thumbs__img flex-center one">
                                    <img src="{{ asset('assets/images/thumbs/achievement-1.svg') }}" alt="" class="image">
                                </div>
                                <div class="achievement-thumbs__img flex-center two">
                                    <img src="{{ asset('assets/images/thumbs/achievement-2.svg') }}" alt="" class="image">
                                </div>
                                <div class="achievement-thumbs__img flex-center three">
                                    <img src="{{ asset('assets/images/thumbs/achievement-3.svg') }}" alt="" class="image">
                                </div>
                                <div class="achievement-thumbs__img flex-center four">
                                    <img src="{{ asset('assets/images/thumbs/achievement-4.svg') }}" alt="" class="image">
                                </div>
                                <div class="achievement-thumbs__img flex-center five">
                                    <img src="{{ asset('assets/images/thumbs/achievement-5.svg') }}" alt="" class="image">
                                </div>
                                <div class="achievement-thumbs__img flex-center six">
                                    <img src="{{ asset('assets/images/thumbs/achievement-6.svg') }}" alt="" class="image">
                                </div>
                                <div class="achievement-thumbs__img flex-center seven">
                                    <img src="{{ asset('assets/images/thumbs/achievement-7.svg') }}" alt="" class="image">
                                </div>
                                <div class="achievement-thumbs__img flex-center eight">
                                    <img src="{{ asset('assets/images/thumbs/achievement-8.svg') }}" alt="" class="image">
                                </div>
                                <div class="achievement-thumbs__img flex-center nine">
                                    <img src="{{ asset('assets/images/thumbs/achievement-9.svg') }}" alt="" class="image">
                                </div>
                                <div class="achievement-thumbs__img flex-center ten">
                                    <img src="{{ asset('assets/images/thumbs/achievement-10.svg') }}" alt="" class="image">
                                </div>
                                <div class="achievement-thumbs__img flex-center eleven">
                                    <img src="{{ asset('assets/images/thumbs/achievement-11.svg') }}" alt="" class="image">
                                </div>
                                <div class="achievement-thumbs__img flex-center twelve">
                                    <img src="{{ asset('assets/images/thumbs/achievement-12.svg') }}" alt="" class="image">
                                </div>
                                <div class="achievement-thumbs__img flex-center thirteen">
                                    <img src="{{ asset('assets/images/thumbs/achievement-13.svg') }}" alt="" class="image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial pt-120 pb-60">
        <div class="testimonial__thumbs">
            <img src="{{ asset('assets/images/thumbs/testimonail1.png') }}" alt="" class="testimonial-thumb one">
            <img src="{{ asset('assets/images/thumbs/testimonail2.png') }}" alt="" class="testimonial-thumb two">
            <img src="{{ asset('assets/images/thumbs/testimonail3.png') }}" alt="" class="testimonial-thumb three">
            <img src="{{ asset('assets/images/thumbs/testimonail4.png') }}" alt="" class="testimonial-thumb four">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2 class="section-heading__title"> Voices of <span class="shape"> Satisfaction </span> and Success</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <div class="testimonial-slider">
                        <div class="testimonial-item">
                            <div class="testimonial-item__box">
                                <div class="testimonial-item__quote">
                                    <img src="{{ asset('assets/images/icons/quote.svg') }}" alt="">
                                </div>
                                <div class="testimonial-item__rating">
                                    <ul class="list">
                                        <li class="item">
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li class="item">
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li class="item">
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li class="item">
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li class="item">
                                            <i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                </div>
                                <p class="testimonial-item__desc">As the author said, It has a feature sets that cannot anywhere. I checked with other scripts sources but wasn`t able to find an ultimate hyip script until I saw this. Feature rich, Faster Customer Support and overall one best quality speed in long time.</p>
                                <div class="testimonial-item__info">
                                    <h4 class="testimonial-item__name">@kailasweb</h4>
                                    <p class="testimonial-item__designation fs-18">Buyer Of Hyiplab, Envato Market</p>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item">
                            <div class="testimonial-item__box">
                                <div class="testimonial-item__quote">
                                    <img src="{{ asset('assets/images/icons/quote.svg') }}" alt="">
                                </div>
                                <div class="testimonial-item__rating">
                                    <ul class="list">
                                        <li class="item">
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li class="item">
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li class="item">
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li class="item">
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li class="item">
                                            <i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                </div>
                                <p class="testimonial-item__desc">This Is Just Amazing.Also UnlockThemes Support System Is Just Awasome.....I Am Giving Mark 10 Out Of 10.</p>
                                <div class="testimonial-item__info">
                                    <h4 class="testimonial-item__name">@shahedalamjoy1</h4>
                                    <p class="testimonial-item__designation fs-18">Buyer Of xCash, Envato Market</p>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item">
                            <div class="testimonial-item__box">
                                <div class="testimonial-item__quote">
                                    <img src="{{ asset('assets/images/icons/quote.svg') }}" alt="">
                                </div>
                                <div class="testimonial-item__rating">
                                    <ul class="list">
                                        <li class="item">
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li class="item">
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li class="item">
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li class="item">
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li class="item">
                                            <i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                </div>
                                <p class="testimonial-item__desc">A really complete script, he continues to improve it! It's really great, it answers and helps after the purchase in case of problems.</p>
                                <div class="testimonial-item__info">
                                    <h4 class="testimonial-item__name">@skaut135</h4>
                                    <p class="testimonial-item__designation fs-18">Buyer Of Hyiplab, Envato Market</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="offer pt-60 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2 class="section-heading__title"> Our Comprehensive <span class="shape">Offerings</span> </h2>
                        <p class="section-heading__desc">Discover the power of digital transformation with UnlockThemes's diverse offerings. From cutting-edge web and mobile applications to expert consultancy, we deliver custom solutions to drive your digital success. </p>
                    </div>
                </div>
            </div>
            <div class="row gy-4 justify-content-center offer-item-wrapper">
                <div class="col-xl-3 col-lg-4 col-sm-6 col-msm-6">
                    <div class="offer-item">
                        <div class="offer-item__icon">
                            <img src="{{ asset('assets/images/icons/laravel_scripts.svg') }}" alt="">
                        </div>
                        <h5 class="offer-item__title"><a href="{{ route('product.category', 'php-scripts') }}" class="link">Laravel Script</a></h5>
                        <p class="offer-item__desc">Ready-made and custom-built Laravel scripts for efficient web application development.</p>
                        <a href="{{ route('product.category', 'php-scripts') }}" class="arrow-btn"><i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 col-msm-6">
                    <div class="offer-item">
                        <div class="offer-item__icon">
                            <img src="{{ asset('assets/images/icons/mobile_app.svg') }}" alt="">
                        </div>
                        <h5 class="offer-item__title"><a href="{{ route('product.category', 'mobile-apps') }}" class="link">Mobile Apps</a></h5>
                        <p class="offer-item__desc">Ready-made and custom-built mobile apps for iOS and Android platforms.</p>
                        <a href="{{ route('product.category', 'mobile-apps') }}" class="arrow-btn"><i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 col-msm-6">
                    <div class="offer-item">
                        <div class="offer-item__icon">
                            <img src="{{ asset('assets/images/icons/ui_ux.svg') }}" alt="">
                        </div>
                        <h5 class="offer-item__title"><a href="{{ route('product.category', 'html-templates') }}" class="link">UI/UX Design</a></h5>
                        <p class="offer-item__desc">Creative and user-centric design solutions for websites and applications.</p>
                        <a href="{{ route('product.category', 'html-templates') }}" class="arrow-btn"><i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 col-msm-6">
                    <div class="offer-item">
                        <div class="offer-item__icon">
                            <img src="{{ asset('assets/images/icons/wordpress_plugins.svg') }}" alt="">
                        </div>
                        <h5 class="offer-item__title"><a href="{{ route('product.category', 'wordpress') }}" class="link">Wordpress Plugins</a></h5>
                        <p class="offer-item__desc">Ready-made and custom-built plugins to enhance functionality in WordPress websites.</p>
                        <a href="{{ route('product.category', 'wordpress') }}" class="arrow-btn"><i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div>

                {{-- Hosting & marketing offer items hidden --}}
                {{-- Shared Hosting --}}
                {{-- <div class="col-xl-3 col-lg-4 col-sm-6 col-msm-6">
                    <div class="offer-item">
                        <div class="offer-item__icon"><img src="{{ asset('assets/images/icons/shared_hosting.svg') }}" alt=""></div>
                        <h5 class="offer-item__title"><a href="{{ route('hosting.premium') }}" class="link">Shared Hosting</a></h5>
                        <p class="offer-item__desc">Affordable web hosting solutions for small to medium-sized websites.</p>
                        <a href="{{ route('hosting.premium') }}" class="arrow-btn"><i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div> --}}
                {{-- VPS Hosting --}}
                {{-- <div class="col-xl-3 col-lg-4 col-sm-6 col-msm-6">
                    <div class="offer-item">
                        <div class="offer-item__icon"><img src="{{ asset('assets/images/icons/VPS_hosting.svg') }}" alt=""></div>
                        <h5 class="offer-item__title"><a href="{{ route('hosting.vps') }}" class="link">VPS Hosting</a></h5>
                        <p class="offer-item__desc">Scalable and reliable Virtual Private Server hosting for better performance and control.</p>
                        <a href="{{ route('hosting.vps') }}" class="arrow-btn"><i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div> --}}
                {{-- Dedicated Server --}}
                {{-- <div class="col-xl-3 col-lg-4 col-sm-6 col-msm-6">
                    <div class="offer-item">
                        <div class="offer-item__icon"><img src="{{ asset('assets/images/icons/dedicated_server.svg') }}" alt=""></div>
                        <h5 class="offer-item__title"><a href="{{ route('hosting.dedicated') }}" class="link">Dedicated Server</a></h5>
                        <p class="offer-item__desc">High-performance servers exclusively dedicated to meet specific project requirements.</p>
                        <a href="{{ route('hosting.dedicated') }}" class="arrow-btn"><i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div> --}}
                {{-- SMTP Server --}}
                {{-- <div class="col-xl-3 col-lg-4 col-sm-6 col-msm-6">
                    <div class="offer-item">
                        <div class="offer-item__icon"><img src="{{ asset('assets/images/icons/SMTP_server.svg') }}" alt=""></div>
                        <h5 class="offer-item__title"><a href="{{ route('hosting.smtp') }}" class="link">SMTP Server</a></h5>
                        <p class="offer-item__desc">Secure and efficient server setup for streamlined email communication.</p>
                        <a href="{{ route('hosting.smtp') }}" class="arrow-btn"><i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div> --}}
                {{-- Backlink --}}
                {{-- <div class="col-xl-3 col-lg-4 col-sm-6 col-msm-6">
                    <div class="offer-item">
                        <div class="offer-item__icon"><img src="{{ asset('assets/images/icons/backlink.svg') }}" alt=""></div>
                        <h5 class="offer-item__title"><a href="{{ route('marketing.backlink') }}" class="link">Backlink</a></h5>
                        <p class="offer-item__desc">Quality backlink services to improve website visibility and search engine rankings.</p>
                        <a href="{{ route('marketing.backlink') }}" class="arrow-btn"><i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div> --}}
                {{-- Press Release --}}
                {{-- <div class="col-xl-3 col-lg-4 col-sm-6 col-msm-6">
                    <div class="offer-item">
                        <div class="offer-item__icon"><img src="{{ asset('assets/images/icons/press_release.svg') }}" alt=""></div>
                        <h5 class="offer-item__title"><a href="{{ route('marketing.pr') }}" class="link">Press Release</a></h5>
                        <p class="offer-item__desc">Our expert team crafts and strategically distributes press releases to generate widespread publicity and media coverage.</p>
                        <a href="{{ route('marketing.pr') }}" class="arrow-btn"><i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div> --}}
                {{-- Digital Marketing --}}
                {{-- <div class="col-xl-3 col-lg-4 col-sm-6 col-msm-6">
                    <div class="offer-item">
                        <div class="offer-item__icon"><img src="{{ asset('assets/images/icons/digital_marketing.svg') }}" alt=""></div>
                        <h5 class="offer-item__title"><a href="{{ route('marketing.advertising') }}" class="link">Digital Marketing</a></h5>
                        <p class="offer-item__desc">Comprehensive strategies to promote businesses online and increase brand visibility.</p>
                        <a href="{{ route('marketing.advertising') }}" class="arrow-btn"><i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div> --}}
                {{-- Branding --}}
                {{-- <div class="col-xl-3 col-lg-4 col-sm-6 col-msm-6">
                    <div class="offer-item">
                        <div class="offer-item__icon"><img src="{{ asset('assets/images/icons/branding.svg') }}" alt=""></div>
                        <h5 class="offer-item__title"><a href="{{ route('marketing.branding') }}" class="link">Branding</a></h5>
                        <p class="offer-item__desc">Crafting unique brand identities through logo design, messaging, and visual elements.</p>
                        <a href="{{ route('marketing.branding') }}" class="arrow-btn"><i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
@endsection
