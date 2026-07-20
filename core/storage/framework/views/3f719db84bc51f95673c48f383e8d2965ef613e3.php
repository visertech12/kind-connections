<?php
    $attrs           = $product->getOriginal('attributes');
    $attrs           = is_array($attrs) ? $attrs : (json_decode($attrs, true) ?: []);
    $imgSrc          = $product->getOriginal('image')
                        ? (str_starts_with($product->getOriginal('image'), 'http') ? $product->getOriginal('image') : asset('assets/images/products/' . $product->getOriginal('image')))
                        : null;
    $demoUrl         = $attrs['Demo URL'] ?? null;
    $extendedPrice   = isset($attrs['Extended Price']) ? (float) $attrs['Extended Price'] : 0;
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
?>

<?php $__env->startPush('extrameta'); ?>
    <meta property="product:price:amount" content="<?php echo e($pRegular); ?>">
    <meta property="product:price:currency" content="USD">
    <meta property="og:availability" content="instock">
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Product",
            "name": <?php echo json_encode($productName, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
            "description": <?php echo json_encode($seo_description, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
            "category": <?php echo json_encode($product->getOriginal('category_id') ? optional($product->category)->name : null, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
            "image": <?php echo json_encode($imgSrc ?? '', JSON_UNESCAPED_SLASHES); ?>,
            "url": <?php echo json_encode(url()->current(), JSON_UNESCAPED_SLASHES); ?>,
            "brand": {
                "@type": "Brand",
                "name": "Unlock Themes"
            },
            <?php if($product->rating > 0): ?>
            "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "<?php echo e($product->rating); ?>",
                "ratingCount": "1"
            },
            "review": {
                "@type": "Review",
                "reviewRating": {
                    "@type": "Rating",
                    "ratingValue": "<?php echo e($product->rating); ?>"
                },
                "author": {
                    "@type": "Person",
                    "name": "Customer"
                }
            },
            <?php endif; ?>
            "offers": {
                "@type": "AggregateOffer",
                "availability": "https://schema.org/InStock",
                "priceCurrency": "USD",
                "lowPrice": "<?php echo e($schemaLow); ?>",
                "highPrice": "<?php echo e($schemaHigh); ?>",
                "offerCount": "<?php echo e($extendedPrice > 0 ? 2 : 1); ?>"
            }
        }
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="item-detail py-60">
        <div class="container">
            <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="item-detail-wrapper">
                        <div class="item-detail-top">

                            <div class="item-detail-bread">
                                <a class="link" href="<?php echo e(route('product.all')); ?>">Products ›</a>
                                <?php if($product->category): ?>
                                    <a class="link" href="<?php echo e(route('product.category', $product->category->slug)); ?>">
                                        <?php echo e($product->category->name); ?> ›
                                    </a>
                                <?php endif; ?>
                                <span class="text"><?php echo e(Str::limit($productName, 40)); ?></span>
                            </div>

                            <div class="item-detail-badges">
                                <?php
                                    $lastUpdateStr = $attrs['Last Update'] ?? ($attrs['last_update'] ?? null);
                                    $lastUpdateDate = null;
                                    if ($lastUpdateStr) {
                                        try { $lastUpdateDate = \Carbon\Carbon::parse($lastUpdateStr); } catch (\Exception $e) {}
                                    }
                                    // Fallback to updated_at
                                    if (!$lastUpdateDate) {
                                        $lastUpdateDate = $product->updated_at;
                                    }
                                ?>
                                <?php if($lastUpdateDate && $lastUpdateDate->gt(now()->subMonths(3)) && $lastUpdateDate->lte(now())): ?>
                                    <span class="detail-badge base-style">✦ New Update</span>
                                <?php endif; ?>
                                <?php if(!empty($versionCode)): ?>
                                    <span class="detail-badge">v<?php echo e($versionCode); ?></span>
                                <?php endif; ?>
                                <?php if($lastUpdateDate && $lastUpdateDate->lte(now())): ?>
                                    <span class="detail-badge">Last Update: <?php echo e($lastUpdateDate->format('M Y')); ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="item-detail-content">
                                <h1 class="item-detail-title"><?php echo e($product->name); ?></h1>
                                <?php if(!empty($seo_description)): ?>
                                    <p class="item-detail-desc"><?php echo e($seo_description); ?></p>
                                <?php endif; ?>
                            </div>

                            <div class="item-detail-info">
                                <?php if($product->rating > 0): ?>
                                    <div class="rating">
                                        <div class="rating-list d-none d-sm-block">
                                            <ul class="rating-list">
                                                <?php echo getStar($product->rating); ?>

                                            </ul>
                                        </div>
                                        <div class="rating-list d-sm-none">
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="avarage"><?php echo e(number_format($product->rating, 1)); ?></span>
                                    </div>
                                <?php endif; ?>

                                <div class="info-view">
                                    <span class="icon"><i class="fa-solid fa-eye"></i></span>
                                    <span class="text"><?php echo e($product->views()->count()); ?> views</span>
                                </div>

                                <?php if(!empty($attrs['Total Sales']) && $pRegular > 0): ?>
                                    <div class="info-view">
                                        <span class="icon"><i class="fa-solid fa-arrow-down-to-bracket"></i></span>
                                        <span class="text"><?php echo e($attrs['Total Sales']); ?> sales</span>
                                    </div>
                                <?php endif; ?>
                                <div class="info-view">
                                    <span class="icon"><i class="fa-solid fa-download"></i></span>
                                    <span class="text"><?php echo e($product->downloads()->count()); ?> downloads</span>
                                </div>
                            </div>

                        </div>

                        <div class="item-detail-thumb">
                            <?php if($imgSrc): ?>
                                <img src="<?php echo e($imgSrc); ?>" alt="<?php echo e($product->name); ?>" class="fit-image">
                            <?php else: ?>
                                <img src="https://placehold.co/800x400/030442/ffffff?text=<?php echo e(urlencode(Str::limit($productName, 30))); ?>"
                                     alt="<?php echo e($product->name); ?>" class="fit-image">
                            <?php endif; ?>
                        </div>

                        <div class="item-description__custom mt-5">
                            <?php echo $product->description; ?>


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
                                    <p class="text">We provide premium support for all of our products. Whether you need help with installation and configuration, run into a technical issue, or simply have a question before or after your purchase, our dedicated team is always ready to assist you. If you need any assistance, please <a href="<?php echo e(route('support')); ?>" class="text--base">open a support ticket</a> and we will get back to you with a clear solution as quickly as possible.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="detail-sidebar">
                        <div class="ds-card ds-card--white d-none d-lg-block">
                            <div class="ds-price-row">
                                <?php if($pRegular <= 0): ?>
                                    <h2 class="ds-price-current" style="color:var(--base-color)">Free</h2>
                                <?php else: ?>
                                    <h2 class="ds-price-current">$<?php echo e($product->regular_price + 0); ?> USD</h2>
                                <?php endif; ?>
                            </div>
                            <p class="ds-price-note">
                                <?php if($pRegular <= 0): ?>
                                    Free to use. No payment required.
                                <?php else: ?>
                                    One-time payment. Lifetime access and updates.
                                <?php endif; ?>
                            </p>
                            <div class="ds-license">
                                <div class="ds-license-options">
                                    <label for="license-regular" class="ds-license-item">
                                        <span class="ds-license-info">
                                            <span class="ds-license-name">Regular License</span>
                                            <span class="ds-license-desc">One end product with free access. No resale.</span>
                                        </span>
                                        <span class="ds-license-price"><?php echo e($pRegular <= 0 ? 'Free' : '$' . ($product->regular_price + 0)); ?></span>
                                    </label>
                                    <?php if($extendedPrice > 0): ?>
                                        <label for="license-extended" class="ds-license-item">
                                            <span class="ds-license-info">
                                                <span class="ds-license-name">Extended License</span>
                                                <span class="ds-license-desc">One end product you can charge for. No resale. Priority support.</span>
                                            </span>
                                            <span class="ds-license-price">$<?php echo e($extendedPrice + 0); ?></span>
                                        </label>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="ds-actions">
                                <?php if($pRegular <= 0): ?>
                                    <a href="<?php echo e(route('product.download.free', $product->slug)); ?>" class="btn btn--base d-block w-100 text-center">
                                        <span class="icon"><i class="fas fa-download"></i></span>
                                        Get for Free
                                    </a>
                                <?php else: ?>
                                    <button class="btn btn--base d-block w-100 text-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        <span class="icon"><i class="fas fa-shopping-cart"></i></span>
                                        Buy Now
                                    </button>
                                <?php endif; ?>
                                <?php if($demoUrl): ?>
                                    <a href="<?php echo e($demoUrl); ?>" target="_blank" class="btn btn--base outline w-100">
                                        <span class="icon"><i class="fa-solid fa-up-right-from-square"></i></span>
                                        Live Preview
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="ds-card ds-card--white ds-card--bordered">
                            <h5 class="ds-card-title">Product Details</h5>
                            <ul class="ds-meta-list">
                                <li class="ds-meta-item">
                                    <span class="ds-meta-key">First Release</span>
                                    <span class="ds-meta-val"><?php echo e($product->created_at->format('d F Y')); ?></span>
                                </li>
                                <li class="ds-meta-item">
                                    <span class="ds-meta-key">Last Update</span>
                                    <span class="ds-meta-val"><?php echo e($product->updated_at->format('d F Y')); ?></span>
                                </li>
                                <?php
                                    $displayAttrs = $attrs;
                                    foreach (['Demo URL', 'Extended Price', 'Tags', 'Short Description', 'Total Sales', 'Version', 'Last Update', 'last_update'] as $skip) {
                                        unset($displayAttrs[$skip]);
                                    }
                                ?>
                                <?php $__currentLoopData = $displayAttrs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!empty($v)): ?>
                                        <li class="ds-meta-item">
                                            <span class="ds-meta-key"><?php echo e($k); ?></span>
                                            <span class="ds-meta-val"><?php echo e(rtrim($v, ',')); ?></span>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>

                        <?php if(!empty($attrs['Tags'])): ?>
                            <div class="ds-card ds-card--dark">
                                <h5 class="ds-card-title">Product Keywords</h5>
                                <div class="ds-ext-tags">
                                    <?php $__currentLoopData = explode(',', $attrs['Tags']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e(route('product.all')); ?>?search=<?php echo e(trim($tag)); ?>" target="_blank" class="ds-ext-tag"><?php echo e(trim($tag)); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="item-detail-sm-preview d-lg-none">
        <?php if($demoUrl): ?>
            <a href="<?php echo e($demoUrl); ?>" target="_blank" class="btn btn--base outline w-100">
                <span class="icon"><i class="fa-solid fa-up-right-from-square"></i></span>
                Live Preview
            </a>
        <?php endif; ?>
        <?php if($pRegular <= 0): ?>
            <a href="<?php echo e(route('product.download.free', $product->slug)); ?>" class="btn btn--base w-100">
                <span class="icon"><i class="fas fa-download"></i></span>
                Get for Free
            </a>
        <?php else: ?>
            <button class="btn btn--base w-100" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <span class="icon"><i class="fas fa-shopping-cart"></i></span>
                Buy Now
            </button>
        <?php endif; ?>
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

                <form action="<?php echo e(route('product.checkout', $product->slug)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="pm-body">
                        <div class="pm-section-head">
                            <h5 class="pm-section-label mb-0">License type</h5>
                            <a href="<?php echo e(route('tos')); ?>#license" class="pm-section-link">What is the difference?</a>
                        </div>

                        <div class="ds-license-options pm-license-options">
                            <input type="radio" name="license" id="regular" value="1" hidden checked />
                            <label for="regular" class="ds-license-item">
                                <span class="ds-license-radio"></span>
                                <span class="ds-license-info">
                                    <span class="ds-license-name">Regular License</span>
                                    <span class="ds-license-desc">One end product with free access. No resale.</span>
                                </span>
                                <span class="ds-license-price"><?php echo e($pRegular <= 0 ? 'Free' : '$' . ($product->regular_price + 0)); ?></span>
                            </label>
                            <?php if($extendedPrice > 0): ?>
                                <input type="radio" name="license" id="extended" value="2" hidden />
                                <label for="extended" class="ds-license-item">
                                    <span class="ds-license-radio"></span>
                                    <span class="ds-license-info">
                                        <span class="ds-license-name">Extended License</span>
                                        <span class="ds-license-desc">One end product you can charge for. No resale. Priority support.</span>
                                    </span>
                                    <span class="ds-license-price">$<?php echo e($extendedPrice + 0); ?></span>
                                </label>
                            <?php endif; ?>
                        </div>

                        <div class="pm-info">
                            <i class="far fa-info-circle"></i>
                            <span>3 months support included on all license types</span>
                        </div>

                        <hr class="pm-divider" />

                        <div class="pm-section-head">
                            <span class="pm-section-label">Extended Support</span>
                            <a href="<?php echo e(route('tos')); ?>#support" class="pm-section-link">What does support include?</a>
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
                    </div>

                    <hr class="pm-divider pm-divider--footer" />
                    <div class="pm-footer">
                        <div class="pm-total">
                            <span class="pm-total-label">Total Price</span>
                            <h4 class="pm-total-value">$<span class="grand-total"></span> USD</h4>
                        </div>
                        <?php if(auth()->guard()->guest()): ?>
                            <button type="submit" class="btn btn--base pm-order-btn">Order Now</button>
                        <?php endif; ?>
                        <?php if(auth()->guard()->check()): ?>
                            <button type="submit" class="btn btn--base pm-order-btn">Order Now</button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function() {
            var regularPrice = <?php echo e($product->regular_price + 0); ?>;
            var extendedPrice = <?php echo e($extendedPrice); ?>;

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

                $('.grand-total').text(totalPrice.toFixed(2));
                $('.support-price').text(supportPrice.toFixed(2));
                $('.support-price-promo').text(supportPromoPrice.toFixed(2));
            }

            $('input[name="license"], #support').on('change', updateTotalPrice);
            updateTotalPrice();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('template.layouts.frontend', ['seodata' => $seodata], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/gepnqwpi/unlockthemes.com/core/resources/views/template/product/details.blade.php ENDPATH**/ ?>