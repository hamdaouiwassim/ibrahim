<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professionel extends Model
{
    //
     /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function centres(){
        return $this->hasMany('App\Centre','iduser','id');
    }
}
