<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link type="image/x-icon" rel="shortcut icon"
          href="{{ asset('images/frontend/shortcut-image.png') }}"/>
    <title>@yield('pageTitle') - {{ config('app.name', 'Laravel') }}</title>
    <meta name="keywords" content=""/>

    <!-- Include css -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/slick.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
<div class="wrapper">
    @include('layouts.frontend.header')
    <main>
        @if (\Request::is('/') || \Request::is('trang-chu'))
            @include('layouts.frontend.revslider')
        @else
            @include('layouts.frontend.revbanner')
            <div class="container">
                {!! Breadcrumbs::render() !!}
            </div>
        @endif
        <div class="container">
            <div class="content">
                <div class="main-content">
                    @yield('content')
                </div>
                @if (\Request::is('thanh-toan'))
                    
                @else
                    @include('layouts.frontend.sidebar')
                @endif
            </div>
            @if (\Request::is('/') || \Request::is('trang-chu'))
                @include('layouts.frontend.homebottom')
            @endif
        </div>
    </main>
    @include('layouts.frontend.footer')
</div>
<!-- Include js -->
<script src="{{ asset("js/app.js") }}"></script>
<script src="{{ asset("js/frontend/owl.carousel.min.js") }}"></script>
<script src="{{ asset("js/frontend/main.js") }}"></script>
<script src="{{ asset("js/frontend/slick.min.js") }}"></script>
@yield('scripts')
</body>
