@extends('layouts.pro')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card  p-3">
                <h1> Les prise en charges pour le centre : <span class="text-primary"> {{ $centre->nom }}</span>  </h1>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">specialite</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <form action="{{ route('ajouterchargeDB')}}" method="post">
                        @csrf
                    <input type="hidden" name="idcentre" value="{{ $centre->id }}">
                        <tr>
                            <td></td>
                          
                            <td><input type="text" name="specialite" class="form-control"></td>
                            <td><input type="number" step="0.01" name="prix" class="form-control"></td>
                            <td><input type="submit" value="Ajouter" class="btn btn-primary"></td>
                        </tr>
                     
                       
                    </form>
                    @foreach($centre->charges as $c )
                    <tr>
                        <td></td>
                       
                        <td>{{ $c->specialite }}</td>
                        <td>{{ $c->prix }} DT </td>
                    <td><a onclick="return confirm('voulez-vous vraiment supprimer la charge ?') " href="{{ route('supprimercharge',['id'=>$c->id])}}" class="btn btn-danger">Supprimer</a></td>
                    </tr>
                    
                    @endforeach
                   
                    </tbody>
                  </table>



               
            </div>
        </div>
    </div>
</div>
@endsection
