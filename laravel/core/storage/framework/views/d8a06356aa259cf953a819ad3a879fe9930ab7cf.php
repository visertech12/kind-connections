<?php
$routeName = request()->route() ? request()->route()->getName() : '';
$allSeo = config('seo');
$seoData = isset($allSeo[$routeName]) ? $allSeo[$routeName] : config('seo.default');

// Support $seodata array (passed by product/service pages) OR loose variables
if (isset($seodata) && is_array($seodata)) {
    $mytitle         = $seodata['title']        ?? ($seoData['title'] ?? '');
    $metadescription = $seodata['description']  ?? ($seoData['description'] ?? '');
    $metakeywords    = $seodata['keyword']       ?? ($seoData['keyword'] ?? '');
    $metaimage       = !empty($seodata['image']) ? $seodata['image'] : asset($seoData['image'] ?? '');
} else {
    $mytitle         = isset($page_title) && $page_title ? $page_title : ($seoData['title'] ?? '');
    if (isset($seo_title) && $seo_title) $mytitle = $seo_title;
    $metadescription = isset($seo_description) && $seo_description ? $seo_description : ($seoData['description'] ?? '');
    $metakeywords    = isset($seo_keywords) && $seo_keywords ? $seo_keywords : ($seoData['keyword'] ?? '');
    $metaimage       = asset($seoData['image'] ?? '');
}

$ogimgDetails = pathinfo($metaimage);
if(isset($ogimgDetails['extension']) && $ogimgDetails['extension'] == 'png'){
  $ogImageType = 'image/png';
}else{
  $ogImageType = 'image/jpeg';
}

// Determine og:type — product pages use 'product', others use 'website'
$ogType = (isset($seodata) && str_contains(request()->getPathInfo(), '/item/')) ? 'product' : 'website';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#030442">
  <meta name="title" Content="<?php echo e($mytitle); ?>">
  <meta name="description" content="<?php echo e($metadescription); ?>">
  <meta name="keywords" content="<?php echo e($metakeywords); ?>">
  <meta name="author" content="Unlock Themes LLC">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="<?php echo e($mytitle); ?>">
  <meta property="og:type" content="<?php echo e($ogType); ?>">
  <meta property="og:title" content="<?php echo e($mytitle); ?>">
  <meta property="og:site_name" content="Unlock Themes">
  <meta property="og:description" content="<?php echo e($metadescription); ?>">
  <meta property="og:image" content="<?php echo e($metaimage); ?>">
  <meta property="og:image:type" content="<?php echo e($ogImageType); ?>">
  <meta property="og:image:width" content="590">
  <meta property="og:image:height" content="300">
  <?php $currentUrl = isset($canonical_url) ? $canonical_url : url()->current(); ?>
  <meta property="og:url" content="<?php echo e($currentUrl); ?>">
  <link rel="canonical" href="<?php echo e($currentUrl); ?>">
  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "WebSite",
      "name": "Unlock Themes",
      "url": "https://unlockthemes.com"
    }
  </script>

  <?php echo $__env->yieldPushContent('extrameta'); ?>

  <title><?php echo e($mytitle); ?></title>
  <link rel="icon" href="<?php echo e(asset('assets/images/logoIcon/favicon.png')); ?>" type="image/png">
  <link rel="shortcut icon" href="<?php echo e(asset('assets/images/logoIcon/favicon.png')); ?>" type="image/png">
  <link rel="apple-touch-icon" href="<?php echo e(asset('assets/images/logoIcon/favicon.png')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/user/css/bootstrap.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/user/css/fontawesome-all.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/template/css/slick.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/template/css/odometer.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/template/css/main.css')); ?>?v=20260201">

  <?php echo $__env->yieldPushContent('style-lib'); ?>
  
  <?php echo $__env->yieldPushContent('style'); ?>

</head>
<body>

  <div class="preloader">
    <div class="preloader__favicon">        
      <img src="<?php echo e(asset('assets/images/logoIcon/favicon-white.png')); ?>" alt="">
    </div>
    <div class="preloader__circle">
    </div>
  </div>

  <div class="body-overlay"></div>

  <div class="sidebar-overlay"></div>

  <?php echo $__env->yieldContent('element'); ?>


  <script src="<?php echo e(asset('assets/user/js/jquery-3.6.3.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/user/js/boostrap.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/template/js/slick.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/template/js/odometer.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/template/js/viewport.jquery.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/template/js/main.js')); ?>"></script>

  <?php echo $__env->yieldPushContent('script-lib'); ?>

  <?php echo $__env->yieldPushContent('script'); ?>

  <?php echo $__env->make('admin.partials.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


  <?php if(auth()->guard()->check()): ?>
    <script>
    var Tawk_API=Tawk_API||{};
    Tawk_API.visitor = {
      name : '<?php echo e(auth()->user()->fullname); ?>',
      email : '<?php echo e(auth()->user()->email); ?>'
    };
    var Tawk_LoadStart=new Date();
    </script>
  <?php endif; ?>

    <script>
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
      var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
      s1.async=true;
      s1.src='https://embed.tawk.to/5fe0b9b2a8a254155ab5421d/1eq2tap1m';
      s1.charset='UTF-8';
      s1.setAttribute('crossorigin','*');
      s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    
    
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-V5HTWZ1D7X"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-V5HTWZ1D7X');
</script>

</body>
</html>
<?php /**PATH /home1/gepnqwpi/unlockthemes.com/core/resources/views/template/layouts/master.blade.php ENDPATH**/ ?>