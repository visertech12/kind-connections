<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset
  xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
  xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
  http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

@php
    $defaultLastmod = '2026-06-18T12:00:00+00:00';
@endphp

  <!-- Home -->
  <url>
    <loc>{{ route('home') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>1.00</priority>
  </url>
  <url>
    <loc>{{ route('book.meeting') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc>{{ route('about') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.80</priority>
  </url>

  <!-- Services -->
  <url>
    <loc>{{ route('service.web') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc>{{ route('service.app') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc>{{ route('service.uiux') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc>{{ route('service.hosting') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc>{{ route('service.marketing') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc>{{ route('service.consultancy') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.80</priority>
  </url>

  <!-- Dynamic Categories -->
  @foreach($categories as $category)
  <url>
    <loc>{{ route('product.category', $category->slug) }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.90</priority>
  </url>
  @endforeach

  <!-- Store / Products Page -->
  <url>
    <loc>{{ route('product.all') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.90</priority>
  </url>
  <url>
    <loc>{{ route('product.featured') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.90</priority>
  </url>

  <!-- Hosting -->
  <url>
    <loc>{{ route('hosting.budget') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc>{{ route('hosting.premium') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc>{{ route('hosting.vps') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc>{{ route('hosting.dedicated') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc>{{ route('hosting.cluster') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc>{{ route('hosting.smtp') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc>{{ route('domain.register') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.80</priority>
  </url>

  <!-- Digital Marketing -->
  <url>
    <loc>{{ route('marketing.backlink') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc>{{ route('marketing.linkpyramid') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc>{{ route('marketing.pr') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc>{{ route('marketing.advertising') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc>{{ route('marketing.branding') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc>{{ route('marketing.seo') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.80</priority>
  </url>

  <!-- Support & Contact -->
  <url>
    <loc>{{ route('contact') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc>{{ route('faq') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc>{{ route('support') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.80</priority>
  </url>

  <!-- Auth -->
  <url>
    <loc>{{ route('user.login') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.50</priority>
  </url>
  <url>
    <loc>{{ route('user.register') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.50</priority>
  </url>
  <url>
    <loc>{{ route('user.password.forgot') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.50</priority>
  </url>

  <!-- Policies -->
  <url>
    <loc>{{ route('privacy') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.50</priority>
  </url>
  <url>
    <loc>{{ route('refund') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.50</priority>
  </url>
  <url>
    <loc>{{ route('tos') }}</loc>
    <lastmod>{{ $defaultLastmod }}</lastmod>
    <priority>0.50</priority>
  </url>

  <!-- Products -->
  @foreach($products as $product)
  <url>
    <loc>{{ route('product.details', $product->slug) }}</loc>
    <lastmod>{{ $product->updated_at ? $product->updated_at->tz('UTC')->toAtomString() : $defaultLastmod }}</lastmod>
    <priority>0.64</priority>
  </url>
  @endforeach

</urlset>
