

<?php $__env->startSection('panel'); ?>

    <div class="table-card">
        <div class="table-card__inner d-flex flex-wrap flex-between align-center gap-2">
            <div class="table-card__heading">
                <h2 class="table-card__title"><span class="icon"><i class="icon-transaction"></i></span> My Transaction History </h2>
            </div>
        </div>
        <div class="table-card__table">
            <?php if($transactions->count()): ?>
                <table class="table table--responsive--xl">
                    <thead>
                        <tr>
                            <th>Transaction #</th>
                            <th>Transacted on</th>
                            <th>Amount</th>
                            <th>Remaining Balance</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td data-label="Transaction #"><?php echo e($trx->trx); ?></td>
                                <td data-label="Transacted on"><?php echo e(showDateTime($trx->created_at)); ?></td>
                                <td data-label="Amount">
                                    <span <?php if($trx->trx_type == '+'): ?> class="text--success fw-bold" <?php else: ?> class="text--danger fw-bold" <?php endif; ?>>
                                        <?php echo e($trx->trx_type == '+' ? '+' : '-'); ?> $<?php echo e(getAmount($trx->amount)); ?> <?php echo e($general->cur_text); ?>

                                    </span>
                                </td>
                                <td data-label="Remaining Balance">$<?php echo e(getAmount($trx->post_balance)); ?> USD</td>
                                <td data-label="Description"><?php echo e($trx->details); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="not-data-found">
                    <span class="not-data-found__icon"><i class="icon-transaction"></i></span>
                    <span class="not-data-found__text">No Transaction Yet!</span>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php echo e($transactions->links('admin.partials.paginate')); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/gepnqwpi/unlockthemes.com/core/resources/views/user/report/transactions.blade.php ENDPATH**/ ?>