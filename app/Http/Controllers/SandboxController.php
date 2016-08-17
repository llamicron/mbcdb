<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Counselor;
use App\Http\Requests;
use Search;
use Auth;

class SandboxController extends Controller
{

    public function __construct() {
      $this->middleware('admin');
    }

    public function test() {

			$data = [
				'name' => 'Luke Sweeney',
				'email' => 'luke@thesweeneys.org',
				'token' => str_random(30),
			];

			\Mail::send('emails.welcome', $data, function ($message) use ($data) {
				$message->to($data['email'])
								->subject('Welcome to MBCDB');
			});
    }

}
