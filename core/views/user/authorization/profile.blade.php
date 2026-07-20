<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page_title ?? 'Complete Your Profile' }}</title>
    <link rel="stylesheet" href="https://unlockthemes.com/assets/user/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unlockthemes.com/assets/user/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="https://unlockthemes.com/assets/template/css/main.css">
</head>
<body>

<div class="body-overlay"></div>
<div class="sidebar-overlay"></div>

<section class="contact py-120">
    <div class="container">
        <div class="row gy-4 justify-content-center">
            <div class="col-lg-8">
                <div class="contact-form">
                    <h2 class="contact-form__title">Complete Your <span class="shape"> Profile</span> </h2>
                    <p class="contact-form__desc">&nbsp;</p>
                    
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('user.profile.complete.submit') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="country" class="fs-15">Country</label>
                                <select name="country" id="country" class="form--control form-select" required>
                                    <option data-mobile_code="93" data-country_name="Afghanistan" value="Afghanistan">Afghanistan</option>
                                    <option data-mobile_code="1" data-country_name="United States" value="United States">United States</option>
                                    <option data-mobile_code="44" data-country_name="United Kingdom" value="United Kingdom">United Kingdom</option>
                                    <option data-mobile_code="880" data-country_name="Bangladesh" value="Bangladesh">Bangladesh</option>
                                    <option data-mobile_code="91" data-country_name="India" value="India">India</option>
                                    <option data-mobile_code="92" data-country_name="Pakistan" value="Pakistan">Pakistan</option>
                                    <!-- Add more countries here or use a dynamic list if available -->
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="mobile" class="fs-15">Mobile</label>
                                <div class="input-group">
                                    <span class="input-group-text country_code_display bg-white">+</span>
                                    <input type="tel" name="mobile" id="mobile" value="{{ old('mobile') }}" autocomplete="off" class="form--control form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="address" class="fs-15">Address</label>
                                <input type="text" name="address" id="address" value="{{ old('address') }}" autocomplete="off" class="form--control" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="city" class="fs-15">City</label>
                                <input type="text" name="city" id="city" value="{{ old('city') }}" autocomplete="off" class="form--control" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="region" class="fs-15">State/Region</label>
                                <input type="text" name="region" id="region" value="{{ old('region') }}" autocomplete="off" class="form--control" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="zip_code" class="fs-15">ZIP/Postal Code</label>
                                <input type="text" name="zip_code" id="zip_code" value="{{ old('zip_code') }}" autocomplete="off" class="form--control" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="username" class="fs-15">Username</label>
                                <input type="text" name="username" value="{{ old('username', auth('web')->user()->username) }}" id="username" autocomplete="off" class="form--control" required>
                            </div>
                            <div class="col-lg-12 form-group mb-0 mt-3">
                                <button type="submit" class="btn btn--base w-100">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://unlockthemes.com/assets/user/js/jquery-3.6.3.min.js"></script>
<script>
    "use strict";
    $(document).ready(function() {
        $('select[name=country]').on('change', function() {
            var code = $('select[name=country] :selected').data('mobile_code');
            $(".country_code_display").text('+' + code);
        }).change();
    });
</script>

</body>
</html>
