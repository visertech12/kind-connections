@php
$seodata['description'] = 'Premium shared hosting from Unlock Themes offers reliable cPanel web hosting with advanced features, affordable plans, and managed support for your site.';
$seodata['keyword'] = 'premium shared hosting service, cpanel web hosting, web hosting service, reliable hosting provider, managed shared hosting, affordable website hosting, best shared hosting, cheap website hosting, cheapest website hosting, cheap web hosting server, shared hosting with advanced features';
$seodata['title'] = $general->sitename.' - '.($page_title ?? 'Premium Hosting').' | Best Hosting Services';
@endphp
@extends('template.layouts.frontend',['seodata' => $seodata])
@section('content')

<section class="pricing-plan py-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2 class="section-heading__title"> Our Premium Hosting <span class="shape"> Plans </span> </h2>
                    <p class="section-heading__desc">Experience seamless premium hosting with our NVMe SSD based solutions. Bid farewell to concerns about backups, speed, and uptime. Benefit from ECC RAM, Jet-Backup, Cloudlinux, Kernel care, Litespeed, and top-tier hardware deployed across multiple data centers. Rest assured and focus on your priorities as we handle the technical aspects.</p>
                </div>
                <div class="dc-location mb-lg-4 mb-3">
                    <a href="{{route('hosting.premium')}}" class="{{menuActive('hosting.premium')}}">USA</a>
                    <a href="{{route('hosting.premium.sg')}}" class="{{menuActive('hosting.premium.sg')}}">Singapore</a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="row gy-4 justify-content-center">

                    @if(!empty($plans))
                    @foreach($plans as $plan)

                    <div class="col-lg-4 col-sm-6 col-msm-6">
                        <div class="pricing-plan-item transition">
                            <h5 class="pricing-plan-item__title">{{$plan->name}}</h5>
                            <h3 class="pricing-plan-item__price"> ${{$plan->pricing->USD->annually}} <span class="text fs-14">Yearly</span> </h3>
                            <a href="{{route('hosting.order',$plan->pid)}}" class="btn btn--gray btn--md outline w-100">GET IT NOW</a>
                            <div class="pricing-plan-item__list">
                                <ul class="text-list underlined">

                                    @foreach(preg_split("/((\r?\n)|(\r\n?))/", $plan->description) as $line)
                                    <li class="text-list__item"> <span class="icon"><i class="far fa-check"></i></span> {{$line}}</li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>

                    @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>

@include('template.hosting.feature.common')
@include('template.hosting.feature.premium')
@endsection
