

<?php $__env->startSection('panel'); ?>

    <div class="table-card">
        <div class="table-card__inner d-flex flex-wrap flex-between align-center gap-2">
            <div class="table-card__heading">
                <h2 class="table-card__title"><span class="icon"><i class="icon-save-money"></i></span> My Deposit History </h2>
            </div>
        </div>
        <div class="table-card__table">
            <?php if($deposits->count()): ?>
                <table class="table table--responsive--xl">
                    <thead>
                        <tr>
                            <th>Transaction #</th>
                            <th>Gateway</th>
                            <th>Deposited on</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td data-label="Transaction #"><?php echo e($log->trx); ?></td>
                                <td data-label="Gateway"><span class="fw-bold"><?php echo e($log->gateway->name); ?></span></td>
                                <td data-label="Deposited on">
                                    <div><em class="text-muted"><?php echo e(showDateTime($log->created_at)); ?></em><br>
                                        <?php echo e(diffForHumans($log->created_at)); ?>

                                    </div>
                                </td>
                                <td data-label="Amount"><span class="fw-bold">$<?php echo e(getAmount($log->final_amo)); ?> USD</span></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="not-data-found">
                    <span class="not-data-found__icon"><i class="icon-save-money"></i></span>
                    <span class="not-data-found__text">No Deposit Yet!</span>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php echo e($deposits->links('admin.partials.paginate')); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/gepnqwpi/unlockthemes.com/core/resources/views/user/report/deposits.blade.php ENDPATH**/ ?>