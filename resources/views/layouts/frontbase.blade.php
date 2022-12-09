<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
   {{-- <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets')}}/home/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{asset('assets')}}/home/img/favicon.png">--}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    @yield('title')

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>

    <!-- CSS Files -->
    <link href="{{asset('assets')}}/home/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="{{asset('assets')}}/home/css/material-kit.css?v=1.2.1" rel="stylesheet"/>

</head>

<body class="index-page">

@include('home.navbar')

@include('home.header')

@yield('content')

@include('home.footer')

@stack('js')

</body>
