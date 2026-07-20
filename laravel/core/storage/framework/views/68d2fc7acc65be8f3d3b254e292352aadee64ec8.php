<?php $__env->startSection('content'); ?>

<section class="product py-120">
    <div class="container">
        <div class="search-filter flex-between flex-align">
            <div>
                <h3 class="m-0"><?php echo e($page_title); ?></h3>
            </div>
            <div class="search-form">

                <form method="GET" class="autoSubmit">
                <div class="gap-3 d-flex">
                    <div class="search-box flex-align gap-2">
                        <span>Search Product</span>
                        <div class="input-group">
                            <input type="text" name="search" class="form-control form--control" placeholder="Search product" value="<?php echo e(request()->search); ?>">
                            <button type="submit" class="input-group-text search-box__button"><i class="far fa-search"></i></button>
                        </div>
                    </div>
                    <div class="shorts flex-align gap-2">
                        <span>Sort By</span>
                        <select class="select form--control orderBy" name="order_by" onchange="this.form.submit()">
                            <option value="created_at" <?php if(request()->order_by == 'created_at'): ?> selected <?php endif; ?>>Date Published</option>
                            <option value="updated_at" <?php if(request()->order_by == 'updated_at'): ?> selected <?php endif; ?>>Date Updated</option>
                            <option value="rating" <?php if(request()->order_by == 'rating'): ?> selected <?php endif; ?>>Rating</option>
                            <option value="price" <?php if(request()->order_by == 'price'): ?> selected <?php endif; ?>>Price</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row gy-4 justify-content-center">

        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-xl-3 col-lg-4 col-sm-6 col-xsm-6">
            <div class="product-card d-flex flex-wrap">
                <div class="product-card__thumb">
                    <a href="<?php echo e(route('product.details', $product->slug)); ?>" class="link"> <img src="<?php echo e(asset('assets/images/products/'.$product->image)); ?>" alt="" class="fit-image" onerror="this.src='<?php echo e(getImage(imagePath()['image']['default'], '600x400')); ?>'"></a>
                </div>
                <div class="product-card__content d-flex flex-wrap align-content-between">
                    <div class="product-card__inner w-100">
                        <h6 class="product-card__title"> <a href="<?php echo e(route('product.details', $product->slug)); ?>" class="link border-effect"><?php echo e($product->name); ?></a></h6>
                        <div class="product-card__rating flex-between"> 
                            <ul class="rating-list"><?php echo getStar($product->rating); ?></ul>
                            <a href="<?php echo e(@$product->attributes['Demo URL'] ?? '#'); ?>" target="_blank" class="btn btn--gray btn--sm outline">Live Preview</a>
                        </div>
                    </div>
                    <div class="product-card__meta flex-between w-100">
                        <div class="product-card__actions">
                            <a href="<?php echo e(route('product.category', $product->category->slug)); ?>" class="flex-align gap-2"><span class="category-icon flex-center" data-color="#<?php echo e($product->category->color_class ?? 'F9322C'); ?>"><i class="<?php echo e($product->category->icon_class ?? 'fab fa-laravel'); ?>"></i></span><span class="item-category-name"><?php echo e($product->category->short_name ?? $product->category->name); ?></span></a>
                        </div>
                        <h6 class="product-card__price">
                            <?php if($product->is_free): ?>
                                <span class="text-success">Free</span>
                            <?php else: ?>
                                $<?php echo e(getAmount($product->regular_price)); ?>

                            <?php endif; ?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-12 text-center mt-5">
            <h4 class="text-muted"><?php echo e(__($emptyMessage)); ?></h4>
        </div>
        <?php endif; ?>

    </div>
    
    <?php if($products->hasPages()): ?>
    <div class="row mt-5">
        <div class="col-12 d-flex justify-content-center">
            <?php echo e(paginateLinks($products)); ?>

        </div>
    </div>
    <?php endif; ?>
</div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/gepnqwpi/unlockthemes.com/core/resources/views/template/product/list.blade.php ENDPATH**/ ?>