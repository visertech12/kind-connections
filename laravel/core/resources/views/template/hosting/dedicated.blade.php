
@php
    $seo = config('seo.hosting.dedicated', config('seo.default', []));
    $seodata['title']       = $seo['title'] ?? '';
    $seodata['description'] = $seo['description'] ?? '';
    $seodata['keyword']     = $seo['keyword'] ?? '';
    $seodata['image']       = $seo['image'] ?? '';
@endphp
@extends('template.layouts.frontend', ['seodata' => $seodata])
@section('content')



    <section class="plan my-120" id="pricing">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2 class="section-heading__title"> Our Dedicated <span class="shape"> Servers </span> </h2>
                        <p class="section-heading__desc">Experience top-tier service with our Dedicated Servers (Bare Metal Servers). Benefit from reliability, performance, and security, along with full management, exceptional support, and a 99.99% uptime guarantee. Choose from our diverse lineup of managed servers to meet your specific requirements.</p>
                    </div>
                </div>
            </div>
            <div class="plan__inner">
                <div class="plan__wrapper">

                    <div class="plan-item flex-between">
                        <div class="plan-item__content decrese-gap flex-align">
                            <div class="plan-item__data flex-wrap cpu-area"><div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon1.svg') }}" alt=""></div><div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">Processor</span><h6 class="plan-item__data-title">Intel Xeon E-2286G <button type="button" class="infobtn" data-details="6-Core, 4.0GHz"><i class="fa-regular fa-circle-info text--base"></i></button></h6></div></div>
                            <div class="plan-item__data flex-wrap ram-area"><div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon2.svg') }}" alt=""></div><div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">RAM</span><h6 class="plan-item__data-title">32 GB ECC DDR4</h6></div></div>
                            <div class="plan-item__data flex-wrap disk-area"><div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon3.svg') }}" alt=""></div><div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">Disk</span><h6 class="plan-item__data-title">2 x 480 GB SSD</h6></div></div>
                            <div class="plan-item__data flex-wrap"><div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon4.svg') }}" alt=""></div><div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">Bandwidth</span><h6 class="plan-item__data-title">Unmetered 1Gbps</h6></div></div>
                            <div class="plan-item__data flex-wrap"><div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon5.svg') }}" alt=""></div><div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">IPv4</span><h6 class="plan-item__data-title">5 IPs</h6></div></div>
                            <div class="plan-item__data data-price"><div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">Price</span><h6 class="plan-item__data-title">$199<span class="duration fs-14">/mo</span></h6></div></div>
                        </div>
                        <div class="plan-item__button"><a href="#" class="btn btn--base outline btn--md">ORDER NOW</a></div>
                    </div>
                    <div class="plan-item flex-between">
                        <div class="plan-item__content decrese-gap flex-align">
                            <div class="plan-item__data flex-wrap cpu-area"><div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon1.svg') }}" alt=""></div><div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">Processor</span><h6 class="plan-item__data-title">AMD Ryzen 9 5950X <button type="button" class="infobtn" data-details="16-Core, 3.4GHz"><i class="fa-regular fa-circle-info text--base"></i></button></h6></div></div>
                            <div class="plan-item__data flex-wrap ram-area"><div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon2.svg') }}" alt=""></div><div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">RAM</span><h6 class="plan-item__data-title">64 GB ECC DDR4</h6></div></div>
                            <div class="plan-item__data flex-wrap disk-area"><div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon3.svg') }}" alt=""></div><div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">Disk</span><h6 class="plan-item__data-title">2 x 960 GB NVMe</h6></div></div>
                            <div class="plan-item__data flex-wrap"><div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon4.svg') }}" alt=""></div><div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">Bandwidth</span><h6 class="plan-item__data-title">Unmetered 1Gbps</h6></div></div>
                            <div class="plan-item__data flex-wrap"><div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon5.svg') }}" alt=""></div><div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">IPv4</span><h6 class="plan-item__data-title">5 IPs</h6></div></div>
                            <div class="plan-item__data data-price"><div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">Price</span><h6 class="plan-item__data-title">$349<span class="duration fs-14">/mo</span></h6></div></div>
                        </div>
                        <div class="plan-item__button"><a href="#" class="btn btn--base outline btn--md">ORDER NOW</a></div>
                    </div>
                    <div class="plan-item flex-between">
                        <div class="plan-item__content decrese-gap flex-align">
                            <div class="plan-item__data flex-wrap cpu-area"><div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon1.svg') }}" alt=""></div><div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">Processor</span><h6 class="plan-item__data-title">Dual Intel Xeon Gold <button type="button" class="infobtn" data-details="24-Core, 2.6GHz"><i class="fa-regular fa-circle-info text--base"></i></button></h6></div></div>
                            <div class="plan-item__data flex-wrap ram-area"><div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon2.svg') }}" alt=""></div><div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">RAM</span><h6 class="plan-item__data-title">128 GB ECC DDR4</h6></div></div>
                            <div class="plan-item__data flex-wrap disk-area"><div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon3.svg') }}" alt=""></div><div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">Disk</span><h6 class="plan-item__data-title">4 x 1.9 TB NVMe RAID</h6></div></div>
                            <div class="plan-item__data flex-wrap"><div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon4.svg') }}" alt=""></div><div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">Bandwidth</span><h6 class="plan-item__data-title">Unmetered 10Gbps</h6></div></div>
                            <div class="plan-item__data flex-wrap"><div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon5.svg') }}" alt=""></div><div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">IPv4</span><h6 class="plan-item__data-title">10 IPs</h6></div></div>
                            <div class="plan-item__data data-price"><div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">Price</span><h6 class="plan-item__data-title">$699<span class="duration fs-14">/mo</span></h6></div></div>
                        </div>
                        <div class="plan-item__button"><a href="#" class="btn btn--base outline btn--md">ORDER NOW</a></div>
                    </div>

                </div>
            </div>

            <div class="col-xl-12 mt-4">
                <p><strong>Datacenter:</strong> West or East, Netherlands, or Singapore are all available now, though we recommend the USA as your first pick.</p>
                <div class="mt-4">
                    @include('template.partials.cta.custom-spec', [
                        'ctaTitle' => 'Need a different configuration?',
                        'ctaDesc' => 'Tell us your exact CPU, RAM, storage, and bandwidth requirements. Our team will build a dedicated server tailored to you.',
                    ])
                </div>
            </div>

        </div>
    </section>

    <section class="dedicated-offer my-120">
        <div class="container">
            <div class="do-mosaic-wrap">
                <h5 class="do-mosaic-text mb-0">
                    At <strong>Unlock Themes</strong>, we engineer high-performance
                    dedicated server infrastructure built for raw power, unwavering
                    reliability, and complete hardware control at any scale.
                </h5>
                <div class="do-mosaic-img do-m-img1">
                    <img src="{{ asset('assets/images/hosting/dedicated/1.png') }}" alt="Server infrastructure">
                </div>
                <div class="do-mosaic-img do-m-img2">
                    <img src="{{ asset('assets/images/hosting/dedicated/2.png') }}" alt="Server room">
                </div>
                <div class="do-mosaic-img do-m-img3">
                    <img src="{{ asset('assets/images/hosting/dedicated/3.png') }}" alt="Server cables">
                </div>
                <div class="do-mosaic-img do-m-img4">
                    <img src="{{ asset('assets/images/hosting/dedicated/4.png') }}" alt="Dedicated server">
                </div>
                <div class="do-mosaic-img do-m-img5">
                    <img src="{{ asset('assets/images/hosting/dedicated/5.png') }}" alt="Server hardware">
                </div>
                <div class="do-mosaic-img do-m-img6">
                    <img src="{{ asset('assets/images/hosting/dedicated/6.png') }}" alt="Server components">
                </div>
                <div class="do-badge do-badge--white do-badge-1">
                    <i class="fa-regular fa-globe"></i>
                    <span>30+ Countries Covered</span>
                </div>
                <div class="do-badge do-badge--black do-badge-2">
                    <i class="fa-regular fa-globe"></i>
                    <span>400+ Hardware Configurations</span>
                </div>
                <div class="do-badge do-badge--dark do-badge-3">
                    <i class="fa-regular fa-globe"></i>
                    <span>1,200+ Active Dedicated Servers</span>
                </div>
                <div class="do-badge do-badge--white do-badge-4">
                    <span>Built on Bare-Metal Hardware</span>
                </div>
            </div>
            <div class="row g-4 g-xl-5 dedicated-offer-row">
                <div class="col-xl-3 col-lg-4 col-12">
                    <h2 class="dedicated-offer-title">What We Offer</h2>
                </div>
                <div class="col-xl-9 col-lg-8 col-12">
                    <h4 class="dedicated-offer-subtitle">
                        We specialize in transforming complex hosting needs into reality. Explore our portfolio of powerful dedicated server solutions built with precision and performance in mind.
                    </h4>
                    <p class="dedicated-offer-body">
                        Our dedicated servers provide a secure environment for both personal and business data, employing the highest security standards to prevent unauthorized access, data breaches, and any form of unlawful activity. We prioritize the integrity and confidentiality of your information by implementing advanced encryption protocols, continuous monitoring, and robust firewall protections. Additionally, we ensure that your server resources are allocated exclusively for your business needs, tailored precisely to your operational requirements and preferences.
                    </p>
                </div>
            </div>
        </div>
    </section>

    @include('template.hosting.feature.common')
    @include('template.hosting.feature.dedicated')

    <section class="dss-section py-120">
        <div class="container">
            <h2 class="dss-title">
                Set Up and Scale Your Dedicated Server Effortlessly
            </h2>
            <div class="row g-4">
                <div class="col-xl-6 col-lg-12">
                    <div class="dss-main-card h-100">
                        <p class="dss-main-card__desc">
                            Your server. Your rules. Bare-metal performance with full
                            hardware dedication, built and configured exactly the way
                            your business needs it.
                        </p>
                        <p class="dss-main-card__price">Starts From $159/mo</p>
                        <a href="#pricing" class="dss-main-card__cta">Configure Now <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="dss-feature-card h-100">
                        <div class="dss-feature-card__top">
                            <h4 class="dss-feature-card__name">VPS Server</h4>
                            <p class="dss-feature-card__desc">
                                A virtual private server with guaranteed isolated resources
                                for projects that need power and predictability on a
                                smaller footprint.
                            </p>
                            <span class="dss-feature-card__price">Starts From $30/mo</span>
                        </div>
                        <div class="dss-feature-card__img">
                            <img src="{{ asset('assets/images/hosting/dedicated/monitor.png') }}" alt="VPS Server">
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="dss-feature-card h-100">
                        <div class="dss-feature-card__top">
                            <h4 class="dss-feature-card__name">Server Cluster</h4>
                            <p class="dss-feature-card__desc">
                                Multiple dedicated servers working together as a single,
                                redundant system. Built for mission-critical workloads that
                                cannot afford downtime.
                            </p>
                            <span class="dss-feature-card__price">Starts From $999/mo</span>
                        </div>
                        <div class="dss-feature-card__img">
                            <img src="{{ asset('assets/images/hosting/dedicated/database.png') }}" alt="Server Cluster">
                        </div>
                    </div>
                </div>
            </div>
            <div class="dss-trust-bar">
                <div class="row g-4 align-items-center justify-content-between">
                    <div class="col-xl-auto col-lg-3 col-md-6 col-6">
                        <div class="dss-trust-item">
                            <div class="dss-trust-item__icon">
                                <i class="fa-regular fa-globe"></i>
                            </div>
                            <h5 class="dss-trust-item__info mb-0">
                                <span>Global</span>
                                <span>Infrastructure</span>
                            </h5>
                        </div>
                    </div>
                    <div class="col-xl-auto col-lg-3 col-md-6 col-6">
                        <div class="dss-trust-item">
                            <div class="dss-trust-item__icon">
                                <i class="fa-regular fa-headset"></i>
                            </div>
                            <h5 class="dss-trust-item__info mb-0">
                                <span>Expert</span>
                                <span>Tech Support</span>
                            </h5>
                        </div>
                    </div>
                    <div class="col-xl-auto col-lg-3 col-md-6 col-6">
                        <div class="dss-trust-item">
                            <div class="dss-trust-item__icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <h5 class="dss-trust-item__info mb-0">
                                <span>DDoS</span>
                                <span>Protected</span>
                            </h5>
                        </div>
                    </div>
                    <div class="col-xl-auto col-lg-3 col-md-6 col-6">
                        <div class="dss-trust-item counter-item">
                            <div class="dss-trust-item__icon">
                                <i class="fa-regular fa-users"></i>
                            </div>
                            <h5 class="dss-trust-item__info mb-0">
                                <span class="d-inline-flex align-items-center gap-1">
                                    <span class="odometer" data-odometer-final="900"></span>
                                    +
                                </span>
                                <span>Customers</span>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal common--modal fade" id="detailsModal" tabindex="-1" aria-labelledby="chooseDomain2Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="chooseDomain2Label">Processor Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="lead cpu-details mt-4"></p>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('script')
    <script>
        (function($) {
            "use strict"
            $('.infobtn').click(function() {
                var modal = $('#detailsModal');
                modal.find('.cpu-details').text($(this).data('details'));
                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush
@push('style')
    <style>
        .cpu-area {
            width: 220px;
        }

        .disk-area {
            width: 170px;
        }

        .ram-area {
            width: 140px;
        }
    </style>
@endpush
