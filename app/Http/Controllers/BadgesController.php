<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \DB;
use App\Badge;
use App\Counselor;
use App\Http\Requests;

class BadgesController extends Controller
{

    public function __contruct()
    {
      $this->middleware('auth', ['except' => [
          // Methods that you don't want to authenticate
        ]]);
    }

    public function add(Counselor $counselor) {
      $merit_badge_list = Badge::orderBy('name', 'asc')->get();
      return view('badges.add', compact('counselor', 'merit_badge_list'));
    }

    public function store(Counselor $counselor, Request $request) {
      $badge = Badge::find($request->merit_badge);
      $counselor->badges()->save($badge);
      return redirect("/counselors/$counselor->id/show");
    }

    // These two functions are temporary and will be deleted in production.
    // They are only for me to add merit badges to the database faster if i need to.
    public function addBadge()
    {
      return view('/badges/addBadge');
    }

    public function storeBadge(Request $request)
    {
      $badge = new Badge;

      $badge->name = $request->name;
      $badge->code = $request->code;

      $badge->save();
      return redirect('/badges/addBadge');
    }
    // </temp functions>
}
