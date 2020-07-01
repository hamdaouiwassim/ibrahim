@extends('layouts.pro')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card  p-3">
                <h1> Les reservations </h1>
                <div class="col-12 mt-3 mb-3">
                  
          
                </div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom du patient</th>
                        <th scope="col">le centre </th>
                        <th scope="col">Date reservation </th>
                        <th scope="col">Action </th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($reservations as $reservation)
                      <tr>
                        <th scope="row">1</th>
                        <td>{{ $reservation->patient->nom }}</td>
                        <td>{{ $reservation->centre->nom  }}</td>
                        <td >{{ $reservation->date  }} </td>
                        <td>   
                            <a href="" class="btn btn-secondary">Accepter</a>
                            <a href="" class="btn btn-danger">Refuser</a>
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
