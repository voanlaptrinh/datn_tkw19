<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    @if (isset($title))
        <title>{{ $title }}</title>
    @endif
    <link href="{{ asset('css/userApp.css') }}?t={{ time() }}" rel="stylesheet">
    <script src="{{ asset('js/userApp.js') }}?t={{ time() }}" defer></script>

    @yield('css')
    <script>
        window.Laravel = {!!json_encode([
                'csrfToken' => csrf_token(),
                'baseUrl' => url('/'),
            ], JSON_UNESCAPED_UNICODE)!!};
    </script>
</head>

<body class="c-app">
<div id="app">
    <div class="wrapper d-flex flex-column min-vh-100 overflow-hidden">
        @include('include.user.header')
        <div class="main-content">
            @yield('content')
            @include("include.user.contact")
        </div>
        @include('include.user.footer')
    </div>
    @if (session()->get('Message.flash'))
        <popup-alert :data="{{ json_encode(session()->get('Message.flash')[0]) }}"></popup-alert>
    @endif
    @php
        session()->forget('Message.flash');
    @endphp
</div>
<div class="loading-div hidden">
    <div class="loader-img"></div>
</div>

@include('include.user.footerBtn')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
@yield('javascript')
</body>
</html>
