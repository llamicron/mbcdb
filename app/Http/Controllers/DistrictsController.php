<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Counselor;
use App\District;
use App\Http\Requests;

class DistrictsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  // Old methods.  I combined the 'add counselor' form with thise one, so these aren't needed.
  // I am keeping the controller in case i need it down the line.
  //
  //
  // public function add(Counselor $counselor) {
  //   $districts = District::get();
  //   return view('districts.add', compact('counselor', 'districts'));
  // }
  //
  //   public function store(Counselor $counselor, Request $request) {
  //     $district = District::where('name', "=", $request->district)->first();
  //     $district->counselors()->save($counselor);
  //     \Session::flash('status', 'District Set');
  //     return redirect()->action("BadgesController@add", compact('counselor'));
  //   }
}
