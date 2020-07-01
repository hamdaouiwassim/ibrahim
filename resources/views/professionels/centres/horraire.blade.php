@extends('layouts.pro')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card  p-3">
                <h1> Horraire pour <span class="text-primary"> {{ $centre->nom }}</span>  </h1>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Jour</th>
                        <th scope="col">Date de debut</th>
                        <th scope="col">Date de fin</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <form action="{{ route('ajouterHorraireDb')}}" method="post">
                        @csrf
                    <input type="hidden" name="idcentre" value="{{ $centre->id }}">
                        <tr>
                            <td></td>
                            <td>

                                <select name="jour" class="form-control">
                                        <option >Lundi</option>
                                        <option >Mardi</option>
                                        <option >Mercredi</option>
                                        <option >Jeudi</option>
                                        <option >Vendredi</option>
                                        <option >Samedi</option>
                                        <option >Dimanche</option>
                                </select>
                            </td>
                            <td><input type="time" name="datedebut" class="form-control"></td>
                            <td><input type="time" name="datefin" class="form-control"></td>
                            <td><input type="submit"  class="btn btn-primary"></td>
                        </tr>
                        @foreach($centre->horraires as $h )
                        <tr>
                            <td></td>
                            <td>
    
                                {{ $h->jour }}
                            </td>
                            <td>{{ $h->datedebut }}</td>
                            <td>{{ $h->datefin }}</td>
                            <td></td>
                        </tr>
                        
                        @endforeach
                       
                    </form>
                   
                    </tbody>
                  </table>



               
            </div>
        </div>
    </div>
</div>
@endsection
