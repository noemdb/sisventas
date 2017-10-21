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
    
    {{-- {!! Html::Style('css/doc_bt_custom.css') !!} --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/doc_bt_custom.css') }}" media="none" onload="if(media!='all')media='all'">
    
    {{-- {!! Html::Style('ionicons/ionicons-master/css/ionicons.min.css') !!} --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('ionicons/ionicons-master/css/ionicons.min.css') }}" media="none" onload="if(media!='all')media='all'">
    {{-- {!! Html::Style('css/simple-sidebar.css') !!} --}}
    {!! Html::Style('css/menu-level.css') !!}

    <!-- Scripts header -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>

    @include('navbar.admin.navbar')

    <div class="container-fluid">

        <div class="row">
            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2 sidebar">
                @include('navbar.admin.sidebar')
            </div>
            <div class="col-xs-9 col-sm-10 col-md-10 col-lg-10 main">
                @yield('content') 
            </div>
        </div>

    </div>

    @include('footer')

    <!-- Scripts -->

    {{-- {!! Html::script('https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js') !!} --}}
    {{-- {!! Html::script('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js') !!} --}}
    {!! Html::script('js/jquery.min.js') !!}
    {{-- {!! Html::script('js/jquery.popup-box.js') !!} --}}
    {!! Html::script('bootstrap/js/bootstrap.min.js') !!}
    
    {{-- {!! Html::script('js/doc.js') !!} --}}

    <!-- Scripts por página -->
    @yield('scripts')

</body>
</html>
