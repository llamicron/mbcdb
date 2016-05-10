<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counselor extends Model
{
  public function badges()
  {
    return $this->belongsToMany("App\Badge");
  }

  public function district()
  {
    return $this->belongsTo('App\District');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }

}
