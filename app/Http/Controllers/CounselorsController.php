<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Counselor;
use App\Badge;
use App\District;
use App\Council;
use DB;
use App\User;
use App\Http\Requests;


class CounselorsController extends Controller {

    public function __construct()
    {
      $this->middleware('auth');
    }


// ----------------- counselors/index view sorting functions ----------------------
    public function sortByName() {
      // bad form, i think
      $user = User::find(\Auth::user()->id);
      $counselors = Counselor::orderBy('last_name', 'ASC')->get();
      return view('counselors.index', compact('counselors', 'user'));
    }

    public function sortByDistrict() {
      $user = User::find(\Auth::user()->id);
      $counselors = Counselor::orderBy('district_id', 'DESC')->get();
      return view('counselors.index', compact('counselors', 'user'));
    }

    public function sortByTroop() {
      $user = User::find(\Auth::user()->id);
      // THANK YOU BESTMOMO!
      $counselors = Counselor::orderBy(DB::raw('LENGTH(unit_num), unit_num'))->get();
      return view('counselors.index', compact('counselors', 'user'));
    }

    public function userCounselors(User $user)
    {
      $context = 'userCounselors';
      $counselors = $user->counselors;
      return view('counselors.index', compact('counselors', 'user', 'context'));
    }

// ----------------- Counselors CRUD ------------------------------------
    public function add() {
      $districts = District::get();
      return view('counselors.add', compact('districts'));
    }

    public function show(Counselor $counselor) {
      $user = User::find(\Auth::user()->id);
      $badges = $counselor->badges;
      return view('counselors.show', compact('counselor', 'badges', 'user'));
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
      $user = User::find(\Auth::user()->id);


      // 'Instantiating' the counselor
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

      // Getting the district and setting the relationship
      $district = District::find($request->district);
      $district->counselors()->save($counselor);

      // setting the user-counselor relationship
      $user->counselors()->save($counselor);
      \Session::flash('status', 'Counselor Added Successfully');
      return redirect()->action('BadgesController@add', compact('counselor'));
    }

    public function remove(Counselor $counselor) {
      $user = User::find(\Auth::user()->id);
        if ($user->isAdmin) {
          // pass
        } else {
          if ($counselor->user_id != $user->id) {
            return view('errors.notOwner');
          }
        }
      $counselor->delete();
      return redirect('/counselors');
    }

    public function update(Counselor $counselor, Request $request) {
      // i could do something like:
      //
      //    $counselor->update($request->all());
      //
      // for simple stuff, but i think this is more descriptive of what i am doing
      // and gives me more control over what is being passed in to the DB

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
      $user = User::find(\Auth::user()->id);
      $user = User::find(\Auth::user()->id);
        if ($user->isAdmin) {
          // pass
        } else {
          if ($counselor->user_id != $user->id) {
            return view('errors.notOwner');
          }
        }
      return view('/counselors/edit', compact('counselor'));
    }

    public function home() {
      // this is merely a redirect to '/home'.  See comment on routes.php above
      // the Route::get('/counselors') line.
      return redirect('/home');
    }

}
