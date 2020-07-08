@extends('layouts.pat')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
        <form class="row pt-5" action="{{ route('cherchercentre')}}" method="post">
            @csrf
                            <div class="form-group col-3">
                                <input type="text" name="ville" class="form-control" placeholder="Entrer une ville de centre ..." >
                            </div>
                            <div class="form-group col-3">
                                <input type="text" name="region" class="form-control" placeholder="Entrer une region...">
                            </div>
                            <div class="form-group col-3">
                            <select class="form-control" name="type" class="form-control">
                                <option value="">
                                    Type centre ...
                                </option>   
                                <option >
                                    Pharmacie
                                </option>
                                <option >
                                    Hopitale
                                </option>
                                <option >
                                    Cabinet Medicale
                                </option>

                            </select>
                        </div>
                        
                        <div class="form-group col-3">
                            <input type="submit" value="Chercher" class="btn btn-success">
                        </div>

                  </form>
               
            </div>
        </div>
    </div>
</div>
@endsection
