<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Search;

class SearchController extends Controller {

  public function __construct() {
    $this->middleware('auth');
  }

  public function searchStub() {
    return view('counselors.search');
  }

	public function searchCounselors(Request $request)
	{
		if (empty($request['search'])) {
			return redirect('/noResults');
		}

		$results = Search::byClass('App\Counselor', $request['search']);

		return view('counselors.results', compact('results'));

	}

	public function noResults()
	{
		$results = null;
		return view('counselors.results', compact('results'));
	}

}
