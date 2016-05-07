<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SandboxController extends Controller
{

    public function __contruct()
    {
      $this->middleware('auth', ['except' => [
          // Methods that you don't want to authenticate
        ]]);
    }

    public function navbar()
    {
      return view('sandbox.navbar');
    }
}
