<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priseencharge extends Model
{
    //
    public function centre()
    {
        return $this->belongsTo('App\Centre','idcentre','id');
    }
}
