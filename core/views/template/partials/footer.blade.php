
<footer class="footer pt-120">
    <div class="footer__shapes">
        <img src="{{asset('assets/images/shapes/footer-shape-1.png')}}" alt="footer shape" class="footer-shape one" width="120" height="120" loading="lazy">
        <img src="{{asset('assets/images/shapes/footer-shape-2.png')}}" alt="footer shape" class="footer-shape two" width="120" height="120" loading="lazy">
    </div>
    <div class="container">
        <div class="footer__inner pb-60">
            <div class="row gy-5">
                <div class="col-xl-4 col-lg-6 col-md-8 col-sm-8">
                    <div class="footer-item">
                        <div class="footer-item__logo">
                            <a href="{{route('home')}}" aria-label="Homepage">
                                <img src="{{asset('assets/images/logoIcon/logo.png')}}" alt="Unlock Themes Logo" width="350" height="80">
                            </a>
                        </div>
                        <p class="footer-item__desc mt-0">UnlockThemes is your 360¡Æ marketplace for modern web scripts and themes. Find premium PHP Laravel solutions to launch your online business today.</p>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6">
                    <div class="footer-item">
                        <h5 class="footer-item__title">Company</h5>
                        <ul class="footer-menu">
                            <li class="footer-menu__item"><a href="{{route('about')}}" class="footer-menu__link">About Us</a></li>
                            <li class="footer-menu__item"><a href="{{route('contact')}}" class="footer-menu__link">Contact Us</a></li>
                            <li class="footer-menu__item"><a href="{{route('faq')}}" class="footer-menu__link">FAQ</a></li>
                            <li class="footer-menu__item"><a href="{{route('user.login')}}" class="footer-menu__link">Account Login</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6">
                    <div class="footer-item">
                        <h5 class="footer-item__title">Digital Marketing </h5>
                        <ul class="footer-menu">
                            <li class="footer-menu__item"><a href="{{route('marketing.backlink')}}" class="footer-menu__link">Backlink</a></li>
                            <li class="footer-menu__item"><a href="{{route('marketing.pr')}}" class="footer-menu__link">Press Release</a></li>
                            <li class="footer-menu__item"><a href="{{route('marketing.advertising')}}" class="footer-menu__link">Advertising</a></li>
                            <li class="footer-menu__item"><a href="{{route('marketing.branding')}}" class="footer-menu__link">Branding</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6">
                    <div class="footer-item">
                        <h5 class="footer-item__title">Web Hosting</h5>
                        <ul class="footer-menu">
                            <li class="footer-menu__item"><a href="{{route('hosting.premium')}}" class="footer-menu__link">Shared Hosting</a></li>
                            <li class="footer-menu__item"><a href="{{route('hosting.vps')}}" class="footer-menu__link">VPS Hosting</a></li>
                            <li class="footer-menu__item"><a href="{{route('hosting.dedicated')}}" class="footer-menu__link">Dedicated Server</a></li>
                            <li class="footer-menu__item"><a href="{{route('hosting.cluster')}}" class="footer-menu__link">Server Cluster</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6">
                    <div class="footer-item">
                        <h5 class="footer-item__title">More....</h5>
                        <ul class="footer-menu">
                            <li class="footer-menu__item"><a href="{{route('domain.register')}}" class="footer-menu__link">Domain</a></li>
                            <li class="footer-menu__item"><a href="{{route('hosting.smtp')}}" class="footer-menu__link">SMTP</a></li>
                            <li class="footer-menu__item"><a href="{{route('product.all')}}" class="footer-menu__link">Digital Items</a></li>
                            <li class="footer-menu__item"><a href="{{route('support')}}" class="footer-menu__link">Get Support</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer flex-between">
            <span class="bottom-footer__copyright"> Copyright &copy; {{date('Y')}} <a href="{{route('home')}}" class="link">Unlock Themes LLC</a> All Right Reserved</span>
            <ul class="bottom-footer-list flex-align">
                <li class="bottom-footer-list__item"><a href="{{route('privacy')}}" class="bottom-footer-list__link fs-16">Privacy Policy</a></li>
                <li class="bottom-footer-list__item"><a href="{{route('refund')}}" class="bottom-footer-list__link fs-16">Refund Policy</a></li>
                <li class="bottom-footer-list__item"><a href="{{route('tos')}}" class="bottom-footer-list__link fs-16">Terms of Services</a></li>
            </ul>
        </div>
    </div>
</footer>