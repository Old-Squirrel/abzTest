<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{--<script src="{{ asset('js/main.js') }}" defer></script>--}}
    {{--<script src="http://code.jquery.com/jquery-3.3.1.min.js"--}}
            {{--integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="--}}
            {{--crossorigin="anonymous">--}}
    {{--</script>--}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/abzTest.css') }}" rel="stylesheet">
</head>
<body>

<div class="container">
    @include('layouts.header')
    <hr class="col-sm-12 hr-app">
    <div id="app">

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <hr class="col-sm-12 hr-app ">
    @include('layouts.footer')
</div>
</body>

</html>
