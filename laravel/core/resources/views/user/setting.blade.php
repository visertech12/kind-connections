@extends('user.layouts.app')
@section('panel')
    <div class="row gy-4">
        <div class="col-md-12">
            <div class="custom--card card h-auto">
                <div class="card-header d-flex flex-wrap align-items-center gap-2">
                    <h2 class="card-header__title">Your Profile</h2>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-3 col-sm-6">
                            <div class="information-item">
                                <h6 class="information-item__title">First Name</h6>
                                <p class="information-item__text">{{ $user->firstname }} </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="information-item">
                                <h6 class="information-item__title">Last Name</h6>
                                <p class="information-item__text">{{ $user->lastname }} </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="information-item">
                                <h6 class="information-item__title">Email</h6>
                                <p class="information-item__text">{{ $user->email }}</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="information-item">
                                <h6 class="information-item__title">Mobile</h6>
                                <p class="information-item__text">+{{ $user->country_code }}{{ $user->mobile }}</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="information-item">
                                <h6 class="information-item__title">Address</h6>
                                <p class="information-item__text">{{ @$user->address->address }} </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="information-item">
                                <h6 class="information-item__title">City</h6>
                                <p class="information-item__text">{{ @$user->address->city }} </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="information-item">
                                <h6 class="information-item__title">State</h6>
                                <p class="information-item__text">{{ @$user->address->state }} </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="information-item">
                                <h6 class="information-item__title">Postcode/Zip</h6>
                                <p class="information-item__text">{{ @$user->address->zip }} </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="information-item">
                                <h6 class="information-item__title">Country</h6>
                                <p class="information-item__text">{{ @$user->address->country }} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="custom--card card h-auto mb-3">
                <div class="card-header d-flex flex-wrap align-items-center gap-2">
                    <h2 class="card-header__title">Update Profile</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.profile') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname" class="form--label">First Name</label>
                                    <input type="text" class="form--control" id="firstname" name="firstname" value="{{ $user->firstname }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname" class="form--label">Last Name</label>
                                    <input type="text" class="form--control" id="lastname" name="lastname" value="{{ $user->lastname }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="mkt_mail" class="form--label"> Email Preference</label>
                                    <select id="mkt_mail" name="mkt_mail" class="form-select form--control">
                                        <option value="1" @if ($user->mkt_mail == 1) selected @endif>I am okay with promo emails from {{ gs('site_name') }}</option>
                                        <option value="0" @if ($user->mkt_mail == 0) selected @endif>Please do not send any promo email.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn--base w-100">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">

            <div class="custom--card card h-auto">
                <div class="card-header d-flex flex-wrap align-items-center gap-2">
                    <h2 class="card-header__title">Change Password</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.password') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="current_password" class="form--label">Old Password</label>
                                    <input type="password" class="form--control" id="current_password" name="current_password" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="form--label">New Password</label>
                                    <input type="password" class="form--control" id="password" name="password" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation" class="form--label">Confirm Password</label>
                                    <input type="password" class="form--control" id="password_confirmation" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn--base w-100">Change</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
