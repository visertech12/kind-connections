@php
$routeName = request()->route() ? request()->route()->getName() : '';
$seoData = config('seo.' . $routeName, config('seo.default'));

$mytitle = isset($page_title) && $page_title ? $page_title : $seoData['title'];
if (isset($seo_title) && $seo_title) $mytitle = $seo_title;
$metadescription = isset($seo_description) && $seo_description ? $seo_description : $seoData['description'];
$metakeywords = isset($seo_keywords) && $seo_keywords ? $seo_keywords : $seoData['keyword'];
$metaimage = asset($seoData['image']);

$ogimgDetails = pathinfo($metaimage);
if(isset($ogimgDetails['extension']) && $ogimgDetails['extension'] == 'png'){
  $ogImageType = 'image/png';
}else{
  $ogImageType = 'image/jpeg';
}

@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#030442">
  <meta name="title" Content="{{ $mytitle }}">
  <meta name="description" content="{{$metadescription}}">
  <meta name="keywords" content="{{$metakeywords}}">
  <meta name="author" content="Unlock Themes LLC">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="{{ $mytitle }}">
  <meta property="og:type" content="website">
  <meta property="og:title" content="{{ $mytitle }}">
  <meta property="og:site_name" content="Unlock Themes">
  <meta property="og:description" content="{{$metadescription}}">
  <meta property="og:image" content="{{$metaimage}}">
  <meta property="og:image:type" content="{{$ogImageType}}">
  <meta property="og:image:width" content="590">
  <meta property="og:image:height" content="300">
  <meta property="og:url" content="{{ url()->current() }}">
  <link rel="canonical" href="{{url()->current()}}">
  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "WebSite",
      "name": "Unlock Themes",
      "url": "https://unlockthemes.com"
    }
  </script>

  @stack('extrameta')

  <title>{{ $mytitle }}</title>
  <link rel="icon" href="{{asset('assets/images/logoIcon/favicon.png')}}" type="image/png">
  <link rel="shortcut icon" href="{{asset('assets/images/logoIcon/favicon.png')}}" type="image/png">
  <link rel="apple-touch-icon" href="{{asset('assets/images/logoIcon/favicon.png')}}">
  <link rel="stylesheet" href="{{asset('assets/user/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/user/css/fontawesome-all.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/template/css/slick.css')}}">
  <link rel="stylesheet" href="{{asset('assets/template/css/odometer.css')}}">
  <link rel="stylesheet" href="{{asset('assets/template/css/main.css')}}?v=20260201">

  @stack('style-lib')
  
  @stack('style')

</head>
<body>

  <div class="preloader">
    <div class="preloader__favicon">        
      <img src="{{asset('assets/images/logoIcon/favicon-white.png')}}" alt="">
    </div>
    <div class="preloader__circle">
    </div>
  </div>

  <div class="body-overlay"></div>

  <div class="sidebar-overlay"></div>

  @yield('element')
{{--
  @include('template.layouts.promomodal')
--}}

  <script src="{{asset('assets/user/js/jquery-3.6.3.min.js')}}"></script>
  <script src="{{asset('assets/user/js/boostrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/template/js/slick.min.js')}}"></script>
  <script src="{{asset('assets/template/js/odometer.min.js')}}"></script>
  <script src="{{asset('assets/template/js/viewport.jquery.js')}}"></script>
  <script src="{{asset('assets/template/js/main.js')}}"></script>

  @stack('script-lib')

  @stack('script')

  @include('admin.partials.notify')


  @auth
    <script>
    var Tawk_API=Tawk_API||{};
    Tawk_API.visitor = {
      name : '{{auth()->user()->fullname}}',
      email : '{{auth()->user()->email}}'
    };
    var Tawk_LoadStart=new Date();
    </script>
  @endauth

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
