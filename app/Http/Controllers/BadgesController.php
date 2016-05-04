<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \DB;
use App\Badge;
use App\Counselor;
use App\Http\Requests;

class BadgesController extends Controller
{
    public function add(Counselor $counselor) {
      $merit_badge_list = DB::table('badges')->get();
      return view('badges.add', compact('counselor', 'merit_badge_list'));
    }

    public function store(Counselor $counselor, Request $request) {
      $badge = Badge::find($request->merit_badge);
      $counselor->badges()->save($badge);
      return redirect("/counselors/{$counselor->id}/show");
    }
}
