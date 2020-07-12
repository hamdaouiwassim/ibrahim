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
<body style="min-height:100vh;background-size:cover;background-image: url('{{ asset('images/centres.jpg') }}')">
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
                        
                        @if ( auth()->user()->avatar != null )<img src="{{asset('uploads')}}/{{ auth()->user()->avatar }}" width="30" height="30" style="border-radius: 50%">@endif
                            <li class="nav-item mr-3">
                                <a href="{{ route('home')}}" class="btn btn-primary"> Chercher Centre </a>
                            </li>
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

     
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 row pt-5">
            @if (count($centres) == 0)
            <div class="alert alert-warning">
                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Aucun centre trouvee avec ces criteres de recherche ...
            </div>
            @endif
                @foreach($centres as $centre)
                    <div class="col-4">
                        <div class="card"  style="opacity:.9;width: 18rem;">
                            <div class="card-body">
                            <h5 class="card-title">{{ $centre->nom }}</h5>
                              <h6 class="card-subtitle mb-2 text-muted">{{ $centre->type }}</h6>
                              <p class="card-text">{{ $centre->description  }}</p>
                            <a href="{{ route('ShowCentre',['id'=>$centre->id])}}" class="card-link">Details</a>
                              
                            </div>
                          </div>
                    </div>
                @endforeach

        </div>
    </div>
</div>
</div>
</body>
</html>

