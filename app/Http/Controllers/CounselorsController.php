<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Counselor;
use App\Badge;
use App\Http\Requests;


class CounselorsController extends Controller {

    public function index() {
      $counselors = Counselor::get();
      return view('counselors.index', compact('counselors'));
    }

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
      return redirect('/counselors');
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
