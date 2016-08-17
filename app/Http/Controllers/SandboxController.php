<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Counselor;
use App\Http\Requests;
use Search;
use Auth;

class SandboxController extends Controller
{

    public function __construct() {
      $this->middleware('admin');
    }

    public function test() {

    }

}
