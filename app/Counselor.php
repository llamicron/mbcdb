<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counselor extends Model
{

  // Relationships

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

  public function isChildOf(User $user)
  {
    if ($user->id == $this->user_id) {
      return true;
    } else {
      return false;
    }
  }

  public function codes()
  {
    return $this->belongsToMany('App\Code');
  }

  public static function getFields()
  {
    $fields = [
      'first_name',
      'last_name',
      'address',
      'city',
      'state',
      'zip',
      'email',
      'primary_phone',
      'secondary_phone',
      'unit_num',
      'bsa_id',
    ];
    return $fields;
  }

}
