<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Badge;
use App\Http\Requests;

class BadgesController extends Controller
{
    public function index() {
      // retrives all merit badges and orders by code (merit badge id) ascending
      // Then returns view badges.index
      $badges = Badge::orderBy('code', 'ASC')->get();
      return view('badges.index', compact('badges'));
    }

    public function show(Badge $badge) {
      return view('badges.show', compact('badge'));
    }
}
