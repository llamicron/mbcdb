<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;

class MailController extends Controller
{
	public function verify()
	{
		$user = User::where('token', $_GET['token'])->first();
		if(is_null($user)) {
			\Session::flash('status', "Sorry, that user doesn't exist. Try creating another");
			return redirect('/register');
		}
		$user->verified = 1;
		$user->save();
		\Session::flash('status', 'Your account is now verified');
		return redirect('/');
	}


}
