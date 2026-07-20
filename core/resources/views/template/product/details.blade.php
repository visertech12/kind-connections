@php
    $attrs           = $product->getOriginal('attributes');
    $attrs           = is_array($attrs) ? $attrs : (json_decode($attrs, true) ?: []);
    $imgSrc          = $product->getOriginal('image')
                        ? (str_starts_with($product->getOriginal('image'), 'http') ? $product->getOriginal('image') : asset('assets/images/products/' . $product->getOriginal('image')))
                        : null;
    $demoUrl         = $attrs['Demo URL'] ?? null;
    $extendedPrice   = isset($attrs['Extended Price']) ? (float) $attrs['Extended Price'] : 0;
    $installFee      = isset($attrs['Install Fee']) ? (float) $attrs['Install Fee'] : 19;
    $versionCode     = $product->version_code ?? $attrs['Version'] ?? null;
    $pRegular        = (float) $product->getOriginal('regular_price');
    $schemaLow       = $extendedPrice > 0 ? min($pRegular, $extendedPrice) : $pRegular;
    $schemaHigh      = $extendedPrice > 0 ? max($pRegular, $extendedPrice) : $pRegular;

    $productName     = $product->getOriginal('name');
    $productDesc     = $product->getOriginal('description') ?? '';
    $productSlug     = $product->getOriginal('slug');
    $seo_title       = $product->getOriginal('seo_title') ?: ($productName . ' — Unlock Themes');
    $seo_description = $product->getOriginal('seo_description') ?: \Illuminate\Support\Str::limit(strip_tags($productDesc), 160);
    $seo_keywords    = $product->getOriginal('seo_keywords') ?: (!empty($attrs['Tags']) ? $attrs['Tags'] : $productName);

    $seodata = [
        'title'       => $seo_title,
        'description' => $seo_description,
        'keyword'     => $seo_keywords,
        'image'       => $imgSrc ?? '',
    ];
