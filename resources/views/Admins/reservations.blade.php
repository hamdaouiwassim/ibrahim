@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card  p-3">
                <h1>  Liste des reservations </h1>
              
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Centre</th>
                        <th scope="col">Patient

                        </th>
                        <th scope="col">Date de reservation</th>
                        <th scope="col">Etat</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($reservations as $res)
                      <tr>
                        <th scope="row">1</th>
                        <td>{{ $res->centre->nom }}</td>
                        <td>{{ $res->patient->user->name  }}</td>
                        <td>{{ $res->date  }}</td>
                        <td>
                            {{ $res->etat  }}
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