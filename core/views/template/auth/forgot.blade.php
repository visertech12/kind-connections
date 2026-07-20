@extends('template.layouts.master')
@section('element')

<section class="account">
    <div class="account__inner flex-wrap">

        <div class="account-left flex-wrap">
            <div class="account-left__thumb">
                <img src="{{asset('assets/images/thumbs/account-img.png')}}" alt="" class="fit-image">
            </div>
            <div class="account-left__content">
                <h2 class="account-left__title">360 Degree Solution For Your <span class="text--base">Digital Business</span> </h2>
                <p class="account-left__desc fs-18">Ignite digital success with our 360-Degree solution. We provide everything from concept to design and development, domain and hosting to marketing. Trust us as your partner in the journey to your success.</p>

                <ul class="technology-tag-list flex-align">
                    <li class="technology-tag-list__item">
                        <a href="{{route('service.web')}}" class="technology-tag-list__link fs-16">Web Application</a>
                    </li>
                    <li class="technology-tag-list__item">
                        <a href="{{route('service.app')}}" class="technology-tag-list__link fs-16">Mobile Application</a>
                    </li>
                    <li class="technology-tag-list__item">
                        <a href="{{route('service.uiux')}}" class="technology-tag-list__link fs-16">UI/UX Design</a>
                    </li>
                    <li class="technology-tag-list__item">
                        <a href="{{route('service.hosting')}}" class="technology-tag-list__link fs-16">Domain & Hosting</a>
                    </li>
                    <li class="technology-tag-list__item">
                        <a href="{{route('service.marketing')}}" class="technology-tag-list__link fs-16">Digital Marketing</a>
                    </li>
                    <li class="technology-tag-list__item">
                        <a href="{{route('service.consultancy')}}" class="technology-tag-list__link fs-16">Tech Consultancy</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="account-right">
            <div class="account-content">
                <div class="account-content__top flex-between">
                    <div class="account-content__logo">
                        <a href="{{route('home')}}" class="link"> <img src="{{asset('assets/images/logoIcon/logo-dark.png')}}" alt=""></a>
                    </div>
                    <div class="account-content__member flex-align">
                        <p class="account-content__member-text">Remember your password?</p>
                        <a href="{{route('user.login')}}" class="btn btn--account"> Login </a>
                    </div>
                </div>

                <div class="account-form">
                    <h2 class="account-form__title">Forgot Password</h2>
                    <p class="account-form__desc fs-18">Enter your email address or username and we'll send you instructions to reset your password.</p>
                    
                    <form action="#" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="username">Username or Email</label>
                                <input type="text" class="form--control" id="username" name="username" value="{{ old('username') }}" required>
                            </div>
                            <div class="col-sm-12 form-group">
                                <button type="submit" class="btn btn--base w-100 fs-18">Send Reset Link</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section> 

@endsection
