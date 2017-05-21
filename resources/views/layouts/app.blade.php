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
    <h1>(name on app)</h1>
    <p>{{Auth::user()->balance()}}<i class="fa fa-diamond" aria-hidden="true"></i></p>
</header>
@endif
        @yield('content')

@if(!Auth::guest())
<nav id="bottom-nav">
    <ul id="navigation">
<router-link to="home">Home</router-link>

  <button v-on:click="say('hi')">Say hi</button>
    </ul>
</nav>
@endif
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
