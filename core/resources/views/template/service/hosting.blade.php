@extends('template.layouts.frontend')
@section('content')
          
    <section class="dh-banner bg-img" style="background-image: url('/assets/images/service/domain-hosting/banner-bg.png');">
        <div class="container">
            <div class="dh-banner__content">
                <h1 class="dh-banner__title wow fadeInDown" data-wow-delay="0.3s">
                    Fast, Secure & Reliable Web Hosting for Your Business
                </h1>

                <div class="dh-banner-cards">
                    <div class="dh-banner-card" style="background-image: url(/assets/images/service/domain-hosting/banner-card-1.png);">
                        <a href="/hosting/budget" class="dh-banner-card__link" aria-label="Budget Hosting"></a>
                        <div class="dh-banner-card__header">
                            <div class="dh-banner-card__icon">
                                <i class="fa-sharp fa-light fa-server"></i>
                            </div>
                        </div>

                        <div class="dh-banner-card__footer">
                            <h6 class="dh-banner-card__title">
                                Budget Hosting
                            </h6>
                        </div>
                    </div>
                    <div class="dh-banner-card" style="background-image: url(/assets/images/service/domain-hosting/banner-card-2.png);">
                        <a href="/hosting/premium" class="dh-banner-card__link" aria-label="Premium Hosting"></a>
                        <div class="dh-banner-card__header">
                            <div class="dh-banner-card__icon">
                                <i class="fa-regular fa-server"></i>
                            </div>
                        </div>

                        <div class="dh-banner-card__footer">
                            <h6 class="dh-banner-card__title">
                                Premium Hosting
                            </h6>
                        </div>
                    </div>
                    <div class="dh-banner-card" style="background-image: url(/assets/images/service/domain-hosting/banner-card-2.png);">
                        <a href="/hosting/vps" class="dh-banner-card__link" aria-label="VPS Hosting"></a>
                        <div class="dh-banner-card__header">
                            <div class="dh-banner-card__icon">
                                <i class="fa-light fa-chart-tree-map"></i>
                            </div>
                        </div>

                        <div class="dh-banner-card__footer">
                            <h6 class="dh-banner-card__title">
                                VPS Hosting
                            </h6>
                        </div>
                    </div>
                    <div class="dh-banner-card" style="background-image: url(/assets/images/service/domain-hosting/banner-card-4.png);">
                        <a href="/hosting/dedicated" class="dh-banner-card__link" aria-label="Dedicated Server"></a>
                        <div class="dh-banner-card__header">
                            <div class="dh-banner-card__icon">
                                <i class="fa-duotone fa-server"></i>
                            </div>
                        </div>

                        <div class="dh-banner-card__footer">
                            <h6 class="dh-banner-card__title">
                                Dedicated Server
                            </h6>
                        </div>
                    </div>
                    <div class="dh-banner-card" style="background-image: url(/assets/images/service/domain-hosting/banner-card-5.png);">
                        <a href="/hosting/cluster" class="dh-banner-card__link" aria-label="Server Cluster"></a>
                        <div class="dh-banner-card__header">
                            <div class="dh-banner-card__icon">
                                <i class="fa-regular fa-network-wired"></i>
                            </div>
                        </div>

                        <div class="dh-banner-card__footer">
                            <h6 class="dh-banner-card__title">
                                Server Cluster
                            </h6>
                        </div>
                    </div>
                    <div class="dh-banner-card" style="background-image: url(/assets/images/service/domain-hosting/banner-card-6.png);">
                        <a href="/hosting/smtp" class="dh-banner-card__link" aria-label="SMTP Server"></a>
                        <div class="dh-banner-card__header">
                            <div class="dh-banner-card__icon">
                                <i class="fa-regular fa-envelopes-bulk"></i>
                            </div>
                        </div>

                        <div class="dh-banner-card__footer">
                            <h6 class="dh-banner-card__title">
                                SMTP Server
                            </h6>
                        </div>
                    </div>
                    <div class="dh-banner-card" style="background-image: url(/assets/images/service/domain-hosting/banner-card-7.png);">
                        <a href="/domain-registration" class="dh-banner-card__link" aria-label="Domain Registration"></a>
                        <div class="dh-banner-card__header">
                            <div class="dh-banner-card__icon">
                                <i class="fa-regular fa-globe"></i>
                            </div>
                        </div>

                        <div class="dh-banner-card__footer">
                            <h6 class="dh-banner-card__title">
                                Domain Registration
                            </h6>
                        </div>
                    </div>
                </div>

                <a class="btn btn--base" href="/contact">
                    Contact to Learn More
                </a>
                <div class="dh-banner-review">
                    <h4 class="dh-banner-review__title">Our customers say</h4>
                    <ul class="dh-banner-review-list">
                        <li class="dh-banner-review-list__item">
                            <h4 class="dh-banner-review-list__title">Excellent</h4>
                        </li>
                        <li class="dh-banner-review-list__item">
                            <div class="dh-banner-review-list__stars">
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="16.3438" height="16.3438" fill="#87E64B" />
                                    <path d="M8.17205 1.87085L9.5867 6.2247L14.1646 6.2247L10.461 8.91553L11.8757 13.2694L8.17205 10.5786L4.46844 13.2694L5.88309 8.91553L2.17948 6.2247L6.75739 6.2247L8.17205 1.87085Z" fill="white" />
                                </svg>
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="16.3438" height="16.3438" fill="#87E64B" />
                                    <path d="M8.17205 1.87085L9.5867 6.2247L14.1646 6.2247L10.461 8.91553L11.8757 13.2694L8.17205 10.5786L4.46844 13.2694L5.88309 8.91553L2.17948 6.2247L6.75739 6.2247L8.17205 1.87085Z" fill="white" />
                                </svg>
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="16.3438" height="16.3438" fill="#87E64B" />
                                    <path d="M8.17205 1.87085L9.5867 6.2247L14.1646 6.2247L10.461 8.91553L11.8757 13.2694L8.17205 10.5786L4.46844 13.2694L5.88309 8.91553L2.17948 6.2247L6.75739 6.2247L8.17205 1.87085Z" fill="white" />
                                </svg>
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="16.3438" height="16.3438" fill="#87E64B" />
                                    <path d="M8.17205 1.87085L9.5867 6.2247L14.1646 6.2247L10.461 8.91553L11.8757 13.2694L8.17205 10.5786L4.46844 13.2694L5.88309 8.91553L2.17948 6.2247L6.75739 6.2247L8.17205 1.87085Z" fill="white" />
                                </svg>
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="16.3438" height="16.3438" fill="#DCDCE6" />
                                    <rect width="8.1719" height="16.3438" fill="#87E64B" />
                                    <path d="M8.17205 1.87085L9.5867 6.2247L14.1646 6.2247L10.461 8.91553L11.8757 13.2694L8.17205 10.5786L4.46844 13.2694L5.88309 8.91553L2.17948 6.2247L6.75739 6.2247L8.17205 1.87085Z" fill="white" />
                                </svg>
                            </div>
                        </li>
                        <li class="dh-banner-review-list__item">
                            <span class="dh-banner-review-list__text">4.8 out of 5 based on 2,000+ reviews</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="dh-domain my-120">
        <div class="container">
            <div class="section-heading style-left wow fadeInDown" data-wow-delay="0.4s">
                <h2 class="section-heading__title">
                    Search Most Popular Domain
                </h2>
            </div>
            <div class="row gy-4">

                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">com</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $15.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">net</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $20.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">org</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $20.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">biz</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $20.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">info</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $20.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">cash</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $65.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">xyz</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $20.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">club</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $25.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">co.uk</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $20.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">io</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $99.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">blog</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $45.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">me</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $40.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">online</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $45.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">site</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $50.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">top</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $15.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">vip</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $25.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">app</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $25.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">chat</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $50.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">click</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $15.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">cloud</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $30.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">digital</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $50.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">download</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $35.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">email</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $30.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">hosting</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $35.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">network</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $30.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">software</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $50.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">tech</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $70.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">systems</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $30.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">technology</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $30.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">website</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $25.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                                                        <div class="col-6 col-md-4 col-xl-3">
                        <div class="dh-domain-card wow fadeInDown" data-wow-delay="0.2s">
                            <a href="/domain-registration" class="dh-domain-card__link" aria-label="Search and register domain"></a>
                            <img class="dh-domain-card__shape" src="/assets/images/service/domain-hosting/domain-shape.png" alt="">
                            <div class="dh-domain-card__content">
                                <h2 class="dh-domain-card__title">
                                    <span class="dot">.</span>
                                    <span class="ext">pro</span>
                                </h2>
                                <h2 class="dh-domain-card__price">
                                    $45.00/yr
                                </h2>
                                <h4 class="dh-domain-card__text">
                                    With full control
                                </h4>
                                <span class="dh-domain-card__btn">
                                    Search
                                </span>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </section>

    <section class="dh-feature my-120">
        <div class="container">
            <div class="section-heading wow fadeInDown" data-wow-delay="0.3s">
                <h2 class="section-heading__title">
                    Everything You Need to Stay Online
                </h2>
            </div>
            <div class="row gy-4">
                <div class="col-sm-6 col-lg-4">
                    <div class="dh-feature-card wow fadeInDown" data-wow-delay="0.2s">
                        <img class="dh-feature-card__icon" src="/assets/images/service/domain-hosting/feature-icon-1.png" alt="">
                        <div class="dh-feature-card__content">
                            <h3 class="dh-feature-card__title">Fast SSD Storage</h3>
                            <p class="dh-feature-card__desc">
                                Enterprise NVMe SSD drives deliver faster load times and a smoother experience for every visitor.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="dh-feature-card wow fadeInDown" data-wow-delay="0.25s">
                        <img class="dh-feature-card__icon" src="/assets/images/service/domain-hosting/feature-icon-2.png" alt="">
                        <div class="dh-feature-card__content">
                            <h3 class="dh-feature-card__title">99.9% Uptime</h3>
                            <p class="dh-feature-card__desc">
                                Reliable infrastructure keeps your website online and accessible around the clock.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="dh-feature-card wow fadeInDown" data-wow-delay="0.3s">
                        <img class="dh-feature-card__icon" src="/assets/images/service/domain-hosting/feature-icon-3.png" alt="">
                        <div class="dh-feature-card__content">
                            <h3 class="dh-feature-card__title">Flexible Plans</h3>
                            <p class="dh-feature-card__desc">
                                Choose from budget, premium, VPS, and dedicated plans that fit your needs and budget.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="dh-feature-card wow fadeInDown" data-wow-delay="0.35s">
                        <img class="dh-feature-card__icon" src="/assets/images/service/domain-hosting/feature-icon-4.png" alt="">
                        <div class="dh-feature-card__content">
                            <h3 class="dh-feature-card__title">Scalable Resources</h3>
                            <p class="dh-feature-card__desc">
                                Easily scale your CPU, RAM, and storage up or down as your website grows.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="dh-feature-card wow fadeInDown" data-wow-delay="0.4s">
                        <img class="dh-feature-card__icon" src="/assets/images/service/domain-hosting/feature-icon-5.png" alt="">
                        <div class="dh-feature-card__content">
                            <h3 class="dh-feature-card__title">Full Root Access</h3>
                            <p class="dh-feature-card__desc">
                                Take complete control of your server with full root access and custom configurations.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="dh-feature-card wow fadeInDown" data-wow-delay="0.45s">
                        <img class="dh-feature-card__icon" src="/assets/images/service/domain-hosting/feature-icon-6.png" alt="">
                        <div class="dh-feature-card__content">
                            <h3 class="dh-feature-card__title">Easy Control Panel</h3>
                            <p class="dh-feature-card__desc">
                                Manage domains, email, and one-click app installs from a simple, intuitive dashboard.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="dh-solution py-120">
        <div class="container">
            <div class="section-heading">
                <h2 class="section-heading__title">
                    Crafting Solutions Tailored to You
                </h2>
            </div>

            <div class="row gy-4">
                <div class="col-sm-6 col-lg-4">
                    <div class="dh-solution-card wow fadeInLeft" data-wow-delay="0.2s">
                        <img class="dh-solution-card__thumb" src="/assets/images/service/domain-hosting/solution-thumb-1.png" alt="">
                        <div class="dh-solution-card__content">
                            <h4 class="dh-solution-card__title">Shared Hosting</h4>
                            <p class="dh-solution-card__desc">
                                Affordable plans with fast SSD storage and an easy control panel, perfect for getting started online.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="dh-solution-card wow fadeInDown" data-wow-delay="0.25s">
                        <img class="dh-solution-card__thumb" src="/assets/images/service/domain-hosting/solution-thumb-2.png" alt="">
                        <div class="dh-solution-card__content">
                            <h4 class="dh-solution-card__title">VPS Server</h4>
                            <p class="dh-solution-card__desc">
                                Dedicated CPU and RAM with full root access and the freedom to scale resources on demand.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="dh-solution-card wow fadeInRight" data-wow-delay="0.3s">
                        <img class="dh-solution-card__thumb" src="/assets/images/service/domain-hosting/solution-thumb-3.png" alt="">
                        <div class="dh-solution-card__content">
                            <h4 class="dh-solution-card__title">Dedicated Server</h4>
                            <p class="dh-solution-card__desc">
                                Powerful single-tenant hardware delivering maximum performance, security, and complete server control.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="dh-solution-card wow fadeInLeft" data-wow-delay="0.35s">
                        <img class="dh-solution-card__thumb" src="/assets/images/service/domain-hosting/solution-thumb-4.png" alt="">
                        <div class="dh-solution-card__content">
                            <h4 class="dh-solution-card__title">SMTP Server</h4>
                            <p class="dh-solution-card__desc">
                                Reliable mail server setup for fast, secure, and consistent bulk email delivery.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="dh-solution-card wow fadeInRight" data-wow-delay="0.4s">
                        <img class="dh-solution-card__thumb" src="/assets/images/service/domain-hosting/solution-thumb-5.png" alt="">
                        <div class="dh-solution-card__content">
                            <h4 class="dh-solution-card__title">Server Cluster</h4>
                            <p class="dh-solution-card__desc">
                                Load-balanced architecture across multiple servers for high availability and stable performance under
                                heavy traffic.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="dh-cta my-120">
        <div class="container wow fadeInDown" data-wow-delay="0.4s">
            <div class="dh-cta-card">
                <div class="dh-cta-card-left-shape">
                    <img class="fit-image" src="/assets/images/service/domain-hosting/cta-left-shape.png" alt="">
                </div>
                <div class="dh-cta-card-right-shape">
                    <img class="fit-image" src="/assets/images/service/domain-hosting/cta-right-shape.png" alt="">
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-xxl-8">
                        <div class="dh-cta-card__content">
                            <h2 class="dh-cta-card__title">
                                Let's Plan The Right Hosting
                            </h2>
                            <p class="dh-cta-card__desc">
                                Book a free meeting with our hosting experts. We'll understand your needs and help you choose the
                                perfect plan to get your project online.
                            </p>
                            <div class="dh-cta-card__btns">
                                <a class="btn btn--base" href="/book-a-meeting">
                                    Book a Meeting
                                </a>
                                <a class="btn btn--white outline" href="/contact">
                                    Contact Us
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
