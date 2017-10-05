<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SisVentas') }}</title>

    <!-- Styles -->
    {!! Html::Style('bootstrap/css/bootstrap.min.css') !!}
    {{-- {!! Html::Style('bootstrap/css/custom.css') !!} --}}
    
    {!! Html::Style('css/doc_bt_custom.css') !!}
    {!! Html::Style('ionicons/ionicons-master/css/ionicons.min.css') !!}
    {{-- {!! Html::Style('css/sidebar.css') !!} --}}

    <!-- Scripts header -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app" class="wrapper">
        <div class="row row-offcanvas row-offcanvas-left">

            @include('navbar_main')

            {{-- @include('sidebar_main') --}}

            <div id="content">

                @yield('content')

            </div>

        </div>
    </div>

    @include('footer')

    <!-- Scripts -->

    {!! Html::script('https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js') !!}
    {!! Html::script('bootstrap/js/bootstrap.min.js') !!}
    
    {{-- {!! Html::script('js/doc.js') !!} --}}

    <!-- Scripts por página -->
    @yield('scripts')

</body>
</html>
