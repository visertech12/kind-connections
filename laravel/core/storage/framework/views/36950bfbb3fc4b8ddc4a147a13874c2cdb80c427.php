<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset
  xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
  xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
  http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

<?php
    $defaultLastmod = '2026-06-18T12:00:00+00:00';
?>

  <!-- Home -->
  <url>
    <loc><?php echo e(route('home')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>1.00</priority>
  </url>
  <url>
    <loc><?php echo e(route('book.meeting')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc><?php echo e(route('about')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.80</priority>
  </url>

  <!-- Services -->
  <url>
    <loc><?php echo e(route('service.web')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc><?php echo e(route('service.app')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc><?php echo e(route('service.uiux')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc><?php echo e(route('service.hosting')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc><?php echo e(route('service.marketing')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc><?php echo e(route('service.consultancy')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.80</priority>
  </url>

  <!-- Dynamic Categories -->
  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <url>
    <loc><?php echo e(route('product.category', $category->slug)); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.90</priority>
  </url>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  <!-- Store / Products Page -->
  <url>
    <loc><?php echo e(route('product.all')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.90</priority>
  </url>
  <url>
    <loc><?php echo e(route('product.featured')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.90</priority>
  </url>

  <!-- Hosting -->
  <url>
    <loc><?php echo e(route('hosting.budget')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc><?php echo e(route('hosting.premium')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc><?php echo e(route('hosting.vps')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc><?php echo e(route('hosting.dedicated')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc><?php echo e(route('hosting.cluster')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc><?php echo e(route('hosting.smtp')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc><?php echo e(route('domain.register')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.80</priority>
  </url>

  <!-- Digital Marketing -->
  <url>
    <loc><?php echo e(route('marketing.backlink')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc><?php echo e(route('marketing.linkpyramid')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc><?php echo e(route('marketing.pr')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc><?php echo e(route('marketing.advertising')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc><?php echo e(route('marketing.branding')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc><?php echo e(route('marketing.seo')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.80</priority>
  </url>

  <!-- Support & Contact -->
  <url>
    <loc><?php echo e(route('contact')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc><?php echo e(route('faq')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc><?php echo e(route('support')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.80</priority>
  </url>

  <!-- Auth -->
  <url>
    <loc><?php echo e(route('user.login')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.50</priority>
  </url>
  <url>
    <loc><?php echo e(route('user.register')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.50</priority>
  </url>
  <url>
    <loc><?php echo e(route('user.password.forgot')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.50</priority>
  </url>

  <!-- Policies -->
  <url>
    <loc><?php echo e(route('privacy')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.50</priority>
  </url>
  <url>
    <loc><?php echo e(route('refund')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.50</priority>
  </url>
  <url>
    <loc><?php echo e(route('tos')); ?></loc>
    <lastmod><?php echo e($defaultLastmod); ?></lastmod>
    <priority>0.50</priority>
  </url>

  <!-- Products -->
  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <url>
    <loc><?php echo e(route('product.details', $product->slug)); ?></loc>
    <lastmod><?php echo e($product->updated_at ? $product->updated_at->tz('UTC')->toAtomString() : $defaultLastmod); ?></lastmod>
    <priority>0.64</priority>
  </url>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</urlset>
<?php /**PATH /home1/gepnqwpi/unlockthemes.com/core/resources/views/template/sitemap.blade.php ENDPATH**/ ?>