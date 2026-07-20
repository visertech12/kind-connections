<?php $__env->startSection('element'); ?>



    <?php echo $__env->make('template.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main id="main-content">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php if(!request()->routeIs('book.meeting')): ?>
        
        <?php echo $__env->make('template.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/gepnqwpi/unlockthemes.com/core/resources/views/template/layouts/frontend.blade.php ENDPATH**/ ?>