<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;

class MailController extends Controller
{

	public function welcome()
	{
		$data = [];

		\Mail::send('emails.welcome', $data, function ($message) {
			$message->to('luke@thesweeneys.org')
							->subject('Welcome to MBCDB');
		});
	}

	public function verify()
	{
		$user = User::where('token', $_GET['token'])->first();
		$user->verified = 1;
		$user->save();
		\Session::flash('status', 'Your account is now verified');
		return redirect('/');
	}


}
