@extends('layouts.pro')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card  p-3">
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
@endsection
