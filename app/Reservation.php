<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    public function patient()
    {
        return $this->belongsTo('App\Patient','idpatient','id');
    }
    public function centre()
    {
        return $this->belongsTo('App\centre','idcentre','id');
    }
}
