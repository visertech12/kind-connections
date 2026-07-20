@extends('template.layouts.frontend')
@section('content')

<section class="contact py-120">
    <div class="container">
        <div class="row gy-4 align-items-center">
            <div class="col-lg-6 pe-lg-5 d-none d-lg-block">
                <div class="contact-thumb">
                    <img src="{{asset('assets/images/thumbs/contact.svg')}}" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-form">
                    <h2 class="contact-form__title">Contact <span class="shape"> with us.</span> </h2>
                    <p class="contact-form__desc">Please feel free to reach out to us in any situation. We truly value your feedback and would be delighted to hear from you.</p>
                    <form action="{{route('contact.send')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-xsm-6 form-group">
                                <label for="name" class="fs-15">Name</label>
                                <input type="text" name="name" class="form--control" id="name" autocomplete="off" required>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-xsm-6 form-group">
                                <label for="email" class="fs-15">Email</label>
                                <input type="email" name="email" class="form--control" id="email" autocomplete="off" required>
                            </div>
                            <div class="col-lg-12 form-group">
                                <label for="subject" class="fs-15">Subject</label>
                                <input type="text" name="subject" class="form--control" id="subject" autocomplete="off" required>
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
</section>

@endsection

