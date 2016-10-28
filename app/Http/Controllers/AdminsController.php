<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Counselor;
use App\Badge;
use App\District;
use App\Council;
use DB;
use App\User;
use App\Http\Requests;

class AdminsController extends Controller {

    public function __construct() {
      $this->middleware('admin');
    }

    public function confirmAdmin() {
      if(\Auth::user()->isAdmin) {
        $users = User::orderBy('name', 'ASC')->paginate(25);
        return view('users.index', compact('users'));
      }
    }

    public function show(User $user) {
      return view('users.show', compact('user'));
    }

    public function setAdmin(User $user) {
			if ($user->isAdmin == 1) {
				\Session::flash('status', "$user->name is already an administrator");
				return redirect("/users/$user->id/show");
			}
      $user->isAdmin = 1;
      $user->save();
			\Session::flash('status', "$user->name is now an administrator");
      return redirect("/users/$user->id/show");
    }

		public function delete(User $user)
		{
			$user->delete();
			\Session::flash('status', 'User Deleted');
			return redirect('/admin');
		}

}
