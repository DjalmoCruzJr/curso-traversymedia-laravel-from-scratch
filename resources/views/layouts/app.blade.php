<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name') === null ? config('app.name') : 'TMCLFSAPP' }}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}"/>
</head>
<body>
    @include('layouts.inc.navbar')
    
    <div class="container">
    @include('layouts.inc.message-box')
        @yield('content')
    </div>

    <script src="{{asset('js/app.js')}}"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
        $('.text-editor').ckeditor();
    </script>
</body>
</html>