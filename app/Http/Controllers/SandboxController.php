<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;

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
      $searchParams['index'] = 'my_index';
      $searchParams['size'] = 50;
      $searchParams['body']['query']['query_string']['query'] = 'foofield:barstring';

      $result = Es::search($searchParams);
      return $result;
    }
}
