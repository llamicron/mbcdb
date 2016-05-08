<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
