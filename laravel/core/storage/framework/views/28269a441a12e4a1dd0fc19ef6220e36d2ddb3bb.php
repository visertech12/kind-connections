
<?php $__env->startSection('panel'); ?>

<div class="table-card">
  <div class="table-card__inner d-flex flex-wrap flex-between align-center gap-2">
    <div class="table-card__heading">
      <h2 class="table-card__title"><span class="icon"><i class="icon-direct-purchase-outline"></i></span> My Direct Purchases</h2>
    </div> 
    <a href="<?php echo e(route('product.all')); ?>" class="btn btn--success outline"> <span class="icon"><i class="icon-add"></i></span> Purchase Now</a>
  </div>
  <div class="table-card__table">
    <?php if(isset($purchases) && $purchases->count()): ?>
    <table class="table table--responsive--xl">
      <thead>
        <tr>
          <th>Item Name</th>
          <th>Username - Purchase Code</th>
          <th>License Type</th>
          <th>Purchased at</th>
          <th>Supported Until</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td data-label="Item Name">
             <?php $__currentLoopData = $purchase->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <?php if(strpos($item->description, 'Extended Support') === false): ?>
                     <div>
                         <span class="fw-bold"><?php echo e($item->description); ?></span>
                     </div>
                 <?php endif; ?>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </td>
          <td data-label="Username - Purchase Code">
            <div>
                <span class="fw-bold"><?php echo e(auth()->user()->username); ?></span> <br>
                <small><?php echo e($purchase->invid); ?></small>
            </div>
          </td>
          <td data-label="License Type">
             <?php $__currentLoopData = $purchase->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <?php $details = json_decode(@$item->details, true); ?>
                 <?php if(isset($details['license_type'])): ?>
                     <span class="badge badge--secondary"><?php echo e($details['license_type']); ?></span>
                 <?php endif; ?>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </td>
          <td data-label="Purchased at">
            <div>
                <em class="text-muted"><?php echo e(showDateTime($purchase->created_at,'Y-m-d')); ?></em><br>
                <small><?php echo e(\Carbon\Carbon::parse($purchase->created_at)->diffForHumans()); ?></small>
            </div>
          </td>
          <td data-label="Supported Until">
             <?php
                $hasExtendedSupport = $purchase->items->contains('description', 'Extended Support (6 months)');
                $supportMonths = $hasExtendedSupport ? 12 : 6;
                $supportedUntil = \Carbon\Carbon::parse($purchase->created_at)->addMonths($supportMonths);
                $isExpired = $supportedUntil->isPast();
             ?>
             <div>
                <em class="text-muted"><?php echo e(showDateTime($supportedUntil, 'Y-m-d')); ?></em><br>
                <?php if($isExpired): ?>
                    <span class="badge badge--danger">Support Expired</span>
                <?php else: ?>
                    <span class="badge badge--success">Supported</span>
                <?php endif; ?>
             </div>
          </td>
          <td data-label="Action">
            <a href="<?php echo e(route('user.direct.purchase.details',$purchase->invid)); ?>" class="btn btn--base d-inline-block">Details</a>
          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
      </tbody>
    </table>
    <?php else: ?>
    <div class="not-data-found">
      <span class="not-data-found__icon">
        <i class="icon-direct-purchase-outline"></i>
      </span>
      <span class="not-data-found__text">No Direct Purchases Yet!</span>
    </div>
    <?php endif; ?>
  </div>
</div>
<?php if(isset($purchases) && $purchases->hasPages()): ?>
    <?php echo e($purchases->links('admin.partials.paginate')); ?>

<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/gepnqwpi/unlockthemes.com/core/resources/views/user/direct_purchases.blade.php ENDPATH**/ ?>