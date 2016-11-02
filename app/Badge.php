<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model {
   public function counselors() {
     return $this->belongsToMany("App\Counselor");
   }
}
