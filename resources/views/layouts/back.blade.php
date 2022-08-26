<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BookShop | @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    BookShop
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="min-vh-100">
        <div class="container ">
            <div class="row px-2 ">
                <div class="col-lg-3 col-sm-12 border shadow-lg my-2"> 
                    <div class="row">
                        <div class="col">
                            <h4 class="text-black text-catitalize py-2">Admin Pannel</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <h5 class="text-black text-catitalize py-1">Menu</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col d-flex flex-column">
                            @can('manage_book')
                            <a href="/admin/book" class="{{ Request::is('admin/book')? 'btn btn-warning mb-1' : 'btn btn-primary mb-1'}}">Books</a>
                            @endcan
                            @can('manage_cd')
                            <a href="/admin/cd" class="{{ Request::is('admin/cd')? 'btn btn-warning mb-1' : 'btn btn-primary mb-1'}}"> CD's</a>
                            @endcan
                            @can('is_admin')
                            <a href="/admin/user" class="{{ Request::is('admin/user')? 'btn btn-warning mb-1' : 'btn btn-primary mb-1'}}"> User's</a>
                            <a href="/admin/roles" class="{{ Request::is('admin/roles')? 'btn btn-warning mb-1' : 'btn btn-primary mb-1'}}"> Roles</a>
                            <a href="/admin/abilities" class="{{ Request::is('admin/abilities')? 'btn btn-warning mb-1' : 'btn btn-primary mb-1'}}"> Abilities</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-sm-12 border shadow-lg my-2" style="min-height:100vh">
                    <div class="row h-100">
                    @yield('content')
                     
                    </div>
                </div>
            </div>
        </div>
        </div>
        
        
        <footer>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm mb-1">
                <div class="container text-light d-flex justify-content-center align-items-center py-2">
                    &copy;Copyright All right reserved
                </div>
            </nav>
        </footer>
    </div>
</body>
</html>
