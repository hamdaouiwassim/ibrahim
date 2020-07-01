<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Centre extends Model
{
    //
    public function comments(){
        return $this->hasMany('App\Comment','idcentre','id');
    }
    public function horraires(){
        return $this->hasMany('App\Horraire','idcentre','id');
    }

    public function professionel()
    {
        return $this->belongsTo('App\Professionel','iduser','id');
    }
    public function charges(){
        return $this->hasMany('App\Priseencharge','idcentre','id');
    }
    public function reservations(){
        return $this->hasMany('App\Reservation','idcentre','id');
    }
}
