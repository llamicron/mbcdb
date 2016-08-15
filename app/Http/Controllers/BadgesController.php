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

    // These functions are for adding a badge to the counselor, not adding a badge to the DB
    // All badges are static and shouldn't have to be updated.  If new ones are added, then i will add
    // them manually.
    //
    // I had built a tool that let me add the badges through the front end, but i commited that with something else,
    // and had to roll back.  I should improve my git skills...
    public function add(Counselor $counselor) {
      $badges = Badge::orderBy('name', 'asc')->get();
      return view('badges.add', compact('counselor', 'badges'));
    }

    public function store(Counselor $counselor, Request $request) {
      $badge = Badge::find($request->merit_badge);
      $counselor->badges()->save($badge);
      \Session::flash('status', 'Badge Added');
      return redirect()->action('BadgesController@add', ['counselor' => $counselor]);
    }

}
