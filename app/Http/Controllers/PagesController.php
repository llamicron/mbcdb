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

			$data = [
				'email' => $user->email,
				'subject' => 'Recent Activity',
			];

			\Mail::send('emails.confirm', $data, function ($message) use ($data) {
				$message->to($data['email'])
								->subject($data['subject']);
			});

			\Session::flash('status', 'User Updated');
			return redirect('/');
		}

    public function feedback() {
      return view('static.feedback');
    }

		public function sendFeedback(Request $request)
		{

			$this->validate($request, [
				'subject' => 'required',
				'message' => 'required',
				'from' => "required|email"
			]);

      if (\Auth::guest()) {
        \Session::flash('status', 'Please login to submit feedback');
        return redirect('/login');
      }

			switch ($request['type']) {
				case 'bug':
					$type = "[BUG REPORT]";
					break;

				default:
					$type = "[FEEDBACK]";
					break;
			}

			$data['from'] = $request['from'];
			$data['type'] = $type;
			$data['subject'] = $request['subject'];
			$data['letter'] = $request['message'];

			\Mail::send('emails.feedback', $data, function ($message) use ($data) {
				$message->to('mbcdb.help@gmail.com')
								->subject($data['type'] . " | " . $data['subject']);
			});

			\Session::flash('status', 'Feedback sent! Thank you for helping us improve!');
			return redirect('/');
		}

}
