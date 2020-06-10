<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'roles' , 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    /**
     * Get the admins for the user.
     */
    public function admin()
    {
        return $this->hasOne('App\Admin','iduser','id');
    }

    /**
     * Get the admins for the user.
     */
    public function patient()
    {
        return $this->hasOne('App\Patient','iduser','id');
    }
    /**
     * Get the professionels for the user.
     */
    public function professionel()
    {
        return $this->hasOne('App\Professionel','iduser','id');
    }
}
