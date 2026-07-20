@extends('template.layouts.frontend')

@php
    $attrs           = $product->getAttribute('attributes') ?: [];
    $seo_title       = $product->seo_title
                         ?: ($product->name . ' — Unlock Themes');
    $seo_description = $product->seo_description
                         ?: Str::limit(strip_tags($product->description), 160);
    $seo_keywords    = $product->seo_keywords
                         ?: (!empty($attrs['Tags']) ? $attrs['Tags'] : $product->name);
@endphp

@section('content')
<section class="product-details py-120">
    <div class="container">
        <div class="row gy-4">

            {{-- ===== LEFT: Main Content ===== --}}
            <div class="col-lg-8">
                <div class="product-details__item">

                    {{-- Title + Cover Image --}}
                    <div class="product-details__top">
                        <h1 class="product-details__title">{{ $product->name }}</h1>
                        <div class="product-details__thumb">
                            @if($product->image)
                                @php
                                    $imgSrc = str_starts_with($product->image, 'http')
                                        ? $product->image
                                        : asset('assets/images/products/' . $product->image);
                                @endphp
                                <img src="{{ $imgSrc }}" alt="{{ $product->name }}" class="fit-image">
                            @else
                                <img src="https://placehold.co/800x400/030442/ffffff?text={{ urlencode(Str::limit($product->name, 30)) }}"
                                     alt="{{ $product->name }}" class="fit-image">
                            @endif
                        </div>
                    </div>

                    {{-- Meta Bar: category, rating, sales, preview --}}
                    <div class="product-details__content">
                        <div class="product-info flex-between gap-3">
                            <div class="product-info__inner flex-align">

                                {{-- Category --}}
                                @if($product->category)
                                <div class="product-info__category flex-align">
                                    <a href="{{ route('product.category', $product->category->slug) }}" class="flex-align gap-2">
                                        <span class="category-icon flex-center" data-color="#{{ $product->category->color_class ?? '6366f1' }}">
                                            <i class="{{ $product->category->icon_class ?? 'fas fa-box' }}"></i>
                                        </span>
                                        <span class="item-category-name">{{ $product->category->name }}</span>
                                    </a>
                                </div>
                                @endif

                                {{-- Rating --}}
                                <div class="product-info__rating flex-wrap">
                                    <ul class="rating-list">
                                        {!! getStar($product->rating) !!}
                                    </ul>
                                    <span class="product-info__rating-text">({{ number_format($product->rating, 1) }} rating)</span>
                                </div>

                                {{-- Featured badge --}}
                                @if($product->featured)
                                <span class="badge badge--warning fs-12" style="padding:4px 10px;border-radius:20px">
                                    <i class="fas fa-star me-1"></i> Featured
                                </span>
                                @endif

                            </div>

                            {{-- Live Preview button (desktop) --}}
                            @if(!empty($attrs['Demo URL']))
                            <a href="{{ $attrs['Demo URL'] }}" target="_blank" class="btn btn--base btn--md d-none d-lg-inline-flex">
                                <span class="icon"><i class="fas fa-external-link-alt"></i></span> LIVE PREVIEW
                            </a>
                            @endif

                            {{-- Buy Now button (mobile) --}}
                            @if(!empty($attrs['Buy URL']))
                            <div class="d-lg-none">
                                <a href="{{ $attrs['Buy URL'] }}" target="_blank" class="btn btn--base btn--md">
                                    <span class="icon"><i class="fas fa-shopping-cart"></i></span> BUY NOW
                                </a>
                            </div>
                            @endif
                        </div>

                        {{-- Description --}}
                        <div class="item-description__custom mt-4">
                            {!! $product->description !!}
                        </div>
                    </div>
                </div>

            

            </div>{{-- /col-lg-8 --}}

            {{-- ===== RIGHT: Sidebar ===== --}}
            <div class="col-lg-4 ps-xl-5">
                <div class="sidebar-wrapper">
                    <div class="sidebar">

                        {{-- Price & Buy --}}
                        <h5 class="sidebar__title">
                            @if(!empty($attrs['Marketplace']))
                                Sold Via {{ $attrs['Marketplace'] }}
                            @else
                                Get This Item
                            @endif
                        </h5>

                        @if(!empty($attrs['Marketplace Description']))
                        <p class="sidebar__desc">{{ $attrs['Marketplace Description'] }}</p>
                        @endif

                        {{-- License Pricing --}}
                        @if(!$product->is_free)
                            <div class="license-item-wrapper">
                                <div class="row gy-4">
                                    <div class="col-6">
                                        <div class="license-item border-end">
                                            <span class="license-price">Regular License</span>
                                            <h6 class="license-price mb-0">${{ getAmount($product->regular_price) }}</h6>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="license-item">
                                            <span class="license-price">Extended License</span>
                                            <h6 class="license-price mb-0">
                                                ${{ !empty($attrs['Extended Price'])
                                                    ? getAmount($attrs['Extended Price'])
                                                    : number_format($product->regular_price * 6, 0) }}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- Buy Button --}}
                        <div class="sidebar__form mt-3">
                            @if($product->is_free)
                                <a href="{{ $product->file_link ?? '#' }}" target="_blank" class="btn btn--base w-100">
                                    <span class="icon"><i class="fas fa-download"></i></span> DOWNLOAD FREE
                                </a>
                            @else
                                <button type="button" class="btn btn--base w-100" data-bs-toggle="modal" data-bs-target="#orderModal">
                                    <span class="icon"><i class="fas fa-shopping-cart"></i></span> PURCHASE NOW
                                </button>
                            @endif
                            @if(!empty($attrs['Demo URL']))
                            <a href="{{ $attrs['Demo URL'] }}" target="_blank" class="btn btn--outline w-100 mt-2">
                                <span class="icon"><i class="fas fa-eye"></i></span> LIVE PREVIEW
                            </a>
                            @endif
                        </div>

                    </div>{{-- /sidebar (close the top buy section) --}}

                    <div class="sidebar mt-4">
                        <h5 class="sidebar__title">Product Details</h5>
                        <div class="sidebar-product-info-wrapper">
                            
                            <div class="sidebar-product-info">
                                <span class="sidebar-product-info__title fs-16">Category</span>
                                <span class="sidebar-product-info__desc fs-14">
                                    <a href="{{ route('product.category', $product->category->slug ?? '') }}" class="text-dark">{{ $product->category->name ?? '—' }}</a>
                                </span>
                            </div>

                            <div class="sidebar-product-info">
                                <span class="sidebar-product-info__title fs-16">First Release</span>
                                <span class="sidebar-product-info__desc fs-14">{{ !empty($attrs['First Release']) ? $attrs['First Release'] : $product->created_at?->format('d M Y') }}</span>
                            </div>

                            <div class="sidebar-product-info">
                                <span class="sidebar-product-info__title fs-16">Last update</span>
                                <span class="sidebar-product-info__desc fs-14">{{ !empty($attrs['Last Update']) ? $attrs['Last Update'] : $product->updated_at?->format('d M Y') }}</span>
                            </div>

                            @if(!empty($attrs['Compatible Browsers']))
                            <div class="sidebar-product-info">
                                <span class="sidebar-product-info__title fs-16">Compatible Browsers</span>
                                <span class="sidebar-product-info__desc fs-14">{{ $attrs['Compatible Browsers'] }}</span>
                            </div>
                            @endif

                            @if(!empty($attrs['Software Version']) || !empty($attrs['Version']))
                            <div class="sidebar-product-info">
                                <span class="sidebar-product-info__title fs-16">Software Version</span>
                                <span class="sidebar-product-info__desc fs-14">{{ $attrs['Software Version'] ?? $attrs['Version'] }}</span>
                            </div>
                            @endif

                            @if(!empty($attrs['High Resolution']))
                            <div class="sidebar-product-info">
                                <span class="sidebar-product-info__title fs-16">High Resolution</span>
                                <span class="sidebar-product-info__desc fs-14">{{ $attrs['High Resolution'] }}</span>
                            </div>
                            @endif

                            @if(!empty($attrs['Software Framework']))
                            <div class="sidebar-product-info">
                                <span class="sidebar-product-info__title fs-16">Software Framework</span>
                                <span class="sidebar-product-info__desc fs-14">{{ $attrs['Software Framework'] }}</span>
                            </div>
                            @endif

                            @if(!empty($attrs['Files Included']))
                            <div class="sidebar-product-info">
                                <span class="sidebar-product-info__title fs-16">Files Included</span>
                                <span class="sidebar-product-info__desc fs-14">{{ $attrs['Files Included'] }}</span>
                            </div>
                            @endif

                            @if(!empty($product->seo_keywords) || !empty($attrs['Tags']))
                            <div class="sidebar-product-info">
                                <span class="sidebar-product-info__title fs-16 my-3">Tags</span>
                                <ul class="text-list style-tag">
                                    @php
                                        $tagsRaw = !empty($product->seo_keywords) ? $product->seo_keywords : $attrs['Tags'];
                                        $tags = explode(',', $tagsRaw);
                                    @endphp
                                    @foreach($tags as $tag)
                                        @php $tag = trim($tag); @endphp
                                        @if($tag)
                                        <li class="text-list__item">
                                            <a href="{{ route('product.all') }}?search={{ urlencode($tag) }}" class="text-list__link fs-14">{{ $tag }}</a>
                                        </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>

                    </div>{{-- /sidebar --}}
                </div>{{-- /sidebar-wrapper --}}
            </div>{{-- /col-lg-4 --}}

        </div>{{-- /row --}}
    </div>{{-- /container --}}