@endphp
@extends('template.layouts.frontend', ['seodata' => $seodata])
@push('extrameta')
    <meta property="product:price:amount" content="{{ $pRegular }}">
    <meta property="product:price:currency" content="USD">
    <meta property="og:availability" content="instock">
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Product",
            "name": {!! json_encode($productName, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!},
            "description": {!! json_encode($seo_description, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!},
            "category": {!! json_encode($product->getOriginal('category_id') ? optional($product->category)->name : null, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!},
            "image": {!! json_encode($imgSrc ?? '', JSON_UNESCAPED_SLASHES) !!},
            "url": {!! json_encode(url()->current(), JSON_UNESCAPED_SLASHES) !!},
            "brand": {
                "@type": "Brand",
                "name": "Unlock Themes"
            },
            @if ($product->rating > 0)
            "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "{{ $product->rating }}",
                "ratingCount": "1"
            },
            "review": {
                "@type": "Review",
                "reviewRating": {
                    "@type": "Rating",
                    "ratingValue": "{{ $product->rating }}"
                },
                "author": {
                    "@type": "Person",
                    "name": "Customer"
                }
            },
            @endif
            "offers": {
                "@type": "AggregateOffer",
                "availability": "https://schema.org/InStock",
                "priceCurrency": "USD",
                "lowPrice": "{{ $schemaLow }}",
                "highPrice": "{{ $schemaHigh }}",
                "offerCount": "{{ $extendedPrice > 0 ? 2 : 1 }}"
            }
        }
    </script>
@endpush
@section('content')
    <div class="item-detail py-60">
        <div class="container">
            <div class="hackproof-banner mb-4" role="alert" style="display:flex;align-items:center;gap:14px;padding:14px 18px;border-radius:12px;background:linear-gradient(90deg,#0b2a5e,#1554b8);color:#eaf2ff;border:1px solid #3b82f6;box-shadow:0 4px 18px rgba(59,130,246,.20)">
                <span style="flex:0 0 auto;width:42px;height:42px;border-radius:50%;background:#3b82f6;display:flex;align-items:center;justify-content:center;color:#fff;font-size:20px;line-height:1">
                    <i class="fas fa-shield-alt" aria-hidden="true"></i>
                </span>
                <div style="flex:1;line-height:1.4">
                    <strong style="display:block;font-size:15px;color:#fff">100% Hack-Proof &amp; Malware-Tested Script</strong>
                    <span style="font-size:13px;opacity:.9">Tired of hacked websites and broken scripts? We sell only clean, security-hardened, malware-tested products — verified safe before release.</span>
                </div>
                <span class="d-none d-md-inline" style="font-size:12px;padding:6px 10px;border:1px solid rgba(255,255,255,.45);border-radius:20px;color:#fff;white-space:nowrap">
                    <i class="fas fa-check-circle me-1" aria-hidden="true"></i> Verified Safe
                </span>
            </div>
            <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="item-detail-wrapper">
                        <div class="item-detail-top">

                            <div class="item-detail-bread">
                                <a class="link" href="{{ route('product.all') }}">Products ›</a>
                                @if($product->category)
                                    <a class="link" href="{{ route('product.category', $product->category->slug) }}">
                                        {{ $product->category->name }} ›
                                    </a>
                                @endif
                                <span class="text">{{ Str::limit($productName, 40) }}</span>
                            </div>

                            <div class="item-detail-badges">
                                @php
                                    $lastUpdateStr = $attrs['Last Update'] ?? ($attrs['last_update'] ?? null);
                                    $lastUpdateDate = null;
                                    if ($lastUpdateStr) {
                                        try { $lastUpdateDate = \Carbon\Carbon::parse($lastUpdateStr); } catch (\Exception $e) {}
                                    }
                                    // Fallback to updated_at
                                    if (!$lastUpdateDate) {
                                        $lastUpdateDate = $product->updated_at;
                                    }
                                @endphp
                                @if ($lastUpdateDate && $lastUpdateDate->gt(now()->subMonths(3)) && $lastUpdateDate->lte(now()))
                                    <span class="detail-badge base-style">✦ New Update</span>
                                @endif
                                @if (!empty($versionCode))
                                    <span class="detail-badge">v{{ $versionCode }}</span>
                                @endif
                                @if ($lastUpdateDate && $lastUpdateDate->lte(now()))
                                    <span class="detail-badge">Last Update: {{ $lastUpdateDate->format('M Y') }}</span>
                                @endif
                            </div>

                            <div class="item-detail-content">
                                <h1 class="item-detail-title">{{ $product->name }}</h1>
                                @if (!empty($seo_description))
                                    <p class="item-detail-desc">{{ $seo_description }}</p>
                                @endif
                            </div>

                            <div class="item-detail-info">
                                @if ($product->rating > 0)
                                    <div class="rating">
                                        <div class="rating-list d-none d-sm-block">
                                            <ul class="rating-list">
                                                {!! getStar($product->rating) !!}
                                            </ul>
                                        </div>
                                        <div class="rating-list d-sm-none">
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="avarage">{{ number_format($product->rating, 1) }}</span>
                                    </div>
                                @endif

                                <div class="info-view">
                                    <span class="icon"><i class="fa-solid fa-eye"></i></span>
                                    <span class="text">{{ $product->views()->count() }} views</span>
                                </div>

                                @if (!empty($attrs['Total Sales']) && $pRegular > 0)
                                    <div class="info-view">
                                        <span class="icon"><i class="fa-solid fa-arrow-down-to-bracket"></i></span>
                                        <span class="text">{{ $attrs['Total Sales'] }} sales</span>
                                    </div>
                                @endif
                                <div class="info-view">
                                    <span class="icon"><i class="fa-solid fa-download"></i></span>
                                    <span class="text">{{ $product->downloads()->count() }} downloads</span>
                                </div>
                            </div>

                        </div>

                        <div class="item-detail-thumb">
                            @if ($imgSrc)
                                <img src="{{ $imgSrc }}" alt="{{ $product->name }}" class="fit-image">
                            @else
                                <img src="https://placehold.co/800x400/030442/ffffff?text={{ urlencode(Str::limit($productName, 30)) }}"
                                     alt="{{ $product->name }}" class="fit-image">
                            @endif
                        </div>

                        <div class="item-description__custom mt-5">
                            {!! $product->description !!}

                            <div class="item-detail-block mb-4">
                                <div class="item-detail-block-header">
                                    <span class="icon">
                                        <i class="fas fa-gift text--base"></i>
                                    </span>
                                    <div class="content">
                                        <h4 class="title">What will you get along with this script?</h4>
                                    </div>
                                </div>
                                <div class="item-detail-block-body">
                                    <ul class="item-detail-list single-view">
                                        <li class="item-detail-list-item align-items-start">
                                            <span class="icon"><i class="fas fa-check"></i></span>
                                            <div>
                                                <h6 class="fw-semibold mb-1">Full Source Code</h6>
                                                <p class="mb-0 text-secondary small">Complete and well-structured source code ready to deploy and customize.</p>
                                            </div>
                                        </li>
                                        <li class="item-detail-list-item align-items-start">
                                            <span class="icon"><i class="fas fa-check"></i></span>
                                            <div>
                                                <h6 class="fw-semibold mb-1">Project Documentation</h6>
                                                <p class="mb-0 text-secondary small">Step-by-step guide to help you install, configure, and run the platform smoothly.</p>
                                            </div>
                                        </li>
                                        <li class="item-detail-list-item align-items-start">
                                            <span class="icon"><i class="fas fa-check"></i></span>
                                            <div>
                                                <h6 class="fw-semibold mb-1">Complete Project Database</h6>
                                                <p class="mb-0 text-secondary small">Full database schema with seed data so you can get up and running instantly.</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="item-detail-block mb-4">
                                <div class="item-detail-block-header">
                                    <span class="icon">
                                        <i class="fa-solid fa-headset text--base"></i>
                                    </span>
                                    <div class="content">
                                        <h4 class="title">Support Facility</h4>
                                    </div>
                                </div>
                                <div class="item-detail-block-body">
                                    <p class="text">We provide premium support for all of our products. Whether you need help with installation and configuration, run into a technical issue, or simply have a question before or after your purchase, our dedicated team is always ready to assist you. If you need any assistance, please <a href="{{ route('support') }}" class="text--base">open a support ticket</a> and we will get back to you with a clear solution as quickly as possible.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="detail-sidebar">
                        <div class="ds-card ds-card--white d-none d-lg-block">
                            <div class="ds-price-row">
                                @if ($pRegular <= 0)
                                    <h2 class="ds-price-current" style="color:var(--base-color)">Free</h2>
                                @else
                                    <h2 class="ds-price-current">${{ $product->regular_price + 0 }} USD</h2>
                                @endif
                            </div>
                            <p class="ds-price-note">
                                @if ($pRegular <= 0)
                                    Free to use. No payment required.
                                @else
                                    One-time payment. Lifetime access and updates.
                                @endif
                            </p>
                            <div class="ds-license">
                                <div class="ds-license-options">
                                    <label for="license-regular" class="ds-license-item">
                                        <span class="ds-license-info">
                                            <span class="ds-license-name">Regular License</span>
                                            <span class="ds-license-desc">One end product with free access. No resale.</span>
                                        </span>
                                        <span class="ds-license-price">{{ $pRegular <= 0 ? 'Free' : '$' . ($product->regular_price + 0) }}</span>
                                    </label>
                                    @if ($extendedPrice > 0)
                                        <label for="license-extended" class="ds-license-item">
                                            <span class="ds-license-info">
                                                <span class="ds-license-name">Extended License</span>
                                                <span class="ds-license-desc">One end product you can charge for. No resale. Priority support.</span>
                                            </span>
                                            <span class="ds-license-price">${{ $extendedPrice + 0 }}</span>
                                        </label>
                                    @endif
                                </div>
                            </div>
                            <div class="ds-actions">
                                @if ($pRegular <= 0)
                                    <a href="{{ route('product.download.free', $product->slug) }}" class="btn btn--base d-block w-100 text-center">
                                        <span class="icon"><i class="fas fa-download"></i></span>
                                        Get for Free
                                    </a>
                                @else
                                    <button class="btn btn--base d-block w-100 text-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        <span class="icon"><i class="fas fa-shopping-cart"></i></span>
                                        Buy Now
                                    </button>
                                @endif
                                @if ($demoUrl)
                                    <a href="{{ $demoUrl }}" target="_blank" class="btn btn--base outline w-100">
                                        <span class="icon"><i class="fa-solid fa-up-right-from-square"></i></span>
                                        Live Preview
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="ds-card ds-card--white ds-card--bordered">
                            <h5 class="ds-card-title">
                                <i class="fa-solid fa-screwdriver-wrench text--base me-2"></i>
                                Server Install Service
                            </h5>
                            <p class="ds-price-note mb-3">
                                Our experts will install and fully configure this product live on your own server (hosting/VPS). Real production install — not a demo. Includes setup, database, SSL and basic configuration.
                            </p>
                            <ul class="ds-meta-list mb-3">
                                <li class="ds-meta-item">
                                    <span class="ds-meta-key"><i class="fa-solid fa-check text--base me-1"></i> Full script installation on your server</span>
                                </li>
                                <li class="ds-meta-item">
                                    <span class="ds-meta-key"><i class="fa-solid fa-check text--base me-1"></i> Database &amp; sample data import</span>
                                </li>
                                <li class="ds-meta-item">
                                    <span class="ds-meta-key"><i class="fa-solid fa-check text--base me-1"></i> Domain &amp; SSL configuration</span>
                                </li>
                                <li class="ds-meta-item">
                                    <span class="ds-meta-key"><i class="fa-solid fa-check text--base me-1"></i> 7 days post-install support</span>
                                </li>
                            </ul>
                            <div class="ds-price-row mb-2">
                                <span class="ds-license-name">Service Fee</span>
                                <span class="ds-license-price">${{ $installFee + 0 }} USD</span>
                            </div>
                            <a href="{{ route('support') }}?subject=Server+Install+Service+for+{{ urlencode($productName) }}" class="btn btn--base outline w-100 text-center">
                                <span class="icon"><i class="fa-solid fa-rocket"></i></span>
                                Request Install Service
                            </a>
                        </div>

                        <div class="ds-card ds-card--white ds-card--bordered">
                            <h5 class="ds-card-title">Product Details</h5>
                            <ul class="ds-meta-list">
                                <li class="ds-meta-item">
                                    <span class="ds-meta-key">First Release</span>
                                    <span class="ds-meta-val">{{ $product->created_at->format('d F Y') }}</span>
                                </li>
                                <li class="ds-meta-item">
                                    <span class="ds-meta-key">Last Update</span>
                                    <span class="ds-meta-val">{{ $product->updated_at->format('d F Y') }}</span>
                                </li>
                                @php
                                    $displayAttrs = $attrs;
                                    foreach (['Demo URL', 'Extended Price', 'Tags', 'Short Description', 'Total Sales', 'Version', 'Last Update', 'last_update'] as $skip) {
                                        unset($displayAttrs[$skip]);
                                    }
                                @endphp
                                @foreach ($displayAttrs as $k => $v)
                                    @if (!empty($v))
                                        <li class="ds-meta-item">
                                            <span class="ds-meta-key">{{ $k }}</span>
                                            <span class="ds-meta-val">{{ rtrim($v, ',') }}</span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>

                        @if (!empty($attrs['Tags']))
                            <div class="ds-card ds-card--dark">
                                <h5 class="ds-card-title">Product Keywords</h5>
                                <div class="ds-ext-tags">
                                    @foreach (explode(',', $attrs['Tags']) as $tag)
                                        <a href="{{ route('product.all') }}?search={{ trim($tag) }}" target="_blank" class="ds-ext-tag">{{ trim($tag) }}</a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="item-detail-sm-preview d-lg-none">
        @if ($demoUrl)
            <a href="{{ $demoUrl }}" target="_blank" class="btn btn--base outline w-100">
                <span class="icon"><i class="fa-solid fa-up-right-from-square"></i></span>
                Live Preview
            </a>
        @endif
        @if ($pRegular <= 0)
            <a href="{{ route('product.download.free', $product->slug) }}" class="btn btn--base w-100">
                <span class="icon"><i class="fas fa-download"></i></span>
                Get for Free
            </a>
        @else
            <button class="btn btn--base w-100" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <span class="icon"><i class="fas fa-shopping-cart"></i></span>
                Buy Now
            </button>
        @endif
    </div>

    <div class="modal product--modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="pm-header">
                    <div class="pm-header-left">
                        <div class="pm-header-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <h4 class="pm-title mb-0" id="productModalLabel">Buy Now</h4>
                    </div>
                    <button type="button" class="pm-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="far fa-times"></i>
                    </button>
                </div>

                <form action="{{ route('product.checkout', $product->slug) }}" method="post">
                    @csrf
                    <div class="pm-body">
                        <div class="pm-section-head">
                            <h5 class="pm-section-label mb-0">License type</h5>
                            <a href="{{ route('tos') }}#license" class="pm-section-link">What is the difference?</a>
                        </div>

                        <div class="ds-license-options pm-license-options">
                            <input type="radio" name="license" id="regular" value="1" hidden checked />
                            <label for="regular" class="ds-license-item">
                                <span class="ds-license-radio"></span>
                                <span class="ds-license-info">
                                    <span class="ds-license-name">Regular License</span>
                                    <span class="ds-license-desc">One end product with free access. No resale.</span>
                                </span>
                                <span class="ds-license-price">{{ $pRegular <= 0 ? 'Free' : '$' . ($product->regular_price + 0) }}</span>
                            </label>
                            @if ($extendedPrice > 0)
                                <input type="radio" name="license" id="extended" value="2" hidden />
                                <label for="extended" class="ds-license-item">
                                    <span class="ds-license-radio"></span>
                                    <span class="ds-license-info">
                                        <span class="ds-license-name">Extended License</span>
                                        <span class="ds-license-desc">One end product you can charge for. No resale. Priority support.</span>
                                    </span>
                                    <span class="ds-license-price">${{ $extendedPrice + 0 }}</span>
                                </label>
                            @endif
                        </div>

                        <div class="pm-info">
                            <i class="far fa-info-circle"></i>
                            <span>3 months support included on all license types</span>
                        </div>

                        <hr class="pm-divider" />

                        <div class="pm-section-head">
                            <span class="pm-section-label">Extended Support</span>
                            <a href="{{ route('tos') }}#support" class="pm-section-link">What does support include?</a>
                        </div>

                        <div class="pm-support-options">
                            <input type="checkbox" name="extend_support" id="support" hidden />
                            <label for="support" class="ds-license-item pm-support-item">
                                <span class="ds-license-checkbox"></span>
                                <span class="ds-license-info">
                                    <span class="ds-license-name">Extended support to 6 months</span>
                                    <h6 class="pm-support-pricing">
                                        <span class="pm-support-old">$<del class="support-price"></del></span>
                                        <span class="pm-support-new">$<span class="support-price-promo"></span></span>
                                    </h6>
                                </span>
                            </label>
                        </div>

                        <hr class="pm-divider" />

                        <div class="pm-section-head">
                            <span class="pm-section-label">Server Install Service</span>
                            <span class="pm-section-link">Optional add-on</span>
                        </div>

                        <div class="pm-support-options">
                            <input type="checkbox" name="install_service" id="install_service" hidden />
                            <label for="install_service" class="ds-license-item pm-support-item">
                                <span class="ds-license-checkbox"></span>
                                <span class="ds-license-info">
                                    <span class="ds-license-name">Install &amp; configure on my server (real install, not demo)</span>
                                    <span class="ds-license-desc">Our team installs this product live on your own server/hosting. Includes DB, SSL &amp; 7 days post-install support.</span>
                                </span>
                                <span class="ds-license-price">+${{ $installFee + 0 }}</span>
                            </label>
                        </div>
                    </div>

                    <hr class="pm-divider pm-divider--footer" />
                    <div class="pm-footer">
                        <div class="pm-total">
                            <span class="pm-total-label">Total Price</span>
                            <h4 class="pm-total-value">$<span class="grand-total"></span> USD</h4>
                        </div>
                        @guest
                            <button type="submit" class="btn btn--base pm-order-btn">Order Now</button>
                        @endguest
                        @auth
                            <button type="submit" class="btn btn--base pm-order-btn">Order Now</button>
                        @endauth
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>
        $(document).ready(function() {
            var regularPrice = {{ $product->regular_price + 0 }};
            var extendedPrice = {{ $extendedPrice }};
            var installFee = {{ $installFee + 0 }};

            function updateTotalPrice() {
                var totalPrice = 0;
                var supportPrice = 0;
                var supportPromoPrice = 0;
                var selectedLicense = $('input[name="license"]:checked').val();
                if (selectedLicense == '1') {
                    totalPrice = regularPrice;
                    supportPrice = regularPrice / 4;
                    supportPromoPrice = regularPrice / 8;
                } else if (selectedLicense == '2') {
                    totalPrice = extendedPrice || regularPrice;
                    supportPrice = totalPrice / 4;
                    supportPromoPrice = totalPrice / 8;
                }
                if ($('#support').is(':checked')) {
                    totalPrice += supportPromoPrice;
                }
                if ($('#install_service').is(':checked')) {
                    totalPrice += installFee;
                }

                $('.grand-total').text(totalPrice.toFixed(2));
                $('.support-price').text(supportPrice.toFixed(2));
                $('.support-price-promo').text(supportPromoPrice.toFixed(2));
            }

            $('input[name="license"], #support, #install_service').on('change', updateTotalPrice);
            updateTotalPrice();
        });
    </script>
@endpush
