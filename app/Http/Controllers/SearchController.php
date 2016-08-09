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

	public function search(Request $request)
	{
		if (empty($request['search'])) {
			return redirect('/');
		}

		return Search::byClass('App\Counselor', $request['search']);
		
	}

}
