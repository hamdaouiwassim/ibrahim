@extends('layouts.pro')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card  p-3">
                <h1> Centre : {{ $centre->nom }} </h1>
                <p>{{ $centre->description }}</p>
                <h3>{{ $centre->ville }}</h3>
                <h3>{{ $centre->adresse }}</h3>
                <h3>{{ $centre->type }}</h3>
                <h3>{{ $centre->region }}</h3>

         

               
            </div>
            
            <hr />
            <form  action="{{ route('ajouterCommentaire') }}" method="post">
                    @csrf
                    <div class="row col-12">
                        <div class="form-group col-10">
                            <input type="text" name="contenu" class="form-control">
                            <input type="hidden" name="idcentre" value="{{ $centre->id }}">
                        </div>
                        <div class="form-group col-2">
                            <input type="submit" value="Ajouter" class="btn btn-success" >
                        </div>
                        
                    </div>
                  
                    
            </form>
            <h1>Liste des commentaires : </h1>
            <hr />

            @foreach($centre->comments as $c )
            <div class="alert alert-primary">
                    <h3> {{ $c->user->name }} : </h3>   {{ $c->contenu }}
            </div>
              
             
            @endforeach
        </div>
    </div>
</div>
@endsection
