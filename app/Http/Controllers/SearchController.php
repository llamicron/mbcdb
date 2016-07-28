<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Counselor;
use App\User;
use App\District;
use App\Council;
use App\Badge;

/*
* The 'search' function returns a stub page that has a a search box on it.
* To keep the search limited to on single box, each search function will search
* for it's associated model (Counselor, District, etc.).  If it doesn't find anything,
* it will move on to the next search function.  The order is not dictated by the order
* hat the functions are defined in.  If you want to create a new function, you need to
* redirect to another function if it doesn't find anything.  if it's the last search,
* it should redirect to 'SearchController@noResults'
*/


class SearchController extends Controller {

  public function __construct() {
    $this->middleware('auth');
  }

  public function search() {
    $user = \Auth::user();
    return view('counselors.search', compact('user'));
  }


  /* Search Functions */
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

    // no results.  Move onto badge search.
    return redirect("/searchBadges?term=$term");
  }

  public function searchBadges() {
    $term = $_GET['term'];
    $user = \Auth::user();

    $badges = Badge::where('name', 'LIKE', "%$term%")->get();
    if (!$badges->isEmpty()) {
      $results = $badges->first()->counselors;
      return view('counselors.results', compact('results', 'user'));
    }

    return redirect()->action('SearchController@noResults');
  }

  public function noResults() {
    $user = \Auth::user();
    $results = null;
    return view('counselors.results', compact('results', 'user'));

  }

}
