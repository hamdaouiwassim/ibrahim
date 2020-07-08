@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card  p-3">
                <h1>  Liste des professionels </h1>
              
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Email

                        </th>
                        <th scope="col">Action</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($professionels as $pro)
                        
                      <tr>
                        <th scope="row">1</th>
                        <td>{{ $pro->name }}</td>
                        <td>{{ $pro->email  }}</td>
                        <td>

                            <a  class="btn btn-primary">Accpter </a>
                            <a  class="btn btn-danger">Refuser </a>
                           
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