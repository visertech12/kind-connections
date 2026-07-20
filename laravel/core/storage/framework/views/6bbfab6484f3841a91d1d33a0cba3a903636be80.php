
<?php $__env->startSection('content'); ?>

<div class="dashboard position-relative">
    <div class="dashboard__inner">

        <?php echo $__env->make('user.partials.leftnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="dashboard__right">

            <?php echo $__env->make('user.partials.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="dashboard-body">

  

                <?php echo $__env->yieldContent('panel'); ?>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/gepnqwpi/unlockthemes.com/core/resources/views/user/layouts/app.blade.php ENDPATH**/ ?>