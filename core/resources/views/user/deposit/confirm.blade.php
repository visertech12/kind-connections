@extends('user.layouts.app')

@section('panel')

<div class="pt-60 pb-60 bg--light section-full">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="card custom--card style-two">

                    <div class="card-header">

                        <h6 class="card-title text-center">{{ __($pageTitle) }}</h6>

                    </div>

                    <div class="card-body">

                        <form action="{{ route('user.deposit.insert') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <input type="hidden" name="gateway" value="{{ $gatewayCurrency->method_code }}">

                            <input type="hidden" name="method_currency" value="{{ $gatewayCurrency->currency }}">

                            <input type="hidden" name="amount" value="{{ $amount }}">

                            <div class="row">

                                <div class="col-md-12 text-center">

                                    <p class="text-center mt-2">@lang('You have requested') <b class="text-success">{{ showAmount($amount) }} {{ gs('cur_text') }}</b>, @lang('Please pay')

                                        <b class="text-success">{{ showAmount($amount, false) . ' ' . $gatewayCurrency->currency }}</b> @lang('for successful payment')

                                    </p>

                                    <h4 class="text-center mb-4">@lang('Please follow the instruction below')</h4>

                                    <p class="my-4 text-center">{!! $gatewayCurrency->method->description ?? '<em>No instructions provided. Please contact support.</em>' !!}</p>

                                </div>



                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label class="form--label">@lang('Transaction Reference / Note')</label>

                                        <textarea name="note" class="form--control form-control" rows="2" placeholder="@lang('e.g. Bank transfer ref: TXN123456')"></textarea>

                                    </div>

                                </div>



                                <div class="col-md-12 mt-3">

                                    <div class="form-group">

                                        <label class="form--label">@lang('Payment Proof') <span class="text--danger">*</span></label>

                                        <input type="file" name="proof" class="form--control form-control" accept=".jpg,.jpeg,.png,.pdf" required>

                                        <small class="text-muted">@lang('Upload screenshot or receipt (jpg, png, pdf; max 4MB).')</small>

                                    </div>

                                </div>



                                <div class="col-md-12 mt-4">

                                    <div class="form-group">

                                        <button type="submit" class="btn btn--base w-100">@lang('Pay Now')</button>

                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
