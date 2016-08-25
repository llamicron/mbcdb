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
      $this->middleware('admin')->except('deleteUser', 'confirmDelete');
    }

    public function confirmAdmin() {
      if(\Auth::user()->isAdmin) {
        $users = User::paginate(25);
        return view('users.index', compact('users'));
      }
    }

		public function sortByName()
		{
			$users = User::orderBy('name', 'ASC')->paginate(25);
			return view('users.index', compact('users'));
		}

		public function sortByEmail()
		{
			$users = User::orderBy('email', 'ASC')->paginate(25);
			return view('users.index', compact('users'));
		}

		public function sortByPrivilege()
		{
			$users = User::orderBy('isAdmin', 'DESC')->paginate(25);
			return view('users.index', compact('users'));
		}

    public function show(User $user) {
      return view('users.show', compact('user'));
    }

    public function confirmRemoval(User $user) {
      $item = "user";
      return view('warnings.confirmRemoval', compact('user', 'item'));
    }

    public function delete(User $user) {
      if ($user->isAdmin == 0) {
        $user->delete();
        return redirect('/admin');
      } else {
        return view('warnings.notOwner');
      }
    }

		public function setAdminWarning(User $user) {
      return view('warnings.confirmSetAdmin', compact('user'));
    }

    public function setAdmin(User $user) {
      $user->isAdmin = 1;
      $user->save();
			\Session::flash('status', "$user->name is now an admin");
      return redirect("/users/$user->id/show");
    }

    public function home() {
      return redirect('/admin');
    }

		public function confirmDelete(User $user)
		{
			return view('warnings.confirmDelete', compact('user'));
		}

		public function deleteUser(User $user, Request $request)
		{
			$this->validate($request, [
				'name' => 'required'
			]);

			if ($request->name != $user->name) {
				\Session::flash('error', 'The name you entered does not match');
				return redirect()->back();
			}
			$user->delete();
			\Session::flash('status', 'User Deleted');
			return redirect('/');
		}
}
