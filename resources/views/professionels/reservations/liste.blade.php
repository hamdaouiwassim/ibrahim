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
                        @php
                            
                          $i =1
                        @endphp
                        @foreach($reservations as $reservation)
                        @if ( $reservation->etat == "En Cours" )
                      <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $reservation->patient->nom }}</td>
                        <td>{{ $reservation->centre->nom  }}</td>
                        <td >{{ $reservation->date  }} </td>
                        <td>   
                        <a href="{{ route('AccepterReservation',['id'=>$reservation->id]) }}" class="btn btn-success">Accepter</a>
                        <a onclick="return confirm('Voulez-vous vraiment refusee cette demande de reservation ?')" href="{{ route('RefuserReservation',['id'=>$reservation->id]) }}" class="btn btn-danger">Refuser</a>
                         </td>
                      </tr>
                      @elseif ( $reservation->etat == "Accepter" )
                      <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $reservation->patient->nom }}</td>
                        <td>{{ $reservation->centre->nom  }}</td>
                        <td >{{ $reservation->date  }} </td>
                        <td> 
                         <span class="text-success"> {{ $reservation->etat  }} </span> 
                         </td>
                      </tr>
                      @endif
                      @php
                            
                      $i++
                    @endphp
                      @endforeach
                   
                    </tbody>
                  </table>



               
            </div>
        </div>
    </div>
</div>
@endsection
