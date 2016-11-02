<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Council extends Model
{
  public function districts() {
    return $this->hasMany('App\District');
  }

  public function counselors() {
    return $this->hasMany('App\Counselor');
  }
}
