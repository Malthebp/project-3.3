<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>{{ config('app.name', 'Laravel') }} -  @yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/770d702ffc.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
</head>
<body>
    <div id="app">
@if(!Auth::guest())
<header>
    <h1>Rdy Up</h1>
    <p>{{Auth::user()->balance()}}<i class="fa fa-diamond" aria-hidden="true"></i></p>

</header>
@endif

    <section class="content-wrapper">
        @yield('content')
    </section>

@if(!Auth::guest())
<nav id="bottom-nav">
    <ul>
    <li><a href="/" id="calender"><i class="fa fa-calendar" aria-hidden="true"></i></a></li><li><a href="/pointshop"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a></li><li><a href="https://www.canvaslms.com/"><i class="fa" aria-hidden="true"><img src="/images/canvas.png" alt=""></i></a></li><li><a href="/profile/user"><i class="fa fa-user-o" aria-hidden="true"></i></a></li>
    </ul>
</nav>
@endif
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
