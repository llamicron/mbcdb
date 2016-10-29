<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \DB;
use App\Badge;
use App\Counselor;
use App\Http\Requests;

class BadgesController extends Controller {

    public function __construct()
    {
      $this->middleware('auth');
    }

    public function add(Counselor $counselor) {
			if (\Auth::user()->isAdminOrOwner($counselor)) {
			  $badges = Badge::get();
				return view('badges.add', compact('counselor', 'badges'));
			}
			return view('warnings.notOwner');
    }

    public function store(Counselor $counselor, Request $request) {
      var_dump($request->all());
			// if (\Auth::user()->isAdminOrOwner($counselor)) {
			// 	$input = $request->all();
			// 	array_shift($input);
			// 	foreach ($input as $badge => $id) {
			// 		$badge = Badge::find($id);
			// 		$counselor->badges()->save($badge);
			// 	}
	    //   \Session::flash('status', "Badges Added");
			// 	return redirect("/counselors/$counselor->id/show");
			// }
			// return view('warnings.notOwner');
    }

		public function remove(Counselor $counselor, Request $request)
		{
			if (\Auth::user()->isAdminOrOwner($counselor)) {
				$input = $request->all();
				// This removes the token
				array_shift($input);
				foreach ($input as $badge => $id) {
      		DB::table('badge_counselor')->where('counselor_id', $counselor->id)->where('badge_id', $id)->delete();;
				}
				\Session::flash('status', "Badges Removed");
				return redirect("/counselors/$counselor->id/show");
			}
			return view('warnings.notOwner');
		}

    public function edit(Counselor $counselor) {
      $badges = $counselor->badges;
      return view('badges.remove', compact('badges', 'counselor'));
    }
}
