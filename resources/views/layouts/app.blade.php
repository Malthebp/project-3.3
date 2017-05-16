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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/770d702ffc.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
</head>
<body>
    <div id="app">
<header>
    <h1>(name on app)</h1>
    <p>435  <i class="fa fa-diamond" aria-hidden="true"></i></p>
</header>
        @yield('content')
<nav>
    <ul>
    <li><a href="/calendar"><i class="fa fa-calendar active" aria-hidden="true"></i></a></li><li><a href="/pointshop"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a></li><li><a href="/canvas"><i class="fa fa-file-text-o" aria-hidden="true"></i></a></li><li><a href="/user/{{echo //Auth::id()}}"><i class="fa fa-user-o" aria-hidden="true"></i></a></li>
    </ul>
</nav>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
