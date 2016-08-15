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

	public function noResults()
	{
		$results = null;
		return view('counselors.results', compact('results'));
	}

	public function search(Request $request)
	{
		switch ($request['class']) {

			case 'App\District':
				$districts = \App\District::where('name', 'LIKE', $request['search'])->get();
				$results = new \Illuminate\Database\Eloquent\Collection;
				foreach ($districts as $district) {
					$results->add($district->counselors);
				}
				return view('counselors.results', compact('results'));
				break;

			case 'App\Counselor':
				$results = \App\Search::byClass('App\Counselor', $request['search'], \App\Counselor::getFields());
				return view('counselors.results', compact('results'));
				break;

			case 'App\Council':
				$councils = \App\Council::where('name', 'LIKE', $request['search'])->get();
				$results = new \Illuminate\Database\Eloquent\Collection;
				foreach ($councils as $council) {
					$districts = $council->districts;
					foreach ($districts as $district) {
						$results->add($district->counselors);
					}
				}
				return view('counselors.results', compact('results'));
				break;

			case 'unit_num':
				$results = \App\Search::byClass('App\Counselor', $request['search'], ['unit_num']);
				return view('counselors.results', compact('results'));
				break;

			default:
				$badges = \App\Badge::where('name', 'LIKE', $request['search'])->get();
				$results = new \Illuminate\Database\Eloquent\Collection;
				foreach ($badges as $badge) {
					$results->add($badge->counselors);
				}
				return view('counselors.results', compact('results'));
				break;
		}
	}
}
