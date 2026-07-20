<div class="sidebar-menu flex-between">
    <div class="sidebar-menu__inner">
        <span class="sidebar-menu__close d-lg-none d-block"><i class="far fa-times"></i></span>
        <div class="sidebar-logo">
            <a href="{{route('home')}}" class="sidebar-logo__link"><img src="{{asset('assets/images/logoIcon/logo-dark.png')}}" alt="Unlock Themes"></a>
        </div>
        <ul class="sidebar-menu-list">
            <li class="sidebar-menu-list__item {{menuActive('user.home')}}">
                <a href="{{route('user.home')}}" class="sidebar-menu-list__link fs-16 flex-align">
                    <span class="icon"><i class="icon-Dashbaord-outline"></i></span>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-menu-list__item {{menuActive('user.deposit.*')}}">
                <a href="{{route('user.deposit.index')}}" class="sidebar-menu-list__link fs-16 flex-align">
                    <span class="icon"><i class="far fa-wallet"></i></span>
                    <span class="text">Make a Deposit</span>
                </a>
            </li>
            <li class="sidebar-menu-list__item {{menuActive('user.invoice.*')}}">
                <a href="{{route('user.invoice.list')}}" class="sidebar-menu-list__link fs-16 flex-align">
                    <span class="icon"><i class="icon-Invoice-outline"></i></span>
                    <span class="text">Invoices</span>
                </a>
            </li>
            <li class="sidebar-menu-list__item {{menuActive('user.envato.purchases')}}">
                <a href="{{route('user.envato.purchases')}}" class="sidebar-menu-list__link fs-16 flex-align">
                    <span class="icon"><i class="icon-envato-new-outline"></i></span>
                    <span class="text">Envato Purchases</span>
                </a>
            </li>
            <li class="sidebar-menu-list__item {{menuActive('user.direct.purchases')}}">
                <a href="{{route('user.direct.purchases')}}" class="sidebar-menu-list__link fs-16 flex-align">
                    <span class="icon"><i class="icon-direct-purchase-outline"></i></span>
                    <span class="text">Direct Purchases</span>
                </a>
            </li>
            <li class="sidebar-menu-list__item {{menuActive('user.domain.*')}}">
                <a href="{{route('user.domain.list')}}" class="sidebar-menu-list__link fs-16 flex-align">
                    <span class="icon"><i class="icon-Domain-outline"></i></span>
                    <span class="text">Domains</span>
                </a>
            </li>
            <li class="sidebar-menu-list__item {{menuActive('user.hosting.*')}}">
                <a href="{{route('user.hosting.list')}}" class="sidebar-menu-list__link fs-16 flex-align">
                    <span class="icon"><i class="icon-Hosting-outline"></i></span>
                    <span class="text">Hosting</span>
                </a>
            </li>
            <li class="sidebar-menu-list__item {{menuActive('user.marketing.*')}}">
                <a href="{{route('user.marketing.orders')}}" class="sidebar-menu-list__link fs-16 flex-align">
                    <span class="icon"><i class="icon-megaphone-2"></i></span>
                    <span class="text">Marketing</span>
                </a>
            </li>
            <li class="sidebar-menu-list__item {{menuActive('user.ticket.*')}}">
                <a href="{{route('user.ticket.index')}}" class="sidebar-menu-list__link fs-16 flex-align">
                    <span class="icon"><i class="icon-Profile"></i></span>
                    <span class="text">Support Tickets</span>
                </a>
            </li>
            <li class="sidebar-menu-list__item has-dropdown {{menuActive('user.report.*')}}">
                <a href="javascript:void(0)" class="sidebar-menu-list__link fs-16 flex-align">
                    <span class="icon"><i class="icon-Report-outline"></i></span>
                    <span class="text">Reports</span>
                </a>
                <div class="sidebar-submenu">
                    <ul class="sidebar-submenu-list">
                        <li class="sidebar-submenu-list__item {{menuActive('user.report.transactions')}}">
                            <a href="{{route('user.report.transactions')}}" class="sidebar-submenu-list__link fs-16">
                                <span class="text"> Transactions </span>
                            </a>
                        </li>
                        <li class="sidebar-submenu-list__item {{menuActive('user.report.deposits')}}">
                            <a href="{{route('user.report.deposits')}}" class="sidebar-submenu-list__link fs-16">
                                <span class="text"> Deposits </span>
                            </a>
                        </li>
                        <li class="sidebar-submenu-list__item {{menuActive('user.report.logins')}}">
                            <a href="{{route('user.report.logins')}}" class="sidebar-submenu-list__link fs-16">
                                <span class="text"> Login Logs </span>
                            </a>
                        </li>
                        <li class="sidebar-submenu-list__item {{menuActive('user.report.emails')}}">
                            <a href="{{route('user.report.emails')}}" class="sidebar-submenu-list__link fs-16">
                                <span class="text"> Email Logs </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> 
        </ul>
    </div>
    <div class="user-profile">
        <div class="user-profile-info">
            <span class="user-profile-info__icon flex-center">
                <i class="icon-Profile-1"></i>
            </span>
            <div class="user-profile-info__content">
                <span class="user-profile-info__name fs-16">{{\Illuminate\Support\Str::limit(auth()->user()->fullname,14)}}</span>
                <p class="user-profile-info__desc fs-14"><span>@</span>{{\Illuminate\Support\Str::limit(auth()->user()->username,14)}}</p>
            </div>
        </div>
        <div class="user-profile__dropdown">
            <button class="user-profile-dots dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="far fa-angle-down"></i>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item  flex-align fs-16" href="{{route('user.setting')}}">
                    <span class="icon"><i class="far fa-cog"></i></span>
                    <span class="icon">Setting </span>
                </a>
                <a class="dropdown-item  flex-align fs-16" href="{{route('user.logout')}}">
                    <span class="icon"><i class="far fa-sign-out-alt"></i></span>
                    <span class="icon">Logout </span>
                </a>
            </div>
        </div>
    </div> 
</div>