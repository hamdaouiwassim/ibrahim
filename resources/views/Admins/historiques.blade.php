@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card  p-3">
                <h1>  Historiques </h1>
              
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tache </th>
                        <th scope="col">Date de tache </th>
                       
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($historiques as $h)
                      <tr>
                        <th scope="row">1</th>
                        <td>{{ $h->message }}</td>
                        <td>{{ $h->created_at  }}</td>
                        
                      </tr>
                      @endforeach
                   
                    </tbody>
                  </table>



               
            </div>
        </div>
    </div>
</div>
@endsection