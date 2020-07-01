@extends('layouts.pat')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 row">

                @foreach($centres as $centre)
                    <div class="col-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                            <h5 class="card-title">{{ $centre->nom }}</h5>
                              <h6 class="card-subtitle mb-2 text-muted">{{ $centre->type }}</h6>
                              <p class="card-text">{{ $centre->description  }}</p>
                              <a href="#" class="card-link">Details</a>
                              
                            </div>
                          </div>
                    </div>
                @endforeach

        </div>
    </div>
</div>
@endsection
