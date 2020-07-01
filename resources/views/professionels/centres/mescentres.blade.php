@extends('layouts.pro')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card  p-3">
                <h1> Mes centre medicales </h1>
                <div class="col-12 mt-3 mb-3">
                  <a class="btn btn-primary" href="{{ route('createCentre')}}">Ajouter un centre </a>
          
                </div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($centres as $centre)
                      <tr>
                        <th scope="row">1</th>
                        <td>{{ $centre->nom }}</td>
                        <td>{{ $centre->description  }}</td>
                        <td>
                            <a href="{{ route('ajouterHorraire', ['id' =>$centre->id]) }}" class="btn btn-primary">Ajouter Horraire</a>
                            <a href="" class="btn btn-success">Modifier</a>
                            <a onclick="return confirm('Voulez-vous vraiment supprimee ?')" href="{{ route('supprimercentre', ['id' =>$centre->id]) }}" class="btn btn-danger">Supprimer centre</a>
                            <a href="{{ route('ajoutercharge', ['id' =>$centre->id]) }}" class="btn btn-secondary">Ajouter Prise en charge</a>
                        </td>
                      </tr>
                      @endforeach
                   
                    </tbody>
                  </table>



               
            </div>
        </div>
    </div>
</div>
@endsection
