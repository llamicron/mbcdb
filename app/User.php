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
      $collection = collect();
      foreach ($saves as $save) {
        $counselor = Counselor::where('id', $save->counselor_id)->first();
        $collection->push($counselor);
      }
      return $collection;
    }

    public function hasSaved($counselor)
    {
      $user = \Auth::user();
      $params = [
        'user_id' => $user->id,
        'counselor_id' => $counselor->id,
      ];
      $saveAttempt = Save::where($params)->first();
      if (!$saveAttempt) {
        return false;
      }
      return true;
    }
}
