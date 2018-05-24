<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ремонт магазин</title>

    <!-- Fonts -->
    {{--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}
    <link rel="stylesheet" href="{{ URL::asset('./public/css/app.css') }}">
    <link href="{{ URL::asset('/public/css/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" >


</head>
<body>
<div id="app">
    <router-view></router-view>
</div>

<script src="{{ url('./public/js/app.js') }}"></script>

</body>
</html>
