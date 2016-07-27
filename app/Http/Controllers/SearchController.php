<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Counselor;
use App\User;

class SearchController extends Controller
{
  public function search(Request $request)
  {

    $fields = [
      'first_name',
      'last_name',
      'address',
      'city',
      'state',
      'zip',
      'email',
      'primary_phone',
      'secondary_phone',
      'unit_num',
      'bsa_id',
    ];

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
