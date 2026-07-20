<?php
$seodata['title'] = '404 | Page Not Found';
?>

<?php $__env->startSection('element'); ?>

<section class="error-page py-60 full-display">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="error-page__inner">
          <div class="error-page__thumb">
            <img src="<?php echo e(asset('assets/images/thumbs/error-404.png')); ?>" alt="">
          </div>
          <div class="error-page__content">
            <h2 class="error-page__title">Oh no! Page Not Found.</h2>
            <p class="error-page__desc">We apologize, but it seems that the page you're looking for cannot be found. You've encountered a 404 Error, indicating that the requested page may have been moved, deleted, or is temporarily unavailable.</p>
            <a href="<?php echo e(route('home')); ?>" class="btn btn--base"> <span class="icon"><i class="fas fa-home"></i></span> Back To Home</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('template.layouts.master',['seodata' => $seodata], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/gepnqwpi/unlockthemes.com/core/resources/views/errors/404.blade.php ENDPATH**/ ?>