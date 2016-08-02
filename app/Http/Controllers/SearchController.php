<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Counselor;
use App\District;
use App\Council;
use App\Badge;
use App\Search;

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

  public function searchStub() {
    return view('counselors.search');
  }

	public function search(Request $request)
	{
		return Search::byClass('App\Counselor', $request['search']);
		return Search::byClass('App\Counselor', $request['search']);
	}

  /*
    * 1. Retrive search term and search fields (if necessary)
    * 2. Search for records by search term
    * 3. check if results are null
    * 4. Happy path
    * 5. continue search
  */

  /* Search Functions */
  public function searchCounselors(Request $request) {

      $fields = Counselor::getFields();
      $term = $request['search'];

      foreach ($fields as $field) {
        $results = Counselor::where($field, 'LIKE', "%{$term}%")->get();
        if (!$results->isEmpty()) {
          return view('counselors.results', compact('results'));
        }
      }
      return redirect("/searchDistricts?term=$term");

    }

  public function searchDistricts() {
    $term = $_GET['term'];

    $districts = District::where('name', 'LIKE', "%{$term}%")->get();

    if (!$districts->isEmpty()) {
      $results = $districts->first()->counselors;
      return view('counselors.results', compact('results'));
    }

    return redirect("/searchBadges?term=$term");
  }

  public function searchBadges() {
    $term = $_GET['term'];

    $badges = Badge::where('name', 'LIKE', "%$term%")->get();
    if (!$badges->isEmpty()) {
      $results = $badges->first()->counselors;
      return view('counselors.results', compact('results'));
    }

    return redirect("/noResults");
  }

  public function noResults() {
    $results = null;
    return view('counselors.results', compact('results'));
  }

}
