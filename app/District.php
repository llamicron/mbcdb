<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{

  public function counselors() {
    return $this->hasMany("App\Counselor");
  }

  public function council()
  {
    return $this->belongsTo('App\Council');
  }
}
