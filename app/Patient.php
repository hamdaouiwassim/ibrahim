<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
     /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function reservations(){
        return $this->hasMany('App\Reservation','idpatient','id');
    }
}
