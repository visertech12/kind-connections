@extends('template.layouts.frontend')
@section('content')

<section class="inner-page-hero bg--base">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="text-white">Book a Meeting</h1>
                <p class="text-white fs-16 mt-3">Schedule a session to discuss your goals with our expert team.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-heading mb-5">
                    <h2 class="section-heading__title">Schedule a <span class="shape">Meeting</span></h2>
                    <p class="section-heading__desc">Let's connect and talk about how we can help you achieve your digital goals. Fill out the form below and we'll be in touch to confirm your appointment.</p>
                </div>
                @include('template.partials.meeting')
            </div>
        </div>
    </div>
</section>

@endsection
