<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \DB;
use App\Badge;
use App\Counselor;
use App\Http\Requests;

class BadgesController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
    }

    public function add(Counselor $counselor) {
      $badges = Badge::orderBy('name', 'asc')->get();
      return view('badges.add', compact('counselor', 'badges'));
    }

    public function store(Counselor $counselor, Request $request) {
			$input = $request->all();
			array_shift($input);
			array_pop($input);
			foreach ($input as $badge => $id) {
				$badge = Badge::find($id);
				$counselor->badges()->save($badge);
			}
      \Session::flash('status', "Badges Added");
			return redirect("/counselors/$counselor->id/show");
    }

		public function removeForm(Counselor $counselor)
		{
			return view('badges.remove', compact('counselor'));
		}

		public function remove(Counselor $counselor, Request $request)
		{
			$input = $request->all();
			// This removes the token
			array_shift($input);
			// and this removes the submit input
			array_pop($input);
			foreach ($input as $badge => $id) {
				DB::table('badge_counselor')->where('counselor_id', $counselor->id)->where('badge_id', $id)->delete();;
			}
			\Session::flash('status', 'Badges Removed');
			return redirect("/counselors/$counselor->id/show");

		}


}
