
@php
    $seo = config('seo.hosting.vps', config('seo.default', []));
    $seodata['title']       = $seo['title'] ?? '';
    $seodata['description'] = $seo['description'] ?? '';
    $seodata['keyword']     = $seo['keyword'] ?? '';
    $seodata['image']       = $seo['image'] ?? '';
@endphp
@extends('template.layouts.frontend', ['seodata' => $seodata])
@section('content')



    <section class="plan py-120" id="pricing">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2 class="section-heading__title"> Our VPS <span class="shape"> Plans </span> </h2>
                        <p class="section-heading__desc">Get affordable Computing Instances with full root access, fastest NVMe SSD storage, quick provisioning, KVM virtualization, latest hardware, premium bandwidth, and unbeatable reliability. Our VPS packages include setup and management for a hassle-free experience. Achieve the perfect price-to-performance balance with our feature-rich solutions.</p>
                    </div>
                    {{--
                <div class="dc-location mb-lg-4 mb-3">
                    <a href="{{route('hosting.vps')}}" class="{{menuActive('hosting.vps')}}">USA</a>
                    <a href="{{route('hosting.vps.sg')}}" class="{{menuActive('hosting.vps.sg')}}">Singapore</a>
                </div>
                --}}
                </div>
            </div>
            <div class="plan__inner">
                <div class="plan__wrapper">

                    <div class="plan-item flex-between">
                        <div class="plan-item__content flex-align">
                            <div class="plan-item__data flex-wrap">
                                <div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon1.svg') }}" alt=""></div>
                                <div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">CPU</span><h6 class="plan-item__data-title">2 vCPU</h6></div>
                            </div>
                            <div class="plan-item__data flex-wrap">
                                <div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon2.svg') }}" alt=""></div>
                                <div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">Guaranteed RAM</span><h6 class="plan-item__data-title">2 GB</h6></div>
                            </div>
                            <div class="plan-item__data flex-wrap disk-area">
                                <div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon3.svg') }}" alt=""></div>
                                <div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">Disk Space</span><h6 class="plan-item__data-title">40 GB NVMe</h6></div>
                            </div>
                            <div class="plan-item__data flex-wrap">
                                <div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon4.svg') }}" alt=""></div>
                                <div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">Bandwidth</span><h6 class="plan-item__data-title">2 TB</h6></div>
                            </div>
                            <div class="plan-item__data flex-wrap">
                                <div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon5.svg') }}" alt=""></div>
                                <div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">IP Address</span><h6 class="plan-item__data-title">1 Dedicated IP</h6></div>
                            </div>
                            <div class="plan-item__data data-price">
                                <div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">Price</span><h6 class="plan-item__data-title">$15<span class="duration fs-14">/mo</span></h6></div>
                            </div>
                        </div>
                        <div class="plan-item__button"><a href="#" class="btn btn--base outline btn--md">ORDER NOW</a></div>
                    </div>
                    <div class="plan-item flex-between">
                        <div class="plan-item__content flex-align">
                            <div class="plan-item__data flex-wrap">
                                <div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon1.svg') }}" alt=""></div>
                                <div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">CPU</span><h6 class="plan-item__data-title">4 vCPU</h6></div>
                            </div>
                            <div class="plan-item__data flex-wrap">
                                <div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon2.svg') }}" alt=""></div>
                                <div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">Guaranteed RAM</span><h6 class="plan-item__data-title">4 GB</h6></div>
                            </div>
                            <div class="plan-item__data flex-wrap disk-area">
                                <div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon3.svg') }}" alt=""></div>
                                <div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">Disk Space</span><h6 class="plan-item__data-title">80 GB NVMe</h6></div>
                            </div>
                            <div class="plan-item__data flex-wrap">
                                <div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon4.svg') }}" alt=""></div>
                                <div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">Bandwidth</span><h6 class="plan-item__data-title">4 TB</h6></div>
                            </div>
                            <div class="plan-item__data flex-wrap">
                                <div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon5.svg') }}" alt=""></div>
                                <div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">IP Address</span><h6 class="plan-item__data-title">1 Dedicated IP</h6></div>
                            </div>
                            <div class="plan-item__data data-price">
                                <div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">Price</span><h6 class="plan-item__data-title">$29<span class="duration fs-14">/mo</span></h6></div>
                            </div>
                        </div>
                        <div class="plan-item__button"><a href="#" class="btn btn--base outline btn--md">ORDER NOW</a></div>
                    </div>
                    <div class="plan-item flex-between">
                        <div class="plan-item__content flex-align">
                            <div class="plan-item__data flex-wrap">
                                <div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon1.svg') }}" alt=""></div>
                                <div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">CPU</span><h6 class="plan-item__data-title">8 vCPU</h6></div>
                            </div>
                            <div class="plan-item__data flex-wrap">
                                <div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon2.svg') }}" alt=""></div>
                                <div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">Guaranteed RAM</span><h6 class="plan-item__data-title">8 GB</h6></div>
                            </div>
                            <div class="plan-item__data flex-wrap disk-area">
                                <div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon3.svg') }}" alt=""></div>
                                <div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">Disk Space</span><h6 class="plan-item__data-title">160 GB NVMe</h6></div>
                            </div>
                            <div class="plan-item__data flex-wrap">
                                <div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon4.svg') }}" alt=""></div>
                                <div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">Bandwidth</span><h6 class="plan-item__data-title">8 TB</h6></div>
                            </div>
                            <div class="plan-item__data flex-wrap">
                                <div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon5.svg') }}" alt=""></div>
                                <div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">IP Address</span><h6 class="plan-item__data-title">1 Dedicated IP</h6></div>
                            </div>
                            <div class="plan-item__data data-price">
                                <div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">Price</span><h6 class="plan-item__data-title">$59<span class="duration fs-14">/mo</span></h6></div>
                            </div>
                        </div>
                        <div class="plan-item__button"><a href="#" class="btn btn--base outline btn--md">ORDER NOW</a></div>
                    </div>
                    <div class="plan-item flex-between">
                        <div class="plan-item__content flex-align">
                            <div class="plan-item__data flex-wrap">
                                <div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon1.svg') }}" alt=""></div>
                                <div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">CPU</span><h6 class="plan-item__data-title">16 vCPU</h6></div>
                            </div>
                            <div class="plan-item__data flex-wrap">
                                <div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon2.svg') }}" alt=""></div>
                                <div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">Guaranteed RAM</span><h6 class="plan-item__data-title">16 GB</h6></div>
                            </div>
                            <div class="plan-item__data flex-wrap disk-area">
                                <div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon3.svg') }}" alt=""></div>
                                <div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">Disk Space</span><h6 class="plan-item__data-title">320 GB NVMe</h6></div>
                            </div>
                            <div class="plan-item__data flex-wrap">
                                <div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon4.svg') }}" alt=""></div>
                                <div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">Bandwidth</span><h6 class="plan-item__data-title">16 TB</h6></div>
                            </div>
                            <div class="plan-item__data flex-wrap">
                                <div class="plan-item__data-icon"><img src="{{ asset('assets/images/icons/plan-icon5.svg') }}" alt=""></div>
                                <div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">IP Address</span><h6 class="plan-item__data-title">2 Dedicated IPs</h6></div>
                            </div>
                            <div class="plan-item__data data-price">
                                <div class="plan-item__data-info"><span class="plan-item__data-subtitle fs-14">Price</span><h6 class="plan-item__data-title">$99<span class="duration fs-14">/mo</span></h6></div>
                            </div>
                        </div>
                        <div class="plan-item__button"><a href="#" class="btn btn--base outline btn--md">ORDER NOW</a></div>
                    </div>

                </div>
            </div>
            <div class="mt-4">
                @include('template.partials.cta.custom-spec')
            </div>
        </div>
    </section>

    @include('template.hosting.feature.common')
    @include('template.hosting.feature.vps')


    <section class="py-120 vps-server-section">
        <div class="container">
            <div class="section-heading">
                <h2 class="section-heading__title">
                    Secure VPS Server <span class="shape"> Environment </span>
                </h2>
                <p class="section-heading__desc">
                    Fully isolated virtual servers built with enterprise-grade
                    infrastructure to keep your applications running fast, safe, and
                    always available.
                </p>
            </div>

            <div class="row gy-4">
                <div class="col-lg-4 col-sm-6">
                    <div class="vps-server-card">
                        <div class="icon">
                            <img src="{{ asset('assets/images/hosting/vps/cpu.png') }}" alt="">
                        </div>
                        <h4 class="title">Dedicated vCPU Resources</h4>
                        <p class="desc">
                            Every VPS includes dedicated processing resources to ensure stable, predictable performance without
                            resource contention from neighboring environments.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="vps-server-card">
                        <div class="icon">
                            <img src="{{ asset('assets/images/hosting/vps/ssd.png') }}" alt="">
                        </div>
                        <h4 class="title">NVMe SSD Storage</h4>
                        <p class="desc">
                            Powered by high-speed NVMe SSD technology for ultra-low latency and significantly faster application and
                            database performance.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="vps-server-card">
                        <div class="icon">
                            <img src="{{ asset('assets/images/hosting/vps/data.png') }}" alt="">
                        </div>
                        <h4 class="title">Global Data Center Locations</h4>
                        <p class="desc">
                            Deploy services closer to your audience with globally distributed data centers for reduced latency and
                            improved user experience.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="vps-server-card">
                        <div class="icon">
                            <img src="{{ asset('assets/images/hosting/vps/secure.png') }}" alt="">
                        </div>
                        <h4 class="title">Full Root Access & Control</h4>
                        <p class="desc">
                            Take complete control of your server environment with unrestricted root access and flexible system
                            configuration options.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="vps-server-card">
                        <div class="icon">
                            <img src="{{ asset('assets/images/hosting/vps/ability.png') }}" alt="">
                        </div>
                        <h4 class="title">Instant Scalability</h4>
                        <p class="desc">
                            Quickly adjust infrastructure resources to match changing workloads without downtime or service
                            disruption.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="vps-server-card">
                        <div class="icon">
                            <img src="{{ asset('assets/images/hosting/vps/dns.png') }}" alt="">
                        </div>
                        <h4 class="title">Advanced DDoS Protection</h4>
                        <p class="desc">
                            Stay protected with enterprise-grade DDoS mitigation designed to maintain uptime and defend against malicious
                            attacks.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-120 vps-host-feature">
        <div class="container">
            <div class="row align-items-center gy-5">
                <div class="col-xl-4 col-lg-5">
                    <div class="vps-feature-left">
                        <h2 class="vps-feature-heading">
                            Enterprise-Grade VPS Infrastructure Designed for Speed, Reliability, and Scalability.
                        </h2>
                        <a href="#pricing" class="btn btn--base">Get Started</a>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7">
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="vps-feature-card">
                                <div class="vps-feature-card__icon">
                                    <img src="{{ asset('assets/images/hosting/vps/icon-1.png') }}" alt="Blazing Fast Performance">
                                </div>
                                <div class="vps-feature-card__content">
                                    <h4 class="vps-feature-card__title">
                                        Blazing Fast Performance
                                    </h4>
                                    <p class="vps-feature-card__desc">
                                        Experience exceptional performance with ultra-fast NVMe SSD storage and dedicated processing
                                        power.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="vps-feature-card">
                                <div class="vps-feature-card__icon">
                                    <img src="{{ asset('assets/images/hosting/vps/icon-2.png') }}" alt="Full Cloud Scalability">
                                </div>
                                <div class="vps-feature-card__content">
                                    <h4 class="vps-feature-card__title">
                                        Full Cloud Scalability
                                    </h4>
                                    <p class="vps-feature-card__desc">
                                        Scale resources instantly as your business grows. Upgrade CPU, RAM, and storage without service
                                        interruptions.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="vps-feature-card">
                                <div class="vps-feature-card__icon">
                                    <img src="{{ asset('assets/images/hosting/vps/icon-3.png') }}" alt="Root Access & Control">
                                </div>
                                <div class="vps-feature-card__content">
                                    <h4 class="vps-feature-card__title">
                                        Root Access &amp; Control
                                    </h4>
                                    <p class="vps-feature-card__desc">
                                        Gain full root access and complete administrative control to configure, customize, and optimize
                                        your VPS.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="vps-feature-card">
                                <div class="vps-feature-card__icon">
                                    <img src="{{ asset('assets/images/hosting/vps/icon-4.png') }}" alt="Advanced Security Shield">
                                </div>
                                <div class="vps-feature-card__content">
                                    <h4 class="vps-feature-card__title">
                                        Advanced Security Shield
                                    </h4>
                                    <p class="vps-feature-card__desc">
                                        Protect your infrastructure with advanced security mechanisms, proactive monitoring, and
                                        enterprise-grade threat mitigation.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
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
