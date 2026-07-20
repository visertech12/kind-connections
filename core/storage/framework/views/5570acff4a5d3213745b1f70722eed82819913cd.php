
<?php $__env->startSection('panel'); ?>

    <div class="table-card">
        <div class="table-card__inner d-flex flex-wrap flex-between align-center gap-2">
            <div class="table-card__heading">
                <h2 class="table-card__title"><span class="icon"><i class="fa-light fa-sign-in-alt"></i></span> My Login History </h2>
            </div>
        </div>
        <div class="table-card__table">
            <?php if($logins->count()): ?>
                <table class="table table--responsive--xl">
                    <thead>
                        <tr>
                            <th>Login Time</th>
                            <th>Browser</th>
                            <th>OS</th>
                            <th>Login From</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $__currentLoopData = $logins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td data-label="Login Time">
                                    <div><em class="text-muted"><?php echo e(showDatetime($log->created_at)); ?></em> <br> <?php echo e(diffForHumans($log->created_at)); ?></div>
                                </td>
                                <td data-label="Browser">
                                    <div><i class="<?php echo e(getBrowserIcon($log->browser)); ?>"></i> <?php echo e($log->browser); ?></div>
                                </td>
                                <td data-label="OS">
                                    <div><i class="<?php echo e(getOSIcon($log->os)); ?>"></i> <?php echo e($log->os); ?></div>
                                </td>
                                <td data-label="Login From">
                                    <div><?php echo e($log->city); ?> <br> <?php echo e($log->country); ?></div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="not-data-found">
                    <span class="not-data-found__icon"><i class="icon-Logout"></i></span>
                    <span class="not-data-found__text">No Login Yet!</span>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php echo e($logins->links('admin.partials.paginate')); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/gepnqwpi/unlockthemes.com/core/resources/views/user/report/logins.blade.php ENDPATH**/ ?>