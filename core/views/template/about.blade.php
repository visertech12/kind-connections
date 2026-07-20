@extends('template.layouts.frontend')
@section('content')

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
                        <p class="section-heading__desc fs-16">As a leading provider of digital solutions, Unlock Themes specializes in a wide range of services to help businesses thrive in the ever-changing digital landscape.</p>
                        <div class="about-thumb mb-4 d-lg-none d-block w--md-75">
                            <img src="{{ asset('assets/images/thumbs/about-img.png') }}" alt="" class="fit-image">
                        </div> 
                        <p class="section-heading__desc"> Unlock Themes offers a comprehensive range of digital services to fuel your success. From web application development and mobile application development to UI/UX design, domain and hosting services, digital marketing, and tech consultancy, we cover all aspects of your digital journey. Our team of skilled professionals combines technical expertise and industry insights to deliver exceptional results in these areas. Whether you need a powerful web application, a user-friendly mobile app, captivating UI/UX design, reliable domain and hosting solutions, effective digital marketing strategies, or expert tech consultancy, Unlock Themes is your trusted partner. </p>
                        <p class="section-heading__desc">Partner with Unlock Themes to unlock your digital potential and achieve growth, innovation, and success in today's competitive digital market.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="counter pt-60 pb-120">
    <div class="container">
        <div class="counter-content">
            <div class="row gy-4 justify-content-center">
                <div class="col-md-4">
                    <div class="counter-item flex-align">
                        <div class="counter-item__icon flex-center">
                            <img src="{{ asset('assets/images/icons/counter-icon1.svg') }}" alt="">
                        </div>
                        <div class="counter-item__content">
                            <h2 class="counter-item__title"><span class="odometer" data-odometer-final="200">200</span>+</h2>
                            <p class="counter-item__desc">Total Product</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="counter-item flex-align">
                        <div class="counter-item__icon flex-center">
                            <img src="{{ asset('assets/images/icons/counter-icon2.svg') }}" alt="">
                        </div>
                        <div class="counter-item__content">
                            <h2 class="counter-item__title"><span class="odometer" data-odometer-final="40">40</span>+</h2>
                            <p class="counter-item__desc">Team Member</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="counter-item flex-align">
                        <div class="counter-item__icon flex-center">
                            <img src="{{ asset('assets/images/icons/counter-icon3.svg') }}" alt="">
                        </div>
                        <div class="counter-item__content">
                            <h2 class="counter-item__title"><span class="odometer" data-odometer-final="14">14</span>K+</h2>
                            <p class="counter-item__desc">Total Sales</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="most-achievement pt-120 pb-60 section-bg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h2 class="section-heading__title"> Our Outstanding <span class="shape"> Successes </span> </h2>
                    <p class="section-heading__desc"> Take a look at our Envato Marketplace badges, showcasing our dedication to top-notch digital solutions and customer satisfaction. </p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-11">
                <div class="most-achievement-card-wrapper flex-center">
                    <div class="most-achievement-card flex-align">
                        <div class="most-achievement-card__thumb">
                            <img src="{{ asset('assets/images/thumbs/achievement-1.svg') }}" alt="">
                        </div>
                        <div class="most-achievement-card__content">
                            <h4 class="most-achievement-card__title">Power Elite Author&nbsp;</h4>
                            <div class="most-achievement-card__logo">
                                <img src="{{ asset('assets/images/thumbs/envato-logo.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="most-achievement-card flex-align">
                        <div class="most-achievement-card__thumb">
                            <img src="{{ asset('assets/images/thumbs/achievement-4.svg') }}" alt="">
                        </div>
                        <div class="most-achievement-card__content">
                            <h4 class="most-achievement-card__title">7 Years of Membership</h4>
                            <div class="most-achievement-card__logo">
                                <img src="{{ asset('assets/images/thumbs/envato-logo.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="most-achievement-card flex-align">
                        <div class="most-achievement-card__thumb">
                            <img src="{{ asset('assets/images/thumbs/achievement-8.svg') }}" alt="">
                        </div>
                        <div class="most-achievement-card__content">
                            <h4 class="most-achievement-card__title">Author Level 12</h4>
                            <div class="most-achievement-card__logo">
                                <img src="{{ asset('assets/images/thumbs/envato-logo.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="most-achievement-card flex-align">
                        <div class="most-achievement-card__thumb">
                            <img src="{{ asset('assets/images/thumbs/achievement-13.svg') }}" alt="">
                        </div>
                        <div class="most-achievement-card__content">
                            <h4 class="most-achievement-card__title">Monthly Top Seller</h4>
                            <div class="most-achievement-card__logo">
                                <img src="{{ asset('assets/images/thumbs/envato-logo.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="most-achievement-card flex-align">
                        <div class="most-achievement-card__thumb">
                            <img src="{{ asset('assets/images/thumbs/achievement-10.svg') }}" alt="">
                        </div>
                        <div class="most-achievement-card__content">
                            <h4 class="most-achievement-card__title">Featured Author</h4>
                            <div class="most-achievement-card__logo">
                                <img src="{{ asset('assets/images/thumbs/envato-logo.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
