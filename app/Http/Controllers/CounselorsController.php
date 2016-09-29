<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Counselor;
use App\Badge;
use App\District;
use App\Council;
use App\User;
use App\Http\Requests;


class CounselorsController extends Controller {

    public function __construct()
    {
      $this->middleware('auth');
    }

// ----------------- counselors/index view sorting functions ----------------------

    public function sortByName() {
      return view('counselors.index')->with([
        'counselors' => Counselor::alphabetizeBy('name')
      ]);
    }

    public function sortByDistrict() {
      return view('counselors.index')->with([
        'counselors' => Counselor::alphabetizeBy('district'),
      ]);
    }

    public function sortByTroop() {
      return view('counselors.index')->with([
        'counselors' => Counselor::alphabetizeBy('troop')
      ]);
    }


    public function userCounselors(User $user) {
      $context = 'userCounselors';
			$counselors = Counselor::where('user_id', \Auth::user()->id)->paginate(35);
      return view('counselors.index', compact('counselors', 'user', 'context'));
    }

// ----------------- Counselors CRUD ------------------------------------
    public function add() {
      $districts = District::get();
      return view('counselors.add', compact('districts'));
    }

    public function show(Counselor $counselor) {
      return view('counselors.show', compact('counselor'));
    }

    public function store(Request $request) {
      $this->validate($request, [
        'first_name'        => 'required',
        'last_name'         => 'required',
        'email'             => 'email',
        'primary_phone'     => 'required',
        'unit_num'          => 'required',
        'bsa_id'            => 'required',
        'district'          => 'required',
      ]);


      $counselor = new Counselor;
      $user = \Auth::user();


      // 'Instantiating' the counselor
      $counselor->first_name = trim($request->first_name);
      $counselor->last_name = trim($request->last_name);
			$counselor->name = trim($request->first_name) . " " . trim($request->last_name);
      $counselor->address = $request->address;
      $counselor->city = $request->city;
      $counselor->state = $request->state;
      $counselor->zip = $request->zip;
      $counselor->email = $request->email;
      $counselor->primary_phone = $request->primary_phone;
      $counselor->secondary_phone = $request->secondary_phone;
      $counselor->unit_num = trim($request->unit_num);
      $counselor->bsa_id = $request->bsa_id;
      $counselor->unit_only = $request->unit_only;
      $counselor->save();

      // Getting the district and setting the relationship
      $district = District::find($request->district);
      $district->counselors()->save($counselor);

      // setting the user-counselor relationship
      $user->counselors()->save($counselor);
      \Session::flash('status', 'Counselor Added Successfully');
      return redirect()->action('BadgesController@add', compact('counselor'));
    }

    public function remove(Counselor $counselor) {
			if (\Auth::user()->isAdminOrOwner($counselor)) {
				$counselor->delete();
				return redirect('/counselors');
			}
			return view('warnings.notOwner');
    }

    public function update(Counselor $counselor, Request $request) {

      $this->validate($request, [
        'first_name'        => 'required',
        'last_name'         => 'required',
        'address'           => 'required',
        'city'              => 'required',
        'state'             => 'required',
        'zip'               => 'required',
        'email'             => 'email',
        'primary_phone'     => 'required',
        'secondary_phone'   => 'required',
        'unit_num'          => 'required',
        'bsa_id'            => 'required',
      ]);

      $counselor->first_name = $request->first_name;
      $counselor->last_name = $request->last_name;
			$counselor->name = $request->first_name . " " . $request->last_name;
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


      return redirect("/counselors/$counselor->id/show");
    }

    public function edit(Counselor $counselor) {
			if (!\Auth::user()->isAdminOrOwner($counselor)) {
				return view('warnings.notOwner');
			}
			return view('/counselors/edit', compact('counselor'));
    }

    public function home() {
      return redirect('/home');
    }

    public function saveToUser(Counselor $counselor)
    {
      $user = \Auth::user();
      $user->saveToUser($counselor);
      return redirect("/counselors/$counselor->id/show");
    }

    public function viewSavedCounselors()
    {
      $counselors = \Auth::user()->SavedCounselors();
      return view('counselors.saved', compact('counselors'));
    }
}
