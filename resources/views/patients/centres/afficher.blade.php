@extends('layouts.pat')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 row">

              
                    <div class="col-md-8 offset-2">
                        <div class="card" >
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
@endsection
