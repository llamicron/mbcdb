<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Counselor;
use App\Badge;
use DB;
use App\Http\Requests;


class CounselorsController extends Controller {

// ----------------- counselors/index view sorting functions ----------------------
    public function sortByName() {
      $counselors = Counselor::orderBy('last_name', 'ASC')->get();
      return view('counselors.index', compact('counselors'));
    }

    public function sortByDistrict() {
      $counselors = Counselor::orderBy('district_id', 'DESC')->get();
      return view('counselors.index', compact('counselors'));
    }

    public function sortByTroop() {
      // THANK YOU BESTMOMO!
      $counselors = Counselor::orderBy(DB::raw('LENGTH(unit_num), unit_num'))->get();
      return view('counselors.index', compact('counselors'));
    }

// ----------------- Counselors CRUD ------------------------------------
    public function add() {
      return view('counselors.add');
    }

    public function show(Counselor $counselor) {
      $badges = $counselor->badges;
      return view('counselors.show', compact('counselor', 'badges'));
    }

    public function store(Request $request) {
      $counselor = new Counselor;

      // Instantiating the counselor
      $counselor->first_name = $request->first_name;
      $counselor->last_name = $request->last_name;
      $counselor->address = $request->address;
      $counselor->city = $request->city;
      $counselor->state = $request->state;
      $counselor->zip = $request->zip;
      $counselor->email = $request->email;
      $counselor->primary_phone = $request->primary_phone;
      $counselor->secondary_phone = $request->secondary_phone;
      $counselor->unit_num = $request->unit_num;
      $counselor->bsa_id = $request->bsa_id;
      $counselor->unit_only = 0;

      $counselor->save();
      return redirect()->action('DistrictsController@add', compact('counselor'));
    }

    public function remove(Counselor $counselor) {
      $counselor->delete();
      return redirect('/counselors');
    }

    public function update(Counselor $counselor, Request $request) {
      $counselor->first_name = $request->first_name;
      $counselor->last_name = $request->last_name;
      $counselor->address = $request->address;
      $counselor->city = $request->city;
      $counselor->state = $request->state;
      $counselor->zip = $request->zip;
      $counselor->email = $request->email;
      $counselor->primary_phone = $request->primary_phone;
      $counselor->secondary_phone = $request->secondary_phone;
      $counselor->unit_num = $request->unit_num;
      $counselor->bsa_id = $request->bsa_id;
      $counselor->unit_only = $request->unit_only;

      $counselor->save();
      return redirect('/counselors');
    }

    public function edit(Counselor $counselor) {
      return view('/counselors/edit', compact('counselor'));
    }



}
