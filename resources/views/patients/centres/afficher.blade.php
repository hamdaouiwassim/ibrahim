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

              
                    <div class="col-md-8 offset-2">
                        <div class="card" style="opacity:.9">
                            <div class="card-body">
                            <h5 class="card-title">{{ $centre->nom }}</h5>
                              <h6 class="card-subtitle mb-2 text-muted">{{ $centre->type }}</h6>
                              <p class="card-text">{{ $centre->description  }}</p>
                            <hr />
                              <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Liste des avis</a>
                                        @if ( $centre->type != "Pharmacie") 
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Reserver cet centre</a>
                                        @endif  
                                </div>                               
                              </nav>
                              <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                <div class="pt-3">
                                                    <div class="col-12">
                                                        <hr />
                                                        <h3 class="text-primary"><i class="fa fa-comment" aria-hidden="true"></i> Un nouveau avi</h3>
                                                        <hr />
                                                    </div>
                                                <form action="{{ route('AddComment') }}" class="row col-12" method="post">
                                                            @csrf
                                                        <input type="hidden" name="idcentre" value="{{ $centre->id }}">
                                                            <div class="col-md-10"><input class="form-control" name="contenu" name="form-control" placeholder="laisser votre avi ici ..." /></div>
                                                            
                                                            <div class="col-md-2"> <input type="submit" value="Ajouter" class="btn btn-info"></div>
                                                        </form>
                                                        <hr />
                                                        <h3 class="text-primary ml-3"> <i class="fa fa-comments" aria-hidden="true"></i> Liste des avis </h3>
                                                        <hr />
                                                        @foreach( $centre->comments as $comment )
                                                                <div class="row">
                                                                            <div class="col-4"><h4 class="text-success">{{ $comment->user->name }}</h4></div>
                                                                            <div class="col-8 alert alert-success">
                                                                                <p>{{ $comment->contenu }} 
                                                                                    <br />
                                                                                    <span style="font-size:10px">{{ $comment->created_at }} </span>
                                                                                </p>
                                                                            </div>
                                                                </div>
                                                                
                                                        @endforeach
                                             </div>
                                </div>
                                @if ( $centre->type != "Pharmacie") 
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div name="reservation" class="row col-md-12 pt-3">
                                        <div class="col-12">
                                            <hr />
                                            <h3 class="text-primary"> <i class="fa fa-id-card" aria-hidden="true"></i> Une nouvelle reservation</h3>
                                            <hr />
                                        </div>
                                        
                                        <form action="{{ route('AddReservation') }}" class="row col-12" method="post">
                                            @csrf
                                            <input type="hidden" name="idcentre" value="{{ $centre->id }}">
                                            <div class="col-md-6"><textarea class="form-control" name="detaille" name="form-control" placeholder="votre detaille de reservation ici ..."></textarea></div>
                                            <div class="col-md-4"><input class="form-control" type="datetime-local" name="datereservation" ></div>
                                            <div class="col-md-2"> <input type="submit" value="Reserver" class="btn btn-info">
                                        </form>
                                       
                                    </div>

                                </div>
                                
                              </div>
                              @endif <!-- End tab 2 -->

                              
                              
                                        
                                        
                                       

                              </div>
                             

                            </div>
                          </div>
                    </div>
         

        </div>
    </div>
</div>
</div>
</body>
</html>
