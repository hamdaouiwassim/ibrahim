@extends('layouts.pro')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card  p-3">
                <h1> Ajouter un centre medical </h1>

            <form action="{{ route('ajouterCentreDB') }}" method="post">
                        @csrf
             
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nom</label>
                      <input type="text" class="form-control" name="nom" placeholder="Enter un nom">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea class="form-control" name="description" placeholder="Enter une description"></textarea>
                      </div>
                    
                      <div class="form-group">
                        <label for="exampleInputEmail1">Ville</label>
                        <input type="text" class="form-control" name="ville"  placeholder="Enter une ville">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Region</label>
                        <input type="text" class="form-control" name="region"  placeholder="Enter une ville">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Adresse</label>
                        <input type="text" class="form-control" name="adresse" placeholder="Enter une adresse">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Type</label>
                        <select class="form-control" name="type" >
                                
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
                   
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                 
               </form>

               
            </div>
        </div>
    </div>
</div>
@endsection
