<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{$general->sitename($page_title ?? '')}}</title>
  <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/logoIcon/favicon.png')}}">
  <link rel="stylesheet" href="{{asset('assets/user/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/user/css/fontawesome-all.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/user/css/icon-moon.css')}}">
  <link rel="stylesheet" href="{{asset('assets/user/css/main.css')}}">

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

  @yield('content')

  <script src="{{asset('assets/user/js/jquery-3.6.3.min.js')}}"></script>
  <script src="{{asset('assets/user/js/boostrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/user/js/main.js')}}"></script>

  @include('admin.partials.notify')

  @stack('script-lib')

  @stack('script')

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

{{--
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1ME4K0RD7K"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-1ME4K0RD7K');
</script>
--}}

<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v833ccba57c9e4d2798f2e76cebdd09a11778172276447" integrity="sha512-57MDmcccJXYtNnH+ZiBwzC4jb2rvgVCEokYN+L/nLlmO8rfYT/gIpW2A569iJ/3b+0UEasghjuZH/ma3wIs/EQ==" data-cf-beacon='{"version":"2024.11.0","token":"0542d18bc5a94bf6b5460f8530f5a523","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
</body>
</html>
