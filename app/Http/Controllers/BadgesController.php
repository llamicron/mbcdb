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
			$badge = Badge::find($request->merit_badge);
			$badges = $counselor->badges;
			foreach ($badges as $counselor_badge) {
				if ($counselor_badge->name == $badge->name) {
						\Session::flash('status', 'This counselor already teaches that merit badge');
						return redirect()->action('BadgesController@add', ['counselor' => $counselor]);
				}
			}
      $counselor->badges()->save($badge);
      \Session::flash('status', "{$badge->name} Badge Added");
      return redirect()->action('BadgesController@add', ['counselor' => $counselor]);
    }

}
