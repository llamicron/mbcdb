<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;

class PagesController extends Controller
{
    public function index() {
        return view('home');
    }

    public function about() {
      return view('static.about');
    }

		public function edit(Request $request, User $user)
		{

			$this->validate($request, [
				'name' => 'required',
				'new_password' => 'required|min:8',
				'confirm_new_password' => 'required|min:8|same:new_password',
			]);
			$user->name = $request->name;
			$user->password = \Hash::make($request->new_password);

			$user->save();

			\Session::flash('status', 'User Updated');
			return redirect('/');
		}

}
