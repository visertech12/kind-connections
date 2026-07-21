@php
$seodata['description'] = 'Register your perfect domain name with Unlock Themes. Easy, fast domain registration with competitive pricing and instant activation.';
$seodata['keyword'] = 'domain registration, buy domain name, domain name search, cheap domain, register domain, domain name provider';
$seodata['title'] = $general->sitename.' - Domain Name Registration | Secure Your Domain';
@endphp
@extends('template.layouts.frontend',['seodata' => $seodata])
@section('content')

<section class="contact py-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2 class="section-heading__title"> Domain <span class="shape"> Registration </span> </h2>
                    <p class="section-heading__desc">Secure your preferred domain names through a straightforward and hassle-free registration process. Find the perfect domain for your brand and take your business online today.</p>
                </div>
            </div>
        </div>

        <div class="row gy-4 mt-4">
            <div class="col-lg-8">
                <div class="contact-form">
                    <h4 class="contact-form__title mb-4">Search for Your <span class="shape">Domain Name</span></h4>
                    <form action="{{route('contact.send')}}" method="post">
                        @csrf
                        <input type="hidden" name="subject" value="Domain Registration Inquiry">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-xsm-6 form-group">
                                <label class="fs-15">Your Name</label>
                                <input type="text" name="name" class="form--control" autocomplete="off" required>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-xsm-6 form-group">
                                <label class="fs-15">Email Address</label>
                                <input type="email" name="email" class="form--control" autocomplete="off" required>
                            </div>
                            <div class="col-lg-12 form-group">
                                <label class="fs-15">Desired Domain Name(s)</label>
                                <input type="text" name="message" class="form--control" placeholder="e.g. mycompany.com, mystore.net" autocomplete="off" required>
                            </div>
                            <div class="col-lg-12 form-group mb-0">
                                <button type="submit" class="btn btn--base w-100">CHECK AVAILABILITY</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="offer-item p-4">
                    <h5 class="offer-item__title mb-4">Popular Extensions</h5>
                    <ul class="text-list underlined">
                        <li class="text-list__item d-flex justify-content-between"><span>.com</span><strong class="text--base">$12.99/yr</strong></li>
                        <li class="text-list__item d-flex justify-content-between"><span>.net</span><strong class="text--base">$13.99/yr</strong></li>
                        <li class="text-list__item d-flex justify-content-between"><span>.org</span><strong class="text--base">$13.99/yr</strong></li>
                        <li class="text-list__item d-flex justify-content-between"><span>.io</span><strong class="text--base">$39.99/yr</strong></li>
                        <li class="text-list__item d-flex justify-content-between"><span>.co</span><strong class="text--base">$24.99/yr</strong></li>
                        <li class="text-list__item d-flex justify-content-between"><span>.info</span><strong class="text--base">$9.99/yr</strong></li>
                        <li class="text-list__item d-flex justify-content-between"><span>.biz</span><strong class="text--base">$14.99/yr</strong></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row gy-4 mt-5">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2 class="section-heading__title">Why Register With <span class="shape">Us?</span></h2>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="offer-item p-4">
                    <div class="offer-item__icon"><i class="fa-regular fa-globe fs-40 text--base mb-3 d-block"></i></div>
                    <h5 class="offer-item__title">Instant Activation</h5>
                    <p class="offer-item__desc">Your domain goes live immediately after registration — no waiting periods.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="offer-item p-4">
                    <div class="offer-item__icon"><i class="fa-light fa-shield-halved fs-40 text--base mb-3 d-block"></i></div>
                    <h5 class="offer-item__title">WHOIS Privacy</h5>
                    <p class="offer-item__desc">Free domain privacy protection to keep your personal information secure.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="offer-item p-4">
                    <div class="offer-item__icon"><i class="fa-light fa-headset fs-40 text--base mb-3 d-block"></i></div>
                    <h5 class="offer-item__title">24/7 Support</h5>
                    <p class="offer-item__desc">Our support team is always here to help with DNS, transfers, and renewals.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
