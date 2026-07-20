@php
    $seo = config('seo.hosting.order.review', config('seo.default', []));
    $seodata['title']       = $seo['title'] ?? '';
    $seodata['description'] = $seo['description'] ?? '';
    $seodata['keyword']     = $seo['keyword'] ?? '';
    $seodata['image']       = $seo['image'] ?? '';
@endphp
@extends('template.layouts.frontend', ['seodata' => $seodata])
@section('content')

<section class="py-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2 class="section-heading__title"> Your Hosting <span class="shape"> Order Review </span> </h2>
                    <p class="section-heading__desc">Review the hosting services in your cart before proceeding to checkout.</p>
                </div>
            </div>
        </div>

        <div class="row gy-4 mt-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="mb-4">Order Items</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Service</th>
                                        <th>Plan</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Premium Hosting</td>
                                        <td>Pro Plan</td>
                                        <td>$199.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="mb-4">Order Summary</h5>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Items (1)</span>
                            <strong>$199.00</strong>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-4">
                            <strong>Total</strong>
                            <strong class="text--base">$199.00</strong>
                        </div>
                        <a href="{{route('user.login')}}" class="btn btn--base w-100">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
