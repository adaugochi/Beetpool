<div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ml-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu">
                    <em class="icon ni ni-menu"></em>
                </a>
            </div>
            <div class="nk-header-brand d-xl-none">
                <a href="/" class="logo-link">
                    <h3 class="logo-light logo-img">Beetpool</h3>
                    <h3 class="logo-dark logo-img">Beetpool</h3>
                </a>
            </div><!-- .nk-header-brand -->
            <div class="nk-header-news d-none d-xl-block">
                <div class="nk-news-list">
                    <div class="nk-news-item">
                        <div class="nk-news-icon">
                            <?php $time = date("H"); $timezone = date("e"); ?>

                            @if ((int)$time < 12)
                                <em class="icon ni ni-sun"></em>
                            @elseif ((int)$time >= 12 && (int)$time < 17)
                                <em class="icon ni ni-sun-fill"></em>
                            @elseif ((int)$time >= 17 && (int)$time < 19)
                                <em class="icon ni ni-moon"></em>
                            @elseif ((int)$time >= 19)
                                <em class="icon ni ni-moon-fill"></em>
                            @endif
                        </div>
                        <div><p>Welcome Back!!!</p></div>
                    </div>
                </div>
            </div><!-- .nk-header-news -->
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <em class="icon ni ni-user-alt"></em>
                                </div>
                                <div class="user-info d-none d-md-block">
                                    <div class="user-status">
                                        {{ str_replace('-', ' ', auth()->user()->role ?: 'user') }}
                                    </div>
                                    <div class="user-name dropdown-indicator">
                                        {{ auth()->user()->fullname }}
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <span>
                                            {{ \App\Helper\Utils::initials(auth()->user()->fullname) }}
                                        </span>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">{{ auth()->user()->fullname }}</span>
                                        <span class="sub-text">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li>
                                        <a href="{{ route('profile') }}">
                                            <em class="icon ni ni-user-alt"></em>
                                            <span>View Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('profile') }}">
                                            <em class="icon ni ni-setting-alt"></em>
                                            <span>Account Setting</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                            <em class="icon ni ni-signout"></em>
                                            <span>Sign Out</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}"
                                              method="POST">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul><!-- .nk-quick-nav -->
            </div><!-- .nk-header-tools -->
        </div><!-- .nk-header-wrap -->
    </div><!-- .container-fliud -->
</div>