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
			'last_name',
			'name',
			'unit_num',
			'first_name',
			'address',
			'city',
			'state',
			'zip',
			'email',
			'primary_phone',
			'secondary_phone',
			'bsa_id',
		];
    return $fields;
  }

}
