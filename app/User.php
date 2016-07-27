<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function isAdmin() {
      if ($this->isAdmin == 1) {
          return true;
      } else {
        return false;
      }

    }


    public function counselors() {
      return $this->hasMany('App\Counselor');
    }

}
