<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="/" class="logo-link nk-sidebar-logo">
                <h3 class="logo-light logo-img">Beetpool</h3>
                <h3 class="logo-dark logo-img">Beetpool</h3>
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu">
                <em class="icon ni ni-arrow-left"></em>
            </a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Navigations</h6>
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item">
                        <a href="{{ route('home') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                            <span class="nk-menu-text">Dashboard</span>
                        </a>
                    </li>
                    @if(auth()->user()->is_profile_complete == 1)
                        <li class="nk-menu-item">
                            <a href="{{ route('transaction') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                                <span class="nk-menu-text">Transactions</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('deposit') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                                <span class="nk-menu-text">Deposits</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('investment') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-invest"></em></span>
                                <span class="nk-menu-text">Investments</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('investment-plan') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-package"></em></span>
                                <span class="nk-menu-text">Investment Plans</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('withdrawal') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-wallet-out"></em></span>
                                <span class="nk-menu-text">Withdrawals</span>
                            </a>
                        </li>

                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-money"></em></span>
                                <span class="nk-menu-text">Purchase</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="#" class="nk-menu-link"><span class="nk-menu-text">Buy</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="#" class="nk-menu-link"><span class="nk-menu-text">Sell</span></a>
                                </li>
                            </ul><!-- .nk-menu-sub -->
                        </li>
                    @endif
                    <li class="nk-menu-item">
                        <a href="{{ route('profile') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
                            <span class="nk-menu-text">Profile Setting</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('logout') }}" class="nk-menu-link"
                           onclick="event.preventDefault(); document.getElementById('logout').submit();">
                            <span class="nk-menu-icon"><em class="icon ni ni-signout"></em></span>
                            <span class="nk-menu-text">Logout</span>
                        </a>
                        <form id="logout" method="POST" action="{{ route('logout') }}">
                            @csrf
                        </form>
                    </li>
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>