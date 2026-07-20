<?php $__env->startSection('panel'); ?>

<?php
    $productItem = $purchase->items->first(function($item) {
        return strpos($item->description, 'Extended Support') === false;
    });
    
    $productName = $productItem ? $productItem->description : 'N/A';
    $details = $productItem ? json_decode($productItem->details, true) : [];
    $licenseType = isset($details['license_type']) ? $details['license_type'] : 'N/A';
    
    $hasExtendedSupport = $purchase->items->contains('description', 'Extended Support (6 months)');
    $supportMonths = $hasExtendedSupport ? 12 : 6;
    $supportedUntil = \Carbon\Carbon::parse($purchase->created_at)->addMonths($supportMonths);
?>

<div class="row gy-4">
    <div class="col-md-12">
        <div class="custom--card card h-auto">
            <div class="card-header d-flex flex-wrap align-items-center gap-2">
                <h3 class="card-header__title">Purchase Details</h3>
            </div>
            <div class="card-body">
                <div class="row gy-3">
                    <div class="col-md-3 col-sm-6">
                        <div class="information-item">
                            <h6 class="information-item__title"> Product Name </h6>
                            <p class="information-item__text"> <?php echo e($productName); ?></p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="information-item">
                            <h6 class="information-item__title"> License Type </h6>
                            <p class="information-item__text"> <?php echo e($licenseType); ?></p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="information-item">
                            <h6 class="information-item__title"> Username </h6>
                            <p class="information-item__text"> <?php echo e(auth()->user()->username); ?> </p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="information-item">
                            <h6 class="information-item__title"> Purchase Code </h6>
                            <p class="information-item__text"> <?php echo e($purchase->invid); ?> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="custom--card card h-auto">
            <div class="card-header d-flex flex-wrap align-items-center gap-2">
                <h3 class="card-header__title">Billing Details</h3>
            </div>
            <div class="card-body">
                <div class="row gy-3">
                    <div class="col-md-3 col-sm-6">
                        <div class="information-item">
                            <h6 class="information-item__title"> Invoice ID </h6>
                            <p class="information-item__text"> #<?php echo e($purchase->invid); ?> </p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="information-item">
                            <h6 class="information-item__title"> Purchase Date </h6>
                            <p class="information-item__text"> <?php echo e(showDateTime($purchase->created_at, 'Y-m-d')); ?></p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="information-item">
                            <h6 class="information-item__title"> Supported Until </h6>
                            <p class="information-item__text"> 
                                <?php echo e(showDateTime($supportedUntil, 'Y-m-d')); ?> 
                                <?php if($supportedUntil->isPast()): ?>
                                    <span class="badge badge--danger ms-2">Expired</span>
                                <?php else: ?>
                                    <span class="badge badge--success ms-2">Supported</span>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="information-item">
                            <h6 class="information-item__title"> Amount </h6>
                            <p class="information-item__text"> $<?php echo e(getAmount($purchase->amount)); ?> USD </p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="information-item">
                            <h6 class="information-item__title"> Status </h6>
                            <p class="information-item__text"> <?php echo printInvoiceStatus($purchase->status); ?> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 mt-4 text-end">
        <a href="<?php echo e(route('user.invoice.details', $purchase->invid)); ?>" class="btn btn--base outline"><i class="fa-regular fa-file-invoice"></i> View Invoice</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/gepnqwpi/unlockthemes.com/core/resources/views/user/direct_purchase_details.blade.php ENDPATH**/ ?>