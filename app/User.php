<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function isAdmin() {
      if ($this->isAdmin == 1) {
          return true;
      } else {
        return flase;
      }

    }


    public function counselors() {
      return $this->hasMany('App\Counselor');
    }

}
