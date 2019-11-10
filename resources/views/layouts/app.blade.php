<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fe Store</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @include('layouts.style')
</head>
<body>
<?php
use GuzzleHttp\Client;
$client = new Client();
$res = $client->get('http://api.openweathermap.org/data/2.5/weather?q=Hanoi&appid=c8f9a5c5f417f386b8751111cc51e669');
$data = $res->getBody();
$data = json_decode($data);
?>
<div class="hero-image">

    <div class="content">
        <h3>{{$data->name}}</h3>
        <div class="degrees">{{$data->main->temp - 273}}<sup>o</sup></div>
        <h2>{{$data->weather[0]->main}}</h2>
        <div>Wind: E {{$data->wind->speed}} mph</div>
        <div>Humidity: {{$data->main->humidity}}%</div>
    </div>

    <div class="hero-text">
        <h1>C2H5OH shopping cart</h1>
        <p>I'm Lê Duy Dương</p>
    </div>
</div>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand">C2H5OH Store</a>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item m-auto">
                                <a class="nav-link" href="{{route('home')}}">@lang('message.Home')</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('cart.showCart')}}">
                                    <img src="https://img.icons8.com/dotty/30/000000/shopping-cart.png">
                                    (
                                    {{\Illuminate\Support\Facades\Session::has('cart') ? \Illuminate\Support\Facades\Session::get('cart')->totalQty : 0}}
                                    )
                                    <span class="sr-only">(current)</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <div class="form-inline">
                            <div>
                                <form action="{{route('products.search')}}" method="get">
                                    @csrf
                                    <input type="text" class="form-control" name="search"

{{--                                        @if($_REQUEST['REQUEST_METHOD' == 'GET'])--}}
{{--                                            VALUE="{{$search}}"--}}
{{--                                        @endif--}}
                                    >
                                    <button type="submit" class="btn btn-light">
                                        <img src="https://img.icons8.com/pastel-glyph/30/000000/search--v2.png">
                                    </button>
                                </form>
                            </div>

                            <div class="form-group">

                                <form action="{{route('setLang')}}" method="post">
                                    @csrf
                                    <select class="form-control" name="language" onchange="this.form.submit()">
                                        <option
                                            @if(\Illuminate\Support\Facades\Session::has('language'))
                                            @if(\Illuminate\Support\Facades\Session::get('language') == 'en')
                                            selected
                                            @endif
                                            @endif
                                            value="en">EN
                                        </option>
                                        <option
                                            @if(\Illuminate\Support\Facades\Session::has('language'))
                                            @if(\Illuminate\Support\Facades\Session::get('language') == 'vi')
                                            selected
                                            @endif
                                            @endif
                                            value="vi">VI
                                        </option>
                                    </select>

                                </form>
                            </div>
                        </div>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>

</body>
<section id="footer">
    <div class="container d-flex justify-content-center">
        <div class="row text-center text-xs-center text-sm-left text-md-left ">
            <div class=" text-white d-flex" style="font-size: 16px">
                <p class="text-info"> Số 18,đường xuân phương, Nam Từ Liêm, Hà Nội</p>
                &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                <p>
                    <a href="https://www.facebook.com/duong.june">
                        <img src="https://img.icons8.com/office/30/000000/facebook-new.png">
                    </a>
                </p>
            </div>
        </div>
    </div>
</section>
</html>
