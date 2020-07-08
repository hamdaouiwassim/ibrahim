@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card  p-3">
                <h1>  Centres Recements ajoutees</h1>
              
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
                            <a href="{{ route('AccepterCentre', ['id' =>$centre->id]) }}" class="btn btn-primary">Accpter </a>
                            <a href="{{ route('RefuserCentre',['id'=>$centre->id])}}" class="btn btn-danger">Refuser </a>
                           
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