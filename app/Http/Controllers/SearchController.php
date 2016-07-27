<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Counselor;
use App\User;

class SearchController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function searchCounselors(Request $request) {

      $fields = Counselor::getFields();

      foreach ($fields as $field) {
        $results = Counselor::where($field, 'LIKE', "%{$request['search']}%")->get();
        if (!$results->isEmpty()) {
          break;
        }
      }

      $user = User::find(\Auth::user()->id);
      return view('counselors.results', compact('results', 'user'));
    }


}
