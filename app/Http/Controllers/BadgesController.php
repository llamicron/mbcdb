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
    public function add(Counselor $counselor) {
      $merit_badge_list = Badge::orderBy('name', 'asc')->get();
      return view('badges.add', compact('counselor', 'merit_badge_list'));
    }

    public function store(Counselor $counselor, Request $request) {
      $badge = Badge::find($request->merit_badge);
      $counselor->badges()->save($badge);
      return redirect("/counselors/$counselor->id/show");
    }

}
