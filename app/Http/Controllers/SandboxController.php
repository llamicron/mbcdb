<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Counselor;
use App\Http\Requests;
use Search;

class SandboxController extends Controller
{

    public function __construct()
    {
      $this->middleware('admin');
    }

    public function navbar()
    {
      return view('sandbox.navbar');
    }

    public function test()
    {
      return view('sandbox.test');
    }

    public function search()
    {
      $results = Counselor::where('first_name', "David")->get();
      foreach ($results as $result) {
        echo $result->first_name . " " . $result->last_name . "<br />";
      }

    }
}
