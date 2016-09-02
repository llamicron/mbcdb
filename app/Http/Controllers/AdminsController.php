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
      return view('warnings.confirmUserRemoval', compact('user'));
    }

    public function delete(User $user) {
      if ($user->isAdmin == 0) {
				if ($_GET['which'] == 'alone') {
					$user->delete();
					return redirect('/admin');
				} elseif ($_GET['which'] == 'all') {
					$user->counselors->each(function ($counselor) {
						$counselor->delete();
					});
					$user->delete();
					return redirect('/admin');
				}
      } else {
        return view('warnings.isAdmin');
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

		public function bulk(Request $request)
		{
			// this is some ghetto code.  Please disregard.

			if (\Auth::user()->isAdmin != 1) {
				\Session::flash('status', "Sorry, but you can't do that");
				return redirect('/');
			}

			$input = $request->all();
			$type = $input['bulk-select'];
			array_pop($input);
			array_pop($input);
			array_shift($input);
			$users = $input;

			switch ($type) {
				case 'delete':
					foreach ($users as $name => $id) {
						$user = User::find($id);
						$user->delete();
					}
					\Session::flash('status', 'Users deleted');
					break;

				case 'set-admin':
					foreach ($users as $name => $id) {
						$user = User::find($id);
						$user->isAdmin = 1;
						$user->save();
					}
					\Session::flash('status', 'Admin privileges set');
					break;

				default:
					return redirect()->back();
					break;
			}

			return redirect('/admin');
		}

}
