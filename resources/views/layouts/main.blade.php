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
                                <div class="components-preview wide-md mx-auto">
                                    <div class="nk-block-head nk-block-head-lg wide-sm">
                                        <div class="nk-block-head-content">
                                            <div class="nk-block-head-sub">
                                                <a class="back-to" href="#">
                                                    <em class="icon ni ni-arrow-left"></em>
                                                    <span>Back</span>
                                                </a>
                                            </div>
                                            <h2 class="nk-block-title fw-normal">Form Elements</h2>
                                        </div>
                                    </div>
                                    <div class="nk-block nk-block-lg">
                                        @yield('content')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-->
                @include('elements.footer')
            </div>
        </div>
        <!-- main @e -->
    </div>

    <script src="{{ asset('dashlite/js/bundle.js') }}"></script>
    <script src="{{ asset('dashlite/js/scripts.js') }}"></script>
    @include('elements.complete-profile')
</body>

</html>
