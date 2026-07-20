@extends('template.layouts.frontend')
@section('content')

<section class="support py-4">
  <div class="container">
    <div class="support__inner py-120">
      <div class="row gy-4 align-items-center">
        <div class="col-lg-6">
          <div class="support-content">
            <div class="section-heading style-left">
              <h2 class="section-heading__title"> Welcome to  <span class="shape"> Unlock Themes Support.</span> </h2>
              <p class="section-heading__desc fs-16">We put special emphasis on customer support. Our dedicated support team is waiting to assist you.  We always try to give you a better support experience.</p>
            </div>
            <div class="support-time flex-align">
              <div class="support-time__icon">
                <img src="{{ asset('assets/images/icons/stop-watch.svg') }}" alt="">
              </div>
              <div class="support-time__text"> 
                <strong class="support-time__title text-black d-block">Support Time</strong>
                <small class="text-black  fw-bold">Saturday to Thursday <br> 5:00AM - 2:00PM (GMT)</small>
                <p class="text--base">Friday is our weekly holiday!</p>
              </div>
            </div>
            <div class="login-btn-area mt-sm-5 mt-4">
              <p>To keep our support system efficient and seamless and to keep your data safe and secure, we only keep this page accessible only for registered users.</p>

              <a href="{{ route('user.ticket.new') ?? '#' }}" class="btn btn--base mt-3">Get Support <i class="far fa-long-arrow-right ms-2"></i></a>
              
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-10 d-lg-block d-none">
          <div class="support-thumb">
            <img src="{{ asset('assets/images/thumbs/support.svg') }}" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
