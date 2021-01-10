<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@@page-discription">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="">
    <!-- Page Title  -->
    <title>@yield('title') | Beetpool</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('dashlite/css/dashlite.css') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('dashlite/css/theme.css') }}">
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            @include('elements.sidebar')
            <div class="nk-wrap ">
                @include('elements.header')
                <!-- content -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <div class="nk-block-head-sub">
                                                <a class="back-to" href="@yield('back')">
                                                    <em class="icon ni ni-arrow-left"></em>
                                                    <span>@yield('back-title')</span>
                                                </a>
                                            </div>
                                            <h3 class="nk-block-title fw-normal">
                                                @yield('content-title')
                                            </h3>
                                        </div>
                                        @yield('content-side')
                                    </div>
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-->
                @include('elements.footer')
            </div>
        </div>
    </div>

    <script src="{{ asset('dashlite/js/bundle.js') }}"></script>
    <script src="{{ asset('dashlite/js/scripts.js') }}"></script>

    @include('partials.alert.complete-profile')
    @include('elements.flash-messages')
</body>

</html>