</section>
<div class="modal fade order-modal" id="orderModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="orderModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="order-product-title">Purchase Now</h5>
                <button type="button" class="modal-close-btn" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>

            <div class="modal-body">

                <form action="{{ route('product.checkout', $product->slug) }}" method="post">
                    @csrf

                    <div class="order-product-block">
                        <div class="flex-between mb-3 mb-sm-4">
                            <label class="form--label-title">License type</label>
                            <a href="https://unlockthemes.com/direct-item-policy#license" target="_blank" class="external-link">What is the difference?</a>
                        </div>

                        <div class="order-type-wrapper">
                            <label for="regular" class="order-type">
                                <input type="radio" hidden name="license" id="regular" value="1" checked>
                                <span class="order-type-content">
                                    <span class="order-type-price">${{ getAmount($product->regular_price) }} USD</span>
                                    <span class="order-type-title">Regular License</span>
                                </span>

                                <span class="check-type-icon">
                                    <svg class="order-check-circle" width="13" height="10" viewBox="0 0 13 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="check" d="M1 5L4.5 8.5L12.5 0.5" stroke="currentColor" stroke-linecap="round" />
                                    </svg>
                                </span>
                            </label>

                            <label for="extended" class="order-type">
                                <input type="radio" name="license" hidden id="extended" value="2">
                                <span class="order-type-content">
                                    <span class="order-type-price">${{ !empty($attrs['Extended Price']) ? getAmount($attrs['Extended Price']) : number_format($product->regular_price * 6, 0) }} USD</span>
                                    <span class="order-type-title">Extended License</span>
                                </span>
                                <span class="check-type-icon">
                                    <svg class="order-check-circle" width="13" height="10" viewBox="0 0 13 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="check" d="M1 5L4.5 8.5L12.5 0.5" stroke="currentColor" stroke-linecap="round" />
                                    </svg>
                                </span>
                            </label>
                        </div>

                        <p class="note-text"><span class="icon"><i class="fa fa-info"></i></span> 3 months support Included on both license type</p>

                    </div>

                    <div class="order-product-block">
                        <div class="flex-between mb-3 mb-sm-4">
                            <label class="form--label-title">Extend Support</label>
                            <a href="https://unlockthemes.com/direct-item-policy#support" target="_blank" class="external-link">What does support include?</a>
                        </div>

                        <div class="flex-align">
                            <label for="support" class="order-extend">
                                <input type="checkbox" hidden id="support" name="extend_support">
                                <span class="check-type-icon">
                                    <svg class="order-check-circle" width="13" height="10" viewBox="0 0 13 10" fill="none"
                                    xmlns="http://www.w3.org/2000/svg"><path class="check" d="M1 5L4.5 8.5L12.5 0.5" stroke="currentColor" stroke-linecap="round" /></svg>
                                </span>
                                <span class="support--wrapper">
                                    <span class="order-extend-title">Extend support to 6 months</span>
                                    <span class="flex-align gap-2">
                                        <del class="support-price-wrapper">$<del class="support-price"></del></del>
                                        <span class="support-price-promo-wrapper">
                                            $<span class="support-price-promo"></span>
                                        </span>
                                    </span>
                                </span>
                            </label>
                        </div>
                    </div>

                    <div class="flex-between">
                        <h5 class="mb-0 grand-total-price">
                            <span class="d-block grand-total-title">Total Price</span>
                            $<span class="grand-total"></span> USD
                        </h5>

                        <button type="submit" class="btn btn--base">ORDER NOW</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
<script>
    (function($){
        "use strict";
        let regularPrice = parseFloat('{{ getAmount($product->regular_price) }}');
        let extendedPrice = parseFloat('{{ !empty($attrs['Extended Price']) ? getAmount($attrs['Extended Price']) : number_format($product->regular_price * 6, 0, '.', '') }}');

        function calculatePrice() {
            let license = $('input[name="license"]:checked').val();
            let price = license == 1 ? regularPrice : extendedPrice;
            let supportPrice = price * 0.3; // 30% for support
            let supportPromo = supportPrice * 0.8; // 20% discount on support
            let total = price;

            $('.support-price').text(supportPrice.toFixed(2));
            $('.support-price-promo').text(supportPromo.toFixed(2));

            if ($('#support').is(':checked')) {
                total += supportPromo;
            }

            $('.grand-total').text(total.toFixed(2));
        }

        $('input[name="license"], input[name="extend_support"]').on('change', function() {
            calculatePrice();
        });

        calculatePrice();
    })(jQuery);
</script>
@endpush
