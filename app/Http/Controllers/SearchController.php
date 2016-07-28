<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Counselor;
use App\User;
use App\District;
use App\Council;

class SearchController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function searchCounselors(Request $request) {

      $fields = Counselor::getFields();
      $term = $request['search'];

      foreach ($fields as $field) {
        $results = Counselor::where($field, 'LIKE', "%{$term}%")->get();
        if (!$results->isEmpty()) {
          break;
        }
      }

      if ($results->isEmpty()) {
        // continue search in districts
        return redirect("/searchDistricts?term=$term");
      }

      $user = User::find(\Auth::user()->id);
      // Happy Path
      return view('counselors.results', compact('results', 'user'));
    }

  public function searchDistricts() {
    $term = $_GET['term'];

    $districts = District::where('name', 'LIKE', "%{$term}%")->get();
    if (!$districts->isEmpty()) {
      $results = $districts->first()->counselors;
      $user = User::find(\Auth::user()->id);
      //  Happy path
      return view('counselors.results', compact('results', 'user'));
    }

    // no results
    return redirect()->action('SearchController@noResults');
  }

  public function noResults()
  {
    $user = \Auth::user();
    $results = null;
    return view('counselors.results', compact('results', 'user'));

  }

}
