<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Counselor;
use App\District;
use App\Http\Requests;

class DistrictsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }
}
