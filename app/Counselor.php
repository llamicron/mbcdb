<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counselor extends Model
{
  public function badges()
  {
    return $this->belongsToMany("App\Badge");
  }
}
