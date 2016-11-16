<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $incrementing = false;
    public $primaryKey = 'id';


    protected $fillable = [
        'id', 'name', 'email', 'password',
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
        if ($counselor != null) {
          $collection->push($counselor);
        }
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
      // find a Save record if it exists
      $saveAttempt = Save::where($params)->first();
      if (!$saveAttempt) {
        return false;
      }
      return true;
    }

    public function saveToUser(Counselor $counselor) {
      // if (\Auth::user()->id() != $this->id || \Auth::user()->isAdmin != 1) {
      //   abort(401);
      // }
      $params = [
        'user_id' => $this->id,
        'counselor_id' => $counselor->id,
      ];
      $saveAttempt = Save::where($params)->first();
      if (!$saveAttempt) {
        // if failed, make a new one.
        $save = new Save(['user_id' => $this->id, 'counselor_id' => $counselor->id]);
        // wow
        $this->saves()->save($save);
        \Session::flash('status', 'Counselor Saved');
      } else {
        $saveAttempt->delete();
        \Session::flash('status', 'Counselor removed');
      }
      return true;
    }

}
