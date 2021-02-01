<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | Beetpool</title>
    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('dashlite/css/dashlite.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<div>
    <div class="container">
        <div class="row align-items-center justify-content-center vh-100">
            <div class="col-md-8 col-lg-6 offset-lg-2 mx-auto">
                <div class="card mx-auto bd-0 py-4">
                    <div class="text-center">
                        <img class="w-75 card-image-width mx-auto d-block" src="@yield('imageURL')"/>
                        <h3 class="font-weight-bold my-4">@yield('error-title')</h3>
                        <div class="mb-3">
                            @yield('content')
                        </div>
                        <a href="/" class="btn btn-primary">
                            <em class="icon ni ni-arrow-left"></em>
                            <span>Go Home</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
