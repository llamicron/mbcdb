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

		public function isAdminOrOwner($counselor)
		{
			if ($this->isAdmin == 1) {
				return true;
			} elseif ($this->id == $counselor->user_id) {
				return true;
			}
			return false;
		}

    public function saves()
    {
      return $this->hasMany(Save::class);
    }

    public function savedCounselors()
    {
      $saves = $this->saves;
      $counselors = new \Illuminate\Support\Collection;
      foreach ($saves as $save) {
        $counselor = Counselor::find($save->counselor_id)->first();
        $counselors->push($counselor);
      }
      return $counselors;
    }
}
