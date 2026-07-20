
@php
    $seo = config('seo.hosting.cluster', config('seo.default', []));
    $seodata['title']       = $seo['title'] ?? '';
    $seodata['description'] = $seo['description'] ?? '';
    $seodata['keyword']     = $seo['keyword'] ?? '';
    $seodata['image']       = $seo['image'] ?? '';
@endphp
@extends('template.layouts.frontend', ['seodata' => $seodata])
@section('content')

    <section class="pricing-plan py-120">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2 class="section-heading__title"> Our Server <span class="shape"> Clusters </span> </h2>
                        <p class="section-heading__desc">Unleash Unmatched Performance. Our Server Cluster offers premium network & hardware, fully managed services, guaranteed uptime, proactive monitoring, free remote backups, and transparent pricing with no hidden fees. Experience unparalleled reliability and scalability for your business.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="row gy-4 justify-content-center">

                        <div class="col-xl-3 col-sm-6">
                            <div class="pricing-plan-item transition">
                                <div class="text-center">
                                    <h5 class="pricing-plan-item__title">2 Node Cluster</h5>
                                    <p class="pricing-plan-item__title fs-14">Achieve enhanced performance by separating your web server and database server, effectively optimizing their respective functions.</p>
                                    <button type="button" class="diagram my-lg-3 btn btn--gray btn--md outline" data-image="cluster_2node.png">View Diagram</button>
                                </div>
                                <div class="pricing-plan-item__list">
                                    <ul class="text-list underlined">
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> 1 Web/App Server</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> 1 Database Server</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-times"></i></span> Private Switch</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-times"></i></span> Database Load Balancer</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-times"></i></span> Web/App Load Balancer</li>
                                    </ul>
                                </div>
                                <div class="mt-5 text-center">
                                    <h3 class="pricing-plan-item__price"><span class="text fs-14">Starting from</span> $999<span class="text fs-14">/mo</span> </h3>
                                    <button type="button" class="btn btn--base btn--md outline w-100 order" data-subject="2 Node Cluster">GET IT NOW</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6">
                            <div class="pricing-plan-item transition">
                                <div class="text-center">
                                    <h5 class="pricing-plan-item__title">5 Node Cluster</h5>
                                    <p class="pricing-plan-item__title fs-14">Enhances performance and load balancing on the database by incorporating redundancy into the database server.</p>
                                    <button type="button" class="diagram my-lg-3 btn btn--gray btn--md outline" data-image="cluster_5node.png">View Diagram</button>
                                </div>
                                <div class="pricing-plan-item__list">
                                    <ul class="text-list underlined">
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> 1 Web/App Server</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> 3 Database Servers</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Private Switch</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Database Load Balancer</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-times"></i></span> Web/App Load Balancer</li>
                                    </ul>
                                </div>
                                <div class="mt-5 text-center">
                                    <h3 class="pricing-plan-item__price"><span class="text fs-14">Starting from</span> $3499<span class="text fs-14">/mo</span> </h3>
                                    <button type="button" class="btn btn--base btn--md outline w-100 order" data-subject="5 Node Cluster">GET IT NOW</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6">
                            <div class="pricing-plan-item transition">
                                <div class="text-center">
                                    <h5 class="pricing-plan-item__title">7 Node Cluster</h5>
                                    <p class="pricing-plan-item__title fs-14">Ensures optimal performance and load balancing on both the app server and database server by implementing redundancy.</p>
                                    <button type="button" class="diagram my-lg-3 btn btn--gray btn--md outline" data-image="cluster_7node.png">View Diagram</button>
                                </div>
                                <div class="pricing-plan-item__list">
                                    <ul class="text-list underlined">
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> 2 Web/App Servers</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> 3 Database Servers</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Private Switch</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Database Load Balancer</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Web/App Load Balancer</li>
                                    </ul>
                                </div>
                                <div class="mt-5 text-center">
                                    <h3 class="pricing-plan-item__price"><span class="text fs-14">Starting from</span> $4999<span class="text fs-14">/mo</span> </h3>
                                    <button type="button" class="btn btn--base btn--md outline w-100 order" data-subject="7 Node Cluster">GET IT NOW</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6">
                            <div class="pricing-plan-item transition">
                                <div class="text-center">
                                    <h5 class="pricing-plan-item__title">Custom Cluster</h5>
                                    <p class="pricing-plan-item__title fs-14">Improves performance and load balancing by expanding the number of nodes in both the app server and database server.</p>
                                    <button type="button" class="diagram my-lg-3 btn btn--gray btn--md outline" data-image="cluster_custom.png">View Diagram</button>
                                </div>
                                <div class="pricing-plan-item__list">
                                    <ul class="text-list underlined">
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> # Web/App Servers</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> # Database Servers</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Private Switch</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Database Load Balancer</li>
                                        <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> Web/App Load Balancer</li>
                                    </ul>
                                </div>
                                <div class="mt-5 text-center">
                                    <h3 class="pricing-plan-item__price"><span class="text fs-14">Starting from</span> $5999<span class="text fs-14">/mo</span> </h3>
                                    <button type="button" class="btn btn--base btn--md outline w-100 order" data-subject="Custom Cluster">GET IT NOW</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-120 cluster-service">
        <img class="cluster-service__bg" src="{{ asset('assets/images/hosting/cluster/bg.png') }}" alt="">
        <div class="container">
            <div class="section-heading">
                <h2 class="section-heading__title mb-0 text-white">
                    Everything Your Cluster Needs
                    <span class="shape"> All in One Platform </span>
                </h2>
                <p class="section-heading__desc text-white">
                    From microservices and CI/CD to storage and security, every
                    capability your cluster needs is built in, production-ready, and
                    waiting to go live.
                </p>
            </div>

            <div class="row g-3 g-xl-4 cluster-service-grid">
                <div class="col-lg-4 col-md-6">
                    <div class="cluster-service-card">
                        <div class="cluster-service-card__icon">
                            <i class="fa-regular fa-sitemap"></i>
                        </div>
                        <h6 class="cluster-service-card__title mb-0">Microservice Ready Platform</h6>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="cluster-service-card">
                        <div class="cluster-service-card__icon">
                            <i class="fa-regular fa-rotate"></i>
                        </div>
                        <h6 class="cluster-service-card__title mb-0">Automated CI/CD Pipelines</h6>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="cluster-service-card">
                        <div class="cluster-service-card__icon">
                            <i class="fa-regular fa-database"></i>
                        </div>
                        <h6 class="cluster-service-card__title mb-0">Scalable Database and Cache Cluster</h6>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="cluster-service-card">
                        <div class="cluster-service-card__icon">
                            <i class="fa-regular fa-box-archive"></i>
                        </div>
                        <h6 class="cluster-service-card__title mb-0">Container Registry</h6>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="cluster-service-card">
                        <div class="cluster-service-card__icon">
                            <i class="fa-regular fa-hard-drive"></i>
                        </div>
                        <h6 class="cluster-service-card__title mb-0">Object Storage (S3 Compatible)</h6>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="cluster-service-card">
                        <div class="cluster-service-card__icon">
                            <i class="fa-regular fa-globe"></i>
                        </div>
                        <h6 class="cluster-service-card__title mb-0">DNS Management</h6>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="cluster-service-card">
                        <div class="cluster-service-card__icon">
                            <i class="fa-regular fa-shield-check"></i>
                        </div>
                        <h6 class="cluster-service-card__title mb-0">High Availability</h6>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="cluster-service-card">
                        <div class="cluster-service-card__icon">
                            <i class="fa-regular fa-desktop"></i>
                        </div>
                        <h6 class="cluster-service-card__title mb-0">CMS Hosting</h6>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="cluster-service-card">
                        <div class="cluster-service-card__icon">
                            <i class="fa-regular fa-chart-bar"></i>
                        </div>
                        <h6 class="cluster-service-card__title mb-0">Centralized Logging and Monitoring</h6>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="cluster-service-card">
                        <div class="cluster-service-card__icon">
                            <i class="fa-regular fa-lock"></i>
                        </div>
                        <h6 class="cluster-service-card__title mb-0">Zero Trust Security</h6>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="cluster-service-card">
                        <div class="cluster-service-card__icon">
                            <i class="fa-regular fa-building"></i>
                        </div>
                        <h6 class="cluster-service-card__title mb-0">Enterprise-Grade SLA</h6>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="cluster-service-card">
                        <div class="cluster-service-card__icon">
                            <i class="fa-regular fa-headset"></i>
                        </div>
                        <h6 class="cluster-service-card__title mb-0">Priority Support</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="my-120 cluster-feature">
        <div class="container">
            <div class="section-heading">
                <h2 class="section-heading__title mb-1">
                    Cluster Hosting Built to <span class="shape"> Never Quit </span>
                </h2>
                <p class="section-heading__desc">
                    From automatic failover to redundant network architecture, every
                    part of our server cluster is engineered to keep your business
                    online when it matters most.
                </p>
            </div>

            <div class="row g-3 g-xl-4">
                <div class="col-lg-4 col-sm-6">
                    <div class="d-flex flex-column h-100">
                        <div class="cluster-grid__blue-card mb-3 mb-xl-4">
                            <p class="cluster-grid__blue-desc">
                                Our redundant infrastructure delivers top-tier cluster
                                performance, meeting your uptime and speed standards around
                                the clock.
                            </p>
                            <div class="cluster-grid__stat-block">
                                <h3 class="cluster-grid__stat-num mb-0">99.9%</h3>
                                <h4 class="cluster-grid__stat-label">Network Uptime</h4>
                            </div>
                        </div>
                        <div class="cluster-grid__photo-card">
                            <img src="{{ asset('assets/images/hosting/cluster/active.png') }}" alt="Active Server Cluster" class="cluster-grid__photo-bg">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                    <div class="cluster-grid__photo-card">
                        <img src="{{ asset('assets/images/hosting/cluster/rate.png') }}" alt="Automatic Failover" class="cluster-grid__photo-bg">
                        <div class="cluster-grid__photo-overlay"></div>
                        <div class="cluster-grid__photo-inner">
                            <div class="cluster-grid__stat-block cluster-grid__stat-block--white">
                                <h3 class="cluster-grid__stat-num mb-0">1s</h3>
                                <h4 class="cluster-grid__stat-label">Failover Time</h4>
                            </div>
                            <p class="cluster-grid__photo-desc">
                                Our nodes stay in sync at all times, automatically routing
                                traffic and rebuilding capacity the moment any single node
                                hiccups.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="cluster-grid__photo-card mb-3 mb-xl-4">
                        <img src="{{ asset('assets/images/hosting/cluster/network.png') }}" alt="Network Infrastructure" class="cluster-grid__photo-bg">
                    </div>
                    <div class="cluster-grid__blue-card">
                        <div class="cluster-grid__stat-block">
                            <h3 class="cluster-grid__stat-num mb-0">300+</h3>
                            <h4 class="cluster-grid__stat-label">Active Cluster Deployments</h4>
                        </div>
                        <p class="cluster-grid__blue-desc">
                            Join hundreds of businesses already running mission-critical
                            workloads on our cluster hosting, with consistent performance
                            and effortless scaling.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('template.hosting.feature.cluster')

    <div class="modal common--modal fade" id="diagramModal" tabindex="-1" aria-labelledby="diagtam" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="diagtam">Cluster Diagram</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="#" alt="" class="diagram-image">
                </div>
            </div>
        </div>
    </div>

    <div class="modal common--modal fade" id="orderModal" tabindex="-1" aria-labelledby="request" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="request">Cluster Setup Request</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('hosting.cluster.request') }}" class="mt-4" method="post">
                        @csrf
                        <input type="hidden" name="subject" id="subject">
                        <div class="row">
                            <div class="col-lg-12 form-group">
                                <label for="name" class="fs-15">Name</label>
                                <input type="text" name="name" class="form--control" id="name" autocomplete="off" required>
                            </div>
                            <div class="col-lg-12 form-group">
                                <label for="email" class="fs-15">Email</label>
                                <input type="email" name="email" class="form--control" id="email" autocomplete="off" required>
                            </div>
                            <div class="col-lg-12 form-group">
                                <label for="message" class="fs-15">Message</label>
                                <textarea name="message" class="form--control" id="message" autocomplete="off" required></textarea>
                            </div>
                            <div class="col-lg-12 form-group mb-0">
                                <button type="submit" class="btn btn--base w-100">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        (function($) {
            "use strict"

            $('.diagram').click(function() {
                var modal = $('#diagramModal');
                var imgpath = "{{ asset('assets/images/thumbs') }}";
                modal.find('.diagram-image').attr("src", imgpath + '/' + $(this).data('image'));
                modal.modal('show');
            });

            $('.order').click(function() {
                var modal = $('#orderModal');
                modal.find('input[name=subject]').val($(this).data('subject'));
                modal.modal('show');
            });

        })(jQuery);
    </script>
@endpush
