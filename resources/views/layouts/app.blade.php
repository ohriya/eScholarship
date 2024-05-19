<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('scripts')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .navbar-sticky-top
        {
            position: fixed;
            z-index: 999;
            opacity:10;
            width: 100%;
        }
    
       
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-customColor shadow-sm navbar-sticky-top">
            <div class="container">
                @guest
                    <a class="navbar-brand font-weight-bold text-white" href="{{ url('/') }}">
                        <!-- <img src="/images/svglogo.svg" alt="eScholarship App"> -->
                        {{ config('app.name', 'Laravel') }}
                    </a>
                @else
                    <a class="navbar-brand font-weight-bold text-white" href="{{ url('/home') }}">
                        <!-- <img src="/images/svglogo.svg" alt="eScholarship App"> -->
                        {{ config('app.name', 'Laravel') }}
                    </a>
                @endguest
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth

                    @if(Auth::user()->is_admin == 1)
                        <ul class="navbar-nav mr-auto font-weight-bold">
                            <form action="/scholarship/filter" method = "POST">
                                @csrf
                                <button class="btn btn-warning" type="submit"> Provide Scholarship </button>
                            </form>
                            <!-- <a href="" class="nav-link">Apply for a Scholarship</a> -->
                        </ul>
                    @else
                        @if (Auth::user()->has_applied == NULL)
                            <ul class="navbar-nav mr-auto font-weight-bold">
                                <form action="https://uat.esewa.com.np/epay/main" method = "POST">
                                    @csrf
                                    <form action="https://uat.esewa.com.np/epay/main" method="POST">
                                    <input value="100" name="tAmt" type="hidden">
                                    <input value="90" name="amt" type="hidden">
                                    <input value="10" name="txAmt" type="hidden">
                                    <input value="0" name="psc" type="hidden">
                                    <input value="0" name="pdc" type="hidden">
                                    <input value="EPAYTEST" name="scd" type="hidden">
                                    <input value="papamama123" name="pid" type="hidden">
                                    <input value="http://localhost:8000/payment-verify?q=su" type="hidden" name="su">
                                    <input value="http://localhost:8000/payment-verify?q=fu" type="hidden" name="fu">
                                    <input type="submit" value="Apply for Scholarship">
                                </form>
                                <!-- <a href="" class="nav-link">Apply for a Scholarship</a> -->
                            </ul>                        
                        @endif
                    @endif
                    
                    <!-- <ul class="navbar-nav mr-auto font-weight-bold">
                        <a href="" class="nav-link">My Applications</a>
                    </ul> -->
                    <!-- <ul class="navbar-nav mr-auto font-weight-bold">
                        <a href="" class="nav-link">My Info</a>
                    </ul> -->
                    @endauth

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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->is_admin == 0)
                                        <a href="{{route('profile.show', Auth::user()->id)}}" class="dropdown-item">My Profile</a>
                                    @endif
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

        <main class="py-4"><br><br>
            @yield('content')
            <br><br>
        </main>
    </div>

    <div style="position: fixed;
                left: 0;
                bottom: 0;
                padding:15px;
                width: 100%;
                height:50px;
                background: rgb(17,15,60);
                background: linear-gradient(90deg, rgba(17,15,60,1) 0%, rgba(40,28,74,1) 20%, rgba(6,97,116,1) 100%);
                color: white;
                text-align: center;">
        &copy; :
        <a class="text-white" href="{{route('home')}}">शिक्षित नेपाल</a>
    </div>
</body>
</html>
