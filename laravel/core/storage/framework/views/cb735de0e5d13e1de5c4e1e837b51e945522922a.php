<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
    };

    <?php if(Session::has('success')): ?>
        toastr.success("<?php echo e(Session::get('success')); ?>");
    <?php endif; ?>
    <?php if(Session::has('error')): ?>
        toastr.error("<?php echo e(Session::get('error')); ?>");
    <?php endif; ?>
    <?php if(Session::has('info')): ?>
        toastr.info("<?php echo e(Session::get('info')); ?>");
    <?php endif; ?>
    <?php if(Session::has('warning')): ?>
        toastr.warning("<?php echo e(Session::get('warning')); ?>");
    <?php endif; ?>
    <?php if($errors->any()): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            toastr.error("<?php echo e($error); ?>");
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</script>
<?php /**PATH /home1/gepnqwpi/unlockthemes.com/core/resources/views/admin/partials/notify.blade.php ENDPATH**/ ?>