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
    {{-- FONT AWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css" integrity="sha512-c93ifPoTvMdEJH/rKIcBx//AL1znq9+4/RmMGafI/vnTFe/dKwnn1uoeszE2zJBQTS1Ck5CqSBE+34ng2PthJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS Files -->
    <link href="{{asset('assets')}}/home/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="{{asset('assets')}}/home/css/material-kit.css?v=1.2.1" rel="stylesheet"/>
    <link href="{{asset('assets')}}/home/css/style.css" rel="stylesheet"/>

</head>

<body class="index-page">

@include('home.navbar')

@include('home.header')

@yield('content')

@include('home.footer')

@stack('js')
</body>
