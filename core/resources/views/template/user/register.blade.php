@extends('template.layouts.master')
@php
    $page_title = 'Unlock Themes - Create a Free Account';
    $seo_title = 'Unlock Themes - Create a Free Account';
    $seo_description = 'Register a free Unlock Themes account to purchase premium PHP Laravel scripts, themes, and access exclusive digital services.';
    $seo_keywords = 'Unlock Themes register, create account, sign up, new account, join Unlock Themes';
@endphp
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
                        <p class="account-content__member-text">Already have an account?  </p>
                        <a href="{{route('user.login')}}@if(request()->has('redirect'))?redirect={{ urlencode(request()->get('redirect')) }}@endif" class="btn btn--account"> Login </a>
                    </div>
                </div>
                <div class="account-form">
                    <h2 class="account-form__title">Register an Account</h2>
                    <p class="account-form__desc fs-18">&nbsp;</p>
                    <div class="continue-google">
                        <p class="continue-google__text fs-16">Continue with: </p>
                        <a href="{{route('user.social.login','google')}}" class="btn btn--google fs-18 w-100"> <img src="{{asset('assets/images/icons/google.svg')}}" alt="" class="icon"> Register with Google</a>
                    </div>
                    <div class="other-option">
                        <span class="other-option__text fs-12">OR</span>
                    </div>

                    <form action="{{route('user.register')}}" method="post">
                        @csrf
                        @if(request()->has('redirect'))
                            <input type="hidden" name="redirect" value="{{ request()->get('redirect') }}">
                        @endif
                        <div class="row">
                            <div class="col-sm-6 col-xsm-6 form-group">
                                <label for="firstName">First name</label>
                                <input type="text" name="firstname"  value="{{old('firstname')}}" class="form--control" id="firstName" autocomplete="off" required>
                            </div>
                            <div class="col-sm-6 col-xsm-6 form-group">
                                <label for="lastName">Last name</label>
                                <input type="text" name="lastname"  value="{{old('lastname')}}" class="form--control" id="lastName" autocomplete="off" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" value="{{old('email')}}" class="form--control" id="email" autocomplete="off" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" value="{{old('username')}}" class="form--control" id="username" autocomplete="off" pattern="[A-Za-z0-9_-]{3,40}" title="Letters, numbers, dashes and underscores only (min 3 chars)" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form--control" id="password" autocomplete="off" required>
                            </div>

                            <div class="col-sm-12 form-group">
                                <button type="submit" class="btn btn--base fs-18 w-100">Register</button>
                            </div>
                            <div class="col-sm-12">
                                <p class="policy-privacy fs-13">
                                    By proceeding with the registration process, you agree to the 
                                    <a href="{{route('privacy')}}" target="_blank" class="text">Privacy Policy</a>,
                                    <a href="{{route('refund')}}" target="_blank" class="text">Refund Policy</a>, and 
                                    <a href="{{route('tos')}}" target="_blank" class="text">Terms of Service</a>
                                </p>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section> 

@endsection

