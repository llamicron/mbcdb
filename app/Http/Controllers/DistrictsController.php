<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Counselor;
use App\District;
use App\Http\Requests;

class DistrictsController extends Controller
{

  public function add(Counselor $counselor) {
    $districts = District::get();
    return view('districts.add', compact('counselor', 'districts'));
  }

    public function store(Counselor $counselor, Request $request) {
      $district = District::where('name', "=", $request->district)->first();
      $district->counselors()->save($counselor);

      return redirect()->action("BadgesController@add", compact('counselor'));
    }
}
