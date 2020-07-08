@extends('layouts.pat')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card  p-3">
                <h1> Mes reservations </h1>
                <div class="col-12 mt-3 mb-3">
                  
          
                </div>

                
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                   
                        <th scope="col">le centre </th>
                        <th scope="col">Date reservation </th>
                        <th scope="col">Etat </th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                      $i = 1   
                      @endphp
                        @foreach($reservations as $reservation)
                      <tr>
                        <th scope="row">{{ $i }}</th>
                       
                        <td>{{ $reservation->centre->nom  }}</td>
                        <td >{{ $reservation->date  }} </td>
                        <td>   
                            {{ $reservation->etat  }}
                         </td>
                      </tr>

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
