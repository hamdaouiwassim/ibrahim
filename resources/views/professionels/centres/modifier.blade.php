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
<body style="min-height:100vh;background-size:cover;background-image: url('{{ asset('images/centre.jpg') }}')">
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
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    
                                <a class="dropdown-item" href="{{ route('mescentres')}}">
                                     Mes centres
                                    </a>
                                    <a class="dropdown-item" href="{{ route('mesreservations')}}">
                                        Les reservations
                                       </a>
                                       
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

   

<div class="container  pt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card  p-3" style="opacity: .9">
    
                <h1> Modifier {{ $centre->nom }} </h1>

            <form action="{{ route('ModifierCentreDB') }}" method="post">
                        @csrf
             <input type="hidden" name="idcentre" value={{  $centre->id  }}>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nom</label>
                      <input type="text" class="form-control" name="nom" value="{{ $centre->nom }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea class="form-control" name="description" >{{ $centre->description }}</textarea>
                      </div>
                    
                      <div class="form-group">
                        <label for="exampleInputEmail1">Ville</label>
                        <input type="text" class="form-control" name="ville"  value="{{ $centre->ville }}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Region</label>
                        <input type="text" class="form-control" name="region"  value="{{ $centre->region }}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Adresse</label>
                        <input type="text" class="form-control" name="adresse" value="{{ $centre->adresse }}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Type</label>
                        <select class="form-control" name="type" >
                                
                                <option @if ( $centre->type == "Pharmacie"  ) selected @endif >
                                    Pharmacie
                                </option>
                                <option @if ( $centre->type == "Hopitale"  ) selected @endif>
                                    Hopitale
                                </option>
                                <option @if ( $centre->type == "Cabinet Medicale"  ) selected @endif>
                                    Cabinet Medicale
                                </option>

                        </select>
                      </div>
                   
                    <button type="submit" class="btn btn-primary">Modifier</button>
                 
               </form>

               
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>

