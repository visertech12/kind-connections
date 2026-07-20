@extends('template.layouts.frontend')

@section('title', $page_title . ' — Unlock Themes')

@push('style')
<style>
  .order-preloader-wrapper {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: hsl(var(--base-two)/0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 999;
  }
  .order-preloader {
    height: 50px;
    width: 70px;
    overflow: hidden;
  }
  .order-preloader i {
    display: block;
    width: 16px;
    height: 16px;
    background: black;
    border-radius: 16px;
    position: absolute;
    top: 50%;
    left: 50%;
    margin: -8px 0 0 -8px;
    opacity: 1;
    -webkit-transform: translate3d(60px, 0, 0);
    overflow: hidden;
    text-indent: -9999px;
    border: 1px solid white;
    z-index: 999999
  }
  .order-preloader i:nth-child(1) {
    background: hsl(var(--base));
    -webkit-animation: google 1.75s ease-in-out infinite;
    -moz-animation: google 1.75s ease-in-out infinite;
    -ms-animation: google 1.75s ease-in-out infinite;
    -o-animation: google 1.75s ease-in-out infinite;
    animation: google 1.75s ease-in-out infinite;
  }
  .order-preloader i:nth-child(2) {
    background: hsl(var(--base));
    -webkit-animation: google 1.75s ease-in-out infinite 0.3s;
    -moz-animation: google 1.75s ease-in-out infinite 0.3s;
    -ms-animation: google 1.75s ease-in-out infinite 0.3s;
    -o-animation: google 1.75s ease-in-out infinite 0.3s;
    animation: google 1.75s ease-in-out infinite 0.3s;
  }
  .order-preloader i:nth-child(3) {
    background: hsl(var(--base));
    -webkit-animation: google 1.75s ease-in-out infinite 0.6s;
    -moz-animation: google 1.75s ease-in-out infinite 0.6s;
    -ms-animation: google 1.75s ease-in-out infinite 0.6s;
    -o-animation: google 1.75s ease-in-out infinite 0.6s;
    animation: google 1.75s ease-in-out infinite 0.6s;
  }

  @-webkit-keyframes google {
    0% { opacity: 0; -webkit-transform: translate3d(-60px, 0, 0); transform: translate3d(-60px, 0, 0); }
    30% { opacity: 1; -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); }
    70% { opacity: 1; -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); }
    100% { opacity: 0; -webkit-transform: translate3d(300px, 0, 0); transform: translate3d(300px, 0, 0); }
  }
  @keyframes google {
    0% { opacity: 0; transform: translate3d(-60px, 0, 0); }
    30% { opacity: 1; transform: translate3d(0, 0, 0); }
    70% { opacity: 1; transform: translate3d(0, 0, 0); }
    100% { opacity: 0; transform: translate3d(300px, 0, 0); }
  }
</style>
@endpush

@section('content')
<section class="choose-domain py-120">
  <div class="container">
    <div class="row justify-content-center gy-4">
      <div class="col-lg-8 pe-xl-5">
        <div class="choose-domain__content">
          @php
              $price = $license == 1 
                  ? $product->regular_price 
                  : (!empty($product->attributes['Extended Price']) ? $product->attributes['Extended Price'] : $product->regular_price * 6);

              $supportPrice = $price * 0.3; // 30% of price
              $supportPromo = $supportPrice * 0.8; // 20% discount

              $total = $price;
              if($extend_support) {
                  $total += $supportPromo;
              }
          @endphp

          <div class="choose-domain-item flex-between">
            <div class="choose-domain-item__left">
              <h5 class="choose-domain-item__title">{{ $product->name }}</h5>
              <p class="choose-domain-item__desc fs-14">{{ $product->category->name ?? 'Digital Product' }}</p>

              <p class="text-muted fs-12 mt-3">License Type: <strong class="text-dark">{{ $license == 1 ? 'Regular' : 'Extended' }} License</strong></p>
              @if($extend_support)
              <p class="text-muted fs-12">Support: <strong class="text-dark">Extended Support (6 months)</strong> (+${{ number_format($supportPromo, 2) }})</p>
              @else
              <p class="text-muted fs-12">Support: <strong class="text-dark">Standard Support (3 months)</strong></p>
              @endif
            </div>
            <div class="choose-domain-item__right flex-align">
              <div class="choose-domain-item__content">
                <h5 class="choose-domain-item__price">${{ getAmount($price) }}</h5>
                <span class="choose-domain-item__time fs-14">One-time payment</span>
              </div>
              <div class="choose-domain-item__delete">
                <a href="{{ url()->previous() }}" class="delete-button fs-13 flex-center" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><i class="fas fa-trash-alt"></i></a>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      <div class="col-lg-4 ps-xl-5">
        <div class="choose-domain sidebar">
          <h4 class="sidebar__title">Order Summary</h4>
          <ul class="total-list">
            <li class="total-list__item flex-between"> <span class="text">Item Price</span> <span class="fw-bold">${{ getAmount($price) }}</span> </li>
            @if($extend_support)
            <li class="total-list__item flex-between"> <span class="text">Support Upgrade</span> <span class="fw-bold">${{ number_format($supportPromo, 2) }}</span> </li>
            @endif
            <li class="total-list__item flex-between mt-2 pt-2 border-top"> <span class="text">Total</span> <span class="fw-bold">${{ number_format($total, 2) }}</span> </li>
            <li class="total-list__item flex-between"> <span class="text">Total due today</span> <span class="fw-bold">${{ number_format($total, 2) }}</span> </li>
          </ul>
          <div class="sidebar__form">
            <form action="{{ route('user.product.order', $product->slug) }}" method="post" id="placeOrderForm">
              @csrf
              <input type="hidden" name="license" value="{{ $license }}">
              <input type="hidden" name="extend_support" value="{{ $extend_support ? 1 : 0 }}">
              
              <div class="form-group">
                <input type="text" name="promo" class="form--control" placeholder="Coupon Code (optional)">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn--base w-100 placeOrder">PLACE ORDER</button>
              </div>
            </form>
          </div>
        </div>
      </div> 
    </div>
  </div>
</section>

<div class="order-preloader-wrapper d-none">
  <div class="order-preloader-inner text-center">
    <h4 class="text-white">Your order is processing...</h4>
    <div class="order-preloader mx-auto position-relative mt-3">
      <i>.</i>
      <i>.</i>
      <i>.</i>
    </div>
  </div>
</div>
@endsection

@push('script')
<script>
    $('.placeOrder').on('click', function(e) {
        e.preventDefault();
        $('.order-preloader-wrapper').removeClass('d-none');
        // Simulate order processing for now
        setTimeout(() => {
            $('#placeOrderForm').submit();
        }, 2000);
    });
</script>
@endpush
