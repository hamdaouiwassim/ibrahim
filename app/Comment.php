<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function centre()
    {
        return $this->belongsTo('App\Centre','idcentre','id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','iduser','id');
    }

}
