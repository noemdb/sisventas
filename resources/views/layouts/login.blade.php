<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    {{-- <link href="css/bootstrap.min.css" rel="stylesheet"> --}}
    {!! Html::Style('bootstrap/css/bootstrap.min.css') !!}
    {{-- {!! Html::Style('bootstrap/css/custom.css') !!} --}}
    {{-- {!! Html::Style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') !!} --}}
    {!! Html::Style('css/sidebar.css') !!}

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">

        {{-- @include('navbar.navbar'); --}}

        <div id="page-content-wrapper">
            @yield('content')
        </div>

    </div>

    {{-- @include('footer'); --}}

    <!-- Scripts -->
    {!! Html::script('https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js') !!}
    {!! Html::script('bootstrap/js/bootstrap.min.js') !!}
    
</body>
</html>
