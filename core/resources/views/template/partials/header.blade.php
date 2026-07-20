
<header class="header  @if(!request()->routeIs('home')) internal-page-header @endif" id="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logo" href="{{route('home')}}"><img src="{{asset('assets/images/logoIcon/logo-dark.png')}}" alt=""></a>
            <button class="navbar-toggler header-button" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span id="hiddenNav"><i class="far fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-menu mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item has-mega-menu">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Company <span class="nav-item__icon"><i class="far fa-angle-down"></i></span></a>
                        <div class="mega-menu dropdown-menu">
                            <div class="mega-menu__inner">
                                <ul class="mega-menu-list flex-wrap">
                                    <li class="mega-menu-list__item success-item">
                                        <a href="{{route('about')}}" class="mega-menu-list__link flex-wrap">
                                            <span class="mega-menu-list__icon flex-center fs-15">
                                                <i class="fa-regular fa-circle-info"></i>
                                            </span>
                                            <div class="mega-menu-list__content">
                                                <span class="mega-menu-list__title">About Us</span>
                                                <p class="mega-menu-list__desc fs-14">Learn about Unlock Themes, our mission, and how we work.</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mega-menu-list__item base-item">
                                        <a href="{{route('support')}}" class="mega-menu-list__link flex-wrap">
                                            <span class="mega-menu-list__icon flex-center fs-15">
                                                <i class="fa-regular fa-headset"></i>
                                            </span>
                                            <div class="mega-menu-list__content">
                                                <span class="mega-menu-list__title">Get Support</span>
                                                <p class="mega-menu-list__desc fs-14">Reach our support team for technical and service help.</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mega-menu-list__item info-item">
                                        <a href="{{route('book.meeting')}}" class="mega-menu-list__link flex-wrap">
                                            <span class="mega-menu-list__icon flex-center fs-15">
                                                <i class="fa-regular fa-calendar-check"></i>
                                            </span>
                                            <div class="mega-menu-list__content">
                                                <span class="mega-menu-list__title">Book a Meeting</span>
                                                <p class="mega-menu-list__desc fs-14">Schedule a session to discuss your goals with our team.</p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item has-mega-menu">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Services <span class="nav-item__icon"><i class="far fa-angle-down"></i></span></a>
                        <div class="mega-menu dropdown-menu">
                            <div class="mega-menu__inner">
                                <ul class="mega-menu-list flex-wrap">
                                    <li class="mega-menu-list__item violet-item" data-color="#6527BE">
                                        <a href="{{route('service.web')}}" class="mega-menu-list__link flex-wrap">
                                            <span class="mega-menu-list__icon flex-center fs-15">
                                                <i class="fa-sharp fa-light fa-browser"></i>
                                            </span>
                                            <div class="mega-menu-list__content">
                                                <span class="mega-menu-list__title">Web Application</span>
                                                <p class="mega-menu-list__desc fs-14">Creating dynamic web solutions for your business</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mega-menu-list__item base-item">
                                        <a href="{{route('service.app')}}" class="mega-menu-list__link flex-wrap">
                                            <span class="mega-menu-list__icon flex-center fs-15">
                                                <i class="fa-sharp fa-light fa-mobile-button"></i>
                                            </span>
                                            <div class="mega-menu-list__content">
                                                <span class="mega-menu-list__title">Mobile Application</span>
                                                <p class="mega-menu-list__desc fs-14">Building innovative and user-friendly mobile apps</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mega-menu-list__item info-item">
                                        <a href="{{route('service.uiux')}}" class="mega-menu-list__link flex-wrap">
                                            <span class="mega-menu-list__icon flex-center fs-15">
                                                <i class="fa-sharp fa-light fa-swatchbook"></i>
                                            </span>
                                            <div class="mega-menu-list__content">
                                                <span class="mega-menu-list__title">UI/UX Design</span>
                                                <p class="mega-menu-list__desc fs-14">Crafting intuitive designs for optimal user experiences</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mega-menu-list__item warning-item">
                                        <a href="{{route('service.hosting')}}" class="mega-menu-list__link flex-wrap">
                                            <span class="mega-menu-list__icon flex-center fs-15">
                                                <i class="fa-sharp fa-light fa-network-wired"></i>
                                            </span>
                                            <div class="mega-menu-list__content">
                                                <span class="mega-menu-list__title">Domain & Hosting</span>
                                                <p class="mega-menu-list__desc fs-14">Providing reliable domain registration and hosting services</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mega-menu-list__item info-item">
                                        <a href="{{route('service.marketing')}}" class="mega-menu-list__link flex-wrap">
                                            <span class="mega-menu-list__icon flex-center fs-15">
                                                <i class="fa-sharp fa-light fa-megaphone"></i>
                                            </span>
                                            <div class="mega-menu-list__content">
                                                <span class="mega-menu-list__title">Digital Marketing</span>
                                                <p class="mega-menu-list__desc fs-14">Driving online growth through strategic marketing solutions</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mega-menu-list__item violet-item">
                                        <a href="{{route('service.consultancy')}}" class="mega-menu-list__link flex-wrap">
                                            <span class="mega-menu-list__icon flex-center fs-15">
                                                <i class="fa-sharp fa-light fa-brain"></i>
                                            </span>
                                            <div class="mega-menu-list__content">
                                                <span class="mega-menu-list__title">Tech Consultancy</span>
                                                <p class="mega-menu-list__desc fs-14">Offering expert guidance for technical challenges</p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item has-mega-menu">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Products <span class="nav-item__icon"><i class="far fa-angle-down"></i></span></a>
                        <div class="mega-menu dropdown-menu">
                            <div class="mega-menu__inner">
                                <ul class="mega-menu-list flex-wrap">

                                    <li class="mega-menu-list__item"  data-color="#F9322C">
                                        <a href="{{route('product.category','php-scripts')}}" class="mega-menu-list__link flex-wrap">
                                            <span class="mega-menu-list__icon flex-center fs-15">
                                                <i class="fab fa-laravel"></i>
                                            </span>
                                            <div class="mega-menu-list__content">
                                                <span class="mega-menu-list__title">PHP Laravel Scripts</span>
                                                <p class="mega-menu-list__desc fs-14">Empowering dynamic web solutions</p>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="mega-menu-list__item"  data-color="#1b769c">
                                        <a href="{{route('product.category','wordpress')}}" class="mega-menu-list__link flex-wrap">
                                            <span class="mega-menu-list__icon flex-center fs-15">
                                                <i class="fab fa-wordpress-simple"></i>
                                            </span>
                                            <div class="mega-menu-list__content">
                                                <span class="mega-menu-list__title">WordPress</span>
                                                <p class="mega-menu-list__desc fs-14">Empower your website with wordPress</p>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="mega-menu-list__item"  data-color="#5fc9f8">
                                        <a href="{{route('product.category','mobile-apps')}}" class="mega-menu-list__link flex-wrap">
                                            <span class="mega-menu-list__icon flex-center fs-15">
                                                <i class="fas fa-mobile-alt"></i>
                                            </span>
                                            <div class="mega-menu-list__content">
                                                <span class="mega-menu-list__title">Mobile Apps</span>
                                                <p class="mega-menu-list__desc fs-14">Innovative solutions for mobile experiences</p>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="mega-menu-list__item"  data-color="#ff5722">
                                        <a href="{{route('product.category','html-templates')}}" class="mega-menu-list__link flex-wrap">
                                            <span class="mega-menu-list__icon flex-center fs-15">
                                                <i class="fab fa-html5"></i>
                                            </span>
                                            <div class="mega-menu-list__content">
                                                <span class="mega-menu-list__title">HTML Templates</span>
                                                <p class="mega-menu-list__desc fs-14">Building responsive and beautiful web foundations</p>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="mega-menu-list__item"  data-color="#8e44ad">
                                        <a href="{{route('product.category','flutter-ui')}}" class="mega-menu-list__link flex-wrap">
                                            <span class="mega-menu-list__icon flex-center fs-15">
                                                <i class="fa-duotone fa-mobile"></i>
                                            </span>
                                            <div class="mega-menu-list__content">
                                                <span class="mega-menu-list__title">Flutter UI</span>
                                                <p class="mega-menu-list__desc fs-14">Stunning user interfaces with flutter</p>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="mega-menu-list__item"  data-color="#2c3e50">
                                        <a href="{{route('product.category','app-ui')}}" class="mega-menu-list__link flex-wrap">
                                            <span class="mega-menu-list__icon flex-center fs-15">
                                                <i class="fa-light fa-mobile-notch"></i>
                                            </span>
                                            <div class="mega-menu-list__content">
                                                <span class="mega-menu-list__title">App UI</span>
                                                <p class="mega-menu-list__desc fs-14">Seamless user experiences for apps</p>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="mega-menu-list__item"  data-color="#a259ff">
                                        <a href="{{route('product.category','web-ui')}}" class="mega-menu-list__link flex-wrap">
                                            <span class="mega-menu-list__icon flex-center fs-15">
                                                <i class="fa-brands fa-figma"></i>
                                            </span>
                                            <div class="mega-menu-list__content">
                                                <span class="mega-menu-list__title">Web UI</span>
                                                <p class="mega-menu-list__desc fs-14">Elevate your web presence with modern UI</p>
                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </li> 

                    <li class="nav-item has-mega-menu">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Web Hosting <span class="nav-item__icon"><i class="far fa-angle-down"></i></span></a>
                        <div class="mega-menu dropdown-menu">
                            <div class="mega-menu__inner">
                                <ul class="mega-menu-list flex-wrap">
                                    <li class="mega-menu-list__item success-item">
                                        <a href="{{route('hosting.budget')}}" class="mega-menu-list__link flex-wrap">
                                            <span class="mega-menu-list__icon flex-center fs-15">
                                                <i class="fa-sharp fa-light fa-server"></i>
                                            </span>
                                            <div class="mega-menu-list__content">
                                                <span class="mega-menu-list__title">Budget Hosting</span>
                                                <p class="mega-menu-list__desc fs-14">Affordable hosting for every need</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mega-menu-list__item base-item">
                                        <a href="{{route('hosting.premium')}}" class="mega-menu-list__link flex-wrap">
                                            <span class="mega-menu-list__icon flex-center fs-15">
                                                <i class="fa-regular fa-server"></i>
                                            </span>
                                            <div class="mega-menu-list__content">
                                                <span class="mega-menu-list__title">Premium Hosting</span>
                                                <p class="mega-menu-list__desc fs-14">High-Quality hosting with advanced features</p>

                                            </div>
                                        </a>
                                    </li>
                                    <li class="mega-menu-list__item warning-item">
                                        <a href="{{route('hosting.vps')}}" class="mega-menu-list__link flex-wrap">
                                            <span class="mega-menu-list__icon flex-center fs-15">
                                                <i class="fa-light fa-chart-tree-map"></i>
                                            </span>
                                            <div class="mega-menu-list__content">
                                                <span class="mega-menu-list__title">VPS Hosting</span>
                                                <p class="mega-menu-list__desc fs-14">Flexible and scalable virtual private servers</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mega-menu-list__item violet-item">
                                        <a href="{{route('hosting.dedicated')}}" class="mega-menu-list__link flex-wrap">
                                            <span class="mega-menu-list__icon flex-center fs-15">
                                                <i class="fa-duotone fa-server"></i>
                                            </span>
                                            <div class="mega-menu-list__content">
                                                <span class="mega-menu-list__title">Dedicated Server</span>
                                                <p class="mega-menu-list__desc fs-14">Powerful dedicated servers for ultimate performance</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mega-menu-list__item info-item">
                                        <a href="{{route('hosting.cluster')}}" class="mega-menu-list__link flex-wrap">
                                            <span class="mega-menu-list__icon flex-center fs-15">
                                                <i class="fa-regular fa-network-wired"></i>
                                            </span>
                                            <div class="mega-menu-list__content">
                                                <span class="mega-menu-list__title">Server Cluster</span>
                                                <p class="mega-menu-list__desc fs-14">Robust architecture for load management and performance.</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mega-menu-list__item danger-item">
                                        <a href="{{route('hosting.smtp')}}" class="mega-menu-list__link flex-wrap">
                                            <span class="mega-menu-list__icon flex-center fs-15">
                                                <i class="fa-regular fa-envelopes-bulk"></i>
                                            </span>
                                            <div class="mega-menu-list__content">
                                                <span class="mega-menu-list__title">SMTP Server</span>
                                                <p class="mega-menu-list__desc fs-14">Reliable SMTP server setup for seamless email delivery</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mega-menu-list__item w-lg-50 w-100" data-color="#c56cf0">
                                        <a href="{{route('domain.register')}}" class="mega-menu-list__link flex-wrap">
                                            <span class="mega-menu-list__icon flex-center fs-15">
                                                <i class="fa-regular fa-globe"></i>
                                            </span>
                                            <div class="mega-menu-list__content">
                                                <span class="mega-menu-list__title">Domain Name Registration</span>
                                                <p class="mega-menu-list__desc fs-14">Secure your preferred domain names through a straightforward and hassle-free registration process.</p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item has-mega-menu">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">  Digital Marketing  <span class="nav-item__icon"><i class="far fa-angle-down"></i></span></a>
                        <div class="mega-menu dropdown-menu">
                            <div class="mega-menu__inner">
                                <ul class="mega-menu-list flex-wrap">
                                    <li class="mega-menu-list__item success-item">
                                        <a href="{{route('marketing.backlink')}}" class="mega-menu-list__link flex-wrap">
                                            <span class="mega-menu-list__icon flex-center fs-15">
                                                <i class="fa-solid fa-link-simple"></i>
                                            </span>
                                            <div class="mega-menu-list__content">
                                                <span class="mega-menu-list__title">Back Link</span>
                                                <p class="mega-menu-list__desc fs-14">Boost your online presence with back links</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mega-menu-list__item base-item">
                                        <a href="{{route('marketing.linkpyramid')}}" class="mega-menu-list__link flex-wrap">
                                            <span class="mega-menu-list__icon flex-center fs-15">
                                                <i class="fa-duotone fa-link"></i>
                                            </span>
                                            <div class="mega-menu-list__content">
                                                <span class="mega-menu-list__title">Link Pyramid</span>
                                                <p class="mega-menu-list__desc fs-14">Elevate your SEO strategy with link pyramids</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mega-menu-list__item info-item">
                                        <a href="{{route('marketing.pr')}}" class="mega-menu-list__link flex-wrap">
                                            <span class="mega-menu-list__icon flex-center fs-15">
                                                <i class="fa-duotone fa-newspaper"></i>
                                            </span>
                                            <div class="mega-menu-list__content">
                                                <span class="mega-menu-list__title"> Press Release</span>
                                                <p class="mega-menu-list__desc fs-14">Expand your reach through strategic press releases</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mega-menu-list__item" data-color="#ff793f">
                                        <a href="{{route('marketing.advertising')}}" class="mega-menu-list__link flex-wrap">
                                            <span class="mega-menu-list__icon flex-center fs-15">
                                                <i class="fa-solid fa-rectangle-ad"></i>
                                            </span>
                                            <div class="mega-menu-list__content">
                                                <span class="mega-menu-list__title"> Advertising</span>
                                                <p class="mega-menu-list__desc fs-14">Targeted campaigns for effective customer engagement</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mega-menu-list__item violet-item">
                                        <a href="{{route('marketing.branding')}}" class="mega-menu-list__link flex-wrap">
                                            <span class="mega-menu-list__icon flex-center fs-15">
                                                <i class="fa-light fa-swatchbook"></i>
                                            </span>
                                            <div class="mega-menu-list__content">
                                                <span class="mega-menu-list__title"> Branding</span>
                                                <p class="mega-menu-list__desc fs-14">Create a strong and memorable brand identity</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mega-menu-list__item" data-color="#009432">
                                        <a href="{{route('marketing.seo')}}" class="mega-menu-list__link flex-wrap">
                                            <span class="mega-menu-list__icon flex-center fs-15">
                                                <i class="fa-brands fa-searchengin"></i>
                                            </span>
                                            <div class="mega-menu-list__content">
                                                <span class="mega-menu-list__title"> Seo Service</span>
                                                <p class="mega-menu-list__desc fs-14">Comprehensive search engine optimization services</p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="account-button">
                    @php
                    $tempSession =  session()->get('tempOrder');
                    if($tempSession){
                    $tempOrdersCount = App\Models\TempOrder::where('sid',$tempSession)->count();
                    }
                    @endphp
                    @if(@$tempOrdersCount)
                    <a href="{{route('hosting.order.review')}}" class="temp-order-display btn btn--base outline me-2">
                      <span class="temp-order-count">{{$tempOrdersCount}}</span>
                      <i class="fa-duotone fa-cart-shopping"></i>
                    </a>
                    @endif
                    @guest 
                    <a href="{{route('user.login')}}" class="btn btn--base"> <span class="icon"><i class="far fa-sign-in-alt"></i></span> MY ACCOUNT</a>
                    @endguest
                    @auth
                    <a href="{{route('user.home')}}" class="btn btn--base"> <span class="icon"><i class="far fa-sign-in-alt"></i></span> MY ACCOUNT</a>
                    @endauth
                </div>
            </div>
        </nav>
    </div>
</header>
