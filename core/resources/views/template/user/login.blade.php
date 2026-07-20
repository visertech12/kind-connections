@extends('template.layouts.master')
@php
    $page_title = 'Unlock Themes - Login to Your Account';
    $seo_title = 'Unlock Themes - Login to Your Account';
    $seo_description = 'Log in to your Unlock Themes account to manage your purchased scripts, licenses, support tickets, and hosting services.';
    $seo_keywords = 'Unlock Themes login, sign in, account access, script dashboard, member login';
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
						<p class="account-content__member-text">Do not have an account yet?</p>
						<a href="{{route('user.register')}}@if(request()->has('redirect'))?redirect={{ urlencode(request()->get('redirect')) }}@endif" class="btn btn--account"> Register </a>
					</div>
				</div>

				<div class="account-form">
					<h2 class="account-form__title">Account Login</h2>
					<p class="account-form__desc fs-18">&nbsp;</p>

					<div class="continue-google">
						<p class="continue-google__text fs-16">Continue with Google: </p>
						<a href="{{route('user.social.login','google')}}" class="btn btn--google fs-18 w-100"> <img src="{{asset('assets/images/icons/google.svg')}}" alt="" class="icon"> Login with Google</a>
					</div>

					<div class="other-option">
						<span class="other-option__text fs-12">OR</span>
					</div>
					
					<form action="{{ route('user.login') }}" method="post">
						@csrf
						@if(request()->has('redirect'))
							<input type="hidden" name="redirect" value="{{ request()->get('redirect') }}">
						@endif

						<div class="row">
							<div class="col-md-12 form-group">
								<label for="username">Username or Email</label>
								<input type="text" class="form--control" id="username" name="username" value="{{ old('username') }}" required>
							</div>
							<div class="col-md-12 form-group">
								<div class="flex-between">
									<label for="password" class="form--label fs-16">Password</label>
									<a href="{{route('user.password.forgot')}}" class="text--base text-decoration-underline">Forgot Password?</a>
								</div>
								<div class="position-relative">
									<input type="password" class="form--control" id="password" name="password" required>
								</div>
							</div>
							<div class="col-sm-12 form-group">
								<button type="submit" class="btn btn--base w-100 fs-18">Login</button>
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</section> 

@endsection
