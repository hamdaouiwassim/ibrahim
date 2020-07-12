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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="min-height:100vh;background-size:cover;background-image: url('{{ asset('images/coverSearch.jpg') }}')">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Centres Medicaux
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            <li class="nav-item mr-3">
                                <a href="{{ route('home')}}" class="btn btn-primary"> Chercher Centre </a>
                            </li>
                            
                           @if ( auth()->user()->avatar != null )<img src="{{asset('uploads')}}/{{ auth()->user()->avatar }}" width="30" height="30" style="border-radius: 50%">@endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="/profile" class="dropdown-item">profile</a>
                                   
                                    <a href="{{ route('patientsCentres') }}" class="dropdown-item">Centres</a>
                                    <a href="{{ route('patientsReservations') }}" class="dropdown-item">Reservations</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

     


<div class="col-12"  >
    <div class="row justify-content-center">
        <div class="col-md-12 pt-5">
            
        <form class="row pt-5" action="{{ route('cherchercentre')}}" method="post">
            @csrf
            <div class="row pt-5 col-12">

            
                            <div class="form-group col-3 pt-5">
                                <input type="text" name="ville" class="form-control" placeholder="Entrer une ville de centre ..." >
                            </div>
                            <div class="form-group col-3 pt-5">
                                <input type="text" name="region" class="form-control" placeholder="Entrer une region...">
                            </div>
                            <div class="form-group col-3 pt-5">
                            <select class="form-control" name="type" class="form-control">
                                <option value="">
                                    Type centre ...
                                </option>   
                                <option >
                                    Pharmacie
                                </option>
                                <option >
                                    Hopitale
                                </option>
                                <option >
                                    Cabinet Medicale
                                </option>

                            </select>
                        </div>
                        
                        <div class="form-group col-3 pt-5">
                            <input type="submit" value="Chercher" class="btn btn-success">
                        </div>

                  </form>
                </div> 
            </div>
        </div>
    </div>
</div>

</div>
</body>
</html>
