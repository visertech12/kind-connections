@php
$seodata['description'] = 'Register your perfect domain name with Unlock Themes. Easy, fast domain registration with competitive pricing and instant activation.';
$seodata['keyword'] = 'domain registration, buy domain name, domain name search, cheap domain, register domain, domain name provider';
$seodata['title'] = $general->sitename.' - Domain Name Registration | Secure Your Domain';
@endphp
@extends('template.layouts.frontend',['seodata' => $seodata])
@section('content')

<section class="contact py-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="section-heading">
                    <h2 class="section-heading__title"> Domain <span class="shape"> Registration </span> </h2>
                    <p class="section-heading__desc">Find and register your perfect domain name in seconds.</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-lg-8">
                <div class="contact-form">
                    <form action="{{route('contact.send')}}" method="post">
                        @csrf
                        <input type="hidden" name="subject" value="Domain Registration Inquiry">
                        <input type="hidden" name="name" value="{{ auth()->user()->fullname ?? 'Guest' }}">
                        <input type="hidden" name="email" value="{{ auth()->user()->email ?? 'guest@site.com' }}">
                        <div class="row g-2 align-items-stretch">
                            <div class="col-md-9 form-group mb-0">
                                <input type="text" name="message" class="form--control" placeholder="Enter your desired domain name" autocomplete="off" required>
                            </div>
                            <div class="col-md-3 form-group mb-0">
                                <button type="submit" class="btn btn--base w-100">Search</button>
                            </div>
                        </div>
                    </form>

                    <ul class="text-list d-flex flex-wrap justify-content-center gap-3 mt-4 mb-0 list-unstyled">
                        <li><span class="text--muted">.com</span> <strong class="text--base">$12.99</strong></li>
                        <li><span class="text--muted">.net</span> <strong class="text--base">$13.99</strong></li>
                        <li><span class="text--muted">.org</span> <strong class="text--base">$13.99</strong></li>
                        <li><span class="text--muted">.io</span> <strong class="text--base">$39.99</strong></li>
                        <li><span class="text--muted">.co</span> <strong class="text--base">$24.99</strong></li>
                        <li><span class="text--muted">.info</span> <strong class="text--base">$9.99</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
