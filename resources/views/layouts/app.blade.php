<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titulo')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.png') }}">
</head>
<body>
    <div id="app">
        @guest
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false"><span class="sr-only">Toggle Navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">{{config('app.name')}}</a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">

                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">&nbsp;</ul>

                    <!-- Right Side Of Navbar -->
                    <!-- Authentication Links -->
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ route('login') }}">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        @else
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false"><span class="sr-only">Toggle Navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">{{config('app.name')}}</a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>Planilla <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/planilla/empleados">Empleados</a></li>
                                <li><a href="/planilla/empleados/contratos">Contratos</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>Configuracion <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/planilla/tipo-requisitos">Requisitos</a></li>
                                <li><a href="/planilla/puestos">Puestos</a></li>
                                <li><a href="/planilla/deptos">Deptos</a></li>
                                <li><a href="/planilla/tipo-contactos">Medios de contacto</a></li>
                                <li><a href="/planilla/formas-de-pago">Formas de pago</a></li>
                                <li><a href="/planilla/sedes">Sedes</a></li>
                            </ul>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>Cuenta <span class="caret"></span></a>

                            <ul class="dropdown-menu">
                                <li><a href="#">{{ Auth::user()->name }}</a></li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @endguest
        <div class="container">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')
</body>
</html>
